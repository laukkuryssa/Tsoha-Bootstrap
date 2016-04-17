<?php

  require_once 'app/models/opiskelija.php';

  class BaseController{

    public static function get_user_logged_in(){
     //Katsotaan onko opiskelija-avain sessiossa
    if(isset($_SESSION['opiskelija'])){
      $opiskelija_id = $_SESSION['opiskelija'];
       //Pyydetään Opiskelija-mallilta opiskelija session mukaisella id:llä
      $opiskelija = Opiskelija::find($opiskelija_id);
      Kint::dump($opiskelija);
      return $opiskelija;
    }

    // Opiskelija ei ole kirjautunut sisään
    return null;
  }

    public static function check_logged_in(){
      if (this::get_user_logged_in() == null) {
        Redirect::to('/login', array('message' => 'Kirjautuminen epäonnistui!'));
      }
      // Jos käyttäjä ei ole kirjautunut sisään, ohjaa hänet toiselle sivulle (esim. kirjautumissivulle).
    }



  }
