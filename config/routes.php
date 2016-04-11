<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/opiskelijaLista', function() {
    HelloWorldController::opiskelijaLista();
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

   $routes->get('/uusiKurssi.htm', function(){
    KurssiController::create();
});

   $routes->get('/opiskelijaSivu', function() {
    HelloWorldController::opiskelijaSivu();
  });

   $routes->get('/login', function() {
    HelloWorldController::login();
  });