<?php

class json{

    public static function generate($status, $status_code, $message, $data){
        echo json_encode(
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