<header>
    <?php if ($image = $site->header_image()->toFile()): ?>
    <img src="<?= $image->url() ?>" alt="<?= $image->alt()->or('Site image') ?>">
    <?php endif ?>
    <h1><?= $site->title() ?></h1>
    <h2><?= $site->subtitle() ?></h2>
    <h3><?= $site->intro() ?></h3>
        <div class="buttons">
        <?php foreach ($site->sections()->toStructure() as $section): ?>
        
        <a class="button" href="#<?= $section->id_name() ?>">
                <?= $section->section_header() ?>
            </a>

        <?php endforeach ?>
        </div>
    <!-- <hr> -->
</header>