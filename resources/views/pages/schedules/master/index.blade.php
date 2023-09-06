@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
		<div class="btn-group d-flex justify-content-center mt-3" role="group" aria-label="View Toggle">
				<button type="button" class="btn btn-primary" id="dataTableBtn">Data Table</button>
				<button type="button" class="btn btn-primary" id="calendarViewBtn">Calendar View</button>
		</div>

		<div id="dataView">
			@include('pages/schedules/master/data-view')
		</div>
		<div class="mt-3" id="calendarView" style="display: none;">
				<div id="calendar"></div>
		</div>

		<div class="modal fade" id="refereeModal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="modalCenterTitle">Referee Information</h5>
								<button
								type="button"
								class="btn-close"
								data-bs-dismiss="modal"
								aria-label="Close"
								></button>
						</div>
						
						<div class="modal-body" id="referee-modal-body">
								
						</div>                
						</div>
				</div>
		</div>
		<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="modalCenterTitle">Event Details</h5>
								<button
								type="button"
								class="btn-close"
								data-bs-dismiss="modal"
								aria-label="Close"
								></button>
						</div>
						<div class="modal-body">
								<ul id="eventDetailsList">
								</ul>
						</div>
				</div>
						</div>
				</div>
		</div>

</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.8/index.global.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
		document.addEventListener("DOMContentLoaded", function () {
				const dataTableBtn = document.getElementById("dataTableBtn");
				const calendarViewBtn = document.getElementById("calendarViewBtn");
				const dataView = document.getElementById("dataView");
				const calendarView = document.getElementById("calendarView");

				dataTableBtn.addEventListener("click", function () {
						dataView.style.display = "block";
						calendarView.style.display = "none";
				});

				calendarViewBtn.addEventListener("click", function () {
						dataView.style.display = "none";
						calendarView.style.display = "block";
								var calendarEl = document.getElementById('calendar');

				var calendar = new FullCalendar.Calendar(calendarEl, {
					// timeZone: 'Asia/Dhaka',
					themeSystem: 'bootstrap5',
					headerToolbar: {
						left: 'prev,next,today',
						center: 'title',
						right: 'multiMonthYear,dayGridMonth,timeGridWeek,timeGridDay,listMonth'
					},
					// footerToolbar: {
					// 	left: '',
					// 	center: '',
					// 	right: 'prev,next'
					// },
					weekNumbers: true,
					dayMaxEvents: true,
					events: '/api/master-schedules',
					editable: true,
					// eventBackgroundColor: 'red',
					// eventBorderColor: 'red',
					// eventColor: 'red'
					// eventTextColor: 'red'
					eventDisplay: 'block'
				});

				calendar.on('dateClick', function(info) {
					// alert('Clicked on: ' + info.dateStr);
					// alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
					// alert('Current view: ' + info.view.type);
					// info.dayEl.style.backgroundColor = 'red';
					calendar.changeView('timeGridDay', info.dateStr);
				});

				calendar.on('eventClick', function(info) {
					// alert('Event: ' + info.event.id);
					// alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
					// alert('View: ' + info.view.type);
					// info.el.style.borderColor = 'red';
					$(function() {
						$.get(`/api/master-schedules/${info.event.id}`, {}, function(data) {
							console.log(data);
							let eventDetailsHtml = [];
							const excludedFields = ['id', 'created_at', 'updated_at', 'home_team_id', 'away_team_id'];
							for (let key in data) {
									if (data.hasOwnProperty(key) && !excludedFields.includes(key)) {
											if (key === 'home_team' || key === 'away_team') {
													eventDetailsHtml.push(`<li><strong>${key}:</strong> ${data[key].name}</li>`);
											} else {
													eventDetailsHtml.push(`<li><strong>${key}:</strong> ${data[key]}</li>`);
											}
									}
							}
							$('#eventDetailsList').html(eventDetailsHtml.join(''));
							$('#eventModal').modal('show');
						});
					});
				});

				calendar.on('eventDrop', function(info) {
					if (!confirm("Are you sure about this change?")) {
						info.revert();
						return;
					}
					$(function() {
						console.log(info.event.start);
						// const startDate = moment.tz(info.event.start, 'Asia/Dhaka');
						const startDate = moment(info.event.start);
						const formattedDate = startDate.format('YYYY-MM-DD');
						const formattedTime = startDate.format('HH:mm:ss');


						// const startDate = new Date(info.event.start);
						// startDate.setHours(startDate.getHours() - 6);

						// const formattedDate = startDate.toISOString().split('T')[0];
						// const formattedTime = `${startDate.getHours().toString().padStart(2, '0')}:${startDate.getMinutes().toString().padStart(2, '0')}:${startDate.getSeconds().toString().padStart(2, '0')}`;

						const requestData = {
								date: formattedDate,
								time: formattedTime,
						};

						console.log(requestData);

						$.ajax({
							url: `/api/master-schedules/${info.event.id}`,
							type: 'PUT',
							dataType: 'json',
							data: requestData,
							success: function(data) {
								console.log(data);
								calendar.refetchEvents();
							},
							error: function(error) {
									console.error(error);
							}
						});
					});
				});
				calendar.render();
				});
		});
</script>
@endsection
