<?php

/**
 * @package WordPress
 * @subpackage str-complex
**/

add_filter('the_content', 'addshadowboxrel', 12);
add_filter('get_comment_text', 'addshadowboxrel');
function addshadowboxrel ($content)
{   global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
    $replacement = '<a$1href=$2$3.$4$5 rel="lightbox"$6>$7</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}

function bdw_get_images($post_id = null) {

    // Get the post ID
    if(!$post_id) 
      $iPostID = get_the_ID();
    else 
      $iPostID = $post_id;

    // Get images for this post
    $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );

    // If images exist for this page
    if($arrImages) {

        // Get array keys representing attached image numbers
        $arrKeys = array_keys($arrImages);

		/******BEGIN BUBBLE SORT BY MENU ORDER************
		// Put all image objects into new array with standard numeric keys (new array only needed while we sort the keys)
		foreach($arrImages as $oImage) {
			$arrNewImages[] = $oImage;
		}

		// Bubble sort image object array by menu_order TODO: Turn this into std "sort-by" function in functions.php
		for($i = 0; $i < sizeof($arrNewImages) - 1; $i++) {
			for($j = 0; $j < sizeof($arrNewImages) - 1; $j++) {
				if((int)$arrNewImages[$j]->menu_order > (int)$arrNewImages[$j + 1]->menu_order) {
					$oTemp = $arrNewImages[$j];
					$arrNewImages[$j] = $arrNewImages[$j + 1];
					$arrNewImages[$j + 1] = $oTemp;
				}
			}
		}

		// Reset arrKeys array
		$arrKeys = array();

		// Replace arrKeys with newly sorted object ids
		foreach($arrNewImages as $oNewImage) {
			$arrKeys[] = $oNewImage->ID;
		}
		******END BUBBLE SORT BY MENU ORDER**************/
		$sThumbUrl = array();
		for($i = 0; $i < 3; $i++) {
		        $sThumbUrl[$i]['small'] = wp_get_attachment_thumb_url($arrKeys[$i]);
		        $sThumbUrl[$i]['large'] = wp_get_attachment_url($arrKeys[$i]);
		}

		return $sThumbUrl;
	}
}


?>
