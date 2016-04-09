<?php

class KurssiController extends BaseController{
  public static function lista(){
    $kurssit = Kurssi::all();
    View::make('kurssi/kurssiLista.html', array('kurssi' => $kurssit));
  }
}