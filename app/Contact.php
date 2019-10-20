<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

    protected $table = 'contacts';

    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'firstname',
        'surname',
        'company',
        'street',
        'housenumber',
        'postcode',
        'city',
        'email',
        'phone',
        'mobile',
        'fax',
        'info',
    ];

    /**
     * Get the member objects of a contact.
     */
    public function members() {
        return $this->hasMany('App\Member', 'member_id', 'member_id');
    }

    /**
     * Get the projects of a contact through members.
     */
    public function projects() {
        return $this->hasManyThrough('App\Project','App\Member');
    }
}
