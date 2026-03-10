   
 <style type="text/css">
    /*
       .my_wrapper,
       .child{

            background-color: white;



    
    
border-color:<?php echo esc_attr($color_for_load_more_text); ?>!important;
border-style: solid;
}


                .search_shortcode{
  background-color:<?php echo esc_attr($color_for_load_more_text); ?>;
  border-style: solid !important;
border-width: 1px !important;
border-color:<?php echo esc_attr($color_for_load_more_text); ?>;
padding: 3px;
}
          
.wrapper-data-container-shortcode-data-posts{
    width:100% !important;
    border-color: <?php echo esc_attr($color_for_load_more_text); ?>!important;


}

                .data-shortcode-posts-btn{
                    background-color:<?php echo esc_attr($color_for_load_more_text); ?> !important;
                    color:white;

                }
                
             .search-shortcode-widget{
                
                border-color: <?php echo esc_attr($color_for_load_more_text); ?>!important;
             }
              
               .line_below_cat_tag,
                .line_below_post{
                    border-color:<?php echo esc_attr($color_for_load_more_text); ?>!important;

                }
            .background_color_of_load_more_button_shortcode{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color_for_load_more_text); ?>;

            }

*/
               </style>
                 <style type="text/css">

   .my_wrapper,
   .child_widget{

background-color: white;

border-left-width: 3px !important;

    
    border-width: 3px;
border-color:<?php echo esc_attr($color); ?>!important;
border-style: solid;
}
                
               .search_widget{
  background-color:<?php echo esc_attr($color); ?>;
}

     
               .wrapper-data-container-widget-data-posts{
    border-color: <?php echo esc_attr($color); ?>!important;

     border-top-style: solid !important;
border-top-width: 3px !important;
border-top-color:<?php echo esc_attr($color); ?>;

    width:100% !important;


}

                .data-widget-posts-btn{
                    background-color:<?php echo esc_attr($color); ?> !important;
                    color:white;
                        border-radius: 8px;
                            text-align: center;


                }
                
             .search-term-widget{
                
                border-color: <?php echo esc_attr($color); ?>!important;
             }
            
               .line_below_cat_tag,
                .line_below_post{
                    border-color:<?php echo esc_attr($color); ?>!important;

                }
            .background_color_of_load_more_button_widget{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color_for_load_more_text); ?>;

            }
.closeFilePanel{
    color:<?php echo esc_attr($color); ?>!important;

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

    border-color: <?php echo esc_attr($color_for_load_more_text); ?>!important;

border-left-width: 3px !important;

    
    border-width: 3px;
border-style: solid;
  background-color: white;

}
.my_wrapper { visibility:hidden; }

                .search_menu{
  background-color:<?php echo esc_attr($color_for_load_more_text); ?>;
}
 
   .search-term-menu{
     
border-bottom-color:<?php echo esc_attr($color_for_load_more_text); ?>;



}              
               .wrapper-data-container-menu-data-posts{
    border-color: <?php echo esc_attr($color_for_load_more_text); ?>!important;
 border-top-style: solid !important;
border-top-width: 3px !important;
border-top-color:<?php echo esc_attr($color_for_load_more_text); ?>;
    width:100% !important;
}

                .data-menu-posts-btn{
                    background-color:<?php echo esc_attr($color_for_load_more_text); ?> !important;
                    color:black;

                }
             .search-term-menu{
                border-color: <?php echo esc_attr($color_for_load_more_text); ?>!important;
             }
             .line_below_cat_tag,
                .line_below_post{
                    border-color:<?php echo esc_attr($color_for_load_more_text); ?>!important;

                }
            .background_color_of_load_more_button_menu{
                                cursor: pointer;
  background-color:<?php echo esc_attr($color_for_load_more_text); ?>;

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