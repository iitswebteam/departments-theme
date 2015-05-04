<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (lte IE 6)&(!IEMobile)]><html class="ie6 ie6-7 ie6-8" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="ie7 ie6-7 ie6-8" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 8)&(!IEMobile)]><html class="ie8 ie6-8" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->
<head>
<?php
  //<meta charset="utf-8" > will be inserted by Drupal
  print $head;
  

?>
<title>
	<?php if (drupal_is_front_page()) : ?>
		<?php print $head_title_array['name']; ?>
	<?php else : ?>
		<?php print $head_title; ?>
	<?php endif; ?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equiv="cleartype" content="on">
<?php // Header & footer styles; see page.tpl.php for the sloppy includes ?>
<link href="//www.utsc.utoronto.ca/_includes/styles/hf.css" rel="stylesheet" media="screen" type="text/css" />
<!--[if gte IE 7]><link href="//www.utsc.utoronto.ca/_includes/styles/ie.css" rel="stylesheet" media="screen" /><![endif]-->
<?php print $styles; ?>

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
<div id="page">
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
<?php
  print $page_top;
  print $page;
  print $page_bottom;
  print $scripts;
?>
</div>

<script src="//www.utsc.utoronto.ca/_includes/scripts/tabs.js"></script>
<script src="//www.utsc.utoronto.ca/_includes/scripts/slide-menu-test.js"></script>

</body>
</html>