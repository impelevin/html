<nav aria-label="Page navigation">
    <ul class="pagination">
        <? foreach ($links as $link): ?>
        <li class="page-item <? if ($link['active']): ?> active <? endif; ?>">
            <a class="page-link" href="<?= $this->e($link['url']) ?>"><?= $this->e($link['label']) ?></a>
        </li>
        <? endforeach; ?>
    </ul>
</nav>