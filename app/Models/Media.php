<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = "media_id";

    protected $fillable = ['media_type','media_id','duration','media_title','media_description','content_id'];

    public function content() {
        return $this->belongsTo(Content::class,'content_id');
    }
}
