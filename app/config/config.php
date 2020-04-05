<?php
return array(
	"siteUrl" => "https://ubiquity-ws-sample.herokuapp.com",
	"sessionName" => "s5e860dee4dd20",
	"namespaces" => array(),
	"templateEngine" => "Ubiquity\\views\\engine\\Twig",
	"templateEngineOptions" => array(
		"cache" => false
	),
	"test" => false,
	"debug" => false,
	"di" => array(
		"@exec" => array(
			"jquery" => function ($controller) {
				return \Ubiquity\core\Framework::diSemantic($controller);
			}
		)
	),
	"cache" => array(
		"directory" => "cache/",
		"system" => "Ubiquity\\cache\\system\\ArrayCache",
		"params" => array()
	),
	"mvcNS" => array(
		"models" => "models",
		"controllers" => "controllers",
		"rest" => ""
	)
);