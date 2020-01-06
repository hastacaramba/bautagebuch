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
        'project_id',
        'responsible'
    ];

    /**
     * Get the project of the visit
     */
    public function project() {
        return $this->belongsTo('App\Project');
    }

    /**
     * Get the responsible user
     */
    public function responsible() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the visitationnotes of the visit
     */
    public function visitationnotes() {
        return $this->hasMany('App\Visitationnote');
    }

    /**
     * Get the present members of the visit.
     */
    public function members() {
        return $this->belongsToMany('App\Member',  'presences');
    }

    /**
     * Get the subscribed members of the visit.
     */
    public function subscribedMembers() {
        return $this->belongsToMany('App\Member',  'subscriptions');
    }

    /**
     * Get the media of the visit.
     */
    public function media() {
        return $this->hasMany('App\Media');
    }

    /**
     * Get the reports of the visit.
     */
    public function reports() {
        return $this->hasMany('App\Report', 'user_id');
    }

}
