<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row justify-content-left">
       <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                   
                         <button type="button" class="btn btn-primary" onclick="location.href='/acquisitions/reg'">
                                   新規作成
                        </button><br><br>
                         <button type="button" class="btn btn-primary" onclick="location.href='/acquisitions/list/1'">
                                   後確管理
                        </button><br><br>
                         <button type="button" class="btn btn-primary" onclick="location.href='/acquisitions/list/2'">
                                   エントリー管理
                        </button><br><br>
                         <button type="button" class="btn btn-primary" onclick="location.href='/acquisitions/list/3'">
                                   獲得者管理(権限3)
                        </button><br><br>
                         <button type="button" class="btn btn-primary" onclick="location.href='/acquisitions/list/4'">
                                   獲得者管理(権限4)
                        </button>
                </div>
            </div>
        </div> 
        <br>
        

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/acquisition/index.blade.php ENDPATH**/ ?>