function cbChange(obj) {
    var cbs = document.getElementsByClassName("cb");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}
class Live_Search_Categories{
  
  constructor(){
     

    this.selectedMenu = jQuery(".selectedMenu");
    this.searchCategories = jQuery(".search-categories");
     this.searchWooCategories = jQuery(".search-woo_categories");
     this.searchField = jQuery(".search-terms");
     this.searchSku = jQuery(".search-sku");
     this.searchWooUsers = jQuery(".search-woo_users");
     this.search_type_of_product = jQuery(".search-type_of_product");
     this.search_custom_post_types = jQuery(".search-custom_post_types");
     this.search_meta_data_of_post_types = jQuery(".search-meta_data_of_post_types");

     this.search_visibility_of_product = jQuery(".search-visibility_of_product");
this.search_title_of_product = jQuery(".search-title_of_product");
          //this.searchTermS = jQuery("input[name='additionaltitlename']").eq(-1);
          //this.size = jQuery("input[name='additionaltitlename']").eq(-1);
         // this.searchTerm2 = jQuery("input[name='additionaltitlename']").eq(-2);
     this.isSpinnerVisible = false;
     this.typingTimer;
     
     this.isOverlayOpen = false;
     this.template_no_posts;
     this.resultsDiv = jQuery("#search-overlay__results");
     this.isSpinnerVisible = false;
     this.previousValue;
     this.timeout;
   
     this.myID = jQuery("#myID");    
     this.postID = jQuery("#postID");
     this.WooPostID = jQuery('#search_post_id_woo');


     

     this.searchTerm =jQuery('[id^=term-]');

    // this.searchTerm.on('keyup',this.getResultsTerm.bind(this));
      const $this = this; 
     this.searchTerm.on('focus',function(){ 
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
        jQuery('[id^=term-]').eq(-4).val("");

        jQuery('[id^=term-]').eq(-5).val("");
        jQuery('[id^=term-]').eq(-6).val("");
        jQuery('[id^=term-]').eq(-7).val("");
        jQuery('[id^=term-]').eq(-8).val("");

        jQuery('[id^=term-]').eq(-9).val("");
        jQuery('[id^=term-]').eq(-10).val("");
        jQuery('[id^=term-]').eq(-11).val("");
        jQuery('[id^=term-]').eq(-12).val("");
     });

     this.searchTerm1 =jQuery('[id^=term-]').eq(-1);

     //this.searchTerm1.on('keyup',this.getResultsTerm.bind(this)); 
     this.searchTerm1.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
                jQuery('[id^=term-]').eq(-4).val("");

          
     });




 this.searchTerm2 =jQuery('[id^=term-]').eq(-2);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm2.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
      jQuery('[id^=term-]').eq(-3).val("");
              jQuery('[id^=term-]').eq(-4).val("");

     
     });
  this.searchTerm3 =jQuery('[id^=term-]').eq(-3);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm3.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-4).val("");

     
     }); 

    this.searchTerm4 =jQuery('[id^=term-]').eq(-4);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm4.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");

     
     });

    this.searchTerm5 =jQuery('[id^=term-]').eq(-5);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm5.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
        jQuery('[id^=term-]').eq(-4).val("");
     
     }); 
     

     this.searchTerm6 =jQuery('[id^=term-]').eq(-6);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm6.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
        jQuery('[id^=term-]').eq(-4).val("");
        jQuery('[id^=term-]').eq(-5).val(""); 
     
     }); 

     this.searchTerm7 =jQuery('[id^=term-]').eq(-7);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm7.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
        jQuery('[id^=term-]').eq(-4).val("");
        jQuery('[id^=term-]').eq(-5).val(""); 
        jQuery('[id^=term-]').eq(-6).val("");
        
     }); 

     this.searchTerm8 =jQuery('[id^=term-]').eq(-8);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm8.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
        jQuery('[id^=term-]').eq(-4).val("");
        jQuery('[id^=term-]').eq(-5).val(""); 
        jQuery('[id^=term-]').eq(-6).val("");
        jQuery('[id^=term-]').eq(-7).val("");

     }); 

     this.searchTerm9 =jQuery('[id^=term-]').eq(-9);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm9.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
        jQuery('[id^=term-]').eq(-4).val("");
        jQuery('[id^=term-]').eq(-5).val(""); 
        jQuery('[id^=term-]').eq(-6).val("");
        jQuery('[id^=term-]').eq(-7).val("");
        jQuery('[id^=term-]').eq(-8).val("");

     }); 


     this.searchTerm10 =jQuery('[id^=term-]').eq(-10);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm10.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
        jQuery('[id^=term-]').eq(-4).val("");
        jQuery('[id^=term-]').eq(-5).val(""); 
        jQuery('[id^=term-]').eq(-6).val("");
        jQuery('[id^=term-]').eq(-7).val("");
        jQuery('[id^=term-]').eq(-8).val("");
        jQuery('[id^=term-]').eq(-9).val("");
     }); 

     this.searchTerm11 =jQuery('[id^=term-]').eq(-11);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm11.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
        jQuery('[id^=term-]').eq(-4).val("");
        jQuery('[id^=term-]').eq(-5).val(""); 
        jQuery('[id^=term-]').eq(-6).val("");
        jQuery('[id^=term-]').eq(-7).val("");
        jQuery('[id^=term-]').eq(-8).val("");
        jQuery('[id^=term-]').eq(-9).val("");
        jQuery('[id^=term-]').eq(-10).val("");

     }); 


     this.searchTerm12 =jQuery('[id^=term-]').eq(-12);

     //this.searchTerm2.on('keyup',this.getResultsTerm.bind(this));
       
     this.searchTerm12.on('focus',function(){ 
        jQuery('[id^=term-]').val("");
        jQuery('[id^=term-]').eq(-1).val("");
        jQuery('[id^=term-]').eq(-2).val("");
        jQuery('[id^=term-]').eq(-3).val("");
        jQuery('[id^=term-]').eq(-4).val("");
        jQuery('[id^=term-]').eq(-5).val(""); 
        jQuery('[id^=term-]').eq(-6).val("");
        jQuery('[id^=term-]').eq(-7).val("");
        jQuery('[id^=term-]').eq(-8).val("");
        jQuery('[id^=term-]').eq(-9).val("");
        jQuery('[id^=term-]').eq(-10).val("");
        jQuery('[id^=term-]').eq(-11).val("");

     }); 
