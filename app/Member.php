<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    protected $table = 'members';

    protected $primaryKey = 'member_id';

    protected $fillable = [
        'role',
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

}
