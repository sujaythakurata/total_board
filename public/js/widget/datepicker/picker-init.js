//custom functions here prismic Reflections
//date picker start
if (top.location != location) {
    top.location.href = document.location.href;
}
$(function () {
    window.prettyPrint && prettyPrint();
    //single date picker
    $('.default-date-picker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    });
    //default year
    $('.default-year').datepicker({
        format: 'yyyy',
        autoclose: true,
        minViewMode: "years"
    });

    //eefault months
    $('.default-months').datepicker({
        format: 'MM',
        autoclose: true,
        minViewMode: "months"
    });
    //multiple date
    $('.multidate-picker').datepicker({
        format: 'mm-dd-yyyy',
        autoclose: false,
        multidate: true
    });
      

      //week picker
    var container, display, input, datepicker, dates;
  
  dates = [];
  container = $('#week-picker');
  input = $('#firstDate');
  display = container.find('.form-control');

  container.datepicker({
      weekStart: 3,
      beforeShowDay: function (date) {
        var i, j;
        for(i = 0, j = dates.length; i < j; i += 1)  {
          if (dates[i].getTime() === date.getTime()) {
            return { classes: 'active' };
          }
        }
      }
  });
  datepicker = container.data('datepicker');
  
  // This take weekStart option as a week base
  // But it can be removed if needed
  function setDates(date) {
    var diffToWeekStart, weekStart, i, nd;
    diffToWeekStart = datepicker.o.weekStart - date.getDay();
    if (diffToWeekStart > 0) {
      diffToWeekStart = diffToWeekStart-7;
    }
    
    // Getting first day of the week
    weekStart = new Date(date.valueOf());
    weekStart.setDate(weekStart.getDate() + diffToWeekStart);
    input.val(weekStart.toISOString());
    
    // Saving week days
    dates = [];
    for(i = 0; i < 7; i += 1) {
      nd = new Date(weekStart.valueOf());
      nd.setDate(nd.getDate() + i);
      dates.push(nd);
    }
    datepicker.update();
  }
  
  function setDisplay() {
    display.html(dates[0].toDateString() + ' - ' + dates[6].toDateString());
  }
  
  container.on('changeDate', function () {
    setDates(datepicker.getDate());
    setDisplay();
  });
  
  // Propagate display click to bootstrap group-addon
  display.on('click', function () {
    container.find('.input-group-addon').trigger('click');
  });


    /*
    $('.dpYears').datepicker({
        autoclose: true
    });
    $('.dpMonths').datepicker({
        autoclose: true
    });
    $('.day-day').datepicker({
        format: 'DD',
        autoclose: true,
        minViewMode: "days"
    });

    $('.multidate-picker-calender').datepicker({autoclose: false, multidate: true});
    $('.multidate-picker-calender').on('changeDate', function () {
        $('.my_hidden_input').val(
                $('.multidate-picker-calender').datepicker('getFormattedDate')
                );
    });

    $('.input-daterange input').each(function () {
        $(this).datepicker('clearDates');
    });
    var startDate = new Date(2012, 1, 20);
    var endDate = new Date(2012, 1, 25);
    $('.dp4').datepicker()
            .on('changeDate', function (ev) {
                if (ev.date.valueOf() > endDate.valueOf()) {
                    $('.alert').show().find('strong').text('The start date can not be greater then the end date');
                } else {
                    $('.alert').hide();
                    startDate = new Date(ev.date);
                    $('#startDate').text($('.dp4').data('date'));
                }
                $('.dp4').datepicker('hide');
            });
    $('.dp5').datepicker()
            .on('changeDate', function (ev) {
                if (ev.date.valueOf() < startDate.valueOf()) {
                    $('.alert').show().find('strong').text('The end date can not be less then the start date');
                } else {
                    $('.alert').hide();
                    endDate = new Date(ev.date);
                    $('.endDate').text($('.dp5').data('date'));
                }
                $('.dp5').datepicker('hide');
            });

    // disabling dates
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('.dpd1').datepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('.dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('.dpd2').datepicker({
        onRender: function (date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        checkout.hide();
    }).data('datepicker');


//for toggle year
    $('#year-checkbox').click(function () {
        if ($(this).prop("checked") === true) {
            //alert("Checkbox is checked.");            
          $('#day-wrap, #month-wrap').hide();
          $('#year-wrap').show();
        }
        else if ($(this).prop("checked") === false) {
            //alert("Checkbox is unchecked.");
            $('#day-wrap, #month-wrap, #year-wrap').show();
          
        }
    });
*/
});
//date picker end