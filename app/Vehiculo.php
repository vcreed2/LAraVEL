<?php namespace App;
use Illuminate\Database\Eloquent\Model; 

class Vehiculo extends Model {
	protected $table="Vehiculos";
	protected $primaryKey="serie";
	protected $fillable=array('color','cilindraje','potencia','peso');

	public function fabricante(){
		$this->belongsTo('fabricante');
	}
}