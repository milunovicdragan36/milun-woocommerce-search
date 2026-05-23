

function searchChange(obj) {
    var cbs = document.getElementsByClassName("cb");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}
function cbChange(obj) {
    var cbs = document.getElementsByClassName("cb");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}

function shape_of_form(obj) {
    var cbs = document.getElementsByClassName("form");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}

var a = [];

var posts="";


 function myPostFunction(posts){
  alert(posts);

    a.push(posts);
 
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
             action:"select_visibility_post", 
             visibility_post:posts
           
           },

          success: function(msg){

               console.log('working '+posts);
                  window.location.reload();
   jQuery('html, body').animate({


       // scrollTop: jQuery('#milunsearch_hide_show').offset().top
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

var meta_data="";


 function myMetaFunction(meta_data){
  alert(meta_data);

    a.push(meta_data);
 
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
             action:"select_visibility_meta", 
             visibility_meta:meta_data
           
           },

          success: function(msg){

               console.log('working '+meta_data);
                  window.location.reload();
   jQuery('html, body').animate({


       // scrollTop: jQuery('#milunsearch_hide_show').offset().top
    }, 'fast');


          },
          error: function(errorThrown){
               console.log("not working ");
          }
          });
        }
    }
  console.log(meta_data); 
         
}
var a = [];

var b = [];

 function myUserFunction(user){
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
             action:"select_visibility_user", 
             visibility_user:user
           
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

 function myFunction(term_id){
  

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
        //var term_id  = prop;
      

         jQuery.ajax({
         
           type: "POST",
           url: ajax_object.ajax_url,
           data: {
             action:"select_term_id", 
             term_id:term_id
           
           },
        
          success: function(msg){

               console.log('working '+term_id);
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




jQuery(document).ready(function () {


     
  // add multiple select / deselect functionality
  jQuery(".selecttaxonomies").click(function () {
      jQuery('.selectsearching').removeAttr('checked', this.checked);
  });

 
  /* if all checkbox are selected, check the selecttaxonomies checkbox
   and viceversa */




   
  jQuery(".selectsearching").click(function(){

    if(jQuery(".selectsearching:checked").length == 0 || jQuery(".selectsearching:checked").length == 1 ) {
      jQuery(".selecttaxonomies").removeAttr("checked", "checked");
    } else {
      jQuery(".selecttaxonomies").attr("checked");
    }


});


         


});


