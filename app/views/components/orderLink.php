<?php
    $selected = $params['order']['col'] === $column;
    $status = $selected ? !$params['order']['status'] : false;
?>

<a href="<?= url('/', ['order_col' => $column, 'order_status' => $status, 'page' => $params['current_page']]) ?>">
    <?= $this->e($label) ?> <?= $selected ? '('.($status ? 'up' : 'down').')' : '' ?>
</a>
