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
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST">
                <h1>Connexion</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <input type="email" name="email" placeholder="Email..." />
                <input type="password" name="password" placeholder="Mot de passe..." />
                <button type="submit">Connexion</button>
            </form>
        </div>
        <div class="info-sign-up">
            <div class="info-sign-up-contains">
                <h2>Re Bonjour !</h2>
                <p>Renseignez vos identifiant pour vous connecter !</p>
            </div>
        </div>
    </div>
</main>
</div>