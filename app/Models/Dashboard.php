<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class Dashboard extends Model
{
    use HasFactory;

    //
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function index()
    {
        return Dashboard::with('customer')->where('id', Auth::user()->id)->get();
    }
}
