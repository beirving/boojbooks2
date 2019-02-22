<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Adding fillable to allow for mass-assignment
     * Example
     * protected $fillable = [
     *  'title',
     *  'publication_date',
     *  'description',
     *  'pages'
     * ];
     */

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
