<?php
// Authorization Hybrid of Flourish Unframework and Klein.php
// Include this file in Front Controller to perform authentication stuff.
fAuthorization::setLoginPage($login_route);
fAuthorization::setAuthLevels($my_auth_levels);

// Check if Logged In, If Not, Display Login
respond($login_route, function ($request, $response)
{
	if (!fAuthorization::checkLoggedIn())
	{
		$response->render('view/vLogin.php');
		exit;
	}
	else
	{
		echo 'You are already logged in';
	}
});

// If User Logged In, Terminate Session
respond($logout_route, function ($request, $response)
{
	fAuthorization::requireLoggedIn();
	fAuthorization::destroyUserInfo();
});

// Grant Superpowers Without Login.  Naughty.
respond('/genie/', function ($request, $response)
{
	if (!fAuthorization::checkLoggedIn())
	{
		fAuthorization::setUserAuthLevel('admin');
		fURL::redirect(fAuthorization::getRequestedURL(TRUE, '/'));
		echo 'You Feel Awesome';
	}
	else
	{
		echo 'You are already logged in';
	}
});

// FULL STOP.  You must be logged in to continue.
respond('*', function ($request, $response)
{
	if ($request->uri != '/login/' && !fAuthorization::checkLoggedIn())
	{
		fAuthorization::requireLoggedIn();
		exit;
	}
});

