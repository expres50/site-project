<?php

include '../config.php';
session_start();
$email = $_SESSION['SESSION_EMAIL'];

if(!isset($email)){
   header('location: login.php');
}
if($email != "animanalfred@gmail.com"){
    header('location: login.php');
}

 $cpt=0;
 include 'database1.php';
 $notification_cpt=0;

 $notification = $con->prepare("SELECT * FROM `notifs` ORDER BY id desc");
 $notification -> setFetchMode(PDO:: FETCH_OBJ);
  $notification -> execute();

  while($row = $notification->fetch())
 {
    $notification_cpt++;
  }
	
      
 $msg = "";
    
 if (isset($_POST['submit'])) {

     
     $titre = mysqli_real_escape_string($conn, $_POST['titre']);
     $matiere = mysqli_real_escape_string($conn, $_POST['matiere']);
     $niveau = mysqli_real_escape_string($conn, $_POST['niveau']);
     $type = mysqli_real_escape_string($conn, $_POST['type']);
     $pages = mysqli_real_escape_string($conn, $_POST['pages']);
     $taille = mysqli_real_escape_string($conn, $_POST['taille']);
     $contenu = $_FILES['contenu']['name'];
     $contenu_size = $_FILES['contenu']['size'];
     $contenu_tmp_name = $_FILES['contenu']['tmp_name'];
     $contenu_folder = '../documents/'.$contenu;


     if($matiere==""){
        $msg = "<div class='alert echec'>La matiere a été laissé vide, ressayer !</div>";
     }
     elseif($niveau==""){
        $msg = "<div class='alert echec'>Le niveau a été laissé vide, ressayer !</div>";
     }
     elseif($type==""){
        $msg = "<div class='alert echec'>Le type a été laissé vide, ressayer !</div>";
     }
     elseif($contenu==""){
        $msg = "<div class='alert echec'>Le fichier du document est manquant, ressayer !</div>";
     }else{
     $sql = "INSERT INTO documents (titre, matiere, niveau,type,pages, taille, contenu) VALUES ('{$titre}', '{$matiere}', '{$niveau}','{$type}','{$pages}', '{$taille}', '{$contenu}')";
     $result = mysqli_query($conn, $sql);

     if ($result) {
         move_uploaded_file($contenu_tmp_name, $contenu_folder);
         $msg = "<div class='alert success'>Le document a été ajouté avec succes !</div>";
     }
     else{
         $msg = "<div class='alert echec'>Quelque chose s'est mal passé, ressayer !</div>";
     }
     

 }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Administration</title>

	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	
	
	
	<!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

        <style>
            .alert {    
                 padding: 1rem;
                 border-radius: 5px;
                 color: white;
                 margin: 1rem 0;
              }
              .success{
                background-color: green;
              }
              .echec{
                background-color: red;
              }
              body{
               text-transform:none;
            }
        </style>
  </head>
  <body>
  



<div class="wrapper">


<div class="body-overlay"></div>


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid"/><span>MitecSchool</span></h3>
            </div>
            <ul class="list-unstyled components">
			<li >
                    <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i><span>Tableau de bord</span></a>
                </li>
		
		      <div class="small-screen navbar-display">
                <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">notifications</i><span> <?php echo $notification_cpt ?> notification</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu0">
                    <?php
                    
                    $notification->setFetchMode(PDO:: FETCH_OBJ);
                    $notification -> execute();

                    while($row = $notification->fetch())
                   { ?>

                                    <form  method="GET">
                                       <li>
                                          <a href="#"><?php echo "$row->contenu"  ?></a> <a href="delete.php?id=<?php echo "$row->id"?>" style="color: red;">Supprimer</a>
                                       </li>
                                    </form>
                           <hr>
                   <?php
                    }

               ?>
                    </ul>
                </li>
				
				</div>
                <li class="dropdown">
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">person</i><span>Compte Admin</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu1">
                        <li>
                            <a href="gestion.php" class="btn-info">Gestion</a>
                        </li>
                        <li>
                            <a href="logout.php" class="btn-danger">Deconnexion</a>
                        </li>
                    </ul>
                </li>
			
			
                <li class="dropdown">
                    <a href="users.php">
					<i class="material-icons">groups</i><span>Comptes Utilisateurs</span></a>
                    
                </li>
                
                <li class="dropdown">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">picture_as_pdf</i><span>Documents</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                        <li>
                            <a href="documents.php?niveau=Licence 1">licence 1</a>
                        </li>
                        <li>
                            <a href="documents.php?niveau=Licence 2">licence 2</a>
                        </li>
                        <li>
                            <a href="documents.php?niveau=Licence 3">licence 3</a>
                        </li>
                        <li>
                            <a href="documents.php?niveau=Master 1">Master 1</a>
                        </li>
                        <li>
                            <a href="documents.php?niveau=Master 2">Master 2</a>
                        </li>

                        <li>
                            <a href="documents.php?niveau=tous">Tous</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="messages.php" data-toggle="collapse" aria-expanded="false">
					<i class="material-icons">message</i><span>Messages</span></a>
                    
                </li>
				
				 <li class="dropdown">
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">forum</i><span>Forum</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                        <li>
                            <a href="forum_users.php">users</a>
                        </li>
                        <li>
                            <a href="forum_question.php">questions</a>
                        </li>
                    </ul>
                </li>
				
				 <li  class="active">
                    <a href="add-document.php"><i class="material-icons">note_add</i><span>Nouveau Document</span></a>
                </li>
               
               
            </ul>

           
        </nav>
		
		

        <!-- Page Content  -->
        <div id="content">
		
		<div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
					
					<a class="navbar-brand" href="index.php"> Tableau de bord </a>
					
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-icons">menu</span>
                    </button>

                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">   
                            <li class="dropdown nav-item active">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                   <span class="material-icons">notifications</span>
								   <span class="notification"><?php echo $notification_cpt ?></span>
                               </a>
                                <ul class="dropdown-menu">
                                <?php 
                                    $notification->setFetchMode(PDO:: FETCH_OBJ);
                                    $notification -> execute();
    
                                    if($row = $notification->fetch()){ 
                                        ?>
                                    <form action="delete.php?validate=validate" method="GET">
                                    <li class="tmcl"><button class="tmc" type="submit" name="validate">tout supprimer</button></li>
                                    </form>
                                    <?php } ?>
                    
                                <?php
                                $notification->setFetchMode(PDO:: FETCH_OBJ);
                                $notification -> execute();

                                if($row = $notification->fetch()){

                                    $notification->setFetchMode(PDO:: FETCH_OBJ);
                                    $notification -> execute();
   
                                    while($row = $notification->fetch())
                                   { ?>
                                        <form  method="GET">
                                       <li>
                                        <a href="#"><?php echo "$row->contenu"  ?></a> <a href="delete.php?id=<?php echo "$row->id"?>" style="color: red;">Supprimer</a></a>
                                     </li>
                                     </form>
                                     <hr>
                                <?php
                                 }
                                }else{
                                    ?>

                                    <li>
                                        <a href="#" style="color: red;">Aucune notification</a>
                                     </li>
                                     <?php
                                }
   
                                ?>
                                  
                                </ul>
                            </li>
                            
                            <li class="dropdown nav-item ">
                                <a href="#" class="nav-link" data-toggle="dropdown">
								<span class="material-icons">person</span>
								</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="gestion.php" class="btn-info">Gestion</a>
                                    </li>
                                    <li>
                                        <a href="logout.php" class="btn-danger">Deconnexion</a>
                                    </li>
                                        
                                  
                                </ul>
                            </li>
                            <li>
                                <a href="add-document.php">
                                    <span class="material-icons">
                                        add
                                        </span>
                                </a>
                            </li>
							
                        </ul>
                    </div>
                </div>
            </nav>
	    </div>
			
			<div class="main-content">
					
					
					<div class="row" >
                        <div style="width: 100%;">
                            <div class="card" style="min-height: 485px; text-align: center; ">
                                <div class="card-header card-header-text" >
                                    <h4 class="card-title">Nouveau document</h4>
                                    <p class="category">remplissez correctement tous les champs !</p>
                                    <?php echo "$msg" ?>
                                </div>
                                <div class="card-content table-responsive">

                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="text" class="name form-control" name="titre" placeholder="titre du document"  required>
                            <div><br>
                            <select name="matiere" class="form-control" id="" style="width: 100%; height:55px; background-color:white; border: 1px solid rgb(218, 214, 214);">
                                <option value="">Matière</option>
                                <option value="Mathematique">Mathématique</option>
                                <option value="Informatique">Informatique</option>
                                <option value="SCI">Science de l'Ingenieur</option>
                                <option value="Physique">Physique</option>
                                <option value="Economie">Economie</option>
                            </select>
                            </div><br>

                            <div>
                            <select name="niveau" class="form-control" id="" style="width: 100%; height:55px; background-color:white; border: 1px solid rgb(218, 214, 214);">
                                <option value="" autofocus>Document pour niveau ?</option>
                                <optgroup label="Licence">
                                <option value="Licence 1">Licence 1</option>
                                <option value="Licence 2">Licence 2</option>
                                <option value="Licence 3">Licence 3</option>
                                </optgroup>
                                <optgroup label="Master">
                                <option value="Master 1">Master 1</option>
                                <option value="Master 2">Master 2</option>
                                </optgroup>
                            </select>
                            </div><br>

                            <div>
                            <select name="type" class="form-control" id="" style="width: 100%; height:55px; background-color:white; border: 1px solid rgb(218, 214, 214);">
                                <option value="" autofocus>Cours ou Exercice</option>
                                <option value="Cours">Cours</option>            
                                <option value="Exercice">Exercice</option>
                                <option value="Cours & Exercice">Cours & Exercice</option>
                                </optgroup>
                            </select>
                            </div><br>
                            <input type="number" class="name form-control" name="pages" placeholder="Page du document EX: 200"  required><br>
                            <input type="text" class="name form-control" name="taille" placeholder="taille du document EX: 2Mo"  required>
                            <p style="text-align: left;"><span style="color: rgb(184, 184, 184);">importer le document :</span></p>
                           <input  type="file" class="name form-control" name="contenu" accept="application/pdf" ><br>
                        
                            <button name="submit" class="btn form-control btn-info" type="submit">Ajouter ce document</button>
                        </form>




                                </div>
                            </div>
                        </div>
                      
                    
                    </div>
					
					
						
				<footer class="footer">
                <div class="container-fluid">
				  <div class="row">
				  <div class="col-md-6">
                    <nav class="d-flex">
                        <ul class="m-0 p-0">
                            <li>
                                <a href="index.php">
                                    Accueil
                                </a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    Deconnexion
                                </a>
                            </li>
                            
                        </ul>
                    </nav>
                   
                </div>
				<div class="col-md-6">
				 <p class="copyright d-flex justify-content-end"> &copy 2022 MitecSchool | tous droits réservés
                    </p>
				</div>
				  </div>
				    </div>
            </footer>
					
					</div>
					
				

        </div>
    </div>






	
  
     <!-- JavaScript -->
    <!-- jQuery ,  Popper.js, Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });


     
           
       
</script>
  
  
<style>
    
</style>



  </body>
  
  </html>













  