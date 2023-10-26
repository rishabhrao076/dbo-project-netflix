<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    protected $primaryKey = 'language_id';

    public $timestamps = false;

    protected $fillable = [
        'langugae_code',
        'language',
    ];
}
