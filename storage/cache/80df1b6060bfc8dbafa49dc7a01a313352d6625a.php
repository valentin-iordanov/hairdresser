<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(base_url()); ?>/bootstrap/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(base_url()); ?>/css/style.css">
    <title>Document</title>
</head>
<body id='body'>
<nav class="navbar navbar-expand navbar-dark nav_style">
    <div class="container">
      <a class="navbar-brand" href="/">Site</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">График</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/savehour">Запази час</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/servicesView">Услуги</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/servicesAdd">Добави Услуга</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="logout" href="">Излез</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="<?php echo e(base_url()); ?>/js/logout.js"></script>

  <?php echo $__env->yieldContent('container'); ?>

  <script src="<?php echo e(base_url()); ?>/bootstrap/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo e(base_url()); ?>/bootstrap/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  
  </body>
</html><?php /**PATH D:\xamp 7.4\htdocs\views/layout/admin.blade.php ENDPATH**/ ?>