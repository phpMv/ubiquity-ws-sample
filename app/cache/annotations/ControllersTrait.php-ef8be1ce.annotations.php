<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'Rule' => 'Ajax\\semantic\\components\\validation\\Rule',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'CacheManager' => 'Ubiquity\\cache\\CacheManager',
  'ClassUtils' => 'Ubiquity\\cache\\ClassUtils',
  'Router' => 'Ubiquity\\controllers\\Router',
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'Constants' => 'Ubiquity\\controllers\\admin\\utils\\Constants',
  'UFileSystem' => 'Ubiquity\\utils\\base\\UFileSystem',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'USession' => 'Ubiquity\\utils\\http\\USession',
  'CodeUtils' => 'Ubiquity\\utils\\base\\CodeUtils',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\ControllersTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\ControllersTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\views\\View', 'name' => 'view'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\scaffolding\\AdminScaffoldController', 'name' => 'scaffold')
  ),
);

