<?php
/*
 * Thý vi?n l?y ?nh thumb 90 x 90
* Author: Sang Nguyen
* Date update : 14/03/2016
* JNET Team
*/
class Getthumb {
	
	
	public function image($url = null,$size = "") {
		if(isset($size) && $size != "")
			$size = $size."_";
		else 
			$size = "";	
		if(isset($url) && $url != '') : 										
			#xý l? ?nh Thumbnail
			$img_url = explode("/",$url);
			$img_name = array_pop($img_url);
			$url_thumb = $img_url[0]."//".$img_url[2]."/" .$img_url[3]. "/" .$img_url[4]. "/thumbs/".$size .$img_name;
			if(file_exists($img_url[3]. "/" .$img_url[4]. "/thumbs/".$size .$img_name))
				$thumb = $url_thumb;
			else if(file_exists($img_url[3]. "/" .$img_url[4]. "/images/".$img_name))	{
				$thumb = $url;
			}
			else 
				$thumb = "http://placehold.it/100x100";
		else : $thumb = "http://placehold.it/180x180";
		endif;
		return $thumb;
	}
}