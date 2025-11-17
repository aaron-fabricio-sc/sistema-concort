<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchasingDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function article()
    {

        return $this->belongsTo(Article::class, "article_id", "id",);
    }

    // Cada detalle pertenece a un Kardex
    public function kardex()
    {
        return $this->belongsTo(Kardex::class);
    }
}
