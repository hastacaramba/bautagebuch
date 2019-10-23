<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    protected $table = 'members';

    protected $primaryKey = 'member_id';

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
     * Get the visits of the member.
     */
    public function visits() {
        return $this->belongsToMany('App\Visit', 'member_visit');
    }
}
