<?php

require_once 'Browser.php';

function browser_specific_stylesheet(){
    $browser = new Browser ();

    switch ($browser->getBrowser()) {
    case Browser::BROWSER_OPERA:
        if ($browser->getVersion() >= 10) {
            $stylesheet = 'style_op10.css';
        }
        break;
    case Browser::BROWSER_FIREFOX:
        if ($browser->getVersion() >= 4) {
            $stylesheet = 'style_ff4.css';
        } else if ($browser->getVersion() >= 3.6) {
            $stylesheet = 'style_ff36.css';
        } else if ($browser->getVersion() >= 3.5) {
            $stylesheet = 'style_ff36.css';
        } else if ($browser->getVersion() >= 3.0) {
            $stylesheet = 'style_ff30.css';
        } else if ($browser->getVersion() >= 3) {
            $stylesheet = 'style_ff2.css';
        } else {
            $found = FALSE;
        }
        break;
    case Browser::BROWSER_IE:
        if ($browser->getVersion() >= 9) {
            $stylesheet = 'style_ie9.css';
        } else if ($browser->getVersion() >= 8) {
            $stylesheet = 'style_ie8.css';
        } else if ($browser->getVersion() >= 7) {
            $stylesheet = 'style_ie7.css';
        } else if ($browser->getVersion() >= 6) {
            $stylesheet = 'style_ie6.css';
        } else {
            $found = FALSE;
        }
        break;
    case Browser::BROWSER_SAFARI:
        if ($browser->getVersion() >= 5) {
            $stylesheet = 'style_sf5.css';
        } else {
            $found = FALSE;
        }
        break;
    case Browser::BROWSER_CHROME:
        if ($browser->getVersion() >= 8) {
            $stylesheet = 'style_ch8.css';
        } else if ($browser->getVersion() >= 7) {
            $stylesheet = 'style_ch7.css';
        } else if ($browser->getVersion() >= 6) {
            $stylesheet = 'style_ch6.css';
        } else {
            $found = FALSE;
        }
        break;
    default:
        $found = FALSE;
        break;
    }

    if ($stylesheet) {
        return '<link rel="stylesheet" href="'.get_bloginfo ('template_url').'/'.$stylesheet.'" />';
    } else {
        return '<!-- '.$browser->getUserAgent().' -->';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="utf-8" />
<title><?php wp_title ('&laquo;', true, 'right'); ?><?php bloginfo ('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo ('stylesheet_url'); ?>" />
<?php echo browser_specific_stylesheet (); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/scripts.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php bloginfo ('template_url'); ?>/images/favicon.ico" />
<?php wp_head(); ?>
</head>
<body>
<header>
<hgroup>
<h2><?php bloginfo ('description'); ?></h2>
<h1><?php bloginfo ('name'); ?></h1>
</hgroup>
<nav>
<ul>
<?php wp_list_pages ('depth=1&title_li='); ?>
</ul>
</nav>
</header>
