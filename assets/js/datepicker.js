$(document).ready(function(){
	datepicker.date.datebox();
	$('#date').focus(function(){
		$('#core-datebox').toggle(true);
	});
	$('#close').click(function(){
		$('#core-datebox').toggle(false);
	});
});
function datepicker(){};
	datepicker.date = {
		datebox : function datebox(){
				var d = new Date();
				var year = d.getFullYear();
				var month = d.getMonth()+1;
				var day = d.getDate();
				var datebox =	'<div id="core-datebox" style="display:none;">'+
									'<div id="header-datebox">'+
										'<span>'+
											'<button type="button" id="d_left" class="date-arrow-left" style="display:none;"> < </button>'+
											'<button type="button" id="m_left" class="date-arrow-left" style="display:none;"> < </button>'+
											'<button type="button" id="y_left" class="date-arrow-left"> < </button>'+

											'<button type="button" id="centre" class="date-arrow"> ° </button>'+

											'<button type="button" id="d_right" class="date-arrow-right" style="display:none;"> > </button>'+
											'<button type="button" id="m_right" class="date-arrow-right" style="display:none;"> > </button>'+
											'<button type="button" id="y_right" class="date-arrow-right"> > </button>'+
										'</span>'+
										'<span>'+
											'<button type="button" id="day">day</button>'+
											'<button type="button" id="month">month</button>'+
											'<button type="button" id="year">year</button>'+
											'<button type="button" id="close"> x </button>'+
										'</span>'+
										'<div id="current-date">'+
											day+'/'+month+'/'+year+
										'</div>'+
									'</div>'+
									'<div id="id="body-datebox"">'+
										'<div class="head-day">'+
											'<span class="picker-day-letter">Sun</span>'+
											'<span class="picker-day-letter">Mon</span>'+
											'<span class="picker-day-letter">Tue</span>'+
											'<span class="picker-day-letter">Wed</span>'+
											'<span class="picker-day-letter">Thu</span>'+
											'<span class="picker-day-letter">Fri</span>'+
											'<span class="picker-day-letter">Sat</span>'+
										'</div>'+
										'<div id="head-number" class="head-number">'+
										'</div>'+
									'</div>'+
								'</div>';

				$('#date').after(datebox);
				var daynumber = datepicker.date.daysInMonth(month,year,day);
				$('#head-number').append(daynumber);

				$('#date').val(day+'/'+month+'/'+year);

					$('#day').click(function(){
						$('#d_left').toggle(true);
						$('#d_right').toggle(true);
						
						$('#m_left').toggle(false);
						$('#m_right').toggle(false);
						
						$('#y_left').toggle(false);
						$('#y_right').toggle(false);

					});
					$('#month').click(function(){
						$('#d_left').toggle(false);
						$('#d_right').toggle(false);

						$('#m_left').toggle(true);
						$('#m_right').toggle(true);
						
						$('#y_left').toggle(false);
						$('#y_right').toggle(false);

					});
					$('#year').click(function(){
						$('#d_left').toggle(false);
						$('#d_right').toggle(false);

						$('#m_left').toggle(false);
						$('#m_right').toggle(false);
						
						$('#y_left').toggle(true);
						$('#y_right').toggle(true);

					});
					// ------Event trigger------
					$('#y_left').click(function(){
						d.setFullYear(d.getFullYear()-1);
						year = d.getFullYear();
						month = d.getMonth()+1;
						day = d.getDate();
						var daynumber = datepicker.date.daysInMonth(month,year,day);
						$('#head-number').html('');
						$('#head-number').append(daynumber);
							$('.picker-day')
									.css('display','inline-block')
									.css('text-align','center')
									.css('padding','0 4px')
									.css('width','28px')
									.css('color','#000')
									.css('background-color','#f5f5f5')
									.css('border','solid #ccc 1px');
							$('.selected').css('background-color','lightgrey');
						var o = "";
						var u = "";
						if(day<10){o="0";}
						if(month<10){u="0";}
						$('#date').val(o+day+'/'+u+month+'/'+year);
						$('#current-date').html(o+day+'/'+u+month+'/'+year);
					});

					$('#y_right').click(function(){
						d.setFullYear(d.getFullYear()+1);
						year = d.getFullYear();
						month = d.getMonth()+1;
						day = d.getDate();
						var daynumber = datepicker.date.daysInMonth(month,year,day);
						$('#head-number').html('');
						$('#head-number').append(daynumber);
							$('.picker-day')
									.css('display','inline-block')
									.css('text-align','center')
									.css('padding','0 4px')
									.css('width','28px')
									.css('color','#000')
									.css('background-color','#f5f5f5')
									.css('border','solid #ccc 1px');
							$('.selected').css('background-color','lightgrey');
						var o = "";
						var u = "";
						if(day<10){o="0";}
						if(month<10){u="0";}
						$('#date').val(o+day+'/'+u+month+'/'+year);
						$('#current-date').html(o+day+'/'+u+month+'/'+year);
					});
					// ------Event trigger------
					$('#m_left').click(function(){
						d.setMonth(d.getMonth()-1);
						year = d.getFullYear();
						month = d.getMonth()+1;
						day = d.getDate();
						var daynumber = datepicker.date.daysInMonth(month,year,day);
						$('#head-number').html('');
						$('#head-number').append(daynumber);
							$('.picker-day')
									.css('display','inline-block')
									.css('text-align','center')
									.css('padding','0 4px')
									.css('width','28px')
									.css('color','#000')
									.css('background-color','#f5f5f5')
									.css('border','solid #ccc 1px');
							$('.selected').css('background-color','lightgrey');
						var o = "";
						var u = "";
						if(day<10){o="0";}
						if(month<10){u="0";}
						$('#date').val(o+day+'/'+u+month+'/'+year);
						$('#current-date').html(o+day+'/'+u+month+'/'+year);
					});

					$('#m_right').click(function(){
						d.setMonth(d.getMonth()+1);
						year = d.getFullYear();
						month = d.getMonth()+1;
						day = d.getDate();
						var daynumber = datepicker.date.daysInMonth(month,year,day);
						$('#head-number').html('');
						$('#head-number').append(daynumber);
							$('.picker-day')
									.css('display','inline-block')
									.css('text-align','center')
									.css('padding','0 4px')
									.css('width','28px')
									.css('color','#000')
									.css('background-color','#f5f5f5')
									.css('border','solid #ccc 1px');
							$('.selected').css('background-color','lightgrey');
						var o = "";
						var u = "";
						if(day<10){o="0";}
						if(month<10){u="0";}
						$('#date').val(o+day+'/'+u+month+'/'+year);
						$('#current-date').html(o+day+'/'+u+month+'/'+year);
					});
					// ------Event trigger------
					$('#d_left').click(function(){
						d.setDate(d.getDate()-1);
						year = d.getFullYear();
						month = d.getMonth()+1;
						day = d.getDate();
						var daynumber = datepicker.date.daysInMonth(month,year,day);
						$('#head-number').html('');
						$('#head-number').append(daynumber);
							$('.picker-day')
									.css('display','inline-block')
									.css('text-align','center')
									.css('padding','0 4px')
									.css('width','28px')
									.css('color','#000')
									.css('background-color','#f5f5f5')
									.css('border','solid #ccc 1px');
							$('.selected').css('background-color','lightgrey');
						var o = "";
						var u = "";
						if(day<10){o="0";}
						if(month<10){u="0";}
						$('#date').val(o+day+'/'+u+month+'/'+year);
						$('#current-date').html(o+day+'/'+u+month+'/'+year);
					});

					$('#d_right').click(function(){
						d.setDate(d.getDate()+1);
						year = d.getFullYear();
						month = d.getMonth()+1;
						day = d.getDate();
						var daynumber = datepicker.date.daysInMonth(month,year,day);
						$('#head-number').html('');
						$('#head-number').append(daynumber);
							$('.picker-day')
									.css('display','inline-block')
									.css('text-align','center')
									.css('padding','0 4px')
									.css('width','28px')
									.css('color','#000')
									.css('background-color','#f5f5f5')
									.css('border','solid #ccc 1px');
							$('.selected').css('background-color','lightgrey');
						var o = "";
						var u = "";
						if(day<10){o="0";}
						if(month<10){u="0";}
						$('#date').val(o+day+'/'+u+month+'/'+year);
						$('#current-date').html(o+day+'/'+u+month+'/'+year);
					});

					$('#centre').click(function(){
						d = new Date();
						year = d.getFullYear();
						month = d.getMonth()+1;
						day = d.getDate();
						var daynumber = datepicker.date.daysInMonth(month,year,day);
						$('#head-number').html('');
						$('#head-number').append(daynumber);
							$('.picker-day')
									.css('display','inline-block')
									.css('text-align','center')
									.css('padding','0 4px')
									.css('width','28px')
									.css('color','#000')
									.css('background-color','#f5f5f5')
									.css('border','solid #ccc 1px');
							$('.selected').css('background-color','lightgrey');
						var o = "";
						var u = "";
						if(day<10){o="0";}
						if(month<10){u="0";}
						$('#date').val(o+day+'/'+u+month+'/'+year);
						$('#current-date').html(o+day+'/'+u+month+'/'+year);
					});

				$('#core-datebox')
					.css('border','solid #ccc 1px')
					.css('float','right')
					// .css('width','225px')	
					.css('position','absolute')
					.css('top','0')
					.css('background-color','#f5f5dc');
				$('.picker-day-letter')
					.css('display','inline-block')
					.css('text-align','center')
					.css('padding','0 4px')
					.css('width','28px')
					.css('border-bottom','0 4px')
					.css('color','#000')
					.css('background-color','lightgrey')
					.css('border','solid #ccc 1px');
				$('.picker-day')
						.css('display','inline-block')
						.css('text-align','center')
						.css('padding','0 4px')
						.css('width','28px')
						.css('color','#000')
						.css('background-color','#f5f5f5')
						.css('border','solid #ccc 1px');
				$('#current-date')
					.css('text-align','center');
				$('.selected').css('background-color','lightgrey');
			},

		daysInMonth : function daysInMonth(month,year,day) {
					    var nbDay =  new Date(year, month, 0).getDate();
					    var fstDay =  datepicker.date.daysInWeek(month,year); 
					    var daynumber = "";
					    var idx=0;
					    for(d=0;d<fstDay;d++){
					    	idx++;
					    	daynumber += '<span class="picker-day">&nbsp;</span>';
					    	if(idx%7==0)daynumber+='<br>';
					    }
					    for(i=1;i<=nbDay;i++){
						    var current = "";
					        var o = "";
					    	idx++;
					    	if(day==i){current="selected"}
					    	if(i<10){o=0;}
					    	daynumber += '<span class="picker-day '+current+'">'+o+i+'</span>';
					    	if(idx%7==0)daynumber+='<br>';
					    }
					    return daynumber;
					},

		daysInWeek : function daysInWeek(month,year){
						day =  new Date(year, month-1, 1).getDay();
						var weekday = new Array(7);
						weekday[0]=  "Sun";
						weekday[1] = "Mon";
						weekday[2] = "Tue";
						weekday[3] = "Wed";
						weekday[4] = "Thu";
						weekday[5] = "Fri";
						weekday[6] = "Sat";

						// return weekday[day];
						return day;
						}

}