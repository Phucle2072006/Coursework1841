<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <h2 class="text-white fw-bold mb-0">Manage Film List</h2>
    
    <form action="films.php" method="GET" class="d-flex gap-2">
        <input type="text" name="search" class="form-control bg-dark text-white border-secondary" placeholder="Search film name..." 
               value="<?=isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : ''?>">
        <button type="submit" class="btn btn-outline-info fw-bold px-4">
            <i class="fa-solid fa-magnifying-glass"></i> Search
        </button>
        <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
            <a href="films.php" class="btn btn-outline-secondary">Clear</a>
        <?php endif; ?>
    </form>

    <a href="addfilm.php" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold">
        <i class="fa-solid fa-plus me-2"></i>Add New Film
    </a>
</div>

<div class="table-responsive rounded-4 overflow-hidden shadow">
    <table class="table table-dark table-hover align-middle m-0" style="background-color: #1e293b;">
        <thead class="table-secondary">
            <tr>
                <th class="px-4 py-3" style="color: #38bdf8 !important;">ID</th>
                <th class="px-4 py-3" style="color: #38bdf8 !important;">Film Name</th>
                <th class="px-4 py-3 text-center" style="color: #38bdf8 !important;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($films)): ?>
            <tr>
                <td colspan="3" class="text-center py-4 text-secondary">No films found.</td>
            </tr>
            <?php else: ?>
                <?php foreach ($films as $film): ?>
                <tr style="border-bottom: 1px solid #334155;">
                    <td class="px-4 py-3 text-secondary fw-bold">#<?=$film['id']?></td>
                    <td class="px-4 py-3 fw-bold text-white"><?=htmlspecialchars($film['film_name'], ENT_QUOTES, 'UTF-8')?></td>
                    <td class="px-4 py-3 text-center">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="editfilm.php?id=<?=$film['id']?>" class="btn btn-outline-warning btn-sm rounded-pill px-3">
                                <i class="fa-solid fa-pen"></i> Edit
                            </a>
                            <form action="deletefilm.php" method="post" class="d-inline" onsubmit="return confirm('Delete this film?')">
                                <input type="hidden" name="id" value="<?=$film['id']?>">
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>