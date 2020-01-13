<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $guarded = ["id"];
    protected $casts = [
		'parameters' => 'array',
		'headers' => 'array'
    ];
}
