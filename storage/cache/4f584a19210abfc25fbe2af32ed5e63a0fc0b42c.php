


<?php $__env->startSection('container'); ?>
<div class="container-fluid">
    <div class="row mt-5 d-flex justify-content-center gap-4">
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id='<?php echo e($service["id"]); ?>' class="col-xl-4 col-md-6 col-sm-12 card p-0 text-center">
            <img class="card-img-top" src='<?php echo e($service["picture"]); ?>' alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($service["name"]); ?></h5>
                <p class="card-text">Цена за Услугата:<?php echo e($service["price"]); ?>лв</p>
                <p class="card-text">Време за Услугата:<?php echo e($service["duration"]); ?></p>
                <a href="/service/redact/<?php echo e($service['id']); ?>" class="btn btn-primary">Редактирай</a>
                <button data-id="<?php echo e($service['id']); ?>" class="btn btn-primary deleteBtn">Изтрии</button>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<script src="<?php echo e(base_url()); ?>/js/serviceView.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp 7.4\htdocs\views/admin/servicesView.blade.php ENDPATH**/ ?>