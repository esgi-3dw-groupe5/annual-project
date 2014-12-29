$(document).ready(function(){
	dateClock.clock.startClock('clock');
});
var pastTime = 0;
function dateClock(){}

dateClock.clock = {
	startClock : function startTime(elem) {
	    var today=new Date();
	    var h=today.getHours();
	    var m=today.getMinutes();
	    var s=today.getSeconds();
	    h = dateClock.clock.checkTime(h);
	    m = dateClock.clock.checkTime(m);
	    s = dateClock.clock.checkTime(s);

	    var container = '<div class="clock-display">'+
		    				'<span id="clock_h">'+h+'</span>'+
		    				'<span id="clock_col"> : </span>'+
	    					'<span id="clock_m">'+m+'</span>'+
    					'</div>';
	    $('#'+elem).html(container);

	    var t = setTimeout(function(){dateClock.clock.startClock(elem)},500);

	    return today;
	},

	checkTime : function checkTime(i) {
	    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
	    return i;
	},

	getElapsedTime : function(){
		
		var today = new Date();

		var elepsedTime = setTimeout(today.getSeconds(),1) - pastTime;

		pastTime = setTimeout(today.getSeconds(),1);

		// console.log(elepsedTime);
		
		return elepsedTime;
	}
}