//this.selectedMenu.on('change',this.selectedPodMenu.bind(this));          
this.searchCategories.on('keyup',this.getResultsCategories.bind(this));

this.searchWooCategories.on('keyup',this.getResultsWooCategories.bind(this));
this.searchTerm.on('keyup',this.getResultsTerm.bind(this));
this.searchSku.on('keyup',this.getResultsSku.bind(this));
this.searchWooUsers.on('keyup',this.getResultsWooUsers.bind(this));
this.search_type_of_product.on('keyup',this.getResultsType_of_product.bind(this));
this.search_custom_post_types.on('keyup',this.getResultsCustom_post_types.bind(this));
this.search_meta_data_of_post_types.on('keyup',this.getResultsMetaDataof_post_types.bind(this));

this.search_visibility_of_product.on('keyup',this.getResultsVisibility_of_product.bind(this));

this.search_title_of_product.on('keyup',this.getResultsSearch_title_of_product.bind(this));

  }
 selectedPodMenu(){
  jQuery(".selectedPodMenu").css("display",'block');
 } 




  getResultsSearch_title_of_product(){
 
  var $this =this;
   
       jQuery('.titles_of_products').css("display",'none');
        jQuery('.title_of_product').css("display",'none');
      jQuery('.title_of_product_empty').css("display",'none');
      jQuery('.no_product_titles').css("display",'none');

    
      var customSearchBox =  $this.search_title_of_product.val();
//alert(customSearchBox);
    
       var WooPostID =$this.WooPostID.val();


  jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/search_post_titles_of_products/'+customSearchBox,function(title_of_product){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/search_empty_post_titles_of_products/'+ customSearchBox,function(title_of_product_empty){




   let title_of_product_unique = [...new Map(title_of_product.map((m) => [m.post_title, m])).values()];

   title_of_product_unique = title_of_product_unique.filter(
     item => !title_of_product_empty.some(
       emptyItem => emptyItem.meta_value === item.post_title
     )
   );



if(title_of_product_unique.length != 0){
console.log(title_of_product_unique);
       jQuery('.title_of_product').css("display",'block');

     var result_1 = title_of_product_unique.map(item=>`<div onclick="hideTitleProductFunction('`+item.post_title.replace(/[^\w\s]/gi, '')
+`')" class='white'>`+
  item.post_title
+
  `</div>`).join("");

            document.getElementsByClassName('title_of_product')[0].innerHTML =result_1;


}



   

if(title_of_product_empty.length != 0){
  console.log(title_of_product_empty);
 jQuery('.title_of_product_empty').css("display",'block');
 var result_2 = title_of_product_empty.map(item=> `<div onclick="hideTitleProductFunction('`+item.meta_key.replace(/[^\w\s]/gi, '')
+`')" class='pink'>`+
  item.meta_value
+
  `</div>`).join("");

             document.getElementsByClassName('title_of_product_empty')[0].innerHTML =result_2;
     
     
}



if(title_of_product_unique.length == 0  && title_of_product_empty.length == 0){
jQuery('.no_product_titles').css("display",'block');
                     document.getElementsByClassName('no_product_titles')[0].innerHTML =liveSearchDataCategories[0].no_search_results;

}  


});

 });
}
 getResultsCategories(){
 
  var $this =this;
   
       jQuery('.categories').css("display",'none');
        jQuery('.category_empty').css("display",'none');
      jQuery('.category').css("display",'none');

    
      var customSearchBox =  $this.searchCategories.val();
       
//alert(customSearchBox);
    
       var WooPostID =$this.WooPostID.val();


    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/searching_cat/'+customSearchBox,function(categories){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/searching_empty_cat/'+ customSearchBox,function(empty_categories){


 


if(categories.length != 0){
       jQuery('.category').css("display",'block');

     var result_1 = categories.map(item=>`<div onclick="myFunction('`+item.term_id
+`')" class='white'>`+
  item.name
+
  `</div>`).join("");
  console.log(result_1);



 
            document.getElementsByClassName('category')[0].innerHTML =result_1;


}



//}


 

   

if(empty_categories.length != 0){
 jQuery('.category_empty').css("display",'block');
 var result_2 = empty_categories.map(item=> `<div onclick="myFunction('`+item.term_id
+`')" class='pink'>`+
  item.name
+
  `</div>`).join("");
             document.getElementsByClassName('category_empty')[0].innerHTML =result_2;
     
     
}


});

 });

 } 

 getResultsWooCategories(){
 
  var $this =this;
   
       jQuery('.woo_categories').css("display",'none');
        jQuery('.woo_category_empty').css("display",'none');
      jQuery('.woo_category').css("display",'none');
      jQuery('.no_woo_categories').css("display",'none');


    
      var customSearchBox =  $this.searchWooCategories.val();
       
//alert(customSearchBox);
    
       var WooPostID =$this.WooPostID.val();


    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v11/searching/'+customSearchBox,function(woo_categories){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v11/empty_searching/'+ customSearchBox,function(empty_woo_categories){




if(woo_categories.length != 0){
       jQuery('.woo_category').css("display",'block');

     var result_1 = woo_categories.map(item=>`<div onclick="myWooCategoryFunction('`+item.term_id
+`')" class='white'>`+
  item.name
+
  `</div>`).join("");

 
            document.getElementsByClassName('woo_category')[0].innerHTML =result_1;


}
  

if(empty_woo_categories.length != 0){
 jQuery('.woo_category_empty').css("display",'block');
 var result_2 = empty_woo_categories.map(item=> `<div onclick="myWooCategoryFunction('`+item.term_id
+`')" class='pink'>`+
  item.name
+
  `</div>`).join("");

             document.getElementsByClassName('woo_category_empty')[0].innerHTML =result_2;
     
     
}
if(woo_categories.length == 0  && empty_woo_categories.length == 0){
jQuery('.no_woo_categories').css("display",'block');
                     document.getElementsByClassName('no_woo_categories')[0].innerHTML =liveSearchDataCategories[0].no_search_results;

}  

});

 });

 }     


