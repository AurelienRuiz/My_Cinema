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
            ?></a></li>>
            <li><a href="search">Rechercher</a></li>
            <li><a href="add">Ajouter</a></li>
            <li><a href="logout">Déconnexion</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="add_films_container">
        <div class="form_add_films">
        <h2>Ajouter un film</h2>
            <form method='POST' enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Titre...">
                <input type="number" name="years" placeholder="Année...">
                <textarea name="resum" placeholder="Résumé..." rows="10"></textarea>
                <input type="file" name="picture">
                <button type="submit">Ajouter</button>
            </form>
        </div>
    </div>
</main>