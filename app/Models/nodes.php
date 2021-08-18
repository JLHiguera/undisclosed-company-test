<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nodes extends Model
{
    use HasFactory;
    public function childrenAccounts()
    {
        return $this->hasMany('App\models\nodes', 'parent_id', 'id');
    }

    public function allChildrenAccounts()
    {
        return $this->childrenAccounts()->with('allChildrenAccounts');
    }

    public function parentsAccounts() {
        return $this->belongsTo('App\models\nodes', 'parent_id', 'id');
    }

    public function allParentsAccounts() {
        return $this->parentsAccounts()->with('allParentsAccounts');
    }

}

