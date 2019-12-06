<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
    protected $table = 'subscriptions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'visit_id',
        'member_id',
    ];

}
