<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-neon mb-4" style="color: #fbbf24 !important; text-shadow: 0 0 10px rgba(251, 191, 36, 0.4);">
            <i class="fa-solid fa-pen-to-square me-2"></i>Edit Film Title
        </h2>

        <form action="" method="post" class="bg-dark-custom p-4 rounded-4 shadow-lg" style="border: 1px solid #334155;">
            <input type="hidden" name="id" value="<?=$film['id']?>">

            <div class="mb-4">
                <label for="film_name" class="form-label text-primary fw-bold">Film Name:</label>
                <input type="text" 
                       name="film_name" 
                       id="film_name" 
                       class="form-control bg-dark text-white border-secondary p-3" 
                       value="<?=htmlspecialchars($film['film_name'], ENT_QUOTES, 'UTF-8')?>" 
                       required>
                <div class="form-text text-secondary">Update the movie title in the database.</div>
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" name="submit" class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm">
                    <i class="fa-solid fa-check me-2"></i>Save Changes
                </button>
                <a href="films.php" class="btn btn-outline-secondary rounded-pill px-4">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>