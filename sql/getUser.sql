SELECT users.userid, users.username, users.password, users.isadmin
FROM db_fall19_ballw3.users
WHERE users.userid = :userid