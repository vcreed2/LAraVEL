<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['datos'=>Vehiculo::all()],200); 

		/*
		$vehiculo=Vehiculo::all();
		if(!$vehiculo){
			return response()->json(['mensaje'=>'Fabricante no Existe','codigo'=>404],404);
		}
		return response()->json(['datos'=>$vehiculo],200);
		*/
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

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
	public function show($id)
	{
		$vehiculo=Vehiculo::find($id);
		if(!$vehiculo){
			return response()->json(['mensaje'=>'Vehiculo no Existe','codigo'=>404],404);
		}
		return response()->json(['datos'=>$vehiculo],200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
