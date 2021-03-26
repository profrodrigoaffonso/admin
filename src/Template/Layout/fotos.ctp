<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Fotos</title>
    <?= $this->Html->css('bootstrap.min.css') ?>
</head>
<body>

    <div class="container">
        <?= $this->fetch('content') ?>
    </div>

</body>
</html>
<?= $this->Html->script('jquery-3.6.0.min.js')?>
<?= $this->Html->script('bootstrap.min.js')?>