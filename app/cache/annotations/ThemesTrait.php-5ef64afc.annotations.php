<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'ThemesManager' => 'Ubiquity\\themes\\ThemesManager',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\ThemesTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\ThemesTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\JsUtils', 'name' => 'jquery')
  ),
);

