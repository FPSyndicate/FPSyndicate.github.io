<?php
    $index = $_GET['id'];

    if (!isset($_GET['pw'])) { header("Location: https://play.google.com/store/apps/details?id=com.FPSyndicate.TapDot2&hl=en"); exit(); }
    
    $pw = $_GET['pw'];
    
    $db = mysqli_connect('localhost', 'id1567088_tapdotadmin', $pw) or die('Could not connect: ' . mysqli_error($db));

    mysqli_select_db($db, 'id1567088_tapdot') or die('Could not select database');

    $num_rows = 7;

    $query = "UPDATE `CommunityLevels` SET `Downloads` = `Downloads` + 1 WHERE `LevelIndex` = $index;";
    mysqli_query($db, $query) or die('Query failed: ' . mysqli_error($db));
    $query = "SELECT DISTINCT `LevelData` FROM `CommunityLevels` WHERE `LevelIndex` = $index;";
    $result = mysqli_query($db, $query) or die('Query failed: ' . mysqli_error($db));

    $num_results = mysqli_num_rows($result);  
    $row = mysqli_fetch_assoc($result);
    foreach($row as $field) {
     echo $field;
    }


?>