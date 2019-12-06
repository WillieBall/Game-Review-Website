
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<!-- VOTE CLICKS -->
	<script>
//VOTE UP
$('.game-vote .vote-up i').click(function(){

    var gameid = $(this).data('id');

    $.ajax
    ({ 
        url: 'vote.php?vote_type=up',
        data: {"gameid": gameid},
        type: 'post',
        success: function(result)
        {
			//alert($("div#game-1").text());
			var count = parseInt($("div#game-"+gameid+"").text()) + 1;
			$("div#game-"+gameid+"").text(count);
        }
    });
});

//VOTE DOWN
$('.game-vote .vote-down i').click(function(){

    var gameid = $(this).data('id');
	
//If Vote is 0 this ignore vote down
if($("div#game-"+gameid+"").text() != 0) {
    $.ajax
    ({ 
        url: 'vote.php?vote_type=down',
        data: {"gameid": gameid},
        type: 'post',
        success: function(result)
        {
			//alert($("div#game-1").text());
			var count = $("div#game-"+gameid+"").text() - 1;
			$("div#game-"+gameid+"").text(count);
        }
    });
}
});
</script>

  </body>
</html>