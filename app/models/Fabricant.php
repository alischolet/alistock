<?php

class Fabricant extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'nom' => 'required'
	);
}