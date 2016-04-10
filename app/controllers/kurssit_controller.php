<?php

require 'app/models/kurssi.php';

class KurssiController extends BaseController{

  public static function lista(){
    $kurssit = Kurssi::all();
    View::make('kurssi/kurssiLista.html', array('kurssit' => $kurssit));
  }

  public static function kurssiSivu($id){
    $kurssi = Kurssi::find($id);
    View::make('kurssi/kurssiSivu.html', array('kurssi' => $kurssi));
  }

}