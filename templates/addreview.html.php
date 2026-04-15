<form action="" method="post" enctype="multipart/form-data" class="review-form">
    <div class="mb-3">
        <label for='text' class="form-label">Type your review here:</label>
        <textarea name="text" id="text" rows="3" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Select image:</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <div class="mb-3">
        <label for="reviewers" class="form-label">Reviewer:</label>
        <select name="reviewers" id="reviewers" class="form-select" required>
            <option value="">--Select a reviewer--</option>
            <?php foreach ($reviewers as $reviewer): ?>
                <option value="<?=htmlspecialchars($reviewer['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?=htmlspecialchars($reviewer['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="films" class="form-label">Film:</label>
        <select name="films" id="films" class="form-select" required>
            <option value="">--Select a film--</option>
            <?php foreach ($films as $film): ?>
                <option value="<?=htmlspecialchars($film['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?=htmlspecialchars($film['film_name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>   

    <div class="mb-4">
        <label for="rating" class="form-label fw-bold" style="color: #38bdf8;">Rating (1-5 Stars):</label>
        <select name="rating" id="rating" class="form-select text-white" style="background-color: #1e293b; border: 1px solid #334155;" required>
            <option value="5">⭐⭐⭐⭐⭐ (5/5) - Excellent</option>
            <option value="4">⭐⭐⭐⭐ (4/5) - Good</option>
            <option value="3">⭐⭐⭐ (3/5) - Average</option>
            <option value="2">⭐⭐ (2/5) - Poor</option>
            <option value="1">⭐ (1/5) - Terrible</option>
        </select>
    </div>

    <button type="submit" name="submit" class="btn btn-primary px-4 fw-bold">Post Review</button>
</form>