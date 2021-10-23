<?php
require_once '../Utils.php';
require_once '../service/Service.php';
/**
 * delete from CATEGORY, CANDIDATE, VOTE
 * insert.php?table=[CATEGORY|CANDIDATE|VOTE]&id=X
 */
$tableName = $_GET['table'];
$id = intval($_GET['id']);
if (!$tableName) {
    Utils::response(400, false, 'table name is required');
}
if ($tableName != 'category' && $tableName != 'candidate' && $tableName != 'vote') {
    Utils::response(400, false, 'table name is required');
}
if (!$id > 0) {
    Utils::response(400, false, 'id is required');
}
$deletedRows = Service::delete($tableName, $id);
Utils::response(200, true, "deleted rows: $deletedRows", $deletedRows);
?>