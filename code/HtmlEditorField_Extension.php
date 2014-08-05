<?php
/**
 * Add 'no alignment' option when inserting images through 'Insert Media' form
 */
class HtmlEditorField_Extension extends Extension {

	public function processImage($image, &$imageDom) {
		error_log('**** Processing saved image '.$image);

		error_log('IMAGE DOM:'.get_class($imageDom));
		
		// create the sizes of responsive images to be shown
		$resized640=$image->SetWidth(640);
		$resized720=$image->SetWidth(720);

		$imageDom->setAttribute('data-src-640', $resized640->URL);
		$imageDom->setAttribute('data-src-720', $resized720->URL);

		// remove width and height attributes as they break the view in the editor
		$imageDom->removeAttribute('width');
		$imageDom->removeAttribute('height');

		$parent = $imageDom->parentNode;
		$parentClass = $parent->getAttribute('class');
		error_log('PARENT CLASS:'.$parentClass);

		if (strpos($parentClass, 'captionImage') !== false) {
			$parent->removeAttribute('style');
		}

/*
	not winning with this other than attribute tweaking
		$html = $image->renderWith('TinyMCEImage');
		error_log($html);
		$htmlValue = Injector::inst()->create('HTMLValue', $html);
		error_log($htmlValue);
		$htmlDom = $htmlValue->getDocument()->documentElement;
		error_log('HTML DOM:'.get_class($htmlDom));

		$imageDomNode = $imageDom->nodeValue;
		$htmlDomNode = $htmlDom->nodeValue;

		//$imageDom = $htmlDom;
		$imageDom->appendChild($htmlDom);
		*/
	}
 
}
