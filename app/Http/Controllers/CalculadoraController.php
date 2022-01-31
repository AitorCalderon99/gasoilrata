<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

use function PHPUnit\Framework\empty;

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
        $errores = array();

        // Obligatorios: km, litros, coste, idV
        if(empty($km) || $km == null || empty($litros) || $litros == null || empty($coste) || $coste == null || empty($carburante) || $carburante == null || empty($vehiculo) || $vehiculo == null){
            if(empty($km) || $km == null){
                $errores["km"] = "No se han introducido los kilómetros a recorrer";
            }
            if(empty($litros) || $litros == null){
                $errores["litros"] = "No se ha introducido el consumo del vehículo";
            }
            if(empty($coste) || $coste == null){
                $errores["coste"] = "No se ha introducido el coste del carburante";
            }
            if(empty($carburante) || $carburante == null){
                $errores["carburante"] = "No se ha seleccionado el tipo carburante del vehículo";
            }
            if(empty($vehiculo) || $vehiculo == null){
                $errores["vehiculo"] = "No se ha seleccionado o añadido un vehiculo";
            }
            // return $errores;
            return view("calculadora") -> with("errores", $errores);
        }else{
            // $fecha = Carbon::now();
            $fecha = date("Y-m-d");
            $consumo = new Consumo;
            $consumo -> kilometros = $km;
            $consumo -> litros = $litros;
            $consumo -> coste_litro = $coste;
            $consumo -> origen = $origen;
            $consumo -> destino = $destino;
            $consumo -> fecha = $fecha;
            $consumo -> carburante = $carburante;
            $consumo -> id_vehiculo = $vehiculo;
            $consumo -> save();
            return view("calculadora")->with("guardado", "true");
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
