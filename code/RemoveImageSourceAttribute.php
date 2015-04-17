<?php

class RemoveImageSourceAttribute extends Extension {
	/**
	 * Remove src attributes from images, instead use foundations responsive image loader
	 * @param string $html HTML content of the page
	 */
	public function ResponsiveTinyMCEImages($html) {
		$dom = Injector::inst()->create('HTMLValue', $html);
		if($images = $dom->getElementsByTagName('img')) foreach($images as $img) {
			$cssclass = $img->getAttribute('class');
			$pos = strpos($cssclass, 'tinymce');
			if ($pos !== false) {
				$img->removeAttribute('src');
			}
		}
		return $dom->getContent();
	} 	
}

  