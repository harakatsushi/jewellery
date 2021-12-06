<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/csv/end" method="POST">
                        <input type="hidden" name="id" value="<?php echo e($id, false); ?>">
                         <?php echo e(csrf_field(), false); ?>

                         <?php if(!$emissions): ?>
                         <div style="color:red">排出事業場が一件も紐づけてありません</div>
                         <?php endif; ?>
                    <table class="table table-striped table-hover">
                        <tr>
                                <th style="width:200px">紹介料</th>
                                <td><input type="number" name="intro_price" value="<?php echo e(old('intro_price'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th style="width:200px">連絡番号1</th>
                                <td><input type="text" name="number1" value="<?php echo e(old('number1'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>連絡番号2</th>
                                <td><input type="text" name="number2" value="<?php echo e(old('number2'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>連絡番号3</th>
                                <td><input type="text" name="number3" value="<?php echo e(old('number3'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>引き渡し日</th>
                                <td><input type="date" name="recv_date" value="<?php echo e(old('recv_date'), false); ?>" class="form-control js-characters-change" required="required"></td>
                            </tr>
                            <tr>
                                <th>排出事業場</th>
                                <td><?php echo e(\Form::select('haishutsu_code', $emissions, null, ['class' => 'form-control', 'id' => 'haishutsu_code']), false); ?></td>
                            </tr>
                            <tr>
                                <th>引き渡し担当者</th>
                                <td><input type="text" name="recv_tanto" value="<?php echo e(old('recv_tanto'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>登録担当者</th>
                                <td><input type="text" name="reg_tanto" value="<?php echo e(old('reg_tanto'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                             <tr>
                                <th>廃棄物の種類</th>
                                <td><input type="text" name="haiki_code" value="<?php echo e(old('haiki_code'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>廃棄物の名称</th>
                                <td><input type="text" name="haiki_name" value="<?php echo e(old('haiki_name'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>廃棄物の数量</th>
                                <td><input type="text" name="haiki_cnt" value="<?php echo e(old('haiki_cnt'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>廃棄物の数量単位</th>
                                <td><?php echo e(\Form::select('haiki_number_tani', $tani, null, ['class' => 'form-control', 'id' => 'haiki_number_tani']), false); ?></td>
                            </tr>
                            <tr>
                                <th>荷姿</th>
                                <td><input type="text" name="nisugata_code" value="<?php echo e(old('nisugata_code'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>荷姿の数量</th>
                                <td><input type="number" name="nisugata_cnt" value="<?php echo e(old('nisugata_cnt'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                                                        <tr>
                                <th>数量の確定者コード</th>
                                <td><input type="text" name="nisugata_cnt_kakutei" value="<?php echo e(old('nisugata_cnt_kakutei'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>有害物質コード1</th>
                                <td><input type="text" name="hazardous1" value="<?php echo e(old('hazardous1'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>有害物質コード2</th>
                                <td><input type="text" name="hazardous2" value="<?php echo e(old('hazardous2'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                                                        <tr>
                                <th>有害物質コード3</th>
                                <td><input type="text" name="hazardous3" value="<?php echo e(old('hazardous3'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>有害物質コード4</th>
                                <td><input type="text" name="hazardous4" value="<?php echo e(old('hazardous4'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>有害物質コード5</th>
                                <td><input type="text" name="hazardous5" value="<?php echo e(old('hazardous5'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>有害物質コード5</th>
                                <td><input type="text" name="hazardous6" value="<?php echo e(old('hazardous6'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <?php for ($i=1; $i <6 ; $i++) { ?>
                            <tr>
                                <th>収集運搬業者加入番号<?php echo e($i, false); ?></th>
                                <td><input type="text" name="shushu_number<?php echo e($i, false); ?>" value="<?php echo e(old('shushu_number'.$i), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                                                        <tr>
                                <th>再委託収集運搬業者加入番号<?php echo e($i, false); ?></th>
                                <td><input type="text" name="saiitaku_nuber<?php echo e($i, false); ?>" value="<?php echo e(old('saiitaku_nuber'.$i), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>運搬方法コード<?php echo e($i, false); ?></th>
                                <td><input type="text" name="unpan_code<?php echo e($i, false); ?>" value="<?php echo e(old('unpan_code'.$i), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>車両番号<?php echo e($i, false); ?></th>
                                <td><input type="text" name="car_number<?php echo e($i, false); ?>" value="<?php echo e(old('car_number'.$i), false); ?>" class="form-control js-characters-change"></td>
                            </tr>

                            <tr>
                                <th>運搬担当者<?php echo e($i, false); ?></th>
                                <td><input type="text" name="unpan_tanto<?php echo e($i, false); ?>" value="<?php echo e(old('unpan_tanto'.$i), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>運搬先事業場加入者番号<?php echo e($i, false); ?></th>
                                <td><input type="text" name="kanyu_nymber<?php echo e($i, false); ?>" value="<?php echo e(old('kanyu_nymber'.$i), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                                                        <tr>
                                <th>運搬先事業場コード<?php echo e($i, false); ?></th>
                                <td><input type="text" name="unpan_number<?php echo e($i, false); ?>" value="<?php echo e(old('unpan_number'.$i), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                             <?php } ?>

                            <tr>
                                <th>処分業者加入番号</th>
                                <td><input type="text" name="shobun_number" value="<?php echo e(old('shobun_number'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>再委託処分業者加入番号</th>
                                <td><input type="text" name="saiitaku_number" value="<?php echo e(old('saiitaku_number'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>                            <tr>
                                <th>処分事業場コード</th>
                                <td><input type="text" name="shobun_jigyou_code" value="<?php echo e(old('shobun_jigyou_code'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>処分方法コード</th>
                                <td><input type="text" name="shobun_hoho" value="<?php echo e(old('shobun_hoho'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                            <tr>
                                <th>最終処分事業場登録区分</th>
                                <td><input type="text" name="last_shobun_kbn" value="<?php echo e(old('last_shobun_kbn'), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                               <?php for ($i=1; $i <11; $i++) { ?>
                                                        <tr>
                                <th>最終処分事業場コード<?php echo e($i, false); ?></th>
                                <td><input type="text" name="last_shobun_code<?php echo e($i, false); ?>" value="<?php echo e(old('last_shobun_code'.$i), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                             <?php } ?>
                            <?php for ($i=1; $i <6; $i++) { ?>
                                                        <tr>
                                <th>備考<?php echo e($i, false); ?></th>
                                <td><input type="text" name="note<?php echo e($i, false); ?>" value="<?php echo e(old('note'.$i), false); ?>" class="form-control js-characters-change"></td>
                            </tr>
                             <?php } ?>

                    </table>
                      <?php if(!$emissions): ?>
                         <div style="color:red">排出事業場が一件も紐づけてありません</div>
                        <?php else: ?>
                         <input type="submit" value="更新">
                         <?php endif; ?>
                   
                </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views//csv/reg.blade.php ENDPATH**/ ?>