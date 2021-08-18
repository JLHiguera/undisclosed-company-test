<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nodes extends Model
{
    use HasFactory;
    public function childrenNodes()
    {
        return $this->hasMany('App\models\nodes', 'parent_id', 'id');
    }

    public function allChildrenNodes()
    {
        return $this->childrenNodes()->with('allChildrenNodes');
    }

    public function parentsNodes() {
        return $this->belongsTo('App\models\nodes', 'parent_id', 'id');
    }

    public function allParentsNodes() {
        return $this->parentsNodes()->with('allParentsNodes');
    }

}

