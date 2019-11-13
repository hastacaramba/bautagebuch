<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectnote extends Model {

    protected $table = 'projectnotes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category',
        'title',
        'notes',
        'deadline',
        'done',
        'project_id'
    ];

    /**
     * Get the project of the projectnote.
     */
    public function project() {
        return $this->hasOne('App\Project');
    }

    /**
     * Get the media of the projectnote.
     */
    public function media() {
        return $this->hasMany('App\Media');
    }
}
