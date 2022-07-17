<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.usuario.list');
    }
    public function datatable()
    {

        $data = Usuario::
            //filtrando por fecha
            when(!empty(request()->from_date), function ($q) {
            $from = date('Y-m-d', strtotime(request()->from_date));
            $to = date('Y-m-d', strtotime(request()->to_date));
            return $q->whereBetween('informe_proyecto.fecha', [$from, $to]);
        })
        //filtrando si hay proyectos
        /*  ->when(!empty(request()->proyecto), function ($q) {
        //dd('proyecto');
        return $q->where('proyectos.Nombre', 'like', '%' . request()->proyecto . '%');
        }) */
        //filtrando por codigo visit report
        //->orderBy('informe_proyecto.fecha', 'DESC')
            ->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('acciones', function ($data) {
                $button = "
                    <button type='button' class='btn btn-secondary btn-sm m-0 d-inline '>Editar</button>
                    <button type='button' class='btn btn-danger btn-sm m-0 d-inline '>Eliminar</button>
                ";
                return $button;
            })
            ->rawColumns(['acciones'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'Informe_ID' => 'required',
            'Pro_ID' => 'required',
            'Empleado_ID' => 'nullable',
            'Fecha' => 'nullable',
            'Drywall_comments' => 'nullable',
        );

        $error = Validator::make($request->all(), $rules);
        if (request()->ajax() === true) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