getResultsTerm(){
 
  //  alert(this.WooPostID.val());
     //  var WooPostID = this.WooPostID.val();

    // jQuery(".data-terms-products-"+jQuery('[id^=term-]').val()).html("");
    // jQuery(".data-terms-products-2-"+jQuery('[id^=term-]').val()).html("");
    //var customSearchBox = jQuery('[id^=term-]').val();
    //var customSearchBoxS = jQuery("input[name='additionaltitlename']").eq(-1).val();
    var $this =this;

 var KeyID = event.keyCode;
       

this.template_no_terms =`
              Sorry, but there is no term for that query.
              Please try another query.                                           
              `;
       
        
      switch(KeyID)
         {
            case 8:
      jQuery(".terms-container").html(this.template_no_terms);
   setTimeout(function() {
    window.location.reload();

  }, 3000);            

            break; 
            case 46:
      jQuery(".terms-container").html(this.template_no_terms);
   setTimeout(function() {
    window.location.reload();

  }, 3000);
              break;
            default:
            break;
         }  
  
    if(this.searchTerm.val()){
      var customSearchBox =  $this.searchTerm.val();
       var term = jQuery('[id^=myterm-]').val();

    } 
  if(this.searchTerm1.val()){
      var customSearchBox =  $this.searchTerm1.val();
       var term = jQuery('[id^=myterm-]').eq(-1).val();



   }
 if(this.searchTerm2.val()){
      var customSearchBox =  $this.searchTerm2.val();
       var term = jQuery('[id^=myterm-]').eq(-2).val();



   }
 if(this.searchTerm3.val()){
      var customSearchBox =  $this.searchTerm3.val();
       var term = jQuery('[id^=myterm-]').eq(-3).val();



   }
 if(this.searchTerm4.val()){
      var customSearchBox =  $this.searchTerm4.val();
       var term = jQuery('[id^=myterm-]').eq(-4).val();



   }


  if(this.searchTerm5.val()){
      var customSearchBox =  $this.searchTerm5.val();
       var term = jQuery('[id^=myterm-]').eq(-5).val();



   }
 if(this.searchTerm6.val()){
      var customSearchBox =  $this.searchTerm6.val();
       var term = jQuery('[id^=myterm-]').eq(-6).val();



   }
 if(this.searchTerm7.val()){
      var customSearchBox =  $this.searchTerm7.val();
       var term = jQuery('[id^=myterm-]').eq(-7).val();



   }
 if(this.searchTerm8.val()){
      var customSearchBox =  $this.searchTerm8.val();
       var term = jQuery('[id^=myterm-]').eq(-8).val();



   }  
  if(this.searchTerm9.val()){
      var customSearchBox =  $this.searchTerm9.val();
       var term = jQuery('[id^=myterm-]').eq(-9).val();



   }
 if(this.searchTerm10.val()){
      var customSearchBox =  $this.searchTerm10.val();
       var term = jQuery('[id^=myterm-]').eq(-10).val();



   }
 if(this.searchTerm11.val()){
      var customSearchBox =  $this.searchTerm11.val();
       var term = jQuery('[id^=myterm-]').eq(-11).val();



   }
 if(this.searchTerm12.val()){
      var customSearchBox =  $this.searchTerm12.val();
       var term = jQuery('[id^=myterm-]').eq(-12).val();



   } 

    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/terms/'+term+'/'+customSearchBox,function(livesearchproducts_1){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/term_empty/'+term+'/'+ customSearchBox,function(livesearchproducts_empty){





  //   let unique_1 = [...new Map(livesearchproducts_1.map((m) => [m.term_id, m])).values()];




// let unique_2 = [...new Map(unique_1.map((m) => [m.term_id, m])).values()];


//var unique_4 = unique_1.filter(item =>item.term_id != unique_1.map(item=>item.term_id));
//console.log(unique_2);
      jQuery('.terms-'+term).css("display",'none');
      jQuery('.no_terms').css("display",'none');


if(livesearchproducts_1.length != 0){

     var result_1 = livesearchproducts_1.map(item=>`<div onclick="myWooFunctionName('`+item.term_id+`', '`+item.slug+`', '`+term+`')" class='white'>`+
  item.name+
  `</div>`).join("");
  console.log(result_1); 
      document.getElementsByClassName('results-'+term)[0].innerHTML =result_1;

}


 

   

if(livesearchproducts_empty.length != 0){

      
      var result_2 = livesearchproducts_empty.map(item=>`<div onclick="myWooFunctionName('`+item.term_id+`', '`+item.slug+`', '`+term+`')" class='pink'>`+
  item.name+
  `</div>`).join("");
console.log(result_2);
  document.getElementsByClassName('results-'+term)[0].innerHTML =result_2;
}
         
 
return;
});
 });
 }

