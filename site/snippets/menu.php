    <nav>
    <a href="#"><?= $site->title() ?></a>
    <ul>
        <?php foreach ($site->sections()->toStructure() as $section): ?>
        <li> 
            <a href="#<?= $section->id_name() ?>">
                <?= $section->section_header() ?>
            </a>
        </li>
        <?php endforeach ?>
    </ul>    
    </nav>
    
    <!-- Language Toggle -->
    <div class="language-toggle">
        <?php foreach ($kirby->languages() as $language): ?>
            <?php if ($language->code() !== $kirby->language()->code()): ?>
                <a href="<?= $language->url() ?>" class="language-link">
                    <?= strtoupper($language->code()) ?>
                </a>
            <?php else: ?>
                <span class="language-current"><?= strtoupper($language->code()) ?></span>
            <?php endif ?>
        <?php endforeach ?>
    </div>