<?php
session_start();

include_once("app/config/config.inc.php");

define('BASE_DIR', "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['SCRIPT_NAME']));

include_once("core/core.php");
include_once("core/coreController.php");
include_once("core/coreModel.php");
include_once("core/coreView.php");

include_once("app/appController.php");
include_once("app/appModel.php");

include_once("app/app.php");
