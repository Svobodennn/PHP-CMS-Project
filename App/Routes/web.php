<?php
$cms->router->get('user/detail','User@showProfile');
$cms->router->get('user/set','User@setSession');
$cms->router->get('user/get','User@getSession');
