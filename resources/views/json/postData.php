 <?php  
 $connect = mysqli_connect("localhost", "root", "", "testing");
 if(isset($_POST["postTitle"]) && isset($_POST["postDescription"]))
 {
  $post_title = mysqli_real_escape_string($connect, $_POST["postTitle"]);
  $post_description = mysqli_real_escape_string($connect, $_POST["postDescription"]);
  $postId = 19;
    //update post  
    // $sql = "UPDATE tbl_post SET post_title = '".$post_title."', post_description = '".$post_description."' WHERE post_id = $postId"];
    $sql = "UPDATE tbl_post
    SET post_title = '$post_title', post_description = '$post_description'
    WHERE post_id = 19";
    mysqli_query($connect, $sql);

    //insert post  
    // $sql = "INSERT INTO tbl_post(post_title, post_description, post_status) VALUES ('".$post_title."', '".$post_description."', 'draft')";  
    // mysqli_query($connect, $sql);  
    // echo mysqli_insert_id($connect);  
 }  
 ?>