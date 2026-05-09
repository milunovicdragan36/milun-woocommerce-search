window.milunShowResultBeforeTitleFullWidth = function(livesearchposts_1){
 // console.log(livesearchposts_1);

var livesearchposts_1 = livesearchposts_1;


if (livesearchposts_1.length==0) {
    document.getElementsByClassName('no-data-before_title_full_width')[0].innerHTML =liveSearchDataPosts.i18n.not_found_data;

        jQuery('.data-before_title_full_width-posts-btn').css('display','none');
   
                jQuery('.data-container-before_title_full_width').css('display','none');



}

var load_post_number =  parseInt(jQuery("#numberofpostswoo").val());
var custom_word_of_number_of_posts = '';   
if(parseInt(jQuery("#numberofpostswoo").val()) == 1){
  custom_word_of_number_of_posts = 'post';
}else{
  custom_word_of_number_of_posts = 'posts';
}


//livesearchposts_1.length=parseInt(jQuery("#numberofpostswoo").val());
let maxPosts = parseInt(jQuery("#numberofpostswoo").val());

  livesearchposts_2 = livesearchposts_1.slice(0, maxPosts);

var number_of_words_in_posts_2=parseInt(jQuery("#numberofwordsinposts").val());

jQuery(function() {
  jQuery(".data-container-before_title_full_width div.body").after("<div class='line_below_post'></div>");
  jQuery(".data-container-before_title_full_width div.line_below_post").last().remove();

});
jQuery('.data-container-before_title_full_width-inc').css('display','none');
   document.getElementsByClassName('data-container-before_title_full_width')[0].innerHTML =livesearchposts_2.map(item =>item.thumb ?  `
<img src=`+item.thumb +` class='milun-search-thumb'><div class='body'><div class="title" style="font-weight: bold;">`+
    item.post_title+`</div><div class="price">`+milunBeforeTitleFullWidth.currency_symbol +
    item.price+`</div>` + item.post_content.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href="${liveSearchDataPosts[0].site_url}product/${item.post_name}"> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
    
 : item.post_title == undefined ? ``:`<div class="title" style="font-weight: bold;">`+item.post_title+`</div><div class='body'>` + item.post_content.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href="${liveSearchDataPosts[0].site_url}product/${item.post_name}"> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
 ).join(" ")
;
document.getElementsByClassName('data-before_title_full_width-posts-btn')[0].innerHTML=
'<div class="background_color_of_load_more_button_before_title_full_width">Load more...('+parseInt(jQuery("#numberofpostswoo").val())+') '+ custom_word_of_number_of_posts+'</div><div id="no_more_posts_before_title_full_width"></div>';
jQuery(".search-term-before_title_full_width").removeClass("loadinggif");
var hasChild = document.getElementsByClassName('data-container-before_title_full_width')[0];
if(hasChild===null){
    document.getElementsByClassName('no-data-before_title_full_width')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}else{
 
}
  var $button = jQuery('.background_color_of_load_more_button_before_title_full_width');

var $counter = jQuery('.counter');
//var un_length =$counter.val( parseInt($counter.val())+ parseInt(jQuery("#numberofpostswoo").val())); // `parseInt` converts the `value` from a string to a number
  var number = parseInt($counter.val());
var v = parseInt(jQuery("#numberofpostswoo").val());

var find_element = parseInt(jQuery("#numberofpostswoo").val());
$button.click(function(){
jQuery('.data-container-before_title_full_width').css('display','none');

find_element+=parseInt(jQuery("#numberofpostswoo").val());



if(find_element> parseInt(jQuery("#numberofpostswoo").val())){



var hasChild = document.getElementsByClassName('data-container-before_title_full_width');
if(hasChild!==null){
  jQuery('.data-container-before_title_full_width').css('display','block');

     jQuery('.data-container-before_title_full_width-inc').css('display','none');
  jQuery('.no-data-before_title_full_width').css('display','none');

livesearchposts_2 = livesearchposts_1.slice(0, find_element);
 
if (livesearchposts_2.length==0) {

    document.getElementsByClassName('no-data-before_title_full_width')[0].innerHTML =liveSearchDataPosts[0].not_found_data;

        jQuery('.data-before_title_full_width-posts-btn').css('display','none');
   
                jQuery('.data-container-before_title_full_width').css('display','none');



}else{
jQuery(function() {
  jQuery(".data-container-before_title_full_width div.body").after("<div class='line_below_post'></div>");
  jQuery(".data-container-before_title_full_width div.line_below_post").last().remove();

});



    document.getElementsByClassName('data-container-before_title_full_width')[0].innerHTML =livesearchposts_2.map(item =>item.thumb ?  `
    
<img src=`+item.thumb +` class='milun-search-thumb'><div class='body'><div class="title" style="font-weight: bold;">`+item.post_title+`</div><div class="price">`+
   milunBeforeTitleFullWidth.currency_symbol + item.price+`</div>` + item.post_content.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href="${liveSearchDataPosts[0].site_url}product/${item.post_name}"> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`

 : item.post_title.rendered == undefined ? ``:`<div class="title 2" style="font-weight: bold;">`+item.post_title.rendered+`</div><div class='body'>` + item.post_content.rendered.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href="${liveSearchDataPosts[0].site_url}product/${item.post_name}"> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
 ).join(" ")+`<input type="hidden" style="display:none;" class="counter" value="0"/>`;


document.getElementsByClassName('data-posts-inc-before_title_full_width').innerHTML='<input type="hidden" class="counter" value="0"/>'+
'<div class="background_color_of_load_more_button_before_title_full_width">Load more...('+parseInt(jQuery("#numberofpostswoo").val())+') '+ 1+'</div><div id="no_more_posts_before_title_full_width"></div>';
}
 

var count = 0;

var number_minus = find_element -parseInt(jQuery("#numberofpostswoo").val());
if(parseInt(jQuery("#numberofpostswoo").val())==1){
if(jQuery(".data-container-before_title_full_width div").slice(number_minus).last().position()==undefined){
           jQuery('.data-container-before_title_full_width').animate({scrollTop: jQuery(".data-container-before_title_full_width div.body").slice(find_element).first().position()}, 500);
}else{
     //  let eTop =jQuery(".data-container-before_title_full_width div").slice(number_minus).first();// jQuery('.data-posts-inc-before_title_full_width').children('div').eq(find_element).position();
           jQuery('.data-container-before_title_full_width').animate({scrollTop: jQuery(".data-container-before_title_full_width div.body").slice(find_element).first().position()}, 500);

}







}else{
var $container = jQuery(".data-container-before_title_full_width");

var startIndexNew = number_minus;
var $target = jQuery(".data-container-before_title_full_width div.title").eq(startIndexNew);

if ($target.length) {
  var offset = 60; // try 8, 12, 20...
  var top = $target.position().top + $container.scrollTop() - offset;
  $container.animate({ scrollTop: Math.max(0, top) }, 500);
}


}



}else{




document.getElementsByClassName('data-posts-inc-before_title_full_width').innerHTML='<input type="hidden" class="counter" value="0"/>'+
'<div class="background_color_of_load_more_button_before_title_full_width">Load more...('+parseInt(jQuery("#numberofpostswoo").val())+') '+ 1+'</div></div><div id="no_more_posts_before_title_full_width"></div>';


var count = 0;
var number_minus = number - parseInt($counter.val());
var p = jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();

       let eTop = jQuery('.data-posts-inc-before_title_full_width').children('div').eq(find_element).position();



        var top = jQuery('.data-posts-inc-before_title_full_width div:last').offset().top;
   
            let children = jQuery('.data-posts-inc-before_title_full_width div')[0];
           
               
 jQuery('.wrapper-data-container-before_title_full_width-data-posts').scrollTop(eTop );
   

jQuery('.wrapper-data-container-before_title_full_width-data-posts').animate({



    }, 3000);
          jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();




}



var count = 0;
var number_minus = number - parseInt($counter.val());
var p = jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();

       let eTop = jQuery('.data-posts-inc-before_title_full_width').children('div').eq(find_element).position();

 

jQuery(".data-posts-inc-before_title_full_width").click(function() {

        var top = jQuery('.data-posts-inc-before_title_full_width div:last').offset().top;
   
            let children = jQuery('.data-posts-inc-before_title_full_width div')[0];
           
               
 jQuery('.wrapper-data-container-before_title_full_width-data-posts').scrollTop(eTop );
   

jQuery('.wrapper-data-container-before_title_full_width-data-posts').animate({



    }, 3000);
    
          jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();



});
 

}





const myText = document.getElementById('no_more_posts_before_title_full_width');


if(find_element == livesearchposts_1.length || find_element> livesearchposts_1.length){
    
const myInsertText = '<div class="red_color_no_more_posts_before_title_full_width">No more posts !</div>';
myText.innerHTML = myInsertText;
jQuery('.background_color_of_load_more_button_before_title_full_width').css('display','none');
}


var hasChildmyText = document.getElementById('no_more_posts_before_title_full_width');
if(hasChildmyText!==null){
 }else{

 }


});
}