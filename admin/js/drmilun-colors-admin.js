function woo_cbPassword(obj) {
    var cbs = document.getElementsByClassName("woo_password");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}
jQuery("#searchposts_in_title").click(function() {
    if(jQuery(this).is(":checked")) {
        jQuery(".selectedMenu").show();
    } else {
        jQuery(".selectedMenu").hide();
                jQuery(".selectedPodMenu").hide();

    }
});
jQuery("#searchposts_in_title_woo").click(function() {
    if(jQuery(this).is(":checked")) {
        jQuery(".WooSelectedMenu").show();
    } else {
        jQuery(".WooSelectedMenu").hide();
    }
});

function searchWooChange(obj) {
    var cbs = document.getElementsByClassName("cb");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}
 jQuery(document).ready(function () {

      
 jQuery('html, body').animate({


       // scrollTop: jQuery('#milunsearch_hide_show').offset().top
    }, 'fast');

}); 
 
function top_scrolling(){
 // alert("great");
  
 

}



var a = [];

var b = [];


 function hideSkuFunction(sku){

  alert(sku);

    a.push(sku);
 
let counts= {};

 for(let i =0; i < a.length; i++){ 
     if (counts[a[i]]){
     counts[a[i]] += 1
     } else {
     counts[a[i]] = 1
     }
    }  
    for (let prop in counts){
        if (counts[prop] % 2 == 0){
      jQuery("."+prop).css('background-color','white');
            jQuery("."+prop).css('color','grey');     


            console.log(prop + " counted: " + counts[prop] + " times.")
            //return;
        }
if (counts[prop] % 2 == 1)
        { 
        

       jQuery("."+prop).css('background-color','pink');
           jQuery("."+prop).css('color','white');    
        //var term_id  = prop;
      

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_visibility_sku", 
             visibility_sku:sku
           
           },

          success: function(msg){

               console.log('working '+sku);
                  window.location.reload();
   jQuery('html, body').animate({


        scrollTop: jQuery('#milunsearch_hide_show').offset().top
    }, 'fast');

          },
          error: function(errorThrown){
               console.log("not working ");
          }
          });
        }
    }
  console.log(counts); 
       
}



var a = [];

var b = [];


 function hideTitleFunction(title){

  alert(title);

    a.push(title);
 
let counts= {};

 for(let i =0; i < a.length; i++){ 
     if (counts[a[i]]){
     counts[a[i]] += 1
     } else {
     counts[a[i]] = 1
     }
    }  
    for (let prop in counts){
        if (counts[prop] % 2 == 0){
      jQuery("."+prop).css('background-color','white');
            jQuery("."+prop).css('color','grey');     


            console.log(prop + " counted: " + counts[prop] + " times.")
            //return;
        }
if (counts[prop] % 2 == 1)
        { 
        

       jQuery("."+prop).css('background-color','pink');
           jQuery("."+prop).css('color','white');    
        //var term_id  = prop;
      

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_visibility_title", 
             visibility_title:title
           
           },

          success: function(msg){

               console.log('working '+title);
                  window.location.reload();
   jQuery('html, body').animate({


        scrollTop: jQuery('#milunsearch_hide_show').offset().top
    }, 'fast');

          },
          error: function(errorThrown){
               console.log("not working ");
          }
          });
        }
    }
  console.log(counts); 
       
}


var a = [];

