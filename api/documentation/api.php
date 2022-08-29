<?php
require("../../vendor/autoload.php");

$openapi = \OpenApi\Generator::scan([$_SERVER['DOCUMENT_ROOT'].'/findworker-task/models']);

header('Content-Type: application/json');
echo $openapi->toJSON();
