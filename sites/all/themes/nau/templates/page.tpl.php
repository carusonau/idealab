<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<div id="page">

   	<div id='naulogo' style="float:left; position:absolute; padding-left:8px;">
       <a href="http://nau.edu/">
		<img alt="NAU Logo" src="/sites/all/themes/nau/images/logo/nau.png">
		</a>
   	</div>
  	<header id="nauHeader" role="banner">
	    <!-- Pull in aggregator css DO NOT CHANGE -->

		<!-- Pull in aggregator javascript DO NOT CHANGE -->
		 <?php
	    //echo file_get_contents('http://idealab.nau.edu/includes/scripts_standard.aspx');
	    echo file_get_contents('http://cmsassets.nau.edu/aggregator/nav.ashx?location=header');
	    ?>
	    <form id="nauSearch" action="http://nau.edu/searchproxy.ashx" role="search">
	    <div id="searchOptions">
	    <label for="entireInput">Entire Site</label>
	    <input id="entireInput" type="radio" name="searchType" value="entireSite" checked="checked">

	    <label for="directoryInput">Directory</label>
	    <input id="directoryInput" type="radio" name="searchType" value="directory">

	    <label for="degreesInput">Degrees</label>
	    <input id="degreesInput" type="radio" name="searchType" value="degrees">
	    </div>
	    <!--[if IE]>
	    <input type="text" style="display: none;" disabled="disabled" size="1" />
	    <![endif]-->
	    <input name="q" type="text" id="query" class="nauSearchInput" placeholder="Enter search term..." title="Enter search term">
	    		<input type="submit" name="search" value="" class="nauSubmit">
		</form>
		<div id="idealab-title">
			IDEA LAB
		</div>
  </header>




  <div id="main" style="clear:both; padding-top: 150px;">

    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div><!-- /#content -->

    <div id="navigation">

      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see http://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

      <?php print render($page['navigation']); ?>

    </div><!-- /#navigation -->

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside><!-- /.sidebars -->
    <?php endif; ?>

  </div><!-- /#main -->

  <?php print render($page['footer']); ?>





  <!-- Footer.inc -->

	 <footer id="nauFooter" role="contentinfo">
	<a href="http://nau.edu/athletics">
		<figure id="athletics">
			<img alt="NAU Athletics Logo" src="//cmsassets.nau.edu/images/naualtlogo.png" />
			<figcaption>Visit Athletics Site</figcaption>
		</figure>
	</a>

	<nav id="communityFooter" role="navigation">
		<h5>NAU Community</h5>
		<ul>
			<li><a href="http://nau.edu/future-students">Future Students</a></li>
			<li><a href="http://nau.edu/current-students">Current Students</a></li>
			<li><a href="http://nau.edu/parents">Parents</a></li>
			<li><a href="http://nau.edu/alumni">Alumni</a></li>
			<li><a href="http://nau.edu/faculty-staff">Faculty/Staff</a></li>
		</ul>
	</nav>
	<nav id="studentFooter" role="navigation">
		<h5>Student Services</h5>
		<ul>
			<li><a href="http://nau.edu/financing">Financing Your Education</a></li>
			<li><a href="http://nau.edu/living-on-campus">Living on Campus</a></li>
			<li><a href="http://nau.edu/dining">Dining</a></li>
			<li><a href="http://nau.edu/payments">Paying Your Bill</a></li>
			<li><a href="http://nau.edu/safety">Campus Safety</a></li>
			<li><a href="http://nau.edu/veterans">Military and Veterans</a></li>
			<li><a href="http://nau.edu/disability">Disability Resources</a></li>
			<li><a href="http://nau.edu/consumer-info">Student Consumer Info</a></li>
		</ul>
	</nav>
	<nav id="campusFooter" role="navigation">
		<h5>Campus Resources</h5>
		<ul>
			<li><a href="http://nau.edu/maps">Maps</a></li>
			<li><a href="http://nau.edu/parking">Parking Services</a></li>
			<li><a href="http://nau.edu/counseling">Counseling Services</a></li>
			<li><a href="http://nau.edu/health-services">Campus Health Services</a></li>
			<li><a href="http://nau.edu/bookstore">Bookstore</a></li>
			<li><a href="http://nau.edu/events">Events Calendar</a></li>
			<li><a href="http://nau.edu/news">News</a></li>
			<li><a href="http://nau.edu/careers">Careers</a></li>
			<li><a href="http://nau.edu/cto">Central Ticket Office</a></li>
		</ul>
	</nav>
	<nav id="academicFooter" role="navigation">
		<h5>Academic Resources</h5>
		<ul>
			<li><a href="http://nau.edu/colleges">Colleges and Schools</a></li>
			<li><a href="http://nau.edu/locations">Campus Locations</a></li>
			<li><a href="http://nau.edu/nau-online">NAU Online</a></li>
			<li><a href="http://nau.edu/advising">Student Advising</a></li>
			<li><a href="http://nau.edu/tutoring">Tutoring</a></li>
			<li><a href="http://nau.edu/library">Library</a></li>
			<li><a href="http://nau.edu/registrar">Registrar</a></li>
		</ul>
	</nav>
	<a id="footerAlert" href="http://nau.edu/naualert"><img alt="NAU Alert" src="//cmsassets.nau.edu/images/naualert.png">Sign up for <abbr title="Northern Arizona University">NAU</abbr> ALERT</a>
	<a id="footerSocial" href="http://nau.edu/social"><img src="//cmsassets.nau.edu/images/social.png" alt="social media" title="Social Media Directory"><abbr title="Northern Arizona University">NAU</abbr> Social Media</a>
	<span id="copyright">
		&copy; 2013 Arizona Board of Regents. <span>Northern Arizona University, Flagstaff, Arizona</span> | <a href="http://nau.edu/privacy">Privacy Statement</a>
	</span>

</footer>


<!-- Footer.inc -->












</div><!-- /#page -->

<div id="nauFooterBG">
</div>



<?php print render($page['bottom']); ?>
