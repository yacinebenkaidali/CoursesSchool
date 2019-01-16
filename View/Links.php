<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 15-Jan-19
 * Time: 20:03
 */
?>
<li class="nav-item">
    <a class="nav-link" href="./Catagorie.php?page_name=Maternelles">Maternelle</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="./Catagorie.php?page_name=Primaires">Primaire</a>
</li>
<li class="nav-item">
    <a class="nav-link " href="./Catagorie.php?page_name=Moyennes">Moyen</a>
</li>
<li class="nav-item">
    <a class="nav-link " href="./Catagorie.php?page_name=
Secondaires">Secondaire</a>
</li>
<li class="nav-item">
    <a class="nav-link " href="./Catagorie.php?page_name=universitaires,professionnelles">formation
        professionnelle et
        universitaire</a>
</li>
<li class="nav-item">
    <?php $location = "./CommentsPage.php";
    if (isset($_SESSION['username'])) echo '<a class="nav-link " href=' . $location . ' ">Commenter</a>'; else echo '<a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Commenter</a>'; ?>
</li>
<li class="nav-item">
    <a class="nav-link " href="./Comparaison.php">Comparaison</a>
</li>
<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
    echo " <li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"./Gestion.php?page_name=GestionUser\">Gerer Les utilisateur</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link \" href=\"./Gestion.php?page_name=GestionSite\">Gerer Les Sites</a>
                            </li>";
?>
<li class="nav-item">
    <a class="nav-link " href="./Catagorie.php?page_name=A propos">A propos</a>
</li>