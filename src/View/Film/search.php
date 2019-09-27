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
<main id="search-container">
    <div class="search-films">
        <form method="POST" id="search-bar">
            <input type="text" name="title" placeholder="Titre du film" id="title-film">
            <select name="years" id="years">
                <option value="all">Tout</option>
                <?php
                    foreach ($years as $key => $value)
                    {
                        echo "<option value='" . $value['years'] . "'>" . $value['years'] . "</option>";
                    }
                ?>
            </select>
            <button type="submit" name="search">Rechercher</button>
        </form>
    </div>
    <?php
    if(isset($films))
    {
    ?>
    <div class="search-content">
    <?php 
    foreach ($films as $key => $value)
    {
    echo "<div class='films'>";
    echo "<form method='POST' id='form-films' action='details'>";
    echo "<input name='id' type='hidden' value='" . $value['id'] . "'>";
    echo "<input name='years' type='hidden' value='" . $value['years'] . "'>";
    echo '<input name="resum" type="hidden" value="' . $value['resum'] . '">';
    echo "<input name='picture' type='hidden' value='" . $value['picture'] . "'>";
    echo "<input name='title' type='hidden' value='" . $value['title'] . "'>";
    echo "<img src='" . $value['picture'] ."'>";
    echo "<button type='submit' id='view-details' name='show'>" . $value['title'] . "</button>";
    echo "</form>";
    echo "</div>";
    } 
    ?>
    </div>
    <?php
    }
    ?>
    </div>
</main>