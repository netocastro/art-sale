<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_people',
        'user_id',
        'art_id',
        'note',
        'price',
        'delivered',
        'deadline',
        'reference_photo_directory'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function art()
    {
        return $this->belongsTo(Art::class);
    }
}
