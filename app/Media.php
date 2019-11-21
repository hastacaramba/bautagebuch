<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $primaryKey = 'id';

    protected $fillable = [
        'filename',
        'info',
        'project_id',
        'visit_id',
        'visitationnote_id',
        'projectnote_id'
    ];

    /**
     * Get the project of the media.
     */
    public function project() {
        return $this->belongsTo('App\Project', 'project_id');
    }

    /**
     * Get the visit of the media.
     */
    public function visit() {
        return $this->belongsTo('App\Visit', 'visit_id');
    }

    /**
     * Get the visitationnote of the media.
     */
    public function visitationnote() {
        return $this->belongsTo('App\Visitationnote', 'visitationnote_id');
    }

    /**
     * Get the projectnote of the media.
     */
    public function projectnote() {
        return $this->belongsTo('App\Projectnote', 'projectnote_id');
    }

}
