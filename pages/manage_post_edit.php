<?php
  // connect to database
  $database = connectToDB();

  // get the id from the URL /manage-posts-edit?id=1
  $id = $_GET["id"];

  // load the post data by id
  // SQL
  $sql = "SELECT * FROM posts WHERE id = :id";
  // prepare
  $query = $database->prepare($sql);
  // execute
  $query->execute([
    "id" => $id
  ]);
  // fetch
  $post = $query->fetch(); // get only the first row of the match data

  /*
    title -> $post["title"]
    content -> $post["content"]
    status -> $post["status"]
  */
?>
<?php require "parts/header.php"; ?>

<div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit Post</h1>
      </div>
      <div class="card mb-2 p-4">
        <form method="POST" action="/post/update">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input 
              type="text" 
              class="form-control" 
              id="title" 
              name="title" 
              value="<?php echo $post["title"]; ?>" 
            />
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea 
              class="form-control" 
              id="content" 
              name="content" 
              rows="10"
            ><?php echo $post["content"]; ?></textarea>
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="review" <?php echo ($post["status"] === "review" ? "selected" : ""); ?>>Pending for Review</option>
              <option value="publish" <?php echo ($post["status"] === "publish" ? "selected" : ""); ?>>Publish</option>
            </select>
          </div>
          <div class="d-grid">
            <input type="hidden" name="id" value="<?php echo $post["id"]; ?>" />
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-posts" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>

<?php require "parts/footer.php"; ?>