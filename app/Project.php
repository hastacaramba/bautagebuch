<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'projects';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'number',
        'street',
        'housenumber',
        'postcode',
        'city'
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

    /**
     * Get the media for the project.
     */
    public function media() {
        return $this->hasOne('App\Media');
    }
}
