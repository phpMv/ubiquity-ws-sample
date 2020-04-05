<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'CacheManager' => 'Ubiquity\\cache\\CacheManager',
  'Rule' => 'Ajax\\semantic\\components\\validation\\Rule',
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'ClassUtils' => 'Ubiquity\\cache\\ClassUtils',
  'UResponse' => 'Ubiquity\\utils\\http\\UResponse',
  'AdminScaffoldController' => 'Ubiquity\\scaffolding\\AdminScaffoldController',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\CreateControllersTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\CreateControllersTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\views\\View', 'name' => 'view'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\scaffolding\\AdminScaffoldController', 'name' => 'scaffold')
  ),
);

