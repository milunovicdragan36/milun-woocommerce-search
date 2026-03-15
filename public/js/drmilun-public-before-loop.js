function debounce(fn, delay) {
  let t = null;
  return function () {
    const ctx = this;
    const args = arguments;
    clearTimeout(t);
    t = setTimeout(function () {
      fn.apply(ctx, args);
    }, delay);
  };
}

jQuery(document).ready(function () {
  document.getElementsByTagName("html")[0].style.visibility = "visible";
jQuery('.my_wrapper').css('display','block');


});
   


class Live_Search_Before_Loop{
  
  constructor(){
     this.searchFieldProductsBeforeLoop = jQuery(".search-term-before_loop");
 this.searchFieldCategoriesBeforeLoop = jQuery(".search-term-before_loop");
  this.searchFieldTagsBeforeLoop = jQuery(".search-term-before_loop");
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
     //this.searchFieldbefore_loop = jQuery(".search-term-before_loop-woo");
     this.searchFieldBeforeLoopWoo = jQuery(".search-term-before_loop-woo");
     this.isSpinnerVisible = false;
     this.typingTimer;
     
     this.isOverlayOpen = false;
     this.template_no_posts;
     this.resultsDiv = jQuery(".search-term-before_loop");
     this.isSpinnerVisible = false;
     this.previousValue;
     this.timeout;
     this.i = 0;
           
this.searchFieldProductsbefore_loop.on(
  "keyup",
  debounce(this.getResultsProductsbefore_loop.bind(this), 400)
);

this.searchFieldCategoriesbefore_loop.on(
  "keyup",
  debounce(this.getResultsCategoriesbefore_loop.bind(this), 400)
);

  
           jQuery('.no-data').css('display','none');
          

jQuery(".data-categories-container").css("display",'none');
jQuery(".data-container").css("display",'none');

  jQuery('.data-posts-inc-before_loop').css('display','none');

 
  jQuery('.no_more_posts_before_loop').css("display",'none');
    jQuery('.data-posts-btn').css("display",'none');

    jQuery('.background_color_of_load_more_button_before_loop').css("display",'none');


 
  jQuery('.data-posts-inc-before_loop').css('display','none');







        jQuery('.no-data-before_loop').css('display','none');

jQuery(".wrapper-data-container-before_loop-data-posts").css("display",'none');


 jQuery(".data-search_categories-container-before_loop").css("display",'none');
  jQuery(".data-tags-container-before_loop").css("display",'none');

  jQuery('.data-container-before_loop-inc').css('display','none');

  jQuery(".data-container-before_loop").css("display",'none');

      jQuery('.data-before_loop-posts-btn').css("display",'block');


    }


 
   

getResultsProductsbefore_loop(){
 jQuery(".search-term-before_loop").addClass("loadinggif");

jQuery(".wrapper-data-container-before_loop-data-posts").css("display",'block');
  jQuery(".data-search_categories-container-before_loop").css("display",'block');

  jQuery(".data-container-before_loop").css("display",'block');
    jQuery(".data-button").css("display","none");
  jQuery('.no_more_posts_before_loop').css("display",'none');
           jQuery('.no-data-before_loop').css('display','none');

 // jQuery(".data-categories-container").removeClass("hid");

let counter = 1;

jQuery('.data-before_loop-posts-btn').css('display','block');
jQuery('.line_below_cat_tag').css('display','none');


var find_element = 1;

var categories =this.search_categories.val();
var customSearchBox =this.searchFieldProductsbefore_loop.val();
var number_of_words_in_posts_2 = this.number_of_words_in_posts.val();
var search_post_id_title = jQuery("#search_post_id_title").val();
var number_of_posts = parseInt(jQuery("#numberofposts").val());
var post_id = jQuery("#search_post_id").val();
var search_by_woo_title = jQuery('#search_by_woo_title').val();



// Get rest base from either "new" or "old" localized structure
const root =
  (window.liveSearchDataPosts && window.liveSearchDataPosts.root_url) ||
  (Array.isArray(window.liveSearchDataPosts) &&
    window.liveSearchDataPosts[1] &&
    window.liveSearchDataPosts[1].root_url);


if (!root) {
  console.warn("liveSearchDataPosts missing on this page", window.liveSearchDataPosts);
  jQuery(".search-term-before_loop").removeClass("loadinggif");
  return;
}

const base = root.replace(/\/?$/, "/");

const url =
  base +
  "namespacewoo/v11/search_products/" +
  encodeURIComponent(customSearchBox) +
  "/" +
  encodeURIComponent(post_id);

jQuery.getJSON(url, function (livesearchposts_1) {
  console.log(livesearchposts_1);
  if (typeof window.milunShowResultBeforeLoop === "function") {
    window.milunShowResultBeforeLoop(livesearchposts_1);
  }
  
if (livesearchposts_1.length==0) {
  jQuery(".data-container-before_loop").css("display","block");

    document.getElementsByClassName('data-container-before_loop')[0].innerHTML =liveSearchDataPosts[0].not_found_data;


 
}
});


}



getResultsCategoriesBeforeLoop(){
const el = document.querySelector('.data-categories-container-before_loop');

if (el) {
  var $this =this;
   
       jQuery('.categories').css("display",'none');
        jQuery('.category_and_tag_empty').css("display",'none');
      jQuery('.category_and_tag').css("display",'none');

  setTimeout(function () {
    jQuery(".data-categories-container-before_loop")
        .css("display", "block")
        .after("<div class='line_below_cat_tag'></div>");
}, 1000);


    
      var customSearchBox =  $this.searchFieldCategoriesBeforeLoop.val();
       
var post_id = jQuery("#search_post_id").val();   

jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v12/searching_woo_categories/'+customSearchBox+'/'+post_id,function(livesearchcategories){




var result = livesearchcategories.map(item => 
`<div>
  
<a class='red_color' href="${MilunSearch.root_url}/product-category/${item.slug}">${item.name}</a></div>
 
  `
).join('')
  

$this.count++;


if($this.count>1){
    jQuery(".category-shortcode-label").remove();

}


if (result.length==0) {
  jQuery(".category-before_loop-label").remove();


    document.getElementsByClassName('data-categories-container-before_loop')[0].innerHTML =liveSearchDataCategories[0].not_found_data;


 
}else {

     


    document.getElementsByClassName('data-categories-container-before_loop')[0].innerHTML =result;

}


  });
}
}
}




   





 



var liveSearchBeforeLoop = new Live_Search_Before_Loop();
