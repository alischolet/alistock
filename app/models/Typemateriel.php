<?php

class Typemateriel extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'libelle' => 'required'
	);
}