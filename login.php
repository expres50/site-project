<?php
    session_start();
    // include 'visit.php';
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index2.php");
        die();
    }

    include 'config.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $code = $_GET['verification'];
            
            $select = mysqli_query($conn, "SELECT * FROM `users` WHERE code = '$code'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                    $name= $fetch['name'];
                    date_default_timezone_set('Africa/Abidjan');                               
                    $date = date('d/m/Y G:i:s');
                    $sql = "INSERT INTO notifs (contenu) VALUES ('{$date} {$name} vient de confirmer son compte')";
                    $notification = mysqli_query($conn, $sql);
            }
            
            
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>La vérification du compte a été effectuée avec succès.</div>";

            }
        } else {
            header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL'] = $email;
                header("Location: index2.php");
            } else {
                $msg = "<div class='alert alert-info'>SVP confirmez d'abord votre email et réessayez. Consultez votre boite et cliquez le lien que nous vous avons envoyé !</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>L'e-mail et le mot de passe ne correspondent pas.</div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - EduShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                        <a href="exercices.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
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
                <a href="login.php" class="ml-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-full text-sm font-medium block mx-auto my-2">
                    Connexion
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center">Connexion</h2>
        <form class="mt-4">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-md">Se connecter</button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">
            Pas encore de compte? <a href="signup.php" class="text-blue-600 hover:underline">Inscrivez-vous ici</a>
        </p>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 mt-10">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-400">&copy; 2023 EduShare. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>