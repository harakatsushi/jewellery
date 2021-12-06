<?php $__env->startSection('content'); ?>
<style type="text/css">
  input[type="date"]::-webkit-inner-spin-button{
  -webkit-appearance: none;
}
input[type="date"]::-webkit-clear-button{
  -webkit-appearance: none;
}

</style>
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12">
           <table width="1020" border="0" align="left">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
 
    <tr>
      <td width="400"><!-- ◯◯が編集中です。</td>
      <td ><input type="button" value="編集キャンセル"> -->
        　　　　　　　　
<!--       <input type="button" value="編集"> -->
      　　<input type="button" value="保存">
      　　<!-- 　　＜前へ　　次へ＞ --></td>
    </tr>
  </tbody>
</table>
  <table><tr>  
   <td>   
<table width="1220" border="0" align="left">
  <tbody>
    <tr>
      <td width="1200"><table width="100%" border="0">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="130">顧客番号</th>
            <th >決済</th>
            <th >不備</th>
            <th width="18%">ステータス</th>
            <th width="11%">対応ステータス</th>
            <th width="25%">対応日</th>
            <th width="18%">次回架電</th>
          </tr>
                            <tr>
                                <td><?php echo e($customer->id, false); ?></td>
                                <td><input type="checkbox" class="form-control <?php if ($errors->has('kana')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kana'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="is_pay" value="1"   <?php if($customer->is_pay): ?>checked <?php endif; ?>></td>
                                <td><input type="checkbox" class="form-control <?php if ($errors->has('kana')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('kana'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="is_pay_defect" value="1"   <?php if($customer->is_pay_defect): ?>checked <?php endif; ?> ></td>
                                                         <td valign="middle">
                                  <select name="status_id">
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status->id, false); ?>" 
                                      <?php if(old('status_id')==$status->id || $customer->status_id==$status->id ): ?>selected <?php endif; ?> ><?php echo e($status->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                </td>
                                <td  valign="middle">
                                              <select name="tai_status_id">
                                    <?php $__currentLoopData = $tai_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tai_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tai_status->id, false); ?>" 
                                      <?php if(old('tai_status_id')==$tai_status->id || $customer->tai_status_id==$tai_status->id): ?> selected <?php endif; ?> ><?php echo e($tai_status->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                </td>
                                <td><input type="date" name="tai_at" value="<?php echo e(old('tai_at') ?? $customer->tai_at, false); ?>">　<input type="button" value="本日" onclick="setTody('tai_at')"></td>
                                <td><input type="text" name="next_tel" value="<?php echo e(old('next_tel') ?? $customer->next_tel, false); ?>" class="form-control js-characters-change"></td>
                            </tr>

        </tbody>
      </table></td>
      <td width="20" >&nbsp;</td>
</tr>
    <tr>
      <td><table width="100%" border="0">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="150">申込日</th>
            <th >拠点</th>
            <th width="170">チーム</th>
            <th width="170">アポインター</th>
            <th width="170">クローザー</th>
            <th width="150">後確者</th>
          </tr>
                            <tr>
                                <td><input type="date" name="application_at" value="<?php echo e(old('application_at') ?? $customer->application_at, false); ?>"  ></td>
                                <td valign="middle"  >
                                  <select name="branch_id">
                                    <option value=""></option> 
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($branch->id, false); ?>" 
                                      <?php if(old('branch_id')==$branch->id || $customer->branch_id==$branch->id ): ?>selected <?php endif; ?> ><?php echo e($branch->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                </td>
                                <td  valign="middle">
                                   <select name="team_id">
                                    <option value=""></option> 
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($team->id, false); ?>" 
                                      <?php if(old('team_id')==$team->id || $customer->team_id==$team->id ): ?>selected <?php endif; ?> ><?php echo e($team->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                </td>
                                <td  valign="middle">
                                   <select name="apointer">
                                    <option value=""></option> 
                                    <?php $__currentLoopData = $appointers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$apointer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($apointer->id, false); ?>" 
                                      <?php if(old('apointer')==$apointer->id || $customer->apointer==$apointer->id ): ?>selected <?php endif; ?> ><?php echo e($apointer->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                </td>
                                <td  valign="middle">
                                   <select name="closer_id">
                                    <option value=""></option> 
                                    <?php $__currentLoopData = $closers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$closer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($closer->id, false); ?>" 
                                      <?php if(old('closer_id')==$closer->id || $customer->closer_id==$closer->id ): ?>selected <?php endif; ?> ><?php echo e($closer->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                <td  valign="middle">
                                   <select name="defender_id">
                                    <option value=""></option> 
                                    <?php $__currentLoopData = $defenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$defender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($defender->id, false); ?>" 
                                      <?php if(old('defender_id')==$defender->id || $customer->defender_id==$defender->id ): ?>selected <?php endif; ?> ><?php echo e($defender->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                            </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td><table width="100%" border="0">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="130">固定電話</th>
            <th width="150">携帯電話</th>
            <th width="150">申込プラン</th>
            <th width="150">申込OP</th>
            <th width="250">OP解約日</th>
            <th width="250">工事日①</th>
          </tr>
                            <tr>
                                <td><input type="tel" name="tel" value="<?php echo e(old('tel') ??  $customer->tel, false); ?>" class="form-control js-characters-change"></td>
                                <td ><input type="tel" name="mobile" value="<?php echo e(old('mobile') ??  $customer->mobile, false); ?>" class="form-control js-characters-change"></td>
                                <td  valign="middle">
                                   <select name="plan_id">
                                    <option value=""></option> 
                                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($plan->id, false); ?>" 
                                      <?php if(old('plan_id')==$plan->id || $customer->plan_id==$plan->id ): ?>selected <?php endif; ?> ><?php echo e($plan->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                </td>
                                <td  valign="middle">
                                   <select name="op_id">
                                    <option value=""></option> 
                                    <?php $__currentLoopData = $ops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($op->id, false); ?>" 
                                      <?php if(old('op_id')==$op->id || $customer->op_id==$op->id ): ?>selected <?php endif; ?> ><?php echo e($op->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                </td>
                                <td><input type="date" name="op_cancel_at" value="<?php echo e(old('op_cancel_at') ??  $customer->op_cancel_at, false); ?>"  >　<input type="button" value="本日" onclick="setTody('op_cancel_at')"></td>
                                <td ><input type="date" name="construction_at" value="<?php echo e(old('construction_at') ??  $customer->construction_at, false); ?>" > <input type="button" value="本日" onclick="setTody('construction_at')"></td>
                            </tr>

        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td><table width="100%" border="0" >
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="130">契約者</th>
            <th >フリガナ</th>
            <th width="170">生年月日</th>
            <th width="170">NTT契約者</th>
            <th width="170">NTT契約者カナ</th>
            <th width="170">既契約回線</th>
          </tr>
                       <tr>
                                <td><input type="text" name="name" value="<?php echo e(old('name') ?? $customer->name, false); ?>" class="form-control js-characters-change"></td>
                               <td ><input type="text" name="kana" value="<?php echo e(old('kana') ?? $customer->kana, false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="date" name="birsth_date" value="<?php echo e(old('birsth_date') ?? $customer->birsth_date, false); ?>"  style="width:75%;font-size: 10px"></td>
                  <td><input type="text" name="ntt_name" value="<?php echo e(old('ntt_name') ?? $customer->ntt_name, false); ?>" class="form-control js-characters-change"></td>
                               <td><input type="text" name="ntt_kana" value="<?php echo e(old('ntt_kana') ?? $customer->ntt_kana, false); ?>" class="form-control js-characters-change"></td>
                                <td ><input type="text" name="line" value="<?php echo e(old('line') ?? $customer->line, false); ?>" class="form-control js-characters-change"></td>
                            </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td><table width="100%" border="0">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="130">郵便番号</th>
            <th >住所</th>
            <th width="160">対話者</th>
            <th width="140">対話者間柄</th>
          </tr>
                            <tr>
                                <td><input type="text" name="zip" value="<?php echo e(old('zip') ?? $customer->zip, false); ?>" class="form-control js-characters-change"></td>
                                <td ><input type="text" name="address" value="<?php echo e(old('address') ?? $customer->address, false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="text" name="interlocutor" value="<?php echo e(old('interlocutor') ?? $customer->interlocutor, false); ?>" class="form-control js-characters-change"></td>
                                <td ><input type="text" name="interlocutor_relation" value="<?php echo e(old('interlocutor_relation') ?? $customer->interlocutor_relation, false); ?>" class="form-control js-characters-change"></td>
                            </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td><table width="100%" border="0">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="250">解約日</th>
            <th width="130" >解約月</th>
            <th width="130">OP解約月</th>
            <th width="13%">追跡番号①</th>
            <th width="13%">配達状況①</th>
            <th width="250">配達状況日付①</th>
          </tr>
                  <tr>
                                <td><input type="date" name="cancel_at" value="<?php echo e(old('cancel_at') ?? $customer->cancel_at, false); ?>"  >　<input type="button" value="本日" onclick="setTody('cancel_at')"></td>
                                <td ><input type="text" name="cancel_month" value="<?php echo e(old('cancel_month') ?? $customer->cancel_month, false); ?>" class="form-control js-characters-change"></td>
                                 <td><input type="text" name="op_cancel_month" value="<?php echo e(old('op_cancel_month') ?? $customer->op_cancel_month, false); ?>" class="form-control js-characters-change"></td>
                                  <td><input type="text" name="tracking_number1" value="<?php echo e(old('tracking_number1') ?? $customer->tracking_number1, false); ?>" class="form-control js-characters-change"></td>
                                   <td><input type="text" name="send_status1" value="<?php echo e(old('send_status1') ?? $customer->send_status1, false); ?>" class="form-control js-characters-change"></td>
                                    <td ><input type="text" name="send_status_at1" value="<?php echo e(old('send_status_at1') ?? $customer->send_status_at1, false); ?>"  ></td>
                            </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td><table width="100%" border="0">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="16%">追跡番号②</th>
            <th width="16%">配達状況②</th>
            <th width="17%">配達状況日付②</th>
            <th width="17%">追跡番号③</th>
            <th width="17%">配達状況③</th>
            <th width="17%">配達状況日付③</th>
          </tr>
                          <tr>
                                <td><input type="text" name="tracking_number2" value="<?php echo e(old('tracking_number2') ?? $customer->tracking_number2, false); ?>" class="form-control js-characters-change"></td>
                                <td ><input type="text" name="send_status2" value="<?php echo e(old('send_status2') ?? $customer->send_status2, false); ?>" class="form-control js-characters-change"></td>
                                 <td><input type="text" name="send_status_at2" value="<?php echo e(old('send_status_at2') ?? $customer->send_status_at2, false); ?>" class="form-control js-characters-change"></td>
                                  <td><input type="text" name="tracking_number3" value="<?php echo e(old('tracking_number3') ?? $customer->tracking_number3, false); ?>" class="form-control js-characters-change"></td>
                                   <td><input type="text" name="send_status3" value="<?php echo e(old('send_status3') ?? $customer->send_status3, false); ?>" class="form-control js-characters-change"></td>
                                    <td ><input type="text" name="send_status_at3" value="<?php echo e(old('send_status_at3') ?? $customer->send_status_at3, false); ?>" class="form-control js-characters-change"></td>
                            </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td><table width="100%" border="0">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="250">1stフォロー</th>
            <th width="12%">1stフォローST</th>
            <th width="15%">1stフォロー担当</th>
            <th width="250">2ndフォロー</th>
            <th width="12%">2ndフォローST</th>
            <th width="15%">2ndフォロー担当</th>
          </tr>
<tr>
                                <td><input type="text" name="first_follower_at" value="<?php echo e(old('first_follower_at') ?? $customer->first_follower_at, false); ?>"  >　<input type="button" value="本日" onclick="setTody('first_follower_at')"></td>
                                <td  ><input type="text" name="first_follower_st" value="<?php echo e(old('first_follower_st') ?? $customer->first_follower_st, false); ?>" class="form-control js-characters-change"></td>
                                <td  valign="middle">
                                   <select name="first_follower">
                                    <option value=""></option> 
                                    <?php $__currentLoopData = $first_followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$first_follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($first_follower->id, false); ?>" 
                                      <?php if(old('first_follower')==$first_follower->id || $customer->first_follower==$first_follower->id ): ?>selected <?php endif; ?> ><?php echo e($first_follower->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                </td>
                                <td><input type="date" name="second_follower_at" value="<?php echo e(old('second_follower_at') ?? $customer->second_follower_at, false); ?>" >　<input type="button" value="本日" onclick="setTody('second_follower_at')"></td>
                                <td><input type="text" name="second_follower_st" value="<?php echo e(old('second_follower_st') ?? $customer->second_follower_st, false); ?>" class="form-control js-characters-change"></td>
                                <td   colspan="2" valign="middle">
                                   <select name="second_follower">
                                    <option value=""></option> 
                                    <?php $__currentLoopData = $second_followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$second_follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($second_follower->id, false); ?>" 
                                      <?php if(old('second_follower')==$second_follower->id || $customer->second_follower==$second_follower->id ): ?>selected <?php endif; ?> ><?php echo e($second_follower->name, false); ?></option>
  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>

                                </td>
                            </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td><table width="100%" border="0">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="16%">支払い方法</th>
            <th width="16%">NTTFステータス</th>
            <th width="17%">NTTF汎用請求番号</th>
            <th width="17%">NTTF承認番号</th>
            <th width="250">支払い情報登録日</th>
            <th width="12%">CSフォローC</th>
          </tr>
                            <tr>
                                <td><input type="text" name="pay" value="<?php echo e(old('pay') ?? $customer->pay, false); ?>" class="form-control js-characters-change"></td>
                                 <td ><input type="text" name="nttf_status" value="<?php echo e(old('nttf_status') ?? $customer->nttf_status, false); ?>" class="form-control js-characters-change"></td>
                                 <td><input type="text" name="nttf_sei_number" value="<?php echo e(old('nttf_sei_number') ?? $customer->nttf_sei_number, false); ?>" class="form-control js-characters-change"></td>
                                 <td><input type="text" name="nttf_sho_number" value="<?php echo e(old('nttf_sho_number') ?? $customer->nttf_sho_number, false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="date" name="pay_at" value="<?php echo e(old('pay_at') ?? $customer->pay_at, false); ?>"  >　<input type="button" value="本日" onclick="setTody('pay_at')"></td>
                                <td ><input type="checkbox" name="cs" value="1" class="form-control js-characters-change" <?php if($customer->cs): ?> checked <?php endif; ?>></td>
                            </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td><table border="0">
        <tbody align="center" >
          <tr >
            <th width="210">金融機関名</th>
            <th width="120" nowrap>金融機関コード</th>
            <th width="150">支店名</th>
            <th width="100">支店コード</th>
            <th width="50" nowrap>種別</th>
            <th width="100">口座番号</th>
            <th> 口座名義</th>
          </tr>
                            <tr>
                                <td><input type="text" name="bank_name" value="<?php echo e(old('bank_name') ?? $customer->bank_name, false); ?>" class="form-control js-characters-change"></td>
                                <td ><input type="text" name="bank_code" value="<?php echo e(old('bank_code') ?? $customer->bank_code, false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="text" name="bank_branch" value="<?php echo e(old('bank_branch') ?? $customer->bank_branch, false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="text" name="bank_branch_code" value="<?php echo e(old('bank_branch_code') ?? $customer->bank_branch_code, false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="text" name="bank_type" value="<?php echo e(old('bank_type') ?? $customer->bank_type, false); ?>" class="form-control js-characters-change" maxlength="1"></td>
                                <td><input type="text" name="bank_account_number" value="<?php echo e(old('bank_account_number') ?? $customer->bank_account_number, false); ?>" class="form-control js-characters-change"></td>
                                <td><input type="text" name="bank_account_name" value="<?php echo e(old('bank_account_name') ?? $customer->bank_account_name, false); ?>" class="form-control js-characters-change"></td>
                            </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td valign="middle">
          <table width="600" border="0" align="left">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th>&nbsp;決済不備記事</th>
          </tr>
          <tr>
            <td align="left"><input type="text" name="pay_error" value="<?php echo e(old('pay_error') ?? $customer->pay_error, false); ?>" class="form-control js-characters-change"></td>
          </tr>
        </tbody>
      </table>
          <table width="140" border="0" cellpadding="7" align="right">
  <tbody>
    <tr>
      <td><input type="button" value="編集">
      　　<input type="button" value="保存">
     </td>
    </tr>
  </tbody>
</table>
        </td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td><table width="100%" border="0">
        <tbody align="center" class="table table-hover table-condensed" style=" table-layout: fixed;width: 100%">
          <tr >
            <th width="49%">フロント備考</th>
            <td bgcolor="#FFFFFF"></td>
            <th width="49%">CS備考</th>
          </tr>
          <tr>
            <td align="left" valign="top"><textarea name="front_note" class="form-control js-characters-change"><?php echo e(old('front_note') ?? $customer->front_note, false); ?></textarea> </td>
            <td></td>
            <td align="left" valign="top"><textarea name="cs_note" class="form-control js-characters-change"><?php echo e(old('cs_note') ?? $customer->cs_note, false); ?></textarea></td>
          </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td>
          <table width="100%" border="0">
        <tbody>
            <tr ><th align="center">変更履歴</th></tr>
              </tbody></table>
          
          <table width="100%" border="0">
        <tbody>
          <tr >
            <td width="160">日時</td>
            <td width="160">ユーザー</td>
            <td>内容</td>
          </tr>
          <?php $__currentLoopData = $customerLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$customerLog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr>
                                <td ><?php echo e($customerLog->created_at, false); ?></td>
                                <td ><?php echo e($customerLog->user->name, false); ?></td>
                                <td ><?php echo $customerLog->detail; ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table></td>
      <td>&nbsp;</td>
</tr>
</tbody>
</table>
    </td>
    <td valign="top">
<table width="250" border="0">
  <tbody>
        <tr>
      <th >コメント</th>
    </tr>
    <tr>
      <td>
<form method="POST" action="/search/comment/<?php echo e($customer->id, false); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                                    <?php if(Session::has('message')): ?>
                                <div class="alert alert-danger">
                                        <strong><?php echo e(Session('message'), false); ?></strong>
                                    </div>
                                <?php endif; ?>
                        <div class="form-group row">


                            <div class="col-md-6">
                                <input id="detail" type="text" class=" <?php if ($errors->has('detail')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('detail'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="detail"  required  >
                                <button type="submit" >
                                    送信
                                </button>
                    
                            </div>
                        </div>

                    </form>

      </td>
    </tr>

     <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td>                                <small><?php echo e($comment->transportation->name, false); ?></small><br>
                                <?php if($comment->user_id==$user->id): ?>
                                <input id="detail" type="text" class=" <?php if ($errors->has('detail')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('detail'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="detail"  required value="<?php echo e($comment->detail, false); ?>" >
                                <button type="submit" >
                                    編集
                                </button>
                                <button type="button" onclick="if(confirm('本当によろしいですか')){location.href='/search/comment/delete/<?php echo e($comment->id, false); ?>'}" >
                                    削除
                                </button>
                                <?php else: ?>
                                <?php echo e($comment->detail, false); ?>


                                <?php endif; ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</td></tr></table>

                </div>
                 
            </div>

        </div>

    </div>

</div>
<script type="text/javascript">
    function setTody(name){
        $("input[name="+name+"]").val('<?php echo e(date("Y-m-d"), false); ?>')
    }


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/search/edit.blade.php ENDPATH**/ ?>