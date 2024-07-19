<header>
    <div id="logo">
        <a href="index.php">iCars</a>
    </div>
    <nav id="pages">
        <ul id="nav">
            <li><a class="<?php echo ($pageActive == 'accueil') ? 'actif' : ''; ?>" href="index.php">ACCUEIL</a></li>
            <li><a class="<?php echo ($pageActive == 'garage') ? 'actif' : ''; ?>" href="listing.php">GARAGE</a></li>
            <li><a class="<?php echo ($pageActive == 'recherche') ? 'actif' : ''; ?>" href="form_recherche.php">RECHERCHE</a></li>
            <li><a class="<?php echo ($pageActive == 'admin') ? 'actif' : ''; ?>" href="admin/admin.php">PRIVÉ</a></li>
        </ul>
    </nav>
</header>
