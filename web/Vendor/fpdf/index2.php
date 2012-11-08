<?php
session_start();
//se non c'è la sessione registrata
if (!session_is_registered('autorizzato')) {
	echo "<link href=\"../../css/style.css\" rel=\"stylesheet\" type=\"text/css\" />";
  echo "<h1>Area riservata, accesso negato.</h1>";
  echo "<p>Per effettuare il login clicca <a href='../../../gestionale/login.php?error=2'><font color='blue'>qui</font></a></p>";
  die;
}
 
//Altrimenti Prelevo il codice identificatico dell'utente loggato
session_start();
$cod = $_SESSION['cod']; //id cod recuperato nel file di verifica
$user = "DNLBRL";
if($cod == "admin"){$user = "DNLBRL";}
if($cod == "stefano"){$user = "STFBTT";}
if($cod == "denis"){$user = "DNSLCT";}
if($cod == "jack"){$user = "GCMCMR";}
// _______________________________________________________________________________________________________________________________________________________
// _______________________________________________________________________________________________________________________________________________________
// _______________________________________________________________________________________________________________________________________________________
// _______________________________________________________________________________________________________________________________________________________
$db = mysql_connect("localhost", "test", "danielecalleidos") or die ("Impossibile connettersi: " . mysql_error());
	
	mysql_select_db("dbtest",$db) or die ("impfgdfgdossibile");;
	$sql = "SELECT * FROM `preventivi`";
	$quer = mysql_query($sql);
	$number = mysql_num_rows($quer);
	
	// echo "$number  <br /><br /><br /><br />";
	

	
$id = $_GET["id"];
if($id == ''){$id=1;}

