<?php

namespace ASSoftware\Laravel\App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $primaryKey = 'path';
    public $incrementing = false;

    public function components()
    {
        return $this->belongsToMany('App\Component');
    }
}
