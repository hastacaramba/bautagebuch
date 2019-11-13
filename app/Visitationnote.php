<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitationnote extends Model {

    protected $table = 'visitationnotes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category',
        'title',
        'notes',
        'deadline',
        'done',
        'visit_id'
    ];

    /**
     * Get the visit of the visitationnote.
     */
    public function visit() {
        return $this->hasOne('App\Visit');
    }

    /**
     * Get the project of the visitationnote through visit.
     */
    public function project() {
        return $this->hasOneThrough('App\Project', 'App\Visit');
    }

    /**
     * Get the media of the visitationnote.
     */
    public function media() {
        return $this->hasMany('App\Media');
    }
}
