window.milunShowResult = function(livesearchposts_1){
 // console.log(livesearchposts_1);

var livesearchposts_1 = livesearchposts_1;


if (livesearchposts_1.length==0) {

    document.getElementsByClassName('no-data-menu')[0].innerHTML =liveSearchDataPosts[0].not_found_data;

        jQuery('.data-menu-posts-btn').css('display','none');
   
                jQuery('.data-container-menu').css('display','none');



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
  jQuery(".data-container-menu div.body").after("<div class='line_below_post'></div>");
  jQuery(".data-container-menu div.line_below_post").last().remove();

});
jQuery('.data-container-menu-inc').css('display','none');
   document.getElementsByClassName('data-container-menu')[0].innerHTML =livesearchposts_2.map(item =>item.thumb ?'<div class="title">'+
    item.post_title+ `
<div class='body'><img src=`+item.thumb +` class='milun-search-thumb'>` + item.post_content.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
    
 : item.post_title == undefined ? ``:`<div class="title">`+item.post_title+`</div><div class='body'>` + item.post_content.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
 ).join(" ")
;
 
document.getElementsByClassName('data-menu-posts-btn')[0].innerHTML=
'<div class="background_color_of_load_more_button_menu">Load more...('+parseInt(jQuery("#numberofpostswoo").val())+') '+ custom_word_of_number_of_posts+'</div><div id="no_more_posts_menu"></div>';
var hasChild = document.getElementsByClassName('data-container-menu')[0];
if(hasChild===null){
    document.getElementsByClassName('no-data-menu')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}else{
 
}
  var $button = jQuery('.background_color_of_load_more_button_menu');

var $counter = jQuery('.counter');
//var un_length =$counter.val( parseInt($counter.val())+ parseInt(jQuery("#numberofpostswoo").val())); // `parseInt` converts the `value` from a string to a number
  var number = parseInt($counter.val());
var v = parseInt(jQuery("#numberofpostswoo").val());

