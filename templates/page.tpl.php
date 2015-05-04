<?php 
  // this is UTSC custom function not to show 404 page -- Sebastian -- Syed
  define("ERROR_MSG_PAGE_NOT_FOUND_404", '404 Error: Page Not Found');
  function getURLContents($url) {
    $timeout = 3;
    $old = ini_set('default_socket_timeout', $timeout); 
    $fp = @fopen($url,"r"); 
    ini_set('default_socket_timeout', $old); 
    $buf="";
    if ($fp) {
      while(!feof($fp)) {
        $buf .= fgets($fp, 1024);
      }

      fclose($fp);
      if (stristr($buf, ERROR_MSG_PAGE_NOT_FOUND_404)!==FALSE){
        $buf="";
      }
    }

    return  $buf;
  }
?>
  <header class="mainHeader container" role="banner">
    <?php
      // dump crisis info (typically empty)
      print getURLContents("http://www.utsc.utoronto.ca/_includes/crisis.inc");
      // dump site-wide header
      print getURLContents("http://www.utsc.utoronto.ca/_includes/_header.html");
    ?>
    <div class="dept_bg">
      <h2 id="dept_title"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
        <?php echo variable_get('site_name'); ?>
      </h2>
    </div>
    <?php print render($page['header']); ?>
  </header>
<div class="container">
  <?php print render($page['menu_bar']); ?>
  
  <?php if ($breadcrumb): ?>
    <nav id="breadcrumb"><?php print $breadcrumb; ?></nav>
  <?php endif; ?>
  <?php print $messages; ?>
  <?php print render($page['help']); ?>
  <?php print render($page['secondary_content']); ?>
  <div id="columns"><div class="columns-inner clearfix">
    <div id="content-column">
     <div class="content-inner">
       <?php print render($page['sidebar_first']); ?>
      <?php $tag = $title ? 'section' : 'div'; ?>
      <<?php print $tag; ?> id="main-content" role="main">
      <?php print render($page['highlighted']); ?>
        <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
          <header>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
              <h1 id="page-title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
              <div id="tasks">
                <?php if ($primary_local_tasks): ?>
                  <ul class="tabs primary"><?php print render($primary_local_tasks); ?></ul>
                <?php endif; ?>
                <?php if ($secondary_local_tasks): ?>
                  <ul class="tabs secondary"><?php print render($secondary_local_tasks); ?></ul>
                <?php endif; ?>
                <?php if ($action_links = render($action_links)): ?>
                  <ul class="action-links"><?php print $action_links; ?></ul>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </header>
        <?php endif; ?>
        <?php print render($page['content']); ?>
      </<?php print $tag; ?>>
      <?php print render($page['content_aside']); ?>
    </div></div>
    <?php print render($page['sidebar_second']); ?>
  </div></div>
  <?php print render($page['tertiary_content']); ?>
   <footer id="mainFooter">
   <?php
      // dump site-wide footer
      print getURLContents("http://www.utsc.utoronto.ca/_includes/_footer.html");
      ?>
      <?php print render($page['footer']); ?>
    </footer>
</div>