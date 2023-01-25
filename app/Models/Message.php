<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id', 'message', 'status'];

    /**
     * Get the customer that owns the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function getDataDesc()
    {
        return Message::orderByDesc('created_at')->get();
    }

    public static function getDataDescLimit()
    {
        return Message::orderByDesc('created_at')->limit(5)->get();
    }

    public static function getDataByCustomerDesc($customer_id)
    {
        return Message::where('customer_id', $customer_id)->orderByDesc('created_at')->get();

    }

    public static function store(Request $request)
    {
        Message::create([
            'customer_id' => $request->customer_id,
            'message' => $request->message,
        ]);
    }

    public static function edit(Request $request, Message $message)
    {
        $message->update([
            'customer_id' => $request->customer_id,
            'message' => $request->message,
        ]);
    }

    public static function updateStatus(Message $message)
    {
        $message->update([
            'status' => 'accept',
        ]);
    }
}
