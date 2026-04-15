<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white fw-bold">Manage Admin List</h2>
    
    <a href="addreviewer.php" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold">
        <i class="fa-solid fa-plus me-2"></i>Add New Admin
    </a>
</div>

<div class="table-responsive rounded-4 overflow-hidden shadow">
    <table class="table table-dark table-hover table-striped-columns align-middle m-0" style="background-color: #1e293b;">
        <thead class="table-secondary">
            <tr>
                <th class="px-4 py-3" style="color: #38bdf8 !important;">Admin ID</th>
                <th class="px-4 py-3" style="color: #38bdf8 !important;">Admin Name</th>
                <th class="px-4 py-3 text-center" style="color: #38bdf8 !important;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviewers as $reviewer): ?>
            <tr style="border-bottom: 1px solid #334155;">
                <td class="px-4 py-3 text-secondary fw-bold">#<?=$reviewer['id']?></td>
                <td class="px-4 py-3 fw-bold text-white"><?=htmlspecialchars($reviewer['name'], ENT_QUOTES, 'UTF-8')?></td>
                
                <td class="px-4 py-3 text-center">
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="editreviewer.php?id=<?=$reviewer['id']?>" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-bold">
                            <i class="fa-solid fa-pen-to-square me-1"></i>Edit Admin
                        </a>

                        <form action="deletereviewer.php" method="post" style="display:inline;" onsubmit="return confirm('Do you really want to delete this admin? This cannot be undone.')">
                            <input type="hidden" name="id" value="<?=$reviewer['id']?>">
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-bold">
                                <i class="fa-solid fa-trash me-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>