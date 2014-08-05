<?php

class RemoveImageSourceAttribute extends Extension {


	public function ResponsiveTinyMCEImages($html) {
		error_log('Parsing '.$html);
		$dom = Injector::inst()->create('HTMLValue', $html);
		if($images = $dom->getElementsByTagName('img')) foreach($images as $img) {
			error_log('IMAGE:'.$img);
			$cssclass = $img->getAttribute('class');
			$pos = strpos($cssclass, 'tinymce');
			if ($pos !== false) {
				error_log('REMOVING SRC ATTRIBUTE');
				$img->removeAttribute('src');
			}
		}

		return $dom->getContent();

	} 	
}

  