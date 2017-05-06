<?php

    // Send variables for the MySQL database class.

    $db = mysqli_connect('localhost', 'id1567088_tapdotadmin', 'tapdotsecretpassword') or die('Could not connect: ' . mysqli_error($db));

    mysqli_select_db($db, 'id1567088_tapdot') or die('Could not select database');

 
    $type = $_GET['type'];
    $index = $_GET['index'];
    $offset = $_GET['offset'];

    $num_rows = 7;

    if($type == 'new')
        $query = "SELECT DISTINCT LevelIndex, LevelName, LevelDescription, Points, LevelAuthor, Downloads FROM `CommunityLevels` ORDER BY LevelIndex DESC LIMIT $offset, $num_rows";
    elseif ($type == 'old')
        $query = "SELECT DISTINCT LevelIndex, LevelName, LevelDescription, Points, LevelAuthor, Downloads FROM `CommunityLevels` ORDER BY LevelIndex ASC LIMIT $offset, $num_rows";
    elseif ($type == 'best')
        $query = "SELECT DISTINCT LevelIndex, LevelName, LevelDescription, Points, LevelAuthor, Downloads FROM `CommunityLevels` ORDER BY Points DESC LIMIT $offset, $num_rows";
    elseif ($type == 'worst')
        $query = "SELECT DISTINCT LevelIndex, LevelName, LevelDescription, Points, LevelAuthor, Downloads FROM `CommunityLevels` ORDER BY Points ASC LIMIT $offset, $num_rows";
    elseif ($type == 'downloads')
        $query = "SELECT DISTINCT LevelIndex, LevelName, LevelDescription, Points, LevelAuthor, Downloads FROM `CommunityLevels` ORDER BY Downloads DESC LIMIT $offset, $num_rows";
    elseif ($type == 'getleveldata'){
    	$query = "UPDATE `CommunityLevels` SET `Downloads` = `Downloads` + 1 WHERE `LevelIndex` = $index;";
    
    		mysqli_query($db, $query) or die('Query failed: ' . mysqli_error($db));
		$query = "SELECT DISTINCT `LevelData` FROM `CommunityLevels` WHERE `LevelIndex` = $index;";
    }

    //$query = "SELECT DISTINCT LevelData FROM `CommunityLevels` WHERE LevelIndex='$index';";

    $result = mysqli_query($db, $query) or die('Query failed: ' . mysqli_error($db));

 

    $num_results = mysqli_num_rows($result);  

 

    for($i = 0; $i < $num_results; $i++)

    {

         $row = mysqli_fetch_assoc($result);
         foreach($row as $field) {
             echo $field . "|";
         }
         echo "\n";

    }

?>