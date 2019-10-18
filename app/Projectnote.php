<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectnote extends Model {

    protected $table = 'projectnotes';

    protected $primaryKey = 'projectnote_id';

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
        'done'
    ];

    /**
     * Get the project of the projectnote.
     */
    public function project() {
        return $this->hasOne('App\Project');
    }
}
