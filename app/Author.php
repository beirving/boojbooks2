<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * Adding fillable to allow for mass-assignment
     * Example
     * protected $fillable = [
     *  'name',
     *  'birthday',
     *  'biography'
     * ];
     */

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
