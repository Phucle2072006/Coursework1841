<h2 class="text-neon mb-4" style="color: #fbbf24 !important;">Edit Movie Review</h2>

<form action="" method="post" enctype="multipart/form-data" class="bg-dark-custom p-4 rounded-4 shadow">
    <input type="hidden" name="id" value="<?=$review['id']?>">

    <div class="mb-3">
        <label for="text" class="form-label text-primary fw-bold">Edit your review here:</label>
        <textarea name="text" id="text" rows="3" class="form-control bg-dark text-white border-secondary"><?=htmlspecialchars($review['text'], ENT_QUOTES, 'UTF-8')?></textarea>
    </div>

    <div class="mb-3">
        <label for="reviewers" class="form-label text-primary fw-bold">Reviewer:</label>
        <select name="reviewers" id="reviewers" class="form-select bg-dark text-white border-secondary">
            <?php foreach ($reviewers as $reviewer): ?>
                <option value="<?=$reviewer['id']?>" <?=($reviewer['id'] == $review['reviewerid']) ? 'selected' : ''?>>
                    <?=htmlspecialchars($reviewer['name'], ENT_QUOTES, 'UTF-8')?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-4">
        <label for="films" class="form-label text-primary fw-bold">Film:</label>
        <select name="films" id="films" class="form-select bg-dark text-white border-secondary">
            <?php foreach ($films as $film): ?>
                <option value="<?=$film['id']?>" <?=($film['id'] == $review['filmid']) ? 'selected' : ''?>>
                    <?=htmlspecialchars($film['film_name'], ENT_QUOTES, 'UTF-8')?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" name="submit" class="btn btn-warning rounded-pill px-4 fw-bold">Save changes</button>
</form>