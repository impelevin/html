<html lang="<?= $this->e(config('app.lang')) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e(isset($title) ? $title.' - ' : '') . config('app.name') ?></title>
    <link rel="stylesheet" href="<?= url('/css/bootstrap.min.css') ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= url() ?>"><?= $this->e(config('app.name')) ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= url() ?>">List</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= url('/create') ?>">Create</a>
                </li>

                <? if (isAuth()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('/logout') ?>">Sign out</a>
                    </li>
                <? else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('/login') ?>">Sign in</a>
                    </li>
                <? endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <main class="ms-sm-auto px-md-4">

        <? if (isset($title)): ?>
            <h1 class="mt-2"><?= $this->e($title) ?></h1>
        <? endif; ?>

        <?= $this->section('main') ?>

    </main>
</div>

<script src="<?= url('/js/bootstrap.min.js') ?>"></script>
</body>
</html>