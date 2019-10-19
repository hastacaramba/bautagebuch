<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    protected $table = 'members';

    protected $primaryKey = 'member_id';

    protected $fillable = [
        'responsibility'
    ];


    /**
     * Get the project of the member.
     */
    public function project() {
        return $this->hasOne('App\Project');
    }

    /**
     * Get the contact of the member.
     */
    public function contact() {
        return $this->hasOne('App\Contact');
    }

    /**
     * Get the subarea of the member.
     */
    public function subarea() {
        return $this->hasOne('App\Subarea');
    }

}
