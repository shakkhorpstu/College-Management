<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function subjects()
    {
    	return $this->hasMany(Subject::class);
    }
}
