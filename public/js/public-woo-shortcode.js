class Live_Search_Shortcode{
  
  constructor(){
     this.searchFieldPostsShortcode = jQuery(".search-term-shortcode");
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
           this.searchFieldPostsShortcode.on("keyup",this.getResultsPostsShortcode.bind(this));

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


 
   

getResultsPostsShortcode(){
jQuery(".wrapper-data-container-shortcode-data-posts").css("display",'block');
  jQuery(".data-search_categories-container-shortcode").css("display",'block');

  jQuery(".data-container-shortcode").css("display",'block');
    jQuery(".data-button").css("display","none");
  jQuery('.no_more_posts_shortcode').css("display",'none');
           jQuery('.no-data-shortcode').css('display','none');

 // jQuery(".data-categories-container").removeClass("hid");

let counter = 1;
 jQuery(".search-term-shortcode").addClass("loadinggif");



//var cpt_image =this.post_type_featured_image.val();
var cpt_image_1 =this.post_type_featured_image1.val();

var cpt_image_2 =this.post_type_featured_image2.val();
var cpt_image_3 =this.post_type_featured_image3.val();
var cpt_image_4 =this.post_type_featured_image4.val();
var cpt_image_5 =this.post_type_featured_image5.val();
var cpt_image_6 =this.post_type_featured_image6.val();

var cpt_image_7 =this.post_type_featured_image7.val();
var cpt_image_8 =this.post_type_featured_image8.val();
var cpt_image_9 =this.post_type_featured_image9.val();
var cpt_image_10 =this.post_type_featured_image10.val();
var cpt_image_11 =this.post_type_featured_image11.val();

var cpt_image_12 =this.post_type_featured_image12.val();
var cpt_image_13 =this.post_type_featured_image13.val();
var cpt_image_14 =this.post_type_featured_image14.val();
var cpt_image_15 =this.post_type_featured_image15.val();
if(cpt_image_1 == 'page'){
  cpt_image_1 = 'pages';
}
if(cpt_image_1 == 'post'){
  cpt_image_1 = 'posts';
}

if(cpt_image_2 == 'post'){
  cpt_image_2 = 'posts';
}
if(cpt_image_2 == 'page'){
  cpt_image_2 = 'pages';
}
if(cpt_image_3 == 'page'){
  cpt_image_3 = 'pages';
}
if(cpt_image_3 == 'post'){
  cpt_image_3 = 'posts';
}

if(cpt_image_4 == 'post'){
  cpt_image_4 = 'posts';
}
if(cpt_image_4 == 'page'){
  cpt_image_4 = 'pages';
}

if(cpt_image_5 == 'post'){
  cpt_image_5 = 'posts';
}
if(cpt_image_5 == 'page'){
  cpt_image_5 = 'pages';
}

if(cpt_image_6 == 'post'){
  cpt_image_6 = 'posts';
}
if(cpt_image_7 == 'page'){
  cpt_image_7 = 'pages';
}

if(cpt_image_8 == 'post'){
  cpt_image_8 = 'posts';
}
if(cpt_image_9 == 'page'){
  cpt_image_9 = 'pages';
}

if(cpt_image_10 == 'post'){
  cpt_image_10 = 'posts';
}
if(cpt_image_11 == 'page'){
  cpt_image_11 = 'pages';
}

if(cpt_image_12 == 'post'){
  cpt_image_12 = 'posts';
}
if(cpt_image_13 == 'page'){
  cpt_image_13 = 'pages';
}

if(cpt_image_14 == 'post'){
  cpt_image_15 = 'posts';
}
if(cpt_image_15 == 'page'){
  cpt_image_15 = 'pages';
}




var find_element = 1;

var categories =this.search_categories.val();
var customSearchBox =this.searchFieldPostsShortcode.val();
var number_of_words_in_posts_2 = this.number_of_words_in_posts.val();
var search_post_id_title = jQuery("#search_post_id_title").val();
var number_of_posts = parseInt(jQuery("#numberofposts").val());
var post_id = jQuery("#search_post_id").val();
var search_by_title = jQuery('#search_by_title').val();
if(search_by_title=='1'){

jQuery.getJSON(liveSearchDataPosts[1].root_url+'/wp-json/namespace/v11/search_post_types/'+customSearchBox+'/'+post_id,function(livesearchposts_1){

        var livesearchposts_1 =  Object.values(livesearchposts_1).filter(item =>  item.post_title.includes(customSearchBox)?item:'' );
var xhr = new XMLHttpRequest();
xhr.open("GET", liveSearchDataPosts[1].root_url+"/wp-content/plugins/milun-search/public/js/search_by_title_shortcode.js", false);
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

