<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudActions extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_type',
        'object_id',
        'action'
    ];
}
