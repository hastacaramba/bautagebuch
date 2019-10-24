<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {

    protected $table = 'documents';

    protected $primaryKey = 'id';

    protected $fillable = [
        'filename',
        'project_id'
    ];

    /**
     * Get the project of the visit
     */
    public function project() {
        return $this->hasOne('App\Project');
    }
}
