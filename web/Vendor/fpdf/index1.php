<?php

	$aliquota = 1.21;
	$ali = 21;
	// $id = $add['id'];
	$descrizione = "biglietti da visita 4/4 300po + v";
	$nome = "Daniele";
	$cognome = "Berlato";
	$azienda  = "Calleidos srl";
	$indirizzo = "Via aldo Moro, 54";
	$citta = "36035 - Marano Vicentino - (VI)";
	$quantita  = "1000";
	$prezzo = number_format(103.60239669421487603305785123967, 2);
	$prezzoiva = number_format(($prezzo * $aliquota), 2);
	$consegna = 72;
	$prodotto = "Con riferimento alla Vs. Cortese richiesta, ci preghiamo di sottoporLe la nostra miglior offerta per il lavoro avente le seguenti caratteristiche:";
	if($consegna<=72){$consetext = "EXPRESS";}else{$consetext = "STANDARD";}
	$grafica = 12;
	$subtot = number_format($grafica + $prezzo, 2);
	$iva =  number_format(($subtot / 100) * $ali, 2);
	$tot = number_format($subtot * $aliquota, 2);
	$id = rand(100,200);
	$data = Date('d-m-Y');
	$ora = Date('H:i:s');


	$name = "0000" . $id . " Preventivo  ciccia " . $data . ".pdf";
	// $name = "0000" . $id . " Preventivo " . $add['nome'] . $add['cognome'] . "_" . $add['azienda'] " ciccia " . $data . ".pdf";
	// $name = "0000010 Preventivo pappa e ciccia-ciccia";

	define('FPDF_FONTPATH','./font/');
	//questo file e la cartella font si trovano nella stessa directory
	require('fpdf.php');


	class PDF extends FPDF
		{
		// Page header
		/*function Header()
		{
			// Logo
			// $this->Image('logo.png',10,6,30);
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
	$p->SetCreator('www.calleidos.it - FPDF 1.7);
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
	$p->MultiCell(25, 4, "Tot (iva esclusa):" , '1' , 'C' , 'true');
	$p->SetY(55);$p->SetX(175);
	$p->MultiCell(26, 4, "Tot (iva inclusa):" , '1' , 'C' , 'true');
	$p->SetFont('Helvetica', '', 9);


	// _______________________________________________________________________________________________________________________________________________________________________________________________


	$p->SetY(59);$p->SetX(9);
	$p->MultiCell(16, 4, "\n\n\n" . "$quantita \n" . "\n\n\n" , '0' , 'C' , '');

	$p->SetY(59);$p->SetX(25);
	$p->MultiCell(125, 4, "$prodotto" , '0' , 'J' , '');

	$p->SetY(59);$p->SetX(150);
	$p->MultiCell(25, 4, "\n\n\n€ $prezzo \n\n\n" , '0' , 'C' , '');
	$p->SetY(59);$p->SetX(175);
	$p->MultiCell(26, 4, "\n\n\n€ $prezzoiva \n\n\n" , '0' , 'C' , '');


	$p->SetDrawColor(200,200,200);
	$p->Line(3, 93, 207, 93);





	// _______________________________________________________________________________________________________________________________________________________________________________________________



	$p->SetDrawColor(0,0,0);



	$p->Text(5, 103, "Tipologia di consegna:");
	$p->SetFont('Helvetica', 'B', 10);
	$p->SetY(100);$p->SetX(40);$p->MultiCell(25, 4, "$consetext" , '0' , 'C' , '');

	// $p->Text(40, 90, "$consetext:");
	$p->SetFont('Helvetica', '', 9);
	$p->SetY(113);$p->SetX(3);
	$p->MultiCell(204, 4, " -  La nostra azienda garantisce la spedizione entro le $consegna ore successive al pagamento e alla conferma scritta dell'anteprima di stampa.
		Le ore sopra indicate si intendono calcolate nei soli giorni feriali escluso il sabato.
		Sono quindi esclusi dal calcolo i sabati e tutte le festività." , '0' , 'J' , '');

	// __________________________________________________________________________________________________________________________________________________________________________________________________


	if($grafica != ''){
	$p->Image('full.png', 200, 131.5);
	}
	else{
	$p->Image('empty.png', 200, 131.5);
	}
	if($prezzo != ''){
	$p->Image('full.png', 200, 99);
	}
	else{
	$p->Image('empty.png', 200, 99);
	}
	$p->Text(185, 103, "Stampa:");
	$p->Text(185, 135, "Grafica:");


	if($grafica != ''){
	$p->Text(5, 135, "Progetto Grafico:");
	$p->SetFont('Helvetica', 'B', 10);
	$p->SetY(132);$p->SetX(40);$p->MultiCell(25, 4, "€ $grafica" , '0' , 'C' , '');

	// $p->Text(40, 90, "$consetext:");
	$p->SetFont('Helvetica', 'B', 9);
	$p->SetTextColor(255,0,0); 
	$p->SetY(140);$p->SetX(3);
	$p->MultiCell(204, 5, "  ( * )  Il costo del progetto grafico è già inserito nel subtotale e comprende n° 1 bozze.
			  Eventuali ulteriori bozze richieste, verranno calcolate a consuntivo con un costo di € 50 + IVA / ORA
			  I tempi per la realizzazione del progetto grafico vanno definiti tramite e-mail al reparto grafico di Calleidos S.r.l.
				 nella persona di Mara Capitanio" , '0' , 'J' , '');
				 
	$p->Rect(3, 131, 60, 6 , 'D');
	}



	$p->SetTextColor(0); 
	$p->SetFont('Helvetica', '', 9);
	$p->SetY(165);$p->SetX(3);
	$p->MultiCell(204, 5, "  ( ** ) In caso di bonifico bancario anticipato è possibile, per ridurre i tempi bancari, mandare via fax (0445 1922011)
			  o tramite e-mail la ricevuta dell'avvenuto bonifico scrivendo nella causale il codice del preventivo.          
			  Per poter garantire l'autenticità dell'operazione, Vi invitiamo a comunicarci il C.R.O. dell' operazione effettuata." , '0' , 'J' , '');
			  
			  
			  
	$p->SetTextColor(255,0,0); 
	$p->SetFont('Helvetica', 'B', 10);
	$p->SetY(185);$p->SetX(3);
	$p->MultiCell(204, 5, "Questo preventivo è da rispedire tramite fax al numero  0445 1922011" , 'T' , 'C' , 't');
	$p->SetFont('Helvetica', 'B', 12);$p->SetX(3);
	$p->MultiCell(204, 5, "compilato in ogni sua parte e firmato." , '0' , 'C' , 't');
	$p->SetFont('Helvetica', '', 8);$p->SetX(3);
	$p->SetTextColor(0); 
	$p->MultiCell(204, 5, "La validità del preventivo è di 30gg. ed è in ogni caso subordinata alla reale fattibilità al momento della definizione del contratto. 
	La commessa può ritenersi evasa con variazioni in eccesso o in difetto del 5% sulla q.tà ordinata." , 'B' , 'C' , 't');
	$p->Image('exclamation.png', 3, 187);
	$p->Image('exclamation.png', 190.1, 187);
	$p->SetFont('Helvetica', '', 10);

	// $p->Image('firma.png', 159.2, 230);

	$p->Text(170, 215, "Per Calleidos S.r.l.:");
	$p->Text(170, 225, "Daniele Berlato");

	$p->Image('firma.png', 159.2, 215);
	// __________________________________________________________________________________________________________________________________________________________________________________________________








	//Immagini

	// $p->Image('php.gif', 110, 200);

	// $p->Text(100, 290, "$page Pagina");




	$p->Text(20, 215, "Subtotale:");
	$p->Text(29, 222, "IVA:");
	$p->Text(5, 229, "Totale (iva inclusa):");
	$p->SetY(211);$p->SetX(38);
	$p->MultiCell(25, 7, "€ $subtot\n€ $iva\n€ $tot" , '0' , 'R' , '');




	$p->SetY(233);$p->SetX(5);
	$p->MultiCell(80, 7, "Metodi di pagamento accettati:
	 • Anticipato con bonifico bancario ( ** )" , '0' , 'J' , '');
	$p->Image('logo.jpg', 83, 254.9);





	$p->SetDrawColor(200,200,200);
	$p->Line(3, 250, 207, 250);


	// _______________________________________________________________________________________________________________________________________________________________________________________________



	$p->SetDrawColor(0,0,0);
	$p->SetFont('Helvetica', '', 9);
	$p->Text(5, 259, "Per accettazione e conferma:");
	$p->SetFont('Helvetica', '', 7);
	$p->Text(5, 275, "firma:");

	$p->Line(15, 275, 80, 275);

	$p->SetFont('Helvetica', '', 7);
	$p->SetY(254);$p->SetX(120);
	$p->MultiCell(80, 4, "CALLEIDOS S.r.l.\nVia Aldo Moro, 54\n36035 Marano Vicentino (VI) \nTel. 0445/560709 - Fax 0445/1920319\nwww.calleidos.it - info@calleidos.it" , '0' , 'J' , '');
	$p->Text(121, 277, "Capitale sociale Euro 20.000,00 - Iscritta al Registro Imprese di Vicenza");
	$p->Text(121, 281, "Iscritta al REA della CCIAA di Vicenza al n. 317307 - C.F./P.IVA 03338510245");
	$p->Text(121, 285, "Bonifico Bancario Banca Popolare di Verona Agenzia Isola Vicentina");
	$p->SetFont('Helvetica', 'B', 9);
	$p->Text(121, 291, "IBAN: IT 37 P 05188 60430 000000001142");



	//  - 

	 
	 
	 
	 
	 
	 

	$p->SetDrawColor(0,0,0);
	$p->Rect(9, 59, 192, 28 , 'D');
	$p->Rect(38, 210, 25, 22 , 'D');
	$p->Rect(3, 210, 35, 22 , 'D');
	$p->Rect(3, 99, 60, 6 , 'D');
	$p->Line(25, 59, 25, 87);
	$p->Line(150, 59, 150, 87);
	$p->Line(175, 59, 175, 87);
	// $p->Rect(9, 55, 192, 4 , 'D');










	// $p->AddPage();

	$p->output("$name",'I'); // Senza parametri rende il file al browser
	// $p->output(); // Senza parametri rende il file al browser
?>