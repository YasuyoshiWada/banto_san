<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class)->withPivot('quantity', 'price')->withTimestamps();
    }

    public $timestamps = false;

    protected $fillable = [
        'name', 'price', 'detail', 'inventory', 'image', 'status', 'category_id',
    ];
}

