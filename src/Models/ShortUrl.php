<?php

namespace Aysetas\ShortlyPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'url',
        'hits'
    ];

}
