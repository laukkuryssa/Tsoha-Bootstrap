<?php

require 'app/models/opiskelija.php';

class OpiskelijaController extends BaseController{

public static function lista(){
    $opiskelijat = Opiskelija::all();
    View::make('opiskelija/opiskelijaLista.html', array('opiskelijat' => $opiskelijat));
  }

public static function opiskelijaSivu($id){
    $opiskelija = Opiskelija::find($id);
    View::make('opiskelija/opiskelijaSivu.html', array('opiskelija' => $opiskelija));
  }
}