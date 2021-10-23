<?php
require_once '../Utils.php';
require_once '../service/Service.php';
/**
 * Insert into CATEGORY, CANDIDATE, VOTE
 * insert.php?table=[CATEGORY|CANDIDATE|VOTE]
 */
$tableName = $_GET['table'];
if (!$tableName) {
    Utils::response(400, false, 'table name is required');
}
if ($tableName != 'category' && $tableName != 'candidate' && $tableName != 'vote') {
    Utils::response(400, false, 'table name is required');
}
if ($tableName == 'category') {
    $description = $_POST['description'];
    if (!$description) {
        Utils::response(400, false, 'for category description is required');
    }
    $newId = Service::insertCategory($description);
    Utils::response(201, true, "category inserted: $newId", $newId);
} else if ($tableName == 'candidate') {
    $idCategory = $_POST['id_category'];
    $name = $_POST['name'];
    $photoUrl = $_POST['photo'];
    if (!$idCategory || !$name || !$photoUrl) {
        Utils::response(400, false, 'for candidate data is missing');
    }
    $newId = Service::insertCandidate($idCategory, $name, $photoUrl);
    Utils::response(201, true, "candidate inserted: $newId", $newId);
} else if ($tableName == 'vote') {
    $idCandidate = $_POST['id_candidate'];
    if (!$idCandidate) {
        Utils::response(400, false, 'for vote id_candidate is required');
    }
    $newId = Service::insertVote($idCandidate);
    Utils::response(201, true, "vote inserted: $newId", $newId);
}
?>