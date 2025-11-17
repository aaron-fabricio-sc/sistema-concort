<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function kardex()
    {
        return $this->hasOne(Kardex::class, 'project_id');
    }
}
