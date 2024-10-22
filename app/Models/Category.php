<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $taple = 'categories';
    // insert data 
    protected $fillable = ['title', 'description'];// allowed columns to insert only, can't insert in another column.

    // protected $gurded = []; you are allowed to insert in any column;

    public function product(){
        return $this->hasMany(Product::class);
    }
}
