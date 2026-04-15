<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="p-5 rounded-4 shadow-lg" style="background-color: #1e293b; border: 1px solid #334155; color: #f8fafc;">
            
            <h2 class="text-center mb-4 text-white fw-bold">
                <i class="fa-solid fa-user-pen me-2 text-primary"></i>Edit Author Name
            </h2>
            
            <form action="" method="post">
                <input type="hidden" name="id" value="<?=$reviewer['id']?>">

                <div class="mb-4">
                    <label for="name" class="form-label text-primary fw-bold">Full Name:</label>
                    <input type="text" name="name" id="name" 
                           class="form-control p-3 shadow-sm" 
                           style="background-color: #0f172a !important; color: white !important; border: 1px solid #38bdf8 !important;"
                           value="<?=htmlspecialchars($reviewer['name'], ENT_QUOTES, 'UTF-8')?>" 
                           required>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-center mt-4">
                    <button type="submit" name="submit" class="btn btn-primary px-5 fw-bold rounded-pill shadow">
                        <i class="fa-solid fa-check me-2"></i>Update Author
                    </button>
                    <a href="reviewers.php" class="btn btn-outline-secondary px-4 rounded-pill text-secondary border-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>