var b = [];


 function hideTitleProductFunction(title_of_product){

  alert(title_of_product);

    a.push(title_of_product);
 
let counts= {};

 for(let i =0; i < a.length; i++){ 
     if (counts[a[i]]){
     counts[a[i]] += 1
     } else {
     counts[a[i]] = 1
     }
    }  
    for (let prop in counts){
        if (counts[prop] % 2 == 0){
      jQuery("."+prop).css('background-color','white');
            jQuery("."+prop).css('color','grey');     


            console.log(prop + " counted: " + counts[prop] + " times.")
            //return;
        }
if (counts[prop] % 2 == 1)
        { 
        

       jQuery("."+prop).css('background-color','pink');
           jQuery("."+prop).css('color','white');    
        //var term_id  = prop;
      

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_visibility_title_of_product", 
             visibility_title_of_product:title_of_product
           
           },

          success: function(msg){

                  window.location.reload();
   jQuery('html, body').animate({


        scrollTop: jQuery('#title_of_product').offset().top
    }, 'fast');

          },
          error: function(errorThrown){
               console.log("not working ");
          }
          });
        }
    }
  console.log(counts); 
       
}




var a = [];

var b = [];


 function myWooUserFunction(user){
  alert(user);

    a.push(user);
 
let counts= {};

 for(let i =0; i < a.length; i++){ 
     if (counts[a[i]]){
     counts[a[i]] += 1
     } else {
     counts[a[i]] = 1
     }
    }  
    for (let prop in counts){
        if (counts[prop] % 2 == 0){
      jQuery("."+prop).css('background-color','white');
            jQuery("."+prop).css('color','grey');     


            console.log(prop + " counted: " + counts[prop] + " times.")
            //return;
        }
if (counts[prop] % 2 == 1)
        { 
        

       jQuery("."+prop).css('background-color','pink');
           jQuery("."+prop).css('color','white');    
        //var term_id  = prop;
      

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_visibility_woo_user", 
             visibility_woo_user:user
           
           },

          success: function(msg){

               console.log('working '+user);
                  window.location.reload();
   jQuery('html, body').animate({


        scrollTop: jQuery('#milunsearch_hide_show').offset().top
    }, 'fast');


          },
          error: function(errorThrown){
               console.log("not working ");
          }
          });
        }
    }
  console.log(counts); 
         
}






var a = [];

var b = [];

function myWooTypeProdFunction(type_prod ){

alert(type_prod);

    a.push(type_prod);

let counts= {};

 for(let i =0; i < a.length; i++){ 
     if (counts[a[i]]){
     counts[a[i]] += 1
     } else {
     counts[a[i]] = 1
     }
    }  
    for (let prop in counts){
        if (counts[prop] % 2 == 0){
         
      jQuery("."+prop).css('background-color','white');
            jQuery("."+prop).css('color','grey'); 

            console.log(prop + " counted: " + counts[prop] + " times.")
            //return;
        }
if (counts[prop] % 2 == 1)
        { 
        
  jQuery("."+prop).css('background-color','pink');
           jQuery("."+prop).css('color','white');  
     

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_woo_type_prod",
            woo_type_prod:type_prod


           
           },
        
          success: function(msg){
               console.log('working '+type_prod);

             
             
 
   
                  window.location.reload();


          },
          error: function(errorThrown){
               console.log("not working ");
          }

          });
        }
    }
  console.log(counts); 
 

       
}
var a = [];

var b = [];

function myWooRatingsFunction(rate ){

alert(rate);

    a.push(rate);

let counts= {};

 for(let i =0; i < a.length; i++){ 
     if (counts[a[i]]){
     counts[a[i]] += 1
     } else {
     counts[a[i]] = 1
     }
    }  
    for (let prop in counts){
        if (counts[prop] % 2 == 0){
         
      jQuery("."+prop).css('background-color','white');
            jQuery("."+prop).css('color','grey'); 

            console.log(prop + " counted: " + counts[prop] + " times.")
            //return;
        }
if (counts[prop] % 2 == 1)
        { 
        
  jQuery("."+prop).css('background-color','pink');
           jQuery("."+prop).css('color','white');  
     

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_woo_ratings",
            woo_ratings:rate


           
           },
        
          success: function(msg){
               console.log('working '+rate);

             
             
 
   
                  window.location.reload();


          },
          error: function(errorThrown){
               console.log("not working ");
          }

          });
        }
    }
  console.log(counts); 
 

       
}


