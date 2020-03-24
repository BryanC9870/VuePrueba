<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pensamiento;
//use Illuminate\Support\Facades\View;


//use Illuminate\Routing\Controller;

//use App\Http\Requests;

//use App\Http\Controllers\Controller;




class PensamientosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Pensamiento::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $pensamiento = new Pensamiento();
        $pensamiento->description = $request->descripcion;
        $pensamiento->user_id = auth()->id();
        $pensamiento->save();

        return $pensamiento;
    }

  

    public function update(Request $request, $id)
    {
        $pensamiento = Pensamiento::find($id);
        $pensamiento->description = $request->descripcion;
        $pensamiento->save();

        return $pensamiento;
    }

    
    public function destroy($id)
    {
        $pensamiento = Pensamiento::find($id);
        $pensamiento->delete();
    }


    // quedamos en obtener rutas, continuara.......................
}
