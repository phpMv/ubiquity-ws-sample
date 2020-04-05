<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'HtmlForm' => 'Ajax\\semantic\\html\\collections\\form\\HtmlForm',
  'HtmlIconGroups' => 'Ajax\\semantic\\html\\elements\\HtmlIconGroups',
  'HtmlLabel' => 'Ajax\\semantic\\html\\elements\\HtmlLabel',
  'JString' => 'Ajax\\service\\JString',
  'DocParser' => 'Ubiquity\\annotations\\parser\\DocParser',
  'CacheManager' => 'Ubiquity\\cache\\CacheManager',
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'Constants' => 'Ubiquity\\controllers\\admin\\utils\\Constants',
  'RestServer' => 'Ubiquity\\controllers\\rest\\RestServer',
  'UbiquityException' => 'Ubiquity\\exceptions\\UbiquityException',
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'RestBaseController' => 'Ubiquity\\controllers\\rest\\RestBaseController',
  'HasResourceInterface' => 'Ubiquity\\controllers\\rest\\HasResourceInterface',
  'RestController' => 'Ubiquity\\controllers\\rest\\RestController',
  'JsonApiRestController' => 'Ubiquity\\controllers\\rest\\api\\jsonapi\\JsonApiRestController',
  'SimpleRestController' => 'Ubiquity\\controllers\\rest\\SimpleRestController',
  'UArray' => 'Ubiquity\\utils\\base\\UArray',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\RestTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\RestTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\views\\View', 'name' => 'view'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\scaffolding\\AdminScaffoldController', 'name' => 'scaffold')
  ),
  'Ubiquity\\controllers\\admin\\traits\\RestTrait::showSimpleMessage' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'content'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'type'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'icon'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'int', 'name' => 'timeout'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'staticName'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'HtmlMessage')
  ),
);

