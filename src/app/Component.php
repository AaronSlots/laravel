<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    public function type()
    {
        return $this->belongsTo('App\ComponentType');
    }

    
    public function data()
    {
        return $this->belongsTo('App\Data');
    }
    
    public function pages()
    {
        return $this->belongsToMany('App\Page');
    }
}
