<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::getData();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::getDataAvailableRoom();
        return view('customers.create', compact('rooms'));
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
            'id_number' => 'required|max:20',
            'name' => 'required|max:255',
            'gender' => 'required',
            'room_id' => 'required',
            'phone_number' => 'max:15',
            'whatsapp_number' => 'max:15',
        ]);
    
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }
        
        Room::updateStatusNotAvailable($request->room_id);
        $room_name = Room::getName($request->room_id);
        $email = User::createEmail($room_name);
        $password = User::createPassword();
        $id = User::storeCustomer($request, $email, $password);
        Customer::store($request, $id);
        Alert::success(
            'Customer baru berhasil ditambahkan.', 
            'Email: <strong>' . $email . '</strong><br> Password: <strong>' . $password . '</strong>')
            ->toHtml()->persistent('Dismiss');
        return redirect()->route('customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $rooms = Room::getDataAvailableRoom();
        return view('customers.edit', compact('customer', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'id_number' => 'required|max:20',
            'name' => 'required|max:255',
            'gender' => 'required',
            'room_id' => 'required',
            'phone_number' => 'max:15',
            'whatsapp_number' => 'max:15',
            'email' => 'required',
        ]);
    
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        if ($customer->room_id != $request->room_id) {
            Room::updateStatusAvailable($customer->room_id);
            Room::updateStatusNotAvailable($request->room_id);
        }

        User::updateCustomer($request, $customer->user_id);
        Customer::edit($request, $customer);
        Alert::toast('Customer berhasil diupdate.', 'success')->autoClose(3000);
            
        return redirect()->route('customers.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Customer $customer)
    {
        Customer::updateStatus($customer);
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        Room::updateStatusAvailable($customer->room_id);
        User::destroy($customer->user_id);
        Alert::toast('Customer berhasil dihapus.', 'success')->autoClose(3000);
        return redirect()->route('customers.index');
    }
}