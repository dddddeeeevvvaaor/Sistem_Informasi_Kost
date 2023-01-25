<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['transaction_id', 'month'];

    /**
     * Get the transaction that owns the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public static function countByTransaction($id)
    {
        return TransactionDetail::where('transaction_id', $id)->count();
    }

    public static function store(Request $request, $id)
    {
        foreach ($request->month as $month)
        {
            TransactionDetail::create([
                'transaction_id' => $id,
                'month' => $month,
            ]);
        }
    }

    public static function destroyByTransaction($id)
    {
        TransactionDetail::where('transaction_id', $id)->delete();
    }
}
