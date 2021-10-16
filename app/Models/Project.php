<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    // protected $table = 'projects';
    //protected $fillable = ['title', 'url', 'description'];
    // protected $guarded es el inverso, es decir, cuáles campos no se van a modificar
    protected $guarded = []; // Se puede desactivar siempre que no se envíe request()->all()

    public function getRouteKeyName()
    {
        return 'url';
    }
}
