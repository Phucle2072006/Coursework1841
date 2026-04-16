<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-white fw-bold"><i class="fa-solid fa-inbox me-2"></i>Contact Messages</h2>
</div>

<div class="table-responsive rounded-4 shadow">
    <table class="table table-dark table-hover align-middle m-0" style="background-color: #1e293b;">
        <thead class="table-secondary">
            <tr>
                <th class="px-4 py-3" style="color: #38bdf8 !important; width: 10%;">ID</th>
                <th class="px-4 py-3" style="color: #38bdf8 !important; width: 70%;">Content</th>
                <th class="px-4 py-3 text-center" style="color: #38bdf8 !important; width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($messages)): ?>
            <tr>
                <td colspan="3" class="text-center py-5 text-secondary">No messages found.</td>
            </tr>
            <?php else: ?>
                <?php foreach ($messages as $msg): ?>
                <tr style="border-bottom: 1px solid #334155;">
                    <td class="px-4 py-3 text-secondary fw-bold">#<?=$msg['id']?></td>
                    <td class="px-4 py-3">
                        <div class="text-white mb-1">
                            <span class="text-primary fw-bold">Email:</span> <?=htmlspecialchars($msg['email'], ENT_QUOTES, 'UTF-8')?>
                        </div>
                        <div class="text-secondary">
                            <span class="text-primary fw-bold">Message:</span> <?=nl2br(htmlspecialchars($msg['message'], ENT_QUOTES, 'UTF-8'))?>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <form action="deletemessage.php" method="post" class="d-inline" onsubmit="return confirm('Delete this message?')">
                            <input type="hidden" name="id" value="<?=$msg['id']?>">
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-4 fw-bold shadow-sm">
                                <i class="fa-solid fa-trash me-2"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>