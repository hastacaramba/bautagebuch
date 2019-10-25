<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExportData extends Model
{
    protected $table = 'exportdata';

    protected $primaryKey = 'id';

    protected $fillable = [
        'idString',
        'data'
    ];
}
