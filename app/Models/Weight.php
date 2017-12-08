<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $table = 'weights';

	protected $guarded = ['id'];

    protected $primaryKey = 'id';
}
