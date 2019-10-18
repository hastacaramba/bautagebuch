<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model {

    protected $table = 'visits';

    protected $primaryKey = 'visit_id';

    protected $fillable = [
        'title',
        'date',
        'time',
        'notes'
    ];

    /**
     * Get the project of the visit
     */
    public function project() {
        return $this->hasOne('App\Project');
    }

    /**
     * Get the visitationnotes of the visit
     */
    public function visitationnotes() {
        return $this->hasMany('App\Visitationnote');
    }
}
