<?php include('components/header.php'); ?>
<p class="lead">This is esercente <?php var_dump($_GET); ?></p>
<?php $esercente = returnDBObject("SELECT * FROM datatype_esercenti WHERE slug=?", [$_GET['slug']]); ?>
<?php var_dump($esercente); ?>
<?php include('components/footer.php'); ?>