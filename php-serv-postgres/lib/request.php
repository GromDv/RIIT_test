<?php
class Request {
    public $method, $res_id, $res_val;

    public function __construct($params) {
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->parseRequest();
    }
    public function getId() {
        return $this->res_id;
    }
    public function getVal() {
        return $this->res_val;
    }

    protected function parseRequest() {
        $raw = file_get_contents('php://input');
        $params = json_decode($raw);
        $this->res_val = $params->education;
        $this->res_id = $params->id;
    }
}
?>
