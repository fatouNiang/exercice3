<?php
require_once("const.php");

// recuperer la longueur d'une chaine equivaut a strlen
function long_chaine($chaine){
	if (isset($chaine)){
		$cpt=0;
		for($j=0; isset($chaine[$cpt]); $j++) {
			$cpt++;
		}
	return $cpt;
	}
}
    // @ vieva
function taille_chaine($chaine){
    $i=0;
    while(isset($chaine[$i])){
        $i++;
    }
    return $i;
}
// fonction qui retourn si un caractere est numeric ou pas 
function is_car_numeric($car){
    if($car>'0' && $car<='9'){
        return true;
    }
    return false;
}

// permet de tester si un caractere est alphabetique
    function is_car_alpha($car) {
        if( long_chaine($car)==1 && ($car >='a' && $car <='z') || ($car>='A' && $car<='Z')){
            return true;
        }
        return false;
    }

// une fonction qui teste si c'est un caractere ou pas
    function is_caractere($car) {
        if(($car >='a' && $car <='z') || ($car>='A' && $car<='Z')){
            return true;
        }
        return false;
    }
// permet de tester si tous les caracteres d'une chaine sont aphabetique : 
// elle retourne true si la chaine est alphabetique sinon false
function is_chaine_alpha($chaine){
    for($i=0;$i<long_chaine($chaine); $i++){
        if (!is_caractere($chaine[$i])){
            return false;
        }
    }
    return True ;
}
function is_phrase_correct($phrase){
    if(preg_match('#^[A-Z]{1}[a-z|" "].+[.?!]$#', $phrase)){
        return true;
    }  
   return false;
}
// var_dump(is_phrase_correct('a vie est belle','La vie est belle!'));

// permet de tester si tous les caracteres d'une chaine sont numerique : elle retourne true si la chaine est numeric sinon false
function is_chaine_numeric($chaine){
    for ($i=0; $i < long_chaine($chaine) ; $i++) { 
        if (!is_car_numeric($chaine[$i])) {
            return false;
        }
    }
    return true;
}


// permet de recherche si $car est présent dans $chaine : si oui la fonction retourne true sinon false
function is_car_present_in_chaine($car, $chaine){
    if(is_chaine_alpha($chaine) && is_car_alpha($car)){
        for ($i=0;$i<long_chaine($chaine);$i++){
            if ($chaine[$i]== $car || $chaine[$i]==invers_car_case($car)){
                return true;
            }
        }
    }
    return false;
}

// invers_car_case($car)
// fonction qui permet d'inverser la casse d'une lettre :
// si on lui passe "A", elle retourne "a"
// si on lui passe "a", elle retourne "A"
// si on lui passe un caractere non alphabetique, la fonction retourne le meme caractere 
// exemple : si on lui passe "7", elle retourne "7"

function invers_car_case($car){
   $maj= 'A';
   $min = 'a';
    if(long_chaine($car)==1){
        for ($i=0; $i < 26; $i++) { 
            if ($car==$maj){
                return $min;
            }elseif($car==$min){
                return $maj;
                }
            $maj++;
            $min++;
            }
    }
   return $car;
}

// is_empty($chaine)
// fonction qui permet de tester si une chaine est vide ou pas :
// elle retourne true si la chaine est vide sinon elle retourne false

function is_empty($chaine){
    if(long_chaine($chaine)==0){
        return true;
    }
    return false;
}

function  print_error($tab) {
    $chaine = "" ;
    // var_dump ($ tab); die;
    foreach ( $tab as $t ) {
        $chaine.= $t . "" ;
    }
    return  $chaine ;
}

// delete_spc_before_after($chaine)
// fonction qui permet de supprimer les espace de devant ou de deriere d'une chaine et 
// retourne la chaine apres avoir supprimer les espaces. les espace interne ne sont pas supprimer



// __________@ALY

function delete_spc_before_after($chaine){
    $debut=0;
    $fin=long_chaine($chaine)-1;
    $newChaine = '';

    if($chaine==''){ return $chaine; }

    while ($chaine[$debut]==' '){
        $debut++; 
        if(!isset($chaine[$debut])){
            return '';
        } 
    }

    while ($chaine[$fin]==' '){ $fin--; }
    
    
    for ($i=$debut; $i <=$fin ; $i++) { 
        $newChaine.=$chaine[$i];
    }
    return $newChaine;
}