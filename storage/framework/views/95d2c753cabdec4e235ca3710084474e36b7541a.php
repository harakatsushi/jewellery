<div class="box">
    <?php if(isset($title)): ?>
    <div class="box-header with-border">
        <h3 class="box-title"> <?php echo e($title, false); ?></h3>
    </div>
    <?php endif; ?>

    <?php if( ($grid->showTools() || $grid->showExportBtn() || $grid->showCreateBtn() ) &&( strpos( $_SERVER["REQUEST_URI"],'summary_parents' )===false && strpos( $_SERVER["REQUEST_URI"],'summary_children' )===false)): ?>
    <div class="box-header with-border">
        <div class="pull-right">
            <?php echo $grid->renderColumnSelector(); ?>

            <?php echo $grid->renderExportButton(); ?>

            <?php echo $grid->renderCreateButton(); ?>

        </div>
        <?php if( $grid->showTools() ): ?>
        <div class="pull-left">
            <?php echo $grid->renderHeaderTools(); ?>

        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <?php echo $grid->renderFilter(); ?>


    <?php echo $grid->renderHeader(); ?>


    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-hover" id="<?php echo e($grid->tableID, false); ?>">
            <thead>
                <tr>
                     <?php if( isset($_SERVER["REQUEST_URI"]) && strpos( $_SERVER["REQUEST_URI"],'summary_parents' )>0 ): ?>
                     <th >本部→排出事業者</th>
                   


                     <?php endif; ?>
                    <?php $__currentLoopData = $grid->visibleColumns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <?php if($column->getName()!=='__row_selector__' ): ?>
                    <th class="column-<?php echo $column->getName(); ?>"><?php echo e($column->getLabel(), false); ?><?php echo $column->renderHeader(); ?></th>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $grid->rows(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr <?php echo $row->getRowAttributes(); ?>>
                    <?php if( isset($_SERVER["REQUEST_URI"]) && strpos( $_SERVER["REQUEST_URI"],'summary_parents' )>0 ): ?>
                     <td ><a href="<?php echo e($_SERVER["REQUEST_URI"], false); ?>/excel/?code=<?php echo e($row->column('code'), false); ?>&date=<?php echo e($row->column('recv_date'), false); ?>" target="_blank">請求書ダウンロード</a></td>
                     
                      <?php endif; ?>
                    <?php $__currentLoopData = $grid->visibleColumnNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($name!=='__row_selector__' ): ?>
                    <td <?php echo $row->getColumnAttributes($name); ?> class="column-<?php echo $name; ?>">
                         <?php if( isset($_SERVER["REQUEST_URI"]) && strpos( $_SERVER["REQUEST_URI"],'summary_parents' )>0 && $name==='code'): ?>
                         <?=\App\Emission::where("code",$row->column($name))->value('name') ?>
                         <a href="/admin/summary_children?code=<?=$row->column($name)?>&date=<?=$row->column('recv_date')?>">詳細</a>
                         <?php elseif( isset($_SERVER["REQUEST_URI"]) && strpos( $_SERVER["REQUEST_URI"],'summary_parents' )>0 && $name==='__actions__'): ?>
                         <?php elseif( isset($_SERVER["REQUEST_URI"]) && strpos( $_SERVER["REQUEST_URI"],'summary_children' )>0 && $name==='__actions__'): ?>
                         <?php else: ?>
                         <?php echo $row->column($name); ?>

                         <?php endif; ?>
                    </td>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

            <?php echo $grid->renderTotalRow(); ?>


        </table>

    </div>

    <?php echo $grid->renderFooter(); ?>


    <div class="box-footer clearfix">
        <?php echo $grid->paginator(); ?>

    </div>
    <!-- /.box-body -->
</div>
<?php /**PATH /var/www/html/resources/views/laravel-admin/grid/table.blade.php ENDPATH**/ ?>