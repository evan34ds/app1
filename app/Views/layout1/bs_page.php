<?php
$pager->setSurroundCount(2);
?>
<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination">
        <?php foreach ($pager->links() as $hal) : ?>
            <li <?= $hal['active'] ? 'class="active page-item"' : 'class="page-item"' ?>>
                <a href="<?= $hal['uri'] ?>" class="page-link">
                    <?= $hal['title'] ?>
                </a>
            </li>
        <?php endforeach ?>        
    </ul>
</nav>