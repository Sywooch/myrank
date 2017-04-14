<?php

$ip = Yii::$app->geoip->ip();

echo $ip->city."<br/>"; // "San Francisco"
echo $ip->country."<br/>"; // "United States"
echo $ip->location->lng."<br/>"; // 37.7898
echo $ip->location->lat."<br/>"; // -122.3942
echo $ip->isoCode."<br/>"; // "US"
// without UI
?>

<?php

?>