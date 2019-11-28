<?php
$conn = mysqli_connect("localhost", "root", "0214", "opentutorials");
$sql = "select * from topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
  $escape_title = htmlspecialchars($row['title']);
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escape_title}</a></li>";
}
$sql = "select * from author";
$result = mysqli_query($conn, $sql);
$select_form = '<select name="author_id">';
while($row = mysqli_fetch_array($result)){
  $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
$select_form .= '</select>';
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  <head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <form action="process_create.php" method="post">
      <p><input type="text" name="title" placeholder="Title"></p>
      <p><textarea name="description" placeholder="Description"></textarea></p>
      <?=$select_form?>
      <p><input type="submit"></input></p>
    </form>
  </body>
</html>
