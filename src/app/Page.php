<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $primaryKey = 'name';
    public $incrementing = false;

    public function components()
    {
        return $this->belongsToMany('App\Component');
    }
}
