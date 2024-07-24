<?php
require_once 'lib/response.php';
require_once 'lib/request.php';
require_once 'lib/pg_conn.php';

$request = new Request(array());

$id = $request->getId();
$id = mb_substr($id, 10, strlen($id));

echo 'id='.$id;
$value = $request->getVal();
echo 'val='.$value;

$query="UPDATE Education SET education = '".$value."' WHERE user_id = ".$id.";";

$result = pg_query($link, $query);

$res = new Response();
if($result) {
	$res->success = true;
	$res->message = "Updated record";
	$res->total = "";
} else {
	$res->success = false;
	$res->message = "Error update record";
	$res->total = "";
}

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

print_r($res->to_json());
?>
