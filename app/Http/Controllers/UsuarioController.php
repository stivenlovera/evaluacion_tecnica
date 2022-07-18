<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use DataTables;
use Illuminate\Http\Request;
use PDF;
use Validator;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $data = Usuario::where('estado', 'activo')
        //filtrando
            ->when(!empty(request()->orden), function ($query) {
                switch (request()->orden) {
                    case 'ci':
                        return $query->orderBy('ci', 'ASC');
                        break;
                    case 'nombre':
                        return $query->orderBy('nombre', 'ASC');
                        break;
                    case 'apellido':
                        return $query->orderBy('apellido', 'ASC');
                        break;
                    case 'nacionalidad':
                        return $query->orderBy('nacionalidad', 'ASC');
                        break;
                    default:
                        # code...
                        break;
                }
            })
            ->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('acciones', function ($data) {
                $button = "  <button type='button' class='btn btn-secondary btn-sm m-0 d-inline edit' data-id='$data->id'>Editar</button>
                    <button type='button' class='btn btn-danger btn-sm m-0 d-inline delete' data-id='$data->id'>Eliminar</button>
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
            'ci' => 'required|numeric',
            'nombre' => 'required',
            'apellido' => 'required',
            'nacionalidad' => 'required',
            'edad' => 'required|numeric',
            'email' => 'required',
            'celular' => 'nullable',
            'dirrecion' => 'nullable',
        );
        $messages = [
            'ci.required' => "CI es requerido",
            'ci.numeric' => "CI deben ser numeros",
            'nombre.required' => "Nombre es requerido",
            'apellido.required' => "Apellido  es requerido",
            'nacionalidad.required' => "Nacionalidad es requerido",
            'edad.required' => "Edad es requerido",
            'edad.numeric' => "Edad debe ser un numero",
            'email.required' => "Email es requerido",
        ];
        $error = Validator::make($request->all(), $rules, $messages);
        if (count($error->errors()->all()) > 0) {
            return response()->json([
                'status' => 'error',
                'message' => $error->errors()->all(),
            ]);
        }
        $data = Usuario::insert([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'nacionalidad' => $request->nacionalidad,
            'edad' => $request->edad,
            'email' => $request->email,
            'celular' => $request->celular == null ? '' : $request->celular,
            'dirrecion' => $request->dirrecion == null ? '' : $request->dirrecion,
        ]);
        if ($data) {
            return response()->json([
                'status' => 'ok',
                'message' => 'Resgistrado correctamente',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrio un error',
            ], 200);
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
        $data = Usuario::where('id', $id)->first();
        if ($data) {
            return response()->json([
                'status' => 'ok',
                'data' => $data,
                'message' => 'Resgistrado correctamente',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrio un error',
            ], 200);
        }
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
        $rules = array(
            'ci' => 'required|numeric',
            'nombre' => 'required',
            'apellido' => 'required',
            'nacionalidad' => 'required',
            'edad' => 'required|numeric',
            'email' => 'required',
            'celular' => 'nullable',
            'dirrecion' => 'nullable',
        );
        $messages = [
            'ci.required' => "CI es requerido",
            'ci.numeric' => "CI deben ser numeros",
            'nombre.required' => "Nombre es requerido",
            'apellido.required' => "Apellido  es requerido",
            'nacionalidad.required' => "Nacionalidad es requerido",
            'edad.required' => "Edad es requerido",
            'edad.numeric' => "Edad debe ser un numero",
            'email.required' => "Email es requerido",
        ];
        $error = Validator::make($request->all(), $rules, $messages);
        if (count($error->errors()->all()) > 0) {
            return response()->json([
                'status' => 'error',
                'message' => $error->errors()->all(),
            ]);
        }
        $data = Usuario::where('id', $request->usuario_id)->update([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'nacionalidad' => $request->nacionalidad,
            'edad' => $request->edad,
            'email' => $request->email,
            'celular' => $request->celular == null ? '' : $request->celular,
            'dirrecion' => $request->dirrecion == null ? '' : $request->dirrecion,
        ]);
        if ($data) {
            return response()->json([
                'status' => 'ok',
                'message' => 'Modificado  correctamente',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrio un error',
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Usuario::where('id', $id)->update([
            'estado' => 'inactivo',
        ]);
        if ($data) {
            return response()->json([
                'status' => 'ok',
                'message' => 'Eliminado correctamente',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrio un error',
            ], 200);
        }
    }
    public function report(Request $request)
    {
        $usuarios = Usuario::where('estado', 'activo')->get();
        $pdf = PDF::loadView('panel.usuario.report_pdf', compact('usuarios'))->setPaper('letter')->setWarnings(false);
        return $pdf->stream("lista usuarios.pdf");
    }
}
