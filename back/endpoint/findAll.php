<?php
require_once '../Utils.php';
require_once '../service/Service.php';
/**
 * select from CATEGORY, CANDIDATE, VOTE
 * findAll.php?table=[CATEGORY|CANDIDATE|VOTE]&start=0&limit=10
 */
$tableName = $_GET['table'];
$pageNumber = isset($_GET['page']) ? $_GET['page'] : 1;
$pageSize = isset($_GET['size']) ? $_GET['size'] : 999;
if (!$tableName) {
    Utils::response(400, false, 'table name is required');
}
if ($tableName != 'category' && $tableName != 'candidate' && $tableName != 'vote') {
    Utils::response(400, false, 'table name is required');
}
$data = Service::findAll($tableName, $pageNumber, $pageSize);
Utils::response(200, true, "OK", $data);
?>