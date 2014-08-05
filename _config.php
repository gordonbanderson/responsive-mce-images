<?php
// turn off resizing in TinyMCE as it makes no sense for responsive images
HtmlEditorConfig::get('cms')->setOption('advimagescale_noresize_all','false');
HtmlEditorConfig::get('cms')->setOption('object_resizing', false);
