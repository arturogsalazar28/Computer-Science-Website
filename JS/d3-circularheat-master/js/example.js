//function createChart(gradeData){

var chart = circularHeatChart()
    .segmentHeight(50)
    .innerRadius(80)
    .numSegments(12)
	.margin({top: 20, right: 20, bottom: 20, left: 20});


/* An array of objects */
data = [];
for(var i=0; i<12; i++) {
    data[i] = {title: "Practice Quiz "+ ((i+1)%13), value: 0};
}
for(var i=12; i<24; i++) {
    data[i] = {title: "Assignment "+ ((i+2)%13), value: 0};
}
for(var i=24; i<36; i++) {
    data[i] = {title: "Quiz "+ ((i+3)%13), value: 0};
}

//for(i=0; i<gradeData.size; i++){
//	data[i] = {title: data[i].title,value:gradeData.i};}

for(var i=0; i<36; i++){
	var rand = Math.floor((Math.random() * 100) + 1);
	data[i] = {title: data[i].title,value:rand};
}

chart.accessor(function(d) {return d.value;})
    .radialLabels(null)
    .segmentLabels(null);
d3.select('#chart4')
    .selectAll('svg')
    .data([data])
    .enter()
    .append('svg')
    .call(chart);

/*Completion Check*/
function completion(value){
	if(value == 0){
		return "not started";}
	if(value > 0 & value < 70){
		return "a failing grade of " + value;}
	if(value >=70 & value <100){
		return "a passing grade of " + value;}
	if(value == 100){
		return "a 100%";}
}

/* Add a mouseover event */
d3.selectAll("#chart4 path").on('mouseover', function() {
	var d = d3.select(this).data()[0];
    d3.select("#info").text(d.title + ' is ' + completion(d.value)) +'.';
});
d3.selectAll("#chart4 path").on('click', function() {
	var d = d3.select(this).data()[0];
	if(d.title.indexOf("Practice") > -1){
		
		var number = d.title.substr(14,2);	
		
		window.location.href = './pquiz' +  number + '.php';
		
	}
	else if(d.title.indexOf("Assignment") > -1){
		
		var number = d.title.substr(11,2);	
	
		window.location.href = './assignment' +  number + '.php'
		
	}
	else if(d.title.indexOf("Quiz") > -1){
		
		var number = d.title.substr(5,2);	
	
		window.location.href = './quiz' +  number + '.php'
		
	}
    d3.select("#info").text(d.title + ' is ' + completion(d.value)) +'.';
});
d3.selectAll("#chart4 svg").on('mouseout', function() {
    d3.select("#info").text('Mouse over to see your progress.');	
});
//}