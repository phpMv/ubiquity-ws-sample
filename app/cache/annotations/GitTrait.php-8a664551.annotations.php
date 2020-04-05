<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'RepositoryGit' => 'Ubiquity\\controllers\\admin\\popo\\RepositoryGit',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'GitFileStatus' => 'Ubiquity\\utils\\git\\GitFileStatus',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'UFileSystem' => 'Ubiquity\\utils\\base\\UFileSystem',
  'GitException' => 'Cz\\Git\\GitException',
  'CacheManager' => 'Ubiquity\\cache\\CacheManager',
  'UArray' => 'Ubiquity\\utils\\base\\UArray',
  'UGitRepository' => 'Ubiquity\\utils\\git\\UGitRepository',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\GitTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\GitTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\php\\ubiquity\\JsUtils', 'name' => 'jquery'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\views\\View', 'name' => 'view'),
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ubiquity\\scaffolding\\AdminScaffoldController', 'name' => 'scaffold')
  ),
);

