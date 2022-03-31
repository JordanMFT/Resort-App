<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Resort extends Model
{

    // protected $guarded = [];

    protected $fillable = [
        'name',
        'description',
        'city',
        'price',
        'image',
    ];

        // You have to create this relationship before your listing can work
    public function resort()
    {
        return $this->hasOne(Resort::class, 'id');
    }

    use HasFactory;
}