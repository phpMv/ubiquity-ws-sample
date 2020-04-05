<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'ControllerAction' => 'Ubiquity\\controllers\\admin\\popo\\ControllerAction',
  'Router' => 'Ubiquity\\controllers\\Router',
  'CacheManager' => 'Ubiquity\\cache\\CacheManager',
  'Route' => 'Ubiquity\\controllers\\admin\\popo\\Route',
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'RestException' => 'Ubiquity\\exceptions\\RestException',
  'MaintenanceMode' => 'Ubiquity\\controllers\\admin\\popo\\MaintenanceMode',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\RoutesTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\RoutesTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\JsUtils', 'name' => 'jquery')
  ),
);

