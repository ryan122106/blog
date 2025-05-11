<?php

    // 1. connect to database
    $database = connectToDB();

    // 2. get all the data from the form using $_POST
    
    $title = $_POST["title"];
    $content = $_POST["content"];
    if (empty($title) || empty($content)) {
        $_SESSION["error"] = "All fields are required";
        header("Location: /manage-posts-add");
        exit;
    }

    $sql = "INSERT INTO posts (`title`, `content`,`user_id`) VALUES (:title, :content , :user_id)";
        //step 2 prepare
        $statement = $database->prepare($sql);
        //step 3 let them cook
        $statement->execute([ // add more
            "title" => $title,
            "content" => $content,
            "user_id" => $_SESSION["user"]["id"]
        ]);
        


    // 5. Redirect back to the /manage-user page
    header("Location: /manage-posts"); 
    exit; // meow :3
?>