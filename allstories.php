<?php
include 'header.php';
?>


<?php
$stories_query = mysql_query("SELECT title, username, tag1, tag2, tag3, tag4, tag5, tag6, tag7, storyID FROM Story, users where Story.creatorID=users.userID");


echo "Displaying all stories of: "; 



	echo "<table border=\"1\" width=\"100%\" cellpadding=\"2\" cellspacing=\"2\">";
	echo "<tr>";
	echo '<td align=\"center\" style="width:100%;">title</td>';
	echo "<td align=\"center\">username</td>";
	echo "<td align=\"center\">tag1</td>";
	echo "<td align=\"center\">tag2</td>";
	echo "<td align=\"center\">tag3</td>";
	echo "<td align=\"center\">tag4</td>";
	echo "<td align=\"center\">tag5</td>";
	echo "<td align=\"center\">tag6</td>";
	echo "<td align=\"center\">tag7</td>";
	
	if($_SESSION['teacher']==1){
		echo "<td align=\"center\">assign</td>";
	}
	
	
	echo "</tr>";

while($row = mysql_fetch_array($stories_query))
{
	
	echo '<tr>';
	echo '<td align=\"center\" style="width:100%;"><a href="story.php?storyID='.$row['storyID'].'">'.$row['title'].'</a></td>';
	echo '<td align=\"center\">'.$row['username'].'</td>';
	echo '<td align=\"center\">'.$row['tag1'].'</td>';
	echo '<td align=\"center\">'.$row['tag2'].'</td>';
	echo '<td align=\"center\">'.$row['tag3'].'</td>';
	echo '<td align=\"center\">'.$row['tag4'].'</td>';
	echo '<td align=\"center\">'.$row['tag5'].'</td>';
	echo '<td align=\"center\">'.$row['tag6'].'</td>';
	echo '<td align=\"center\">'.$row['tag7'].'</td>';
	if($_SESSION['teacher']==1){
		
		echo '<td align=\"center\" style="text-align:center;">
	<a href="createassignment.php?story='.$row['storyID'].'"><img class="icon" height="16" width="16" alt="create assignment" title="createassignment" src="_paper.png"></a><!--<a href="createassignment.php?story='.$row['storyID'].'">assign</a>--></td>';
	
	}
	
	//echo '<td align="center">'.$row[3].'</td>';
	echo '</tr>';
	
}
echo "</table>";


?>



<?php
include 'footer.php';
?>