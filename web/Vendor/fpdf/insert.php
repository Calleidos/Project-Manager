<?php




	/*================================= INIZIO VARIABILI TEMPORANEE =================================*/


	$cliente = "* * *";
	$data = Date('d-m-Y') . "       " . Date('H:i:s');
	$responsabile = "DNLBRL";
	$spettabile = $_POST["nome"] . " " . $_POST["cognome"];
	$ragione = $_POST["azienda"];
	$indirizzo = $_POST["indirizzo"];
	$citta = $_POST["citta"];
	$piva = $_POST["piva"];
	$cf = $_POST["cf"];
	$email = $_POST["email"];
	$codice = $_POST["codice"];
	$consegna = $_POST["consegna"];
	$progetto = $_POST["progetto"];

	if(($consegna == "1-2")||($consegna == "2")||($consegna == "2-3")||($consegna == "3")){$tipologia = "EXPRESS";}else{$tipologia = "STANDARD";}
	if(($consegna == "0")||($consegna == "")||($consegna == "/")||($consegna == " \ ")){$tipologia = "NESSUNA";}
	if($consegna == ""){$consegna = " / ";}

	$bozze = $_POST["bozze"];
	$prezzo_orario = $_POST["prezzo_orario"];
	$pagamento = $_POST["pagamento"];
	
	
	$descr_breve = $_POST["descr_breve"];
	
	
	$quantita = $_POST["quantita"];
	$prezzo_unitario = $_POST["prezzo_unitario"];
	$descrizione = $_POST["descrizione"];
	$prezzo = number_format($_POST["prezzo"], 2, '.', '');

	$quantita_2 = $_POST["quantita_2"];
	$prezzo_unitario_2 = $_POST["prezzo_unitario_2"];
	$descrizione_2 = $_POST["descrizione_2"];
	$prezzo_2 = number_format($_POST["prezzo_2"], 2, '.', '');

	$quantita_3 = $_POST["quantita_3"];
	$prezzo_unitario_3 = $_POST["prezzo_unitario_3"];
	$descrizione_3 = $_POST["descrizione_3"];
	$prezzo_3 = number_format($_POST["prezzo_3"], 2, '.', '');

	$quantita_4 = $_POST["quantita_4"];
	$prezzo_unitario_4 = $_POST["prezzo_unitario_4"];
	$descrizione_4 = $_POST["descrizione_4"];
	$prezzo_4 = number_format($_POST["prezzo_4"], 2, '.', '');





	$ali = 21;
	$aliquota = 1.21;

	$subtott = $prezzo + $prezzo_2 + $prezzo_3 + $prezzo_4;
	$iva =  number_format(($subtott / 100) * $ali, 2, '.', '\'');
	$ivato = number_format($subtott * $aliquota, 2, '.', '\'');

	if($prezzo_unitario == ""){$prezzo_unitario = number_format($_POST["prezzo"] / $quantita, 5, '.', '');}
	if($prezzo_unitario_2 == ""){$prezzo_unitario_2 = number_format($_POST["prezzo_2"] / $quantita_2, 5, '.', '');}
	if($prezzo_unitario_3 == ""){$prezzo_unitario_3 = number_format($_POST["prezzo_3"] / $quantita_3, 5, '.', '');}
	if($prezzo_unitario_4 == ""){$prezzo_unitario_4 = number_format($_POST["prezzo_4"] / $quantita_4, 5, '.', '');}

	if($prezzo == ""){$prezzo = number_format($prezzo_unitario * $quantita, 2, '.', '');}
	if($prezzo_2 == ""){$prezzo_2 = number_format($prezzo_unitario_2 * $quantita_2, 2, '.', '');}
	if($prezzo_3 == ""){$prezzo_3 = number_format($prezzo_unitario_3 * $quantita_3, 2, '.', '');}
	if($prezzo_4 == ""){$prezzo_4 = number_format($prezzo_unitario_4 * $quantita_4, 2, '.', '');}
	
	
	$prezzo_conv = number_format($prezzo, 2, '.', '\'');
	$prezzo_2_conv = number_format($prezzo_2, 2, '.', '\'');
	$prezzo_3_conv = number_format($prezzo_3, 2, '.', '\'');
	$prezzo_4_conv = number_format($prezzo_4, 2, '.', '\'');
	
	$prezzo_unitario_conv = number_format($prezzo_unitario, 5, '.', '\'');
	$prezzo_unitario_2_conv = number_format($prezzo_unitario_2, 5, '.', '\'');
	$prezzo_unitario_3_conv = number_format($prezzo_unitario_3, 5, '.', '\'');
	$prezzo_unitario_4_conv = number_format($prezzo_unitario_4, 5, '.', '\'');
	
	

	$subtotale = number_format($prezzo + $prezzo_2 + $prezzo_3 + $prezzo_4, 2, '.', '\'');
	
	

	if($cf == ""){$cf = $piva;}
	if($bozze == ""){$bozze = 2;}
	if($prezzo_orario == ""){$prezzo_orario = 35.00;}


	$name = "0000$codice Preventivo $nome $cognome"."_$ragione"."-$descr_breve"."_".Date('d-m-Y').".pdf";




	$db = mysql_connect("localhost", "test", "danielecalleidos") or die ("Impossibile connettersi: " . mysql_error());

