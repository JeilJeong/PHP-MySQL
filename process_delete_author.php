<?php
$conn = mysqli_connect("localhost", "root", "0214", "opentutorials");

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);

$sql = "
    delete
      from topic
      where author_id = {$filtered['id']};
    ";
mysqli_query($conn, $sql);

$sql = "
    delete
      from author
      where id = {$filtered['id']};
    ";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo "Fail to delete data into DB.";
  error_log(mysqli_error($conn));
} else{
  header('Location: author.php');
}
?>
