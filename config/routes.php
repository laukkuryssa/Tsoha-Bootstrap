<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/opiskelijaLista', function() {
    OpiskelijaController::lista();
  });

  $routes->get('/opiskelijaSivu/:id', function($id) {
    OpiskelijaController::opiskelijaSivu($id);
  });

   $routes->get('/kurssiLista', function() {
    KurssiController::lista();
  });

   $routes->get('/kurssiSivu/:id', function($id) {
    KurssiController::kurssiSivu($id);
  });

   $routes->post('/kurssiLista', function(){
    KurssiController::store();
  });

   $routes->get('/uusiKurssi', function(){
    KurssiController::create();
  });

   $routes->get('/kurssiSivu/:id/edit', function($id){
  KurssiController::edit($id);
  });

  $routes->post('/kurssiSivu/:id/update', function($id){
  KurssiController::update($id);
  });

  $routes->post('/kurssiSivu/:id/destroy', function($id){
  KurssiController::destroy($id);
  });

   $routes->get('/login', function(){
  // Kirjautumislomakkeen esittäminen
  OpiskelijaController::login();
  });

$routes->post('/login', function(){
  // Kirjautumisen käsittely
  OpiskelijaController::handle_login();
});

$routes->post('/logout', function(){
  OpiskelijaController::logout();
});