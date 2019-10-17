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
        'city',
        'photo'
    ];


}
