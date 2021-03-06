<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_detail';
    protected $fillable = ['transaction_id', 'category_type','trans_name', 'total'];

    public function header()
    {
         return $this->hasOne(Transaction::class);
    }
}
