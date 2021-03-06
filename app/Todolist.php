<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todolist extends Model
{
	use SoftDeletes;
    protected $fillable = ['todo', 'status'];
}
