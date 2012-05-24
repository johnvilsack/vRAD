<?php
// Config Shit
$my_auth_levels = array('admin' => 100,'user'  => 50,'guest' => 25);
$login_route	= '/login/';
$logout_route	= '/logout/';
///////////////////////////////////////////////////////

require 'lib/klein.php';
require_once 'fInit.php';
require 'lib/vAuth.php';


respond('/', function ($request, $response)
{
	echo 'Hi There!';
	$response->render('view/vItemScanner.php');
});


dispatch();



