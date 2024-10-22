<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $taple = 'products';
    // insert data 
    protected $fillable = ['name', 'description', 'price', 'image' ,'category_id	'];// allowed columns to insert only, can't insert in another column.
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function customers(){
        return $this->belongsToMany(Customer::class);
    }
}
