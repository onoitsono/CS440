<?php
	include "acctfunctions.inc";

	if (isset($_POST['pickup-submit'])) {
		$name = htmlspecialchars($_POST['name']);
		$department = htmlspecialchars($_POST['department']);
		$email = htmlspecialchars($_POST['email']);
		$requestor_login = htmlspecialchars($_POST['requestor_login']);
		$itemDescriptions = Array();
		$otherDescriptions = Array();
		$conditions = Array();
		$needReturned = Array();
		$numberOfItems = 1;
		$buildingRoom = htmlspecialchars($_POST['building-room']);
		$notes = htmlspecialchars($_POST['notes']);
		$items = "";

		while (isset($_POST['item_description_' . $numberOfItems])) {
			$itemDescription = htmlspecialchars($_POST['item_description_' . $numberOfItems]); 
			$condition = htmlspecialchars( $_POST['condition-' . $numberOfItems]);
			
			$items .= "<strong>Item Description: </strong>$itemDescription<br>";
			if($_POST['other_description_' . $numberOfItems] != ""){
				$otherDescription = htmlspecialchars($_POST['other_description_' . $numberOfItems]);
				$items .= "<strong>Other Description: </strong>$otherDescription<br>";
			}
			$items .= "<strong>Condition: </strong>$condition<br>";
			if(isset($_POST['need_returned_' . $numberOfItems])){
				$needReturned = ($_POST['need_returned_' . $numberOfItems]);
				if($needReturned == "Yes"){
					$items .= "<strong>Need Returned: </strong><font color = \"red\">$needReturned</font><br><br>";
				}
				else{
					$items .= "<strong>Need Returned: </strong>$needReturned<br><br>";
				}
			}
			$numberOfItems++;
		}
		$numberOfItems--;

		$to = 'cn.help@oregonstate.edu';
		$subject = 'Hardware Pickup Request';
		
		$headers =  "MIME-Version: 1.0\r\n";
		$headers .= 'From: "' . $name . '" <' . $email . '>' . "\r\n";
		$headers .= "Content-Type: text/html; charset='iso-8859-1'";
		$headers .=	"Content-Transfer-Encoding: 7bit\r\n\r\n";

		$output = "<strong>Name: </strong> $name<br>
		<strong>Authenticated User: </strong> $requestor_login<br>
		<strong>Department: </strong> $department<br>
		<strong>Email: </strong> $email<br><br>
		<strong>Number of Items: </strong> $numberOfItems<br>
		<strong>Pickup Location: </strong> $buildingRoom<br>
		<strong>Notes: </strong> $notes<br><br>" . 
		$items;
		
		mail($to, $subject, $output, $headers);

		$message = "<p style='color: #4e7300'>Request Submitted Succesfully!</p>";
	}
?>

<!doctype html>
<html class="classic" lang="en">

<head>
  <meta http-equiv='X-UA-Compatible' content='IE=10' />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="http://oregonstate.edu/is/sites/all/themes/osu_standard/favicon.ico" type="image/vnd.microsoft.icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Hardware Pick-up Request | Community Network</title>

  <!-- CSS -->
	<style type="text/css" media="all">
		@import url("./css/select2.css"); 
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
		div.inline-blk
		{
			display: inline-block;
			zoom: 1;
			*display: inline;
		}
		// changes line 744 in http://oregonstate.edu/is/sites/all/themes/osu_standard/bootstrap/css/bootstrap.css
		
		.autocomplete { border: 1px solid #999; background: #FFF; cursor: default; overflow: auto;}
		.autocomplete-suggestions { border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; }
		.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
		.autocomplete-selected { background: #F0F0F0; }
		.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
	
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
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
    })();
  </script>

  
