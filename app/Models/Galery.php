<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grades()
    {
        return $this->hasOne(Grade::class, 'id', 'grade');
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public function images($id){
        return Image::where('galery', $id)->get('image');
    }
}
