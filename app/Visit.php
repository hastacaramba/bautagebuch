<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model {

    protected $table = 'visits';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'date',
        'time',
        'weather',
        'description',
        'project_id'
    ];

    /**
     * Get the project of the visit
     */
    public function project() {
        return $this->belongsTo('App\Project');
    }

    /**
     * Get the visitationnotes of the visit
     */
    public function visitationnotes() {
        return $this->hasMany('App\Visitationnote');
    }

    /**
     * Get the members of the visit
     */
    public function members() {
        return $this->belongsToMany('App\Member',  'member_visit');
    }
}
