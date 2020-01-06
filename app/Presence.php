<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $table = 'presences';

    protected $primaryKey = 'id';

    protected $fillable = [
        'visit_id',
        'member_id',
    ];

}
