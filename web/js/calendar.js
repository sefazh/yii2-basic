var Script = function () {

    /* initialize the calendar
     -----------------------------------------------------------------*/

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();


    console.log(d);
    console.log(m);
    console.log(y);

    $('#calendar').fullCalendar({
        isRTL: false,
        firstDay: 0,
        monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
        monthNamesShort: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
        dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
        dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
        buttonText: {
            prev: "<span class='fc-text-arrow'>&lsaquo;</span>",
            next: "<span class='fc-text-arrow'>&rsaquo;</span>",
            prevYear: "<span class='fc-text-arrow'>&laquo;</span>",
            nextYear: "<span class='fc-text-arrow'>&raquo;</span>",
            today: '返回今天',
            month: '月',
            week: '周',
            day: '日'
        },
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        editable: true,
        events: '/ajax-calendar/events',

        dayClick: function(date, allDay, jsEvent, view) {
            console.log(date);
            var selDate =$.fullCalendar.formatDate(date,'yyyy-MM-dd');
            $.fancybox({
                'type':'ajax',
                'href':'/calendar/event?date='+selDate
            });
        },
        eventClick: function(event, jsEvent, view) {
            console.log('event click');
            console.log(event);
            // console.log(jsEvent);
            // console.log(view);
        },
    });


}();