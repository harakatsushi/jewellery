<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    function goDel(id){
        if(confirm('本当によろしいですか')){
            location.href='/acquisitions/delete/'+id
        }
    }

</script>
<div class="container">
<!--     <a href="/csv/reg">新規登録</a> -->
    <div class="row justify-content-left">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h2>後確前</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>操作</th>
                                <th>後確結果</th>
                                <th>後確依頼時間</th>
                                <th>申込日</th>
                                <th>拠点</th>
                                <th>チーム</th>
                                <th>アポインター</th>
                                <th>クローザー</th>
                                <th>固定電話</th>
                                <th>携帯電話番号</th>
                                <th>申込者</th>
                                <th>フリガナ</th>
                                <th>生年月日</th>
                                <th>対話者</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $acquisitions1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$acquisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="/acquisitions/edit/<?php echo e($acquisition->id, false); ?>">編集</a><br>
                                    <a href="#" onclick="goDel(<?php echo e($acquisition->id, false); ?>)">削除</a>
                                </td>
                                <td>
                                    <?php if($acquisition->status==1): ?>
                                    ＯＫ
                                    <?php elseif($acquisition->status==2): ?>
                                    営業戻し

                                    <?php elseif($acquisition->status==3): ?>
                                    ＮＧ

                                    <?php elseif($acquisition->status==4): ?>
                                    後確前
                                    <?php elseif($acquisition->status==5): ?>
                                    後確途中

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($acquisition->confirm_time, false); ?></td>
                                <td><?php echo e($acquisition->application_at, false); ?></td>
                                <td><?php echo e($acquisition->branch->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->team->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->appointer->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->closer()->name ?? '', false); ?></td>

                                <td><?php echo e($acquisition->tel, false); ?></td>
                                <td><?php echo e($acquisition->mobile, false); ?></td>
                                <td><?php echo e($acquisition->name, false); ?></td>
                                <td><?php echo e($acquisition->kana, false); ?></td>
                                <td><?php echo e($acquisition->birsth_date, false); ?></td>
                                <td><?php echo e($acquisition->interlocutor, false); ?></td>
        
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>


                    <h2>後確途中</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>操作</th>
                                <th>後確結果</th>
                                <th>後確依頼時間</th>
                                <th>申込日</th>
                                <th>拠点</th>
                                <th>チーム</th>
                                <th>アポインター</th>
                                <th>クローザー</th>
                                <th>固定電話</th>
                                <th>携帯電話番号</th>
                                <th>申込者</th>
                                <th>フリガナ</th>
                                <th>生年月日</th>
                                <th>対話者</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $acquisitions2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$acquisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                <td><a href="/acquisitions/edit/<?php echo e($acquisition->id, false); ?>">編集</a><br>
                                    <a href="#" onclick="goDel(<?php echo e($acquisition->id, false); ?>)">削除</a>
                                </td>
                                <td>
                                    <?php if($acquisition->status==1): ?>
                                    ＯＫ
                                    <?php elseif($acquisition->status==2): ?>
                                    営業戻し

                                    <?php elseif($acquisition->status==3): ?>
                                    ＮＧ

                                    <?php elseif($acquisition->status==4): ?>
                                    後確前
                                    <?php elseif($acquisition->status==5): ?>
                                    後確途中

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($acquisition->confirm_time, false); ?></td>
                                <td><?php echo e($acquisition->application_at, false); ?></td>
                                <td><?php echo e($acquisition->branch->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->team->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->appointer->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->closer->name ?? '', false); ?></td>

                                <td><?php echo e($acquisition->tel, false); ?></td>
                                <td><?php echo e($acquisition->mobile, false); ?></td>
                                <td><?php echo e($acquisition->name, false); ?></td>
                                <td><?php echo e($acquisition->kana, false); ?></td>
                                <td><?php echo e($acquisition->birsth_date, false); ?></td>
                                <td><?php echo e($acquisition->interlocutor, false); ?></td>
        
                            </tr>>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>


                    <h2>後確ＯＫ</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>操作</th>
                                <th>後確結果</th>
                                <th>後確依頼時間</th>
                                <th>申込日</th>
                                <th>拠点</th>
                                <th>チーム</th>
                                <th>アポインター</th>
                                <th>クローザー</th>
                                <th>固定電話</th>
                                <th>携帯電話番号</th>
                                <th>申込者</th>
                                <th>フリガナ</th>
                                <th>生年月日</th>
                                <th>対話者</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $acquisitions3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$acquisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="/acquisitions/edit/<?php echo e($acquisition->id, false); ?>">編集</a><br>
                                    <a href="#" onclick="goDel(<?php echo e($acquisition->id, false); ?>)">削除</a>
                                </td>
                                <td>
                                    <?php if($acquisition->status==1): ?>
                                    ＯＫ
                                    <?php elseif($acquisition->status==2): ?>
                                    営業戻し

                                    <?php elseif($acquisition->status==3): ?>
                                    ＮＧ

                                    <?php elseif($acquisition->status==4): ?>
                                    後確前
                                    <?php elseif($acquisition->status==5): ?>
                                    後確途中

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($acquisition->confirm_time, false); ?></td>
                                <td><?php echo e($acquisition->application_at, false); ?></td>
                                <td><?php echo e($acquisition->branch->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->team->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->appointer->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->closer->name ?? '', false); ?></td>

                                <td><?php echo e($acquisition->tel, false); ?></td>
                                <td><?php echo e($acquisition->mobile, false); ?></td>
                                <td><?php echo e($acquisition->name, false); ?></td>
                                <td><?php echo e($acquisition->kana, false); ?></td>
                                <td><?php echo e($acquisition->birsth_date, false); ?></td>
                                <td><?php echo e($acquisition->interlocutor, false); ?></td>
        
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>


                    <h2>再営業OK</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>操作</th>
                                <th>後確結果</th>
                                <th>後確依頼時間</th>
                                <th>申込日</th>
                                <th>拠点</th>
                                <th>チーム</th>
                                <th>アポインター</th>
                                <th>クローザー</th>
                                <th>固定電話</th>
                                <th>携帯電話番号</th>
                                <th>申込者</th>
                                <th>フリガナ</th>
                                <th>生年月日</th>
                                <th>対話者</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $acquisitions4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$acquisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="/acquisitions/edit/<?php echo e($acquisition->id, false); ?>">編集</a><br>
                                    <a href="#" onclick="goDel(<?php echo e($acquisition->id, false); ?>)">削除</a>
                                </td>
                                <td>
                                    <?php if($acquisition->status==1): ?>
                                    ＯＫ
                                    <?php elseif($acquisition->status==2): ?>
                                    営業戻し

                                    <?php elseif($acquisition->status==3): ?>
                                    ＮＧ

                                    <?php elseif($acquisition->status==4): ?>
                                    後確前
                                    <?php elseif($acquisition->status==5): ?>
                                    後確途中

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($acquisition->confirm_time, false); ?></td>
                                <td><?php echo e($acquisition->application_at, false); ?></td>
                                <td><?php echo e($acquisition->branch->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->team->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->appointer->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->closer->name ?? '', false); ?></td>

                                <td><?php echo e($acquisition->tel, false); ?></td>
                                <td><?php echo e($acquisition->mobile, false); ?></td>
                                <td><?php echo e($acquisition->name, false); ?></td>
                                <td><?php echo e($acquisition->kana, false); ?></td>
                                <td><?php echo e($acquisition->birsth_date, false); ?></td>
                                <td><?php echo e($acquisition->interlocutor, false); ?></td>
        
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>


                    <h2>営業戻し</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>操作</th>
                                <th>後確結果</th>
                                <th>後確依頼時間</th>
                                <th>申込日</th>
                                <th>拠点</th>
                                <th>チーム</th>
                                <th>アポインター</th>
                                <th>クローザー</th>
                                <th>固定電話</th>
                                <th>携帯電話番号</th>
                                <th>申込者</th>
                                <th>フリガナ</th>
                                <th>生年月日</th>
                                <th>対話者</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $acquisitions5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$acquisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="/acquisitions/edit/<?php echo e($acquisition->id, false); ?>">編集</a><br>
                                    <a href="#" onclick="goDel(<?php echo e($acquisition->id, false); ?>)">削除</a>
                                </td>
                                <td>
                                    <?php if($acquisition->status==1): ?>
                                    ＯＫ
                                    <?php elseif($acquisition->status==2): ?>
                                    営業戻し

                                    <?php elseif($acquisition->status==3): ?>
                                    ＮＧ

                                    <?php elseif($acquisition->status==4): ?>
                                    後確前
                                    <?php elseif($acquisition->status==5): ?>
                                    後確途中

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($acquisition->confirm_time, false); ?></td>
                                <td><?php echo e($acquisition->application_at, false); ?></td>
                                <td><?php echo e($acquisition->branch->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->team->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->appointer->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->closer()->name ?? '', false); ?></td>

                                <td><?php echo e($acquisition->tel, false); ?></td>
                                <td><?php echo e($acquisition->mobile, false); ?></td>
                                <td><?php echo e($acquisition->name, false); ?></td>
                                <td><?php echo e($acquisition->kana, false); ?></td>
                                <td><?php echo e($acquisition->birsth_date, false); ?></td>
                                <td><?php echo e($acquisition->interlocutor, false); ?></td>
        
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>


                    <h2>後確ＮＧ</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>操作</th>
                                <th>後確結果</th>
                                <th>後確依頼時間</th>
                                <th>申込日</th>
                                <th>拠点</th>
                                <th>チーム</th>
                                <th>アポインター</th>
                                <th>クローザー</th>
                                <th>固定電話</th>
                                <th>携帯電話番号</th>
                                <th>申込者</th>
                                <th>フリガナ</th>
                                <th>生年月日</th>
                                <th>対話者</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $acquisitions6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$acquisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="/acquisitions/edit/<?php echo e($acquisition->id, false); ?>">編集</a><br>
                                    <a href="#" onclick="goDel(<?php echo e($acquisition->id, false); ?>)">削除</a>
                                </td>
                                <td>
                                    <?php if($acquisition->status==1): ?>
                                    ＯＫ
                                    <?php elseif($acquisition->status==2): ?>
                                    営業戻し

                                    <?php elseif($acquisition->status==3): ?>
                                    ＮＧ

                                    <?php elseif($acquisition->status==4): ?>
                                    後確前
                                    <?php elseif($acquisition->status==5): ?>
                                    後確途中

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($acquisition->confirm_time, false); ?></td>
                                <td><?php echo e($acquisition->application_at, false); ?></td>
                                <td><?php echo e($acquisition->branch->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->team->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->appointer->name ?? '', false); ?></td>
                                <td><?php echo e($acquisition->closer->name ?? '', false); ?></td>

                                <td><?php echo e($acquisition->tel, false); ?></td>
                                <td><?php echo e($acquisition->mobile, false); ?></td>
                                <td><?php echo e($acquisition->name, false); ?></td>
                                <td><?php echo e($acquisition->kana, false); ?></td>
                                <td><?php echo e($acquisition->birsth_date, false); ?></td>
                                <td><?php echo e($acquisition->interlocutor, false); ?></td>
        
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/acquisition/list1.blade.php ENDPATH**/ ?>