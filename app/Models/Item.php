<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


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
        return $this->belongsToMany(Category::class,'categories_items','item_id','category_id')
        ->withPivot('category_id');
    }
}
