    <nav>
    <a href="#">WERKBANK</a>
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