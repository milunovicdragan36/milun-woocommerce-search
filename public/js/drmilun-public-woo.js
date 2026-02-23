
class Live_Search_Woo{
  
  constructor(){

     //this.searchField = jQuery(".search-term");
     //this.searchFieldWidget = jQuery(".search-term-widget");
     //this.searchFieldShortcode = jQuery(".search-term-shortcode");

    // this.searchFieldWoo = jQuery(".search-term-woo");
     this.searchFieldWooWidget = jQuery(".search-term-woo-widget");
     this.searchFieldShortcodeWoo = jQuery(".search-term-shortcode-woo");
     this.product_id = jQuery("#search_post_widget_id_woo");
     
     this.isSpinnerVisible = false;
     this.typingTimer;
     this.isOverlayOpen = false;
     this.template_no_posts;
     this.resultsDiv = jQuery("#search-overlay__results");
     this.isSpinnerVisible = false;
     this.previousValue;
     this.timeout;
     this.i = 0;
               this.events();  


jQuery(".data-categories-container").css("display",'none');
jQuery(".data-container").css("display",'none');

jQuery(".woo-data-categories-container-widget").css("display",'none');
jQuery(".woo-data-container-widget").css("display",'none');


jQuery(".data-categories-container-shortcode").css("display",'none');
jQuery(".data-container-shortcode").css("display",'none');

    }

 
 
    events(){
           // this.searchFieldShortcodeWoo.on("keyup",this.typingLogicShortcodeWoo.bind(this));

            this.searchFieldWooWidget.on("keyup",this.getResultsWooWidget.bind(this));



    }
     /* While typing in customSearchBox typingLogic function is triggered*/ 
     typingLogicShortcodeWoo(){
       var $this =this;
      
      if(this.previousValue){
        
           clearTimeout(this.typingTimer);
           
           if(!$this.isSpinnerVisible){
                 $this.resultsDiv.html('<div class="loader"></div>')
                $this.isSpinnerVisible = true;
           }


           this.typingTimer = setTimeout(this.getResultsShortcodeWoo.bind(this),1000);


      
      }
     // var id =this.searchFieldShortcodeWoo.val(); 

     
      var customSearchBox =this.searchFieldShortcodeWoo.val(); 
     
        this.previousValue = customSearchBox;
       
       var KeyID = event.keyCode;


       
        
      switch(KeyID)
         {
            case 8:
   setTimeout(function() {
    window.location.reload();

  }, 3000);            

            break; 
           case 46:
   setTimeout(function() {
    window.location.reload();

  }, 3000);
              break;
            default:
            break;
         }       
            
//$this.getResultsShortcodeWoo();

  } 

     /* While typing in customSearchBox typingLogic function is triggered
     typingLogicShortcodeWooPrice(){
       var $this =this;
      
      if(this.previousValue){
        
           clearTimeout(this.typingTimer);
           
           if(!$this.isSpinnerVisible){
                 $this.resultsDiv.html('<div class="loader"></div>')
                $this.isSpinnerVisible = true;
           }


           this.typingTimer = setTimeout(this.getResultsShortcodeWooPrice.bind(this),1000);


      
      }

      var id =this.searchFieldShortcodeWoo.val(); 

      var customSearchBox =this.searchFieldShortcodeWoo.val(); 
     
        this.previousValue = customSearchBox;
       
       var KeyID = event.keyCode;


       
        
      switch(KeyID)
         {
            case 8:
   setTimeout(function() {
    window.location.reload();

  }, 3000);            

            break; 
           case 46:
   setTimeout(function() {
    window.location.reload();

  }, 3000);
              break;
            default:
            break;
         }       
            
$this.getResultsShortcodeWooPrice();

  } 
*/ 
/*  
Increment(){
  alert("works");
   let dPadRight = document.getElementById('dPadRight');
if(dPadRight){
  // Not called
  dPadRight.click(function() {
    alert('You clicked the button');
 
});
}
}
*/
getResultsShortcodeWoo(){
  jQuery(".data-categories-container").css("display",'block');

  jQuery(".data-container").css("display",'block');
    jQuery(".data-button").css("display","none");
 // jQuery(".data-categories-container").removeClass("hid");

let counter = 1;



/*
dPadRight.addEventListener("click", function() {
   console.log(counter);
   counter++;
   if(counter > 5){
    // just to show that counter is available outside the annonymous 
    // function
     let bla = $this.getCounterValue();
      console.log("Bla Value " + bla);
       }
 
}
);
*/
//alert("great");

//var id =this.searchFieldShortcodeWoo.val(); 

 
var customSearchBox =this.searchFieldShortcodeWoo.val(); 

var search_post_id_woo = jQuery("#search_post_id_woo").val();
var number_of_posts = parseInt(jQuery("#numberofposts").val());

       jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespacewoo/v1/search/'+customSearchBox+'/'+search_post_id_woo,function(livesearchproducts_1){


/*
 let unique_1 = [...new Map(livesearchproducts_1.map((m) => [m.ID, m])).values()];


console.log(unique_1);

if(unique_1.length != 0){
/*
     var result_1 = unique_1.map(item=>`<div class='pink'>`+
  item.post_title+
  `</div>`).join(""); 
     document.getElementsByClassName('data-terms-products-'+jQuery('[id^=term-]').val())[0].innerHTML =result_1;

console.log('unique_1 '+unique_1.map(item=>item.post_title));
}
*/

   });

         
 


}
/*
 
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v1/searching/'+customSearchBox,function(livesearchcategories){

console.log(livesearchcategories);
let unique_3 = [...new Map(livesearchcategories.map((m) => [m.term_id, m])).values()];
var result = unique_3.map(item => 
`<h3>Category</h3>
  <div>
            <a href=${item.taxonomy}/${item.slug}>${item.name}</a>

  </div>
  `
).join("")

if (livesearchcategories.length === 0){
  //  document.getElementsByClassName('data-categories-container')[0].innerHTML =liveSearchDataCategories[0].not_found_data;

}else{
  //  document.getElementsByClassName('data-categories-container')[0].innerHTML = result;


}
  })
 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");
            jQuery(".terms-container").html($this.template_no_posts);
 //  setTimeout(function() {
   // window.location.reload();

 // }, 3000);
  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });
*/



