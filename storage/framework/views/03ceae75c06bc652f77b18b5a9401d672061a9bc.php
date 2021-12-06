                <dl class="menu_box">
                    <dt>
                        ジュエラー情報
                    </dt>
                    <dd>
                        <div class="data">
                            <div class="img_box">
                                <img src="/assets/images/jeweller/img01.jpg" alt="">
                            </div>
                            <p class="name">
                                <?php echo e($jeweller->name, false); ?>

                            </p>
                        </div>
                        <ul class="nav_menu">
                            <li><a href="/jeweller/detail/<?php echo e($jeweller->id, false); ?>#pagetop"><?php echo e($jeweller->name, false); ?>さんのプロフィールTOP</a></li>
                            <li><a href="/jeweller/<?php echo e($jeweller->id, false); ?>/product/">作品</a></li>
                            <li><a href="/jeweller/<?php echo e($jeweller->id, false); ?>/menu/">メニュー</a></li>
                            <li><a href="/jeweller/<?php echo e($jeweller->id, false); ?>/material/">素材・デザイン一覧</a></li>
                            <li><a href="/jeweller/detail/<?php echo e($jeweller->id, false); ?>#sec_evaluation">直近の評価</a></li>
                            <li><a href="/jeweller/">在籍ジュエラー一覧</a></li>
                        </ul>
                    </dd>
                </dl>
<?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/layouts/jeweller_front_menu.blade.php ENDPATH**/ ?>