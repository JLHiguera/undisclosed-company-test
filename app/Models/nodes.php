<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

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


    public static function allChildrenFluent($target_node_id)   {
        return DB::select("WITH RECURSIVE node_tree (id, parent_id, 
                    created_at, updated_At, deleted_at, name, path) AS ( 
            SELECT id, parent_id, created_At, 
                    updated_at, deleted_At, name, CAST(id as CHAR(200))
            from nodes
            WHERE id = :target_node
            UNION ALL
            SELECT node.id, node.parent_id,  
                    node.created_At, node.updated_at, 
                    node.deleted_At, node.name, 
                    CONCAT(node_tree.path, ',', node.id)
            FROM node_tree as node_tree JOIN nodes AS node on node_tree.id = node.parent_id
        )
        SELECT id, name, created_at, updated_at, deleted_at FROM node_tree;", [$target_node_id]);
    }

    public static function allParentsFluent($target_node_id)    {
        return DB::select("WITH RECURSIVE node_tree (id, parent_id, 
                    created_at, updated_At, deleted_at, name, path) AS ( 
            SELECT id, parent_id, created_At, 
                    updated_at, deleted_At, name, CAST(id as CHAR(200))
            from nodes
            WHERE id = :target_node
            UNION ALL
            SELECT node.id, node.parent_id,  
                    node.created_At, node.updated_at, 
                    node.deleted_At, node.name, 
                    CONCAT(node_tree.path, ',', node.id)
            FROM node_tree as node_tree JOIN nodes AS node on node_tree.parent_id = node.id
        )
        SELECT id, name, created_at, updated_at, deleted_at FROM node_tree;", [$target_node_id]);
    }

}

