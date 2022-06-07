<html>
    <?php 
        require_once 'includes/head.php';        
        require_once './mesClasses/Cvisiteurs.php'; 
        
        session_start();
    ?>
<body>
        <?php
        $ovisiteurs = new Cvisiteurs();
        $ocoll = $ovisiteurs->getVisiteursTrie();
        
        ?>
        
    <div class="container">
        
        <header title="listevisiteur"></header>
        <h1><p title="tabvisiteur">liste des visiteurs médicaux.</p></h1>           
            <table class="table table-condensed">
                <thead title="entetetabvisiteur">
                    <tr>
                      <th>ID</th>
                      <th>LOGIN</th>
                      <th>NOM</th>
                      <th>PRENOM</th>
                    </tr>
                </thead>
                <tbody>
                      <?php
                          $i=0;
                           foreach ($ocoll as $ovisiteur)
                           {
                               if($i % 2 == 1)
                               {
                              ?>        
                              <tr class="ligneTabVisitColor">
                                  <td><?php echo $ovisiteur->id ?></td>
                                  <td> <?php echo $ovisiteur->login ?></td>
                                  <td><?php echo $ovisiteur->nom ?></td>
                                  <td><?php echo $ovisiteur->prenom?></td>
                              </tr>
                               <?php
                               }
                               else{
                          ?>
                              <tr>
                                  <td><?php echo $ovisiteur->id ?></td>
                                  <td> <?php echo $ovisiteur->login ?></td>
                                  <td><?php echo $ovisiteur->nom ?></td>
                                  <td><?php echo $ovisiteur->prenom?></td>
                              </tr>
                              
                           <?php
                           
                                }
                            $i++;
                          }
                          ?>      

                  </tbody>
            </table>
    </div>
</body>
</html>
