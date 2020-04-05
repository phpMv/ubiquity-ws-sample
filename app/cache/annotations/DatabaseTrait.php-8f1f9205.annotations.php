<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'CacheManager' => 'Ubiquity\\cache\\CacheManager',
  'OrmUtils' => 'Ubiquity\\orm\\OrmUtils',
  'ClassUtils' => 'Ubiquity\\cache\\ClassUtils',
  'DatabaseReversor' => 'Ubiquity\\orm\\reverse\\DatabaseReversor',
  'DbGenerator' => 'Ubiquity\\db\\reverse\\DbGenerator',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'DbExport' => 'Ubiquity\\db\\export\\DbExport',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\DatabaseTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\DatabaseTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\JsUtils', 'name' => 'jquery')
  ),
);

