<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
$outItems = [];
$outVal = [];
$userVal = [];
foreach (isset($allList[0]) ? $allList[0] : [] as $key => $item) {
    if(isset($allList[$key]) && count($allList[$key]) > 0) {
        $outItems[] = $item;
        $outVal[] = isset($list[$key]) ? $list[$key] : 0;
        $userVal[] = isset($userList[$key]) ? $userList[$key] : 0;
    }
}
?>
<div class="b-diagramm b-block">
    <div class="b-title"><?= \Yii::t('app','MARKS_DIAGRAM'); ?></div>
    <div class="b-diagramm__content">
	<canvas id="myChart" width="340" height="340"></canvas>
    </div>
</div>
<?php
$this->registerJs("var ctx = document.getElementById('myChart').getContext('2d');
    var color = Chart.helpers.color;
    var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: [" . "\"" . implode("\",\"", $outItems) . "\"" . "],
            datasets: [{
                    label: 'Другие',
                    backgroundColor: color('rgb(54, 162, 235)').alpha(0.4).rgbString(),
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    data: [". implode(",", $outVal)."]
                },{
                    label: 'Самооценка',
                    backgroundColor: color('rgb(255, 0, 0)').alpha(0.4).rgbString(),
                    borderColor: 'rgb(255, 0, 0)',
                    pointBackgroundColor: 'rgb(255, 0, 0)',
                    data: [". implode(",", $userVal)."]
                }
            ]
        },
        //options: options
    });", yii\web\View::POS_END);
?>


