//json encode php array is used as the variable for getmagicpoints

function getMagicPoints(arr){

	//create 3x3 tile board
	//top row is t/f
	//next row is mc
	//next row is free response
	
	//var arr = JSON.parse(jsontext);//	not work right?!?!
	
	var output = type = '' ;
	for(var i = 0; i < 9; i++){
		if(i>=0 && i<3){type = 1};
		if(i>=3 && i<6){type = 2};
		if(i>=6 && i<9){type = 3};
		output += '<div id="mp_'+(i+1)+'" onclick="tileClick(this,'+arr[i].id+',\''+arr[i].q+'\',\''+arr[i].a1+'\',\''+arr[i].a2+'\',\''+arr[i].a3+'\',\''+arr[i].a4+'\','+type+')"></div>';
		
		if(((i+1)%3)==0){output+= '</br>';}
	}
	document.getElementById('magicquestions').innerHTML = output;
	// two dimensional array
	//var items = [[1,2],[3,4],[5,6]];
	//alert(items[0][0]); // 1
	
	
	//on.click of tile display question and answer choices
	//also a submit button
	
	//if question is wrong mark wrong unable to try again for 24 hours
	//if right mark right as +.5,1.0,1.5
	
	
}

function tileClick(tile, id, q, a1, a2, a3, a4, type){
	
	var magic = "<form action='' method='post' name='quiz'>";
	switch(type){
		case 1: magic += '<P>'+ q +'<BR><input type="radio" name="q1" value="'+a1+'"> a)'+a1+'<BR><input type="radio" name="q1" value="'+a2+'"> b)'+a2+'<BR></p><BR>';
				break;
		case 2: magic += '<P>'+ q +'<BR><input type="radio" name="q1" value="' + a1+ '"> a) ' +a1 + '<BR><input type="radio" name="q1" value="' + a2+ '"> b) ' +a2 + '<BR><input type="radio" name="q1" value="' + a3+ '"> c) ' + a3 + '<BR><input type="radio" name="q1" value="' + a4 + '"> d) ' + a4 + '<BR></p><BR>';
				break;
		case 3: magic += '<P>'+ q +'<BR>Answer: <input type="text" name="q1" value=""><BR></p><BR>';
				break;
		default:magic += 'Glitch in the matrix';
	}
	
	magic += '<input type="hidden" name="id" value="' + id + '"> <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" value="Submit">';
	
	document.getElementById('magicquiz').innerHTML = magic;
	
}

function showSomething(){
	document.getElementById('magicquiz').innerHTML = "quiz";
	document.getElementById('magicquestions').innerHTML = "questions";
}