<!doctype html>
<html lang="en">
<head>
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="row align-items-start">
        <div class="col-sm">
            <div class="alert alert-primary" role="alert">
                This is a primary alert—check it out!<?= $this->Flash->render() ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <?= $this->element('pc_bootstrap_nav');?>
        </div>
        <div class="col-sm">
            <div class="alert alert-primary" role="alert">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <div class="row align-items-end">
        <div class="col-sm">
            <div class="alert alert-primary" role="alert">
                This is a primary alert—check it out!
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>© Company 2017</p>
    </footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>