SELECT game_genre.gameid, genre.genreid, genre.genre
FROM game_genre
JOIN genre on game_genre.genreid = genre.genreid
WHERE gameid = :gameid