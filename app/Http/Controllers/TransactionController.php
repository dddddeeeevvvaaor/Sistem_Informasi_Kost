<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $transactions = Transaction::getDataDesc();
        } else {
            $customer = Customer::select('id')->where('user_id', Auth::user()->id)->first();
            $transactions = Transaction::getDataByCustomerDesc($customer->id);
        }
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::getDataActiveCustomer();
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        return view('transactions.create', compact('customers', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'month' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        $id = Transaction::store($request);
        TransactionDetail::store($request, $id);
        Alert::toast('Transaksi baru berhasil dibuat.', 'success');
        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $countMonth = TransactionDetail::countByTransaction($transaction->id);
        return view('transactions.detail', compact('transaction', 'countMonth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $customers = Customer::getDataActiveCustomer();
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $details = TransactionDetail::where('transaction_id', $transaction->id)->get();
        return view('transactions.edit', compact('transaction', 'customers', 'customer', 'details'));
    }

    public function updateStatus(Transaction $transaction)
    {
        Transaction::updateStatus($transaction);
        Alert::toast('Status transaksi berhasil diperbarui.', 'success');
        return redirect()->route('transactions.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'month' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }
        Transaction::edit($request, $transaction);
        TransactionDetail::destroyByTransaction($transaction->id);
        TransactionDetail::store($request, $transaction->id);
        Alert::toast('Transaksi berhasil diperbarui.', 'success');
        return redirect()->route('transactions.index');
    }
}
