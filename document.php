<!-- <?php 
    // session_start();
    // include 'visit.php';
    // if (isset($_SESSION['SESSION_EMAIL'])) {
    //     header("Location: all-documents2.php");
    //     die();
    // }
    
?> -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Les documents</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">

<!-- Header -->
<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="index.php" class="flex items-center">
                    <i class="fas fa-graduation-cap text-blue-600 text-2xl mr-2"></i>
                    <span class="text-xl font-bold text-gray-900">MitecSchool</span>
                </a>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="index.php" class="border-blue-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium active-tab">Accueil</a>
                    <a href="forum/index.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Forum</a>
                    <a href="about.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">À propos</a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <button class="ml-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-full text-sm font-medium transition-all">
                    <a href="login.php">
                        Connexion
                    </a>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Section principale -->
<section class="py-12">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Barre de recherche -->
        <form action="search.php" method="POST" class="mb-8">
            <div class="relative">
                <input type="text" name="search" placeholder="Rechercher..." class="w-full border border-gray-300 rounded-full py-3 px-6 pl-12 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-lg shadow-sm">
                <button class="absolute left-3 top-3 text-gray-400" name="submit" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <!-- Liste des documents -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Tous les documents</h2>
            <?php
            include 'admin/database2.php';
            $sth = $conn->prepare("SELECT * FROM `documents` ORDER BY id DESC ");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth -> execute();
            $hasDocuments = false;
            while($row = $sth->fetch()) {
                $hasDocuments = true;
            ?>
            <div class="mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-blue-700"><?php echo htmlspecialchars($row->titre); ?></h3>
                        <div class="text-gray-600 text-sm mt-1">
                            Niveau : <span class="font-medium"><?php echo htmlspecialchars($row->niveau); ?></span> |
                            Matière : <span class="font-medium"><?php echo htmlspecialchars($row->matiere); ?></span> |
                            Type : <span class="font-medium"><?php echo htmlspecialchars($row->type); ?></span> |
                            Pages : <span class="font-medium"><?php echo htmlspecialchars($row->pages); ?></span> |
                            Taille : <span class="font-medium"><?php echo htmlspecialchars($row->taille); ?></span>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <button id="myBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full font-medium shadow transition-all">
                            Voir / Télécharger
                        </button>
                    </div>
                </div>
                <hr class="my-4 border-gray-200">
            </div>
            <?php }
            if(!$hasDocuments) {
                echo "<div class='text-center text-gray-500 py-8'>Il n'y a plus de documents disponibles pour le moment !<br>Nous faisons régulièrement des mises à jour !</div>";
            }
            ?>
        </div>
    </div>
</section>

<!-- Modal modernisé -->
<div id="myModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
  <div class="flex items-center justify-center min-h-screen px-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-8 relative">
      <button class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold focus:outline-none close" aria-label="Fermer">&times;</button>
      <h2 class="text-xl font-bold text-gray-900 mb-4">Connexion/Inscription requise</h2>
      <p class="text-gray-700 mb-6">Connectez-vous ou créez un compte gratuitement en moins de 5min<br>pour avoir accès aux documents pour toujours !</p>
      <a href="login.php" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full font-semibold transition-all">Ok c'est parti !</a>
    </div>
  </div>
  <div class="fixed inset-0 bg-black opacity-40"></div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 mt-12">
    <div class="max-w-7xl mx-auto py-6 px-4 text-center text-gray-400">
        &copy; 2022 MitecSchool, Tous droits réservés.
    </div>
</footer>

<!-- Scripts -->
<script>
    // Modal
    document.querySelectorAll('#myBtn').forEach(btn => {
        btn.onclick = function() {
            document.getElementById("myModal").classList.remove('hidden');
        }
    });
    document.querySelectorAll('.close').forEach(span => {
        span.onclick = function() {
            document.getElementById("myModal").classList.add('hidden');
        }
    });
    window.onclick = function(event) {
        if(event.target === document.getElementById("myModal")) {
            document.getElementById("myModal").classList.add('hidden');
        }
    }
</script>
</body>
</html>
