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


class Live_Search_Popup{
  
  constructor(){
     this.searchFieldProductsPopup = jQuery(".search-term-popup");
 this.searchFieldCategoriesPopup = jQuery(".search-term-popup");
  this.searchFieldTagsPopup = jQuery(".search-term-popup");
  this.searchCategoriesAdmin =jQuery("#search_categories");

  this.searchTagsAdmin =jQuery("#search_tags");
    

     this.post_id = jQuery("#search_post_id_woo");
     this.numberofposts = jQuery("#numberofposts");
     this.search_categories = jQuery("#search_categories");
this.count = 0;
 this.number_of_words_in_posts = jQuery("#numberofwordsinposts");

      const $this = this; 
   
    
    this.isSpinnerVisible = false;
     this.typingTimer;
     
     this.isOverlayOpen = false;
     this.template_no_posts;
     this.resultsDiv = jQuery(".search-term-widget");
     this.isSpinnerVisible = false;
     this.previousValue;
     this.timeout;
     this.i = 0;
           
this.searchFieldProductsPopup.on(
  "keyup",
  debounce(this.getResultsProductsPopup.bind(this), 400)
);

this.searchFieldCategoriesPopup.on(
  "keyup",
  debounce(this.getResultsCategoriesPopup.bind(this), 400)
);
jQuery(".data-categories-container-popup").css("display",'block').after("<div class='line_below_cat_tag'></div>");
  


  
           jQuery('.no-data').css('display','none');
          

jQuery(".data-categories-container").css("display",'none');
jQuery(".data-container").css("display",'none');

  jQuery('.data-posts-inc-popup').css('display','none');

 
  jQuery('.no_more_posts_popup').css("display",'none');
    jQuery('.data-posts-btn').css("display",'none');

    jQuery('.background_color_of_load_more_button_popup').css("display",'none');


 
  jQuery('.data-posts-inc-popup').css('display','none');







        jQuery('.no-data-popup').css('display','none');

jQuery(".wrapper-data-container-popup-data-posts").css("display",'none');


 jQuery(".data-search_categories-container-popup").css("display",'none');
  jQuery(".data-tags-container-popup").css("display",'none');

  jQuery('.data-container-popup-inc').css('display','none');

  jQuery(".data-container-popup").css("display",'none');

      jQuery('.data-popup-posts-btn').css("display",'none');


    }


 
   

getResultsProductsPopup(){
    jQuery(".data-container-popup").css("display",'none');

  /*
  const el = document.querySelector('.pop_up_popup');
const rect = el.getBoundingClientRect();

const distanceFromBottom = window.innerHeight - rect.bottom;

if (distanceFromBottom < 400) {
    */  
jQuery(".wrapper-data-container-popup-data-posts").css("display",'block');

//}

  jQuery(".data-search_categories-container-popup").css("display",'block');

  jQuery(".data-container-popup").css("display",'block');
    jQuery(".data-button").css("display","none");
  jQuery('.no_more_posts_popup').css("display",'none');
           jQuery('.no-data-popup').css('display','none');

 // jQuery(".data-categories-container").removeClass("hid");

let counter = 1;
 jQuery(".search-term-popup").addClass("loadinggif");
        jQuery('.data-popup-posts-btn').css('display','block');


var find_element = 1;

var categories =this.search_categories.val();
var customSearchBox =this.searchFieldProductsPopup.val();
var number_of_words_in_posts_2 = this.number_of_words_in_posts.val();
var search_post_id_title = jQuery("#search_post_id_title").val();
var number_of_posts = parseInt(jQuery("#numberofposts").val());
var post_id = jQuery("#search_post_id_woo").val();
var search_by_woo_title = jQuery('#search_by_woo_title').val();

const root =
  (window.liveSearchDataPosts &&
    window.liveSearchDataPosts.root_url) ||
  (Array.isArray(window.liveSearchDataPosts) &&
    window.liveSearchDataPosts[1] &&
    window.liveSearchDataPosts[1].root_url) ||
  "";

const postId =
  typeof post_id !== "undefined" ? post_id : "";


if (!root || !postId) {
  jQuery(".search-term-popup").removeClass("loadinggif");
  console.log("Missing root or postId");
  return;
}

const base = root.replace(/\/?$/, "/");

const url =
  base +
  "namespacewoo/v11/search_products/" +
  encodeURIComponent(customSearchBox) +
  "/" +
  encodeURIComponent(postId);


jQuery.getJSON(url, function (livesearchposts_1) {

  if (typeof window.milunShowResult === "function") {
    window.milunShowResult(livesearchposts_1);
  }
  if (livesearchposts_1.length==0) {
 jQuery(".background_color_of_load_more_button_popup").css("display","none");
jQuery(".data-popup-posts-btn").css("display","none");
jQuery(".search-term-popup").removeClass("loadinggif");

    document.getElementsByClassName('data-container-popup')[0].innerHTML =liveSearchDataPosts[0].not_found_data;;


 
}
});


}



getResultsCategoriesPopup(){
const el = document.querySelector('.data-categories-container-popup');

if (el) {
  var $this =this;
   
       jQuery('.categories').css("display",'none');
        jQuery('.category_and_tag_empty').css("display",'none');
      jQuery('.category_and_tag').css("display",'none');

// jQuery(".data-categories-container-popup").css("display",'none').after("<div class='line_below_cat_tag'></div>");
  


    
      var customSearchBox =  $this.searchFieldCategoriesPopup.val();

      var post_id = jQuery("#search_post_id_woo").val();
jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v12/searching_woo_categories/'+customSearchBox+'/'+post_id,function(livesearchcategories){
 //  jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/searching_empty_cat/'+ customSearchBox,function(empty_categories){




var result = livesearchcategories.map(item => 
`<div>
  
<a class='red_color' href="${MilunSearch.root_url}/product-category/${item.slug}">${item.name} ( ${item.count} )</a></div>
 
  `
).join('')
  

$this.count++;


if($this.count>1){
    jQuery(".category-shortcode-label").remove();

}


if (result.length==0) {
  jQuery(".category-popup-label").remove();


    document.getElementsByClassName('data-categories-container-popup')[0].innerHTML =liveSearchDataCategories[0].not_found_data;


 
}else {

     


    document.getElementsByClassName('data-categories-container-popup')[0].innerHTML =result;

}


  });
}
}
}




   





 



var liveSearchPopup = new Live_Search_Popup();

