<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subarea extends Model
{
    protected $table = 'subareas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title'
    ];

    /**
     * Get the member objects of a contact.
     */
    public function members() {
        return $this->hasMany('App\Member');
    }

    /**
     * Get the projects that have such a subarea.
     */
    public function projects() {
        return $this->hasManyThrough('App\Project','App\Member');
    }

    /**
     * Get the contacts that do a certain subarea.
     */
    public function contacts() {
        return $this->hasManyThrough('App\Contact','App\Member');
    }


}
