<header>
    <nav>
        <h1 class="brand"><a href="./">My <span> cinema</span></a></h1>
        <ul>
            <li><a href="show"><?php echo $_SESSION["username"] ?></a></li>
            <li><a href="search">Rechercher</a></li>
            <li><a href="add">Ajouter</a></li>
            <li><a href="logout">Déconnexion</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="update_films_container">
        <div class="form_update_films">
        <h2>Modifier le film</h2>
            <form method='POST' enctype="multipart/form-data">
                <?php echo "<input name='id' type='hidden' value='" . $_POST['id'] . "'>";?>
                <input type="text" name="title" value="<?php echo $_POST['title'] ?>">
                <input type="number" name="years" value="<?php echo $_POST['years'] ?>">
                <textarea name="resum" rows="10"><?php echo $_POST['resum'] ?></textarea>
                <button type="submit" name='update_films'>Modifier</button>
            </form>
        </div>
    </div>
</main>