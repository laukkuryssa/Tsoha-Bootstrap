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

  public static function create(
  	){
    View::make('kurssi/uusiKurssi.html');
  }

  public static function store(){
    $params = $_POST;
    // Alustetaan uusi Game-luokan olion käyttäjän syöttämillä arvoilla
    $kurssi = new Kurssi(array(
        'name' => $params['name'],
        'luennoitsija' => $params['luennoitsija'],
        'opintopisteet' => $params['opintopisteet'],
        'luentoajat' => $params['luentoajat'],
        'esitiedot' => $params['esitiedot'],
        'kuvaus' => $params['kuvaus'],
        'harjoitusryhmat' => $params['harjoitusryhmat'],
        'alkamisajankohta' => $params['alkamisajankohta'],
        'loppumisajankohta' => $params['loppumisajankohta'],
        'ilmoalkaa' => $params['ilmoalkaa'],
        'ilmoloppuu' => $params['ilmoloppuu']
    ));

    // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
    $kurssi->save();

    // Ohjataan käyttäjä lisäyksen jälkeen pelin esittelysivulle
    Redirect::to('/kurssiLista/' . $kurssi->id, array('message' => 'Kurssi luotu!!'));
  }
}