<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row justify-content-left">

        
    追跡番号があり配達完了していない顧客データを更新します<br>
    一回で確認する件数は10000件です<br>
    確認結果が「伝票番号未登録」で、申込日から90日経過している場合、顧客の配達状況は「期限切れ」で更新されます

                     <div class="form-group row">    
                            <label for="email" class="col-md-3 col-form-label text-md-right" style="font-size:12px" >除外ｽﾃｰﾀｽ</label>

                            <div class="col-md-8">
                               <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input id="email" type="checkbox" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="status[]" value="<?php echo e($status->id, false); ?>"   ><?php echo e($status->name, false); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
 
                            
                        </div>
                       <form method="POST">
                        <?php echo e(csrf_field(), false); ?>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   確認
                                </button>
                            </div>
                        </div>
                      </form>
                </div>


                        <br>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>顧客ID</th>
<!--                                 <th>拠点</th> -->
                                <th>申込日</th>
                                <th>工事日</th>
                                <th>申込者</th>
                                <th>対話者</th>
                                <th>電話番号</th>
                                <th>携帯番号</th>
                                <th>決済</th>
                                <th>1stフォロー</th>
                                <th>2ndフォロー</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <th><a href="/search/edit/<?php echo e($customer->id, false); ?>"><?php echo e($customer->id, false); ?></a></th>
                                <td><?php echo e($customer->application_at, false); ?></td>
                                <td><?php echo e($customer->construction_at, false); ?></td>
                                <td><?php echo e($customer->name, false); ?></td>
                                <td><?php echo e($customer->interlocutor, false); ?></td>
                                <td><?php echo e($customer->tel, false); ?></td>
                                <td><?php echo e($customer->mobile, false); ?></td>
                                <td><?php echo e($customer->pay, false); ?></td>
                                <td><?php echo e($customer->firstFollower->name ?? '', false); ?></td>
                                <td><?php echo e($customer->secondFollower->name  ?? '', false); ?></td>


                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <br>
        

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/yamato/index.blade.php ENDPATH**/ ?>