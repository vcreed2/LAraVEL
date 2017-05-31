<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fabricante;

use Illuminate\Http\Request;

class FabricanteController extends Controller {

	public function __construct()
	{
		$this->middleware('auth.basic',['only'=>'store']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['datos'=>Fabricante::all()],200);
		//return Fabricante::all();
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	/*
	public function create()
	{
		return "menú para crear fabricante";
	}
*/
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(!$request->get('nombre')|| !$request->get('telefono')){
			return response()->json(['mensaje'=>'Datos Invalidos o incompletos','codigo'=>'455'],404);
		}
		Fabricante::create($request]->all());
		return response()->json(['mensaje'=>'El Fabricante ha sido creado correctamente'],202);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$fabricante=Fabricante::find($id);
		if(!$fabricante){
			return response()->json(['mensaje'=>'Fabricante no Existe','codigo'=>404],404);
		}
		return response()->json(['datos'=>$fabricante],200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		"menú para editar fabricante con id". $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(REquest $recuest,$id)
	{
		$metodo=$recuest->method();
		$fabricante::Fabricante::find($id);
		$flag=false;
		if($metodo==="PUT") {
			$nombre=$request->get('nombre');
			if ($nombre!=null && $nombre!=''){
				$fabricante->nombre=$nombre;
				$flag=true;
			}
			$telefono=$request->get('telefono');
			if ($telefono!=null && $telefono!=''){
				$fabricante->telefono=$telefono;
				$flag=true;
			}
			if ($flag){
			$fabricante->save();
			return "registro editado con patch";
		}
		return response()->json(['mensaje'=>'no se han guardado los cambios','codigo'=>202],202);
		}
		$nombre=$request->get('nombre');
		$telefono=$request->get('telefono');
		if (!$nombre || !$telefono){
			return response()->json(['mensaje'=>'Datos Invalidos','codigo'=>404],404);
		}
		$fabricante->nombre=$nombre;
		$fabricante->telefono=$telefono;
		$fabricante->save();
		return "grabado correctamente con PUT";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$fabricante=Fabricante::find($idFabricante);
		if(!$fabricante){
			return response()->json(['mensaje'=>'no existe fabricante','codigo'=>404],404);
		}
		$vehiculos=$fabricante->vehiculos;
		if(sizeof($vehiculos)>0){
			return response()->json(['mensaje'=>'el fabricante posse vehiculos y no se puede eliminar','codigo'=>404],404);
		}
		$fabricante->delete();
		return response()->json(['mensaje'=>'el fabricante ha sido eliminado','codigo'=>202],202);
	}

}
