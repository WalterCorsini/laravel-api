<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Project extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['title','description','slug','cover_image','type_id'];

    //relations
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    //Mutators
    public function setTitleAttribute($title){
       $this->attributes['slug'] = Str::slug($title);
       $this->attributes['title'] = $title;
    }

    //Query Scopes  // don't work
    public function scopeRecent($query){
        return $query->where('created_at', '>=', Carbon::now()->subDay(2));
    }

    public function scopeFilterByTechnologyId($query, $technologyId)
    {
        return $query->whereHas('technologies', function ($query) use ($technologyId) {
            $query->where('technology_id', $technologyId);
        });
    }
}
    // // Accessor
    // public function getCoverImageAttribute($cover_image){
    //      return $this->attributes['cover_image'] = asset("storage/$cover_image");
    //  }


