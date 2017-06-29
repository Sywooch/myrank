<?php
$ip = Yii::$app->geoip->ip();

echo $ip->city . "<br/>"; // "San Francisco"
echo $ip->country . "<br/>"; // "United States"
echo $ip->location->lng . "<br/>"; // 37.7898
echo $ip->location->lat . "<br/>"; // -122.3942
echo $ip->isoCode . "<br/>"; // "US"
// without UI
?>

<script type="text/javascript" src="/js/chart/Chart.bundle.min.js"></script>
<script type="text/javascript" src="/js/chart/utils.js"></script>
<div style="width:40%">
    <canvas id="myChart" width="400" height="400"></canvas>
</div>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var color = Chart.helpers.color;
    var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Running', 'Swimming', 'Eating', 'Cycling'],
            datasets: [{
                    backgroundColor: color('rgb(54, 162, 235)').alpha(0.4).rgbString(),
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    data: [20, 10, 4, 2]
                }]
        },
        //options: options
    });
</script>