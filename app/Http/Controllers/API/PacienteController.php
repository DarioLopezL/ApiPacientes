<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarPacienteRequest;
use App\Models\Paciente;
use App\Http\Requests\GuardarPacienteRequest;
use App\Http\Resources\PacienteResource;
use Illuminate\Http\Request;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Vista principal de mi api que se muestra desde la base de datos
        return PacienteResource::collection(Paciente::paginate(3))
        ->additional(['mensaje'=>'Listado de pacientes']);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPacienteRequest $request)
    {
        //se guarda la informacion aqui
    /* Paciente::create($request->all());
        return response()->json([
            'result'=> true,
            'mensaje'=> 'Paciente Guardado correctamente'
        ],200);
        */
    return (new PacienteResource(Paciente::create($request->all())))
    ->additional(['mensaje'=>'Paciente Guardado correctamente']);
    
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //motrar informacion mediante un id en especifico
      /*  return response()->json([
            'result'=> true,
            'paciente'=> $paciente
        ],200);
        */
        return new PacienteResource($paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPacienteRequest $request, Paciente $paciente )
    {
        //actualizar datos del paciente
        $paciente -> update($request->all());
    /* return response()->json([
            'result'=> true,
            'mensaje'=> 'Paciente Actualizado correctamente'
        ],200);
        */
        return (new PacienteResource($paciente))
        ->additional(['mensaje'=>'Paciente Actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //elimar datos del paciente
        //$paciente ->delete();
        /*  return response()->json([
            'result'=>true,
            'mensaje'=> 'Los Datos del Paciente Eliminado correctamente'
        ],200);
        */
        $paciente ->delete();
        return (new PacienteResource($paciente))
        ->additional(['mensaje'=>'Paciente Eliminado RIP']);;
    }
}
