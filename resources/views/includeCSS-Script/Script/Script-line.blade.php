<script type="text/javascript">

        $(document).ready(function() {

        const formatter = new Intl.DateTimeFormat("en-GB", { // <- re-use me
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
            })
            
        var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
        const result = formatter.format(currentDate);
        const myArray = result.split("/");

        var day = myArray[0];
        var month = myArray[1];
        var year = myArray[2];

        nextDay = year + '-' + month + '-' + day;    
        

        callDisableAheadReserve();

        setInterval(function() {

$.ajax({
    type: "POST",
    data: "",
    url: "/Kindee/countertime",
    success: function(result) {
        //alert(result)
        var dayOfWeek = $("#dayOfWeek").val();
        var checkValue = $("#checkValue").val();
        var time = result.split("|");
        //console.log(time[0]);
        var currentTime = new Date();
        var years = time[0];
        var months = time[1];
        var days = time[2];

        var hours = time[3];
        var minutes = time[4];
        var seconds = time[5];

        var timestamp = time[6];

        // Compose the string for display
        var currentTimeString = years + "-" + months + "-" + days + " " + hours +
            ":" + minutes + ":" + seconds;
        var currentTimeStringdisplay = hours + ":" + minutes + ":" + seconds;

        $("#clock").html(currentTimeStringdisplay);

        var currtime = (hours * 100) + parseInt(minutes);
        //lert(currtime);
        if(currtime = 0800)
        {
            echo : $line->line_box;
        {