<link rel="stylesheet" href="jquery-ui.css" />
<script src="jquery-1.8.2.js"></script>
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
<script type="text/javascript" src="./javascript/select2.min.js"></script>
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
<div id='osu-top-hat'><div class='container'><a href='http://oregonstate.edu' class='tag'><img src='./images/osu-tag.png' class='logo' alt='Oregon State University' /><span class='mobile-header'>OREGON STATE UNIVERSITY</span></a></div></div><div id="bg-holder"></div>
<div id='page-wrapper' class='container'>

  <!-- Site Name -->
  <div id='header' class='row-fluid'>
    <h1><a href='http://oregonstate.edu/is/tss/cn/online-forms'>Community Network Forms</h1>
  </div>
 
    
    <!-- Messages and breadcrumbs -->
    <div id="messages" style="margin-top:7px;">
      <h2 class="element-invisible">You are here</h2><div class="breadcrumb"><a href="http://oregonstate.edu/is/tss/cn">Community Network</a> </div>
    <!-- messages -->


    <!-- Full width top region -->
   <?php 
   // print_r($_SERVER);
    ?>
    
    <!-- Now divide into main column and right sidebar -->
    <div class='row'>
      <div class='span9' >

        <!-- Features -->
        
                <div class='row'>
        <!-- Main content and middle sidebar -->
          <div class='span12'>

            <!-- Pre-content -->
            
            <!-- Main Content -->
            <h2 class="title" id="page-title">Community Network Hardware Pick-up Request</h2>
              
              
              <div id='content' >
                <a name="main-content"></a>
                  <div class="region region-content">
    <div id="block-system-main" class="block block-system">

    
  <div class="content">
    <div id="node-339" class="node node-webform clearfix">
	
  
  <div class="content">

	<?php echo $message; ?>

    <p class="descr-text">Please fill out the form below to surplus OSU-owned computer hardware that is no longer useful to your department.  
    	By submitting the form below, a ticket will be created and CN will arrange for a technician to pick up the requested hardware from the building and room listed.
    </p>
    <p class="descr-text">
    	<strong>Only these Items will be picked up:</strong><br>
    	<table style="background-color:#fff;width:45%">
    		<tr style="vertical-align:top;">
    			<td>
    				<ul>
    					<li>Computer Towers</li>
    					<li>Monitors</li>
    					<li>Hard Drives (external and internal)</li>
    					<li>Keyboards and Mice</li>
    				</ul>
    			</td>
    			<td>
    				<ul>
    					<li>Laptops</li>
    					<li>Docking Stations</li>
    					<li>Computer Cables</li>
    				</ul>
    			</td>
    		</tr>
    	</table>
    </p>
	
<form class="webform-client-form" enctype="multipart/form-data" action="pickuprequest.php" method="post" id="pickup-request-form" accept-charset="UTF-8">

<?php
	//get user account info
	$reqinfo = get_userinfo($_SERVER['AUTH_USER'], "sAMAccountName"); // LDAP query for requestor info
	$drn = $reqinfo['displayname']; // returns either nothing or "display name" depending on whether there's a value for the displayname; drn stands for "default requestor name"
    $dre = $reqinfo['mail']; // default requestor email
    $reqmanagerinfo = get_userinfo($reqinfo['manager'], "distinguishedName"); // requestor's manager
    $manager_email = $reqmanagerinfo['mail']; // requestor's manager's email
    $requestor_department = $reqinfo['department']; // requestor's department
	
	// Hidden fields
	echo '<input type="hidden" id="requestor_login" name="requestor_login" value="' . $_SERVER['AUTH_USER'] . '">';
?>

<div class="form-item webform-component webform-component-textfield">
	<label for="name">Name<span class="form-required" title="This field is required.">*</span></label>
	<?php echo '<input type="text" id="name" name="name" value="'.$drn.'" size="70" class="required">';?>
</div>

<div class="form-item webform-component webform-component-textfield">
	<label for="department">Department<span class="form-required" title="This field is required.">*</span></label>
	<?php echo '<input type="text" id="department" name="department" value="'.$requestor_department.'" size="70" class="required">';?>
</div>

<div class="form-item webform-component webform-component-textfield">
	<label for="email">Email<span class="form-required" title="This field is required.">*</span></label>
	<?php echo '<input type="hidden" id="email" name="email" value="' .$dre. '" size="70" class="required email-autocomplete">';?>
</div>

