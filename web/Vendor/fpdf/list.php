<?php



	



function elencafiles($dirname,$arrayext){
	$arrayfiles=Array();
	if(file_exists($dirname)){
		$handle = opendir($dirname);
		while (false !== ($file = readdir($handle))) { 
			if(is_file($dirname.$file)){
					$ext = strtolower(substr($file, strrpos($file, "."), strlen($file)-strrpos($file, ".")));
					
					if(in_array($ext,$arrayext)){
						array_push($arrayfiles,$file);
					}
				}
		}
		$handle = closedir($handle);
	}
	sort($arrayfiles);
	return $arrayfiles;
}
	$arrayext=array('.pdf','.pdf','.pdf');
	$arrayfile=array();
	$arrayfile=elencafiles($_SERVER['DOCUMENT_ROOT']."/gestionale/preventivi/fpdf/",$arrayext);
	// print_r($arrayfile);
	for($a=0;$a<count($arrayfile);$a++){
		echo "<br /><br /><br /><a href='".$arrayfile[$a]."'>".$arrayfile[$a]."</a>";
	}
	
?>