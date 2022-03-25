


<?php $__env->startSection('container'); ?>
<div class="container d-flex justify-content-center vh-100">
    <div class="row align-items-center justify-content-center w-100">
        <div class="col-lg-5 col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="redactService">
                    <div class="card-title text-center">
                        <h3 class="mb-5" id="service" data-id="<?php echo e($service->id); ?>">Редактирай Услугата</h3>
                    </div>
                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Име на Услугата:</label>
                        <input name="name" type="name" name="trip-start" value="<?php echo e($service->name); ?>">
                    </div>

                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Времетраене на Услугата:</label>
                        <input name="duration" type="text" value="<?php echo e($service->duration); ?>" required>
                    </div>
                    
                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Цена:</label>
                        <input name="price" type="text" value="<?php echo e($service->price); ?>" required>
                    </div>

                    <div class="card-title text-left mb-4">
                        <label class="fs-4" for="start">Снимка</label>
                        <input name="picture_url" type="text" value="<?php echo e($service->picture); ?>" required>
                    </div>
                    
                    <div class="card-title text-left mb-4">
                      <button class="btn btn-success w-100" type="submit">Запази Редакцията</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(base_url()); ?>/js/redactService.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp 7.4\htdocs\views/admin/redactService.blade.php ENDPATH**/ ?>