getResultsShortcodeWooPrice(){
  jQuery(".data-categories-container").css("display",'block');

  jQuery(".data-container").css("display",'block');
    jQuery(".data-button").css("display","none");

 // jQuery(".data-categories-container").removeClass("hid");

let counter = 1;

//alert(jQuery("#search_post_id_woo").val());

/*
dPadRight.addEventListener("click", function() {
   console.log(counter);
   counter++;
   if(counter > 5){
    // just to show that counter is available outside the annonymous 
    // function
     let bla = $this.getCounterValue();
      console.log("Bla Value " + bla);
       }
 
}
);
*/


var id = this.product_id.val();

//alert(id);



 
var customSearchBox =this.searchFieldShortcodeWoo.val(); 


// jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespacewoo_price/v1/search/'+customSearchBox+'/'+355,function(livesearchproducts_2){


//console.log(livesearchproducts_2);

  
 let unique_2 = [...new Map(livesearchproducts_2.map((m) => [m.term_id, m])).values()];


//var unique_4 = unique_2.filter(item =>item.term_id != unique_1.map(item=>item.term_id));



 

   

if(unique_2.length != 0){
/*
      
      var result_2 = unique_4.map(item=>`<div class='white' onclick=`+myWooFunction(item.term_id)+`>`+
  item.name+
  `</div>`).join("");
*/
console.log('unique_2 '+unique_2.map(item=>item.post_title));

 // document.getElementsByClassName('data-terms-products-2-'+jQuery('[id^=term-]').val())[0].innerHTML =result_2;
}
         
// });

/*
 
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v1/searching/'+customSearchBox,function(livesearchcategories){

console.log(livesearchcategories);
let unique_3 = [...new Map(livesearchcategories.map((m) => [m.term_id, m])).values()];
var result = unique_3.map(item => 
`<h3>Category</h3>
  <div>
            <a href=${item.taxonomy}/${item.slug}>${item.name}</a>

  </div>
  `
).join("")

if (livesearchcategories.length === 0){
  //  document.getElementsByClassName('data-categories-container')[0].innerHTML =liveSearchDataCategories[0].not_found_data;

}else{
  //  document.getElementsByClassName('data-categories-container')[0].innerHTML = result;


}
  })
 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");
            jQuery(".terms-container").html($this.template_no_posts);
 //  setTimeout(function() {
   // window.location.reload();

 // }, 3000);
  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });
*/
}
   

   
/*
   // While typing in customSearchBox typingLogic function is triggered 
     typingLogicWoo(){
       var $this =this;
      
      if(this.previousValue){
        
           clearTimeout(this.typingTimer);
           
           if(!$this.isSpinnerVisible){
                 $this.resultsDiv.html('<div class="loader"></div>')
                $this.isSpinnerVisible = true;
           }


           this.typingTimer = setTimeout(this.getResultsWoo.bind(this),1000);


      
      }

     
      var customSearchBox =this.searchFieldWoo.val(); 
     
        this.previousValue = customSearchBox;
       
       var KeyID = event.keyCode;


       
        
      switch(KeyID)
         {
            case 8:
   setTimeout(function() {
    window.location.reload();

  }, 3000);            

            break; 
           case 46:
   setTimeout(function() {
    window.location.reload();

  }, 3000);
              break;
            default:
            break;
         }       
            
$this.getResultsWoo();

  }  


getResultsWoo(){
  jQuery(".data-categories-container").css("display",'block');

  jQuery(".data-container").css("display",'block');
 // jQuery(".data-categories-container").removeClass("hid");

  var $this = this;

 
var customSearchBox =this.searchField.val(); 


    jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespacewoo/v1/search/'+customSearchBox,function(livesearchposts_1){



    

 var posts = livesearchposts_1.filter(item=>item.post_type == 'post' || item.post_type == 'search_post' || item.post_type == 'page' || item.post_type=='nav_menu_item'?"": item);
var result = posts.map(item => 
  `<div>
    <a href=${item.post_name}>${item.post_title}</a>

  </div>
  `
).join("")
if (posts.length === 0) {


    document.getElementsByClassName('data-container')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}else{

    document.getElementsByClassName('data-container')[0].innerHTML = result;
}




  }).fail(function(jqXHR, textStatus, errorThrown) { 

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });


 
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacecatwoo/v1/search/'+customSearchBox,function(livesearchcategories){


var result = livesearchcategories.map(item => 
`<h3>Category</h3>
  <div>
            <a href=${wourl.siteurl}/product-category/${item.slug}>${item.name}</a>

  </div>
  `
).join("")
if( jQuery('.data-categories-container').length )      
{ 

if (livesearchcategories.length === 0){
    document.getElementsByClassName('data-categories-container')[0].innerHTML =liveSearchDataCategories[0].not_found_data;

}else{
    document.getElementsByClassName('data-categories-container')[0].innerHTML = result;

}
}
  })
 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");
            jQuery(".terms-container").html($this.template_no_posts);
 //  setTimeout(function() {
   // window.location.reload();

 // }, 3000);
  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });

}
*/

       // While typing in customSearchBox typingLogic function is triggered 
     typingLogicShortcode(){
       var $this =this;
      
      if(this.previousValue){
        
           clearTimeout(this.typingTimer);
           
           if(!$this.isSpinnerVisible){
                 $this.resultsDiv.html('<div class="loader"></div>')
                $this.isSpinnerVisible = true;
           }


           this.typingTimer = setTimeout(this.getResultsShortcode.bind(this),1000);


      
      }

     
      var customSearchBox =this.searchFieldShortcode.val(); 
     
        this.previousValue = customSearchBox;
       
       var KeyID = event.keyCode;


       
        
      switch(KeyID)
         {
            case 8:
   setTimeout(function() {
    window.location.reload();

  }, 1000);            

            break; 
           case 46:
   setTimeout(function() {
    window.location.reload();

  }, 1000);
              break;
            default:
            break;
         }       
            
$this.getResultsShortcode();

  } 
   typingLogicWidget(){
       var $this =this;
      
      if(this.previousValue){
        
           clearTimeout(this.typingTimer);
           
           if(!$this.isSpinnerVisible){
                 $this.resultsDiv.html('<div class="loader"></div>')
                $this.isSpinnerVisible = true;
           }


           this.typingTimer = setTimeout(this.getResultsWidget.bind(this),1000);


      
      }

     
      var customSearchBox =this.searchFieldShortcode.val(); 
     
        this.previousValue = customSearchBox;
       
       var KeyID = event.keyCode;


       
        
      switch(KeyID)
         {
            case 8:
   setTimeout(function() {
    window.location.reload();

  }, 1000);            

            break; 
           case 46:
   setTimeout(function() {
    window.location.reload();

  }, 1000);
              break;
            default:
            break;
         }       
            
//$this.getResultsWidget();

  }                 
        

