<?php
require("connection.php");

if (isset($_POST['productIds']) && !empty($_POST['productIds'])) {
    $ids = $_POST['productIds'];

    $productIdList = implode(',', $ids);

    $sql = "SELECT id, pname, price FROM products WHERE id IN ($productIdList)";

    $result = $connection->query($sql);

    if ($result) {
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        header('Content-Type: application/json');

        if (!empty($data)) {
            echo json_encode($data);
        } else {
            echo json_encode(array("message" => "No products found"));
        }
    } else {
        echo json_encode(array("message" => "Error executing query"));
    }
} else {
    echo json_encode(array("message" => "No IDs provided"));
}

$connection->close();
?>
