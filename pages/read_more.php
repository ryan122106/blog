<?php
    // connect to database
    $database = connectToDB();

    // get id from $_GET
    $id = $_GET["id"];
    
    // load the post data by id
    // SQL
    $sql = "SELECT * FROM posts WHERE id = :id";
    // prepare
    $query = $database->prepare( $sql );
    // execute
    $query->execute([
      "id" => $id
    ]);
    // fetch
    $post = $query->fetch(); // get only the first row of the match data
?>
<?php require "parts/header.php"; ?>

<div class="container mx-auto my-5" style="max-width: 500px;">
      <h1 class="h1 mb-4 text-center"><?= $post["title"]; ?></h1>
      <?php
        /*
          $content = "1,2,3,4,5";
          $content_array = explode( ",", $content );
          $content_array = [ 1, 2, 3, 4, 5 ];
        */
        $content = $post["content"];
        $content_array = explode( "\n", $content );
        foreach( $content_array as $paragraph ) {
          echo "<p>$paragraph</p>";
        }

        
      ?>
      <div class="text-center mt-3">
        <a href="/" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back</a
        >
      </div>
    </div>

<?php require "parts/footer.php"; ?>