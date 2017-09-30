<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
$outItems = [];
$outVal = [];
$userVal = [];
$check = 0;

/*
foreach (isset($allList[0]) ? $allList[0] : [] as $key => $item) {
    if((isset($allList[$key]) && count($allList[$key]) > 0) || (isset($userList[$key]) && (count($userList[$key]) > 0))) {
        $outItems[] = $item;
        $outVal[$key] = isset($list[$key]) ? $list[$key] : 0;
        $userVal[$key] = isset($userList[$key]) ? $userList[$key] : 0;
        $check++;
    }
}
 * 
 */

foreach (isset($allList['full'][0]) ? $allList['full'][0] : [] as $key => $item) {
    if((isset($allList[$key]) && count($allList[$key]) > 0) || (isset($userList[$key]) && (count($userList[$key]) > 0))) {
        $outItems[] = $item;
        $outVal[$key] = isset($list[$key]) ? $list[$key] : 0;
        $userVal[$key] = isset($userList[$key]) ? $userList[$key] : 0;
        $check++;
    }
}

?>
<div class="b-diagramm b-block">
    <div class="b-title"><?= \Yii::t('app','MARKS_DIAGRAM'); ?></div>
    <div class="b-diagramm__content">
        <?php if($check == 0) { ?>
            <img src="/images/imgpsh_fullsize.jpg" />
        <?php } else { ?>
	<canvas id="myChart" width="340" height="340"></canvas>
        <?php } ?>
    </div>
</div>
<?php
$myViewDiagram = $myView ? "{
                    label: '" . Yii::t('app', 'SELF_ASSESSMENT') . "',
                    backgroundColor: color('rgb(255, 0, 0)').alpha(0.4).rgbString(),
                    borderColor: 'rgb(255, 0, 0)',
                    pointBackgroundColor: 'rgb(255, 0, 0)',
                    data: [". implode(",", $userVal)."]
                }" : "";
if($check != 0) {
    $this->registerJs("var ctx = document.getElementById('myChart').getContext('2d');
        var color = Chart.helpers.color;
        var myRadarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: [" . "\"" . implode("\",\"", $outItems) . "\"" . "],
                datasets: [{
                        label: '" . Yii::t('app', 'OTHER_ASSESSMENT') . "',
                        backgroundColor: color('rgb(54, 162, 235)').alpha(0.4).rgbString(),
                        borderColor: 'rgb(54, 162, 235)',
                        pointBackgroundColor: 'rgb(54, 162, 235)',
                        data: [". implode(",", $outVal)."]
                    },$myViewDiagram
                ]
            },
            //options: options
        });", yii\web\View::POS_END);
}
?>


