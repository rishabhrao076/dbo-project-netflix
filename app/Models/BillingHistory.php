<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingHistory extends Model
{
    use HasFactory;

    protected $table = 'billing_history';

    protected $primaryKey = 'billing_id';

    public $timestamps = false;

    protected $fillable = [
        'transaction_id',
        'billing_address',
        'amount_paid',
        'plan',
        'user_id',
    ];
}