// echo $id;
	mysql_select_db("dbtest",$db);
	
	$sqll = mysql_query("SELECT * FROM `preventivi` WHERE `id` = '$id'");
	
	$add = mysql_fetch_assoc($sqll) or die ("Impossibile query: " . mysql_error());
	
	
	// echo $add['nome'];
	
	

	
	$id = $add['id'];
	// $id = rand(100,200);
	$data = Date('d-m-Y');
	$ora = Date('H:i:s');
	// -----------------------------------------
	$aliquota = 1.21;
	$ali = 21;
	$descrizione = $add['descrizione'];
	$nome = $add['nome'];
	$cognome = $add['cognome'];
	$azienda  = $add['azienda'];
	$indirizzo = $add['indirizzo'];
	$citta = $add['citta'];
	$quantita  = $add['quantita'];
	$prez = $add['prezzo'];
	$prezzo = number_format($prez, 2, '.', '\'');
	$prezzoiva = number_format(($prezzo * $aliquota), 2, '.', '\'');
	$consegna = $add['consegna'];
	$prodotto = $add['prodotto'];
	// if($consegna<=72){$consetext = "EXPRESS";}else{$consetext = "STANDARD";}
	if(($consegna<=72)&&($consegna > 0)){$consetext = "EXPRESS";}else{$consetext = "STANDARD";}
	$grafica = $add['grafica'];
	$subtot = number_format($grafica + $prez, 2, '.', '\'');
	$subtott = $grafica + $prez;
	$iva =  number_format(($subtott / 100) * $ali, 2, '.', '\'');
	$tot = number_format($subtott * $aliquota, 2, '.', '\'');


	// $name = "0000" . $id . " Preventivo  ciccia " . $data . ".pdf";
	$name = "0000$id Preventivo $nome $cognome"."_$azienda"."-$descrizione"."_$data.pdf";
	// $name = "0000010 Preventivo pappa e ciccia-ciccia";

	define('FPDF_FONTPATH','./font/');
	//questo file e la cartella font si trovano nella stessa directory
	require('fpdf.php');


	class PDF extends FPDF
		{
		// Page header
		// function Header()
		// {
			// Logo
			// $this->Image('logo.png',10,6,30);
			// Arial bold 15
			// $this->SetFont('Arial','B',15);
			// Move to the right
			// $this->Cell(80);
			// Title
			// $this->Cell(30,10,'Title',1,0,'C');
			// Line break
			// $this->Ln(20);
		// }

		// Page footer
		function Footer()
		{
			// Position at 1.5 cm from bottoms
			$this->SetY(-10);
			$this->SetX(3);
			// Arial italic 8
			$this->SetFont('Helvetica','I',8);
			// Page number
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'');
			
			
			$this->Line(3, 290, 20, 290);
			$this->Line(20, 290, 20, 294);
			
			
			//rettangolo
			$this->SetFillColor(255,255,255);
			// bordi bianchi x abbondanze
			$this->Rect(0, 0, 3, 300 , 'F');
			$this->Rect(0, 0, 210, 3 , 'F');
			$this->Rect(207, 0, 3, 300 , 'F');
			$this->Rect(0, 294, 210, 3 , 'F');

			// rettangolo nero (bordi)
			$this->SetDrawColor(0,0,0);
			$this->Rect(3, 3, 204, 291 , 'D');
			// e infine bisogna rendere la pagina in output:
		}
	}
	$p = new PDF();
	$p->AliasNbPages();
	$p->AddPage();
	// $p->SetFont('Times','',12);

	// A questo punto è necessario creare un oggetto dalla classe, iniziare il documento e aggiungere una pagina

	// $p = new fpdf();
	// $p->AliasNbPages();
	// $p->AddPage();
	// $p->Header();
	// $p->Footer();
	// $p->AddPage();
	// --------------------------------------------------------------------

	// i metadati si possono anche fare in un files separato importato con include

	$p->Settitle('Preventivo - Calleidos S.r.l.');
	$p->SetKeywords('calleidos srl editoria grafica preventivo stampa grafica progetto prezzo quantita stampaclic offset digitale pacchetto descrizione pdf richiesta');
	$p->SetCreator('www.calleidos.it - FPDF 1.7');
	$p->SetAuthor('Daniele Berlato');




	// --------------------------------------------------------------------



	$p->SetMargins(0,0,0);
	$p->SetTextColor(0); // Con queste due funzioni imposto il carattere
	$p->SetFont('Helvetica', '', 10);
	$p->SetTextColor(0, 0, 0);








	$p->SetDrawColor(100,100,100);
	$p->SetFillColor(240,240,240);

	$p->Rect(3, 10, 204, 7 , 'DF');

	$p->SetFont('Helvetica', 'B', 10);
	$p->Text(5, 8, "Marano Vicentino $data ore $ora");
	$p->SetFont('Helvetica', '', 10);
	$p->Text(112, 15, "0000");
	$p->SetFont('Helvetica', 'B', 10);
	$p->Text(80, 15, "Codice Preventivo:");
	$p->Text(120, 15, "$id");
	$p->SetFont('Helvetica', '', 10);$p->SetDrawColor(0,0,0);
	$p->Text(5, 24, "Descrizione:");
	$p->Text(26, 24, "$descrizione");

	// Ciclo per disegnare la linea tratteggiata
	$i = 26;
	while($i<101){
	$h = $i + 1;
	$p->Line($i, 25, $h, 25);
	$i = $i + 2;
	}
	// fine ciclo
	$p->Text(120,24, "Spett.le:");
	$p->Text(135,24, "$nome $cognome");
	$i = 135;
	while($i<205){
	$h = $i + 1;
	$p->Line($i, 25, $h, 25);
	$i = $i + 2;
	}

	$p->Text(135,29, "$azienda");
	$i = 135;
	while($i<205){
	$h = $i + 1;
	$p->Line($i, 30, $h, 30);
	$i = $i + 2;
	}

	$p->Text(135,34, "$indirizzo");
	$i = 135;
	while($i<205){
	$h = $i + 1;
	$p->Line($i, 35, $h, 35);
	$i = $i + 2;
	}

	$p->Text(135,39, "$citta");
	$i = 135;
	while($i<205){
	$h = $i + 1;
	$p->Line($i, 40, $h, 40);
	$i = $i + 2;
	}

	$p->SetFont('Helvetica', '', 9);
	$p->Text(5,36, "Resp.le:");
	$p->SetFont('Helvetica', 'B', 9);
	$p->Text(27,36, "$user");
	$p->SetDrawColor(200,200,200);
	$p->Line(26, 33, 41, 33);
	$p->Line(26, 33, 26, 37);
	$p->Line(41, 33, 41, 37);
	$p->Line(26, 37, 41, 37);
	
	
	
	$p->SetFont('Helvetica', '', 8);
	$p->Text(18,49, "Con riferimento alla Vs. Cortese richiesta, ci preghiamo di sottoporLe la nostra miglior offerta per il lavoro avente le seguenti caratteristiche:");
	$p->SetDrawColor(200,200,200);
	$p->Line(3, 50, 207, 50);





	// _______________________________________________________________________________________________________________________________________________________________________________________________



	$p->SetDrawColor(0,0,0);
	$p->SetY(55);$p->SetX(9);$p->SetFont('Helvetica', '', 7);
	$p->MultiCell(16, 4, "QUANTITA:" , '1' , 'C' , 'true');
	$p->SetY(55);$p->SetX(25);
	$p->MultiCell(125, 4, "DESCRIZIONE PRODOTTO:" , '1' , 'C' , 'true');

	$p->SetY(55);$p->SetX(150);
	$p->MultiCell(50, 4, "Tot (iva esclusa):" , '1' , 'C' , 'true');
	$p->SetY(55);$p->SetX(175);
	// $p->MultiCell(26, 4, "Tot (iva inclusa):" , '1' , 'C' , 'true'); //RIQUADRO Tot(IVA INCLUSA)
	$p->SetFont('Helvetica', '', 9);


	// _______________________________________________________________________________________________________________________________________________________________________________________________


	$p->SetY(59);$p->SetX(9);
	$p->MultiCell(16, 4, "\n\n\n" . "$quantita \n" . "\n\n\n" , '0' , 'C' , '');

	$p->SetY(59);$p->SetX(25);
	$p->MultiCell(125, 4, "$prodotto" , '0' , 'J' , '');

	$p->SetY(59);$p->SetX(150);
	$p->MultiCell(50, 4, "\n\n\n€ $prezzo \n\n\n" , '0' , 'C' , '');
	$p->SetY(59);$p->SetX(175);
	// $p->MultiCell(26, 4, "\n\n\n€ $prezzoiva \n\n\n" , '0' , 'C' , ''); //RIQUADRO Tot(IVA INCLUSA)


	$p->SetDrawColor(200,200,200);
	$p->Line(3, 93, 207, 93);


	$p->SetFont('Helvetica', '', 7);
	$p->SetTextColor(255,0,0);
	
	$p->Text(26, 83, "Nel caso si voglia (ove prevista stampa f/r) riprodurre lo stesso soggetto su entrambi i lati del prodotto, questo");
	$p->Text(26, 86, "dovrà essere comunicato espressamente tramite e-mail o a mezzo fax al momento della conferma d'ordine.");

	$p->SetFont('Helvetica', '', 8);
	$p->SetTextColor(0,0,0);


	// _______________________________________________________________________________________________________________________________________________________________________________________________



	$p->SetDrawColor(0,0,0);

	$p->Text(5, 103, "Tipologia di consegna:");
	$p->SetFont('Helvetica', 'B', 10);

	if($consegna <= 0){
	$consetext = "NULL";
	}
	else{
	// $p->Text(40, 90, "$consetext:");
	$p->SetFont('Helvetica', '', 9);
	$p->SetY(113);$p->SetX(3);
	$p->MultiCell(204, 4, "	 $consetext : Garantiamo la spedizione entro le $consegna ore successive al pagamento e alla conferma scritta dell'anteprima di stampa.
		Le ore sopra indicate si intendono calcolate nei soli giorni feriali escluso il sabato.
		Sono quindi esclusi dal calcolo i sabati e tutte le festività." , '0' , 'J' , '');
	}
	$p->SetY(100);$p->SetX(40);$p->MultiCell(25, 4, "$consetext" , '0' , 'C' , '');

	

	// __________________________________________________________________________________________________________________________________________________________________________________________________


	if(($grafica != '') && ($grafica > 0)){
	$p->Image('full.png', 200, 131.5);
	}
	else{
	$p->Image('empty.png', 200, 131.5);
	}
	if(($prezzo != '') && ($prezzo > 0)){
	$p->Image('full.png', 200, 99);
	}
	else{
	$p->Image('empty.png', 200, 99);
	}
	$p->Text(185, 103, "Stampa:");
	$p->Text(185, 135, "Grafica:");


	if(($grafica != '') && ($grafica > 0)){
	$p->Text(5, 135, "Progetto Grafico ( * ) :");
	$p->SetFont('Helvetica', 'B', 10);
	$p->SetY(132);$p->SetX(40);$p->MultiCell(25, 4, "€ $grafica" , '0' , 'C' , '');

	// $p->Text(40, 90, "$consetext:");
	$p->SetFont('Helvetica', 'B', 8);
	$p->SetTextColor(255,0,0); 
	$p->SetY(142);$p->SetX(3);
	$p->MultiCell(155, 5, "  ( * )  Il costo del progetto grafico è già inserito nel subtotale e comprende n° 2 bozze.
			  Eventuali ulteriori bozze e/o variazioni richieste, verranno calcolate a consuntivo con un costo di € 35 + IVA / ORA
			  I tempi per la realizzazione del progetto grafico vanno concordati con l'ufficio grafico." , '0' , 'J' , '');
				 
	$p->Rect(3, 131, 60, 6 , 'D');
	}




			  
	$p->SetTextColor(255,0,0); 
	$p->SetFont('Helvetica', 'B', 10);
	$p->SetY(165);$p->SetX(3);
	$p->MultiCell(204, 5, "Questo preventivo è da rispedire tramite fax al numero  0445 1922011" , 'T' , 'C' , 't');
	$p->SetFont('Helvetica', 'B', 12);$p->SetX(3);
	$p->MultiCell(204, 5, "compilato in ogni sua parte e firmato per accettazione e conferma." , '0' , 'C' , 't');
	$p->SetFont('Helvetica', '', 8);$p->SetX(3);
	$p->SetTextColor(0); 
	$p->MultiCell(204, 5, "La validità del preventivo è di 30gg. ed è in ogni caso subordinata alla reale fattibilità al momento della definizione del contratto. 
	La commessa può ritenersi evasa con variazioni in eccesso o in difetto del 5% sulla q.tà ordinata." , 'B' , 'C' , 't');
	$p->Image('exclamation.png', 3, 167);
	$p->Image('exclamation.png', 190.1, 167);
	$p->SetFont('Helvetica', '', 10);


	
	// $p->Image('firma.png', 159.2, 230);
// $p->Text(170, 215, "Per Calleidos S.r.l.:");
	// $p->Text(170, 225, "Daniele Berlato");

	// $p->Image('firma.png', 159.2, 215);
	// __________________________________________________________________________________________________________________________________________________________________________________________________








	//Immagini

	// $p->Image('php.gif', 110, 200);

	// $p->Text(100, 290, "$page Pagina");







	$p->SetY(190);$p->SetX(5);
	$p->MultiCell(80, 7, "Metodo di pagamento:\n• Bonifico bancario anticipato." , '0' , 'J' , '');


	
	
	$p->SetTextColor(0); 
	$p->SetFont('Helvetica', '', 8);
	$p->SetY(205);$p->SetX(3);
	$p->MultiCell(204, 5, "  NB: In caso di bonifico bancario anticipato è possibile, per ridurre i tempi bancari, mandare via fax (0445/1922011)
			  o tramite e-mail la ricevuta dell'avvenuto bonifico scrivendo nella causale il codice del preventivo.          
			  Per poter garantire l'autenticità dell'operazione, Vi invitiamo a comunicarci il C.R.O. dell' operazione effettuata." , '0' , 'J' , '');
			 
			  
		
	$p->Text(20, 230, "Subtotale:");
	$p->Text(19, 237, "IVA (21%):");
	$p->Text(8, 244, "Totale (iva inclusa):");
	$p->SetY(226);$p->SetX(38);
	$p->MultiCell(25, 7, "€ $subtot\n€ $iva\n€ $tot" , '0' , 'R' , '');	
	
	
	
	
	$p->SetDrawColor(0,0,0);
	$p->SetFont('Helvetica', '', 9);
	$p->Text(130, 228, "Per accettazione e conferma:");
	$p->SetFont('Helvetica', '', 7);
	$p->Text(130, 246, "firma:");


	$p->Line(137, 246, 202, 246);

	



	$p->SetDrawColor(200,200,200);
	$p->Line(3, 250, 207, 250);


	// _______________________________________________________________________________________________________________________________________________________________________________________________





	
	$p->Image('logo.jpg', 48, 257.9);
	$p->SetFont('Helvetica', '', 7);
	$p->SetY(258);$p->SetX(85);
	$p->MultiCell(80, 4, "CALLEIDOS S.r.l.\nVia Aldo Moro, 54 - 36035 - Marano Vicentino (VI) \nTel. 0445/560709 - Fax 0445/1922011\nwww.calleidos.it - info@calleidos.it" , '0' , 'J' , '');
	$p->Text(86, 277, "Capitale sociale Euro 20.000,00 - Iscritta al Registro Imprese di Vicenza");
	$p->Text(86, 281, "Iscritta al REA della CCIAA di Vicenza al n. 317307 - C.F./P.IVA 03338510245");
	$p->Text(86, 285, "Bonifico Bancario Banca Popolare di Verona Agenzia Isola Vicentina");
	$p->SetFont('Helvetica', 'B', 9);
	$p->Text(86, 291, "IBAN: IT69 B 05034 60430 000000001142");



	//  - 

	 
	 
	 
	 
	 
	 

	$p->SetDrawColor(0,0,0);
	$p->Rect(9, 59, 191, 28 , 'D');  //RIQUADRO PRODOTTI
	$p->Rect(38, 225, 25, 22 , 'D'); //RIQUADRO PREZZO TOT
	$p->Rect(3, 225, 35, 22 , 'D');  //RIQUADRO PREZZO TOT
	$p->Rect(3, 99, 60, 6 , 'D');
	$p->Line(25, 59, 25, 87);
	$p->Line(150, 59, 150, 87);
	// $p->Line(175, 59, 175, 87);
	// $p->Rect(9, 55, 192, 4 , 'D');










	// $p->AddPage();

	$p->output("$name",'I'); // Senza parametri rende il file al browser
	// $p->output(); // Senza parametri rende il file al browser*/
?>
<link rel="shortcut icon" href="/gestionale/favicon.ico" >