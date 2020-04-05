<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'HtmlForm' => 'Ajax\\semantic\\html\\collections\\form\\HtmlForm',
  'CacheFile' => 'Ubiquity\\cache\\CacheFile',
  'CacheManager' => 'Ubiquity\\cache\\CacheManager',
  'ValidatorsManager' => 'Ubiquity\\contents\\validation\\ValidatorsManager',
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'MaintenanceMode' => 'Ubiquity\\controllers\\admin\\popo\\MaintenanceMode',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'DAO' => 'Ubiquity\\orm\\DAO',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\CacheTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\CacheTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\JsUtils\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => 'array', 'name' => 'config')
  ),
);

