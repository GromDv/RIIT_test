<?php
require_once('lib/user.php');
//require_once('lib/db_base_conn.php');
require_once('lib/pg_conn.php');
  
$sql = 'SELECT u.id as uId, name, e.education, (
          SELECT COUNT(id) FROM User_Places up2 WHERE user_id = u.id
        ) as places FROM Users u 
        JOIN Education e ON e.user_id = u.id;';

//$result = mysqli_query($link, $sql);
$result = pg_query($link, $sql);

$elems = array();

while($row = pg_fetch_array($result))
{
  if(intval($row['places']) === 0) {
    array_push($elems, ["name"=>$row['name'], "education"=>$row['education'], "places"=>"-"]);
  } else if(intval($row['places']) > 0) {
    $sql = 'SELECT place FROM User_Places up
            JOIN Places p ON p.id = up.place_id 
            WHERE up.user_id = '.$row['uid'].';';
    $res_places = pg_query($link, $sql);
    $pls = "";
    while($row_place = pg_fetch_array($res_places)) 
    {
      $pls .= $row_place['place'].', ';
    }
    $pls = mb_substr($pls, 0, strlen($pls) - 2);
    array_push($elems, ["name"=>$row['name'], "education"=>$row['education'], "places"=>$pls]);
  }

}
$items = ["items"=>$elems];

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
echo json_encode($items);

?>
