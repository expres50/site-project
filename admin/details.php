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

include 'database1.php';
 $notification_cpt=0;

 $notification = $con->prepare("SELECT * FROM `notifs` ORDER BY id desc");
 $notification -> setFetchMode(PDO:: FETCH_OBJ);
  $notification -> execute();

  while($row = $notification->fetch())
 {
    $notification_cpt++;
  }

$id = $_GET['id'];
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
        <!-- custom css file link  -->
    <link rel="stylesheet" href="../assets/css/profile-style.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	
	
	
	<!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
  </head>

  <style>
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
			
			
					   
<div class="update-profile">

<?php
   $select = mysqli_query($conn, "SELECT * FROM `documents` WHERE id = '$id'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $fetch = mysqli_fetch_assoc($select);
   }
?>

<form action=""  method="post" enctype="multipart/form-data">
    <h2 style="text-align: center;">Détails sur le document</h2>
   <?php
      
      if(isset($message)){
         foreach($message as $message){
            echo $message;
         }
      }
   ?>
   <div class="flex">
      <div class="inputBox" style="width:100%; ">
         <span>Titre :</span>
         <input type="text"  value="<?php echo $fetch['titre']; ?>" class="box" readonly>
         <span>Matière :</span>
         <input type="text"  value="<?php echo $fetch['matiere']; ?>" class="box" readonly>
         <span>Niveau :</span>
         <input type="text"  value="<?php echo $fetch['niveau']; ?>" class="box" readonly>
         <span>Type :</span>
         <input type="text"  value="<?php echo $fetch['type']; ?>" class="box" readonly>
         <span>Pages :</span>
         <input type="text"  value="<?php echo $fetch['pages']; ?>" class="box" readonly>
         <span>Taille :</span>
         <input type="text"  value="<?php echo $fetch['taille']; ?>" class="box" readonly>
         <span>Fichier :</span>
         <input type="text"  value="<?php echo $fetch['contenu']; ?>" class="box" readonly>
      </div>
      
   </div>
   <br>
   <a href="update_document.php?id=<?php echo $fetch['id']; ?>" class="btn">Modifier le document</a>
   <a href="delete.php?doc_id=<?php echo $fetch['id']; ?>" class=" delete-btn">supprimer le document </a>

</form>

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


