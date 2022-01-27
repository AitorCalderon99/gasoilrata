<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

use function PHPUnit\Framework\isEmpty;

class CalculadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("calculadora");
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
        $km = $request -> km;
        $litros = $request -> consumo;
        $coste = $request -> coste;
        $origen = $request -> origen;
        $destino = $request -> destino;
        $carburante = $request -> carburante;
        $vehiculo = $request -> vehiculo;

        // Obligatorios: km, litros, coste, idV
        if(isEmpty($km) || $km == null || isEmpty($litros) || $litros == null || isEmpty($coste) || $coste == null || isEmpty($carburante) || $carburante == null || isEmpty($vehiculo) || $vehiculo == null){
            if(isEmpty($km) || $km == null){
                $errores = ["km" => "No se han introducido los kilómetros a recorrer"];
            }
            if(isEmpty($litros) || $litros == null){
                $errores = ["litros" => "No se ha introducido el consumo del vehículo"];
            }
            if(isEmpty($coste) || $coste == null){
                $errores = ["coste" => "No se ha introducido el coste del carburante"];
            }
            if(isEmpty($carburante) || $carburante == null){
                $errores = ["carburante" => "No se ha seleccionado el tipo carburante del vehículo"];
            }
            if(isEmpty($vehiculo) || $vehiculo == null){
                $errores = ["vehiculo" => "No se ha seleccionado o añadido un vehiculo"];
            }
            return view("calculadora") -> with($errores);
        }else{
            // $fecha = Carbon::now();
            $fecha = date("Y-m-d");
            $consumo = new Consumo;
            $consumo -> kilometros = $request -> km;
            $consumo -> litros = $request -> consumo;
            $consumo -> coste_litro = $request -> coste;
            $consumo -> origen = $request -> origen;
            $consumo -> destino = $request -> destino;
            $consumo -> fecha = $fecha;
            $consumo -> carburante = $request -> carburante;
            $consumo -> id_vehiculo = $request -> vehiculo;
            $consumo -> save();
            return view("calculadora");
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
