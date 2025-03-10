<?php
require 'autoload.php';

$loader = new Loader();
$loader->run();

use \Classes\Model;
$userModel = new Model('Model1');
echo $userModel -> get_model();

use \Classes\View;
$userView = new View('View1');
echo $userView -> get_view();
