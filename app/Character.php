<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/characters/{$this->id}";
    }
}
