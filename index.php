<?php 

    // start session
    session_start();

    // require the functions file
    require "includes/functions.php";

    // figure out which path the user is on
    $path = $_SERVER["REQUEST_URI"];


    $path = parse_url( $path, PHP_URL_PATH );

    switch ($path) {
      // pages routes
      case '/login':
        require "pages/login.php";
        break;
      case '/signup':
        require "pages/signup.php";
        break;
      case '/logout':
        require "pages/logout.php";
        break;
      case "/post":
        require "pages/read_more.php";
        break;
      case "/dashboard":
        require "pages/dashboard.php";
        break;
      case "/manage-users":
        require "pages/manage_user.php";
        break;
      case "/manage-users-add":
        require "pages/manage_user_add.php";
        break;
      case "/manage-users-edit":
        require "pages/manage_user_edit.php";
        break;
      case "/manage-users-changepwd":
        require "pages/manage_user_changepwd.php";
        break;
      case "/manage-posts":
        require "pages/manage_post.php";
        break;
      case "/manage-posts-add":
        require "pages/manage_post_add.php";
        break;
      case "/manage-posts-edit":
        require "pages/manage_post_edit.php";
        break;
        
      // actions routes
      case '/auth/login':
        require "includes/auth/do_login.php";
        break;
      case '/auth/signup':
        require "includes/auth/do_signup.php";
        break;
      // setup the action route for add user
      case '/user/add':
        require "includes/user/add.php";
        break;
      // setup the action for delete user
      case '/user/update':
        require "includes/user/update.php";
        break;
      case '/user/changepwd':
        require "includes/user/changepwd.php";
        break;
      case '/user/delete':
        require "includes/user/delete.php";
        break;

      default:
        require "pages/home.php";
        break;
    }
