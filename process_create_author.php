<?php
$conn = mysqli_connect("localhost", "root", "0214", "opentutorials");

$filtered = array(
  'name'=>mysqli_real_escape_string($conn, $_POST['name']),
  'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
  insert into author(
    name, profile
    )
    values(
      '{$filtered['name']}',
      '{$filtered['profile']}'
    )";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo "Fail to save data into DB.";
  error_log(mysqli_error($conn));
} else{
  header('Location: author.php');
}
 ?>
