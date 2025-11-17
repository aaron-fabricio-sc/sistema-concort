<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function article()
    {

        return $this->belongsTo(Article::class, "article_id", "id",);
    }

    public function project()
    {

        return $this->belongsTo(Project::class, "project_id", "id",);
    }

    public function kardex()
    {
        return $this->belongsTo(Kardex::class);
    }
}
