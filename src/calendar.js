
$(function() {
  var dateRanges = [
    { 'start': moment('2018-10-11 10:50'), 'end': moment('2018-10-13 10:50') },
    { 'start': moment('2018-10-15 10:50'), 'end': moment('2018-10-18 10:50') },
    { 'start': moment('2018-10-23 10:50'), 'end': moment('2018-10-29 10:50') }
];
    $('input[name="datetimes"]').daterangepicker({
      timePicker: true,
      startDate: moment().startOf('hour'),
      minDate: moment(),
      timePicker24Hour: true,
      endDate: moment().startOf('hour').add(32, 'hour'),
      locale: {
        format: 'M/DD hh:mm A'
      },
      isInvalidDate: function(date) {
        return dateRanges.reduce(function(bool, range) {
            return bool || (date >= range.start && date <= range.end);
        }, false);
  }
})
});