<div class="dropdown" name="{{ $dateFilterName }}">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Date
  </button>
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
  $(function() {
    $('div[name="{{ $dateFilterName }}"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
  
    $('div[name="{{ $dateFilterName }}"]').on('apply.daterangepicker', function(ev, picker) {
      var startDate = picker.startDate.format('MM/DD/YYYY');
      var endDate = picker.endDate.format('MM/DD/YYYY');
      
      var $button = $(this).closest('div').find('button');

      $button.text(startDate + ' - ' + endDate);

      $.get('/available/ump', { start: startDate, end: endDate }, function(data) {
        $('#filtered-view').html(data);
      });
    });
  
    $('div[name="{{ $dateFilterName }}"]').on('cancel.daterangepicker', function(ev, picker) {
      var $button = $(this).closest('div').find('button');
      $button.text('Date');

      $.get('/available/ump', {clear: true}, function(data) {
        $('#filtered-view').html(data);
      });
    });
  });
</script>