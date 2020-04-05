<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'Rule' => 'Ajax\\semantic\\components\\validation\\Rule',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'HtmlInput' => 'Ajax\\semantic\\html\\elements\\HtmlInput',
  'CacheManager' => 'Ubiquity\\cache\\CacheManager',
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'SeoController' => 'Ubiquity\\controllers\\seo\\SeoController',
  'ControllerSeo' => 'Ubiquity\\seo\\ControllerSeo',
  'UrlParser' => 'Ubiquity\\seo\\UrlParser',
  'UFileSystem' => 'Ubiquity\\utils\\base\\UFileSystem',
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'UResponse' => 'Ubiquity\\utils\\http\\UResponse',
  'USession' => 'Ubiquity\\utils\\http\\USession',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\SeoTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\SeoTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\views\\View', 'name' => 'view'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\scaffolding\\AdminScaffoldController', 'name' => 'scaffold')
  ),
);

