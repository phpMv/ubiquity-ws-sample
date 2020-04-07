<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'ComposerDependency' => 'Ubiquity\\controllers\\admin\\popo\\ComposerDependency',
  'HtmlInput' => 'Ajax\\semantic\\html\\elements\\HtmlInput',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'PackagistApi' => 'Ubiquity\\controllers\\admin\\utils\\PackagistApi',
  'HtmlDatalist' => 'Ajax\\semantic\\html\\elements\\html5\\HtmlDatalist',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\ComposerTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\ComposerTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\php\\ubiquity\\JsUtils', 'name' => 'jquery')
  ),
);

