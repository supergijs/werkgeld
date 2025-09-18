<header>
    <?php if ($image = $site->header_image()->toFile()): ?>
        <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
        <?php endif ?>
    <h1><?= $site->title() ?></h1>
    <h2><?= $site->subtitle() ?></h2>
    <h3><?= $site->intro() ?></h3>
    <!-- <hr> -->
</header>