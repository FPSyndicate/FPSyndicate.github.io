<?php

    $name = addslashes ($_GET['name']);
    $author = addslashes ($_GET['author']);
    $desc = addslashes ($_GET['desc']);
    $data = addslashes($_GET['data']) ;

    $pw = $_GET['pw'];

    // Send variables for the MySQL database class.

    $db = mysqli_connect('localhost', 'id1567088_tapdotadmin', $pw) or die('Could not connect: ' . mysqli_error($db));

    mysqli_select_db($db, 'id1567088_tapdot') or die('Could not select database');

    //$query = "INSERT INTO `CommunityLevels` (`LevelIndex`, `LevelName`, `LevelDescription`, `LevelData`, `LevelAuthor`, `Points`, `Reports`, `Downloads`) VALUES (NULL, '$name', '$desc', '$data', '$author', '0', '0', '0');";

    $query = "INSERT `CommunityLevels` (LevelIndex, LevelName, LevelDescription, LevelData, LevelAuthor, Points, Reports, Downloads) SELECT NULL, '$name', '$desc', '$data', '$author', '0', '0', '0' WHERE NOT EXISTS (SELECT * FROM `CommunityLevels` WHERE `LevelName` = '$name' AND `LevelDescription` = '$desc'); SELECT ROW_COUNT();";

    //echo $data . "<br/><br/>" . $query . "<br/><br/>";

    $result = mysqli_query($db, $query) or die('Query failed: ' . mysqli_error($db));

    //echo $result;
    echo mysqli_affected_rows($db);
?>



