<?php 

/**
 * Connection information
 */
  
$hostname     = "icoracle.epfl.ch";
$port         = 1521;
$service_name = "srso4.epfl.ch";
$username     = "DB2012_G11";
$password     = "DB2012_G11";

$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = icoracle.epfl.ch)(PORT = 1521)))(CONNECT_DATA=(SERVICE_NAME = srso4.epfl.ch)))";

/**
 * Create connection to database
 * Use of oci_pconnect to create a persistant connection
 * Use of oci_connect for a non-persistant connection
 */

$connection = oci_connect($username, $password, $db);

if (!$connection) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
  echo "Connected to Database";
}

oci_close($connection);

$sql_query1 = "
  SELECT p.firstname, p.lastName
  FROM Coach c, Player p
  WHERE p.firstname = c.firstname AND
        p.lastname = c.lastname 
";
$sql_query2 = "
  SELECT PlayerExt.firstName, PlayerExt.lastName
  FROM (
    SELECT p1.firstName, p1.lastName, RegSeason.year
    FROM Player p1
    INNER JOIN RegSeason
    ON p1.pid=RegSeason.pid
    GROUP BY p1.id AS PlayerExt),(
    SELECT c1.firstName, c1.lastName, CoachSeason.year
    FROM Coach c1
    INNER JOIN CoachSeason
    ON c1.cid=CoachSeason.cid
    GROUP BY c1.id AS CoachExt)
  WHERE 
    CoachExt.year = PlayerExt.year AND 
    PlayerExt.firstname = CoachExt.firstname AND
    PlayerExt.lastname = CoachExt.lastname
";
$sql_query3 = "
  SELECT college
  FROM Player
  GROUP BY college
  HAVING COUNT(*) <= (SELECT COUNT(*)
                      FROM Player
                      GROUP BY college)
";
$sql_query4 = "
  SELECT c1.lastName, c1.firstName
  FROM Coach c1, CoachSeason s1, CoachSeason s2
  WHERE c1.cid = s1.cid AND
        c1.cid = s2.cid AND
        s1.tid IN ( SELECT tid
                    FROM Team
                    WHERE league = 'ABA') AND
        s2.tid IN ( SELECT tid
                    FROM Team
                    WHERE league = 'NBA')
";
$sql_query5_max = "
  SELECT p.firstName, p.lastName, s.year
  FROM Player AS p, RegSeason AS s
  WHERE p.pid = s.pid
  GROUP BY s.year, s.score
  HAVING s.score >= ALL ( SELECT score
                          FROM RegSeason
                          WHERE year = s.year)
";
$sql_query5_min = "
  SELECT p.firstName, p.lastName, s.year
  FROM Player AS p, RegSeason AS s
  WHERE p.pid = s.pid
  GROUP BY s.year, s.score
  HAVING s.score <= ALL ( SELECT score
                          FROM RegSeason
                          WHERE year = s.year)
";

/* convert birthdata to age! */
$sql_query6_max = "
  SELECT p1.lastName, p1.firstName, s1.year
  FROM Player p1, PlayoffSeason s1
  WHERE p1.pid = s1.pid AND
        p1.birthdata >= ALL ( SELECT MAX(p.birthdata)
                              FROM Player p, PlayoffSeason s
                              WHERE p.pid = s.pid AND
                                    s.year = s1.year)
  GROUP BY s1.year
";

$sql_query6_min = "
  SELECT p1.lastName, p1.firstName, s1.year
  FROM Player p1, PlayoffSeason s1
  WHERE p1.pid = s1.pid AND
        p1.birthdata >= ALL ( SELECT MAX(p.birthdata)
                              FROM Player p, PlayoffSeason s
                              WHERE p.pid = s.pid AND
                                    s.year = s1.year)
  GROUP BY s1.year
";

?>