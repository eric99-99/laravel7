<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $fillable = ['description', 'code','rate_euro', 'date_paid', 'grand_total' ];

    public function detail()
    {
        return $this->HasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
}
