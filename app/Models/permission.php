<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $primarykey ='id';

    protected $fillable = [
        'permision',
           
    ];
}
