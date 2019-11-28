<?php
$conn = mysqli_connect("localhost", "root", "0214", "opentutorials");

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  'name'=>mysqli_real_escape_string($conn, $_POST['name']),
  'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
  update author
    set
      name = '{$filtered['name']}',
      profile = '{$filtered['profile']}'
    where
      id = {$filtered['id']};
    ";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo "Fail to save data into DB.";
  error_log(mysqli_error($conn));
} else{
  header('Location: author.php?id='.$filtered['id']);
}
 ?>
