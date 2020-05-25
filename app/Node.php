<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany('App\Node', 'parent_node', 'id')->orderBy('order');
    }

    public function parent()
    {
        return $this->hasOne('App\Node', 'id', 'parent_node');
    }
}
