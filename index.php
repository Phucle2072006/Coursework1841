<?php
$title = 'Home - Film Review Database';

ob_start();
?>
<div class="py-5 text-center hero-section" style="margin-top: 50px;">
    <h2 class="display-3 fw-bold text-neon mb-4" style="color: #00f2ff; text-shadow: 0 0 15px rgba(0, 242, 255, 0.6);">
        Welcome to our Prototype Film Review System
    </h2>
    
    <p class="lead text-bright fs-4 mb-3" style="color: #e2e8f0;">
        This platform allows you to browse, post, and manage reviews of your favorite movies.
    </p>
    
    <p class="text-bright opacity-75 mb-5" style="color: #94a3b8;">
        Explore the latest insights from our community of film enthusiasts.
    </p>

    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
        <a href="reviews.php" class="btn btn-primary btn-lg px-5 rounded-pill shadow-neon" style="background-color: #38bdf8; border: none; font-weight: bold; color: #0f172a;">
            <i class="fa-solid fa-clapperboard me-2"></i>Browse Reviews
        </a>
    </div>
</div>
<?php
$output = ob_get_clean();

include 'templates/layout.html.php';