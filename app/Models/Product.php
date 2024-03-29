<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/******* Models *********/
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function brand(){
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function size(){
        return $this->hasOne(Size::class, 'id', 'size_id');
    }

}