var find_element = parseInt(jQuery("#numberofpostswoo").val());
$button.click(function(){
jQuery('.data-container-menu').css('display','none');

find_element+=parseInt(jQuery("#numberofpostswoo").val());



if(find_element> parseInt(jQuery("#numberofpostswoo").val())){



var hasChild = document.getElementsByClassName('data-container-menu');
if(hasChild!==null){
  jQuery('.data-container-menu').css('display','block');

     jQuery('.data-container-menu-inc').css('display','none');
  jQuery('.no-data-menu').css('display','none');

livesearchposts_2 = livesearchposts_1.slice(0, find_element);
 
if (livesearchposts_2.length==0) {

    document.getElementsByClassName('no-data-menu')[0].innerHTML =liveSearchDataPosts[0].not_found_data;

        jQuery('.data-menu-posts-btn').css('display','none');
   
                jQuery('.data-container-menu').css('display','none');



}else{
jQuery(function() {
  jQuery(".data-container-menu div.body").after("<div class='line_below_post'></div>");
  jQuery(".data-container-menu div.line_below_post").last().remove();

});



    document.getElementsByClassName('data-container-menu')[0].innerHTML =livesearchposts_2.map(item =>item.thumb ?  '<div class="title">'+
    item.post_title+ `
<div class='body'><img src=`+item.thumb +` class='milun-search-thumb'>` + item.post_content.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`

 : item.post_title.rendered == undefined ? ``:`<div class="title 2">`+item.post_title.rendered+`</div><div class='body'>` + item.post_content.rendered.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
 ).join(" ")+`<input type="hidden" style="display:none;" class="counter" value="0"/>`;


document.getElementsByClassName('data-posts-inc-menu').innerHTML='<input type="hidden" class="counter" value="0"/>'+
'<div class="background_color_of_load_more_button_menu">Load more...('+parseInt(jQuery("#numberofpostswoo").val())+') '+ 1+'</div><div id="no_more_posts_menu"></div>';
}
 

var count = 0;

var number_minus = find_element -parseInt(jQuery("#numberofpostswoo").val());
if(parseInt(jQuery("#numberofpostswoo").val())==1){
if(jQuery(".data-container-menu div").slice(number_minus).last().position()==undefined){
           jQuery('.data-container-menu').animate({scrollTop: jQuery(".data-container-menu div.body").slice(find_element).first().position()}, 500);
}else{
     //  let eTop =jQuery(".data-container-menu div").slice(number_minus).first();// jQuery('.data-posts-inc-menu').children('div').eq(find_element).position();
           jQuery('.data-container-menu').animate({scrollTop: jQuery(".data-container-menu div.body").slice(find_element).first().position()}, 500);

}







}else{
var $container = jQuery(".data-container-menu");

var startIndexNew = number_minus;
var $target = jQuery(".data-container-menu div.title").eq(startIndexNew);

if ($target.length) {
  var offset = 60; // try 8, 12, 20...
  var top = $target.position().top + $container.scrollTop() - offset;
  $container.animate({ scrollTop: Math.max(0, top) }, 500);
}
/*
if(jQuery(".data-container-menu div").slice(number_minus).first().position()==undefined){
            jQuery('.data-container-menu').animate({scrollTop: jQuery(".data-container-menu div.body").slice(find_element).first().position()}, 500);

}else{
          jQuery('.data-container-menu').animate({scrollTop: jQuery(".data-container-menu div.body").slice(find_element).first().position()}, 500);

}
          jQuery(".data-container-menu div").slice(number_minus).first();
*/

}



}else{




document.getElementsByClassName('data-posts-inc-menu').innerHTML='<input type="hidden" class="counter" value="0"/>'+
'<div class="background_color_of_load_more_button_menu">Load more...('+parseInt(jQuery("#numberofpostswoo").val())+') '+ 1+'</div></div><div id="no_more_posts_menu"></div>';


var count = 0;
var number_minus = number - parseInt($counter.val());
var p = jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();

       let eTop = jQuery('.data-posts-inc-menu').children('div').eq(find_element).position();



        var top = jQuery('.data-posts-inc-menu div:last').offset().top;
   
            let children = jQuery('.data-posts-inc-menu div')[0];
           
               
 jQuery('.wrapper-data-container-menu-data-posts').scrollTop(eTop );
   

jQuery('.wrapper-data-container-menu-data-posts').animate({



    }, 3000);
          jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();




}



var count = 0;
var number_minus = number - parseInt($counter.val());
var p = jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();

       let eTop = jQuery('.data-posts-inc-menu').children('div').eq(find_element).position();

 

jQuery(".data-posts-inc-menu").click(function() {

        var top = jQuery('.data-posts-inc-menu div:last').offset().top;
   
            let children = jQuery('.data-posts-inc-menu div')[0];
           
               
 jQuery('.wrapper-data-container-menu-data-posts').scrollTop(eTop );
   

jQuery('.wrapper-data-container-menu-data-posts').animate({



    }, 3000);
    
          jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();



});
 

}

/*
const result_5 = result_4.reduce((accumulator, current) => {
  let exists = accumulator.find(item => {
    return item.post_name === current.slug
  });
  if(!exists) { 
    accumulator = accumulator.concat(current);
  }
  return accumulator;
}, []);
*/



const myText = document.getElementById('no_more_posts_menu');

alert('find_element '+find_element);
alert('livesearchposts_1.length '+livesearchposts_1.length);

if(find_element == livesearchposts_1.length || find_element> livesearchposts_1.length){
    
const myInsertText = '<div class="red_color_no_more_posts_menu">No more posts !</div>';
myText.innerHTML = myInsertText;
jQuery('.background_color_of_load_more_button_menu').css('display','none');
}


var hasChildmyText = document.getElementById('no_more_posts_menu');
if(hasChildmyText!==null){
 }else{

 }
 
/*
result_2.map(item =>  item.featured_image  ?
 ` <div class='last_div_for_scrolling_`+find_element+`'>
        <a href=${item.slug}>${item.title ? item.title.rendered : item.post_title}</a>

    <img src=${item.featured_image} class="image_size">
           <p>${item.content ? item.content.rendered.substring(0, number_of_words_in_posts_2) : item.post_content.substring(0, number_of_words_in_posts_2)}</p>
<a href=`+item.slug+`>`+liveSearchDataPosts[0].read_more+`</a>
  </div> ` :  ` <div class='last_div_for_scrolling_`+find_element+`'>
      
        ${item.title ? item.title.rendered : item.post_title}
                   <p>${item.content ? item.content.rendered.substring(0, number_of_words_in_posts_2) : item.post_content.substring(0, number_of_words_in_posts_2)}</p>
<a href=`+item.slug+`>`+liveSearchDataPosts[0].read_more+`</a>
  </div>
  
  `) ? result_2.length = v +=parseInt(jQuery("#numberofpostswoo").val()):result_2.length = parseInt(jQuery("#numberofpostswoo").val());

//cpt_images_2.map(item => item.title.rendered) ? cpt_images_2.length = v +=parseInt(jQuery("#numberofpostswoo").val()):cpt_images_2.length = parseInt(jQuery("#numberofpostswoo").val());

var for_counting = result_2.length;

var result_1 = result_2.map(item =>  item.featured_image  ?
 ` <div class='last_div_for_scrolling_`+find_element
+`'>
        <a href=${item.slug}>${item.title ? item.title.rendered : item.post_title}</a>

    <img src=${item.featured_image} class="image_size">
           <p>${item.content ? item.content.rendered.substring(0, number_of_words_in_posts_2): item.post_content.substring(0, number_of_words_in_posts_2)}</p>

  </div> `

   


   :` <div class='last_div_for_scrolling_`+find_element+`'>
        <a href=${item.slug}>${item.title ? item.title.rendered : item.post_title}</a>
                   <p>${item.content ? item.content.rendered : item.post_content}</p>
<a href=`+item.slug+`>`+liveSearchDataPosts[0].read_more+`</a>
  </div>
  
  `



  


 
).join("");
*/
// console.log('result '+result_2.length);
 // console.log('result_1 '+livesearchposts_1.length);




  //  document.getElementsByClassName('data-container-menu')[0].innerHTML =result_1;
 
 //return;
//}

});
}