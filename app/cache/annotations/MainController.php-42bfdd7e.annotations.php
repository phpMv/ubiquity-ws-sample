<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'AbstractWsController' => 'ws\\controllers\\AbstractWsController',
  'UCookie' => 'Ubiquity\\utils\\http\\UCookie',
  'UString' => 'Ubiquity\\utils\\base\\UString',
),
  '#traitMethodOverrides' => array (
  'controllers\\MainController' => 
  array (
  ),
),
  'controllers\\MainController::index' => array(
    array('#name' => 'get', '#type' => 'Ubiquity\\annotations\\router\\GetAnnotation', "_default","name"=>"Home")
  ),
  'controllers\\MainController::displayNews' => array(
    array('#name' => 'get', '#type' => 'Ubiquity\\annotations\\router\\GetAnnotation', "news","name"=>"News")
  ),
  'controllers\\MainController::contact' => array(
    array('#name' => 'get', '#type' => 'Ubiquity\\annotations\\router\\GetAnnotation', "contact","name"=>"Contact")
  ),
  'controllers\\MainController::partners' => array(
    array('#name' => 'get', '#type' => 'Ubiquity\\annotations\\router\\GetAnnotation', "partners","name"=>"Partners")
  ),
  'controllers\\MainController::partnerDetails' => array(
    array('#name' => 'get', '#type' => 'Ubiquity\\annotations\\router\\GetAnnotation', "partner/{name}")
  ),
  'controllers\\MainController::notfound' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "{route}","requirements"=>["route"=>"(?!admin|Admin).*?"],"priority"=>-1000)
  ),
  'controllers\\MainController::sendMessage' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "sendMessage")
  ),
  'controllers\\MainController::noMoreMessage' => array(
    array('#name' => 'get', '#type' => 'Ubiquity\\annotations\\router\\GetAnnotation', "noMore/{title}","name"=>"noMore")
  ),
  'controllers\\MainController::acceptCookiesOrNot' => array(
    array('#name' => 'get', '#type' => 'Ubiquity\\annotations\\router\\GetAnnotation', "cookies/{accept}/{redirect}")
  ),
);

