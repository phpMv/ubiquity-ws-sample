<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'Logger' => 'Ubiquity\\log\\Logger',
  'Startup' => 'Ubiquity\\controllers\\Startup',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\LogsTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\LogsTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\php\\ubiquity\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\views\\View', 'name' => 'view')
  ),
);

