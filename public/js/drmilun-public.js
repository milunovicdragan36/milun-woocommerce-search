jQuery(document).ready(function () {
  document.getElementsByTagName("html")[0].style.visibility = "visible";

});

class Live_Search{
  
  constructor(){

     this.searchField = jQuery(".search-term");
     this.searchFieldWidget = jQuery(".search-term-widget");
     this.searchFieldShortcode = jQuery(".search-term-shortcode");
     this.post_id = jQuery("#search_post_id");
     this.numberofposts = jQuery("#numberofposts");
     this.search_categories = jQuery("#search_categories");

 this.number_of_words_in_posts = jQuery("#numberofwordsinposts");

    // this.searchTerm.on('keyup',this.getResultsTerm.bind(this));
      const $this = this; 
   
      this.post_type_featured_image =    jQuery('[id^=post_type_featured_image_]');
 
      this.post_type_featured_image1 =    jQuery('[id^=post_type_featured_image_]').eq(-1);
       this.post_type_featured_image2 =    jQuery('[id^=post_type_featured_image_]').eq(-2);
       this.post_type_featured_image3 =    jQuery('[id^=post_type_featured_image_]').eq(-3);
       this.post_type_featured_image4 =    jQuery('[id^=post_type_featured_image_]').eq(-4);
console.log(this.post_type_featured_image.val());
      console.log(this.post_type_featured_image1.val());
 
 console.log(this.post_type_featured_image2.val());
      console.log(this.post_type_featured_image3.val());   
console.log(this.post_type_featured_image4.val());
      
     //this.searchFieldWoo = jQuery(".search-term-woo");
     //this.searchFieldWidget = jQuery(".search-term-widget-woo");
     this.searchFieldShortcodeWoo = jQuery(".search-term-shortcode-woo");
     console.log(parseInt(this.numberofposts.val()));
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

jQuery(".wrapper-data-container-widget-data-posts").css("display",'none');
jQuery(".data-categories-container").css("display",'none');
jQuery(".data-container").css("display",'none');

 jQuery(".data-categories-container-widget").css("display",'none');

  jQuery(".data-container-widget").css("display",'none');
  jQuery('.no_more_posts').css("display",'none');


jQuery(".data-categories-container-shortcode").css("display",'none');
jQuery(".data-container-shortcode").css("display",'none');

    }

 
 
