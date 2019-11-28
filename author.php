<?php
$conn = mysqli_connect("localhost", "root", "0214", "opentutorials");

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  <head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <p><a href="index.php">topic</a></p>
    <table border="1">
      <tr>
        <td>id</td><td>name</td><td>profile</td><td></td>
        <?php
          $sql = "select * from author";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_array($result)){
            $filtered = array(
              'id'=>htmlspecialchars($row['id']),
              'name'=>htmlspecialchars($row['name']),
              'profile'=>htmlspecialchars($row['profile'])
              )
            ?>
            <tr>
              <td><?=$filtered['id']?></td>
              <td><?=$filtered['name']?></td>
              <td><?=$filtered['profile']?></td>
              <td><a href="author.php?id=<?=$filtered['id']?>">update</a></td>
              <td>
                <form action="process_delete_author.php" method="post" onsubmit="if(!confirm('sure?')){return false;}">
                  <input type="hidden" name="id" value="<?=$filtered['id']?>">
                  <input type="submit" value="delete">
                </form>
              </td>
            </tr>
            <?php
          }
         ?>
      </tr>
    </table>
    <?php
    $escaped = array(
      'name'=>'',
      'profile'=>''
    );
    $lable_submit = 'Create author';
    $form_action = 'process_create_author.php';
    $form_id = '';
    if(isset($_GET['id'])){
      $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
      settype($filtered_id, 'integer');
      $sql = "select * from author where id={$filtered_id}";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $escaped['name'] = htmlspecialchars($row['name']);
      $escaped['profile'] = htmlspecialchars($row['profile']);
      $lable_submit = 'Update author';
      $form_action = 'process_update_author.php';
      $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
    }
     ?>
    <form action="<?=$form_action?>" method="post">
      <?=$form_id?>
      <p><input type="text" name="name" placeholder="Name" value="<?=$escaped['name']?>"></p>
      <p><textarea name="profile" placeholder="Profile"><?=$escaped['profile']?></textarea></p>
      <p><input type="submit" value="<?=$lable_submit?>"></input></p>
    </form>
  </body>
</html>
