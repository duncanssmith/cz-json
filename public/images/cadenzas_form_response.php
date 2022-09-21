<?php
	include "data.php";
	$pageTitle="formResponse";
	$mailOn=true;
	$debug=true;
	$mailfrom="stringsattachedltd@googlemail.com";
	$mailtoDS="stringsattachedltd@googlemail.com";
	$mailtoMK="stringsattachedltd@googlemail.com";

//
//****************************************************************
//Extract the POST data
$title=$_POST['title'];
$fname=ucwords(strtolower($_POST['fname']));
$lname=ucwords(strtolower($_POST['lname']));
$addr1=ucwords(strtolower($_POST['addr1']));
$addr2=ucwords(strtolower($_POST['addr2']));
$city=ucwords(strtolower($_POST['city']));
$pcode=$_POST['pcode'];
$country=$_POST['country'];
$email=strtolower($_POST['email']);
$tel=$_POST['tel'];
$remarks=ucfirst(strtolower($_POST['remarks']));
$mailto=$email;
//
//****************************************************************
// Build Email response to client

$S_tot=(((int)$_POST['Stamitz_Cadenzas'])*((float) $Stamitz_price)); 
$H_tot=(((int)$_POST['Hoffmeister_Cadenzas'])*((float) $Hoffmeister_price)); 
$M_tot=(((int)$_POST['Mozart_Cadenzas'])*((float) $Mozart_price)); 
$HC_tot=(((int)$_POST['HaydnCello _Cadenzas'])*((float) $HaydnCello_price)); 
$HV_tot=(((int)$_POST['HaydnViola_Cadenzas']) *((float) $HaydnViola_price)); 

$countitems=((int)$_POST['Stamitz_Cadenzas']);
$countitems+=((int)$_POST['Hoffmeister_Cadenzas']);
$countitems+=((int)$_POST['Mozart_Cadenzas']);
$countitems+=((int)$_POST['HaydnCello_Cadenzas']);
$countitems+=((int)$_POST['HaydnViola_Cadenzas']);

$All_tot=($S_tot+$H_tot+$M_tot+$HC_tot+$HV_tot);


if($All_tot==0){
	$Grand_Total = 0;
}else{
	$Grand_Total=(((float)$All_tot)+(((float)$_POST['PostPack'] * ($countitems)))); 
}

$subject="Cadenzas: Your order has been received. Thank you.";

$body=sprintf("Dear %s %s %s,\n\nThank you for submitting your order to Cadenzas.com.\n Your order is as follows:\n\n\t", $title, $fname, $lname); 
if($_POST['Stamitz_Cadenzas']){
	$body=sprintf("%s %s Stamitz Cadenzas at £%0.2f (£%0.2f)\n\t", $body, $_POST['Stamitz_Cadenzas'], (float)$Stamitz_price, (float)$S_tot); }	if($_POST['Hoffmeister_Cadenzas']){
	$body=sprintf("%s %s Hoffmeister Cadenzas at £%0.2f (£%0.2f)\n\t", $body, $_POST['Hoffmeister_Cadenzas'], $Hoffmeister_price,$H_tot); 
}
if($_POST['Mozart_Cadenzas']){
	$body=sprintf("%s %s Mozart Cadenzas at £%0.2f (£%0.2f)\n\t", $body, $_POST['Mozart_Cadenzas'], $Mozart_price,$M_tot); 
}
if($_POST['HaydnCello_Cadenzas']){
	$body=sprintf("%s %s Haydn Cello Cadenzas at £%0.2f (£%0.2f)\n\t", $body, $_POST['HaydnCello_Cadenzas'], $HaydnCello_price,$HC_tot); 
}
if($_POST['HaydnViola_Cadenzas']){
	$body=sprintf("%s %s Haydn Viola Cadenzas at £%0.2f (£%0.2f)\n\t", $body, $_POST['HaydnViola_Cadenzas'], $HaydnViola_price,$HV_tot); 
}
	$body=sprintf("%s\n\tPostage and Packing: £%0.2f\n\nSub Total: £%0.2f\n\nTotal including Post and Packing: £%0.2f\n\nKind Regards,\n\nCadenzas\nE: %s \n\n", $body, (float)(($_POST['PostPack'])*($countitems)), $All_tot, $Grand_Total, $mailtoMK); 

// Send mail to client
	if( $retval=mail($mailto, $subject, $body, "From: $mailfrom")){
		;#	echo "mail sent [".$retval."]\n";
	}else{
		;#	echo "mail system error [".$retval."]\n";
	}
	if($debug){
		echo "<div class=\"boxB\">\n";
		echo "*******************************************************<br/>\n";
		echo "<p>mail to Client </p>";
		echo "<p>mailto:[".$mailto."]\n<br/>subject:[". $subject."]\n<br/>body:[".$body."]\n<br/>from:[".$mailfrom."]\n</p>";
		echo "*******************************************************<br/>\n";
		echo "</div>\n";
	}
}else{
	if($debug){
		echo "<div class=\"boxB\">\n";
		echo "*******************************************************<br/>\n";
		echo "<h4>mail is switched OFF </h4>";
		echo "<p>mail to Client </p>";
		echo "<p>mailto:[".$mailto."]\n<br/>subject:[". $subject."]\n<br/>body:[".$body."]\n<br/>from:[".$mailfrom."]\n</p>";
		echo "*******************************************************<br/>\n";
		echo "</div>\n";
	}
}

//
//****************************************************************
// Build Data Email to R & P

$subject=sprintf("Cadenzas Order: [%s %s %s] email:[%s]", $title, $fname, $lname, $email);


if($mailOn){
	//send mail to R & P
	if( $retval=mail($mailtoDS,$subject,$body,"From: $mailfrom")){
	;#	echo "mail sent [".$retval."]\n";
	}else{
	;#	echo "mail system error [".$retval."]\n";
	}
	if( $retval=mail($mailtoMK, $subject,$body,"From: $mailfrom")){
	;#	echo "mail sent [".$retval."]\n";
	}else{
	;#	echo "mail system error [".$retval."]\n";
	}
	if($debug){
		echo "<div class=\"boxB\">\n";
		echo "*******************************************************<br/>\n";
		echo "<p>mail to Cadenzas </p>\n";
		echo "<p>mailto:[".$mailtoMK."]\n<br/>  subject:[". $subject."]\n<br/> body:[".$body."]\n<br/> from:[".$mailfrom."]\n</p>";
		echo "<br/>\n";
		echo "*******************************************************<br/>\n";
		echo "</div>\n";
	}
}
if($debug){

	echo "<p>mailto: [".$mailtoMK."]</p>";
	echo "<p>mailfrom:[".$mailfrom."]</p>";
	echo "<p>date:[".$date."]</p>";
	echo "<p>subject:[".$subject."]</p>";
	echo "<p>body:[".$body."]</p>";
	echo "<p>title:[".$title."]</p>";
	echo "<p>ftname:[".$fname."]</p>";
	echo "<p>lname:[".$lname."]</p>";
	echo "<p>addr1:[".$addr1."]</p>";
	echo "<p>addr2:[".$addr2."]</p>";
	echo "<p>city:[".$city."]</p>";
	echo "<p>pcode:[".$pcode."]</p>";
	echo "<p>country:[".$country."]</p>";
	echo "<p>email:[".$email."]</p>";
	echo "<p>tel:[".$tel."]</p>";
	echo "<p>remarks:[".$remarks."]</p>\n";
	echo "*******************************************************<br/>\n";
}

include "head.php";
include "body.php";



?>
