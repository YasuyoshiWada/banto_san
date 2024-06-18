<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Category extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'name',
        'status',
        'image',
        'category_id',
    ];
    public function item()
    {
        return $this->belongsToMany(Item::class,'categories_items','category_id','item_id');
    }
}
