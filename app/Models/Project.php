<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "repo_path",
        "slug",
        "cover_img",
        "description",
        "type_id",
    ] ;


    public function getDescriptionIndex($chars = 50){
        return strlen($this->description) > $chars ? substr($this->description, 0, $chars) ."...": $this->description ;
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function getTypeColor(){
        return $this->type ? "background-color:{$this->type->color}" : "background-color: #FFFFFF";
    }

    public function getTypeBadge(){
        return $this->type ? "<span class='badge' style='background-color:{$this->type->color}'>{$this->type->label}</span>" : "<span> Untyped </span>";
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }

    public function getTechnologyBadges(){
        $_technologies = "";
        foreach($this->technologies as $technology){
            $_technologies .= "<span class='badge mx-1' style='background-color:{$technology->color}'>{$technology->label}</span>";
        }
        return $_technologies;
    }
}