<?php 

/**
 * MAAK RESERVATIE:  INSERT INTO reservaties (klant_id, klant_naam, tijdstip, nietkomer) VALUES ("0", "ali neger", "2019-01-10 08:14:21", 1 )
 */
class neger
{
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $databasename = "neger";

	public $db; 

	public $result; 


	function __construct()
	{
		$this->db = new MYSQLI($this->host, $this->username, $this->password, $this->databasename); 

	}

	function laadklanten()
	{
		$query = "SELECT * FROM klanten"; 

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		$this->result = $stmt->get_result();

		 

	}
	function laadreservaties()
	{
		$query = "SELECT * FROM reservaties"; 

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		$this->result = $stmt->get_result();

		 

	}
	function verwijderReservatie($kid)
	{
		//kid = klant_id
		$query = "DELETE FROM reservaties WHERE klant_id = ?"; 
		$stmt = $this->db->prepare($query); //eerst preparen van SQL daarna ? binden
		$stmt->bind_param('i', $kid); //? binden aan query
		$stmt->execute(); // SQL uitvoeren
	}
    function maakReservatie($naam, $datumd, $tijd)
	{
		$sttime = $tijd; 
		$datum = substr($datumd, 0, 2);
		$dbtime = strtotime($sttime);;
		$query = "INSERT INTO reservaties (klant_naam, tijdstip, datum) VALUES (?,?,?)"; 
		$stmt = $this->db->prepare($query); //eerst preparen van SQL daarna ? binden
		$stmt->bind_param('sss', $naam, $sttime, $datum); //? binden aan query
		$stmt->execute(); // SQL uitvoeren


	 
	}

	function printbon($klantnaam, $tijd, $datum)
	{
 
	 
 
 
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->write(20,"Factuur", 0,"C");
		$pdf->SetFont('Arial','',10);
		$pdf->ln(); 
	 	$pdf->write(5, "klant naam: " . $klantnaam);	
	 	$pdf->ln(); 
	 	$pdf->write(5, "tijdstip: " . $tijd);	
	 	 $pdf->ln(); 
	 	$pdf->write(5, "datum: " . $datum, 0,"C");	
	 	$pdf->Output();
 
	}

	function printHello(){
		echo "hello";
	}

}


?> 