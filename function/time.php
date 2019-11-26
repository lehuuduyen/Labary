<script type="text/javascript">
    Date.prototype.addMinutes = function (minutes) {
        var copiedDate = new Date(this.getTime());
        return new Date(copiedDate.getTime() + minutes * 60000);
    }

    function pad_2(number) {
        return (number < 10 ? '0' : '') + number;
    }

    function hours(date) {
        var hours = date.getHours();
        if (hours > 12)
            return hours - 12; // Substract 12 hours when 13:00 and more
        return hours;
    }

    function am_pm(date) {
        if (date.getHours() == 0 && date.getMinutes() == 0 && date.getSeconds() == 0)
            return ''; // No AM for MidNight
        if (date.getHours() == 12 && date.getMinutes() == 0 && date.getSeconds() == 0)
            return ''; // No PM for Noon
        if (date.getHours() < 12)
            return ' AM';
        return ' PM';
    }

    function date_format(date) {
        return pad_2(hours(date)) + ':' +
            pad_2(date.getMinutes()) +
            am_pm(date);
    }

    var now = new Date('2018/1/1 ' + doc[i]['time_start']);
    now = now.addMinutes(thoigia_dakham);

    phutkham = now.getMinutes();
    giokham = now.getHours();
    thoigiankham = date_format(now);


</script>