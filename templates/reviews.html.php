<div class="mb-4 d-flex justify-content-between align-items-center">
    <h2 class="text-white fw-bold">Recent Film Reviews</h2>
    <p class="badge bg-primary rounded-pill p-2 px-3 shadow-sm" style="font-size: 1em;">
        <i class="fa-solid fa-database me-2"></i><?=$totalReviews?> reviews submitted
    </p>
</div>

<?php foreach ($reviews as $review): ?>
<blockquote style="background-color: #1e293b; color: #f8fafc; border-radius: 16px; padding: 25px; margin-bottom: 30px; border-left: 6px solid #38bdf8; box-shadow: 0 15px 25px rgba(0,0,0,0.4); display: flex; gap: 25px; align-items: flex-start; border: 1px solid #334155;">
    
    <?php if (!empty($review['image'])): ?>
    <div style="flex-shrink: 0;">
        <img src="images/<?=htmlspecialchars($review['image'], ENT_QUOTES, 'UTF-8')?>" 
             alt="Film Poster" 
             style="width: 150px; height: 220px; object-fit: cover; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.6); border: 2px solid #38bdf8;">
    </div>
    <?php else: ?>
    <div style="width: 150px; height: 220px; background-color: #0f172a; border-radius: 12px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed #334155;">
        <i class="fa-solid fa-image text-secondary mb-2" style="font-size: 2em;"></i>
        <span style="color: #64748b; font-size: 0.8em; font-weight: bold;">No Poster</span>
    </div>
    <?php endif; ?>

    <div style="flex-grow: 1;">
        <div class="mb-3">
            <span class="text-uppercase tracking-wider text-secondary fw-bold" style="font-size: 0.75em; letter-spacing: 1px;">Review Content</span>
            
            <div class="mt-1 mb-2 d-flex align-items-center gap-1">
                <?php
                $rating = $review['rating'] ?? 5; // Mặc định 5 sao nếu chưa có dữ liệu
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo '<i class="fa-solid fa-star" style="color: #fbbf24; font-size: 1.1em; text-shadow: 0 0 5px rgba(251, 191, 36, 0.4);"></i>';
                    } else {
                        echo '<i class="fa-solid fa-star" style="color: #475569; font-size: 1.1em;"></i>';
                    }
                }
                ?>
                <span class="ms-2 fw-bold" style="color: #fbbf24; font-size: 0.9em;"><?=$rating?>.0</span>
            </div>
            <p style="font-size: 1.15em; color: #f1f5f9; line-height: 1.6; margin-top: 5px;">
                <?=htmlspecialchars($review['text'] ?? '', ENT_QUOTES, 'UTF-8')?>
            </p>
        </div>
        
        <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
            <div>
                <span class="text-secondary small d-block">Film Title:</span>
                <strong style="color: #00f2ff; font-size: 1.2em; text-shadow: 0 0 10px rgba(0, 242, 255, 0.2);">
                    <?=htmlspecialchars($review['film_name'] ?? 'General', ENT_QUOTES, 'UTF-8')?>
                </strong>
            </div>
            <div class="border-start border-secondary ps-3">
                <span class="text-secondary small d-block">Written by:</span>
                <a href="mailto:<?=htmlspecialchars($review['email'] ?? '', ENT_QUOTES, 'UTF-8');?>" class="text-info text-decoration-none fw-bold">
                    <i class="fa-solid fa-user-ninja me-1" style="font-size: 0.9em;"></i><?=htmlspecialchars($review['name'] ?? 'Unknown', ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </div>
        </div>

        <div class="d-flex gap-2 align-items-center border-top border-secondary pt-3 mt-2">
            <a href="editreview.php?id=<?=$review['id']?>" class="btn btn-outline-warning btn-sm rounded-pill px-4 fw-bold">
                <i class="fa-solid fa-pen-to-square me-1"></i>Edit Review
            </a>
            
            <form action="deletereview.php" method="post" style="margin: 0;" onsubmit="return confirm('Delete this review permanently?')">
                <input type="hidden" name="id" value="<?=$review['id']?>">
                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-4 fw-bold">
                    <i class="fa-solid fa-trash-can me-1"></i>Delete
                </button>
            </form>
        </div>
    </div>
</blockquote>
<?php endforeach; ?>

<?php if (isset($totalPages) && $totalPages > 1): ?>
<nav aria-label="Page navigation" class="mt-5 mb-4">
    <ul class="pagination justify-content-center" data-bs-theme="dark">
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link fw-bold" href="?page=<?= $page - 1 ?>" style="background-color: #1e293b; color: #38bdf8; border-color: #334155;">Previous</a>
        </li>
        
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link fw-bold" href="?page=<?= $i ?>" style="<?= ($i == $page) ? 'background-color: #38bdf8; color: #0f172a; border-color: #38bdf8;' : 'background-color: #1e293b; color: #f8fafc; border-color: #334155;' ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        
        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link fw-bold" href="?page=<?= $page + 1 ?>" style="background-color: #1e293b; color: #38bdf8; border-color: #334155;">Next</a>
        </li>
    </ul>
</nav>
<?php endif; ?>