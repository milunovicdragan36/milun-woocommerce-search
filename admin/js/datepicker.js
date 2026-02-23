var datepicker1;
var datepicker2;

jQuery("#datepicker_1").datepicker({
        dateFormat: "yy-mm-dd",
        showOn: "button",               
        buttonText: "Calendar",
        beforeShow: function(ele, obj){

            // Current value
            var existing_date = jQuery(ele).val();

            // If it contains a / then it's not formatted right
            if(existing_date.indexOf('/') > -1){

                // Using new Date and Date.parse gives us
                // Mon Apr 13 2020 00:00:00 GMT-0500 (Central Daylight Time)
                var new_date = new Date(Date.parse(existing_date));

                // Set the date
                jQuery(ele).datepicker("setDate", new_date);

            }

        }
});


jQuery("#datepicker_2").datepicker({
        dateFormat: "yy-mm-dd",
        showOn: "button",               
        buttonText: "Calendar",
        beforeShow: function(ele, obj){

            // Current value
            var existing_date = jQuery(ele).val();

            // If it contains a / then it's not formatted right
            if(existing_date.indexOf('/') > -1){

                // Using new Date and Date.parse gives us
                // Mon Apr 13 2020 00:00:00 GMT-0500 (Central Daylight Time)
                var new_date = new Date(Date.parse(existing_date));

                // Set the date
                jQuery(ele).datepicker("setDate", new_date);

            }

        }
});

const date1 = new Date(datepicker1);
const date2 = new Date(datepicker2);

if (date1.getTime() === date2.getTime()) {
} else {
}
