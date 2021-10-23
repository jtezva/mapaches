<?php
class Utils {
    public static function response($httpcode, $success, $message = null, $data = null) {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($httpcode);
        echo json_encode((object) array(
            'success' => $success,
            'message' => $message,
            'data' => $data
        ));
        die();
    }
}
?>