jQuery("#datepicker_1").datepicker({
    onSelect: function() { 
        var dateObject = jQuery(this).datepicker('getDate'); 
        console.log(dateObject);
    }
});

jQuery("#datepicker_1").on("change", function() {
    let date = jQuery(this).val();

    let a = moment();
    
    
});

