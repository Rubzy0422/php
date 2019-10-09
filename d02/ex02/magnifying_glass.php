$info = preg_replace_callback('/(<.*title=\")(.*)(\".*>)/isU', replace, $info);
$info = preg_replace_callback('/(<a.*>)(.*)(<\/a>)/Uis', replace_s, $info);