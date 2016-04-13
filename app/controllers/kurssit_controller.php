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
    Redirect::to('/kurssiSivu/' . $kurssi->id, array('message' => 'Kurssi luotu!!'));
  }

  public static function edit($id){
    $kurssi = Kurssi::find($id);
    View::make('kurssi/muokkaa.html', array('attributes' => $kurssi));
  }

  // Pelin muokkaaminen (lomakkeen käsittely)
  public static function update($id){
    $params = $_POST;

    $attributes = array(
    	'id' => $id,
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
    );

    $kurssi = new Kurssi($attributes);
    $errors = $kurssi->errors();

    if(count($errors) > 0){
      View::make('kurssi/muokkaa.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      // Kutsutaan alustetun olion update-metodia, joka päivittää pelin tiedot tietokannassa
      $game->update();

      Redirect::to('/game/' . $game->id, array('message' => 'Peliä on muokattu onnistuneesti!'));
    }
  }

  // Pelin poistaminen
  public static function destroy($id){
    // Alustetaan Game-olio annetulla id:llä
    $game = new Game(array('id' => $id));
    // Kutsutaan Game-malliluokan metodia destroy, joka poistaa pelin sen id:llä
    $game->destroy();

    // Ohjataan käyttäjä pelien listaussivulle ilmoituksen kera
    Redirect::to('/game', array('message' => 'Peli on poistettu onnistuneesti!'));
  }
}