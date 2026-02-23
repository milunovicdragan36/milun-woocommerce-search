class Live_Search_Shortcode{
  
  constructor(){
     this.searchFieldProductsShortcode = jQuery(".search-term-shortcode");
 this.searchFieldCategoriesShortcode = jQuery(".search-term-shortcode");
  this.searchFieldTagsShortcode = jQuery(".search-term-shortcode");
  this.searchCategoriesAdmin =jQuery("#search_categories");

  this.searchTagsAdmin =jQuery("#search_tags");
    

     this.post_id = jQuery("#search_post_id");
     this.numberofposts = jQuery("#numberofposts");
     this.search_categories = jQuery("#search_categories");
this.count = 0;
 this.number_of_words_in_posts = jQuery("#numberofwordsinposts");

      const $this = this; 
   
      this.post_type_featured_image =    jQuery('[id^=post_type_featured_image_shortcode_]');
 
      this.post_type_featured_image1 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-1);
       this.post_type_featured_image2 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-2);
       this.post_type_featured_image3 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-3);
       this.post_type_featured_image4 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-4);
       this.post_type_featured_image5 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-5);
       this.post_type_featured_image6 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-6);
       this.post_type_featured_image7 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-7);
       this.post_type_featured_image8 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-8);
       this.post_type_featured_image9 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-10);
       this.post_type_featured_image10 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-11);
       this.post_type_featured_image11 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-12);
       this.post_type_featured_image12 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-13);
       this.post_type_featured_image13 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-14);
       this.post_type_featured_image14 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-15);
       this.post_type_featured_image15 =    jQuery('[id^=post_type_featured_image_shortcode_]').eq(-16);
            
     //this.searchFieldWoo = jQuery(".search-term-woo");
     //this.searchFieldWidget = jQuery(".search-term-widget-woo");
     this.searchFieldShortcodeWoo = jQuery(".search-term-shortcode-woo");
     this.isSpinnerVisible = false;
     this.typingTimer;
     
     this.isOverlayOpen = false;
     this.template_no_posts;
     this.resultsDiv = jQuery(".search-term-widget");
     this.isSpinnerVisible = false;
     this.previousValue;
     this.timeout;
     this.i = 0;
           this.searchFieldProductsShortcode.on("keyup",this.getResultsProductsShortcode.bind(this));

          this.searchFieldCategoriesShortcode.on('keyup',this.getResultsCategoriesShortcode.bind(this));


  
           jQuery('.no-data').css('display','none');
          

jQuery(".data-categories-container").css("display",'none');
jQuery(".data-container").css("display",'none');

  jQuery('.data-posts-inc-shortcode').css('display','none');

 
  jQuery('.no_more_posts_shortcode').css("display",'none');
    jQuery('.data-posts-btn').css("display",'none');

    jQuery('.background_color_of_load_more_button_shortcode').css("display",'none');


 
  jQuery('.data-posts-inc-shortcode').css('display','none');







        jQuery('.no-data-shortcode').css('display','none');

jQuery(".wrapper-data-container-shortcode-data-posts").css("display",'none');


 jQuery(".data-search_categories-container-shortcode").css("display",'none');
  jQuery(".data-tags-container-shortcode").css("display",'none');

  jQuery('.data-container-shortcode-inc').css('display','none');

  jQuery(".data-container-shortcode").css("display",'none');

      jQuery('.data-shortcode-posts-btn').css("display",'none');


    }


 
   

getResultsProductsShortcode(){
jQuery(".wrapper-data-container-shortcode-data-posts").css("display",'block');
  jQuery(".data-search_categories-container-shortcode").css("display",'block');

  jQuery(".data-container-shortcode").css("display",'block');
    jQuery(".data-button").css("display","none");
  jQuery('.no_more_posts_shortcode').css("display",'none');
           jQuery('.no-data-shortcode').css('display','none');

 // jQuery(".data-categories-container").removeClass("hid");

let counter = 1;
 jQuery(".search-term-shortcode").addClass("loadinggif");


var find_element = 1;

var categories =this.search_categories.val();
var customSearchBox =this.searchFieldProductsShortcode.val();
var number_of_words_in_posts_2 = this.number_of_words_in_posts.val();
var search_post_id_title = jQuery("#search_post_id_title").val();
var number_of_posts = parseInt(jQuery("#numberofposts").val());
var post_id = jQuery("#search_post_id").val();
var search_by_woo_title = jQuery('#search_by_woo_title').val();

if(search_by_woo_title=='1'){
var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
jQuery.getJSON(liveSearchDataPosts[1].root_url+'namespacewoo/v11/search_products/'+customSearchBox+'/'+post_id,function(livesearchposts_1){
        var livesearchposts_1 =  Object.values(livesearchposts_1).filter(item =>  item.post_title.includes(customSearchBox)?item:'' );
        
var xhr = new XMLHttpRequest();
xhr.open("GET", newURL+"/wp-content/plugins/woo-milun-search/public/js/show_result.js", false);
xhr.send();
eval(xhr.responseText);

});

}

var search_by_content = jQuery('#search_by_content').val();


if(search_by_content=='1'){


   jQuery.getJSON(liveSearchDataPosts[1].root_url+'/wp-json/namespace/v11/search_post_types/'+customSearchBox+'/'+post_id,function(livesearchposts_1){
        var livesearchposts_1 = Object.values(livesearchposts_1).filter(item =>  item.post_content.includes(customSearchBox)?item:'' );

var xhr = new XMLHttpRequest();
xhr.open("GET", liveSearchDataPosts[1].root_url+"/wp-content/plugins/milun-search/public/js/search_by_content_shortcode.js", false);
xhr.send();
eval(xhr.responseText);








});


}






   
}



getResultsCategoriesShortcode(){
if (jQuery('.data-categories-container-shortcode').length > 0) {

  var $this =this;
   
       jQuery('.categories').css("display",'none');
        jQuery('.category_and_tag_empty').css("display",'none');
      jQuery('.category_and_tag').css("display",'none');

 jQuery(".data-categories-container-shortcode").css("display",'block').after("<div class='line_below_cat_tag'></div>");
  


    
      var customSearchBox =  $this.searchFieldCategoriesShortcode.val();
       
//alert(customSearchBox);
   

jQuery.getJSON(liveSearchDataCategories[1].root_url+'/wp-json/namespace/v11/searching_front_cat/'+customSearchBox,function(livesearchcategories){
 //  jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/searching_empty_cat/'+ customSearchBox,function(empty_categories){



let unique_3 = [...new Map(livesearchcategories.map((m) => [m.term_id, m])).values()];






var result = unique_3.map(item => 
`<div>
  
            <a class='red_color' href="${liveSearchDataCategories[1].root_url}/${item.taxonomy}/${item.slug}">${item.name} ( ${item.count} )</a> 
</div>
 
  `
).join('')
  

$this.count++;


if($this.count>1){
    jQuery(".category-shortcode-label").remove();

}


if (result.length==0) {
  jQuery(".category-shortcode-label").remove();


    document.getElementsByClassName('data-categories-container-shortcode')[0].innerHTML =liveSearchDataCategories[0].not_found_data;


 
}else {

     


    document.getElementsByClassName('data-categories-container-shortcode')[0].innerHTML =result;

}


  });
}
}
}




   





 



var liveSearchShortcode = new Live_Search_Shortcode();

