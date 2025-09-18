<!-- Comments Section -->
<div id="comments-section">
    <h3>Laat een reactie achter</h3>

        <!-- Display Alerts -->
        <?php if (!empty($alerts)): ?>
            <div class="alerts">
                <?php foreach ($alerts as $alert): ?>
                    <p class="alert"><?= esc($alert) ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <!-- Display Success Message -->
        <?php if (!empty($success)): ?>
            <p class="success"><?= esc($success) ?></p>
        <?php endif ?>

        <!-- Comment Form -->
        <form action="<?= $page->url() ?>#comments" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <!-- <label for="name">Name:</label> -->
            <input type="text" id="name" name="name" placeholder="Naam" value="<?= esc($data['name'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <!-- <label for="email">Email:</label> -->
            <input type="email" id="email" name="email" placeholder="Email" value="<?= esc($data['email'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <!-- <label for="comment">Comment:</label> -->
            <textarea id="comment" name="comment" rows="5" placeholder="Reactie" required><?= esc($data['comment'] ?? '') ?></textarea>
          </div>
          <input type="submit" name="submit" value="Reageer" class="button">
        </form>

        <!-- Display Comments -->
        <div id="comments">
            <h2>Reacties</h2>
            <?php foreach ($site->comments()->toStructure()->flip() as $comment): ?>
                <?php if($comment->commentPublished()->toBool()): ?>
                <div class="comment">
                    <div class="name"><?= esc($comment->commentName()) ?></div>
                    <time><?= $comment->commentDate()->toDate('j F, Y, H:i') ?></time>
                    <div class="comment-content">
                        <p><?= esc($comment->commentContent()) ?></p>
                    </div>
                </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
</div>