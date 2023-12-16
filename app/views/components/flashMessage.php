<?php $flash = flashMessage(); ?>

<? if ($flash): ?>
    <div class="alert alert-<?= $this->e($flash['type']) ?> alert-dismissible fade show" role="alert">
        <p><?= $this->e($flash['message']) ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<? endif; ?>
