<?php
require_once("../data/db_connect.php");
$data = $_POST['data']; /* individual query such as dept_id or ops_id */
global $link;
$query = "select cfn,cln,soft_name
from corpclient,software, clientsoftware
where software.soft_id=clientsoftware.soft_id and
    clientsoftware.cid = corpclient.cid
and software.soft_id=".$data;

$results = array();
$result = mysqli_query($link,$query);

while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $results[] = $row;
}

echo json_encode(($results));
?>