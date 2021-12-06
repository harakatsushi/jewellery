<div class="form-group">
    <label class="col-sm-2 control-label"><?php echo e($label, false); ?></label>
    <div class="col-sm-8" style="width: 390px">
        <div class="input-group input-group-sm">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
                    <?php
         $value['start']=date("Y-m")."-01 00:00:00";
         $value['end']=date("Y-m-t")." 23:59:59";
        ?>
            <input type="text" class="form-control" id="<?php echo e($id['start'], false); ?>" placeholder="<?php echo e($label, false); ?>" name="<?php echo e($name['start'], false); ?>" value="<?php echo e(request($name['start'], \Illuminate\Support\Arr::get($value, 'start')), false); ?>">
            <span class="input-group-addon" style="border-left: 0; border-right: 0;">-</span>
            <input type="text" class="form-control" id="<?php echo e($id['end'], false); ?>" placeholder="<?php echo e($label, false); ?>" name="<?php echo e($name['end'], false); ?>" value="<?php echo e(request($name['end'], \Illuminate\Support\Arr::get($value, 'end')), false); ?>">
        </div>
    </div>
</div><?php /**PATH /var/www/html/resources/views/laravel-admin/filter/betweenDatetime.blade.php ENDPATH**/ ?>