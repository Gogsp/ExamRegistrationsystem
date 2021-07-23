<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class University extends Model
{
    use HasFactory;

    protected $table = 'universities';

    protected $fillable= ['name','description','logo'];

    protected $hidden = 'id';

    public function getFaculties()
    {
        return $this->hasMany(Faculty::class,'uni_id')->get();
    }

    public function getNews()
    {
        return $this->hasMany(News::class,'uni_id')->get();
    }
}
 