getResultsShortcode(){

  jQuery(".data-categories-container-shortcode").css("display",'block');

  jQuery(".data-container-shortcode").css("display",'block');
  
  var $this = this;
  
  alert(jQuery("#search_post_id").val());

var search_post_id = jQuery("#search_post_id").val();
 
var customSearchBox =this.searchFieldShortcode.val(); 


    jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespace/v1/search/'+customSearchBox+'/'+search_post_id,function(livesearchposts_1){

 var posts = livesearchposts_1.filter(item=>item.post_type == 'product' || item.post_type == 'search_post' || item.post_type == 'page' || item.post_type =='product_variation' || item.post_type=='nav_menu_item'?"": item);

const unique = [...new Map(posts.map((m) => [m.ID, m])).values()];

var result = unique.map(item => 
  `<div>
    <a href=${item.post_name}>${item.post_title}</a>

  </div>
  `
).join("")

if( jQuery('.data-container-shortcode').length )         // use this if you are using id to check
{ 
if (posts.length === 0) {


    document.getElementsByClassName('data-container-shortcode')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}else{

    document.getElementsByClassName('data-container-shortcode')[0].innerHTML = result;
}

}


  }).fail(function(jqXHR, textStatus, errorThrown) { 

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });


 
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v1/searching/'+customSearchBox,function(livesearchcategories){


