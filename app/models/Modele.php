<?php

class Modele extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'reference' => 'required',
		'idFabricant' => 'required'
	);
}