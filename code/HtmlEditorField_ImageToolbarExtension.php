<?php
/**
 * Add 'no alignment' option when inserting images through 'Insert Media' form
 */
class HtmlEditorField_ImageToolbarExtension extends Extension {
 
	public function updateFieldsForImage(&$fields, $url, $file) {
		foreach ($fields as $field) {
			error_log('FIELD -> NAME: '.$field->Name);
		}
		//error_log('UPDATE FIELDS FOR IMAGE:'.print_r($fields,1));
		$className = $fields->fieldByName('CSSClass');
		$classes = $className->getSource();

		error_log(print_r($classes,1));

		$markedclasses = array();

		error_log("CLASSES:".$classes);

		// prepend 'tinymce' onto the CSS class names
		foreach (array_keys($classes) as $key) {
			$markedclasses['tinymce '.$key] = $classes[$key];
		}

		//$markedclasses = array_merge(array('tinymce' => _t('HtmlEditorField.CSSCLASSNONE', 'No alignment.')), $markedclasses);

		error_log('set marked classes');
		$className->setSource($markedclasses);
		error_log('MARKED CLASSES:'.print_r($markedclasses,1));


		return $fields;
	}

	public function updateMediaForm(&$fields) {
		error_log('UPDATE MEDIA FORM');
		foreach ($fields as $field) {
			error_log('Media form: FIELD -> NAME: '.$field->Name);
		}
	}
 
}
