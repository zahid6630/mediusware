<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Wavey\Sweetalert\Sweetalert;

//Models
use App\Models\Users;
use Validator;
use Response;
use Hash;
use Auth;
use DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users  = Users::select('id', 'name', 'account_type', 'balance', 'email')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'          => 'required|string',
            'user_name'     => 'required|unique:users,email',
            'password'      => 'required|string',
            'account_type'  => 'required|integer',
        );

        $validation = Validator::make(\Request::all(),$rules);

        if ($validation->fails()) {
            Sweetalert::error('Some required field missing.', 'Validation Error');
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $user_id    = Auth::user()->id;
        $data       = $request->all();

        DB::beginTransaction();

        try{
            $users                       = new Users();
            $users->name                 = $data['name'];
            $users->email                = $data['user_name'];
            $users->password             = Hash::make($data['password']);
            $users->account_type         = $data['account_type'];
            $users->save();

            if ($users->save())
            {   
                DB::commit();
                Sweetalert::success('User has created successfully', 'Success!!');
                return redirect()->back();
            }
        }catch (\Exception $exception){
            DB::rollback();
            Sweetalert::error('Something went wrong!!', 'Error');
            dd($exception);
            return redirect()->back();
        }
    }

    public function userListLoad()
    {
        if(!isset($_GET['searchTerm']))
        {
            $data   = Users::select('id', 'name')
                        ->orderBy('id', 'ASC')
                        ->get();
        }
        else
        {
            $search = $_GET['searchTerm'];
            $data   = Users::select('id', 'name')
                        ->where('name', 'LIKE', "%$search%")
                        ->orderBy('id', 'ASC')
                        ->get();
        }

        $result[]   = array("id"=>0, "text"=>'-- Select User --');
        foreach ($data as $key => $value)
        {
            $name       = $value['name'];
            $result[]   = array("id"=>$value['id'], "text"=>$name);
        }

        return Response::json($result);
    }
}
