<!DOCTYPE html>
<html lang="<?= $this->e(config('app.lang')) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorization</title>
    <link rel="stylesheet" href="<?= url('/css/bootstrap.min.css') ?>">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="h4">Authorization</h1>
                </div>
                <div class="card-body">

                    <?php $this->insert('components/flashMessage'); ?>

                    <form method="post" action="<?= url('/login') ?>">
                        <input type="hidden" name="csrf_token" value="<?= $csrf ?>">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" name="username" class="form-control" value="<?= isset($oldData['username']) ? $this->e($oldData['username']) : '' ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" value="<?= isset($oldData['password']) ? $this->e($oldData['password']) : '' ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= url('/js/bootstrap.min.js') ?>"></script>
</body>
</html>