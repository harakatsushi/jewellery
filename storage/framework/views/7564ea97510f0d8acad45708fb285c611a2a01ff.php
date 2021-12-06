<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row justify-content-left">
       <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/invoice/excel">
                        <?php echo csrf_field(); ?>

                         <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">日付</label>
                            <div class="col-md-6">
                              <input type="date" class="form-control" id="created_at_start" placeholder="登録日時" name="from" value="<?php echo e($from, false); ?>">
                            <span class="input-group-addon" style="border-left: 0; border-right: 0;">-</span>
                            <input type="date" class="form-control" id="created_at_end" placeholder="登録日時" name="to" value="<?php echo e($to, false); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   ダウンロード
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
        <br>
        

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/invoice/index.blade.php ENDPATH**/ ?>