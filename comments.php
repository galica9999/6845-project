<?php
require "./commentConfig.php";?>

      <h3 class="ui top attached header">Comments</h3>
      <div class="ui attached segment">
        <div class="ui list celled large">

<?php
  if (isset($_POST['commentText'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);

      $newComment =  str_replace(['"',"'"], "", $_POST['commentText']);
      $timestamp = date("Y-m-d H:i:s");

      $sql = "INSERT INTO Comments VALUES ('$newComment', '$timestamp')";

      $connection->exec($sql);
    }
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }
?>

<?php 
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM Comments";
    try {
        $tables = $connection->query($sql);
        $comments = $tables->fetchAll(PDO::FETCH_ASSOC);
        if($comments){
          foreach($comments as $singleComment){
            $time = $singleComment['Time'];
            $commentText = $singleComment['Comment'];
            $strippedComment =  str_replace([' '," ",'-'], "", $commentText);
            $strippedTime = str_replace([':'," "], "", $time);
            echo "<div class='item'><img class='ui avatar image' src='https://robohash.org/".$strippedComment.$strippedTime.".png'><div class='content'><div class='header'>".$commentText."</div>".$time."</div></div>";
          }
        }
    }
    catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
  }
  catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
?>

    
</div>
      </div>
      <div class="ui bottom attached header">
        <form class="ui form" method='POST'>
        <div class="inline fields">
          <div class="eight wide field">
            <label>New Comment: </label>
            <input type="text" placeholder="Type text here" name='commentText' id="commentText">
          </div>
          <button class="ui primary button" name="submit" id="submit" type='submit'>
            <i class="paper plane icon"></i>
          </button>
        </div>
      </form>
    </div>

<?php include "templates/footer.php";?>