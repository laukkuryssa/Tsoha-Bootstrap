<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('index.html');
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    
  }

    public static function opiskelijaLista(){
      // Testaa koodiasi täällä
      View::make('opiskelijaLista.html');
    
  }

    

    public static function opiskelijaSivu(){
      // Testaa koodiasi täällä
      View::make('opiskelijaSivu.html');
    
  }

    public static function kurssiSivu(){
      // Testaa koodiasi täällä
      View::make('kurssiSivu.html');
    
  }

  public static function uusiKurssi(){
      // Testaa koodiasi täällä
      View::make('uusiKurssi.html');
    
  }

  public static function login(){
    View::make('login.html');
  }
}