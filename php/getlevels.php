<?php
    // Send variables for the MySQL database class.
    $database = mysql_connect('mysql8.000webhost.com', 'a4491895_tapdot', 'futch2413') or die('Could not connect: ' . mysql_error());
    mysql_select_db('a4491895_tapdot') or die('Could not select database');
 
    $query = "SELECT * FROM `CommunityLevels` LIMIT 0, 30";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
 
    $num_results = mysql_num_rows($result);  
 
    for($i = 0; $i < $num_results; $i++)
    {
         $row = mysql_fetch_array($result);
         echo $row['LevelName'] . "\t" . $row['Upvotes'] . "\t" . $row['Downvotes'] . "\n";
    }
?>