var a = [];

var b = [];

function myWooProductFunction(product_id ){

alert(product_id);

    a.push(product_id);

let counts= {};

 for(let i =0; i < a.length; i++){ 
     if (counts[a[i]]){
     counts[a[i]] += 1
     } else {
     counts[a[i]] = 1
     }
    }  
    for (let prop in counts){
        if (counts[prop] % 2 == 0){
         
      jQuery("."+prop).css('background-color','white');
            jQuery("."+prop).css('color','grey'); 

            console.log(prop + " counted: " + counts[prop] + " times.")
            //return;
        }
if (counts[prop] % 2 == 1)
        { 
        
  jQuery("."+prop).css('background-color','pink');
           jQuery("."+prop).css('color','white');  
     

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_woo_product",
            woo_product_id:product_id


           
           },
        
          success: function(msg){
               console.log('working '+product_id);

             
             
 
   
                  window.location.reload();
 jQuery('html, body').animate({


        scrollTop: jQuery('#milunsearch_hide_show').offset().top
    }, 'fast');

          },
          error: function(errorThrown){
               console.log("not working ");
          }

          });
        }
    }
  console.log(counts); 
 

       
}


var a = [];

var b = [];

function myWooCategoryFunction(category_id ){


    a.push(category_id);

let counts= {};

 for(let i =0; i < a.length; i++){ 
     if (counts[a[i]]){
     counts[a[i]] += 1
     } else {
     counts[a[i]] = 1
     }
    }  
    for (let prop in counts){
        if (counts[prop] % 2 == 0){
         
      jQuery("."+prop).css('background-color','white');
            jQuery("."+prop).css('color','grey'); 

        }
if (counts[prop] % 2 == 1)
        { 
        
  jQuery("."+prop).css('background-color','pink');
           jQuery("."+prop).css('color','white');  
     

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_woo_category",
            woo_category_id:category_id


           
           },
        
          success: function(msg){
               console.log('working '+category_id);

             
             
 
   
                  window.location.reload();

 jQuery('html, body').animate({


        scrollTop: jQuery('#milunsearch_hide_show').offset().top
    }, 'fast');
          },
          error: function(errorThrown){
               console.log("not working ");
          }

          });
        }
    }
 

       
}var a = [];

var b = [];

function myWooFunctionName(term_id,name,variation ){



    a.push(term_id);

let counts= {};

 for(let i =0; i < a.length; i++){ 
     if (counts[a[i]]){
     counts[a[i]] += 1
     } else {
     counts[a[i]] = 1
     }
    }  
    for (let prop in counts){
        if (counts[prop] % 2 == 0){
         
      jQuery("."+prop).css('background-color','white');
            jQuery("."+prop).css('color','grey'); 

            console.log(prop + " counted: " + counts[prop] + " times.")
            //return;
        }
if (counts[prop] % 2 == 1)
        { 
        
  jQuery("."+prop).css('background-color','pink');
           jQuery("."+prop).css('color','white');  
     

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_woo_term_name",
            woo_term_id:term_id,

             woo_term_name:name,
             woo_term_variation:variation


           
           },
        
          success: function(msg){
               console.log('working '+term_id);

               console.log('working '+name);
              console.log('working '+variation);
             
 
   
                  window.location.reload();
 jQuery('html, body').animate({


        scrollTop: jQuery('#milunsearch_hide_show').offset().top
    }, 'fast');

          },
          error: function(errorThrown){
               console.log("not working ");
          }

          });
        }
    }
  console.log(counts); 
 

       
}

 
 


jQuery(document).ready(function($){
    
    jQuery('.background_color_of_article').wpColorPicker();
    jQuery('.background_color_of_load_more_button').wpColorPicker();
    jQuery('.text_color_of_categories').wpColorPicker();

    jQuery('.text_color_of_article').wpColorPicker();

    jQuery('.color_for_load_more_text').wpColorPicker();

});
