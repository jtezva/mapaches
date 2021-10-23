<?php
class Connector {
    public static function getConnection() {
        $dbh = new PDO('mysql:host=localhost;dbname=mapaches', 'root', '_soyElMejorR00t');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }
}
?>