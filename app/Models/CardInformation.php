<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardInformation extends Model
{
    use HasFactory;

    protected $table = 'card_information';

    protected $primaryKey = 'card_id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'card_number',
        'cvv',
        'expiry',
        'user_id',
    ];
}