var result = livesearchcategories.map(item => 
`<h3>Category</h3>
  <div>
            <a href=${wourl.siteurl}/${item.taxonomy}/${item.slug}>${item.name}</a>

  </div>
  `
).join("")
if( jQuery('.data-categories-container-shortcode').length )         // use this if you are using id to check
{ 

if (livesearchcategories.length === 0){
    document.getElementsByClassName('data-categories-container-shortcode')[0].innerHTML =liveSearchDataCategories[0].not_found_data;

}else{
    document.getElementsByClassName('data-categories-container-shortcode')[0].innerHTML = result;

}
}
  })
 
.fail(function(jqXHR, textStatus, errorThrown) { 


  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });

}

/*
getResultsShortcodeWoo(){

  jQuery(".data-categories-container-shortcode").css("display",'block');

  jQuery(".data-container-shortcode").css("display",'block');

  var $this = this;

 
var customSearchBox =this.searchFieldShortcodeWoo.val();
//console.log("customSearchBox "+customSearchBox);

    jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespacewoo/v1/search/'+customSearchBox,function(livesearchposts_1){

console.log(livesearchposts_1);
 var posts = livesearchposts_1.filter(item=>item.post_type == 'post' || item.post_type == 'search_post' || item.post_type == 'page' || item.post_type=='nav_menu_item'?"": item);
var result = posts.map(item => 
  `<div>
    <a href=${item.post_name}>${item.post_title}</a>

  </div>
  `
).join("")
if (posts.length === 0) {


    document.getElementsByClassName('data-container-shortcode')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}else{

    document.getElementsByClassName('data-container-shortcode')[0].innerHTML = result;
}




  }).fail(function(jqXHR, textStatus, errorThrown) { 

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });


 
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacecatwoo/v1/search/'+customSearchBox,function(livesearchcategories){

console.log(livesearchcategories);
var result = livesearchcategories.map(item => 
`<h3>Category</h3>
  <div>
            <a href=${wourl.siteurl}/product-category/${item.slug}>${item.name}</a>

  </div>
  `
).join("")
if( jQuery('.data-categories-container-shortcode').length )         // use this if you are using id to check
{ 

if (livesearchcategories.length === 0){
    document.getElementsByClassName('data-categories-container-shortcode')[0].innerHTML =liveSearchDataCategories[0].not_found_data;

}else{
    document.getElementsByClassName('data-categories-container-shortcode')[0].innerHTML = result;

}
}
  })
 
.fail(function(jqXHR, textStatus, errorThrown) { 


  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });

}
 
 
      
      // While typing in customSearchBox typingLogic function is triggered 
     typingLogicWidget(){
       var $this =this;
      
      if(this.previousValue){
        
           clearTimeout(this.typingTimer);
           
           if(!$this.isSpinnerVisible){
                 $this.resultsDiv.html('<div class="loader"></div>')
                $this.isSpinnerVisible = true;
           }


           this.typingTimer = setTimeout(this.getResultsWidget.bind(this),1000);


      
      }

     
      var customSearchBox =this.searchFieldWidget.val(); 
     
        this.previousValue = customSearchBox;
       
       var KeyID = event.keyCode;


       
        
      switch(KeyID)
         {
            case 8:
      jQuery(".terms-container-widget").html(this.template_no_terms);
   setTimeout(function() {
    window.location.reload();

  }, 3000);            

            break; 
           case 46:
      jQuery(".terms-container-widget").html(this.template_no_terms);
   setTimeout(function() {
    window.location.reload();

  }, 3000);
              break;
            default:
            break;
         }       
            
$this.getResultsWidget();

  }         
*/            

