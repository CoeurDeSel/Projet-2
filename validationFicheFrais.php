<!DOCTYPE html>
 <?php session_start(); ?>
<html>
    <?php 
        require_once 'includes/head.php';
        
        require_once 'mesClasses/Cvisiteurs.php';
        
        $ovisiteur = unserialize($_SESSION['visiteur']);
  
        
    ?>
    
    <body>
        <div class='container'>
        <header title="saisirFF"></header>
         <?php 
            
            require_once 'includes/navBar.php';
             
        ?>
      
        </div>
    </body>
</html>
