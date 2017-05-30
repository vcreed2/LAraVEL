<?php namespace App\Http\Controllers;
use App\Mimodelo;
class MiControlador extends Controller {

	function index(){
	    $modelo=new Mimodelo();
	    $resultado= $modelo->saludar("Himbert");
	    return view("Prueba.index",["saludo"=>$resultado]);	
	}		
}