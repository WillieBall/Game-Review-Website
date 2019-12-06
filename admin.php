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
		
		<?php if(!empty($_GET['msg'])) { ?>
		<center><h3><?php echo htmlentities($_GET['msg']); ?></h3></center>
		<?php } ?>
		
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
		<br /><br />
		<h3>Add Game</h3>
		<form class="form-horizontal" action="./admin_action.php?action=add" method="POST">
		<input type="hidden" name="addgame" value="true" />
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Game Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name"">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="price">Game Price:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Add Game</button>
    </div>
  </div>
		</form>
		
		
<?php if(!empty($_GET['editgame']) && is_numeric($_GET['gameid'])) : ?>	
<?php 
$gameid = $_GET['gameid'];
$get_game = getGame($gameid, $database);

foreach($get_game as $game):
?>
<br />
<form class="form-horizontal" action="./admin_action.php?action=edit" method="post">
<input type="hidden" name="gameid" value="<?php echo $_GET['gameid']; ?>">

  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Game Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $game['name']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="price">Game Price:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price" value="<?php echo $game['price']; ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save Game</button>
    </div>
  </div>
</form>
<?php endforeach; ?>
<?php endif; ?>



      </div>

    </div> <!-- /container -->


<?php include('./includes/footer.php'); ?>