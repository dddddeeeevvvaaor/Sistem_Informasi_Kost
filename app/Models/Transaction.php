<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'payment_method',
        'total',
        'description',
        'status',
    ];

    /**
     * Get the customer that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get all of the transactionDetails for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public static function getData()
    {
        return Transaction::all();
    }

    public static function getDataDesc()
    {
        return Transaction::orderByDesc('created_at')->get();
    }

    public static function indexLimit()
    {
        return Transaction::orderByDesc('created_at')->limit(5)->get();
    }

    public static function getDataByCustomerDesc($customer_id)
    {
        return Transaction::where('customer_id', $customer_id)->orderByDesc('created_at')->get();

    }

    public static function store(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $payment_method = 'cash';
            $status = 'accept';
        } else {
            $payment_method = 'transfer';
            $status = 'pending';
        }

        $transaction = Transaction::create([
            'customer_id' => $request->customer_id,
            'payment_method' => $payment_method,
            'total' => $request->total,
            'description' => $request->description,
            'status' => $status,
        ]);
        return $transaction->id;
    }

    public static function edit(Request $request, Transaction $transaction)
    {
        if (Auth::user()->role == 'admin') {
            $transaction->update([
                'customer_id' => $request->customer_id,
                'total' => $request->total,
                'description' => $request->description,
            ]);

            } else {
                $transaction->update([
                    'customer_id' => $request->customer_id,
                    'total' => $request->total,
                    'description' => $request->description,
                ]);
                // $image = $request->file('image');
                // $image->storeAs('public/', $image->hashName());
            }
        }

    public static function updateStatus(Transaction $transaction)
    {
        $transaction->update([
            'status' => 'accept',
        ]);
    }
}
