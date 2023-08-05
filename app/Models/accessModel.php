<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accessModel extends Model
{
    use HasFactory;
    protected $table = 'acesss_models';
    protected $primarykey ='id';

    protected $fillable = [
        'name',
           
    ];
}
