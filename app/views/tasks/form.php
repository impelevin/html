<?php $this->layout('layout', ['title' => $title]); ?>

<?php $this->start('main'); ?>

<?php $this->insert('components/flashMessage'); ?>

<?php
    $hasEdit = (isset($data['id']) && isAuth()) || empty($data['id']);
?>

<form method="post" action="<?= empty($data['id']) ? url('/create') : url('/'.$data['id'].'/update') ?>">

    <input type="hidden" name="csrf_token" value="<?= $csrf ?>">

    <? if (isset($data['id'])): ?>

        <? if (isset($data['description_updated'])): ?>
            <div class="mb-3">(edited by the admin)</div>
        <? endif; ?>

        <div class="mb-3 form-check">
            <input class="form-check-input" <? if (!$hasEdit): ?> disabled <? endif; ?> type="checkbox" id="complated" name="complated" <? if (isset($data['complated'])): ?> checked <? endif; ?>>
            <label class="form-check-label" for="complated">
                Complated
            </label>
        </div>
    <? endif; ?>

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" <? if (!$hasEdit): ?> disabled <? endif; ?> id="username" name="username" value="<?= isset($data['username']) ? $this->e($data['username']) : '' ?>">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" <? if (!$hasEdit): ?> disabled <? endif; ?> id="email" name="email" value="<?= isset($data['email']) ? $this->e($data['email']) : '' ?>">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" <? if (!$hasEdit): ?> disabled <? endif; ?> id="description" name="description" rows="4"><?= isset($data['description']) ? $this->e($data['description']) : '' ?></textarea>
    </div>

    <? if ($hasEdit): ?>
        <button type="submit" class="btn btn-primary"><?= isset($data['id']) ? 'Update' : 'Create' ?></button>
    <? endif; ?>
</form>

<?php $this->stop('main'); ?>