// accesso a MySQL 
//-------------------------------- 

	mysql_select_db("dbtest",$db);
	
	$sql = "INSERT INTO preventivi(`nome`, `cognome`, `azienda`, `indirizzo`, `citta`, `descrizione`, `quantita`, `prodotto`, `consegna`, `prezzo`, `ivato`, `note`, `grafica`, `totale`, `data`) VALUES 
	(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '')";
	
	$add = mysql_query($sql) or die ("Impossibile query: " . mysql_error());
	
	$db = mysql_connect("localhost", "test", "danielecalleidos") or die ("Impossibile connettersi: " . mysql_error());
	
	mysql_select_db("dbtest",$db) or die ("impfgdfgdossibile");;
	$sql = "SELECT * FROM `preventivi`";
	$quer = mysql_query($sql);
	$number = mysql_num_rows($quer);
	$id = $number;







	/*=================================   FINE VARIABILI TEMPORANEE =================================*/



	define('FPDF_FONTPATH','./font/');
	//questo file e la cartella font si trovano nella stessa directory
	require('fpdf.php');
	class PDF extends FPDF
		{
		// Page header
		/*function Header()
		{
			// Logo
			$this->Image('logo.jpg',10,6,30);
			// Arial bold 15
			$this->SetFont('Arial','B',15);
			// Move to the right
			$this->Cell(80);
			// Title
			$this->Cell(30,10,'Title',1,0,'C');
			// Line break
			$this->Ln(20);
		}*/

		// Page footer
		function Footer()
		{
			// Position at 1.5 cm from bottoms
			$this->SetY(287);
			$this->SetX(3);
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
	$p->SetFont('Helvetica', '', 9);
	$p->SetTextColor(0, 0, 0);


/*________________________________________________________________________________________________________________*/
	


	$p->Text(4, 10, "Cod. Cliente:");
	$p->Text(6.78, 15, "Data e ora:");
	$p->Text(10.90, 20, "Resp.le:");
	$p->Text(6.28, 25, "Descrizione:");
	$p->Text(25.4, 10, "$cliente");
	$p->Text(25.4, 15, "$data");
	$p->Text(25.4, 20, "$responsabile");
	$p->Text(25.4, 25, "$descr_breve");
	
	// Disegno i tratteggi sotto le variabili
		
		$p->SetDrawColor(0,0,0);
	// $i è la coordinata di partenza sull'asse X
		$i = 25.4;
		while($i<60){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 10.5, $h, 10.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
		$i = 25.4;
		while($i<60){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 20.5, $h, 20.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
		$i = 25.4;
		while($i<60){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 25.5, $h, 25.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
	
	
	$p->Text(90, 10, "Spett./Sig.:");
	$p->Text(108, 10, "$spettabile");
	$p->Text(108, 15, "$ragione");
	$p->Text(108, 20, "$indirizzo");
	$p->Text(108, 25, "$citta");
	
	// Disegno i tratteggi sotto le variabili
	// $i è la coordinata di partenza sull'asse X
		$i = 108;
		while($i<168){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 10.5, $h, 10.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
		$i = 108;
		while($i<168){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 15.5, $h, 15.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
		$i = 108;
		while($i<168){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 20.5, $h, 20.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
		$i = 108;
		while($i<168){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 25.5, $h, 25.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
		
		
	// Coloro lo sfondo della tabella
		
		
		
		$p->SetFillColor(254,236,221);
		$i = 0;
		$h=56;
		while($i<12){ 
			
			$p->Rect(9, $h, 191, 4, 'F');
			$h = $h + 8;
			$i = $i + 1;
		}
		$p->SetFillColor(254,242,230);
		$i = 0;
		$h=60;
		while($i<12){ 
			
			$p->Rect(9, $h, 191, 4, 'F');
			$h = $h + 8;
			$i = $i + 1;
		}
	
	
	
	
	
	
	$p->Image('logo_.jpg', 171, 5);
	
	
	$p->Text(96.5, 33, "P.IVA:");
	$p->Text(98.5, 38, "C.F.:");
	$p->Text(95.5, 43, "E-Mail:");
	$p->Text(108, 33, "$piva");
	$p->Text(108, 38, "$cf");
	$p->Text(108, 43, "$email");
	
	// Disegno i tratteggi sotto le variabili
		
		$p->SetDrawColor(0,0,0);
	// $i è la coordinata di partenza sull'asse X
		$i = 108;
		while($i<168){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 33.5, $h, 33.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
		$i = 108;
		while($i<168){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 38.5, $h, 38.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
		$i = 108;
		while($i<168){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 43.5, $h, 43.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
	$p->SetDrawColor(156,158,159);
	$p->SetFillColor(254,236,221);
	$p->Rect(3, 37.5, 60, 6 , 'DF');
	$p->Text(9, 42, "PREVENTIVO:");
	$p->Text(32, 42, "$codice");
	$p->SetFont('Helvetica', '', 8.5);
	$p->Text(9,49, "Con riferimento alla Vs. Cortese richiesta, ci pregiamo di sottoporLe la nostra miglior offerta per il lavoro avente le seguenti caratteristiche:");
	$p->SetFont('Helvetica', '', 9);
	
	// INTESTAZIONE TABELLA PREVENTIVO
	
	$p->SetFillColor(156,158,159);
	$p->SetDrawColor(112,113,115);
	$p->SetY(52);$p->SetX(9);$p->SetFont('Helvetica', '', 6);
	$p->MultiCell(16, 4, "QUANTITA:" , '' , 'C' , 'true');
	$p->SetFont('Helvetica', '', 6);
	$p->Rect(25, 52, 16, 4 , 'F');
	$p->SetY(52.2);$p->SetX(25);
	$p->MultiCell(16, 1.9, "PREZZO UNITARIO:" , '' , 'C' , 'true');
	$p->SetFont('Helvetica', '', 6);
	$p->SetY(52);$p->SetX(41);
	$p->MultiCell(127, 4, "DESCRIZIONE PRODOTTO:" , '' , 'C' , 'true');
	$p->SetFont('Helvetica', '', 6);
	$p->Rect(168, 52, 32, 4 , 'F');
	$p->SetY(52.2);$p->SetX(168);
	$p->MultiCell(32, 1.9, "TOTALE\n(IVA ESCLUSA):" , '' , 'C' , 'true');
	
	
	// CONTENUTO TABELLA PREVENTIVO
	// Prime 6 righe
	
	
	$p->SetFont('Helvetica', '', 7);
	
	
	if($quantita != ""){
	
	$p->SetY(56);$p->SetX(9);
	$p->MultiCell(16, 4, "\n\n$quantita" , '' , 'C' , '');
	
	$p->SetY(56);$p->SetX(25);
	$p->MultiCell(16, 4, "\n\n€ $prezzo_unitario_conv" , '' , 'C' , '');

	$p->SetY(56);$p->SetX(41);
	$p->MultiCell(127, 4, "$descrizione" , '' , 'J' , '');

	$p->SetY(56);$p->SetX(168);
	$p->MultiCell(32, 4, "\n\n€ $prezzo_conv" , '' , 'C' , '');}
	
	
	// Altre 6 righe


	if($quantita_2 != ""){
	$p->SetY(80);$p->SetX(9);
	$p->MultiCell(16, 4, "\n\n$quantita_2" , '' , 'C' , '');
	
	$p->SetY(80);$p->SetX(25);
	$p->MultiCell(16, 4, "\n\n€ $prezzo_unitario_2_conv" , '' , 'C' , '');

	$p->SetY(80);$p->SetX(41);
	$p->MultiCell(127, 4, "$descrizione_2" , '' , 'J' , '');

	$p->SetY(80);$p->SetX(168);
	$p->MultiCell(32, 4, "\n\n€ $prezzo_2_conv" , '' , 'C' , '');}
	
	// Altre 6 righe
	
	
	if($quantita_3 != ""){
	$p->SetY(104);$p->SetX(9);
	$p->MultiCell(16, 4, "\n\n$quantita_3" , '' , 'C' , '');
	
	$p->SetY(104);$p->SetX(25);
	$p->MultiCell(16, 4, "\n\n€ $prezzo_unitario_3_conv" , '' , 'C' , '');

	$p->SetY(104);$p->SetX(41);
	$p->MultiCell(127, 4, "$descrizione_3" , '' , 'J' , '');

	$p->SetY(104);$p->SetX(168);
	$p->MultiCell(32, 4, "\n\n€ $prezzo_3_conv" , '' , 'C' , '');}
	
	// Altre 6 righe
	
	
	if($quantita_4 != ""){
	$p->SetY(128);$p->SetX(9);
	$p->MultiCell(16, 4, "\n\n$quantita_4" , '' , 'C' , '');
	
	$p->SetY(128);$p->SetX(25);
	$p->MultiCell(16, 4, "\n\n€ $prezzo_unitario_4_conv" , '' , 'C' , '');

	$p->SetY(128);$p->SetX(41);
	$p->MultiCell(127, 4, "$descrizione_4" , '' , 'J' , '');

	$p->SetY(128);$p->SetX(168);
	$p->MultiCell(32, 4, "\n\n€ $prezzo_4_conv" , '' , 'C' , '');}
	
	
	$p->SetFont('Helvetica', '', 9);
	
	$p->SetY(152);$p->SetX(151);
	$p->MultiCell(17, 6, "Subtotale:" , '1' , 'R' , '');
	// $p->Rect(168, 152, 50, 6 , 'D');
	// $p->Text(154, 156.5, "$subtotale");
	$p->SetFillColor(156,158,159);
	$p->SetY(152);$p->SetX(168);
	$p->MultiCell(32, 6, "€ $subtotale" , '1' , 'C' , 'true');
	
	
	// verticali
	$p->Line(9, 52, 9, 152);
	$p->Line(9, 52, 9, 152);
	$p->Line(25, 52, 25, 152);
	$p->Line(41, 52, 41, 152);
	$p->Line(168, 52, 168, 152);
	$p->Line(200, 52, 200, 152);
	// orizzontali
	$p->Line(9, 52, 200, 52);
	$p->Line(9, 56, 200, 56);
	$p->Line(9, 152, 200, 152);
	$p->SetDrawColor(156,158,159);
	$p->SetLineWidth(0.1);
	$p->Line(9, 80, 200, 80);
	$p->Line(9, 104, 200, 104);
	$p->Line(9, 128, 200, 128);
	
	
	
	// FINE TABELLA PREVENTIVO

	$p->SetDrawColor(156,158,159);
	$p->SetFillColor(254,236,221);
	$p->Rect(3, 155, 60, 6 , 'DF');
	$p->Text(9, 159.5, "TIPOLOGIA DI CONSEGNA:");
	
	
	$p->SetY(163);$p->SetX(9);
	$p->MultiCell(191, 4, "$tipologia : Garantiamo la spedizione entro i $consegna giorni successivi al pagamento e alla conferma scritta dell’anteprima di stampa.\nI giorni sopra indicati si intendono feriali, escluso il sabato. Sono quindi non compresi dal calcolo i sabati e tutte le festività." , '0' , 'J' , '');
	$p->SetFont('Helvetica', 'B', 9);
	$p->SetY(173);$p->SetX(9);
	$p->MultiCell(191, 4, "Questo preventivo è da rispedire tramite fax al numero 0445 1922011 o tramite e-mail all’indirizzo preventivi@calleidos.it compilato in ogni sua parte e firmato per accettazione e conferma." , '0' , 'J' , '');
	
	$p->SetFont('Helvetica', '', 9);
	
	if($progetto == "si"){
	$p->SetY(183);$p->SetX(9);
	$p->MultiCell(191, 4, "Il costo del progetto grafico è già inserito nel subtotale e comprende n° $bozze bozze.\nEventuali ulteriori bozze e/o variazioni richieste, verranno calcolate a consuntivo con un costo di € $prezzo_orario + IVA / ORA\nI tempi per la realizzazione del progetto grafico vanno concordati con l’ufficio grafico. (interno 2)" , '0' , 'J' , '');}else{
	$p->SetY(183);$p->SetX(9);
	$p->MultiCell(191, 4, " \nEventuali ulteriori bozze e/o variazioni richieste, verranno calcolate a consuntivo con un costo di € $prezzo_orario + IVA / ORA\nI tempi per la realizzazione del progetto grafico vanno concordati con l’ufficio grafico. (interno 2)" , '0' , 'J' , '');}
	
	$p->SetFont('Helvetica', '', 7);
	
	$p->SetY(199);$p->SetX(9);
	$p->MultiCell(191, 4, "•  La validità del preventivo è di 30gg. ed è in ogni caso subordinata alla reale fattibilità al momento della definizione del contratto.\n•  La commessa può ritenersi evasa con variazioni in eccesso o in difetto del 5% sulla q.tà ordinata." , '0' , 'J' , '');
	
	
	$p->SetFont('Helvetica', '', 9);
	
	$p->Rect(3, 209.5, 60, 6 , 'DF');
	$p->Text(9, 213.5, "RIEPILOGO:");
	
	
	
	$p->SetFont('Helvetica', 'B', 9);
	$p->SetY(220);$p->SetX(9.5);
	$p->MultiCell(40, 6, "Subtotale:" , '1' , 'R' , '');
	$p->SetY(226);$p->SetX(9.5);
	$p->MultiCell(40, 6, "IVA ($ali%):" , '1' , 'R' , '');
	$p->SetY(232);$p->SetX(9.5);
	$p->MultiCell(40, 6, "Totale (iva inclusa):" , '1' , 'R' , '');
	$p->SetY(220);$p->SetX(49.5);
	$p->MultiCell(40, 6, "€ $subtotale" , '1' , 'R' , '');
	$p->SetY(226);$p->SetX(49.5);
	$p->MultiCell(40, 6, "€ $iva" , '1' , 'R' , '');
	$p->SetY(232);$p->SetX(49.5);
	$p->MultiCell(40, 6, "€ $ivato" , '1' , 'R' , '');
	
	$p->SetY(242);$p->SetX(9);
	$p->MultiCell(120, 6, "Modalità di pagamento:   $pagamento" , '0' , 'J' , '');
	
	
	if($pagamento == "RiBa 30gg Fm"){
	$p->SetY(242);$p->SetX(75);
	$p->MultiCell(11, 6, "IBAN:" , '0' , 'J' , '');
	
	
	$p->SetLineWidth(0.1);
	$i = 0;
	$h = 86;
	while($i<27){
		$p->Rect($h, 242, 3.7, 5 , 'D'); 
		$h = $h + 4.25;
		$i = $i + 1;
	}
	
	
	$p->SetLineWidth(0.2);
	
	}
	
	
	$p->SetFont('Helvetica', '', 7);
	
	$p->SetY(249);$p->SetX(9);
	$p->MultiCell(191, 4, "• NB: In caso di bonifico bancario anticipato è possibile, per ridurre i tempi bancari, mandare via fax (0445/1922011) o tramite e-mail la ricevuta dell’avvenuto bonifico scrivendo nella causale il codice del preventivo.\n• Per poter garantire l’autenticità dell’operazione, Vi invitiamo a comunicarci il C.R.O. dell’ operazione effettuata.\n• NB: In caso di RiBa vi preghiamo in fase di conferma di comunicarci le Vs. coordinate bancare per poter disporre il pagamento." , '0' , 'J' , '');
	
	$p->SetFont('Helvetica', '', 7);
	
	
	$p->SetFillColor(200, 200, 200);
	$p->Rect(3, 270, 300, 37 , 'DF');
	

	
	$p->Text(10, 275, "CALLEIDOS S.r.l.");
	$p->Text(10, 278, "Via Aldo Moro, 54 - 36035 - Marano Vicentino (VI)");
	$p->Text(10, 281, "Tel. 0445/560709 - Fax 0445/1922011");
	$p->Text(10, 284, "www.calleidos.it - info@calleidos.it");
	$p->Text(10, 287, "Capitale sociale Euro 20.000,00 - Iscritta al Registro Imprese di Vicenza");
	
	$p->Text(120, 275, "Iscritta al REA della CCIAA di Vicenza al n. 317307 ");
	$p->Text(120, 278, "C.F./P.IVA 03338510245");
	
	$p->SetFont('Helvetica', 'B', 7);
	
	$p->Text(120, 284, "Bonifico Bancario Banco Popolare di Verona Agenzia Isola Vicentina");
	$p->Text(120, 287, "IBAN: IT69 B 05034 60430 000000001142");
	
	$p->SetFont('Helvetica', '', 9);
	
	
		
	$p->Text(108, 213.5, "Per Accettazione e Conferma:");
	
	$p->SetFont('Helvetica', '', 7);
	$p->Text(108, 230, "firma:");
	
	
	$p->SetFont('Helvetica', '', 9);
	// Disegno i tratteggi sotto le variabili
		
		$p->SetDrawColor(0,0,0);
	// $i è la coordinata di partenza sull'asse X
		$i = 115;
		while($i<200){ //$i< della coordinata di arrivo sull'asse X
			$h = $i + 0.5; //0.5 è la lunghezza del trattino
			$p->Line($i, 230.5, $h, 230.5); //il numero è il valore della coordinata Y
			$i = $i + 1.5; //1.5 è la lunghezza dello spazio tra i trattini
		}
	
	
	
	
	
	
/*________________________________________________________________________________________________________________*/

	
	
// e infine bisogna rendere la pagina in output:


	$p->output("$name",'F');
	$p->output("$name",'D'); // D forza il download F salva in locale I rende l'output al browser S restituisce una stringa
	// $p->output(); // Senza parametri rende il file al browser*/
?>
<link rel="shortcut icon" href="/gestionale/favicon.ico" >
<title><? echo "$name";?>