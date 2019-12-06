<?php
include('config.php');
include('functions.php');
//Make sure user is admin
checkAdmin($_SESSION['userID'], $database);
$getuser = new getuser($userID, $database);
$games = getGames($database);
?>
<?php include('./includes/header.php'); ?>
  <body>
<?php include('./includes/nav.php'); ?>


    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Admin Panel</h1>
		
		
		<form class="form-horizontal" action="admin.php?editgame=true" method="GET">
		<input type="hidden" name="editgame" value="true" />
		<label>Edit Game:</label>
		<select class="form-control" name="gameid">
		<?php foreach($games as $game): ?>
		<option value="<?php echo $game['gameid'];?>" <?php if(!empty($_GET['gameid']) && $_GET['gameid'] == $game['gameid']) { echo "selected"; }?>><?php echo $game['name']; ?></option>
		<?php endforeach; ?>
		</select>
		<button type="submit" class="btn btn-default">Edit Game</button>
		</form>
		
		
<?php if(!empty($_GET['editgame']) && is_numeric($_GET['gameid'])) : ?>	
<?php 
$gameid = $_GET['gameid'];
$get_game = getGame($gameid, $database);

foreach($get_game as $game):
?>
<br />
<form class="form-horizontal" action="/admin_action.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Game Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="gamename" value="<?php echo $game['name']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Game Price:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="gamename" value="<?php echo $game['price']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Vote Count:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="gamename" value="<?php echo $game['votecount']; ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Edit Game</button>
    </div>
  </div>
</form>
<?php endforeach; ?>
<?php endif; ?>



      </div>

    </div> <!-- /container -->


<?php include('./includes/footer.php'); ?>