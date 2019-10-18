<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'projects';

    protected $primaryKey = 'project_id';

    protected $fillable = [
        'name',
        'number',
        'street',
        'housenumber',
        'postcode',
        'city',
        'photo'
    ];

    /**
     * Get the projectnotes for the project.
     */
    public function projectnotes() {
        return $this->hasMany('App\Projectnote');
    }

    /**
     * Get the visits for the project.
     */
    public function visits() {
        return $this->hasMany('App\Visit');
    }

    /**
     * Get the documents for the project.
     */
    public function documents() {
        return $this->hasMany('App\Document');
    }

    /**
     * Get the members for the project.
     */
    public function members() {
        return $this->hasMany('App\Member');
    }
}
