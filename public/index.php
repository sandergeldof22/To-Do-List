<?php

define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);

require(ROOT . "core/config.php");
require(ROOT . "core/route.php");
require(ROOT . "core/core.php");

route();

//returned een parent directory's path. en creërt een absolute path