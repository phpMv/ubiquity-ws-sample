<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\semantic',
  '#uses' => array (
  'HtmlButton' => 'Ajax\\semantic\\html\\elements\\HtmlButton',
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'HtmlDivider' => 'Ajax\\semantic\\html\\elements\\HtmlDivider',
  'HtmlSemDoubleElement' => 'Ajax\\semantic\\html\\base\\HtmlSemDoubleElement',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'CRUDMessage' => 'Ubiquity\\controllers\\crud\\CRUDMessage',
  'ModelViewer' => 'Ubiquity\\controllers\\crud\\viewers\\ModelViewer',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\semantic\\MessagesTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\semantic\\MessagesTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\php\\ubiquity\\JsUtils', 'name' => 'jquery')
  ),
  'Ubiquity\\controllers\\semantic\\MessagesTrait::_getModelViewer' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'ModelViewer')
  ),
);

