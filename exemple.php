<?php

ERROR_REPORTING(E_ALL);

require 'walletix.php';


// ==============================
// = Soit via le constructeur   =
// ==============================
$api = new WalletixAPI('YOUR_vendorID_HERE', 'YOUR_apiKey_HERE');

// =========================
// = Soit avec les setters =
// =========================
$api->setVendorID('YOUR_vendorID_HERE');
$api->setApiKey('YOUR_apiKey_HERE');


// =================================
// = g�n�rer un code de paiement   =
// = commande N�1 , montant 500 DA =
// =================================

$response = $api->generatePaiementCode(1, 500);

if (WALLETIX_GENCODE_OK== $response->status) {
  echo "Votre code de paiement est {$response->code} <br/>";
 } else{
	
	echo "erreur lors de la g�n�ration du code de paiement<br />";

 } 
 
// ================================================================
// = v�rifier un code de confirmation   						  =
// = code de paiement  73DEB7FAF0 code de confirmation D726A1BEEA =
// ================================================================

	$paiementCode="73DEB7FAF0";
	$confirmationCode="D726A1BEEA";

	$response = $api->verifyCode($paiementCode, $confirmationCode);
	
	if (WALLETIX_VERCODE_OK == $response->status){
		
		if (WALLETIX_CONFCODE_OK== $response->result) {
	  
	
	  	echo"<br/>Votre paiement a �tait bien effectu� <BR /> 
			votre commande vous sera envoy�e prochainement.";	
	  }else{
			echo "Code de confirmation erron�e";

		}
	
	
	}else{
			echo "erreur lors de test du code de confirmation<br />";
	
	}
	
	  
	  

?>