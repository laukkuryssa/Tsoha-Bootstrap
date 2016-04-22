<?php

require_once 'app/models/opiskelija.php';

class OpiskelijaController extends BaseController{

public static function lista(){
    $opiskelijat = Opiskelija::all();
    View::make('opiskelija/opiskelijaLista.html', array('opiskelijat' => $opiskelijat));
  }

public static function opiskelijaSivu($id){
    $opiskelija = Opiskelija::find($id);
    View::make('opiskelija/opiskelijaSivu.html', array('opiskelija' => $opiskelija));
  }

  public static function login(){
      View::make('opiskelija/login.html');
  }
  public static function handle_login(){
    $params = $_POST;

    $opiskelija = Opiskelija::authenticate($params['username'], $params['password']);

    if(!$opiskelija){
      View::make('opiskelija/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
    }else{
      $_SESSION['opiskelija'] = $opiskelija->id;

      Redirect::to('/kurssiLista', array('message' => 'Tervetuloa takaisin ' . $opiskelija->name . '!'));
    }
  }

  public static function logout(){
    $_SESSION['opiskelija'] = null;
    Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
  }

}