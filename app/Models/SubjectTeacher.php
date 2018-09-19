<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
  public function teacher()
  {
    return $this->belongsTo(Teacher::class);
  }

  public function subject()
  {
    return $this->belongsTo(Subject::class);
  }
}
