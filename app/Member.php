<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'contact_id',
        'subarea_id'
    ];


    /**
     * Get the project of the member.
     */
    public function project() {
        return $this->belongsTo('App\Project', 'project_id');
    }

    /**
     * Get the contact of the member.
     */
    public function contact() {
        return $this->belongsTo('App\Contact', 'contact_id');
    }

    /**
     * Get the subarea of the member.
     */
    public function subarea() {
        return $this->belongsTo('App\Subarea', 'subarea_id');
    }

    /**
     * Get the visits where the the member was present.
     */
    public function visits() {
        return $this->belongsToMany('App\Visit', 'presences');
    }

    /**
     * Get the visits with member subscriptions.
     */
    public function subscribedVisits() {
        return $this->belongsToMany('App\Visit', 'subscriptions');
    }

    /**
     * Get the visitationnotes the member is mentioned as concerned.
     */
    public function visitationnotes() {
        return $this->belongsToMany('App\Visitationnote', 'member_visitationnote');
    }

    /**
     * Get the projectnotes the member is mentioned as concerned.
     */
    public function projectnotes() {
        return $this->belongsToMany('App\Projectnote', 'member_projectnote');
    }

}
