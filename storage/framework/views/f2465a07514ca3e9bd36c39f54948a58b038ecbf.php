<?php if($paginator->hasPages()): ?>
    <ul>
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="active">
                <a  href="<?php echo e($paginator->previousPageUrl(), false); ?>">&laquo;</a>
            </li>
        <?php else: ?>
            <li >
                <a  href="<?php echo e($paginator->previousPageUrl(), false); ?>">&laquo;</a>
            </li>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li ><?php echo e($element, false); ?></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="active" ><a  href="<?php echo e($url, false); ?>"><?php echo e($page, false); ?></a></li>
                    <?php else: ?>
                        <li><a  href="<?php echo e($url, false); ?>"><?php echo e($page, false); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li  class="active">
                <a  href="<?php echo e($paginator->nextPageUrl(), false); ?>">&raquo;</a>
            </li>
        <?php else: ?>
            <li class="active">
                <a  href="<?php echo e($paginator->nextPageUrl(), false); ?>">&raquo;</a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php /**PATH /home/raindiamond/ai-jewelly.com/vendor/laravel/framework/src/Illuminate/Pagination/resources/views/bootstrap-4.blade.php ENDPATH**/ ?>