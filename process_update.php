<?php
$conn = mysqli_connect("localhost", "root", "0214", "opentutorials");

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "
  update topic
    set
      title = '{$filtered['title']}',
      description = '{$filtered['description']}'
    where
      id = {$filtered['id']};
    ";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo "Fail to save data into DB.";
  error_log(mysqli_error($conn));
} else{
  echo "Success to make additional list. <a href=\"index.php\">back to main</a>";
}
?>
