<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function envios()
    {
        return $this->hasMany(Envio::class, 'kardex_id');
    }
    public function purchasingDetails()
    {
        return $this->hasMany(\App\Models\purchasingDetails::class, 'kardex_id');
    }
}
