<?php
$conn = mysqli_connect("localhost", "root", "0214", "opentutorials");

$filtered = array(
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description']),
  'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);

$sql = "
  insert into topic(
    title, description, created, author_id
    )
    values(
      '{$filtered['title']}',
      '{$filtered['description']}',
      NOW(),
      {$filtered['author_id']}
    )";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo "Fail to save data into DB.";
  error_log(mysqli_error($conn));
} else{
  echo "Success to make additional list. <a href=\"index.php\">back to main</a>";
}
 ?>
