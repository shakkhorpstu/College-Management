<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function department()
    {
      return $this->belongsTo(Department::class);
    }

    public function subject()
    {
      return $this->belongsTo(Subject::class);
    }
}
