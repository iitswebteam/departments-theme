<?php
/**
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "utsc_department_adaptivetheme_subtheme" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "utsc_department_adaptivetheme_subtheme".
 * 2. Uncomment the required function to use.
 * 3. Read carefully, especially within utsc_department_adaptivetheme_subtheme_preprocess_html(), there
 *    are extra goodies you might want to leverage such as a very simple way of adding
 *    stylesheets for Internet Explorer and a browser detection script to add body classes.
 */

/**
 * Override or insert variables into the html templates.
 */

//Removes the 'All Day' label for job postings for default time
function departments_date_all_day_label() {
  return '';
}

function departments_preprocess_html(&$vars) {
  global $theme_key;
  
  // Load the media queries styles
  // Remember to rename these files to match the names used here - they are
  // in the CSS directory of your subtheme.
  /* $media_queries_css = array(
   'departments.responsive.style.css',
    'departments.responsive.gpanels.css'
  );
  load_subtheme_media_queries($media_queries_css, $theme_key);*/


/**
 * Your form builder.
 */
function departments_form($form_state) {
  $form = array();
  // [...snip...] add many fields to your form
  // Creating the date/time element starts here
  // Provide a default date in the format YYYY-MM-DD HH:MM:SS.
  $date = '2008-12-31 00:00:00';
  // For example to record the request time (a timestamp).
  // $date = format_date(REQUEST_TIME, 'custom', 'Y-m-d H:i:s');
  // Provide a format using regular PHP format parts (see documentation on php.net).
  // If you're using a date_select, the format will control the order of the date parts in the selector,
  // rearrange them any way you like. Parts left out of the format will not be displayed to the user.
  $format = 'Y-m-d H:i';
  $form['date2'] = array(
     '#type' => 'date_select', // types 'date_text' and 'date_timezone' are also supported. See .inc file.
     '#title' => t('select a date'),
     '#default_value' => $date,
     '#date_format' => $format,
     '#date_label_position' => 'within', // See other available attributes and what they do in date_api_elements.inc
     '#date_timezone' => 'America/Chicago', // Optional, if your date has a timezone other than the site timezone.
     '#date_increment' => 15, // Optional, used by the date_select and date_popup elements to increment minutes and seconds.
     '#date_year_range' => '-3:+3', // Optional, used to set the year range (back 3 years and forward 3 years is the default).
  );
  // [...snip...] more fields, including the 'submit' button.
  return $form;
}




 /**
  * Load IE Stylesheets
  *
  * AT automates adding IE stylesheets, simply add to the array using
  * the conditional comment as the key and the stylesheet name as the value.
  *
  * See our online help: http://adaptivethemes.com/documentation/working-with-internet-explorer
  *
  * For example to add a stylesheet for IE8 only use:
  *
  *  'IE 8' => 'ie-8.css',
  *
  * Your IE CSS file must be in the /css/ directory in your subtheme.
  */
  /* -- Delete this line to add a conditional stylesheet for IE 7 or less.
  $ie_files = array(
    'lte IE 7' => 'ie-lte-7.css',
  );
  load_subtheme_ie_styles($ie_files, $theme_key);
  // */
  
  // Add class for the active theme name
  /* -- Delete this line to add a class for the active theme name.
  $vars['classes_array'][] = drupal_html_class($theme_key);
  // */

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  /* -- Delete this line to add a classes for the browser and platform.
  $vars['classes_array'][] = css_browser_selector();
  // */

}



/* -- Delete this line if you want to use this function
function utsc_department_adaptivetheme_subtheme_process_html(&$vars) {
}
// */

/**
 * Override or insert variables into the page templates.
 */
/* -- Delete this line if you want to use these functions
function utsc_department_adaptivetheme_subtheme_preprocess_page(&$vars) {
}

function utsc_department_adaptivetheme_subtheme_process_page(&$vars) {
}
// */

/**
 * Override or insert variables into the node templates.
 */
function departments_preprocess_node(&$vars) {
  if($vars['view_mode'] == 'teaser') {
    // check for generic teaser template, then node-specific, then node-id–specific templates
    $vars['theme_hook_suggestions'][] = 'node__teaser';
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__teaser';
    $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->nid . '__teaser';
  }



}
// WP BLOG COMMENTS - Joseph Stewart March 18th 2016 //
function departments_facts_preprocess_comment(&$vars) {
  
  if ($vars['submitted']) {
    //Customize "Submitted By: " text
    $vars['submitted'] = t('<strong>'.$vars['author'].'</strong> <br />!datetime', array( '!datetime' => format_date($vars['comment']->created, 'custom', 'F j, Y')));

  }


}

function departments_facts_form_comment_node_wp_blog_form_alter(&$form, &$form_state){
  //dpm($form);
  //Change Submit button name
  $form['actions']['submit']['#value'] = 'Submit Comment';
  //Remove Preview Button
  $form['actions']['preview']= NULL;
}
// WP BLOG COMMENTS - END //






// */

/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function utsc_department_adaptivetheme_subtheme_preprocess_comment(&$vars) {
}

function utsc_department_adaptivetheme_subtheme_process_comment(&$vars) {
}
// */

