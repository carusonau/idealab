<?php

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
	<div style="padding:3px 0 4px 0;"></div>
    <?php
		// Slideshow
    	//$block = module_invoke('homepage_slideshow-block', 'block_view', '1');
		//print $block['content'];
		$view = views_embed_view('homepage_slideshow', 'block', null);
		print $view;
	?>
<!--
    <img src="/sites/all/themes/nau/images/tmp/idealab.png" style="padding-top:4px;">-->
      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>


        <h1 class="title" id="page-title" style="float:left;">IDEA Lab</h1>
        <div style="padding: 29px 0 0 10px; float:left;" >(Formerly Bilby Research Center)</div>
		<p style="font-weight:bold; color:#003366; clear:both;">Imaging, Design, Editing, and Administrative Support</p>
		<p>IDEA Lab is a centralized university research support service. We invite research projects from all university departments and colleges.</p>
		<div>
		  <a href="/imaging" style="text-decoration:none; ">
		     <img width="90" height="90" alt="original images" src="/sites/all/themes/nau/images/tmp/block-I.png" style="float:left;">
		     <h3 style="padding: 40px 100px; color:#619281; font-family: Arial; font-size:18px; letter-spacing:2px; ">IMAGING</h3>
		  </a>
		</div>
		<div>
		  <a href="/design" style="text-decoration:none;">

		     <img width="90" height="90" alt="imaging services" src="/sites/all/themes/nau/images/tmp//block-D.png" style="float:left;">
		     <h3 style="padding: 40px 100px; color:#619281; font-family: Arial; font-size:18px; letter-spacing:2px; ">DESIGN</h3>
		      </a>
		</div>
		<div>
		  <a href="/editing" style="text-decoration:none;">

		      <img width="90" height="90" alt="multispectral imaging" src="/sites/all/themes/nau/images/tmp//block-E.png" style="float:left;">
		       <h3 style="padding: 40px 100px; color:#619281; font-family: Arial; font-size:18px; letter-spacing:2px; ">EDITING</h3>
		      </a>
		</div>
		<div>
		  <a href="/administrative-support" style="text-decoration:none;">
		     <img width="90" height="90" alt="images as data" src="/sites/all/themes/nau/images/tmp//block-A.png" style="float:left;">
		     <h3 style="padding: 40px 100px; color:#619281; font-family: Arial; font-size:18px; letter-spacing:2px; ">ADMINISTRATIVE SUPPORT</h3>
		  </a>
		</div>


      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>

      <?php //print render($page['content']); ?>
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
