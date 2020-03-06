<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $table = 'pdf';

    protected $primaryKey = 'id';

    protected $fillable = [
        'filename',
        'info',
        'project_id',
        'visit_id'
    ];

    /**
     * Get the project of the pdf.
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

}
