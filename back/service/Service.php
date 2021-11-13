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

    public static function updateCategory($id, $description) {
        $query = 'update category set description = :description where id = :id';
        $dbh = Connector::getConnection();
        $stmt = $dbh->prepare($query);
        $stmt->bindValue('description', $description);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function updateCandidate($id, $name, $photo) {
        $query = 'update candidate set name = :name, photo = :photo where id = :id';
        $dbh = Connector::getConnection();
        $stmt = $dbh->prepare($query);
        $stmt->bindValue('name', $name);
        $stmt->bindValue('photo', $photo);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function findAll($tableName, $pageNumber, $pageSize){
        $query1 = 'select * from ' . $tableName . ' limit ' . (($pageNumber * $pageSize) - $pageSize) . ',  ' . $pageSize;
        $query2 = 'select count(1) from ' . $tableName;
        $dbh = Connector::getConnection();
        $stmt1 = $dbh->prepare($query1);
        $stmt2 = $dbh->prepare($query2);
        $stmt1->execute();
        $data = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $stmt2->execute();
        $count = $stmt2->fetch()[0];
        return (object) array(
            'list' => $data,
            'total' => $count
        );
    }
}
?>