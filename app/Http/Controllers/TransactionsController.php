<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Wavey\Sweetalert\Sweetalert;

//Models
use App\Models\Transactions;
use App\Models\Users;
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
            $transaction->date              = date('Y-m-d');
            $transaction->amount            = $data['amount'];

            $fee = $this->userBalanceUpdate($data['user_id'], $data['transaction_type'], $data['amount'], date('Y-m-d'));

            $transaction->fee               = $fee;

            if ($transaction->save())
            {     
                DB::commit();
                Sweetalert::success('Transaction added successfully', 'Success!!');
                return redirect()->route('transactions_index');
            }
        }catch (\Exception $exception){
            DB::rollback();
            dd($exception);
            Sweetalert::error('Something went wrong!!', 'Error');
            return redirect()->back();
        }
    }

    function userBalanceUpdate($user_id, $type, $amount, $date)
    {
        if($type == 1) // 1= Deposit, 2= Withdrawal
        {
            $balance_update             = Users::find($user_id);
            $balance_update->balance    = $balance_update['balance'] + $amount;
            $balance_update->save();

            $fee = 0;
        }
        else
        {   
            $this_month_withdraw    = Transactions::whereYear('date', date('Y'))
                                            ->whereMonth('date', date('m'))
                                            ->where('transaction_type', 2)
                                            ->where('user_id', $user_id)
                                            ->sum('amount');

            $total_withdraw         = Transactions::where('transaction_type', 2)
                                            ->where('user_id', $user_id)
                                            ->sum('amount');

            if($this_month_withdraw < 5000)
            {
                //The first 5K withdrawal each month is free.
                $monthly_chargable_amount   =  $this_month_withdraw + $amount <= 5000 ? 0 : ($this_month_withdraw + $amount) - 5000;

                $chargable_amount   = $monthly_chargable_amount <= 1000 ? 0 : $monthly_chargable_amount - 1000;
            }
            else
            {
                //The first 1K withdrawal per transaction is free, and the remaining amount will be charged.
                $chargable_amount   = $amount <= 1000 ? 0 : $amount - 1000;
            }
            
            $individual_fee     = 0.015*$chargable_amount;

            if($total_withdraw < 50000)
            {
                $bussiness_fee      = 0.025*$chargable_amount;
            }
            else 
            {
                //Decrease the withdrawal fee to 0.015% for Business accounts after a total withdrawal of 50K.
                $bussiness_fee      = 0.015*$chargable_amount;
            }

            $transaction_day    = date("l", strtotime($date)); //Get current day of the week
            if($transaction_day == 'Friday') //Each Friday withdrawal is free of charge.
            {
                $fee = 0;
            }
            else
            {
                $balance_update  = Users::find($user_id);

                if($balance_update->account_type == 1)
                {
                    $fee = $individual_fee;
                }
                else
                {  
                    $fee = $bussiness_fee;
                }

                $balance_update->balance    = $balance_update['balance'] - $amount - $fee;
                $balance_update->save();
            }
        }

        return $fee;
    }
}
