<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin\\traits',
  '#uses' => array (
  'Rule' => 'Ajax\\semantic\\components\\validation\\Rule',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'ClassUtils' => 'Ubiquity\\cache\\ClassUtils',
  'MailerClass' => 'Ubiquity\\controllers\\admin\\popo\\MailerClass',
  'MailerQueuedClass' => 'Ubiquity\\controllers\\admin\\popo\\MailerQueuedClass',
  'MailerManager' => 'Ubiquity\\mailer\\MailerManager',
  'UArray' => 'Ubiquity\\utils\\base\\UArray',
  'UDateTime' => 'Ubiquity\\utils\\base\\UDateTime',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'UResponse' => 'Ubiquity\\utils\\http\\UResponse',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\traits\\MailerTrait' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\traits\\MailerTrait' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => '\\Ajax\\php\\ubiquity\\JsUtils', 'name' => 'jquery')
  ),
);

