<?php

/**
* Updated: Mohammad M. AlBanna
* Website: MBanna.info
*/

session_start();

$bandera = $_POST["bandera"];


if($bandera=="backup"){

	$host="localhost";
	$username="root";
	$password="";
	$database_name="sisauto";

	$conn=mysqli_connect($host,$username,$password,$database_name);

	$tables=array();
	$sql="SHOW TABLES";
	$result=mysqli_query($conn,$sql);

	while($row=mysqli_fetch_row($result)){
		$tables[]=$row[0];
	}

	$backupSQL="";
	foreach($tables as $table){
		$query="SHOW CREATE TABLE $table";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_row($result);
		$backupSQL.="\n\n".$row[1].";\n\n";

		$query="SELECT * FROM $table";
		$result=mysqli_query($conn,$query);

		$columnCount=mysqli_num_fields($result);

		for($i=0;$i<$columnCount;$i++){
			while($row=mysqli_fetch_row($result)){
				$backupSQL.="INSERT INTO $table VALUES(";
					for($j=0;$j<$columnCount;$j++){
						$row[$j]=$row[$j];

						if(isset($row[$j])){
							$backupSQL.='"'.$row[$j].'"';
						}else{
							$backupSQL.='""';
						}
						if($j<($columnCount-1)){
							$backupSQL.=',';
						}
					}
					$backupSQL.=");\n";
}
}
$backupSQL.="\n";
}

if(!empty($backupSQL)){
	$backup_file_name="db/sisauto".date("Y-m-d-H-i-s").'.sql';
	$fileHandler=fopen($backup_file_name,'w+');
	$number_of_lines=fwrite($fileHandler,$backupSQL);
	fclose($fileHandler);
}


$_SESSION['mensaje'] = "Respaldo realizado exitosamente";
header("location: /SISAUTO1/view/Respaldo.php?");
}

if ($bandera == "subida") {
	$dir_subida ="../backup/db/";
	$fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);

	if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
		$_SESSION['mensaje'] = "El archivo es válido y se subió con éxito";
	} else {
		$_SESSION['error'] = "El archivo no fue subido";
	}

}

if ($bandera == "respaldar") {
	$nombre = $_POST["nombre"];

			//get post data
		$dbHost = 'localhost';
		$dbUsername = 'root';
		$dbPassword = '';
		$dbName = 'sisauto';
 
		$filePath = '../backup/db/' . $nombre;
 
		 $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= $db->error . '---------';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    echo !empty($error)?$error:true;
}

?>