<?php
include("connect.php");
include("header.php");

$id = (INT)$_GET['id'];// chope l'id de l'article actuel dans lurl
if ($id < 1) { //si probleme d'id invalide ou autres
    header("location: index.php");//redirection
}
$sql = "Select * FROM posts WHERE id = '$id'";//rechercher dans la DB si un article a l'ID qu'on recherche
$result = mysqli_query($dbcon, $sql); // result = l'article corespondant a l'id

$invalid = mysqli_num_rows($result);// si invalid stock le result dans invalid
if ($invalid == 0) {
    header("location: index.php");
}

$hsql = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$des = $row['description'];
$by = $row['posted_by'];
$time = $row['date'];

echo '

<div class="w3-bar w3-theme-l3">
    <button class="w3-bar-item w3-button w3-theme-l3"><a href="index.php" <i class="fa fa-home"></i>  Home</button></a>
</div>
';
echo "<h3>$title</h3>";

echo '<div class="w3-panel w3-leftbar w3-rightbar w3-border w3-theme-l5 w3-card-4">';
echo "$des<br>";
echo '<div class="w3-text-grey">';
echo "Posted by: " . $by . "<br>";
echo "$time</div>";
?>
    <div class="w3-text-green"><a href="edit.php?id=<?php echo $row['id']; ?>">[Edit]</a></div>
    <div class="w3-text-red">
        <a href="del.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this post?'); ">[Delete]</a></div>
<?php
//}
echo '</div></div>';


include("footer.php");
