<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = "faculties";

    protected $fillable= ['uni_id','name'];

    public function getUniversity()
    {
        return $this->belongsTo(University::class,'uni_id')->get()->first();
    }

    public function getDepartments()
    {
        return $this->hasMany(Department::class);
    }
}
