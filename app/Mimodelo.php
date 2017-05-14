<?php namespace App;
use Illuminate\Database\Eloquent\Model; 

class Mimodelo extends Model {
	function saludar($nombre)
	{
	    return "Hola $nombre";
    }
}