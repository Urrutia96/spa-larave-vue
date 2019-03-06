<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articulo;
use Str;

class ApiController extends Controller
{
    
    public function blog(Request $request){
        $blog = Articulo::orderBy('id','DESC')->SimplePaginate(6);
        return response()->json($blog);
    }

    public function articulo(Request $request){
        $articulo = Articulo::where('slug',$request->slug)->first();
        return response()->json($articulo);
    }

    public function create(Request $request){
        $articulo = new Articulo();
        $articulo->titulo = $request->titulo;
        $articulo->descripcion = $request->descripcion;
        $articulo->cuerpo = $request->cuerpo;
        $articulo->slug = Str::slug($request->titulo);
        return response()->json($articulo->save());

    }
}
