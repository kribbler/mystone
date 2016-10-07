<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    public $timestamps = true;
    protected $fillable = ['user_id', 'file_name'];
}