<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $table = "arts";

    protected $fillable = [
        "user_id",
        "directory",
        "name",
        "description",
        "category_id",
        "rate",
        "price",
        "price_per_person",
        "more_person",
        "discount",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
