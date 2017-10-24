$(function(){
	
	var note = $('#note'),
		ts = new Date(2016,2,31), // 23 September 2013 YYYY/MM/DD where MM-1 is 9-1=8=Sept as Jan=0
		newYear = true;

	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		// ts = (new Date()).getTime() + 10*24*60*60*1000;  //
		ts = (new Date(2016,3,31,4,0,0));
		newYear = true;
	}

	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";

			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " ";

			if(newYear){
				message += "until the day of the event";
			}
			else {
				message += "until the day of the event";
			}
			
			note.html(message);
		}
	});
	
});
