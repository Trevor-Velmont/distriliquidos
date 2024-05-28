<?php

// namespace App\Http\Controllers;
// use App\Models\Producto;


// use Illuminate\Http\Request;

// class CatalogController extends Controller
// {   
//     public function catalog()
//     {
//         $productos = Producto::all();

//         return view('layout/catalog', compact('productos'));
//     }
// }



namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;


class CatalogController extends Controller
{
    public function catalog(Request $request)
    {
        $query = Producto::query();

        if ($request->filled('tipoBebida')) {
            $query->where('tipoBebida', $request->input('tipoBebida'));
        }

        if ($request->filled('marcaBebida')) {
            $query->where('marca', $request->input('marcaBebida'));
        }

        $productos = $query->get();

        if ($request->ajax()) {
            return view('partials.productos', compact('productos'))->render();
        }

        return view('layout.catalog', compact('productos')); // Aquí asegúrate de que la ruta de la vista sea correcta
    }

    public function getMarcas(Request $request)
    {
        if ($request->filled('tipoBebida')) {
            $marcas = Producto::where('tipoBebida', $request->input('tipoBebida'))
                              ->distinct()
                              ->pluck('marca');

            return response()->json($marcas);
        }

        return response()->json([]);
    }
}

