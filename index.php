
<?php

session_start();

require "includes/functions.php";

$path = $_SERVER["REQUEST_URI"];

switch ($path) {
  case '/login';
  require "pages/login.php";
  break;
  case '/signup';
  require "pages/signup.php";
  break;
  case '/logout';
  require "pages/logout.php";
  break;

  case '/dashboard';
  require "pages/dashboard.php";
  break;
  
  case '/read_more';
  require "pages/read_more.php";
  break;


  case '/auth/login';
  require "includes/auth/do_login.php";
  break;
  case '/auth/signup';
  require "includes/auth/do_signup.php";
  break;

  case '/task/add';
  require "includes/task/add_todo.php";
  break;
  case '/task/update';
  require "includes/task/update_todo.php";
  break;
  case '/task/delete';
  require "includes/task/delete_todo.php";
  break;


  default;
  require "pages/home.php";
  break;



}