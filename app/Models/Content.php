<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'contents';

    protected $primaryKey = "content_id";

    protected $fillable = ['title','description','rating','director','content_type'];

    public function media() {
        return $this->hasMany(Media::class);
    }

    public function languages() {
        return $this->belongsToMany(Language::class,'content_language','content_id','language_id');
    }

    public function genres() {
        return $this->belongsToMany(Genre::class,'content_genre','content_id','genre_id');
    }
}
