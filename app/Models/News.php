<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $fillable= ['uni_id','title','details','image'];

    public function getUniversity()
    {
        return $this->belongsTo(University::class,'uni_id')->get()->first();
    }

}
