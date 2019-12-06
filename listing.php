<?php
include('config.php');
include('functions.php');
$term = get('search-term');
$games = getGames($database);
$gameid = get('gameid');
//If search then we use the game_search function
if(!empty($_GET['search-term'])) { 
$game_search = searchGames($term, $database);
$games = $game_search; 
}
$getuser = new getuser($userID, $database);
//$games = getGames($gameid, $database);
//$game = $games[0];
//$game_genre = getGenre($gameid, $database);


?>



<?php include('./includes/header.php'); ?>
  <body>

<?php include('./includes/nav.php'); ?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1 style="float:left;">Games List</h1>
        <form method="GET" style="float:right;margin-top:43px;">
		<div "class="form-group">
			<input class="form-control" type="text" name="search-term" placeholder="Search..."/>
			<input class="btn btn-outline-secondary" type="submit"/>
			</div>
		</form>
		<div style="clear:both;"></div>
		<div class="game-list-wrapper">
		<?php 
		foreach($games as $game) :
		 ?>
		<div class="game-vote col-md-1">
		<div class="vote-up"><i class="fas fa-thumbs-up" data-id="<?php echo $game["gameid"]; ?>"></i></div>
		<div class="vote-down"><i class="fas fa-thumbs-down" data-id="<?php echo $game["gameid"]; ?>"></i>
		<div class="vote-count" id="game-<?php echo $game["gameid"]; ?>"><?php echo $game["votecount"]; ?></div>
		</div>
		</div>
		<div class="games-listing col-md-11">
		
		
		<p>
				<strong>Game: </strong><?php echo $game["name"]; ?></br>
				<strong>Price: </strong>$<?php echo $game["price"]; ?>
		<br />	
		<strong>Genre: </strong>
		</p>
		<ul class="game-categories">
		<?php 
		//list game categories
		$categories = getGenre($game['gameid'], $database);
		foreach($categories as $cat) :
		?>
		<li><?php echo $cat['genre'];?></li>
		<?php
		endforeach;
		?>
		</ul>
		</div>
		
		<div style="clear:both;"></div>
		<?php endforeach; ?>
      </div>
	</div>
	
    </div> <!-- /container -->

<?php include('./includes/footer.php'); ?>