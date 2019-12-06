<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $primaryKey = 'id';

    protected $fillable = [
        'visit_id',
        'filename'
    ];

    public function visit() {
        return $this->belongsTo('App\Visit');
    }

}
