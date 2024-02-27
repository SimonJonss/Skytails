<?php 
    $out = "";
    $data = "[";
    include "essential/connection.php";
    $fb = $conn->query("SELECT * FROM site_text");
    if ($fb->num_rows > 0) {
        while ($row = $fb -> fetch_assoc()) {
            $rowData = json_encode(array($row['text'], $row['javascript_id'], $row['title']));
            $data .= "{$rowData}, ";
        }
        $data = substr($data, 0, -2);
    }
    $data .= "]";
    $out = json_encode($data);
    echo ($out);
?>