<div class="form-item webform-component webform-component-select"> 
	<div class="inline-blk ">
		<label for="item_description_1">Item Description</label>
		<select id="item_description_1" name="item_description_1" onchange="item_description(item_description_1, 1); need_returned(item_description_1, 1) " class="form-select item_description_1 required">
			<option value="">--Select an option--</option>
			<option value="Computer Tower">Computer Tower</option>
			<option value="Laptop">Laptop</option>
			<option value="Monitor">Monitor</option>
			<option value="Hard drive">Hard drive (internal or external)</option>
			<option value="Keyboard Mouse">Keyboard or Mouse</option>
			<option value="Docking Station">Docking Station</option>
			<option value="Computer Cables">Computer Cables</option>
			<option value="Other">Other...</option>
		</select>
			
		<!-- <input type="text" id="item-description-1" name="item-description-1" value="" size="70" class="required"> -->
	</div> 
	<div class="inline-blk form-item webform-component webform-component-textfield">
		<div class="other_description_1" style="display:none">
			<label for="other_description_1">Other Description</label>
			<input type="text" id="other_description_1" name="other_description_1" value="" size="70" class="required">
		</div>
	</div> 
	<div class="inline-blk form-item webform-component webform-component-select">
		<label for="condition-1">Condition</label>
		<select id="condition-1" name="condition-1" class="form-select">
			<option value="New">New</option>
			<option value="Good">Good</option>
			<option value="Fair">Fair</option>
			<option value="Needs Repairs">Needs Repairs</option>
			<option value="Salvage">Salvage</option>
		</select>
	</div> 
	<div class="inline-blk form-item webform-component webform-component-select">
		<div class="need_returned_1" style="display:none">
			<input type="radio" id="need_returned_1" name="need_returned_1" value="Yes" class="required">  I would like this item returned to me after it has been wiped.</input><br>
			<input type="radio" id="need_returned_1" name="need_returned_1" value="No" class="required" checked>  I do not need this item back. Community Network can re-use item as needed and/or send to Surplus.</input><br>
		</div>
	</div> 
	<div id="more-items" class="form-item webform-component">
	</div>
	<div>
		<input type="button" id="add-item" value="Add Another Item" class="form-submit" style="display:none;" onclick="hide_add()">
		<input type="button" id="remove-item" value="Remove Last Item" class="form-submit" style="display:none;" onclick="show_add()">
	</div>
	<br>
</div>


<div class="form-item webform-component webform-component-textfield">
	<label for="building-room">Pick up location:</label>
	<input type="text" id="building-room" name="building-room" value="" size="70" class="required">
</div>

<div class="form-item webform-component webform-component-textarea">
	<label for="notes">Notes:</label>
	<div class="form-textarea-wrapper resizable">
		<textarea id="notes" name="notes" cols="3" rows"5" class="form-textarea"></textarea>
	</div>
</div>

<div class="form-actions form-wrapper" id="edit-actions">
	<input type="submit" id="pickup-submit" name="pickup-submit" value="Submit to Community Network" class="form-submit">
</div>
</div>
</form>  
</div>

  
  
</div>
  </div>
