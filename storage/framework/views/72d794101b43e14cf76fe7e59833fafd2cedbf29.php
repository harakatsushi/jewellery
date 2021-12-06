<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form  method="POST">
             
                         <?php echo e(csrf_field(), false); ?>

  
                    <table class="table ttable-hover">

                             <tr>
                                <th >申込日	</th>
                                <th >拠点	</th>
                                <th >チーム	</th>
								<th >アポインター	</th>
								<th >クローザー	</th>       
   

                            </tr>
                            <tr>
                                <td><input type="date" name="application_at" value="<?php echo e(old('application_at'), false); ?>" class="form-control js-characters-change"></td>
                                <td valign="middle"   >
                                	<select name="branch_id" class="form-control js-characters-change">
                                		<option value=""></option> 
                                		<?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                		<option value="<?php echo e($branch->id, false); ?>" 
                                			<?php if(old('branch_id')==$branch->id ): ?>selected <?php endif; ?> ><?php echo e($branch->name, false); ?></option>
	
		                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                	</select>

                                </td>
                                <td  valign="middle">
                                	 <select name="team_id" class="form-control js-characters-change">
                                	 	<option value=""></option> 
                                		<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                		<option value="<?php echo e($team->id, false); ?>" 
                                			<?php if(old('team_id')==$team->id ): ?>selected <?php endif; ?> ><?php echo e($team->name, false); ?></option>
	
		                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                	</select>

                                </td>
                                <td  valign="middle">
                                	 <select name="apointer" class="form-control js-characters-change">
                                	 	<option value=""></option> 
                                		<?php $__currentLoopData = $appointers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$apointer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                		<option value="<?php echo e($apointer->id, false); ?>" 
                                			<?php if(old('apointer')==$apointer->id  ): ?>selected <?php endif; ?> ><?php echo e($apointer->name, false); ?></option>
	
		                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                	</select>

                                </td>
                                <td  valign="middle">
                                	 <select name="closer_id" class="form-control js-characters-change">
                                	 	<option value=""></option> 
                                		<?php $__currentLoopData = $closers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$closer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                		<option value="<?php echo e($closer->id, false); ?>" 
                                			<?php if(old('closer_id')==$closer->id  ): ?>selected <?php endif; ?> ><?php echo e($closer->name, false); ?></option>
	
		                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                	</select>

                            </tr>
                            <tr>
                                <th >固定電話	</th>
                                <th >携帯電話番号	</th>

                            </tr>
                            <tr>
                                <td><input type="tel" name="tel" value="<?php echo e(old('tel'), false); ?>" class="form-control js-characters-change"></td>
                                <td  ><input type="tel" name="mobile" value="<?php echo e(old('mobile'), false); ?>" class="form-control js-characters-change"></td>

                            </tr>
                            <tr>
                                <th >申込者	</th>
                                <th  >フリガナ	</th>
                                <th >生年月日	</th>
								<th >NTT契約者	</th>
								<th >NTT契約者カナ	</th>       
   

                            </tr>
                            <tr>
                                <td><input type="text" name="name" value="<?php echo e(old('name'), false); ?>" class="form-control js-characters-change"></td>
                               <td  ><input type="text" name="kana" value="<?php echo e(old('kana'), false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="date" name="birsth_date" value="<?php echo e(old('birsth_date'), false); ?>" class="form-control js-characters-change"></td>
    							<td><input type="text" name="ntt_name" value="<?php echo e(old('ntt_name'), false); ?>" class="form-control js-characters-change"></td>
                               <td><input type="text" name="ntt_kana" value="<?php echo e(old('ntt_kana'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th >郵便番号	</th>
                                <th colspan="3" >住所	</th>
								<th >対話者	</th>       
                                <th >対話者間柄	</th>

                            </tr>
                            <tr>
                                <td><input type="text" name="zip" value="<?php echo e(old('zip'), false); ?>" class="form-control js-characters-change"></td>
                                <td colspan="3"><input type="text" name="address" value="<?php echo e(old('address'), false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="text" name="interlocutor" value="<?php echo e(old('interlocutor'), false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="text" name="interlocutor_relation" value="<?php echo e(old('interlocutor_relation'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th >工事日	</th>
                                <th  >PPPランプ	</th>
                                <th >申込プラン	</th>
								<th >申込ＯＰ	</th>
								<th >支払い方法	</th>       


                            </tr>
                            <tr>
                                <td><input type="date" name="construction_at" value="<?php echo e(old('construction_at'), false); ?>" class="form-control js-characters-change"></td>
                                <td  ><input type="text" name="ppp" value="<?php echo e(old('ppp'), false); ?>" class="form-control js-characters-change"></td>
                                 <td>                            <select name="plan" class="form-control js-characters-change">
                                        <option value=""></option> 
                                        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($plan->id, false); ?>" 
                                            <?php if(old('plan')==$plan->id  ): ?>selected <?php endif; ?> ><?php echo e($plan->name, false); ?></option>
    
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select></td>
                                  <td>                           <select name="op" class="form-control js-characters-change">
                                        <option value=""></option> 
                                        <?php $__currentLoopData = $ops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($op->id, false); ?>" 
                                            <?php if(old('op')==$op->id  ): ?>selected <?php endif; ?> ><?php echo e($op->name, false); ?></option>
    
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select></td>
                                   <td  ><input type="text" name="pay" value="<?php echo e(old('pay'), false); ?>" class="form-control js-characters-change"></td>

                            </tr>
                            <tr>
                                <th >後確依頼時間	</th>
                                <th  >後確先	</th>


                            </tr>
                            <tr>
                                <td><input type="text" name="confirm_time" value="<?php echo e(old('confirm_time'), false); ?>" class="form-control js-characters-change"></td>
                                <td  ><input type="text" name="confirm" value="<?php echo e(old('confirm'), false); ?>" class="form-control js-characters-change"></td>

                            </tr>
                            <tr>
                                <td colspan="7" ><input type="text" name="pay_error" value="<?php echo e(old('pay_error'), false); ?>" class="form-control js-characters-change"></td>
                                
                            </tr>

                    </table>

                         <input type="submit" value="更新">

                   
                </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/acquisition/reg.blade.php ENDPATH**/ ?>