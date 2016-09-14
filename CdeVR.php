<?php
 
 // Status : On Dev
 
/*
 * Ws permettant de lancer une commande d'ouverture ou fermeture pour une liste données de VR
 */
 
// Récupération des parametres du webservice
// utilisation : GET http://localhost/VR/CdeVR.php?idVR=VR1&cmdVR=UP

if (isset($_GET['idVR']) && isset($_GET['cmdVR'])) {
  
    $idVR = $_GET['idVR'];
    $cmdVR = $_GET['cmdVR'];
 
     $success = 0;
     $message = "";
    
     // idVR est bien référencé ?

    $listVRs = array("VR1", "VR2", "VR3", "VR4");
    
    if (in_array($idVR, $listVRs)) {
       
        $success = 1;
        $message = $message ." identifiant reconnu";
        
         // cmdVR est bien une commande authorisée ?
        $listcmdVRs = array("UP", "DOWN");
        if (in_array($cmdVR, $listcmdVRs)) {

            $success = 1;
            $message = $message ." commande reconnue";
            
         } else {
             $continue = FALSE;
             $success = 0;
             $message = $message ." commande inconnue";
         }      
    } else {
        $success = 0;
        $message = $message ." identifiant inconnu";
    }
    
    if ($success == 1) {
        // Si tout est ok, activation du relais et indication de bonne fin du traitement
 
     }
      
} else {
        // usage de la requete non conforme
    $success = 0;
    $message = "usage de la requete non conforme";
   
}

   $response["success"] = $success;
   $response["message"] = $message;

  // echoing JSON response
  echo json_encode($response);

?>