getResultsSku(){
 
  var $this =this;
   
jQuery('.no_skus').css("display",'none');
jQuery('.sku_results').css("display",'none');
jQuery('.sku_results_empty').css("display",'none');
    
      var customSearchBox =  $this.searchSku.val();
       

    
       var WooPostID =$this.WooPostID.val();


    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/sku/'+customSearchBox,function(products_sku){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/sku_empty/'+ customSearchBox,function(products_sku_empty){


      jQuery('.skus').css("display",'none');


if(products_sku.length != 0){

     var result_1 = products_sku.map(item=>`<div onclick="hideSkuFunction('`+item.meta_value+`')" class='white'>`+
  item.meta_value+
  `</div>`).join("");

      jQuery('.sku_results').css("display",'block');


 
            document.getElementsByClassName('sku_results')[0].innerHTML =result_1;
}



//}


 

   

if (products_sku_empty.length != 0) {
  var result_2 = products_sku_empty.map(item => 
    `<div onclick="hideSkuFunction('${item.meta_key}')" class='pink'>` +
      item.meta_value.replace('skuhide', '') +
    `</div>`
  ).join("");

  jQuery('.sku_results_empty').css("display", 'block');
  document.getElementsByClassName('sku_results_empty')[0].innerHTML = result_2;
}

if(products_sku.length == 0  && products_sku_empty.length == 0){
jQuery('.no_skus').css("display",'block');
                     document.getElementsByClassName('no_skus')[0].innerHTML =liveSearchDataCategories[0].no_search_results;

}  

//$total_sku_products = products_sku.concat(products_sku_empty);
         
//let unique_1 = [...new Map(total_sku_products.map((m) => [m.term_id, m])).values()];

});

 });
 }          
 


 getResultsWooUsers(){
 
  var $this =this;
   
       jQuery('.woo_user').css("display",'none');
        jQuery('.woo_user_empty').css("display",'none');
      jQuery('.woo_users').css("display",'none');
      jQuery('.no_woo_users').css("display",'none');


    
      var customSearchBox =  $this.searchWooUsers.val();
       
//alert(customSearchBox);
    
       var WooPostID =$this.WooPostID.val();


    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/woo_user/'+customSearchBox,function(woo_user){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/woo_user_empty/'+ customSearchBox,function(woo_user_empty){



   let woo_user_unique = [...new Map(woo_user.map((m) => [m.user_login, m])).values()];

   woo_user_unique = woo_user_unique.filter(
     item => !woo_user_empty.some(emptyItem => emptyItem.user_login === item.user_login)
   );




if(woo_user_unique.length != 0){

       jQuery('.woo_user').css("display",'block');

     var result_1 = woo_user_unique.map(item=>`<div onclick="myWooUserFunction('`+item.user_login
+`')" class='white'>`+
  item.user_login
+
  `</div>`).join("");



 
            document.getElementsByClassName('woo_user')[0].innerHTML =result_1;


}



if(woo_user_empty.length != 0){
  jQuery('.woo_user_empty').css("display",'block');
 var result_2 = woo_user_empty.map(item=> `<div onclick="myWooUserFunction('`+item.user_login
+`')" class='pink'>`+
  item.user_login
+
  `</div>`).join("");

             document.getElementsByClassName('woo_user_empty')[0].innerHTML =result_2;
     
     
}

if(woo_user_unique.length == 0  && woo_user_empty.length == 0){
jQuery('.no_woo_users').css("display",'block');
                     document.getElementsByClassName('no_woo_users')[0].innerHTML =liveSearchDataCategories[0].no_search_results;

}  
});

 });

 }     
   

  getResultsType_of_product(){
 
  var $this =this;
   
       jQuery('.type_of_products').css("display",'none');
        jQuery('.type_of_product_empty').css("display",'none');
      jQuery('.type_of_product').css("display",'none');


    
      var customSearchBox =  $this.search_type_of_product.val();
       
//alert(customSearchBox);
    
       var WooPostID =$this.WooPostID.val();


    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/type_of_product/'+customSearchBox,function(type_of_product){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/type_of_product_empty/'+ customSearchBox,function(type_of_product_empty){


console.log(type_of_product);
console.log(type_of_product_empty);

 //  let typeofproduct_unique = [...new Map(typeofproduct.map((m) => [m.slug, m])).values()];




// let unique_2 = [...new Map(unique_1.map((m) => [m.term_id, m])).values()];


//var unique_4 = unique_1.filter(item =>item.term_id != unique_1.map(item=>item.term_id));
//console.log(unique_2);


if(type_of_product.length != 0){
      jQuery('.type_of_product').css("display",'block');

     var result_1 = type_of_product.map(item=>`<div onclick="myWooTypeProdFunction('`+item.slug
+`')" class='white'>`+
  item.slug
+
  `</div>`).join("");
  console.log(result_1);



 
            document.getElementsByClassName('type_of_product')[0].innerHTML =result_1;


}



//}


 

   

if(type_of_product_empty.length != 0){
        jQuery('.type_of_product_empty').css("display",'block');
 var result_2 = type_of_product_empty.map(item=> `<div onclick="myWooTypeProdFunction('`+item.slug
+`')" class='pink'>`+
  item.slug
+
  `</div>`).join("");
console.log(result_2);
             document.getElementsByClassName('type_of_product_empty')[0].innerHTML =result_2;
     
     
}

//$total_sku_products = products_sku.concat(products_sku_empty);
         
//let unique_1 = [...new Map(total_sku_products.map((m) => [m.term_id, m])).values()];

});

 });

 }


   

  getResultsCustom_post_types(){
 
  var $this =this;
   
       jQuery('.custom_post_types').css("display",'none');
        jQuery('.custom_post_type_empty').css("display",'none');
      jQuery('.custom_post_type').css("display",'none');


    
      var customSearchBox =  $this.search_custom_post_types.val();
       
//alert(customSearchBox);
    
       var WooPostID =$this.WooPostID.val();


    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/search_post_types/'+customSearchBox,function(custom_post_type){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/search_empty_post_types/'+ customSearchBox,function(custom_post_type_empty){


console.log(custom_post_type);
console.log(custom_post_type_empty);

   let custom_post_type_unique = [...new Map(custom_post_type.map((m) => [m.post_type, m])).values()];
   let custom_post_type_empty_unique = [...new Map(custom_post_type_empty.map((m) => [m.post_type, m])).values()];




// let unique_2 = [...new Map(unique_1.map((m) => [m.term_id, m])).values()];


//var unique_4 = unique_1.filter(item =>item.term_id != unique_1.map(item=>item.term_id));
//console.log(unique_2);


if(custom_post_type_unique.length != 0){
      jQuery('.custom_post_type').css("display",'block');

     var result_1 = custom_post_type_unique.map(item=>`<div onclick="myPostFunction('`+item.post_type
+`')" class='white'>`+
  item.post_type
+
  `</div>`).join("");
  console.log(result_1);



 
            document.getElementsByClassName('custom_post_type')[0].innerHTML =result_1;


}



//}


 

   

if(custom_post_type_empty_unique.length != 0){
        jQuery('.custom_post_type_empty').css("display",'block');
 var result_2 = custom_post_type_empty_unique.map(item=> `<div onclick="myPostFunction('`+item.post_type
+`')" class='pink'>`+
  item.post_type
+
  `</div>`).join("");
console.log(result_2);
             document.getElementsByClassName('custom_post_type_empty')[0].innerHTML =result_2;
     
     
}

//$total_sku_products = products_sku.concat(products_sku_empty);
         
//let unique_1 = [...new Map(total_sku_products.map((m) => [m.term_id, m])).values()];

});

 });

 }



  getResultsMetaDataof_post_types(){
 
  var $this =this;
   
       jQuery('.meta_data_of_post_types').css("display",'none');
        jQuery('.meta_data_of_post_empty').css("display",'none');
      jQuery('.meta_data_of_post').css("display",'none');


    
      var customSearchBox =  $this.search_meta_data_of_post_types.val();
       
//alert(customSearchBox);
    
       var WooPostID =$this.WooPostID.val();


    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/search_meta_data_of_post_types/'+customSearchBox,function(meta_data_of_post_type){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v11/search_meta_data_empty_of_post_types/'+ customSearchBox,function(meta_data_of_post_type_empty){



   let meta_data_of_post_type_unique = [...new Map(meta_data_of_post_type.map((m) => [m.post_title, m])).values()];
   let meta_data_of_post_type_empty_unique = [...new Map(meta_data_of_post_type_empty.map((m) => [m.post_title, m])).values()];

console.log(meta_data_of_post_type_empty_unique);


// let unique_2 = [...new Map(unique_1.map((m) => [m.term_id, m])).values()];


//var unique_4 = unique_1.filter(item =>item.term_id != unique_1.map(item=>item.term_id));
//console.log(unique_2);


if(meta_data_of_post_type_unique.length != 0){
      jQuery('.meta_data_of_post').css("display",'block');

     var result_1 = meta_data_of_post_type_unique.map(item=>`<div onclick="myMetaFunction('`+item.post_title
+`')" class='white'>`+
  item.post_title
+
  `</div>`).join("");
  console.log(result_1);



 
            document.getElementsByClassName('meta_data_of_post')[0].innerHTML =result_1;


}



//}


 

   

if(meta_data_of_post_type_empty_unique.length != 0){
        jQuery('.meta_data_of_post_empty').css("display",'block');
 var result_2 = meta_data_of_post_type_empty_unique.map(item=> `<div onclick="myMetaFunction('`+item.post_title
+`')" class='pink'>`+
  item.post_title
+
  `</div>`).join("");
console.log(result_2);
             document.getElementsByClassName('meta_data_of_post_empty')[0].innerHTML =result_2;
     
     
}

//$total_sku_products = products_sku.concat(products_sku_empty);
         
//let unique_1 = [...new Map(total_sku_products.map((m) => [m.term_id, m])).values()];

});

 });

 }



  getResultsVisibility_of_product(){
 
  var $this =this;
   
       jQuery('.visibility_of_products').css("display",'none');
        jQuery('.visibility_of_product_empty').css("display",'none');
      jQuery('.visibility_of_product').css("display",'none');
      jQuery('.no_visibility_of_products').css("display",'none');


    
      var customSearchBox =  $this.search_visibility_of_product.val();
       
//alert(customSearchBox);
    
       var WooPostID =$this.WooPostID.val();


    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/visibility_of_product/'+customSearchBox,function(visibility_of_product){
   jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacewoo/v10/visibility_of_product_empty/'+ customSearchBox,function(visibility_of_product_empty){

// remove duplicates (same slug) from visibility_of_product
visibility_of_product = visibility_of_product.filter(item1 =>
    !visibility_of_product_empty.some(item2 => item2.slug === item1.slug)
);

if(visibility_of_product.length != 0){
      jQuery('.visibility_of_product').css("display",'block');

     var result_1 = visibility_of_product.map(item=>`<div onclick="myWooRatingsFunction('`+item.slug
+`')" class='white'>`+
  item.slug
+
  `</div>`).join("");



 
            document.getElementsByClassName('visibility_of_product')[0].innerHTML =result_1;


}



//}


 

   

if(visibility_of_product_empty.length != 0){
        jQuery('.visibility_of_product_empty').css("display",'block');
 var result_2 = visibility_of_product_empty.map(item=> `<div onclick="myWooRatingsFunction('`+item.slug
+`')" class='pink'>`+
  item.slug
+
  `</div>`).join("");
             document.getElementsByClassName('visibility_of_product_empty')[0].innerHTML =result_2;
     
     
}


if(visibility_of_product.length == 0  && visibility_of_product_empty.length == 0){
jQuery('.no_visibility_of_products').css("display",'block');
                     document.getElementsByClassName('no_visibility_of_products')[0].innerHTML =liveSearchDataCategories[0].no_search_results;

}  
});

 });

 }                    
   //alert(jQuery(this).val());
