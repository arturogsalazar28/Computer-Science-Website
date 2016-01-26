

var data = [1, 2, 3, 4, 2, 3, 4, 5, 3, 4, 5, 6, 4, 5, 6, 7];
var chart = circularHeatChart().innerRadius(100).numSegments(4).range(["white", "red"]);
d3.select('#graph')
    .selectAll('svg')
    .data([data])
    .enter()
    .append('svg')
    .call(chart);