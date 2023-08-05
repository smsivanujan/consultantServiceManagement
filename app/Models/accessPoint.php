<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accessPoint extends Model
{
    use HasFactory;
    protected $table = 'acesss_points';
    protected $primarykey = 'id';

    protected $fillable = [
        'display_name',
        'value'

    ];
}
