<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Wavey\Sweetalert\Sweetalert;

//Models
use App\Models\Transactions;
use Validator;
use Hash;
use Auth;
use DB;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_id = isset($_GET['coupon_code']) ? $_GET['coupon_code'] : 0;
        $type    = isset($_GET['account_type']) ? $_GET['account_type'] : 0;

        $paginationAmount   = isset($_GET['paginationAmount']) && !empty($_GET['paginationAmount']) ? $_GET['paginationAmount'] : 10;
        $transactions       = Transactions::when($user_id > 0, function ($query) use ($user_id) {
                                    return $query->where('transactions.user_id', $user_id);
                                })
                                ->when($type > 0, function ($query) use ($type) {
                                    return $query->where('transactions.transaction_type', $type);
                                })
                                ->select('transactions.*')
                                ->simplePaginate($paginationAmount);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'transaction_type'  => 'required|integer',
            'date'              => 'required|date',
            'user_id'           => 'required|integer',
            'amount'            => 'required|numeric',
        );

        $validation = Validator::make(\Request::all(), $rules);

        if ($validation->fails()) {
            Sweetalert::error('Some required field missing.', 'Validation Error');
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $user_id    = Auth::user()->id;
        $data       = $request->all();

        DB::beginTransaction();

        try{
            $transaction                    = new Transactions;
            $transaction->user_id           = $data['user_id'];
            $transaction->transaction_type  = $data['transaction_type'];
            $transaction->date              = date('Y-m-d', strtotime($data['date']));
            $transaction->amount            = $data['amount'];

            if ($transaction->save())
            {   
                DB::commit();
                Sweetalert::success('Transaction added successfully', 'Success!!');
                return redirect()->route('transactions_index');
            }
        }catch (\Exception $exception){
            DB::rollback();
            Sweetalert::error('Something went wrong!!', 'Error');
            return redirect()->back();
        }
    }
}
