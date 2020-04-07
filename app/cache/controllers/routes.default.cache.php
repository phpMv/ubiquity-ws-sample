<?php
return array("/_default/"=>array("get"=>array("controller"=>"controllers\\MainController","action"=>"index","parameters"=>array(),"name"=>"Home","cache"=>false,"duration"=>false)),"/news/"=>array("get"=>array("controller"=>"controllers\\MainController","action"=>"displayNews","parameters"=>array(),"name"=>"News","cache"=>false,"duration"=>false)),"/contact/"=>array("get"=>array("controller"=>"controllers\\MainController","action"=>"contact","parameters"=>array(),"name"=>"Contact","cache"=>false,"duration"=>false)),"/partners/"=>array("get"=>array("controller"=>"controllers\\MainController","action"=>"partners","parameters"=>array(),"name"=>"Partners","cache"=>false,"duration"=>false)),"/partner/(.+?)/"=>array("get"=>array("controller"=>"controllers\\MainController","action"=>"partnerDetails","parameters"=>array(0),"name"=>"MainController-partnerDetails","cache"=>false,"duration"=>false)),"/sendMessage/"=>array("controller"=>"controllers\\MainController","action"=>"sendMessage","parameters"=>array(),"name"=>"MainController-sendMessage","cache"=>false,"duration"=>false),"/noMore/(.+?)/"=>array("get"=>array("controller"=>"controllers\\MainController","action"=>"noMoreMessage","parameters"=>array(0),"name"=>"noMore","cache"=>false,"duration"=>false)),"/cookies/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\MainController","action"=>"acceptCookiesOrNot","parameters"=>array(0,"~1"),"name"=>"MainController-acceptCookiesOrNot","cache"=>false,"duration"=>false)),"/((?!admin|Admin).*?)/"=>array("controller"=>"controllers\\MainController","action"=>"notfound","parameters"=>array(0),"name"=>"MainController-notfound","cache"=>false,"duration"=>false));
