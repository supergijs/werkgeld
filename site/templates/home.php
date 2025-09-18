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
        <?php if ($section->sub_sections()->isNotEmpty()): ?>
        <!-- Sub Sections -->
        <div class="sub-sections">
        <?php foreach ($section->sub_sections()->toStructure() as $sub_section): ?>
            <details class="sub-section">
                <summary><?= $sub_section->sub_section_header() ?></summary>
                <p><?= $sub_section->sub_section_body()->kt() ?></p>
            </details>
        <?php endforeach ?>
        </div>
        <?php endif ?>
        <!-- Extra Content -->
        <?php if ($section->extra_content()->isNotEmpty()): ?>
          <br>
          <div class="extra-content">
            <p><?= $section->extra_content()->kt() ?></p>
          </div>
        <?php endif ?>
    </section>
    <?php endforeach ?>

    <!-- Comments -->
    <?php if ($site->enable_comments()->toBool()): ?>
        <?php snippet('comments') ?>
    <?php endif ?>
</main>

<!-- Footer -->
<?php snippet('footer') ?>
