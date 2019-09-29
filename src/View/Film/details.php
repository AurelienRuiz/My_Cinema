<header>
    <nav>
        <h1 class="brand"><a href="./">My <span> cinema</span></a></h1>
        <ul>
        <li><a href="show"><?php
            if(isset($_SESSION["username"]))
            {
                echo $_SESSION["username"];
            }
            else
            {
                echo "Profil";
            }
            ?></a></li>
            <li><a href="search">Rechercher</a></li>
            <li><a href="add">Ajouter</a></li>
            <li><a href="logout">Déconnexion</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="details-films">
        <form method='POST' class='detail_form' action='update'>
        <div class='image'>
        <?php
        echo "<input name='id' type='hidden' value='" . $_POST['id'] . "'>";
        echo "<input name='years' type='hidden' value='" . $_POST['years'] . "'>";
        echo '<input name="resum" type="hidden" value="' . $_POST['resum'] . '">';
        echo "<input name='picture' type='hidden' value='" . $_POST['picture'] . "'>";
        echo "<input name='title' type='hidden' value='" . $_POST['title'] . "'>";
        echo "<img src='" . $_POST['picture'] ."'>" . "<br>";
        echo "</div>";
        echo "<div class='d-films'>";
        echo "<div class='text-films'>";
        echo "<h2>" . $_POST['title'] ."</h2>";
        echo "<p id='marge'>Année : " . $_POST['years'] ."</p>";
        echo "<p id='marge2'>Résumé : </p>" . "<p>" . $_POST['resum'] ."</p>";
        echo "</div>";
        ?>
        <div class='div-btn'>
        <button class='film-button' type='submit' name='update'>Modifier</button>
        <button class='film-button'type='submit' name='delete' formaction="delete">Supprimer</button>
        
        </form>
        </div>
        </div>
        

    </div>
</main>