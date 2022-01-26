<?php 
	
	require("fpdf/fpdf.php");
	require("functies.php");
	$app = new neger();

if(isset($_POST['bsubmit'])) //bon submit checken / moet voor de html geplaatst worden anders kan je niet doorgestuurd worden 
{
	$app->printbon($_POST['kn'], $_POST['kt'], $_POST['kd']);
}


 	
?>


<!DOCTYPE html>
<html>
<head>
	<title>NEger</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>

<a href="index.php?u=reservatie_boek">bekijk Reservaties</a>
<br>
<a href="index.php?u=drankkaart">bekijk / aanpassen drank kaart</a>
<br>
<a href="index.php?u=reservatie_boek">bekijk / aanpassen menu kaart</a>

</body>
</html>

 <br>
<div class="container"> 
<?php 


if(isset($_GET['u'])){
	switch ($_GET['u']) {
		case 'reservatie_boek':
			 
			include("./paginas/reservatie_boek.php");
		    


			break;
	 	case 'drankkaart':
		 	include("./paginas/dranken_kaart.php");
			

			break;
		case 'menukaart':
		 
			break;
		default:
			# code...
			break;
	}

	//$app->maakPDF($klanten);

}

?>
</div>