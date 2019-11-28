<?php
$conn = mysqli_connect("localhost", "root", "0214", "opentutorials");
$sql = "
  insert into topic(
    title, description, created
    )
    values(
    'MySQL', 'MySQL is ...', NOW()
    )";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo mysqli_error($conn);
}
 ?>
