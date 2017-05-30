<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fabricante;
use Illuminate\Http\Request;

class FabricanteVehiculoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$fabricante=Fabricante::find($id);
		if(!$fabricante){
			return response()->json(['mensaje'=>'Fabricante no Existe','codigo'=>404],404);
		}else{
			$vehiculos=$fabricante->vehiculos;
		}
		if(!$vehiculos){
			return response()->json(['mensaje'=>'Fabricante no posee vehiculos','codigo'=>404],404);
		}

		return response()->json(['datos'=>$vehiculos],200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return "mostrando formulario veh para crear vehiculos que pertenecen al fabricante"."$id";
	}



   /*
	public function showAll()
	{
		return "mostrando todos los vehiculos";
	}
*/



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idFabricante, $idVehiculo)
	{
		return "mostrando formulario para mostrar vehiculo".$idVehiculo. "que pertenece al fabricante".$idFabricante;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($idFabricante, $idVehiculo)
	{
		return "mostrando formulario para editar vehiculo".$idVehiculo. "que pertenece al fabricante".$idFabricante;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "mostrando formulario para actualizar vehiculo".$idVehiculo. "que pertenece al fabricante".$idFabricante;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "mostrando formulario para eliminar vehiculo".$idVehiculo. "que pertenece al fabricante".$idFabricante;
	}

}