/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function utsc_department_adaptivetheme_subtheme_preprocess_block(&$vars) {
}

function utsc_department_adaptivetheme_subtheme_process_block(&$vars) {
}
// */

/**
 * Add the Style Schemes if enabled.
 * NOTE: You MUST make changes in your subthemes theme-settings.php file
 * also to enable Style Schemes.
 */
/* -- Delete this line if you want to enable style schemes.
// DONT TOUCH THIS STUFF...
function get_at_styles() {
  $scheme = theme_get_setting('style_schemes');
  if (!$scheme) {
    $scheme = 'style-default.css';
  }
  if (isset($_COOKIE["atstyles"])) {
    $scheme = $_COOKIE["atstyles"];
  }
  return $scheme;
}
if (theme_get_setting('style_enable_schemes') == 'on') {
  $style = get_at_styles();
  if ($style != 'none') {
    drupal_add_css(path_to_theme() . '/css/schemes/' . $style, array(
      'group' => CSS_THEME,
      'preprocess' => TRUE,
      )
    );
  }
}
// */

/**
 * Returns HTML for a breadcrumb trail.
 */

function departments_breadcrumb($vars) {
  $breadcrumb = $vars['breadcrumb'];
  $show_breadcrumb = theme_get_setting('breadcrumb_display');
  $current_title='';
  if ($show_breadcrumb == 'yes') {
    $show_breadcrumb_home = theme_get_setting('breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }
    if (!empty($breadcrumb)) {
      $heading = '<h2 class="element-invisible">' . t('You are here') . '</h2>
';
      $separator = ' '.filter_xss(theme_get_setting('breadcrumb_separator')).' ';
      $current_title = drupal_get_title();
      
      
      $output = '';
      foreach ($breadcrumb as $key => $val) {
        if ($key == 0) {
          //add "Home" to the front of the breadcrumb
          $output .= '
<li>' . $val . '</li>
';
          //if there's only 1 item in the breadcrumb array, attach the current page title to the end
          
          /*if(count($breadcrumb)==1&&!empty($current_title)){
            $output .= '
<li class="current">
<span>' . $separator . '</span>
' . $current_title . '
</li>
';
          }*/
        
        }
        /*elseif ($key==count($breadcrumb)-1){        
            
            $output .= '
<li class="current">
<span>' . $separator . '</span>
' . $current_title . '
</li>
';
        
        }*/
        else {          
            $output .= '
<li>
<span>' . $separator . '</span>
' . $val . '
</li>
';
        
        }
      }
      
      return $heading . '
<ol id="crumbs">
' . $output .'
<li class="current">
  <span>' . $separator . '</span>
  ' . $current_title . '
</li>
'.'
</ol>
';
    }
  }
  return '';
}




function departments_html_head_alter( &$head_elements ) {
  // Remove <meta name="Generator"> and X-Generator header
  // see http://drupal.org/node/982034
  $keys_to_unset = array( 'system_meta_generator' );

  // Remove <link rel="shortlink">
  foreach( $head_elements as $key => $element ) {
    if( isset( $element[ '#attributes' ][ 'rel' ] ) && $element[ '#attributes' ][ 'rel' ] == 'shortlink' ) {
      $keys_to_unset[] = $key;
    }
  }

  foreach( $keys_to_unset as $key ) {
    unset( $head_elements[ $key ] );
  }
}


//injects alt tags for image fields
function departments_preprocess_field(&$variables, $hook) {
  //dpm($variables);
  /*
  sets up alt tags for all images on 'person' content type with the name of person or 'image placeholder'
  if the image is generic
  **/
  if ($variables['element']['#bundle'] == 'person') {
    if (($variables['items'][0]['#item']['alt']) == '') {
      if (($variables['items'][0]['#item']['filename']) == 'person-placeholder.png') {
        $variables['items'][0]['#item']['alt'] = 'Image placeholder for '.$variables['element']['#object']->title;
      } else {
      $variables['items'][0]['#item']['alt'] = $variables['element']['#object']->title;
      }
    }
  }
  /*
  sets up alt tags for all images on 'page' content type 
  
  if ($variables['element']['#bundle'] == 'page') {
    if (($variables['items'][0]['#item']['alt']) == '') {
      if (($variables['element']['#field_name']) == 'field_portrait_image') {
        $variables['items'][0]['#item']['alt'] = 'Portrait image for '.$variables['element']['#object']->title.' page';
      } else
      if (($variables['element']['#field_name']) == 'field_summary_image') {
        $variables['items'][0]['#item']['alt'] = 'Summary image for '.$variables['element']['#object']->title.' page';
      }
    }
  }

  if ($variables['element']['#bundle'] == 'photo_gallery') {
    $howmany = count($variables['items']);
    for ($i = 0; $i < $howmany; $i++ ) {
    if (($variables['items'][0]['#items'][i]['alt']) == '') {
      $k = $variables['items'][0]['#items'][i]['alt'] = 'photo-'.($i+1);
      $variables['items'][0]['#items'][i]['caption'] = $variables['items'][0]['#items'][i]['alt'];
    }
    }
  }  **/
}