    events(){
        

      this.searchFieldWidget.on("keyup",this.typingLogic.bind(this));
      this.searchFieldWidget.on("keyup",this.getResultsWidget.bind(this));
      this.searchFieldShortcode.on("keyup",this.typingLogicShortcode.bind(this));

     //   this.searchFieldWoo.on("keyup",this.typingLogicWoo.bind(this));
      //  this.searchFieldWidget.on("keyup",this.typingLogicWidgetWoo.bind(this));
      //  this.searchFieldShortcodeWoo.on("keyup",this.typingLogicShortcodeWoo.bind(this));

    }
     /* While typing in customSearchBox typingLogic function is triggered*/ 
     typingLogic(){
      jQuery('.search-term-widget').addClass('loading');
/*
       var $this =this;
      
      if(this.previousValue){
        
           clearTimeout(this.typingTimer);
           
           if(!$this.isSpinnerVisible){
                 $this.resultsDiv.html('<div class="loader"></div>')
                $this.isSpinnerVisible = true;
           }


           this.typingTimer = setTimeout(this.getResults.bind(this),1000);


      
      }

     
      var customSearchBox =this.searchField.val(); 
     
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
            
$this.getResults();
*/
  } 



getResultsWidget(){
 
jQuery(".wrapper-data-container-widget-data-posts").css("display",'block');
  jQuery(".data-categories-container-widget").css("display",'block');

  jQuery(".data-container-widget").css("display",'block');
    jQuery(".data-button").css("display","none");
  jQuery('.no_more_posts').css("display",'none');

 // jQuery(".data-categories-container").removeClass("hid");

let counter = 1;




var cpt_image =this.post_type_featured_image.val();
var cpt_image_1 =this.post_type_featured_image1.val();

var cpt_image_2 =this.post_type_featured_image2.val();
var cpt_image_3 =this.post_type_featured_image3.val();


if(cpt_image == 'post'){
  cpt_image = 'posts';
}

if(cpt_image_1 == 'post'){
  cpt_image_1 = 'posts';
}

if(cpt_image_2 == 'post'){
  cpt_image_2 = 'posts';
}

if(cpt_image_3 == 'post'){
  cpt_image_3 = 'posts';
}


console.log(this.post_type_featured_image.val());
var search_categories =this.search_categories.val(); 
var customSearchBox =this.searchFieldWidget.val();
var number_of_words_in_posts_2 = this.number_of_words_in_posts.val(); 
//alert(jQuery("#search_post_id_title").val());
var search_post_id_title = jQuery("#search_post_id_title").val();
var number_of_posts = parseInt(jQuery("#numberofposts").val());
var post_id =this.post_id.val();

    jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespace/v11/search_post_types/'+customSearchBox+'/'+post_id,function(livesearchposts_1){


    jQuery.getJSON(liveSearchDataPosts[1].root_url+'wp/v2/'+cpt_image_2,function(cpt_images_3){

 var cpt_images_2 = cpt_images_3.filter(item =>  item.title.rendered.includes(customSearchBox)?item:'' ); 
console.log(cpt_images_2);



       jQuery('.search-term-widget').removeClass('loading');
    

 
var result = livesearchposts_1.concat(cpt_images_2);

result.length =parseInt(jQuery("#numberofposts").val());

   
var load_post_number =  parseInt(jQuery("#numberofposts").val());
var custom_word_of_number_of_posts = '';   
if(parseInt(jQuery("#numberofposts").val()) == 1){
  custom_word_of_number_of_posts = 'post';
}else{
  custom_word_of_number_of_posts = 'posts';
}


 
     


  // unique.length = jQuery("#numberofposts").val();
    document.getElementsByClassName('data-container-widget')[0].innerHTML =result.map(item =>item.title ? item.title.rendered + item.content.rendered.substring(0, number_of_words_in_posts_2)+`<a href=`+item.slug+`>`+liveSearchDataPosts[0].read_more+`</a>`: item.post_title + item.post_content.substring(0, number_of_words_in_posts_2)+`<a href=`+item.slug+`>`+liveSearchDataPosts[0].read_more+`</a>`)+'<input type="hidden" class="counter" value="0"/>';
;
document.getElementsByClassName('data-posts')[0].innerHTML='<input type="hidden" class="counter" value="0"/>'+
'<button class="background_color_of_load_more_button"><div class="color_for_load_more_text">Load more...('+parseInt(jQuery("#numberofposts").val())+') '+ custom_word_of_number_of_posts+'</div></button><div id="no_more_posts"></div>';
  var $button = jQuery('.background_color_of_load_more_button');
var $counter = jQuery('.counter');
//var un_length =$counter.val( parseInt($counter.val())+ parseInt(jQuery("#numberofposts").val())); // `parseInt` converts the `value` from a string to a number
  var number = parseInt($counter.val());
var v = 1;
$button.click(function(){
//  jQuery(".data-container-widget").css("display","none");
  jQuery(".data-button").css("display","block");

//console.log(v +=10);

 //  var posts = livesearchposts_1.filter(item=>item.post_type == 'product' || item.post_type == 'search_post' || item.post_type == 'page' || item.post_type =='product_variation' || item.post_type=='nav_menu_item'?"": item);

 //let unique_2 = [...new Map(posts.map((m) => [m.ID, m])).values()];


var result = livesearchposts_1.concat(cpt_images_2);
//let findDuplicates = arr => arr.filter((item, index) => arr.indexOf(item) !== index);
const myText = document.getElementById('no_more_posts');

console.log('number '+result.length);
if(++number + 1 == result.length){
const myInsertText = 'No more posts !';
myText.innerHTML = myInsertText;
jQuery('.background_color_of_load_more_button').css('display','none');
  console.log("no more posts");
}
//var new_posts =[...new Set(findDuplicates(result))]; // Unique duplicates   
//var new_posts = posts.map(item=>item.featured_image ? item.title.rendered : item.post_title ? item.post_title: '');




  


 



 

result.map(item =>  item.featured_image  ?
 ` <div>
        <a href=${item.slug}>${item.title ? item.title.rendered : item.post_title}</a>

    <img src=${item.featured_image} class="image_size">
           <p>${item.content ? item.content.rendered : item.post_content}</p>
<a href=`+item.slug+`>`+liveSearchDataPosts[0].read_more+`</a>
  </div> ` :  ` <div>
        ${item.title ? item.title.rendered : item.post_title}
                   <p>${item.content ? item.content.rendered : item.post_content}</p>
<a href=`+item.slug+`>`+liveSearchDataPosts[0].read_more+`</a>
  </div>
  
  `) ? result.length = v +=parseInt(jQuery("#numberofposts").val()):result.length = parseInt(jQuery("#numberofposts").val());

//cpt_images_2.map(item => item.title.rendered) ? cpt_images_2.length = v +=parseInt(jQuery("#numberofposts").val()):cpt_images_2.length = parseInt(jQuery("#numberofposts").val());



var result_1 = result.map(item =>  item.featured_image  ?
 ` <div class='last_div_for_scrolling'>
        <a href=${item.slug}>${item.title ? item.title.rendered : item.post_title}</a>

    <img src=${item.featured_image} class="image_size">
           <p>${item.content ? item.content.rendered.substring(0, number_of_words_in_posts_2) : item.post_content.substring(0, number_of_words_in_posts_2)}</p>

  </div> `

   


   :` <div class='last_div_for_scrolling'>
        <a href=${item.slug}>${item.title ? item.content.rendered.substring(0, number_of_words_in_posts_2) : item.post_title}</a>
                   <p>${item.content ? item.content.rendered.substring(0, number_of_words_in_posts_2) : item.post_content.substring(0, number_of_words_in_posts_2)}</p>
<a href=`+item.slug+`>`+liveSearchDataPosts[0].read_more+`</a>
  </div>
  
  `



  


 
).join("");

 console.log('result '+result.length);
  console.log('result_1 '+result_1.length);

jQuery(".data-posts").click(function() {

  var scrollBottom = jQuery('.wrapper-data-container-widget-data-posts').scrollTop() + jQuery('.wrapper-data-container-widget-data-posts').height();

    
 jQuery('.wrapper-data-container-widget-data-posts').animate({
      
        scrollBottom:jQuery('.last_div_for_scrolling_'+result.length).offset().top
    }, 3000);
console.log(scrollBottom);
          jQuery('.last_div_for_scrolling_'+result.length).css("background-color", "blue");




 
 //return;
//}

});


    document.getElementsByClassName('data-container-widget')[0].innerHTML =result_1;
 
 //return;
//}

})

if (result.length === 0) {


    document.getElementsByClassName('data-container-widget')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}






  }).fail(function(jqXHR, textStatus, errorThrown) { 

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });
}).fail(function(jqXHR, textStatus, errorThrown) { 

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });



 
jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/searching/'+customSearchBox,function(livesearchcategories){

console.log(livesearchcategories);
let unique_3 = [...new Map(livesearchcategories.map((m) => [m.term_id, m])).values()];
var result = unique_3.map(item => 
`
  <div>
            <a href=${item.taxonomy}/${item.slug}>${item.name}</a>

  </div>
  `
).join("")

if (livesearchcategories.length === 0 &&search_categories!=1){
    document.getElementsByClassName('data-categories-container-widget')[0].innerHTML =liveSearchDataCategories[0].not_found_data;

}else{
    document.getElementsByClassName('data-categories-container-widget')[0].innerHTML = result;


}
  })
 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");
            jQuery(".terms-container").html(this.template_no_posts);
 //  setTimeout(function() {
   // window.location.reload();

 // }, 3000);
  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });

}
   


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
            

  }                 
        




 }




var liveSearch = new Live_Search();

jQuery(".data-posts").click(function() {
 jQuery('.wrapper-data-container-widget-data-posts').animate({
       scrollBottom: jQuery('.last_div_for_scrolling').last().offset().bottom


    }, 2000);

          jQuery(".last_div_for_scrolling").last().css("background-color", "blue");

     // jQuery(result_1).last()[0].scrollIntoView({ behavior: 'smooth' });


});