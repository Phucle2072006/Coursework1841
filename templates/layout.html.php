<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="dark-theme">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-custom sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="index.php">
                <span class="text-primary"><i class="fa-solid fa-clapperboard"></i> FILM</span> REVIEW
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link px-3" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="reviews.php">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="films.php">Movies</a></li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="reviewers.php">Users</a>
                    </li>
                    
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary rounded-pill px-4 shadow-sm" href="addreview.php" style="background-color: #38bdf8; border: none; color: #0f172a; font-weight: bold;">
                            <i class="fa-solid fa-plus me-2"></i>Post Review
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5" style="min-height: 75vh;">
        <div class="container">
            <?=$output?>
        </div>
    </main>

    <footer class="footer mt-auto py-5 border-top border-secondary">
        <div class="container text-center">
            <p class="mb-0 text-secondary">
                © 2026 Film Review Database • Crafted with 
                <i class="fa-solid fa-heart text-danger"></i> 
                by <strong>Le Thien Phuc</strong>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>