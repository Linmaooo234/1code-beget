<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'row_number',
        'seat_number',
        'category',
        'price',
        'purchase_date',
        'afisha_id',
        'user_id'
    ];

    public function afisha()
    {
        return $this->belongsTo(Afisha::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
