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
    $attributes = new Kurssi(array(
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

    $kurssi = new Kurssi($attributes);
    $errors = $kurssi->errors();

    if(count($errors) > 0){
      View::make('kurssi/uusiKurssi.html', array('errors' => $errors, 'attributes' => $attributes));
    } else {
    // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
    $kurssi->save();

    // Ohjataan käyttäjä lisäyksen jälkeen pelin esittelysivulle
    Redirect::to('/kurssiSivu/' . $kurssi->id, array('message' => 'Kurssi luotu!!'));
	}
  }

  public static function edit($id){
    $kurssi = Kurssi::find($id);
    View::make('kurssi/kurssinMuokkaus.html', array('attributes' => $kurssi));
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
      View::make('kurssi/kurssinMuokkaus.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      // Kutsutaan alustetun olion update-metodia, joka päivittää pelin tiedot tietokannassa
      $kurssi->update();

      Redirect::to('/kurssiLista/' . $game->id, array('message' => 'Kurssia on muokattu onnistuneesti!'));
    }
  }

  public static function destroy($id){
    $kurssi = new Kurssi(array('id' => $id));

    $kurssi->destroy($id);
    Redirect::to('/kurssiLista', array('message' => 'Kurssi on poistettu onnistuneesti!'));
  }
}