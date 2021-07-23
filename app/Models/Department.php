<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable= ['name','faculty_id'];

    public function getUniversity()
    {
        $faculty = $this->getFaculty();
        return $faculty->getUniversity();
        //return $this->belongsTo(University::class,'uni_id')->get()->first();
    }

    public function getFaculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id')->get()->first();
    }

    public function getCourses()
    {
            return $this->hasMany(Course::class);
    }


}
