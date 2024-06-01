window.onload=function(){
	var today = new Date().toISOString().split('T')[0];
	document.getElementsByName("setTodaysDate")[0].setAttribute('min', today);
}

function daysDifference() {  
	 var dateI1 = document.getElementById("checkin").value;  
	 var dateI2 = document.getElementById("checkout").value;  

	//define two date object variables to store the date values  
	 var date1 = new Date(dateI1);  
	 var date2 = new Date(dateI2);  

	//calculate time difference  
	 var time_difference = date2.getTime() - date1.getTime();  

	 //calculate days difference by dividing total milliseconds in a day  
	 var result = time_difference / (1000 * 60 * 60 * 24);  

	return document.getElementById("result").innerHTML = result + " days. ";  
}  