SELECT users.userid, users.username, users.password, users.isAdmin
FROM db_fall19_ballw3.users
WHERE users.username = :username