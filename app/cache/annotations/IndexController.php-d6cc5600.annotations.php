<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Display' => 'Ubiquity\\core\\postinstall\\Display',
  'Logger' => 'Ubiquity\\log\\Logger',
  'ThemesManager' => 'Ubiquity\\themes\\ThemesManager',
),
  '#traitMethodOverrides' => array (
  'controllers\\IndexController' => 
  array (
  ),
),
);

