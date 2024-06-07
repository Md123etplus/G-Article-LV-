<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function proprietaire(){
        return $this->belongsTo(User::class,'user_id');
    }
}
