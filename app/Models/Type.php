<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name','color'];

    // relations
    public function projects(){
        return $this->hasMany(Project::class);
    }

    //QueryScopes
    public function scopeWhereId($query, $id){
        return $query->where('id', $id)->first();
    }
}
