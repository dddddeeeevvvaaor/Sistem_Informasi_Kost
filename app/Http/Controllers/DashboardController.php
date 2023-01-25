<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Customer;
use App\Models\Facility;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::getData();
        $facilities = Facility::index();
        return view('dashboard.customer', compact('customers', 'facilities'));
        
    }

    public function indexAdmin()
    {
        $rooms = Room::count();
        $roomsavailable = Room::where('status', '=', 'available')->count();
        $customers = Customer::where('status', '=', 'active')->count();
        $facilities = Facility::count();
        $transactions = Transaction::indexLimit();
        $messages = Message::getDataDescLimit();
        return view('dashboard.admin', compact('rooms','facilities', 'transactions', 'roomsavailable', 'customers', 'messages'));
        
    }
}
