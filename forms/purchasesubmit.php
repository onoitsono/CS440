<!DOCTYPE HTML>
<!--[if lte IE 7]> <html lang="en" class="ie ie7 classic"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie ie8 classic"> <![endif]-->
<!--[if gt IE 8]><!--><html class="classic" lang="en"><!--<![endif]-->

<!-- This is an exact copy of Cezary's makenewacct.php page that I (Bevan Li) am modifying
so that we may use it for our form submission for the purchase.php page -->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="http://oregonstate.edu/is/sites/all/themes/osu_standard/favicon.ico" type="image/vnd.microsoft.icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Purchase Request | Community Network</title>

  <!-- CSS -->
	<style type="text/css" media="all">
		@import url("./css/system.base.css");
		@import url("./css/system.menus.css");
		@import url("./css/system.messages.css");
		@import url("./css/system.theme.css");
		@import url("./css/aggregator.css");
		@import url("./css/book.css");
		@import url("./css/date.css");
		@import url("./css/datepicker.1.7.css");
		@import url("./css/field.css");
		@import url("./css/is_features.css");
		@import url("./css/node.css");
		@import url("./css/osu_top_hat.css");
		@import url("./css/user.css");
		@import url("./css/views.css");
		@import url("./css/ctools.css");
		@import url("./css/webform.css");
		@import url("./css/classic.css");
		@import url("./css/bootstrap.css");
		@import url("./css/main.css");
		@import url("./css/responsive.css");
		@import url("./css/main-responsive.css"); 
		div.account-menu, div.account-menu-2
		{
			display:none;
		}
		div.form-item
		{
			margin:0px
		}
		select
		{	
			height:30px;
		}
		div.alert
		{
			color:red;
			font-weight:bold;
			background-color:rgba(255,102,51,0.4);
		}
		// changes line 744 in http://oregonstate.edu/is/sites/all/themes/osu_standard/bootstrap/css/bootstrap.css?maz731
	</style>

  <!-- Javascripts -->

  <!-- Google Analytics script -->
  <!-- Tracking code is returned in google_tracking_code() from template.php -->
  <script type='text/javascript'>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', "UA-4834799-1"]);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https: == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
    })();
  </script>

