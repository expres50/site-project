<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduShare - Plateforme d'échange éducatif</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="JS/index.js"></script>
    <link rel="stylesheet" href="css/index.css">
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-graduation-cap text-blue-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-gray-900">EduShare</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="index.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Accueil
                        </a>
                        <a href="matiere.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Matières
                        </a>
                        <a href="exercices.php" class="border-blue-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium active-tab">
                            Exercices
                        </a>
                        <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Forum
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..." class="border border-gray-300 rounded-full py-1 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <i class="fas fa-search absolute left-3 top-2 text-gray-400"></i>
                    </div>
                    <button class="ml-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-full text-sm font-medium transition-all">
                        <a href="login.php">
                            Connexion
                        </a>
                    </button>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                 <a href="index.php" class="bg-blue-50 border-blue-500 text-blue-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Accueil</a>
                <a href="matiere.php" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Matières</a>
                <a href="exercices.php" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Exercices</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Forum</a>
                <div class="px-4 py-2">
                    <input type="text" placeholder="Rechercher..." class="border border-gray-300 rounded-full py-1 px-4 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <i class="fas fa-search absolute left-7 top-9 text-gray-400"></i>
                </div>
                <button class="ml-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-full text-sm font-medium block mx-auto my-2">
                    <a href="login.php">Connexion</a> 
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="gradient-bg text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    Partagez, collaborez, réussissez
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-xl">
                    La plateforme où les étudiants du monde entier échangent des sujets d'examen, des exercices et discutent pour une meilleure réussite académique.
                </p>
                <div class="mt-10 flex justify-center space-x-4">
                    <button class="bg-white text-blue-600 hover:bg-gray-100 px-6 py-3 rounded-full text-lg font-semibold transition-all">
                        Commencer maintenant
                    </button>
                    <button class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-6 py-3 rounded-full text-lg font-semibold transition-all">
                        Voir comment ça marche
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Fonctionnalités</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Tout ce dont vous avez besoin pour réussir
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm card-hover transition-all">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <i class="fas fa-book text-xl"></i>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-lg font-medium text-gray-900">Ressources partagées</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Accédez à des milliers de sujets d'examen et exercices partagés par des étudiants du monde entier.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm card-hover transition-all">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <i class="fas fa-comments text-xl"></i>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-lg font-medium text-gray-900">Forum de discussion</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Posez des questions, obtenez des réponses et discutez avec une communauté d'étudiants motivés.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-gray-50 p-6 rounded-xl shadow-sm card-hover transition-all">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                            <i class="fas fa-chart-line text-xl"></i>
                        </div>
                        <div class="mt-5">
                            <h3 class="text-lg font-medium text-gray-900">Suivi de progression</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Visualisez vos progrès et identifiez les domaines à améliorer grâce à nos outils d'analyse.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Subjects -->

    <!-- Recent Exams -->
     
    <!-- Ajoute ce bloc où tu veux afficher la liste a partir de la DB -->
<div id="liste-exercices"></div>
<script src="JS/exercices.js"></script>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-10">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Examens</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Sujets récemment ajoutés
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Exam 1 -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg card-hover transition-all">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <i class="fas fa-file-alt text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Examen final - Mathématiques</h3>
                                <p class="text-sm text-gray-500">Université Paris-Saclay • 2023</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">Examen complet avec corrigé. Couvre les chapitres sur les équations différentielles et l'analyse vectorielle.</p>
                        </div>
                        <div class="mt-6 flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/11.jpg" alt="">
                                <p class="ml-2 text-sm font-medium text-gray-900">Pierre L.</p>
                            </div>
                            <button class="text-sm font-medium text-blue-600 hover:text-blue-500">
                                Télécharger <span class="sr-only">, Examen final - Mathématiques</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Exam 2 -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg card-hover transition-all">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="fas fa-flask text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Partiel - Chimie organique</h3>
                                <p class="text-sm text-gray-500">Sorbonne Université • 2022</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">Sujet de partiel avec questions sur les réactions de substitution nucléophile et les stéréoisomères.</p>
                        </div>
                        <div class="mt-6 flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/women/33.jpg" alt="">
                                <p class="ml-2 text-sm font-medium text-gray-900">Élodie M.</p>
                            </div>
                            <button class="text-sm font-medium text-blue-600 hover:text-blue-500">
                                Télécharger <span class="sr-only">, Partiel - Chimie organique</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Exam 3 -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg card-hover transition-all">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <i class="fas fa-laptop-code text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Contrôle continu - Algorithmique</h3>
                                <p class="text-sm text-gray-500">Université de Lyon • 2023</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">Sujet sur les algorithmes de tri et les structures de données arborescentes. Avec corrigé partiel.</p>
                        </div>
                        <div class="mt-6 flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/45.jpg" alt="">
                                <p class="ml-2 text-sm font-medium text-gray-900">Thomas B.</p>
                            </div>
                            <button class="text-sm font-medium text-blue-600 hover:text-blue-500">
                                Télécharger <span class="sr-only">, Contrôle continu - Algorithmique</span>
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="mt-10 text-center">
                <button class="bg-white border border-gray-300 hover:border-gray-400 text-gray-700 px-6 py-2 rounded-full text-md font-medium transition-all">
                    Voir tous les examens
                </button>
            </div>
        </div>
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
    </div>

    <!-- Call to Action -->
    <div class="bg-blue-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Prêt à rejoindre notre communauté?</span>
                <span class="block text-blue-200">Inscrivez-vous maintenant et améliorez vos résultats.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                        S'inscrire gratuitement
                    </button>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 bg-opacity-60 hover:bg-opacity-70">
                        <i class="fas fa-play mr-2"></i> Voir la démo
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">EduShare</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">À propos</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Carrières</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Ressources</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Examens</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Exercices</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Cours</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Communauté</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Forum</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Groupes d'étude</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Tuteurs</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Légal</h3>
                    <ul class="mt-4 space-y-4">
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Confidentialité</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Conditions</a>
                        </li>
                        <li>
                            <a href="#" class="text-base text-gray-400 hover:text-white">Cookies</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-between">
                <div class="flex space-x-6 md:order-2">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                    &copy; 2023 EduShare. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('[aria-controls="mobile-menu"]').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Tab switching functionality
        const tabs = document.querySelectorAll('nav a');
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                //e.preventDefault();
                tabs.forEach(t => t.classList.remove('active-tab'));
                this.classList.add('active-tab');
                
                // Here you would typically load content for the selected tab
                console.log('Switched to tab:', this.textContent.trim());
            });
        });

        // Card hover effects are handled by CSS
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });
    </script>
</body>
</html>