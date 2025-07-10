<?php

include '../config.php';
include 'database2.php';
session_start();
$email = $_SESSION['SESSION_EMAIL'];

if(!isset($email)){
   header('location: login.php');
}
if($email != "animanalfred@gmail.com"){
    header('location: login.php');
}
$documents_cpt=0;
$users_cpt=0;
$notification_cpt=0;
$download_cpt=0;


  $documents = $conn->prepare("SELECT * FROM `documents`");
  $users = $conn->prepare("SELECT * FROM `users`");
  $notification = $conn->prepare("SELECT * FROM `notifs` ORDER BY id desc");
  $download = $conn->prepare("SELECT * FROM `download`");

  $documents->setFetchMode(PDO:: FETCH_OBJ);
  $documents -> execute();

  while($row = $documents->fetch())
 {
    $documents_cpt++;
  }

  $users->setFetchMode(PDO:: FETCH_OBJ);
  $users -> execute();

  while($row = $users->fetch())
 {
    $users_cpt++;
  }

  
  $notification->setFetchMode(PDO:: FETCH_OBJ);
  $notification -> execute();

  while($row = $notification->fetch())
 {
    $notification_cpt++;
  }

  $download->setFetchMode(PDO:: FETCH_OBJ);
  $download -> execute();

  while($row = $download->fetch())
 {
    $download_cpt++;
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
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
  </head>

  <style>
    .tmcl{
        background-color: #9e7ddb;
        color: white;
        text-align: center;
        font-size: medium;
        transition: 0.5s;
    }
    .tmcl:hover .tmc{
        color: white;
    }
    .tmcl:hover{
        background-color: blue;
    }

    body{
        text-transform:none;
    }
  </style>
  <body>
  



<div class="wrapper">


<div class="body-overlay"></div>


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid"/><span>MitecSchool</span></h3>
            </div>
            <ul class="list-unstyled components">
			<li  class="active">
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
                    <a href="messages.php">
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
				
				 <li  class="">
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
					
					<a class="navbar-brand" href="#"> Tableau de bord </a>
					
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
			
			<div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-warning">
                                       <span class="material-icons">equalizer</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Page Loading</strong></p>
                                    <h3 class="card-title">
                                    
                                    <?php
                                $visit = $conn->prepare("SELECT * FROM `visitor_counter`");
                                 $visit->setFetchMode(PDO:: FETCH_OBJ);
                                 $visit -> execute();
                                 $row = $visit->fetch();

                                ?>
                                     <a href="#"><?php echo "$row->visitor_counter"  ?></a>
                                 
                             <?php
                              

                             ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-info">info</i>
                                        <a href="#pablo">Nombre d'actualisation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-rose">
                                       <span class="material-icons">picture_as_pdf</span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Documents</strong></p>
                                    <h3 class="card-title"><?php echo "$documents_cpt" ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Nombre de documents
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-success">
                                        <span class="material-icons">groups</span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Utilisateurs</strong></p>
                                    <h3 class="card-title"><?php echo "$users_cpt" ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Nombre d'utilisateurs
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-info">
                                    <span class="material-icons">file_download</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Downloads</strong></p>
                                    <h3 class="card-title"><?php echo "$download_cpt" ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">download_done</i>Téléchargements
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					<div class="row ">
                        <div class="col-lg-7 col-md-12">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title" style="text-align: center;">Documents récents</h4>
                                    <p class="category" style="text-align: center;">Les documents récemment ajoutés</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                            <th>Titre</th>
                                            <th>Type</th>
                                            <th>Plus</th>
                                        </tr></thead>
                                        <tbody>



                                        <?php

                                $sth = $conn->prepare("SELECT * FROM `documents` ORDER BY id DESC ");
                                $sth->setFetchMode(PDO:: FETCH_OBJ);
                                $sth -> execute();
                       
                            for($cpt=1; $cpt<=6; $cpt++){
                                
                                $row = $sth->fetch()
                            ?>
                                 <tr>
                                
                                 <td><?php echo "$row->titre"?></td>
                                <td><?php echo "$row->type"?></td>
                                 <td class="btn-info" style="text-align: center;"><a href="details.php?id=<?php echo "$row->id"?>" style="color: white;"><span class="material-icons">visibility</span></a></td>
                                </tr>

                    <?php } ?>


                    </tbody>
                    
                </table>

                <?php if($cpt==0) {?>
                    <p style="text-align: center; color:red;">Aucun document pour le moment <br> <a href="add-document.php" style="color: blue;">Ajouter</a></p>
                <?php } ?>

                <p style="text-align: center;"><a href="documents.php?niveau=tous" style="color:blue">Voir tous les documents</a></p>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-lg-5 col-md-12">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title" style="text-align: center;">Activités Récentes</h4>
                                </div>
                                <div class="card-content">
                                    <div class="streamline">

                                        


                            <?php

                                $sth = $conn->prepare("SELECT * FROM `activites` ORDER BY id DESC ");
                                $sth->setFetchMode(PDO:: FETCH_OBJ);
                                $sth -> execute();
                       
                            for($cpt=1; $cpt<=5; $cpt++){
                                
                                $row = $sth->fetch()
                            ?>
                                   <div class="sl-item sl-primary">
                                            <div class="sl-content">
                                                <small class="text-muted"><?php echo "$row->date_heure"?></small>
                                                <p><?php echo "$row->contenu"?></p>
                                            </div>
                                    </div>

                            <?php } ?>
                            
                            <p style="text-align: center;"><a href="activites.php" style="color:blue">Voir tous</a></p>

                                      
                                    </div>
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
  
  



  </body>
  
  </html>


