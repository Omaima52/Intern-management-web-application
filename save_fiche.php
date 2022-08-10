<?php
include('../connect.php');
mysqli_set_charset($conn, 'utf8');
// echo "before isset";
// if(isset($_POST["btn_save"]) && $_POST["btn_save"]!=""){ 
//

// echo "after isset";









$fiche_note = $_FILES['fiche_note']['name'];
$target = "../uploadFicheNote/" . basename($fiche_note);

if (move_uploaded_file($_FILES['fiche_note']['tmp_name'], $target)) {
  $msg = "fiche chargé avec succés";
  // echo $msg;
} else {
  $msg = "Echec de chargement du fiche";
}






//   $nom = $_POST["nom"];
//   // echo $nom;
// $prenom = $_POST["prenom"];
// $date_debut = $_POST["date_debut"];
// $date_fin = $_POST["date_fin"];
// $cin = $_POST["cin"];
// $type = $_POST["type"];
// $serviceNom = $_POST["serviceNom"];
// $niveau = $_POST["niveau"];
// $etat = $_POST["etat"];
// $etablissement = $_POST["etablissement"];
// $ville = $_POST['ville'];
// $sexe = $_POST["sexe"];
// $filiere = $_POST["filiere"];
// $adresse = $_POST["adresse"];
// $date_naissance = $_POST["date_naissance"];
// $telephone = $_POST["telephone"];

// function getNextCaseNumberId() {
//   include('../connect.php');

//   $date = date('Y-m-d');
//   $time = strtotime($date);

//   $year = date("Y", $time);
//   $sql = "SELECT * from `demande` WHERE `nombreIncrement` LIKE '%/{$year}' order by idDemande desc limit 1"; //Assuming your CS_ID is autoincrement
//   $query_result = $conn->query($sql) or die($conn->error);
//   $row = $query_result->fetch_assoc();
//   if ($row) {

//     $lastId=explode("/",$row["nombreIncrement"])[0];
//     return ($lastId+1)."/".$year; 


//   } else {
//     return "1/{$year}"; 
//   }
// }


//extract($_POST);
$count = 0;
$date = date('Y-m-d');
$time = strtotime($date);

$year = date("Y", $time);

// $test = DATE_FORMAT($time, '%y');

$sql = "UPDATE demande SET `fiche_note` = '$fiche_note' WHERE `idDemande`='" . $_GET['idDemande'] . "'";
$sql2 = 'DESCRIBE critere';
$result = $conn->query($sql2);

$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row['Field'];
}
# Insert this array
$removed = array_shift($rows);

function addQuotes($str)
{
  return "`$str`";
}

# Surround values by 
foreach ($rows as $key => &$value) {
  $value = addQuotes($value);
}



# get the post elements
$columnsPost = implode(",", array_values($_POST));
$columnsPost .= $_GET['idDemande'];
// substr($columnsPost, 4);// remove the ,
$columnsPost = ltrim($columnsPost, $columnsPost[0]);


#get the coloumns names of critere
$valuess = implode(",", array_values($rows));





$queryy = "INSERT INTO `critere` (  $valuess ) VALUES (  $columnsPost  )";



$resulttt = $conn->query($queryy) or die($conn->error);


// $result = $conn->query($user_qry) or die($conn->error);
if ($conn->query($sql)) {
  //   $query2 = "UPDATE demande SET `nombreIncrement`='$ngetNextCaseNumberIdom'WHERE `cin`='" . $cin . "'";
  //   // $query2 = "INSERT INTO `demande` VALUES('','$identification_number','".getNextCaseNumberId()."')";        
  // $query_run2 =$conn->query($query2) or die($conn->error);


  $_SESSION['success'] = ' Fiche de note est enregistré avec succés';
?>


  <script type="text/javascript">
    window.location = "../view_mes_demandes.php";
  </script>
<?php
} else {
  $_SESSION['error'] = 'Un problème est survenu lors de l\'ajout';
?>
  <script type="text/javascript">
    window.location = "../error.php";
  </script>
<?php }




// }

?>