<?php
require 'Controllers/UserController.php';
require 'Models/UserModel.php';
require 'Views/UserView.php';

$userController = new UserController('Controller1');
echo $userController -> get_controller();

$userModel = new UserModel('Model1');
echo $userModel -> get_model();

$userView = new UserView('View1');
echo $userView -> get_view();


