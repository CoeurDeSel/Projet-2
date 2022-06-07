
    <nav class="navbar navbar-default"> <!--Essayer navbar-inverse navbar-default-->

        
        <ul class="nav navbar-nav">
          <li> <a><img  src="img/gsb1.png" class="img-rounded" alt="LOGO GSB" width="45" height="20"/></a> </li>
          <li class="<?=$_SERVER['PHP_SELF']==='/accueil.php'?'active':''?>"><a href="accueil.php">Home</a></li>
          <li class="<?=$_SERVER['PHP_SELF']==='/saisirFicheFrais.php'?'active':''?>"><a href="saisirFicheFrais.php">Saisie des frais Visiteurs Médicaux</a></li>
          <!--<li class="<?php /*$_SERVER['PHP_SELF']==='/validationFicheFrais.php'?'active':''*/?>"><a href="validationFicheFrais.php">Validation fiches de Frais</a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Bienvenue <?=isset($_SESSION['visiteur'])?unserialize($_SESSION['visiteur'])->prenom:'sur notre site';?></a></li>
          <li class="<?=$_SERVER['PHP_SELF']==='/seConnecter.php'?'active':''?>"><a href="seConnecter.php"><span class='<?=isset($_SESSION['visiteur'])?'glyphicon glyphicon-log-out':'glyphicon glyphicon-log-in';?>'></span><?=isset($_SESSION['visiteur'])?' Déconnexion':' Login';?> </a></li>
        </ul>

    </nav>


<!-- <li> <a><img  src="img/gsb1.png" class="img-rounded" alt="LOGO GSB" width="25" height="12"/></a> </li>-->