getResultsTermS(){  
   
     jQuery(".data-terms-products-"+jQuery('[id^=term-]').eq(-1).val()).html("");
     jQuery(".data-terms-products-2-"+jQuery('[id^=term-]').eq(-1).val()).html("");
    var customSearchBoxS = jQuery("input[name='additionaltitlename']").eq(-1).val();

    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v1/terms_2/'+ customSearchBoxS,function(livesearchproducts_1){
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v1/term_empty_2/'+ customSearchBoxS,function(livesearchproducts_2){

console.log(livesearchproducts_1);

console.log(livesearchproducts_2);

 let unique_1 = [...new Map(livesearchproducts_1.map((m) => [m.term_id, m])).values()];
  
 let unique_2 = [...new Map(livesearchproducts_2.map((m) => [m.term_id, m])).values()];
//var unique_3 = unique_2.filter(val => !unique_1.includes(val));



//var unique_3 = unique_1.filter(item =>item.term_id != unique_2.map(item=>item.term_id));

var unique_4 = unique_2.filter(item =>item.term_id != unique_1.map(item=>item.term_id));


if(unique_1.length != 0){

     var result_1 = unique_1.map(item=>`<div class='pink' onclick=`+myWooFunction(item.term_id)+`>`+
  item.name+
  `</div>`).join(""); 
       document.getElementsByClassName('data-terms-products-'+jQuery('[id^=term-]').eq(-1).val())[0].innerHTML =result_1;


console.log(result_1);

}
 

   

if(unique_4.length != 0){

      
      var result_2 = unique_4.map(item=>`<div class='white' onclick=`+myWooFunction(item.term_id)+`>`+
  item.name+
  `</div>`).join("");

  document.getElementsByClassName('data-terms-products-2-'+jQuery('[id^=term-]').eq(-1).val())[0].innerHTML =result_2;

         
console.log(result_2);

}





/*  
var result_3 = unique_2.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed');
}));

 result_3 += unique_1.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed 2');
}));
*/




}).done(function() {   console.log('getJSON request succeeded!');

}) 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });
  


}).done(function() {   console.log('getJSON request succeeded!');

}) 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");
           /* jQuery(".terms-container").html($this.template_no_posts);
   setTimeout(function() {
    window.location.reload();

  }, 3000);*/

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); })







