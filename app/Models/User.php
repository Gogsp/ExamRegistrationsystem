<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image_path',
        'index_no',
        'uni_id',
        'fac_id',
        'dept_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getExams()
    {
        return $this->belongsToMany(Exam::class);
    }


    public function getDepartment()
    {
        return $this->belongsTo(Department::class,'dept_id')->get()->first();
    }

    public function getAppliedExams()
    {
        return $this->hasMany(StudentExam::class,'student_id')->get(['exam_id']);
    }
}
