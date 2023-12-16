<?php $this->layout('layout'); ?>

<?php $this->start('main'); ?>

<?php $this->insert('components/flashMessage'); ?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">
            <?php $this->insert('components/orderLink', ['params' => $tasks['params'], 'label' => 'Status', 'column' => 'complated']); ?>
        </th>
        <th scope="col">
            <?php $this->insert('components/orderLink', ['params' => $tasks['params'], 'label' => 'Username', 'column' => 'username']); ?>
        </th>
        <th scope="col">
            <?php $this->insert('components/orderLink', ['params' => $tasks['params'], 'label' => 'Email', 'column' => 'email']); ?>
        </th>
        <th scope="col">Task</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($tasks['items'] as $task): ?>
        <tr>
            <td>
                <?= $task['complated'] ? 'Complated' : 'Pending' ?>
                <?= $task['description_updated'] ? '(edited by the admin)' : '' ?>
            </td>
            <td><?= $this->e($task['username']) ?></td>
            <td><?= $this->e($task['email']) ?></td>
            <td><?= $this->e($task['description']) ?></td>
            <td><a href="<?= url('/'.$task['id']) ?>" class="btn btn-sm btn-primary">View</a></td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>

<?php $this->insert('components/paginate', ['links' => $tasks['links']]); ?>

<?php $this->stop('main'); ?>
