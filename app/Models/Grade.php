<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function news(){
        return $this->belongsTo(News::class);
    }
    
    public function testimonial(){
        return $this->belongsTo(Testimonial::class);
    }

    public function galery(){
        return $this->belongsTo(Galery::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
