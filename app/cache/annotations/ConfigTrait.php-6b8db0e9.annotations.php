<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'UResponse' => 'Ubiquity\\utils\\http\\UResponse',
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'Database' => 'Ubiquity\\db\\Database',
  'DAO' => 'Ubiquity\\orm\\DAO',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\ConfigTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\ConfigTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\views\\View', 'name' => 'view')
  ),
);

