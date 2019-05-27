<?php
function getConnection() {
    // Valoriser les infos de conn dans settings.php
    $db_infos = getDbInfos();
    $dbhost = $db_infos['host'];
    $dbuser = $db_infos['user'];
    $dbpass = $db_infos['pass'];
    $dbname = $db_infos['dbname'];
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}
?>
