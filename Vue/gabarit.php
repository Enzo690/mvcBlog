<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />

        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <nav style="display: flex; width: 35%; justify-content: space-around">
                    <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
                    <a href="?action=gologin"><h1 id="titreBlog">Login</h1></a>
                    <a href="?action=goinsert"><h1 id="titreBlog">Insert</h1></a>
                </nav>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="Contenu/form.js"></script>
    </body>
</html>