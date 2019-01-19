
<?php
$cssDir = "../css/"; //directory of css


?>
<!-- CSS common to all pages -->
<link rel="stylesheet" type="text/css" href="<?="$cssDir/MyCSS.css"?>>
<!-- CSS, specific to the current page -->
<link rel="stylesheet" type="text/css" href="<?="$cssDir/$styles[$this_page]"?>>