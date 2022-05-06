<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

/**CRUD
     * Listado -> Index --LISTO
     * Form Creación -> create --LISTO
     * Guardar a DB -> store --LISTO
     * Ver Detalle -> show --LISTO
     * Form Editar -> edit --LISTO
     * Guardar Cambios a la DB -> update --LISTO
     * Eliminar -> delete --LISTO
     */ 
class ProductoController extends Controller
{
    //proteger rutas con middleware por medio del cosntructor
    public function __construct()
    {
        /*$this->middleware('can:producto.create')->only('create', 'store');
        $this->middleware('can:producto.edit')->only('edit', 'update'); //solo los autorizados con este permiso podran acceder a estas vistas
        $this->middleware('can:producto.destroy')->only('destroy');
        */
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('search'));
            $productos = Producto::where('titulo', 'LIKE', '%' . $query . '%')
            ->orderBy('titulo', 'asc')
            ->get();

       return view('farmaciapaoki.productoIndex', ['productos' => $productos, 'search' => $query]);
        }
        //$productos = Producto::get();
        //return view('farmaciapoki.productoIndex', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farmaciapaoki.productoForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Producto  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required',
            'foto'=>'required',
            'descripcion'=>'required',
            'precioU'=>'required',
            'precioV'=>'required',
            'cantidadP'=>'required'
        ]);

        $productos = Producto::create($request->all());
        return redirect()->route('producto.show', $productos)->with('mensajeAlert4', '*Agregado Exitosamente*');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $sucursales = Sucursal::get();
        $productos = Producto::find($id);
        return view ('farmaciapaoki.productoShow', compact('productos','sucursales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view ('farmaciapaoki.productoForm', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'titulo'=>'required | max:50',
            'foto' => 'required',
            'descripcion'=>'required | min:10',
            'precioU'=>'required | max:10',
            'precioV'=>'required | max:10',
            'cantidadP'=>'required | max:10'
        ]);

        Producto::where('id', $producto->id)->update($request->except('_token','_method'));

        return redirect()->route('producto.show', $producto)->with('mensajeAlert3', '*Actualizado Exitosamente*');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index')->with('mensajeAlert', '*Eliminado Exitosamente*');
    }

    /**
     * AGERGA UNA SUCURSAL A UN PRODUCTO
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function agregaSucursal(Request  $request,Producto $producto)
    {
       $producto->sucursales()->sync($request->sucursal_id);

       return redirect()->route('producto.show',$producto)->with('mensajeAlert2', '*Agregado Exitosamente*');
    }
}
