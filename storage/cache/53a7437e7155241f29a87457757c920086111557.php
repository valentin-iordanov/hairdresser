

<?php $__env->startSection('container'); ?>

    
<div class="container-fluid calendar_container">
    <div class="row mt-5">
        <div class="col " style="height: 100px;">
              <table style="border: transparent;" class="table table-bordered">
                  <tr class="text-center">
                      <th id="moveLeft" class="display-3 text-center"><img class="moveLeft" src="<?php echo e(base_url()); ?>/img/left arrow_4420661.png" alt="<"></th>
                      <td>
                          <h1 class="display-5 m-0">Date</h1>
                          <p id="date" class="fs-4">1-2-2022</p>
                      </td>
                      <th id="moveRight" class="display-3 text-center"><img class="moveRight" src="<?php echo e(base_url()); ?>/img/right arrow_4420662.png" alt=">"></th>
                  </tr>
              </table>
        </div>
    </div>
    <div class="row">
          <div class="col">
              <table class="table table-bordered text-center">
                  <tbody id="calendar">
                      <tr id="day">
                      <th>Понеделник</th>
                      <th>Вторник</th>
                      <th>Сряда</th>
                      <th>Четвъртък</th>
                      <th>Петък</th>
                      <th>Събота</th>
                      <th>Неделя</th>
                  </tr>
                  </tbody>
              </table>
          </div>
    </div>
</div>

<script src="<?php echo e(base_url()); ?>/js/calendar.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp 7.4\htdocs\views/admin/home.blade.php ENDPATH**/ ?>