getResultsWooWidget(){

 jQuery(".woo-data-categories-container-widget").css("display",'block');
jQuery(".woo-data-container-widget").css("display",'block');

  var $this = this;
  var customSearchBox =this.searchFieldWooWidget.val(); 
  var woo_product_id =this.product_id.val();

 
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v35/search_categories/'+customSearchBox,function(livesearchcategories){


var result = livesearchcategories.map(item => 
`<h3>Category</h3>
  <div>
            <a href=${wourl.siteurl}/product-category/${item.slug}>${item.name}</a>

  </div>
  `
).join("")
if( jQuery('.data-categories-container-widget').length )         // use this if you are using id to check
{ 

if (livesearchcategories.length === 0){
    document.getElementsByClassName('woo-data-container-widget')[0].innerHTML =liveSearchDataCategories[0].not_found_data;

}else{

    document.getElementsByClassName('woo-data-categories-container-widget')[0].innerHTML = result;

}
}
  

  })

.fail(function(jqXHR, textStatus, errorThrown) { 
 // console.clear();


  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });
 
var customSearchBox =this.searchFieldWooWidget.val(); 
var woo_product_id =$this.product_id.val();
    jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespacewoo/v35/search_products/'+customSearchBox+'/'+woo_product_id,function(livesearchposts_1){
     console.log(livesearchposts_1);
 var posts = livesearchposts_1.filter(item=>item.post_type == 'post' || item.post_type == 'search_post' || item.post_type == 'page' || item.post_type=='nav_menu_item'?"": item);

//const unique = [...new Map(posts.map((m) => [m.ID, m])).values()];

var result = posts.map(item => 
  `<div>
    <a href=${item.post_name}>${item.post_title}</a>

  </div>
  `
).join("")
 
     console.log(result);

if( jQuery('.woo-data-container-widget').length )         // use this if you are using id to check
{ 
if (posts.length === 0) {


    document.getElementsByClassName('woo-data-container-widget')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}else{

    document.getElementsByClassName('woo-data-container-widget')[0].innerHTML = result;
}

}



  }).fail(function(jqXHR, textStatus, errorThrown) { 
 // console.clear();

  console.log('getJSON request failed! ' ); })
.always(function() { console.log('getJSON request ended!'); });



   jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespacewoo/v35/search_products/'+customSearchBox+'/%20/'+woo_product_id,function(livesearchposts_1){
   
 var posts = livesearchposts_1.filter(item=>item.post_type == 'post' || item.post_type == 'search_post' || item.post_type == 'page' || item.post_type=='nav_menu_item'?"": item);

//const unique = [...new Map(posts.map((m) => [m.ID, m])).values()];

var result = posts.map(item => 
  `<div>
    <a href=${item.post_name}>${item.post_title}</a>

  </div>
  `
).join("")


if( jQuery('.woo-data-container-widget').length )         // use this if you are using id to check
{ 
if (posts.length === 0) {


    document.getElementsByClassName('woo-data-container-widget')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}else{

    document.getElementsByClassName('woo-data-container-widget')[0].innerHTML = result;
}

}



  }).fail(function(jqXHR, textStatus, errorThrown) { 

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });



  


   jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespacewoo/v35/search_products/'+customSearchBox+'/%20/'+customSearchBox+'/'+woo_product_id,function(livesearchposts_1){
      console.log('great '+livesearchposts_1);
 var posts = livesearchposts_1.filter(item=>item.post_type == 'post' || item.post_type == 'search_post' || item.post_type == 'page' || item.post_type=='nav_menu_item'?"": item);
//console.log(posts);
//const unique = [...new Map(posts.map((m) => [m.ID, m])).values()];

var result = posts.map(item => 
  `<div>
    <a href=${item.post_name}>${item.post_title}</a>

  </div>
  `
).join("")
if( jQuery('.woo-data-container-widget').length )         // use this if you are using id to check
{ 
if (posts.length === 0) {


    document.getElementsByClassName('woo-data-container-widget')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}else{

    document.getElementsByClassName('woo-data-container-widget')[0].innerHTML = result;
}

}



  }).fail(function(jqXHR, textStatus, errorThrown) { 
 // console.clear();

  console.log('getJSON request failed! ' ); })
.always(function() { console.log('getJSON request ended!'); });


}




 }





var liveSearchWoo = new Live_Search_Woo();