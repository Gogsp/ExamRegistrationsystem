<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable= ['name','department_id'];

    public function getDepartment()
    {
        return $this->belongsTo(Department::class,'department_id')->get()->first();
    }

    public function getExams()
    {
        return $this->hasMany(Exam::class);
    }



}
