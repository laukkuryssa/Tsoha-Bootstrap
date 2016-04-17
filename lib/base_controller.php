<?php

  class BaseController{

    public static function get_user_logged_in(){
     //Katsotaan onko opiskelija-avain sessiossa
    if(isset($_SESSION['opiskelija'])){
      $opiskelija_id = $_SESSION['opiskelija'];
       //Pyydetään Opiskelija-mallilta opiskelija session mukaisella id:llä
      $opiskelija = Opiskelija::find($opiskelija_id);

      return $opiskelija;
    }

    // Opiskelija ei ole kirjautunut sisään
    return null;
  }

    public static function check_logged_in(){
      // Toteuta kirjautumisen tarkistus tähän.
      // Jos käyttäjä ei ole kirjautunut sisään, ohjaa hänet toiselle sivulle (esim. kirjautumissivulle).
    }



  }
