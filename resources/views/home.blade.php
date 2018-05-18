@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="panel panel-default">   
      <div class="panel-heading">Dashboard</div>
      <div class="panel-body">
            <div id="calendar"></div>
      </div>
    </div>

</div>
<script type="text/javascript">
	
	$(document).ready(function() {
		

		
	});
	var baseUrl = "{{ url('/')}}";
	
		var calendarEvent = [];

		function calendar() {
			$.get('calendar/getDate', function(data) {
	
				for(var i=0; data.length > i; i++) {
					calendarEvent.push({
						'title': data[i].listingname + "-" + data[i].social_medianame,
						'start': data[i].start_date,
						'end': data[i].end_date,
						'allDay': 'true'
					});
				}

				console.log(calendarEvent);
				
				$('#calendar').fullCalendar({
					events: calendarEvent
				});
				
			});
		} 

		calendar();
</script>


@endsection
