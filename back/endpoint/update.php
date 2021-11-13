<?php
require_once '../Utils.php';
require_once '../service/Service.php';
/**
 * Update CATEGORY, CANDIDATE
 * update.php?table=[CATEGORY|CANDIDATE|VOTE]&id=X
 */
$tableName = $_GET['table'];
$id = $_GET['id'];
if (!$tableName) {
    Utils::response(400, false, 'table name is required');
}
if (!$id) {
    Utils::response(400, false, 'id is required');
}
if ($tableName != 'category' && $tableName != 'candidate') {
    Utils::response(400, false, 'invalid table');
}
if ($tableName == 'category') {
    $description = $_POST['description'];
    if (!$description) {
        Utils::response(400, false, 'for category description is required');
    }
    $updatedRows = Service::updateCategory($id, $description);
    Utils::response(200, true, "updated rows: $updatedRows", $updatedRows);
} else if ($tableName == 'candidate') {
    $name = $_POST['name'];
    $photoUrl = $_POST['photo'];
    if (!$name || !$photoUrl) {
        Utils::response(400, false, 'for candidate data is missing');
    }
    $updatedRows = Service::updateCandidate($id, $name, $photoUrl);
    Utils::response(200, true, "updated rows: $updatedRows", $updatedRows);
}
?>