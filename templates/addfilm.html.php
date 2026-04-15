<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="p-5 rounded-4 shadow-lg" style="background-color: #1e293b; border: 1px solid #334155; color: #f8fafc;">
            <h2 class="text-center mb-4 text-white fw-bold">Add New Film</h2>
            
            <form action="" method="post">
                <div class="mb-4">
                    <label for="film_name" class="form-label text-primary fw-bold">Film Name:</label>
                    <input type="text" name="film_name" id="film_name" 
                           class="form-control p-3" 
                           style="background-color: #0f172a !important; color: white !important; border: 1px solid #38bdf8 !important;"
                           placeholder="Enter film title..." required>
                </div>

                <div class="mb-4">
                    <label for="admin_email" class="form-label text-primary fw-bold">Admin Email (for Contact):</label>
                    <input type="email" name="admin_email" id="admin_email" 
                           class="form-control p-3" 
                           style="background-color: #0f172a !important; color: white !important; border: 1px solid #334155 !important;"
                           placeholder="admin@example.com" required>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-center mt-4">
                    <button type="submit" name="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow">
                        <i class="fa-solid fa-save me-2"></i>Save Film
                    </button>
                    <a href="films.php" class="btn btn-outline-secondary rounded-pill px-4 text-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>