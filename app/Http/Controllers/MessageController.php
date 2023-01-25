<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;
use Auth;

class MessageController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $messages = Message::getDataDesc();
        } else {
            $customer = Customer::select('id')->where('user_id', Auth::user()->id)->first();
            $messages = Message::getDataByCustomerDesc($customer->id);
        }
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        return view('messages.create', compact('customer'));
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
            'message' => 'required',
        ]);
    
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        Message::store($request);
        Alert::toast('Pesan berhasil dikirim ke admin.', 'success');
        return redirect()->route('messages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        return view('messages.edit', compact('message', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'message' => 'required',
        ]);
    
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        Message::edit($request, $message);
        Alert::toast('Pesan berhasil diedit.', 'success');
        return redirect()->route('messages.index');
    }

    public function updateStatus(Message $message)
    {
        Message::updateStatus($message);
        Alert::toast('Status pesan berhasil diperbarui.', 'success');
        return redirect()->route('messages.index');
    }
}
