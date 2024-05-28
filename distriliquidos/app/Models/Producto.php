<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'idProducto'; // Especificar la clave primaria si no sigue la convención de Laravel

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'nombre',
        'sabor',
        'descripAdicional',
        'material',
        'capacidad',
        'unidades',
        'tipoBebida',
        'marca',
        'existencias',
        'precioCompra',
        'precioVenta',
        'imagen',
        'rutaImagen',
    ];

    // Opcionalmente, si no quieres que se asignen fechas de creación y actualización
    public $timestamps = false;

    // Especificar los tipos de datos de las columnas
    protected $casts = [

        
        'capacidad' => 'double', // El formato '4,3' no es compatible directamente, se trata como 'double'
        'unidades' => 'int',
        'existencias' => 'int',
        'precioCompra' => 'decimal:2', // Dos decimales
        'precioVenta' => 'decimal:2',
        'imagen' => 'binary', // No es necesario castear 'longblob'
    ];
}