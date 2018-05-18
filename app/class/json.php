<?php

class json{

    public static function generate($status, $status_code, $message, $data){
        header('Content-Type: application/json; charset=utf-8');
        return json_encode(
            array(
                'status' => $status,
                'status_code' => $status_code,
                'message' => $message,
                'result' => $data
            )
        );
    }

}

?>