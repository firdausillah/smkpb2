<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function grades()
    {
        return $this->hasOne(Grade::class, 'id', 'grade');
    }
}
