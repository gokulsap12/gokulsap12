    var time = new Date();
	var hour = time.getHours();
	
	if(hour<12){
	document.write("<p>Good Morning!</p>")
	}
	else if(hour<17){
		document.write("<p>Good Afternoon!<p>")
	}else{
		document.write("<p>Good Evening!</p>")
	};
