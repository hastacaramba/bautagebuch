<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {

    protected $table = 'documents';

    protected $primaryKey = 'document_id';

    protected $fillable = [
        'filename'
    ];

    /**
     * Get the project of the visit
     */
    public function project() {
        return $this->hasOne('App\Project');
    }
}
