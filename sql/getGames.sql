SELECT games.gameid, games.name, games.price, votes.votecount
FROM db_fall19_ballw3.games
JOIN votes ON games.gameid = votes.voteid
ORDER BY votecount DESC