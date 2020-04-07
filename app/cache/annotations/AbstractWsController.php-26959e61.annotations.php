<?php

return array(
  '#namespace' => 'ws\\controllers',
  '#uses' => array (
  'AbstractDataProvider' => 'ws\\classes\\data\\AbstractDataProvider',
  'DataArrayProvider' => 'ws\\classes\\data\\DataArrayProvider',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'Controller' => 'Ubiquity\\controllers\\Controller',
),
  '#traitMethodOverrides' => array (
  'ws\\controllers\\AbstractWsController' => 
  array (
  ),
),
  'ws\\controllers\\AbstractWsController::getMenu' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'activeItem'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'array')
  ),
);

