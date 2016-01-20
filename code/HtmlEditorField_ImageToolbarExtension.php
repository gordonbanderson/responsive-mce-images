<?php
/**
 * Add 'no alignment' option when inserting images through 'Insert Media' form.
 */
class HtmlEditorField_ImageToolbarExtension extends Extension
{
    public function updateFieldsForImage(&$fields, $url, $file)
    {
        $className = $fields->fieldByName('CSSClass');
        $classes = $className->getSource();
        $markedclasses = array();

        // prepend 'tinymce' onto the CSS class names
        foreach (array_keys($classes) as $key) {
            $markedclasses['tinymce '.$key] = $classes[$key];
        }
        $className->setSource($markedclasses);
        return $fields;
    }

    public function updateMediaForm(&$fields)
    {
        // does nothing currently
    }
}
