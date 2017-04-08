<?php 
class Moneta{
	public function lancia(){
		return rand(0,1)?"TESTA":"CROCE";
	}
	public function gioca($faccia){
		$punteggio=100;
		$primaFaccia=false;
		$contatore=0;
		while($punteggio>0){
			$contatore++;
			if(strcmp($faccia, $this->lancia())==0){
				if($primaFaccia){return $contatore;}
				$primaFaccia=true;
			}
			else {
				$primaFaccia=false;
				$punteggio=$punteggio-rand(1,35);
			}
			
		}
		return -1;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<div class="row">
  		<form class="form-inline" method="POST" action="index.php" >
			<label for="scelta">Scegli</label>
   			<select class="form-control" id="scelta" name="faccia">
  				<option>TESTA</option>
      			<option>CROCE</option>
    		</select>

  			<button type="submit" class="btn btn-default">Gioca Responsabilmente!</button>
  		</form>
	</div>
</div>
<?php
if (isset($_POST["faccia"])){
		$moneta=new Moneta();
		$giocata = $moneta->gioca($_POST["faccia"]);
		if($giocata!=-1){
			echo "hai vinto dopo " . $giocata. " lanci";
		}
		else {
			echo "hai perso!";
		}
	}
		
?>
</body>
</html>
