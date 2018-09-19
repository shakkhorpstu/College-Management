<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  // public static function thisSubject($departmentId)
  // {
  // 	$department = Department::find($departmentId);
  // 	if($department != null){
  // 		return $department->name;
  // 	}
  // 	else{
  // 		return 'Department not found';
  // 	}
  // }
}
