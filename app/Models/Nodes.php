<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Nodes extends Model
{
    use HasFactory;

    public static function parentNodes($target_node_id)
    {
        $recursive_query = self::targetNodeQuery($target_node_id)
                          ->unionAll(
                              self::parentsRecursiveQuery()
                          );

        return self::recursive_tree_query($recursive_query);
    }

    public static function childNodes($target_node_id) 
    {
        $recursive_query = self::targetNodeQuery($target_node_id)
                          ->unionAll(
                              self::childrenRecursiveQuery()
                          );

        return self::recursive_tree_query($recursive_query);
    }

    private static function targetNodeQuery($target_node_id)
    {
        return DB::table("nodes")
            ->where("id", $target_node_id)
            ->selectRaw("id, parent_id, created_at, 
            updated_at, deleted_At, name, CAST(id as CHAR(200))");
                
    }

    private static function recursive_tree_query($recursive_query)
    {
        return DB::table("node_tree")
        ->select("id", "name", "created_at", "updated_at", "deleted_at" )
        ->withRecursiveExpression("node_tree", $recursive_query, ["id", "parent_id",
        "created_at", "updated_at", "deleted_at", "name", "path"]);
    }

    private static function parentsRecursiveQuery()
    {
        return  DB::table("nodes")
        ->selectRaw("nodes.id, nodes.parent_id, nodes.created_At, 
        nodes.updated_at, nodes.deleted_At, nodes.name, CONCAT(node_tree.path, ',', nodes.id)")
        ->join("node_tree", "node_tree.parent_id", "=", "nodes.id");
    }

    private static function childrenRecursiveQuery()
    {
        return  DB::table("nodes")
        ->selectRaw("nodes.id, nodes.parent_id, nodes.created_At, 
        nodes.updated_at, nodes.deleted_At, nodes.name, CONCAT(node_tree.path, ',', nodes.id)")
        ->join("node_tree", "node_tree.id", "=", "nodes.parent_id");
    }

}