/*  
var result_3 = unique_2.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed');
}));

 result_3 += unique_1.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed 2');
}));
*/






 }     
                 
   //alert(jQuery(this).val());
getResultsTerm2(){  
   alert("work");
     jQuery(".data-terms-products-"+jQuery('[id^=term-]').eq(-2).val()).html("");
     jQuery(".data-terms-products-2-"+jQuery('[id^=term-]').eq(-2).val()).html("");
    var customSearchBox2 = jQuery("input[name='additionaltitlename']").eq(-2).val();

    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v1/terms_3/'+ customSearchBox2,function(livesearchproducts_1){
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespace/v1/term_empty_3/'+ customSearchBox2,function(livesearchproducts_2){

console.log(livesearchproducts_1);

console.log(livesearchproducts_2);

 let unique_1 = [...new Map(livesearchproducts_1.map((m) => [m.term_id, m])).values()];
  
 let unique_2 = [...new Map(livesearchproducts_2.map((m) => [m.term_id, m])).values()];
//var unique_3 = unique_2.filter(val => !unique_1.includes(val));



//var unique_3 = unique_1.filter(item =>item.term_id != unique_2.map(item=>item.term_id));

var unique_4 = unique_2.filter(item =>item.term_id != unique_1.map(item=>item.term_id));


if(unique_1.length != 0){

     var result_1 = unique_1.map(item=>`<div class='pink' onclick=`+myWooFunction(item.term_id)+`>`+
  item.name+
  `</div>`).join(""); 
       document.getElementsByClassName('data-terms-products-'+jQuery('[id^=term-]').eq(-2).val())[0].innerHTML =result_1;


console.log(result_1);

}
 

   

if(unique_4.length != 0){

      
      var result_2 = unique_4.map(item=>`<div class='white' onclick=`+myWooFunction(item.term_id)+`>`+
  item.name+
  `</div>`).join("");

  document.getElementsByClassName('data-terms-products-2-'+jQuery('[id^=term-]').eq(-2).val())[0].innerHTML =result_2;

         
console.log(result_2);

}





/*  
var result_3 = unique_2.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed');
}));

 result_3 += unique_1.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed 2');
}));
*/




}).done(function() {   console.log('getJSON request succeeded!');

}) 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });
  


}).done(function() {   console.log('getJSON request succeeded!');

}) 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");
           /* jQuery(".terms-container").html($this.template_no_posts);
   setTimeout(function() {
    window.location.reload();

  }, 3000);*/

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); })







