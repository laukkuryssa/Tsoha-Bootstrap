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

   $routes->get('/login', function() {
    HelloWorldController::login();
  });