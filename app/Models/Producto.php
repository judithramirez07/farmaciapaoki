<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['titulo', 'foto', 'descripcion', 'precioU', 'precioV', 'cantidadP','url'];
    
    public function sucursales()
    {
        return  $this->belongsToMany(Sucursal::class);
    }

}