<?php
require_once('functions.php');
$message = '';
$nbrChamps = 0;

if(isset($_POST['valider'])){
    $nbrChamps = $_POST['nbre'];
   if (!is_chaine_numeric($nbrChamps)) {
       $message='Veuillez saisir un entier !';
       $nbrChamps = 0;
   } elseif (is_empty($nbrChamps)) {
    $message = 'Champ obligatoire';
    }
}
$tab_Mots = [];
$erreurs = [];
$mot_avec_M = [];
if(isset($_POST['resultat'])){
    $nbrChamps =$_POST['nbre'];
    for ($i=0; $i <$nbrChamps ; $i++) { 
        $mot = $_POST['mot_'.$i];
        $tab_Mots[]=$mot ;
        if(long_chaine($mot)>20){
            $erreurs[$i][]='le mot ne doit pas depasser 20 caracteres ';
        }if(!is_chaine_alpha($mot)){
            $erreurs[$i][]='les lettres uniquement';
        }if(is_car_present_in_chaine(delete_spc_before_after($mot),' ')){
            $erreurs[$i][]='un seul mot';
        }if(isset($erreurs[$i]) && empty($erreurs[$i])){
            unset($erreurs[$i]);
        }if(is_empty($mot)){
            $erreurs[$i][]='les champs sont vide';
        }
    }
    if(empty($erreurs)){
        foreach($tab_Mots as $m){
            if(is_car_present_in_chaine('m',$m)){
                $mot_avec_M[]= $m;
            }
        }
    }
}
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <style>
    form{
        margin:auto;
        text-align:center;
    }
    .submit{
        background-color:#16bed5;
        border:1px;
        padding:10px;
        font-weight:bold;
        color:white;
    }
    .reset{
        background-color:#e76060;
        border:1px;
        padding:10px;
        font-weight:bold;
        color:white;
    }
    .input{
        font-weight:bold;
        width:40%;
        height:7%;
    }
    label{
        font-weight:bold;
    }
    </style>
        <form action="" method="post">
            <label> Entre le nombre de champs</label><br><br>
            <input type="text" name="nbre" class="input" value="<?= $nbrChamps;?>"><br>
            <p style="color:red"><?= $message ?></p>
            <input type="submit" name="valider" class="submit">
            <input type="reset" name="annuler" class="reset"><br><br>
            <?php for ($i=0;$i<$nbrChamps;$i++){ ?>
            <label> MOT N°<?=$i+1?></label>
            <p style="corlor:red"> <?= isset($erreurs[$i]) ? '( '. print_error($erreurs[$i]) .')' : ''  ?></p>
            <input type="text" name="mot_<?= $i ?>" value="<?= isset($tab_Mots[$i]) ? $tab_Mots[$i]: '' ?>" class="input" autocomplete="off"><br><br>
            <?php }?>
            <?php if ($nbrChamps>0 && empty($message)){ ?>
            <input type="submit" name="resultat"  class="submit" value="Résultats">
            <?php } ?>
        </form>
        <?php
         if(empty($erreurs) && isset($_POST['resultat'])){
            echo 'Le(s) mot(s) saisis sont : ';
           for ($i=0; $i < $nbrChamps; $i++) {
                if(isset($tab_Mots[$i])){
                    echo $tab_Mots[$i]." ";
                }
           }
           echo '<br>Le(s) mot(s) contenant la lettre m ou M sont : ';
           for ($i=0; $i < $nbrChamps; $i++) {
            if(isset($mot_avec_M[$i])){
                echo $mot_avec_M[$i]." ";
            }
       }
        }
      ?>
    </body>
</html>
