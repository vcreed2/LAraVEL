<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fabricante;
use App\Vehiculo;
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
	public function store(Request $request,$id)
	{
		if(!$request->get('color') || !$request->get('cilindraje') || !$request->get('peso') || !$request->get('fabricante_id') || !$request->get('potencia'){
			return response()->json(['mensaje'=>'Datos Invalidos o incompletos','codigo'=>'455'],404);
		}
		$fabricante=Fabricante::find($id);
		if (!$fabricante){
		return response()->json(['mensaje'=>'El Fabricante no existe','codigo'=>404],404);
	}
	Vehiculo::create([
		'color'=>$request->get('color'),
		'cilindraje'=>$request->get('cilindraje'),
		'peso'=>$request->get('peso'),
		'potencia'=>$request->get('potencia'),
		'fabricante_id'=>$id
		]);
	return response()->json(['mensaje'=>'El vehiculo se ha insertado correctamente','codigo'=>201],201);
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
	public function update(Request $recuest,$idFabricante, $idVehiculo)
	{
		$metodo=$recuest->method();
		$fabricante::Fabricante::find($idFabricante);
		if (!$fabricante){
			return response()->json(['mensaje'=>'No se encuentra el fabricante','codigo'=>404],404);
		}

		$vehiculo=$fabricante->vehiculos()->find($idVehiculo);
		if (!$vehiculo){
			return response()->json(['mensaje'=>'No se encuentra el vehiculo','codigo'=>404],404);

			$color=$request->get('color');
			$potencia=$request->get('potencia');
			$cilindraje=$request->get('cilindraje');
			$peso=$request->get('peso');

			$flag=false;

		if($metodo==="PATCH") {
			
			if ($color!=null && $color!=''){
				$vehiculo->color=$color;
				$flag=true;
			}

			if ($potencia!=null && $potencia!=''){
				$vehiculo->potencia=$potencia;
				$flag=true;
			}

			if ($cilindraje!=null && $cilindraje!=''){
				$vehiculo->cilindraje=$cilindraje;
				$flag=true;
			}

			if ($peso!=null && $peso!=''){
				$vehiculo->peso=$peso;
				$flag=true;
			}

			if ($flag){
			$vehiculos->save();
			return "El vehiculo ha sido editado";
		}
		return response()->json(['mensaje'=>'no se han guardado los cambios','codigo'=>202],202);
		}

		if (!$color || !$potencia || !$cilindraje || !$peso){
			return response()->json(['mensaje'=>'Datos Invalidos','codigo'=>404],404);
		}
		$vehiculo->color=$color;
        $vehiculo->potencia=$potencia;
        $vehiculo->cilindraje=$cilindraje;
        $vehiculo->peso=$peso;
		$fabricante->save();
		return "el vehiculo ha sido editado";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idFabricante, $idVehiculo)
	{
		$fabricante=Fabricante::find($idFabricante);
		if(!$fabricante){
			return response()->json(['mensaje'=>'no existe fabricante','codigo'=>404],404);
		}
		$vehiculo=Fabricante->vehiculos()->find($idVehiculo);
		$vehiculo=Vehiculo::find($idVehiculo);
		if(!$vehiculo){
			return response()->json(['mensaje'=>'no existe vehiculo','codigo'=>404],404);
		}
		$vehiculo->delete();
		return response()->json(['mensaje'=>'el vehiculo ha sido eliminado','codigo'=>202],202);
	}

}
