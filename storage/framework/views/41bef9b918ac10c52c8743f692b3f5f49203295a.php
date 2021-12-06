<?php $__env->startSection('content'); ?>

<div class="container">





        
          <canvas id="score" class = "chart"></canvas>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

<script>

window.onload = function() {
//ロス回数
var ctx = document.getElementById("score");
var myChartSt = new Chart(ctx, {
    type: "horizontalBar"      //barで縦グラフ
    , data: {
        labels:  [ <?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->yyyymm, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
        , datasets: [
            {
                label: '決済フラグ'
                , borderWidth: 1
                , backgroundColor: "red"
                , borderColor: "red"
                , data: [<?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->data2, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }
            , {
                label: '開通済みかつ、決済のフラグ'
                , borderWidth: 1
                , backgroundColor: 'orange'
                , borderColor: 'orange'
                 , data: [<?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->data3, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }
            , {
                label: '決済不備フラグ'
                , borderWidth: 1
                , backgroundColor: 'green'
                , borderColor: 'green'
                 , data: [<?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->data4, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }
            , {
                label: '開通済み'
                , borderWidth: 1
                , backgroundColor: 'skyblue'
                , borderColor: 'skyblue'
                , data: [<?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->data5, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }
            ,{
                label: '待ち'
                , borderWidth: 1
                , backgroundColor: 'blue'
                , borderColor: 'blue'
                 , data: [<?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->data6, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }
            ,{
                label: '待ち(未定)'
                , borderWidth: 1
                , backgroundColor: 'yellow'
                , borderColor: 'yellow'
                 , data: [<?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->data7, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }
            ,{
                label: 'NTTF待ち'
                , borderWidth: 1
                , backgroundColor: 'chocolate'
                , borderColor: 'chocolate'
                 , data: [<?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->data8, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }
            ,{
                label: 'CXL'
                , borderWidth: 1
                , backgroundColor: 'pink'
                , borderColor: 'pink'
                 , data: [<?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->data9, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }
            ,{
                label: '解約'
                , borderWidth: 1
                , backgroundColor: 'black'
                , borderColor: 'black'
                 , data: [<?php $__currentLoopData = $monthDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($monthData->data10, false); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
            }
        ]
    }
    , options: {
        title: {
            display: true
            , text: '進捗確認'        //グラフの見出し
            , padding: 3
            , fontSize: 20
        }
        , scales: {
            yAxes: [
                { 
                    stacked: true              //積み上げ棒グラフの設定
                    , xbarThickness: 16        //棒グラフの幅
                    , scaleLabel: {            // 軸ラベル
                        display: true          // 表示設定
                        , labelString: '月'  // ラベル
                        , fontSize: 16         // フォントサイズ
                    }
                }
            ]
            , xAxes: [
                {
                    stacked: true               //積み上げ棒グラフにする設定
                    , scaleLabel: {             // 軸ラベル
                        display: false          // 表示設定
                        , labelString: ''  // ラベル
                        , fontSize: 16          // フォントサイズ
                    }
                }
            ]
        }
        , legend: {
            labels: {
                boxWidth:30
                , padding:20        //凡例の各要素間の距離
            }
            , display: true
        }
        , tooltips: {
            mode: "label"
        }
    }
});
};
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/analyze/index.blade.php ENDPATH**/ ?>