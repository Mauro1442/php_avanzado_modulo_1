<?php

require_once "controllers/template.controller.php";
require_once "controllers/form.controller.php";
require_once "models/form.model.php";


//Instantiate the class

$template = new ViewController();

//Get the method

$template -> ctrGetView();
?>