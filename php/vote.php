<?php
    

    $type = $_GET['type'];
    $index = $_GET['index'];
    $pw = $_GET['pw'];

    // Send variables for the MySQL database class.

    $db = mysqli_connect('localhost', 'id1567088_tapdotadmin', $pw) or die('Could not connect: ' . mysqli_error($db));

    mysqli_select_db($db, 'id1567088_tapdot') or die('Could not select database');

    if ($type == 'upvote'){
        $query = "UPDATE `CommunityLevels` SET `Points` = `Points` + 1 WHERE `LevelIndex` = $index;";
    }
    elseif ($type == 'downvote'){
        $query = "UPDATE `CommunityLevels` SET `Points` = `Points` - 1 WHERE `LevelIndex` = $index;";
    }


    mysqli_query($db, $query) or die('Query failed: ' . mysqli_error($db));

    if ($type == 'upvote'){
        echo "upvote";
    }
    elseif ($type == 'downvote'){
        echo "downvote";
    }

?>