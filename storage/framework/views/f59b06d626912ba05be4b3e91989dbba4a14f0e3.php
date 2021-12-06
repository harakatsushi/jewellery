<?php $__env->startSection('content'); ?>
<div class="container">
<!--     <a href="/csv/reg">新規登録</a> -->
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">検索</div>

                <div class="card-body">
                    <form method="POST" action="">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="id" class="col-md-1 col-form-label text-md-right">顧客ID</label>

                            <div class="col-md-1">
                                <input id="id" type="text" class="form-control" name="id" value="<?php echo e(old('id'), false); ?>"  autofocus>

                            </div>
                            <label for="tel" class="col-md-1 col-form-label text-md-right">電話番号</label>

                            <div class="col-md-2">
                                <input id="tel" type="text" class="form-control <?php if ($errors->has('tel')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tel'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="tel" value="<?php echo e(old('tel'), false); ?>"   >

    
                            </div>
                            <label for="mobile" class="col-md-1 col-form-label text-md-right">携帯番号</label>

                            <div class="col-md-2">
                                <input id="mobile" type="text" class="form-control <?php if ($errors->has('mobile')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="mobile" value="<?php echo e(old('mobile'), false); ?>"   >

                            </div>
                         </div>
                         <div class="form-group row">    
                            <label for="name" class="col-md-1 col-form-label text-md-right">契約者</label>

                            <div class="col-md-2">
                                <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" value="<?php echo e(old('name'), false); ?>"   >


                            </div>
                            <label for="kana" class="col-md-1 col-form-label text-md-right">契約者フリガナ</label>

                            <div class="col-md-2">
                                <input id="kana" type="text" class="form-control <?php if ($errors->has('kana')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kana'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="kana" value="<?php echo e(old('kana'), false); ?>"   >

 
                            </div>


                        </div>
                            <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-primary" id="search_detail">
                                  詳細検索
                                </button>
                            </div>
                        </div><br>
     
                        <div style="display: none" id="search_detail_area" >
                        <div class="form-group row">    
                            <label for="status" class="col-md-1 col-form-label text-md-right">ｽﾃｰﾀｽ</label>

                            <div class="col-md-10">
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input id="status<?php echo e($status->id, false); ?>" type="checkbox" class="form-control <?php if ($errors->has('status')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('status'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="status[]" value="<?php echo e($status->id, false); ?>"  
                                    <?php if(old('status') && in_array($status->id,old('status'))): ?> checked <?php endif; ?>
                                 ><?php echo e($status->name, false); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
                            </div>
 
                            
                        </div>

                        <div class="form-group row">    
                            <label for="email" class="col-md-1 col-form-label text-md-right" style="font-size:12px" >対応ｽﾃｰﾀｽ</label>

                            <div class="col-md-10">
                                <?php $__currentLoopData = $tai_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tai_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input id="tai_status<?php echo e($tai_status->id, false); ?>" type="checkbox" class="form-control <?php if ($errors->has('tai_status')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tai_status'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="tai_status[]" value="<?php echo e($tai_status->id, false); ?>"  
                                    <?php if(old('tai_status') && in_array($tai_status->id,old('tai_status'))): ?> checked <?php endif; ?>
                                 ><?php echo e($tai_status->name, false); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
 
                            
                        </div>


                        <div class="form-group row">    
                            <label for="pay1" class="col-md-1 col-form-label text-md-right">決済</label>

                            <div class="col-md-1">
                               <input id="is_pay" type="checkbox" class="form-control <?php if ($errors->has('is_pay')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('is_pay'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="is_pay" value="1"  <?php if(old('is_pay')): ?>checked <?php endif; ?>  >
                            </div>
                             <label for="pay2" class="col-md-1 col-form-label text-md-right">決済不備</label>

                            <div class="col-md-1">
                                <input id="is_pay_defect" type="checkbox" class="form-control <?php if ($errors->has('is_pay_defect')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('is_pay_defect'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="is_pay_defect"  value="1"  <?php if(old('is_pay_defect')): ?>checked <?php endif; ?>   >
                            </div>
                            <label for="email" class="col-md-1 col-form-label text-md-right">申込日</label>

                            <div class="col-md-3">
                                <input id="application_at1" type="date" class="form-control <?php if ($errors->has('application_at1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('application_at1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="application_at1" value="<?php echo e(old('application_at1'), false); ?>"   >-
                                <input id="application_at2" type="date" class="form-control <?php if ($errors->has('application_at2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('application_at2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="application_at2" value="<?php echo e(old('application_at2'), false); ?>"   >
                            </div> 

                            <label for="construction_at" class="col-md-1 col-form-label text-md-right">工事日</label>

                            <div class="col-md-3">
                                <input id="construction_at1" type="date" class="form-control <?php if ($errors->has('construction_at1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('construction_at1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="construction_at1" value="<?php echo e(old('construction_at1'), false); ?>"   >-
                                <input id="construction_at2" type="date" class="form-control <?php if ($errors->has('construction_at2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('construction_at2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="construction_at2" value="<?php echo e(old('construction_at2'), false); ?>"   >
                            </div>   
                        </div>
                           <div class="form-group row">    
                            <label for="send_status_at1" class="col-md-1 col-form-label text-md-right" style="font-size:12px ">配達状況1</label>

                            <div class="col-md-2">
                               <input id="send_status_at1" type="text" class="form-control <?php if ($errors->has('send_status_at1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('send_status_at1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="send_status_at1" value="<?php echo e(old('send_status_at1'), false); ?>"   >
                            </div>
                             <label for="send_status_at2" class="col-md-1 col-form-label text-md-right"style="font-size:12px ">配達状況2</label>

                            <div class="col-md-2">
                               <input id="send_status_at2" type="text" class="form-control <?php if ($errors->has('send_status_at2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('send_status_at2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="send_status_at2" value="<?php echo e(old('send_status_at2'), false); ?>"   >
                            </div>
                            <label for="send_status3" class="col-md-1 col-form-label text-md-right"style="font-size:12px ">配達状況3</label>

                            <div class="col-md-2">
                               <input id="send_status3" type="text" class="form-control <?php if ($errors->has('send_status3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('send_status3'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="send_status3" value="<?php echo e(old('send_status3'), false); ?>"   >
                            </div>   
                        </div>

                         <?php if(Auth::guard('web')->user()->role==1 || Auth::guard('web')->user()->role==2 || Auth::guard('web')->user()->role==2): ?> 
                        <div class="form-group row">    
                            <label for="email" class="col-md-1 col-form-label text-md-right" style="font-size:12px" >拠点</label>

                            <div class="col-md-10">
                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input id="status" type="checkbox" class="form-control <?php if ($errors->has('branch')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('branch'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="branch[]" value="<?php echo e($branch->id, false); ?>"  
                                    <?php if(old('branch') && in_array($branch->id,old('branch'))): ?> checked <?php endif; ?>
                                 ><?php echo e($branch->name, false); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
 
                            
                        </div>
                        <?php endif; ?>
                        <div class="form-group row">    
                            <label for="email" class="col-md-1 col-form-label text-md-right" style="font-size:12px" >チーム</label>

                            <div class="col-md-10">
                                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input id="status" type="checkbox" class="form-control <?php if ($errors->has('team')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('team'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="team[]" value="<?php echo e($team->id, false); ?>"  
                                    <?php if(old('team') && in_array($team->id,old('team'))): ?> checked <?php endif; ?>
                                 ><?php echo e($team->name, false); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
 
                            
                        </div>
                        <div class="form-group row">    
                            <label for="email" class="col-md-1 col-form-label text-md-right" style="font-size:12px" >アポインター</label>

                            <div class="col-md-10">

                                <?php $__currentLoopData = $appointers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$appointer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input id="status" type="checkbox" class="form-control <?php if ($errors->has('appointer')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('appointer'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="appointer[]" value="<?php echo e($appointer->id, false); ?>"  
                                    <?php if(old('appointer') && in_array($appointer->id,old('appointer'))): ?> checked <?php endif; ?>
                                 ><?php echo e($appointer->name, false); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
    
 
                            
                        </div>
                        <div class="form-group row">    
                            <label for="email" class="col-md-1 col-form-label text-md-right" style="font-size:12px" >クローザー</label>

                            <div class="col-md-10">

                                <?php $__currentLoopData = $closers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$closer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input id="closer" type="checkbox" class="form-control <?php if ($errors->has('closer')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('closer'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="closer[]" value="<?php echo e($closer->id, false); ?>"  
                                    <?php if(old('closer') && in_array($closer->id,old('closer'))): ?> checked <?php endif; ?>
                                 ><?php echo e($closer->name, false); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
 
                            
                        </div>
                        <div class="form-group row">    
                            <label for="email" class="col-md-1 col-form-label text-md-right" style="font-size:12px" >後確者</label>

                            <div class="col-md-10">
                          <?php $__currentLoopData = $defenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$defender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input id="defender" type="checkbox" class="form-control <?php if ($errors->has('defender')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('defender'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="defender[]" value="<?php echo e($defender->id, false); ?>"  
                                    <?php if(old('defender') && in_array($defender->id,old('defender'))): ?> checked <?php endif; ?>
                                 ><?php echo e($defender->name, false); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
 
                            
                        </div>
                        <div class="form-group row">  
                          <label for="cs" class="col-md-1 col-form-label text-md-right">CSフォローC</label>

                            <div class="col-md-1">
                               <input id="cs" type="checkbox" class="form-control <?php if ($errors->has('cs')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cs'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cs" value="1"   <?php if(old('cs')): ?>checked <?php endif; ?> >
                            </div>
                            <label for="email" class="col-md-1 col-form-label text-md-right">1stフォロー</label>

                            <div class="col-md-3">
                                <input id="email" type="date" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email'), false); ?>"   >-
                                <input id="email" type="date" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email'), false); ?>"   >
                            </div> 

                            <label for="email" class="col-md-1 col-form-label text-md-right">2ndフォロー</label>

                            <div class="col-md-3">
                                <input id="email" type="date" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email'), false); ?>"   >-
                                <input id="email" type="date" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email'), false); ?>"   >
                            </div>   
                        </div>

                        <div class="form-group row">    
                            <label for="email" class="col-md-1 col-form-label text-md-right" style="font-size:12px" >支払い方法</label>

                          <div class="col-md-10">
                          <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input id="pay" type="checkbox" class="form-control <?php if ($errors->has('pay')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pay'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="pay[]" value="<?php echo e($pay->id, false); ?>"  
                                    <?php if(old('pay') && in_array($pay->id,old('pay'))): ?> checked <?php endif; ?>
                                 ><?php echo e($pay->name, false); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
 
 
                            
                        </div>
                    </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   検索
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <script type="text/javascript">
            function goDel(){
                if(confirm('本当によろしいですか?')){
                    $("#form1").prop("action","/search/delete");
                    $("#form1").submit();                    
                }

            }

        </script>
        <form method="POST" action="/search/pdf" id="form1">
       <?php echo csrf_field(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                       <?php if(Auth::guard('web')->user()->role==1 || Auth::guard('web')->user()->role==2 || Auth::guard('web')->user()->role==3): ?> 
                                  <button type="submit" class="btn btn-primary">
                                   PDF出力
                                </button>
                                <button type="button" class="btn btn-primary" onclick="goDel()">
                                   削除
                                </button>
                                <?php endif; ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>顧客ID</th>
                                <th>申込日</th>
                                <th>工事日</th>
                                <th>申込者</th>
                                <th>対話者</th>
                                <th>電話番号</th>
                                <th>携帯番号</th>
                                <th>決済</th>
                                <th>1stフォロー</th>
                                <th>2ndフォロー</th>
                       
                                   <?php if(Auth::guard('web')->user()->role==1 || Auth::guard('web')->user()->role==2 || Auth::guard('web')->user()->role==3): ?> 
                                <th>選択</th>
 
                                <?php endif; ?>
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

                                       <?php if(Auth::guard('web')->user()->role==1 || Auth::guard('web')->user()->role==2 || Auth::guard('web')->user()->role==3): ?> 
                                <td><input type="checkbox" name="customer_id[]" value="<?php echo e($customer->id, false); ?>"></td>

                                <?php endif; ?>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                       <?php if(Auth::guard('web')->user()->role==1 || Auth::guard('web')->user()->role==2 || Auth::guard('web')->user()->role==3): ?> 
                      <button type="submit" class="btn btn-primary">
                                   PDF出力
                                </button>
                                <?php endif; ?>
                </div>
            </div>
        </div>
                          
        </form>
    </div>
</div>
                   <script type="text/javascript">
                    window.onload = function() {
                            $("#search_detail").click(function () {
  
                                  $("#search_detail_area").slideToggle();
                                });
                            };
                        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/search/index.blade.php ENDPATH**/ ?>