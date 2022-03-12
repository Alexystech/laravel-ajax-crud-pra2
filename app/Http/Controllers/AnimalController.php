<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB; //trabajar con bd usando StoredProcedures
use Illuminate\Http\Request; //recuperar datos de la vista
use Yajra\DataTables\DataTables;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $animales = DB::select('CALL spsel_animal()');
            return DataTables::of($animales)
                ->addColumn('action', function($animales) {
                    $acciones = '<a href="" class="btn btn-info btn-sm"> editar </a>';
                    $acciones .= '&nbsp;&nbsp;<button type="button" name="delete" id="'.$animales->id.'" class="delete btn btn-danger btn-sm"> Eliminar </button>';
                    return $acciones;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('animal.index');
    }

    public function registrar(Request $request) {
        $animal = DB::select('call spcre_animal(?,?,?)', [
            $request->nombre,
            $request->especie,
            $request->genero
        ]);

        return back();
    }

    public function eliminar($id) {
        $animal = DB::select('call spdel_animal(?)', [$id]);
        return back();
    }
}
