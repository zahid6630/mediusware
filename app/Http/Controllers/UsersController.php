<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Wavey\Sweetalert\Sweetalert;

//Models
use App\Models\Users;
use Validator;
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

    public function edit($id)
    {
        // Users Access Level Start
        $access_check  = userAccess(Auth::user()->id);
        if ($access_check == 0)
        {   
            Sweetalert::error('You have not enough permission to do this operation !!', 'Error');
            return redirect()->back();
        }
        // Users Access Level End

        $users      = Users::where('id', '!=', 1)->get();
        $user_find  = Users::find($id);

        return view('users::edit', compact('users', 'user_find'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name'          => 'required|string',
            'password'      => 'nullable|string',
            'role'          => 'required|integer',
            'status'        => 'required|integer',
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
            $users                   = Users::find($id);
            $users->name             = $data['name'];

            if ($data['password'] != null)
            {
                $users->password     = Hash::make($data['password']);
            }
            
            $users->role             = $data['role'];
            $users->status           = $data['status'];
            $users->updated_by       = $user_id;

            if ($users->save())
            {   
                DB::commit();
                Sweetalert::success('User has updated successfully', 'Success!!');
                return redirect()->back();
            }
        }catch (\Exception $exception){
            DB::rollback();
            Sweetalert::error('Something went wrong!!', 'Error');
            return redirect()->back();
        }
    }
}