</div>
  </div>
              </div> <!-- /content -->
            
            <!-- Main page columns  -->
            

            <!-- Post-ontent -->
            
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
              <p><a href="http://oregonstate.edu/is">Information Services Home Page</a><br /><a href="http://oregonstate.edu/is/organization">Organization</a></p>
            </div>
            <div class="general-contact">
              <a href="http://oregonstate.edu/copyright">Copyright</a>
              &copy;2013              Oregon State University<br />
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

    <script>

		function hide_add(){
			adda = document.getElementById("add-item");
			adda.style.display = 'none';
		}
		function show_add(){
			adda = document.getElementById("add-item");
			adda.style.display = 'inline-block';
		}
		function item_description(sel, id){
			dv = document.getElementById("other_description_"+id);
			addb = document.getElementById("add-item");
			if(sel.value != ""){
				addb.style.display = 'inline-block';
			}
			else{
				addb.style.display = 'none';
			}
			if(sel.value === "Other"){
				dv.parentNode.style.display = 'block';
			}
			else{
				dv.parentNode.style.display = 'none';
			}
		}
		function need_returned(sel, id){
			dv = document.getElementById("need_returned_"+id);
  
			if(sel.value == "Other" || sel.value == "Computer Tower" || sel.value == "Hard drive" || sel.value == "Laptop"){
				dv.parentNode.style.display = 'block';
			}
			else{
				dv.parentNode.style.display = 'none';
			}
		}
		function validateTextField(textfieldInput)
		{
			if (textfieldInput.val() == "")
			{
				textfieldInput.parent().addClass("alert");
				return 1;
			}
			else
			{
				textfieldInput.parent().removeClass("alert");
				return 0;		
			}
		}
		function validateTextArea(textfieldInput)
		{
			if (textfieldInput.val() == "")
			{
				textfieldInput.parent().parent().addClass("alert");
				return 1;
			}
			else
			{
				textfieldInput.parent().parent().removeClass("alert");
				return 0;		
			}
		}
		function validateItems(numItems)
		{
			inc = 1;
			errs = 0;
			while( inc <= numItems){
				dv = document.getElementById("item_description_"+inc);
				if(dv.value === ""){
					dv.parentNode.classList.add("alert");
					errs++;
				}
				else{
					dv.parentNode.classList.remove("alert");
				}
				if(dv.value === "Other"){
				ndv = document.getElementById("other_description_"+inc);
					if(ndv.value === ""){
						ndv.parentNode.classList.add("alert");
						errs++;
					}
					else{
						ndv.parentNode.classList.remove("alert");
					}
				}
				inc++;
			}
			return errs;
		}
		jQuery(function($) {
			var items = 1;
			$('form#pickup-request-form').submit(function(event)
			{
				var numErrors = 0;					
				numErrors += validateTextField($('input#name'));
				numErrors += validateEmail($('input#email'));
				numErrors += validateTextField($('input#department'));
				numErrors += validateItems(items);
				numErrors += validateTextField($('input#number-of-items'));
				numErrors += validateTextField($('input#building-room'));
				
				if (numErrors == 0)
				{
					return true;
				}
				else
				{
					window.scrollTo(0, 0);
					return false;
				}
			});
			// END VALIDATION
			
			var moreItems = $('#more-items');
			$('#add-item').click(function() {
				items++;
				moreItems.append('<div id="item-'+items+'" class="form-item webform-component webform-component-select">'+
				'<div class="inline-blk">' +
				'<br>'+
					'<label for="item_description_'+items+'">Item Description</label>' +
					'<select id="item_description_'+items+'" onchange="item_description(item_description_'+items+', '+items+'); need_returned(item_description_'+items+', '+items+')" name="item_description_'+items+'" class="form-select item_description_'+items+'">' +
						'<option value="" selected="selected">--Select an option--</option>'+
						'<option value="Computer Tower">Computer Tower</option>'+
						'<option value="Monitor">Monitor</option>'+
						'<option value="Hard drive">Hard drive (internal or external)</option>'+
						'<option value="Keyboard Mouse">Keyboard or Mouse</option>'+
						'<option value="Docking Station">Docking Station</option>'+
						'<option value="Laptop">Laptop</option>'+
						'<option value="Computer Cables">Computer Cables</option>'+
						'<option value="Other">Other...</option>'+
					'</select>'+
				'</div>' +
				' ' +
				'<div class="inline-blk form-item webform-component webform-component-textfield">'+
					'<div class=other_description_'+items+'" style="display:none">'+
						'<label for="other_description_'+items+'">Other Description</label>'+
						'<input type="text" id="other_description_'+items+'" name="other_description_'+items+'" value="" size="70" class="required">'+
					'</div>'+
				'</div>'+
				' ' +
				'<div class="inline-blk form-item webform-component webform-component-select">' +
					'<label for="condition-'+items+'">Condition</label>' +
					'<select id="condition-'+items+'" name="condition-'+items+'" class="form-select">' +
						'<option value="New">New</option>' +
						'<option value="Good">Good</option>' +
						'<option value="Fair">Fair</option>' +
						'<option value="Needs Repairs">Needs Repairs</option>' +
						'<option value="Salvage">Salvage</option>' +
					'</select>' +
				'</div>' +
				' '+
				'<div class="inline-blk form-item webform-component webform-component-select">' +
					'<div class="need_returned_'+items+'" style="display:none">' +
						'<input type="radio" id="need_returned_'+items+'" name="need_returned_'+items+'" value="Yes" class="required">  I would like this item returned to me after it has been wiped.<br>' +
						'<input type="radio" id="need_returned_'+items+'" name="need_returned_'+items+'" value="No" class="required" checked>  I do not need this item back. Community Network can re-use item as needed and/or send to Surplus.<br>' +
					'</div>' +
				'</div></div>');
				if (items > 1) {
					$('#remove-item').css("display", "inline-block");
				}
			});
			$('#remove-item').click(function() {
				moreItems.find('#item-' + items).remove();
				items--;
				if (items === 1) {
					$('#remove-item').hide();
				}
			})
		});
    

    </script>

	<!-- /page-wrapper -->
  </body>
</html>