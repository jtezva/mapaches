<?php
require_once '../dao/Connector.php';
class Service {
    public static function insertCategory($description) {
        $query = 'insert into category (description) values (:description)';
        $dbh = Connector::getConnection();
        $stmt = $dbh->prepare($query);
        $stmt->bindValue('description', $description);
        $stmt->execute();
        return $dbh->lastInsertId();
    }

    public static function insertCandidate($idCategory, $name, $photoUrl) {
        $query = 'insert into candidate (id_category, name, photo) values (:id_category, :name, :photo)';
        $dbh = Connector::getConnection();
        $stmt = $dbh->prepare($query);
        $stmt->bindValue('id_category', $idCategory);
        $stmt->bindValue('name', $name);
        $stmt->bindValue('photo', $photoUrl);
        $stmt->execute();
        return $dbh->lastInsertId();
    }

    public static function insertVote($idCandidate) {
        $query = 'insert into vote (id_candidate) values (:id_candidate)';
        $dbh = Connector::getConnection();
        $stmt = $dbh->prepare($query);
        $stmt->bindValue('id_candidate', $idCandidate);
        $stmt->execute();
        return $dbh->lastInsertId();
    }

    public static function delete($tableName, $id) {
        $query = 'delete from ' . $tableName . ' where id = :id';
        $dbh = Connector::getConnection();
        $stmt = $dbh->prepare($query);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>