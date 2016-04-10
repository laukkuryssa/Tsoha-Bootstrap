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
    HelloWorldController::kurssiSivu($id);
  });

   $routes->get('/opiskelijaSivu', function() {
    HelloWorldController::opiskelijaSivu();
  });

   $routes->get('/uusiKurssi', function() {
    HelloWorldController::uusiKurssi();
  });

   $routes->get('/login', function() {
    HelloWorldController::login();
  });