<div class="<?php echo e($viewClass['form-group'], false); ?> <?php echo !$errors->has($errorKey) ? '' : 'has-error'; ?>"> 

    <label for="<?php echo e($id, false); ?>" class="<?php echo e($viewClass['label'], false); ?> control-label"><?php echo e($label, false); ?></label>

    <div class="<?php echo e($viewClass['field'], false); ?>">

        <?php echo $__env->make('admin::form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="input-group">

            <?php if($prepend): ?>
            <span class="input-group-addon"><?php echo $prepend; ?></span>
            <?php endif; ?>

            <input <?php echo $attributes; ?> <?php if($name=="type"): ?> list="items"<?php elseif($name=="packing"): ?> list="items2"<?php endif; ?>/>
             <?php if($name=="type"): ?>
             <?php

                $wastes_tmp=\App\Waste::get();
                // print_r($wastes_tmp);
                $wastes=[];
                foreach ($wastes_tmp as $key => $value) {
                     $wastes[]=$value->name;
                }

             ?>
                <datalist id="items">
                   <?php $__currentLoopData = $wastes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($val, false); ?>">
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </datalist>
             <?php elseif($name=="packing"): ?>
             <?php

                $wastes_tmp=\App\Packing::get();
                // print_r($wastes_tmp);
                $wastes=[];
                foreach ($wastes_tmp as $key => $value) {
                     $wastes[]=$value->name;
                }

             ?>
                <datalist id="items2">
                   <?php $__currentLoopData = $wastes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($val, false); ?>">
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </datalist>
             <?php endif; ?>
            <?php if($append): ?>
                <span class="input-group-addon clearfix"><?php echo $append; ?></span>
            <?php endif; ?>

        </div>

        <?php echo $__env->make('admin::form.help-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
</div><?php /**PATH /var/www/html/resources/views/laravel-admin/form/input.blade.php ENDPATH**/ ?>