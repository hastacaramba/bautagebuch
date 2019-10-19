<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitationnote extends Model {

    protected $table = 'visitationnotes';

    protected $primaryKey = 'visitationnote_id';

    protected $fillable = [
        'category',
        'title',
        'notes',
        'image1',
        'image2',
        'image3',
        'file1',
        'file2',
        'file3',
        'deadline',
        'done',
        'visit_id'
    ];

    /**
     * Get the visit of the visitationnote.
     */
    public function visit() {
        return $this->hasOne('App\Visit');
    }

    /**
     * Get the project of the visitationnote through visit.
     */
    public function project() {
        return $this->hasOneThrough('App\Project', 'App\Visit');
    }
}
