<?php
    
    if (isset($_POST["custId"])){
        $key = $_POST["custId"];
    }
    $bJ = file_get_contents('books.json');
    $b_array = json_decode($bJ, true);
    
    unset($b_array[$key]);

    $b_array = array_values($b_array);

    $jsonData = json_encode($b_array);
    file_put_contents('books.json', $jsonData);
    header("Location: /index.php");
    exit();

?>