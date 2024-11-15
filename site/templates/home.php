<?php snippet('meta') ?>

<!-- Header -->
<?php snippet('header') ?>

<!-- Nav -->
<?php snippet('menu') ?>



<!-- Main -->
<main>
    <!-- Sections -->
    <?php foreach ($site->sections()->toStructure() as $section): ?>
    <section id="<?= $section->id_name() ?>">
        <h2><?= $section->section_header() ?></h2>
        <p><?= $section->section_body()->kt() ?></p>
        <?php if($image = $section->section_image()->toFile()): ?>
            <img src="<?= $image->url() ?>" alt="Section Image">
        <?php endif ?>
        <!-- <hr> -->
    </section>
    <?php endforeach ?>

    <!-- Comments -->
    <?php if ($site->enable_comments()->toBool()): ?>
        <?php snippet('comments') ?>
    <?php endif ?>
</main>

<!-- Footer -->
<?php snippet('footer') ?>
