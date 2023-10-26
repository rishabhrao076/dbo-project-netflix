<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genre';

    protected $primaryKey = 'genre_id';

    public $timestamps = false;

    protected $fillable = [
        'genre_code',
        'genre',
    ];
}
