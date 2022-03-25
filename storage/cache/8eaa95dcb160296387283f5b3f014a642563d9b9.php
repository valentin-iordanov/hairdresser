    
    
    
    <?php $__env->startSection('container'); ?>
           <div class="container d-flex justify-content-center vh-100">
        <div class="row align-items-center justify-content-center w-100">
            <div class="col-lg-5 col-md-8">
                <div class="col text-center mb-5">
                    <h1 class="text-primary display-3 fw-bolder">Register</h1>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <p class="card-text fs-4 fw-bolder mb-0">Create a new account</p>
                            <p class="card-text text-muted mb-4">it's quick and easy.</p>
                        </div>
                        <form id="register">
                            <div class="mb-4">
                                <input type="text" name="email" class="form-control was-validated" placeholder="Email" required>
                            </div>
                            <div class="mb-4">
                                <input type="text" name="username" class="form-control " placeholder="Username" required>
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password" class="form-control " placeholder="Password" required>
                            </div>
                            <div class="mb-4">
                                <input id="repeat_password" type="password" name="repeat_password" class="form-control" placeholder="Reapat Password" required>
                            </div>
                            <div class="text-center">
                                <button class="btn fs-4 btn-success w-50" type="submit">Sing in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(base_url()); ?>/js/register.js"></script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp 7.4\htdocs\views/guest/register.blade.php ENDPATH**/ ?>