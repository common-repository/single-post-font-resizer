<?php
/*
Plugin Name: Single Post Font Resizer
Plugin URI: http://wordpress.org/plugins/single-post-font-resizer/
Author: Rubel Miah
Author URI: http://abscreation.com
Version: 1.1
*/

global $oplinks;
$oplinks='<div style="clear:both;float:right;"><h3 style="text-align: right;"><span style="font-size: large;"><span style="color: #ff9900;">
<span style="color: #ff6600;">

<a id="plustext" onclick="resizeText(1)" href="javascript:void(0);">

<style type="text/css">#boro{background: #00A3FF;
font-weight: bold;
font-size: 22px;
color: #fff;
float: right;
padding-right: 12px;
margin-left: 3px;
transition: all 0.9s ease 0s;
-moz-transition: all 0.9s ease 0s;
-webkit-transition: all 0.9s ease 0s;
-o-transition: all 0.9s ease 0s;
padding-left: 9px;
padding-bottom: 3px;} #boro:hover{background:#000;}</style>
<div id="boro">+</div>

</a>

<a id="minustext" onclick="resizeText(-1)" href="javascript:void(0);">

<style type="text/css">#soto{color: #FFF;
background: #FF3300;
font-weight: bold;
font-size: 22px;
padding-right: 14px;
float: right;
transition: all 0.9s ease 0s;
-moz-transition: all 0.9s ease 0s;
-webkit-transition: all 0.9s ease 0s;
-o-transition: all 0.9s ease 0s;
padding-left: 11px;
padding-bottom: 3px;} #soto:hover{background:#000;}</style>

<div id="soto">-</div>

</a></div><br/>';


function fr_js_enqueue() {
    echo '<script type="text/javascript">
          function resizeText(multiplier) {
            if (document.body.style.fontSize == "") {
                document.body.style.fontSize = "1.0em";
            }
            document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
          }
          </script>';
}
	

function spfr_content_filter($content){//Adds the Font resiz option
    global $oplinks;
    if(is_single()||is_page())$content=$oplinks.$content;
	return $content;
};

add_filter( 'the_content', 'spfr_content_filter' );
add_action('wp_head', 'fr_js_enqueue');

?>