<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale'), false); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    <title>請求書</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php if(!is_null($favicon = Admin::favicon())): ?>
    <link rel="shortcut icon" href="<?php echo e($favicon, false); ?>">
    <?php endif; ?>

    <?php echo Admin::css(); ?>


    <script src="<?php echo e(Admin::jQuery(), false); ?>"></script>
    <?php echo Admin::headerJs(); ?>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition <?php echo e(config('admin.skin'), false); ?> <?php echo e(join(' ', config('admin.layout')), false); ?>">
<div class="wrapper">

    <?php echo $__env->make('admin::partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin::partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content-wrapper" id="pjax-container">
        <?php echo Admin::style(); ?>

        <div id="app">

    <form action="/admin/invoice/excel" class="form-horizontal"  method="post">

 <?php echo e(csrf_field(), false); ?>

                        <div class="col-md-12">
                <div class="box-body">
                    <div class="fields-group">
                                                    <div class="form-group">
    <label class="col-sm-2 control-label"> 出力対象</label>
    <div class="col-sm-8">
        <div class="input-group input-group-sm">
            <div class="input-group-addon">
            <i class="fa fa-pencil"></i>
        </div>
        <select name="target"  class="form-control">
            <option value="1">全て</option>
            <option value="2">本部→排出事業者</option>
            <option value="3">本部→加盟店</option>
        </select>
</div>    </div>
</div>
    <div class="form-group">
    <label class="col-sm-2 control-label">日時</label>
    <div class="col-sm-8" style="width: 390px">
        <div class="input-group input-group-sm">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
             <input type="date" class="form-control" id="created_at_start" placeholder="登録日時" name="from" value="<?php echo e($from, false); ?>">
            <span class="input-group-addon" style="border-left: 0; border-right: 0;">-</span>
            <input type="date" class="form-control" id="created_at_end" placeholder="登録日時" name="to" value="<?php echo e($to, false); ?>">
        </div>
    </div>
</div>
    <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-8" style="width: 390px">
        <div class="input-group input-group-sm">
         <input type="submit" class="form-control" id="created_at_end" value="取得" >
        </div>
    </div>
</div>
        </div></div></div></div></div>
        <?php echo Admin::script(); ?>

    </div>

    <?php echo $__env->make('admin::partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<?php echo Admin::html(); ?>


<button id="totop" title="Go to top" style="display: none;"><i class="fa fa-chevron-up"></i></button>

<script>
    function LA() {}
    LA.token = "<?php echo e(csrf_token(), false); ?>";
</script>

<!-- REQUIRED JS SCRIPTS -->
<?php echo Admin::js(); ?>


</body>
</html>
<?php /**PATH /var/www/html/resources/views/laravel-admin/invoice.blade.php ENDPATH**/ ?>