/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 * This file is used/requested by the 'Styles' button.
 * The 'Styles' button is not enabled by default in DrupalFull and DrupalFiltered toolbars.
 */
if(typeof(CKEDITOR) !== 'undefined') {
    CKEDITOR.addStylesSet( 'drupal',
    [
            /* Block Styles */

            // These styles are already available in the "Format" drop-down list, so they are
            // not needed here by default. You may enable them to avoid placing the
            // "Format" drop-down list in the toolbar, maintaining the same features.
            { name : 'Normal Paragraph'     , element : 'p' },
            { name : 'Heading 2'        , element : 'h2' },
            { name : 'Heading 3'        , element : 'h3' },
            { name : 'Heading 4'        , element : 'h4' },

            { name : 'Image Left'     , element : 'img', attributes : { 'class' : 'img_left' }},
            { name : 'Image Right'     , element : 'img', attributes : { 'class' : 'img_right' }},
            { name : 'Image No-wrap Left Original Size'     , element : 'img', attributes : { 'class' : 'img_normal' }},
            { name : 'Image Centre Original Size'     , element : 'img', attributes : { 'class' : 'img_center' }},
            { name : 'Image Left Original Size'     , element : 'img', attributes : { 'class' : 'img_left_free' }},
            { name : 'Image Right Original Size'     , element : 'img', attributes : { 'class' : 'img_right_free' }},
            { name : 'Abbr UTSC'        , element : 'abbr', attributes : { 'title' : 'University of Toronto Scarborough' }},
            { name : 'Image No-Border Left Original Size'     , element : 'img', attributes : { 'class' : 'img_left_free no_border' }},
            { name : 'Inline Quotation' , element : 'q' },
            { name : 'Cited Source'       , element : 'cite' },
            { name : 'Address'                  , element : 'address' },

             /*Responsive table styles*/


            { name : 'Responsive Table 3' , element : 'table', attributes: {'class' : 'responsive3'}},
            { name : 'Responsive Table 2' , element : 'table', attributes: {'class' : 'responsive2'}},
            { name : 'Responsive Table 1' , element : 'table', attributes: {'class' : 'responsive'}}

    ]);
}