/*  
var result_3 = unique_2.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed');
}));

 result_3 += unique_1.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed 2');
}));
*/






 }     

    
      // While typing in customSearchBox typingLogic function is triggered 
     typingLogic(){

       var $this =this;
       
      var customSearchBox =  this.searchField.val();
      if(
       this.previousValue){
        
           clearTimeout(this.typingTimer);
           
           if(!$this.isSpinnerVisible){
                 $this.resultsDiv.html('<div class="loader"></div>')
                $this.isSpinnerVisible = true;
           }


           this.typingTimer = setTimeout(this.getResults.bind(this),1000);


      
      }
      
        this.previousValue = customSearchBox;
       
       var KeyID = event.keyCode;

this.template_no_terms =`
              Sorry, but there is no term for that query.
              Please try another query.                                           
              `;
       
        
      switch(KeyID)
         {
            case 8:
      jQuery(".terms-container").html(this.template_no_terms);
   setTimeout(function() {
    window.location.reload();

  }, 3000);            

            break; 
            case 46:
      jQuery(".terms-container").html(this.template_no_terms);
   setTimeout(function() {
    window.location.reload();

  }, 3000);
              break;
            default:
            break;
         }       
            


     $this.getResults(); 


     } 

 getResults(){

     jQuery(".data-taxonomies-products").html("");
     jQuery(".data-taxonomies-products-2").html("");
 console.log(this.myID.val());
  console.log(this.postID.val());

      var $this =this;
        this.resultsDiv.html('<div class="loader"></div>')
       var Category=""
       var Tag ="";
       var thisValue ="";
       var selected_tag="";
     
   
    
             var customSearchBox =  this.searchField.val();

   
      
            
 this.template_no_posts =`
              Sorry, but there is no term for that query.
              Please try another query.                                           
              `;

 



  if(customSearchBox){

    var $this = this;
  




    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacecatwoo/v1/search/'+customSearchBox,function(livesearchproducts_1){
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacecatwoo/v1/search_empty/'+customSearchBox,function(livesearchproducts_2){
console.log(livesearchproducts_1);

console.log(livesearchproducts_2);

 let unique_1 = [...new Map(livesearchproducts_1.map((m) => [m.term_id, m])).values()];
  
 let unique_2 = [...new Map(livesearchproducts_2.map((m) => [m.term_id, m])).values()];
//var unique_3 = unique_2.filter(val => !unique_1.includes(val));



//var unique_3 = unique_1.filter(item =>item.term_id != unique_2.map(item=>item.term_id));


var unique_4 = unique_2.filter(item =>item.term_id != unique_1.map(item=>item.term_id));



if(unique_1.length != 0){

     var result_1 = unique_1.map(item=>`<div class='pink' onclick=`+myWooFunction(item.term_id)+`>`+
  item.name+
  `</div>`).join(""); 

      document.getElementsByClassName('data-taxonomies-products')[0].innerHTML =result_1;
}
 

   



      
      var result_2 = unique_4.map(item=>`<div class='white' onclick=`+myWooFunction(item.term_id)+`>`+
  item.name+
  `</div>`).join("");

   document.getElementsByClassName('data-taxonomies-products-2')[0].innerHTML =result_2;



//console.log(result_1);
//console.log(result_2);




/*  
var result_3 = unique_2.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed');
}));

 result_3 += unique_1.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed 2');
}));
*/




}).done(function() {   console.log('getJSON request succeeded!');

}) 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });
  


}).done(function() {   console.log('getJSON request succeeded!');

}) 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");
           /* jQuery(".terms-container").html($this.template_no_posts);
   setTimeout(function() {
    window.location.reload();

  }, 3000);*/

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });



                
 }      
       }

 getResults(){

     jQuery(".data-taxonomies-products").html("");
     jQuery(".data-taxonomies-products-2").html("");
  alert("gre");
 console.log(this.myID.val());
  console.log(this.postID.val());

      var $this =this;
        this.resultsDiv.html('<div class="loader"></div>')
       var Category=""
       var Tag ="";
       var thisValue ="";
       var selected_tag="";
     
   
    
             var customSearchBox =  this.searchField.val();

   
      
            
 this.template_no_posts =`
              Sorry, but there is no term for that query.
              Please try another query.                                           
              `;

 



  if(customSearchBox){

    var $this = this;
  




    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacecatwoo/v1/search/'+customSearchBox,function(livesearchproducts_1){
    jQuery.getJSON(liveSearchDataCategories[1].root_url+'namespacecatwoo/v1/search_empty/'+customSearchBox,function(livesearchproducts_2){
console.log(livesearchproducts_1);

console.log(livesearchproducts_2);

 let unique_1 = [...new Map(livesearchproducts_1.map((m) => [m.term_id, m])).values()];
  
 let unique_2 = [...new Map(livesearchproducts_2.map((m) => [m.term_id, m])).values()];
//var unique_3 = unique_2.filter(val => !unique_1.includes(val));



//var unique_3 = unique_1.filter(item =>item.term_id != unique_2.map(item=>item.term_id));


var unique_4 = unique_2.filter(item =>item.term_id != unique_1.map(item=>item.term_id));



if(unique_1.length != 0){

     var result_1 = unique_1.map(item=>`<div class='pink' onclick=`+myWooFunction(item.term_id)+`>`+
  item.name+
  `</div>`).join(""); 

      document.getElementsByClassName('data-taxonomies-products')[0].innerHTML =result_1;
}
 

   



      
      var result_2 = unique_4.map(item=>`<div class='white' onclick=`+myWooFunction(item.term_id)+`>`+
  item.name+
  `</div>`).join("");

   document.getElementsByClassName('data-taxonomies-products-2')[0].innerHTML =result_2;



//console.log(result_1);
//console.log(result_2);




/*  
var result_3 = unique_2.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed');
}));

 result_3 += unique_1.map(item=> document.getElementsByClassName('data-taxonomies-products')[0].addEventListener('click', function() {
      myWooFunction(item.term_id);
            console.log('pressed 2');
}));
*/




}).done(function() {   console.log('getJSON request succeeded!');

}) 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });
  


}).done(function() {   console.log('getJSON request succeeded!');

}) 
.fail(function(jqXHR, textStatus, errorThrown) { 
 //jQuery(".paginationjs-pages").css("display","none");
           /* jQuery(".terms-container").html($this.template_no_posts);
   setTimeout(function() {
    window.location.reload();

  }, 3000);*/

  console.log('getJSON request failed! ' + textStatus); })
.always(function() { console.log('getJSON request ended!'); });



                
 }      
                 

}
}

var liveSearchCategories = new Live_Search_Categories();

  jQuery(".pink").on('click', function () {
    var gValue = jQuery(this).attr('class');
    if (gValue == 'pink') {
      alert("remove pink");
        jQuery(this).removeClass("pink");
        jQuery(this).addClass("white");
    }
    window.location.reload();
 
});
  jQuery(".white").on('click', function () {
    var gValue = jQuery(this).attr('class');
    if (gValue == 'white') {
      alert("remove white");
        jQuery(this).removeClass("white");
        jQuery(this).addClass("pink");
    }
            window.location.reload();

});
