<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grades(){
        return $this->belongsTo(Grade::class);
    }

    public function image(){
        return $this->belongsToMany(Image::class);
    }

    public function images($id){
        return Image::where('galery', $id)->get('image');
    }
}
