<!--header start-->
<?php
include("connect.php");
include("header.php");
?>
<div class="w3-bar w3-theme-l3">
    <button class="w3-bar-item w3-button w3-theme-l3"><a href="index.php" <i class="fa fa-home"></i>  Home</button></a>
    <button class="w3-bar-item w3-button w3-theme-l3"><a href="new.php" <i class="fa fa-plus-square"></i>  Add Article</button></a>
</div>

<!--//body start-->
<?php
$sql = "SELECT * FROM posts ORDER BY id DESC ";
$result = mysqli_query($dbcon, $sql); //etablit la connexion a la DB
if (mysqli_num_rows($result) < 1) { // SI AUCUN ARTICLE DANS DB
    echo '<div class="w3-panel w3-theme-l5 w3-card-2 w3-border w3-round">No post yet!</div>';//display un msg aucun post
} else {
while ($row = mysqli_fetch_assoc($result)) { //sinon tant que le resultat est positif


    $id = htmlentities($row['id']); // assigne la variables en fonction de la data de la DB
    $title = htmlentities($row['title']); // assigne la variables en fonction de la data de la DB
    $des = htmlentities(strip_tags($row['description'])); // assigne la variables en fonction de la data de la DB
    $time = htmlentities($row['date']); // assigne la variables en fonction de la data de la DB

    echo '<div class="w3-panel w3-theme-l5 w3-card-4">';
    echo "<h3><a href='view.php?id=$id'>$title</a></h3><p>"; // genere un lien au niveau du titre avec l'ID
                                                             // de l'article current

    echo substr($des, 0, 100);// affiche la description avec un max 100 caracateres

    echo '<div class="w3-text-deep-purple">';
    echo "<a href='view.php?id=$id'>Read more...</a></p>";// affiche la page complete de l'article avec son ID

    echo '</div>';
    echo "<div class='w3-text-grey'> $time </div>"; // affiche la date from database
    echo '</div>';
}


echo "<div class='w3-bar w3-center w3-padding'>";


}
include("footer.php");
?>
<!--//body end-->



