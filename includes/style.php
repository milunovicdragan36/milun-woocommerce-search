 <?php
 if ( ! defined( 'ABSPATH' ) ) exit;
 ?>
 <style type="text/css">
   .my_wrapper,
   .child_before_loop{

background-color: white;

border-left-width: 3px !important;

    
    border-width: 3px;
border-color:<?php echo esc_attr($color); ?>!important;
border-style: solid;
}
.dashicons-search{
    cursor: pointer;
}
#open-search-flyout-before-loop_full_width,        
#open-search-flyout-before-title_full_width,
#open-search-flyout-after-title_full_width,
#open-before-loop_full_width,
#open-widget_full_width
{
      color:<?php echo esc_attr($color); ?>!important;
      font-size: 27px;

}

    .search_before-loop,
    .search_before_title_full_width,
    .search_after_title_full_width{
  background-color:<?php echo esc_attr($color); ?>;
}

     
               .wrapper-data-container-before_title_full_width-data-posts,
               .wrapper-data-container-after_title_full_width-data-posts{
    border-color: <?php echo esc_attr($color); ?>!important;

     border-top-style: solid !important;
border-top-width: 3px !important;
border-top-color:<?php echo esc_attr($color); ?>;

    width:100% !important;


}
.data-shortcode_full_width-posts-btn,
.data-widget_full_width-posts-btn,
 .data-before-loop-posts-btn,
       .data-before_title_full_width-posts-btn,
                .data-after_title_full_width-posts-btn{
                    background-color:<?php echo esc_attr($color); ?> !important;
                    color:white;
                        border-radius: 8px;
                            text-align: center;


                }
                .search-term-widget_full_width,
              .search-term-before-loop,
             .search-term-shortcode_full_width,   
             .search-term-before_title_full_width,
             .search-term-after_title_full_width{
                
                border-color: <?php echo esc_attr($color); ?>!important;
             }
            
               .line_below_cat_tag,
                .line_below_post{
                    border: 1px dotted <?php echo esc_attr($color); ?>!important;


                }
                .background_color_of_load_more_button_widget_full_width,
                       .background_color_of_load_more_button_before_title_full_width,
            .background_color_of_load_more_button_after_title_full_width,     
           .background_color_of_load_more_button_before_loop,
            .background_color_of_load_more_button_shortcode_full_width{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color); ?>;
    border-radius: 10px;
    color:white;

            }          
.close-search-flyout-shortcode_full_width,               
.closeFilePanel,
#open-shortcode_full_width,
.closeFilePanel_full_width{
    color:<?php echo esc_attr($color); ?>!important;
    font-size: 27px;

}            

          
               </style> 
 
                 
                <style type="text/css">
                   #open-search-flyout,
    #open-search-flyout::before {
        color: <?php echo esc_attr( $color_for_load_more_text ); ?> !important;
    }
    
   .my_wrapper,
   .child_menu{
    background-color: white;
border-right-width: 3px !important;
border-left-width: 3px !important;

    border-color: <?php echo esc_attr($color); ?>!important;

border-left-width: 3px !important;

    
    border-width: 3px;
border-style: solid;
  background-color: white;

}
.my_wrapper { visibility:hidden; }
                .search_popup,
                .search_menu{
  background-color:<?php echo esc_attr($color); ?>;
}

   .search-term-popup,
   .search-term-menu{
     
border-bottom-color:<?php echo esc_attr($color); ?>;



}             
               .wrapper-data-container-popup-data-posts,
               .wrapper-data-container-menu-data-posts{
   
    width:100% !important;
}
                .data-menu-posts-btn, 
                .data-menu-posts-btn{
                    background-color:<?php echo esc_attr($color); ?> !important;
                    color:black;

                }
             .search-term-popup,   
             .search-term-menu{
                border-color: <?php echo esc_attr($color); ?>!important;
             }
             .line_below_cat_tag,
                .line_below_post{
                    border-color:<?php echo esc_attr($color); ?>!important;

                }
             .red_color_no_more_posts_popup,   
            .background_color_of_load_more_button_popup,    
            .background_color_of_load_more_button_menu{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color); ?>;
color:white;
border-radius: 10px;
            }



            /*added*/
#search-flyout{
  position: fixed;
  z-index: 2147483647;

  width: min(92vw, 1200px);
  max-height: 70vh;

  background: #fff;
  border-radius: 12px;
  box-shadow: 0 18px 55px rgba(0,0,0,0.28);
  overflow: hidden;

  display: none;

  /* START: collapsed and shifted to the right */
  transform: translateX(60px) scaleX(0.05);
  transform-origin: 100% 50%;
  opacity: 0;

  transition:
    transform 220ms cubic-bezier(.22,.61,.36,1),
    opacity   160ms ease;
}

#search-flyout.active{
  display: block;

  /* END: fully expanded */
  transform: translateX(0) scaleX(1);
  opacity: 1;
}

.search-flyout-inner{
  padding: 18px 22px;
  max-height: 70vh;
  overflow-y: auto;
}

#open-search-flyout{
  cursor: pointer;
}

#search-flyout {
    position: fixed;          /* or absolute if you prefer */
    top: 0;
    right: 0;
    width: 90vw;
    height: 100vh;
    background: #fff;
    z-index: 99999;            /* higher than menu/body */
}

/* Close icon – TOP RIGHT */
#close-search-flyout {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 28px;
    cursor: pointer;
    z-index: 100000;
}

/* Optional: hover feedback */
#close-search-flyout:hover {
    opacity: 0.7;
}

#close-search-flyout{
  z-index: 1000000;
  pointer-events: auto;
}


        </style>
         <style type="text/css">
#open-search-flyout-before-loop_full_width{
      color:<?php echo esc_attr($color); ?>!important;

}


     
               .wrapper-data-container-before_loop_full_width-data-posts{
    border-color: <?php echo esc_attr($color); ?>!important;

     border-top-style: solid !important;
border-top-width: 3px !important;
border-top-color:<?php echo esc_attr($color); ?>;

    width:100% !important;


}

               
                
            
                    
               
            .background_color_of_load_more_button_before_title_full_width{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color); ?>;
    border-radius: 10px;

            }

          
               </style>
 <style type="text/css">

            
        

               
   #open-search-flyout-before-loop_full_width{
      color:<?php echo esc_attr($color); ?>!important;

}

    

     
               .wrapper-data-container-before_loop_full_width-data-posts{
    border-color: <?php echo esc_attr($color); ?>!important;

     border-top-style: solid !important;
border-top-width: 3px !important;
border-top-color:<?php echo esc_attr($color); ?>;

    width:100% !important;


}

                .data-before_loop_full_width-posts-btn{
                    background-color:<?php echo esc_attr($color); ?> !important;
                    color:white;
                        border-radius: 8px;
                            text-align: center;


                }
                
             .search-term-before_loop_full_width{
                
                border-color: <?php echo esc_attr($color); ?>!important;
             }
            
               .line_below_cat_tag,
                .line_below_post{
                    border: 1px dotted <?php echo esc_attr($color); ?>!important;


                }
                    
               
            .background_color_of_load_more_button_before_title_full_width{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color); ?>;
    border-radius: 10px;

            }
.closeFilePanel_full_width{
    color:<?php echo esc_attr($color); ?>!important;
}    
            
    </style>