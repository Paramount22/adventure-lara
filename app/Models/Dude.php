<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dude extends Model
{
    protected $fillable = ['user_id', 'title', 'text', 'slug'];

    /**
     * Namiesto id bude v url adrese slug
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Dude can have many tags
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /** MUTATOR
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
        $this->attributes['slug'] = Str::of($value)->slug('-'); // vygeneruje sa v db aj slug
    }

    /** ACCESSOR
     * @return mixed|string
     */
    public function getSaveTextAttribute ()
    {
        return  nl2br($this->text) ; // vytvorime odstavce v postoch budu osetrene proti csrf
    }

    /**
     * @return mixed
     */
   /* public function totalDudes()
    {
        return app('db')->select(" -- noinspection SqlDialectInspectionForFile
            
            select count(id) as total from dudes
        
        ");
    }

    public function totalComments()
    {
        return app('db')->select(" -- noinspection SqlDialectInspectionForFile
            
            select count(id) as total from comments
        
        ");
    }*/


}
