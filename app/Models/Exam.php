<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable= ['date','course_id','completed'];

    public function getCourse()
    {
        return $this->belogsTo(Course::class);
    }


    public function getStudents()
    {
        return $this->belongsToMany(Student::class);
    }

   
}
