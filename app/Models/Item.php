<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'detail',
        'inventory',
        'image',
        'status',
        'category_id'
    ];
    public $timestamps = false;


    public function categories(){
        return $this->belongsToMany(Category::class,'categories_items','item_id','category_id');
    }
}
