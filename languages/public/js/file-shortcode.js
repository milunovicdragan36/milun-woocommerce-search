const
    uniqueBy = (k, s = new Set) => o => !s.has(o[k]) && s.add(o[k]),
    //array = [{ checkID: 'aaa', animal: 'cat' }, { checkID: 'bbb', animal: 'dog' }, { checkID: 'ccc', animal: 'monkey' }, { checkID: 'ddd', animal: 'horse' }, { checkID: 'eee', animal: 'cow' }, { checkID: 'fff', animal: 'cat' }],
    cpt_images_2 = cpt_images.filter(uniqueBy('slug'));



const duplicates = cpt_images_2.filter(value => livesearchposts_1.some(oneElement => oneElement.post_name === value.slug));
            jQuery('.data-shortcode-posts-btn').css('display','block');
    jQuery('.background_color_of_load_more_button_shortcode').css("display",'block');

 jQuery(".search-term-shortcode").removeClass("loadinggif");
                 jQuery('.data-container-shortcode').css('display','none');

var result_2 = duplicates;
//var result_2 = livesearchposts_1.filter(item =>item.post_title= cpt_images.map(item=>item.title.rendered));



if (result_2.length==0) {
          jQuery('.no-data-shortcode').css('display','block');

    document.getElementsByClassName('no-data-shortcode')[0].innerHTML =liveSearchDataPosts[0].not_found_data;

        jQuery('.data-shortcode-posts-btn').css('display','none');
   
                jQuery('.data-container-shortcode').css('display','none');



}else{
          jQuery('.no-data-shortcode').css('display','none');
           jQuery('.data-shortcode-posts-btn').css('display','block');
   
                jQuery('.data-container-shortcode').css('display','block');



const result_3 = result_2.reduce((accumulator, current) => {
  let exists = accumulator.find(item => {
    return item.post_name === current.slug
  });
  if(!exists) { 
    accumulator = accumulator.concat(current);
  }
  return accumulator;
}, []);

if (result_3.length==0) {

    document.getElementsByClassName('no-data-shortcode')[0].innerHTML =liveSearchDataPosts[0].not_found_data;

        jQuery('.data-shortcode-posts-btn').css('display','none');
   
                jQuery('.data-container-shortcode').css('display','none');



}

var load_post_number =  parseInt(jQuery("#numberofposts").val());
var custom_word_of_number_of_posts = '';   
if(parseInt(jQuery("#numberofposts").val()) == 1){
  custom_word_of_number_of_posts = 'post';
}else{
  custom_word_of_number_of_posts = 'posts';
}


result_3.length=parseInt(jQuery("#numberofposts").val());

jQuery(function() {
  jQuery(".data-container-shortcode div.body").after("<div class='line_below_post'></div>");
  jQuery(".data-container-shortcode div.line_below_post").last().remove();

});
jQuery('.data-container-shortcode-inc').css('display','none');
   document.getElementsByClassName('data-container-shortcode')[0].innerHTML =result_3.map(item =>item.fimg_url ?'<div class="title">'+
    item.title.rendered+ `
<div class='body'><img src=`+item.fimg_url +`>` + item.content.rendered.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
    
 : item.title.rendered == undefined ? ``:`<div class="title">`+item.title.rendered+`</div><div class='body'>` + item.content.rendered.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
 ).join(" ")
;
 
document.getElementsByClassName('data-shortcode-posts-btn')[0].innerHTML=
'<div class="background_color_of_load_more_button_shortcode">Load more...('+parseInt(jQuery("#numberofposts").val())+') '+ custom_word_of_number_of_posts+'</div><div id="no_more_posts_shortcode"></div>';
var hasChild = document.getElementsByClassName('data-container-shortcode')[0];
if(hasChild===null){
    document.getElementsByClassName('no-data-shortcode')[0].innerHTML =liveSearchDataPosts[0].not_found_data;
}else{
 
}
  var $button = jQuery('.background_color_of_load_more_button_shortcode');

var $counter = jQuery('.counter');
//var un_length =$counter.val( parseInt($counter.val())+ parseInt(jQuery("#numberofposts").val())); // `parseInt` converts the `value` from a string to a number
  var number = parseInt($counter.val());
var v = parseInt(jQuery("#numberofposts").val());

var find_element = parseInt(jQuery("#numberofposts").val());
$button.click(function(){
jQuery('.data-container-shortcode').css('display','none');

find_element+=parseInt(jQuery("#numberofposts").val());


const result_4 = result_2.reduce((accumulator, current) => {
  let exists = accumulator.find(item => {
    return item.post_name === current.slug
  });
  if(!exists) { 
    accumulator = accumulator.concat(current);
  }
  return accumulator;
}, []);
var result_10 =result_3.concat(result_4);

const result_11 = result_10.reduce((accumulator, current) => {
  let exists = accumulator.find(item => {
    return item.post_name === current.slug
  });
  if(!exists) { 
    accumulator = accumulator.concat(current);
  }
  return accumulator;
}, []);






if(find_element> parseInt(jQuery("#numberofposts").val())){



var hasChild = document.getElementsByClassName('data-container-shortcode');
if(hasChild!==null){
  jQuery('.data-container-shortcode').css('display','block');

     jQuery('.data-container-shortcode-inc').css('display','none');
  jQuery('.no-data-shortcode').css('display','none');

 result_4.length =find_element;
if (result_4.length==0) {

    document.getElementsByClassName('no-data-shortcode')[0].innerHTML =liveSearchDataPosts[0].not_found_data;

        jQuery('.data-shortcode-posts-btn').css('display','none');
   
                jQuery('.data-container-shortcode').css('display','none');



}else{

jQuery(function() {
  jQuery(".data-container-shortcode div.body").after("<div class='line_below_post'></div>");
  jQuery(".data-container-shortcode div.line_below_post").last().remove();

});


    document.getElementsByClassName('data-container-shortcode')[0].innerHTML =result_4.map(item =>item.fimg_url ?'<div class="title">'+
    item.title.rendered+ `
</div><div class='body'><img src=`+item.fimg_url +`>` + item.content.rendered.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
    
 : item.title.rendered == undefined ? ``:`<div class="title 2">`+item.title.rendered+`</div><div class='body'>` + item.content.rendered.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
 ).join(" ")+`<input type="hidden" style="display:none;" class="counter" value="0"/>`;



document.getElementsByClassName('data-posts-inc-shortcode').innerHTML='<input type="hidden" class="counter" value="0"/>'+
'<div class="background_color_of_load_more_button_shortcode">Load more...('+parseInt(jQuery("#numberofposts").val())+') '+ 1+'</div><div id="no_more_posts_shortcode"></div>';
}

var count = 0;

var number_minus = find_element -parseInt(jQuery("#numberofposts").val());
//var p = jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();

//}

/*else{
       

  }*/


// jQuery('.wrapper-data-container-shortcode-data-posts').scrollTop(eTop );


/*   

jQuery('.wrapper-data-container-shortcode-data-posts').animate({



    }, 3000);
  */
if(parseInt(jQuery("#numberofposts").val())==1){
if(jQuery(".data-container-shortcode div").slice(number_minus).last().position()==undefined){
           jQuery('.wrapper-data-container-shortcode-data-posts').animate({scrollTop: jQuery(".data-container-shortcode div.body").slice(find_element).first().position()}, 500);
alert("toooo");
}else{
     //  let eTop =jQuery(".data-container-shortcode div").slice(number_minus).first();// jQuery('.data-posts-inc-shortcode').children('div').eq(find_element).position();
           jQuery('.wrapper-data-container-shortcode-data-posts').animate({scrollTop: jQuery(".data-container-shortcode div.body").slice(find_element).first().position()}, 500);

}





          jQuery(".data-container-shortcode div").slice(number_minus).first();


}else{


if(jQuery(".data-container-shortcode div").slice(number_minus).first().position()==undefined){
            jQuery('.wrapper-data-container-shortcode-data-posts').animate({scrollTop: jQuery(".data-container-shortcode div.body").slice(find_element).first().position()}, 500);

}else{
     //  let eTop =jQuery(".data-container-shortcode div").slice(number_minus).first();// jQuery('.data-posts-inc-shortcode').children('div').eq(find_element).position();
          jQuery('.wrapper-data-container-shortcode-data-posts').animate({scrollTop: jQuery(".data-container-shortcode div.body").slice(find_element).first().position()}, 500);

}
          jQuery(".data-container-shortcode div").slice(number_minus).first();


}
 


}else{

  jQuery('.data-container-shortcode-inc').css('display','block');
  jQuery('.data-container-shortcode').css('display','none');

 result_4.length =find_element;

    document.getElementsByClassName('data-container-shortcode-inc')[0].innerHTML =result_4.map.map(item =>item.fimg_url ?'<div class="title">'+
    item.title.rendered+ `
<div class='body'><img src=`+item.fimg_url +`>` + item.content.rendered.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
    
 : item.title.rendered == undefined ? ``:`<div class="title">`+item.title.rendered+`</div><div class='body'>` + item.content.rendered.split(/\s+/,number_of_words_in_posts_2).join(" ")+`<a class='red_color' href=`+liveSearchDataCategories[1].root_url+'/'+item.slug+`> `+
 liveSearchDataPosts[0].read_more+`</a></div><br>`
 )+`<input type="hidden" style="display:none;" class="counter" value="0"/>`;



document.getElementsByClassName('data-posts-inc-shortcode').innerHTML='<input type="hidden" class="counter" value="0"/>'+
'<div class="background_color_of_load_more_button_shortcode">Load more...('+parseInt(jQuery("#numberofposts").val())+') '+ 1+'</div></div><div id="no_more_posts_shortcode"></div>';


var count = 0;
var number_minus = number - parseInt($counter.val());
var p = jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();

       let eTop = jQuery('.data-posts-inc-shortcode').children('div').eq(find_element).position();



        var top = jQuery('.data-posts-inc-shortcode div:last').offset().top;
   
            let children = jQuery('.data-posts-inc-shortcode div')[0];
           
               
 jQuery('.wrapper-data-container-shortcode-data-posts').scrollTop(eTop );
   

jQuery('.wrapper-data-container-shortcode-data-posts').animate({



    }, 3000);
          jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();




}



var count = 0;
var number_minus = number - parseInt($counter.val());
var p = jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();

       let eTop = jQuery('.data-posts-inc-shortcode').children('div').eq(find_element).position();

 

jQuery(".data-posts-inc-shortcode").click(function() {

        var top = jQuery('.data-posts-inc-shortcode div:last').offset().top;
   
            let children = jQuery('.data-posts-inc-shortcode div')[0];
           
               
 jQuery('.wrapper-data-container-shortcode-data-posts').scrollTop(eTop );
   

jQuery('.wrapper-data-container-shortcode-data-posts').animate({



    }, 3000);
    
          jQuery(".last_div_for_scrolling_"+find_element).slice(number_minus).first();



});
 

}

/*
var result = livesearchposts_1.concat(cpt_images);

var uniqueNames = [];
jQuery.each(result, function(i, el){
    if(jQuery.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
});
*/
const result_5 = result_2.reduce((accumulator, current) => {
  let exists = accumulator.find(item => {
    return item.post_name === current.slug
  });
  if(!exists) { 
    accumulator = accumulator.concat(current);
  }
  return accumulator;
}, []);




const myText = document.getElementById('no_more_posts_shortcode');



if(find_element == result_5.length || find_element> result_5.length){
    
const myInsertText = '<div class="red_color_no_more_posts_shortcode">No more posts !</div>';
myText.innerHTML = myInsertText;
jQuery('.background_color_of_load_more_button_shortcode').css('display','none');
}


var hasChildmyText = document.getElementById('no_more_posts_shortcode');
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
  
  `) ? result_2.length = v +=parseInt(jQuery("#numberofposts").val()):result_2.length = parseInt(jQuery("#numberofposts").val());

//cpt_images_2.map(item => item.title.rendered) ? cpt_images_2.length = v +=parseInt(jQuery("#numberofposts").val()):cpt_images_2.length = parseInt(jQuery("#numberofposts").val());

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





  //  document.getElementsByClassName('data-container-shortcode')[0].innerHTML =result_1;
 
 //return;
//}

});
}