<link rel="stylesheet" href="jquery-ui.css" />
<<script src="jquery-1.8.2.js"></script>
<script src="./jquery-ui.js"></script>
<script type="text/javascript" src="./javascript/jquery.once.js?v=1.2"></script>
<script type="text/javascript" src="./javascript/drupal.js"></script>
<script type="text/javascript" src="./javascript/jquery.cookie.js?v=1.0"></script>
<script type="text/javascript" src="./javascript/jquery.form.js?v=2.52"></script>
<script type="text/javascript" src="./javascript/form.js?v=7.15"></script>
<script type="text/javascript" src="./javascript/ajax.js?v=7.15"></script>
<script type="text/javascript" src="./javascript/progress.js"></script>
<script type="text/javascript" src="./javascript/base.js"></script>
<script type="text/javascript" src="./javascript/ajax_view.js"></script>
<script type="text/javascript" src="./javascript/textarea.js?v=7.15"></script>
<script type="text/javascript" src="./javascript/collapse.js?v=7.15"></script>
<script type="text/javascript" src="./javascript/webform.js"></script>
<script type="text/javascript" src="./javascript/timers.js"></script>
<script type="text/javascript" src="./javascript/menus.js"></script>
<script src="newacctscripts.js"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery.extend(Drupal.settings, {"basePath":"\u002Fis\u002F", "pathPrefix":"", "ajaxPageState":{"theme":"osu_standard", "theme_token":"0UKtC__Un82Y6ZkjnX7DDIx17D96L1wr0tgOwHgRSXM", "js":{"misc\u002Fjquery.js":1, "misc\u002Fjquery.once.js":1, "misc\u002Fdrupal.js":1, "misc\u002Fjquery.cookie.js":1, "misc\u002Fjquery.form.js":1, "misc\u002Fform.js":1, "misc\u002Fajax.js":1, "sites\u002Fdefault\u002Fmodules\u002Fis_features\u002Fis_features.js":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Flive_feeds.js":1, "sites\u002Fall\u002Fmodules\u002Fosu_features\u002Fmultimenus\u002Fjs\u002Fmultimenus.js":1, "misc\u002Fprogress.js":1, "sites\u002Fall\u002Fmodules\u002Flightbox2\u002Fjs\u002Flightbox.js":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fsuperfish\u002Fjs\u002Fsuperfish.js":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fsuperfish\u002Fjs\u002Fjquery.bgiframe.min.js":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fsuperfish\u002Fjs\u002Fjquery.hoverIntent.minified.js":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fnice_menus.js":1, "sites\u002Fall\u002Fmodules\u002Fcaptcha\u002Fcaptcha.js":1, "sites\u002Fall\u002Fmodules\u002Fviews\u002Fjs\u002Fbase.js":1, "sites\u002Fall\u002Fmodules\u002Fviews\u002Fjs\u002Fajax_view.js":1, "misc\u002Ftextarea.js":1, "misc\u002Fcollapse.js":1, "sites\u002Fall\u002Fmodules\u002Fwebform\u002Fjs\u002Fwebform.js":1, "sites\u002Fall\u002Fmodules\u002Fquicktabs\u002Fjs\u002Fquicktabs.js":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fjs\u002Ftimers.js":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fjs\u002Fmenus.js":1}, "css":{"modules\u002Fsystem\u002Fsystem.base.css":1, "modules\u002Fsystem\u002Fsystem.menus.css":1, "modules\u002Fsystem\u002Fsystem.messages.css":1, "modules\u002Fsystem\u002Fsystem.theme.css":1, "modules\u002Faggregator\u002Faggregator.css":1, "modules\u002Fbook\u002Fbook.css":1, "sites\u002Fall\u002Fmodules\u002Fdate\u002Fdate_api\u002Fdate.css":1, "sites\u002Fall\u002Fmodules\u002Fdate\u002Fdate_popup\u002Fthemes\u002Fdatepicker.1.7.css":1, "modules\u002Ffield\u002Ftheme\u002Ffield.css":1, "sites\u002Fdefault\u002Fmodules\u002Fis_features\u002Fis_features.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Flive_feeds.css":1, "sites\u002Fall\u002Fmodules\u002Fosu_features\u002Fmultimenus\u002Fcss\u002Fmultimenus.css":1, "modules\u002Fnode\u002Fnode.css":1, "sites\u002Fall\u002Fmodules\u002Fosu_search\u002Fosu_search.css":1, "sites\u002Fall\u002Fmodules\u002Fosu_top_hat\u002Fosu_top_hat.css":1, "modules\u002Fpoll\u002Fpoll.css":1, "sites\u002Fall\u002Fmodules\u002Fosu_features\u002Frelated_content_tab\u002Frelated_content_tab.css":1, "modules\u002Fuser\u002Fuser.css":1, "sites\u002Fall\u002Fmodules\u002Fviews\u002Fcss\u002Fviews.css":1, "sites\u002Fall\u002Fmodules\u002Fctools\u002Fcss\u002Fctools.css":1, "sites\u002Fall\u002Fmodules\u002Flightbox2\u002Fcss\u002Flightbox.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Fplugins\u002Fosu_announcements\u002Fosu_announcements.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Fplugins\u002Fosu_events\u002Fosu_events.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Fplugins\u002Fosu_news\u002Fosu_news.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Fplugins\u002Fosu_wordpress\u002Fosu_wordpress.css":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fnice_menus.css":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fnice_menus_default.css":1, "sites\u002Fall\u002Fmodules\u002Fbiblio\u002Fbiblio.css":1, "sites\u002Fall\u002Fmodules\u002Fwebform\u002Fcss\u002Fwebform.css":1, "sites\u002Fall\u002Fmodules\u002Fquicktabs\u002Fcss\u002Fquicktabs.css":1, "sites\u002Fall\u002Fmodules\u002Fquicktabs\u002Fquicktabs_tabstyles\u002Ftabstyles\u002Fbasic\u002Fbasic.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fcss\u002Fvariants\u002Fclassic\u002Fclassic.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fbootstrap\u002Fcss\u002Fbootstrap.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fcss\u002Fmain.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fbootstrap\u002Fcss\u002Fresponsive.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fcss\u002Fmain-responsive.css":1}}, "jcarousel":{"ajaxPath":"\u002Fis\u002Fjcarousel\u002Fajax\u002Fviews"}, "lightbox2":{"rtl":0, "file_path":"\u002Fis\u002F(\u005Cw\u005Cw\u002F)public:\u002F", "default_image":"\u002Fis\u002Fsites\u002Fall\u002Fmodules\u002Flightbox2\u002Fimages\u002Fbrokenimage.jpg", "border_size":10, "font_color":"000", "box_color":"fff", "top_position":"", "overlay_opacity":"0.8", "overlay_color":"000", "disable_close_click":1, "resize_sequence":0, "resize_speed":400, "fade_in_speed":400, "slide_down_speed":600, "use_alt_layout":0, "disable_resize":0, "disable_zoom":0, "force_show_nav":0, "show_caption":1, "loop_items":0, "node_link_text":"View Image Details", "node_link_target":0, "image_count":"Image !current of !total", "video_count":"Video !current of !total", "page_count":"Page !current of !total", "lite_press_x_close":"press \u003Ca href=\u0022#\u0022 onclick=\u0022hideLightbox(); return FALSE;\u0022\u003E\u003Ckbd\u003Ex\u003C\u002Fkbd\u003E\u003C\u002Fa\u003E to close", "download_link_text":"", "enable_login":false, "enable_contact":false, "keys_close":"c x 27", "keys_previous":"p 37", "keys_next":"n 39", "keys_zoom":"z", "keys_play_pause":"32", "display_image_size":"original", "image_node_sizes":"()", "trigger_lightbox_classes":"", "trigger_lightbox_group_classes":"", "trigger_slideshow_classes":"", "trigger_lightframe_classes":"", "trigger_lightframe_group_classes":"", "custom_class_handler":0, "custom_trigger_classes":"", "disable_for_gallery_lists":true, "disable_for_acidfree_gallery_lists":true, "enable_acidfree_videos":true, "slideshow_interval":5000, "slideshow_automatic_start":true, "slideshow_automatic_exit":true, "show_play_pause":true, "pause_on_next_click":false, "pause_on_previous_click":true, "loop_slides":false, "iframe_width":600, "iframe_height":400, "iframe_border":1, "enable_video":0}, "live_feeds":{"osu_announcements":{"name":"OSU Announcements", "description":"A plugin for Live Feeds to parse the RSS from the OSU Announcements", "title":"OSU Announcements", "url":"http:\u002F\u002Foregonstate.edu\u002Fcws\u002Fannouncement\u002Frss.xml"}, "osu_events":{"name":"OSU Events", "description":"A plugin for Live Feeds to parse the RSS from the OSU Events Calendar", "title":"OSU Events", "url":"http:\u002F\u002Fcalendar.oregonstate.edu\u002Ftoday+60\u002Flist\u002Fwebtrain\u002Frss20.xml"}, "osu_news":{"name":"OSU News", "description":"A plugin for Live Feeds  to parse the RSS from the OSU News site", "title":"OSU News", "url":"http:\u002F\u002Foregonstate.edu\u002Fua\u002Fncs\u002Freleases\u002Ffeed\u002F"}, "osu_wordpress":{"name":"OSU WordPress", "description":"A plugin for Live Feeds to parse the RSS from OSU WordPress sites", "title":"OSU WordPress", "url":"http:\u002F\u002Fblogs.oregonstate.edu\u002Ffeed\u002Frss2"}}, "nice_menus_options":{"delay":800, "speed":1}, "views":{"ajax_path":"\u002Fis\u002Fviews\u002Fajax", "ajaxViews":{"views_dom_id:7f31fa3311dae8bc110d3e81a812e8aa":{"view_name":"feature_story", "view_display_id":"block_1", "view_args":"", "view_path":"node\u002F339", "view_base_path":"features", "view_dom_id":"7f31fa3311dae8bc110d3e81a812e8aa", "pager_element":0}}}, "quicktabs":{"qt_help_quicktab":{"name":"help_quicktab", "tabs":[ {"bid":"block_delta_12", "hide_title":1}, {"bid":"block_delta_13", "hide_title":1}, {"bid":"block_delta_14", "hide_title":1} ], "nice_menus_options":{"delay":800, "speed":1}}}});
//--><!]]>
</script>

</head>

<body class="html not-front not-logged-in one-sidebar sidebar-first page-node page-node- page-node-339 node-type-webform" >
<div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable">Skip to main content</a>
  </div>
<!-- OSU Top Hat -->
    
<!-- Top-Hat -->
<div id='osu-top-hat'><div class='container'><a href='http://oregonstate.edu' class='tag'><img src='http://oregonstate.edu/is/sites/all/modules/osu_top_hat/images/osu-tag.png' class='logo' alt='Oregon State University' /><span class='mobile-header'>OREGON STATE UNIVERSITY</span></a></div></div><div id="bg-holder"></div>
<div id='page-wrapper' class='container'>

  <!-- Site Name -->
  <div id='header' class='row-fluid'>
    <h1><a href='/is/'>Community Network Forms</a></h1>
  </div>
 
    
    <!-- Messages and breadcrumbs -->
    <div id="messages" style="margin-top:7px;">
      <h2 class="element-invisible">You are here</h2><div class="breadcrumb"><a href="http://oregonstate.edu/is/tss/cn">Community Network</a> » <a href="http://oregonstate.edu/is/tss/cn/online-forms">CN Account Change Forms</a></div>    </div> <!-- messages -->


    <!-- Full width top region -->
    
    
    <!-- Now divide into main column and right sidebar -->
    <div class='row'>
      <div class='span9' >

        <!-- Features -->
        
                <div class='row'>
        <!-- Main content and middle sidebar -->
          <div class='span12'>

            <!-- Pre-content -->
            
            <!-- Main Content -->
            <h2 class="title" id="page-title"><a href="purchase.php">Submit Another Request</a></h2>
              
              
              <div id='content' >
                <a name="main-content"></a>
                  <div class="region region-content">
    <div id="block-system-main" class="block block-system">

    
<div class="content">
<div id="node-339" class="node node-webform clearfix">
<!-- content here --> 

<?php
	// changed variable to our page
	$purchaseFormSubmission = "purchase.php";
	
	// Check to see if from the right page.
	if (isset($_POST['need-help']) && isset($_POST['cn-user']) && isset($_POST['email-address']) && isset($_POST['phone-number']) && isset($_POST['dept-number']))
	{
		$type = $_POST['need-help'];
		$to = 'cn.help@oregonstate.edu';
		$subject = 'purchase submit page testing';
		$mailResult  = "<strong>Customer Name: </strong>" . $_POST['cn-user'] . "<br><br>";
		$mailResult .= "<strong>Customer Email: </strong>" . $_POST['email-address'] . "<br><br>";
		$mailResult .= "<strong>Customer Phone: </strong>" . $_POST['phone-number'] . "<br><br>";
		$mailResult .= "<strong>Dept Billing Index: </strong>" . $_POST['dept-number'] . "<br><br>";
		$mailResult .= "<strong>Authenticated User: </strong>" . $_POST['requestor-login']. "<br><br><br><br>";
 		$mailResult .= "<strong>Customer Computer Request: </strong>";
		
		// Customer chose help needed. Need to check every final box to figure which computer it is.
		if ($type == 'help-needed')
		{
			if (isset($_POST['mac-laptop'])){
				$comp = $_POST['mac-laptop'];
				if ($comp == 'mac-laptop-mid'){
					$mailResult .= '13" Macbook Pro';
				} else if ($comp == 'mac-laptop-high'){
					$mailResult .= '15" Macbook Pro';
				} else if ($comp == 'mac-laptop-port'){
					$mailResult .= '13" Macbook Air';
				}
			}
			if (isset($_POST['mac-desktop'])){
				$comp = $_POST['mac-desktop'];
				if ($comp == 'mac-desktop-med'){
					$mailResult .= '21" iMac Desktop';
				} else if ($comp == 'mac-desktop-large'){
					$mailResult .= '27" iMac Desktop';
				} else if ($comp == 'mac-desktop-small'){
					$mailResult .= 'Mac Mini';
				}
			}
			if (isset($_POST['windows-laptop'])){
				$comp = $_POST['windows-laptop'];
				if ($comp == 'windows-laptop-mid'){
					$mailResult .= 'Dell Latitude E5430';
				} else if ($comp == 'windows-laptop-high'){
					$mailResult .= 'Dell Latitude E6430';
				} else if ($comp == 'windows-laptop-port'){
					$mailResult .= 'Dell Latitude 6430u';
				}
			}
			if (isset($_POST['windows-desktop'])){
				$comp = $_POST['windows-desktop'];
				if ($comp == 'windows-desktop-mid'){
					$mailResult .= 'Dell Optiplex 7010';
				} else if ($comp == 'windows-desktop-high'){
					$mailResult .= 'Dell Optiplex 9010';
				}
			}
		} 
		// If the customer just picks a computer, have to figure out which one.
		else if ($type == 'no-help'){
			foreach ($_POST['id'] as $id){
				switch ($id){
					case 'comp-1':
						$mailResult .= '21" iMac Desktop';
						break;
					case 'comp-2':
						$mailResult .= '27" iMac Desktop';
						break;
					case 'comp-3':
						$mailResult .= 'Mac Mini';
						break;
					case 'comp-4':
						$mailResult .= '13" Macbook Pro';
						break;
					case 'comp-5':
						$mailResult .= '15" Macbook Pro';
						break;
					case 'comp-6':
						$mailResult .= '13" Macbook Air';
						break;
					case 'comp-7':
						$mailResult .= 'Dell Optiplex 7010';
						break;
					case 'comp-8':
						$mailResult .= 'Dell Optiplex 9010';
						break;
					case 'comp-9':
						$mailResult .= 'Dell Latitude E5430';
						break;
					case 'comp-10':
						$mailResult .= 'Dell Latitude E6430';
						break;
					case 'comp-11':
						$mailResult .= 'Dell Latitude 6430u';
						break;
					default:
						break;
				}
			}
		}
	
		//. Accessories put into email variable
		$mailResult .= "<br><br>";
		$mailResult .= "<strong>Accessories: </strong><br>";
		
		if (isset($_POST['accessories'])){
			foreach($_POST['accessories'] as $acc){
				$mailResult .= $acc;
				if (isset($_POST[$acc]) && $_POST[$acc] != ''){
					$mailResult .= ' - ' . $_POST[$acc];
				}
				$mailResult .= '<br>';
			}
		} else {
			$mailResult .= "none";
		}
	
		$random_hash = md5(date('r', time()));
		
		// $headers =  "MIME-Version: 1.0\r\n";
		// $headers .= 'From: "' . $_POST['cn-user'] . '" <' . $_POST['email-address'] . '>' . "\r\n";
		// $headers .= "Content-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";
		$headers =  "MIME-Version: 10\r\n";
		$headers .= 'From: "' . $_POST['cn-user'] . '" <' . $_POST['email-address'] . '>' . "\r\n";
		$headers .= "Content-Type: text/html; charset='iso-8859-1'";
		$headers .=	"Content-Transfer-Encoding: 7bit\r\n\r\n";


		$output = $mailResult;

	

		mail($to, $subject, $output, $headers);
	
	}
	else
	{
		//redirect to create account page if incorrectly sent to this site
		echo "<script>window.location='" . $purchaseFormSubmission . "';</script>";
	}
?>

<div class="content">



</div>
</div>

  
  
</div>
  </div>
</div>
  </div>
              </div> <!-- /content -->
            
            <!-- Main page columns  -->
            

            <!-- Post-content -->
            
          </div> <!-- Content area -->

          <!-- Middle Sidebar -->
          
        </div>
      </div> <!-- /Main Columns -->
 </div>
      
    </div> <!-- /main-body-row -->

    <!-- Full width above footer -->
    
  <!-- /container -->

  <!-- Page Footer -->

    <div id='footer'>
      <div class='container'>
        <div class='row'>
          <div class='span4 contact'>
            <h3>Information Services</h3>
            <div class="specific-contact">
              <p><a href="http://oregonstate.edu/is/organization">Information Services Home Page</a><br /><a href="http://oregonstate.edu/is/organization">Organization</a></p>
            </div>
            <div class="general-contact">
              <a href="http://oregonstate.edu/copyright">Copyright</a>
              &copy;2012              Oregon State University<br />
              <a href="http://oregonstate.edu/disclaimer">Disclaimer</a>
            </div>
             <div class="social-media"></div>
          </div>
          <div class='span4'>
            <h3>Community Network</h3>
            <div class="specific-contact">
              <p><a href="http://oregonstate.edu/is/tss/cn">Community Network Home Page</a><br />
              541-737-8787</p>
            </div>
          </div>
        </div>
      </div>
    </div>

	<!-- /page-wrapper -->
</html>