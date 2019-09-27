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
    <form class="info-profil" method="POST">
        <h1>Mon profil</h1>
        <input type="text" name="firstname" value="<?php echo $_SESSION["firstname"] ?>" placeholder="Prénom" />
        <input type="text" name="lastname" value="<?php echo $_SESSION["lastname"] ?>" placeholder="Nom"/>
        <input type="text" name="username" value="<?php echo $_SESSION["username"] ?>" />
        <input type="email" name="email" value="<?php echo $_SESSION["email"] ?>"/>
        <input type="password" name="password" value="<?php echo $_SESSION["password"] ?>"/>
        <input type="date" name="birthdate" value="<?php echo $_SESSION["birthdate"] ?>" />
        <input type="text" name="city" value="<?php echo $_SESSION["city"] ?>" placeholder="Ville"/>
        <button type="submit" name="update">Modifier mon profil</button>
        <button type="submit" name="delete">Supprimer mon profil</button>
    </form>
</main>