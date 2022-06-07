<?php
$errorMsg = NULL;
$successMsg = NULL;
if(isset($_SESSION['successMSG_FF']))
{
    $successMsg = $_SESSION['successMSG_FF'];
}
$oLigneFFs = new CligneFFs; 
$oVisiteur = unserialize($_SESSION['visiteur']);
// Ne pas oublié include_once dans saisirFicheFrais pour CfraisForfaits.php
$ofraisForfaits = new CfraisForfaits(); // variable globale car utilisée dans le if et dans le html du formulaire
$ocollFraisForfait = $ofraisForfaits->getCollFraisForfait();
if(isset($_POST['btnFF']))
{
    /*$tabIdFrais = array();
    $tabIdFrais[0] = 'ETP';
    $tabIdFrais[1] = 'KM';
    $tabIdFrais[2] = 'NUI';
    $tabIdFrais[3] = 'REP'; */ 
    
    
    /*for($x=0;$x<4;$x++)
    {
        $oLigneFFs->updateLigneFF($_POST[$tabIdFrais[$x]],$tabIdFrais[$x]);
    }*/
    
    foreach ($ocollFraisForfait as $ofraisForfait)
    {
        $oLigneFFs->updateLigneFF($_POST[$ofraisForfait->id],$ofraisForfait->id);
        $_SESSION['successMSG_FF'] = "Modification des quantités effectuée !";
    }
 
    
    header('location:saisirFicheFrais.php'); 
}
 else 
 {
     //Cela va créer les quatre lignes FF à 0
     $oLigneFFs->verifExistLFFByIdVisiteurMois($ovisiteur->id);
 }
 //Il faut réinstancier dans le cas ou les lignes viennet d'être créées
 $oLigneFFs = new CligneFFs;
 $ocollLigneFF = $oLigneFFs->getLFFByIdVisiteurMois($ovisiteur->id);
 $oFFs = new CfraisForfaits();
 $ocollFFById = $oFFs->getCollFraisForfaitById();
?>

<div class="container">
  <h3><p class="text-primary page-header">Saisie des frais forfaitaires <span class="text-primary glyphicon glyphicon-pencil"</p></h3>
    <br>
  <form class="form-horizontal" action="<?=$formAction?>" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="etape">Forfait étape:</label>
      <div class="col-sm-4">
        <input type="number" step="1" min="0" class="form-control" id="etape" name="<?=$ocollLigneFF[0]->oFraisForfait->id?>" value="<?=$ocollLigneFF[0]->quantite?>">
      </div>
      <div class="well well-sm col-sm-4"><?=$ocollFFById['ETP']->montant?></div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="fraiskilometrique">Frais kilométrique:</label>
      <div class="col-sm-4">          
        <input type="number" step="1" min="0" class="form-control" id="fraiskilometrique" name="<?=$ocollFraisForfait[1]->id?>" value="<?=$ocollLigneFF[1]->quantite?>">
      </div>
      <div class="well well-sm col-sm-4"><?=$ocollFFById['KM']->montant?></div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nuitee">Nuitée hôtel:</label>
      <div class="col-sm-4">          
        <input type="number" step="1" min="0" class="form-control" id="nuitee" name="<?=$ocollFraisForfait[2]->id?>" value="<?=$ocollLigneFF[2]->quantite?>">
      </div>
      <div class="well well-sm col-sm-4"><?=$ocollFFById['NUI']->montant?></div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Repas">Repas restaurant:</label>
      <div class="col-sm-4">          
        <input type="number" step="1" min="0" class="form-control" id="nuitee" name="<?=$ocollFraisForfait[3]->id?>" value="<?=$ocollLigneFF[3]->quantite?>">
      </div>
      <div class="well well-sm col-sm-4"><?=$ocollFFById['REP']->montant?></div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="btnFF" class="btn btn-default">Enregistrer</button>
      </div>
    </div>
  </form>
</div>

