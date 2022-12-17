<html>	
	<head>
		<style>
		table {
		  border-spacing: 7px;
		}
		</style>
	</head>
	<body bgcolor = "#FFFF00">

		<?php
		echo "<center><p><b><tit>Numero primo</tit></b></p>";
		?>
		
		<form action="" method="POST">
			
			<table>
			<tr><td>Numero: <input type = "number" name = "primo" value="<?php if (isset($_POST['primo'])) echo $_POST['primo']; ?>"/></td></tr>
			</table>
			<input type="submit" name="btn" value="Calcola">
		</form>
	</body>    
</html>
<?php

    if($_POST){	
		$primo = $_POST['primo'];
        $check = true;
		$val = 1;
        
        //controllo campi obbligatori
		if (empty($primo)){
            echo "*Campo numero obbligatorio! <br>";
            $check = false;
        }//controllo numero primo
		else if($primo <= 1){
			$check = false;
			echo "*Il numero non è primo! <br>";
		}else{
			for($i = 2; $i < $primo; $i++){
				if($primo % $i == 0){
					$check = false;
					echo "*Il numero non è primo! <br>";
					break;
				}
			}
		}
		//calcolo fattoriale
		if($check){
			for ($i = 1; $i <= $primo; $i++){
				$val=$val*$i;
			} 
			echo $val;
		}
	
		$fp = fopen("risultati.txt", "w");
		if(!$fp){
			("Errore nella operazione con il file");
		} else{
			fwrite($fp, $val);
		}
		fclose($fp);
	}

	

	

?>