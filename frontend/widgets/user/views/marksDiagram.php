<?php
$this->registerJsFile("http://d3js.org/d3.v3.min.js", ['position' => \yii\web\View::POS_END]);
$this->registerJsFile("/js/RadarChart.js", ['position' => \yii\web\View::POS_END]);
?>
<div class="b-diagramm b-block">
    <div class="b-title">Диаграмма оценок</div>
    <div class="b-diagramm__content">
	<div id="chart"></div>
    </div>
</div>

<?php
$script = '
    var w = 200, h = 250;

var colorscale = d3.scale.category10();

//Legend titles
var LegendOptions = ["Smartphone","Tablet"];

//Data
var d = [
		  [';
foreach ($allList[0] as $key => $item) {
    $script .= '{axis:"' . $item . '",value:' . (isset($allList[$key]) ? summArr($allList[$key], $list) : 0) . '},';
}
$script .= ']
		];

//Options for the Radar chart, other than default
var mycfg = {
  w: w,
  h: h,
  maxValue: 0.6,
  levels: 6,
  ExtraWidthX: 140,
  ExtraWidthY: 50
}


RadarChart.draw("#chart", d, mycfg);

////////////////////////////////////////////
/////////// Initiate legend ////////////////
////////////////////////////////////////////

var svg = d3.select("#body")
	.selectAll("svg")
	.append("svg")
	.attr("width", w)
	.attr("height", h)

//Create the title for the legend
var text = svg.append("text")
	.attr("class", "title")
	.attr("transform", "translate(90,0)") 
	.attr("x", w - 70)
	.attr("y", 10)
	.attr("font-size", "12px")
	.attr("fill", "#404040")
	.text("What % of owners use a specific service in a week");
		
//Initiate Legend	
var legend = svg.append("g")
	.attr("class", "legend")
	.attr("height", 100)
	.attr("width", 200)
	.attr("transform", "translate(90,20)");
	
	//Create colour squares
	legend.selectAll("rect")
	  .data(LegendOptions)
	  .enter()
	  .append("rect")
	  .attr("x", w - 65)
	  .attr("y", function(d, i){ return i * 20;})
	  .attr("width", 10)
	  .attr("height", 10)
	  .style("fill", function(d, i){ return colorscale(i);});
	  
	//Create text next to squares
	legend.selectAll("text")
	  .data(LegendOptions)
	  .enter()
	  .append("text")
	  .attr("x", w - 52)
	  .attr("y", function(d, i){ return i * 20 + 9;})
	  .attr("font-size", "11px")
	  .attr("fill", "#737373")
	  .text(function(d) { return d; });
	  ';
$this->registerJs($script, \yii\web\View::POS_END);

function summArr($arr, $vals) {
    $summ = 0;
    foreach ($arr as $key => $item) {
	$summ += $vals[$key];
    }
    return $summ / count($arr) / 10;
}
?>