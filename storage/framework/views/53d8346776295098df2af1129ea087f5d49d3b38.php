<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row justify-content-left">
      <div class="col-md-8">
            <div class="card">
                <?php if(Auth::guard('web')->user()->role==1): ?>
                <div class="card-header">CSVダウンロード

            
                </div>
                <div class="card-body">
                    <form method="POST" action="/csv_download" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="col-md-6">
                                申込日<br>
                                FROM<input id="application_at1" type="date" class="form-control <?php if ($errors->has('file')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('file'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="application_at1"    autofocus>
                                TO<input id="application_at2" type="date" class="form-control <?php if ($errors->has('file')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('file'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="application_at2"    >
                    
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    CSVダウンロード
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
                <div class="card-header">CSVアップロード

            
                </div>
                <div class="card-body">
                    <form method="POST" action="/csv_upload" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                                    <?php if(Session::has('message')): ?>
                                <div class="alert alert-danger">
                                        <strong><?php echo e(Session('message'), false); ?></strong>
                                    </div>
                                <?php endif; ?>
                        <div class="form-group row">


                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control <?php if ($errors->has('file')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('file'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="file"  required  >

                    
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    CSV アップロード
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="card-header">補足</div>

                <div class="card-body">

                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <ul>
                            <li>必ずテンプレートを使用してください</li>
                            <li>列の位置は使いやすいように編集してOKです</li>
                            <li>拠点・支払い方法・申込プラン・申込OPは下記の「登録済みの項目」にあるものを記入してください</li>
                            <li>アップロード後「ステータス」「対応ステータス」は未設定の状態になります</li>
                            <li>決済・決済不備は、1を記入するとフラグONになります</li>
                            <li>日付系は「2000/01/01」のような形式で記入してください</li>
                            </ul>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="/template.csv" download="テンプレート.csv" >
                                <button type="button" class="btn btn-primary">
                                    テンプレートをダウンロード
                                </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>


                 <div class="card-header">登録済みの項目</div>

                <div class="card-body">


                        <div class="form-group row">
                            <div class="col-md-3">
                                拠点
                                <ul>
                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($branch->name, false); ?></li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                申込プラン
                                <ul>
                                 <li>未設定</li>
                                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($plan->name, false); ?></li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                申込OP
                                <ul>
                                    <li>未設定</li>
                                <?php $__currentLoopData = $ops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($op->name, false); ?></li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                        </div>

                </div>
            </div>
        </div>
        

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/csv/index.blade.php ENDPATH**/ ?>