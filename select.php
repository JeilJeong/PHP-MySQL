<?php
$conn = mysqli_connect("localhost", "root", "0214", "opentutorials");
$sql = "
  select * from topic LIMIT 1000";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
  echo '<h2>'.$row['title'].'</h2>';
  echo $row['description'];
}
 ?>
