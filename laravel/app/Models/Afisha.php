<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afisha extends Model
{
    use HasFactory;

    protected $fillable = [
        'nametov',
        'description',
        'data',
        'img',
        'nedelya',
        'chislo',
        'year',
        'month',
        'status',
        'time'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
