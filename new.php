
<?php
include("header.php");
include("connect.php");

echo '<div class="w3-container w3-theme-l2">
<h2>New  Post</h2></div>
<div class="w3-bar w3-theme-l3">
    <button class="w3-bar-item w3-button w3-theme-l3"><a href="index.php" <i class="fa fa-home"></i>  Home</button></a>
</div>
';




if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST ['description']);
    $date = date('Y-m-d H:i');
    $posted_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);

    $sql = "INSERT INTO posts (title, description, posted_by, date) VALUES('$title', '$description', '$posted_by', '$date')";
    mysqli_query($dbcon, $sql) or die("failed to post" . mysqli_connect_error());

    printf("Posted successfully. <meta http-equiv='refresh' content='2; url=view.php?id=%d'/>",
        mysqli_insert_id($dbcon));


} else {

    echo '
<form class="w3-container w3-padding" method="POST">
<label>Title</label>

<input type="text" class="w3-input w3-border" name="title" required>
<br>

<label>Description</label>
<textarea id = "description" row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
<br>

<input type="submit" class="w3-btn w3-theme w3-round" name="submit" value="Post">
</form>
';

}

include("footer.php");
