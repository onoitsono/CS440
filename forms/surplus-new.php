<?php
	include "acctfunctions.inc";
	define('NUMROWS', 30);

	if (isset($_POST['pickup-submit'])) {
		$name = htmlspecialchars($_POST['name']);
		$firstname = htmlspecialchars($_POST['first_name']);
		$department = htmlspecialchars($_POST['department']);
		$email = htmlspecialchars($_POST['email']);
		$requestor_login = htmlspecialchars($_POST['requestor_login']);
		$numberOfItems = 0;
		$buildingRoom = htmlspecialchars($_POST['building-room']);
		$notes = htmlspecialchars($_POST['notes']);
		$items = "";
		$itemDescriptions = $_POST['Item_Description'];
		$inventoryIDs = $_POST['Inventory_ID'];
		$Serial_Nums = $_POST['Serial_Number'];
		$Item_Types = $_POST['Item_Type'];
		$Return_Types = $_POST['Item_Return_Type'];
			 
		while ($itemDescriptions[$numberOfItems] != "") {
			$items .= "<strong>Item Description: </strong>$itemDescriptions[$numberOfItems]<br>";
			if ($inventoryIDs[$numberOfItems] != ""){
				$items .= "<strong>Inventory ID: </strong>$inventoryIDs[$numberOfItems]<br>";
			}
			if ($Serial_Nums[$numberOfItems] != "" ){
				$items .= "<strong>Serial Number: </strong>$Serial_Nums[$numberOfItems]<br>";
			}
			if ($Item_Types[$numberOfItems] != ""){
				$items .= "<strong>Item Type: </strong>$Item_Types[$numberOfItems]<br>";
			}
			if ($Return_Types[$numberOfItems] != ""){
				$needReturned = $Return_Types[$numberOfItems];
				if($needReturned == "Yes"){
					$items .= "<strong>Need Returned: </strong><font color = \"red\">$needReturned</font><br><br>";
				}
				else{
					$items .= "<strong>Need Returned: </strong>$needReturned<br><br>";
				}
			}
			$numberOfItems++;
		}

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

		$to2 = $email;
		
		$headers2 = "MIME-Version: 1.0\r\n";
		$headers2 .= 'From: "Community Network" <cn.help@oregonstate.edu>'."\r\n";
		$headers2 .= "Content-Type: text/html; charset='iso-8859-1'";
		$headers2 .=	"Content-Transfer-Encoding: 7bit\r\n\r\n";
		
		$cusout = "$firstname,<br><br>Thank you for submitting your Hardware Pick-Up Request to The Community Network.<br><br>
		We will contact you soon to schedule an appointment for a technician to pick up the items that have been submitted.  Please label all items so it is clear what we are picking up and what we are not.<br><br>
		Thank You,<br><br>
		Your Community Network Support Team<br>
		Cn.help@oregonstate.edu<br>
		541-737-8788 Option 2<br>";
		
		mail($to2, $subject, $cusout, $headers2);
		
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
		@import url("./css/surplus.css");
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
<script type="text/javascript" src="./javascript/underscore-min.js"></script>
<script type="text/javascript" src="./javascript/jquery.min.js"></script>
<script type="text/javascript" src="./javascript/jquery-ui.min.js"></script>
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
<script src="./javascript/surplus.js"></script>
<script src="newacctscripts.js"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery.extend(Drupal.settings, {"basePath":"\u002Fis\u002F", "pathPrefix":"", "ajaxPageState":{"theme":"osu_standard", "theme_token":"0UKtC__Un82Y6ZkjnX7DDIx17D96L1wr0tgOwHgRSXM", "js":{"misc\u002Fjquery.js":1, "misc\u002Fjquery.once.js":1, "misc\u002Fdrupal.js":1, "misc\u002Fjquery.cookie.js":1, "misc\u002Fjquery.form.js":1, "misc\u002Fform.js":1, "misc\u002Fajax.js":1, "sites\u002Fdefault\u002Fmodules\u002Fis_features\u002Fis_features.js":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Flive_feeds.js":1, "sites\u002Fall\u002Fmodules\u002Fosu_features\u002Fmultimenus\u002Fjs\u002Fmultimenus.js":1, "misc\u002Fprogress.js":1, "sites\u002Fall\u002Fmodules\u002Flightbox2\u002Fjs\u002Flightbox.js":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fsuperfish\u002Fjs\u002Fsuperfish.js":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fsuperfish\u002Fjs\u002Fjquery.bgiframe.min.js":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fsuperfish\u002Fjs\u002Fjquery.hoverIntent.minified.js":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fnice_menus.js":1, "sites\u002Fall\u002Fmodules\u002Fcaptcha\u002Fcaptcha.js":1, "sites\u002Fall\u002Fmodules\u002Fviews\u002Fjs\u002Fbase.js":1, "sites\u002Fall\u002Fmodules\u002Fviews\u002Fjs\u002Fajax_view.js":1, "misc\u002Ftextarea.js":1, "misc\u002Fcollapse.js":1, "sites\u002Fall\u002Fmodules\u002Fwebform\u002Fjs\u002Fwebform.js":1, "sites\u002Fall\u002Fmodules\u002Fquicktabs\u002Fjs\u002Fquicktabs.js":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fjs\u002Ftimers.js":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fjs\u002Fmenus.js":1}, "css":{"modules\u002Fsystem\u002Fsystem.base.css":1, "modules\u002Fsystem\u002Fsystem.menus.css":1, "modules\u002Fsystem\u002Fsystem.messages.css":1, "modules\u002Fsystem\u002Fsystem.theme.css":1, "modules\u002Faggregator\u002Faggregator.css":1, "modules\u002Fbook\u002Fbook.css":1, "sites\u002Fall\u002Fmodules\u002Fdate\u002Fdate_api\u002Fdate.css":1, "sites\u002Fall\u002Fmodules\u002Fdate\u002Fdate_popup\u002Fthemes\u002Fdatepicker.1.7.css":1, "modules\u002Ffield\u002Ftheme\u002Ffield.css":1, "sites\u002Fdefault\u002Fmodules\u002Fis_features\u002Fis_features.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Flive_feeds.css":1, "sites\u002Fall\u002Fmodules\u002Fosu_features\u002Fmultimenus\u002Fcss\u002Fmultimenus.css":1, "modules\u002Fnode\u002Fnode.css":1, "sites\u002Fall\u002Fmodules\u002Fosu_search\u002Fosu_search.css":1, "sites\u002Fall\u002Fmodules\u002Fosu_top_hat\u002Fosu_top_hat.css":1, "modules\u002Fpoll\u002Fpoll.css":1, "sites\u002Fall\u002Fmodules\u002Fosu_features\u002Frelated_content_tab\u002Frelated_content_tab.css":1, "modules\u002Fuser\u002Fuser.css":1, "sites\u002Fall\u002Fmodules\u002Fviews\u002Fcss\u002Fviews.css":1, "sites\u002Fall\u002Fmodules\u002Fctools\u002Fcss\u002Fctools.css":1, "sites\u002Fall\u002Fmodules\u002Flightbox2\u002Fcss\u002Flightbox.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Fplugins\u002Fosu_announcements\u002Fosu_announcements.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Fplugins\u002Fosu_events\u002Fosu_events.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Fplugins\u002Fosu_news\u002Fosu_news.css":1, "sites\u002Fall\u002Fmodules\u002Flive_feeds\u002Fplugins\u002Fosu_wordpress\u002Fosu_wordpress.css":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fnice_menus.css":1, "sites\u002Fall\u002Fmodules\u002Fnice_menus\u002Fnice_menus_default.css":1, "sites\u002Fall\u002Fmodules\u002Fbiblio\u002Fbiblio.css":1, "sites\u002Fall\u002Fmodules\u002Fwebform\u002Fcss\u002Fwebform.css":1, "sites\u002Fall\u002Fmodules\u002Fquicktabs\u002Fcss\u002Fquicktabs.css":1, "sites\u002Fall\u002Fmodules\u002Fquicktabs\u002Fquicktabs_tabstyles\u002Ftabstyles\u002Fbasic\u002Fbasic.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fcss\u002Fvariants\u002Fclassic\u002Fclassic.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fbootstrap\u002Fcss\u002Fbootstrap.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fcss\u002Fmain.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fbootstrap\u002Fcss\u002Fresponsive.css":1, "sites\u002Fall\u002Fthemes\u002Fosu_standard\u002Fcss\u002Fmain-responsive.css":1}}, "jcarousel":{"ajaxPath":"\u002Fis\u002Fjcarousel\u002Fajax\u002Fviews"}, "lightbox2":{"rtl":0, "file_path":"\u002Fis\u002F(\u005Cw\u005Cw\u002F)public:\u002F", "default_image":"\u002Fis\u002Fsites\u002Fall\u002Fmodules\u002Flightbox2\u002Fimages\u002Fbrokenimage.jpg", "border_size":10, "font_color":"000", "box_color":"fff", "top_position":"", "overlay_opacity":"0.8", "overlay_color":"000", "disable_close_click":1, "resize_sequence":0, "resize_speed":400, "fade_in_speed":400, "slide_down_speed":600, "use_alt_layout":0, "disable_resize":0, "disable_zoom":0, "force_show_nav":0, "show_caption":1, "loop_items":0, "node_link_text":"View Image Details", "node_link_target":0, "image_count":"Image !current of !total", "video_count":"Video !current of !total", "page_count":"Page !current of !total", "lite_press_x_close":"press \u003Ca href=\u0022#\u0022 onclick=\u0022hideLightbox(); return FALSE;\u0022\u003E\u003Ckbd\u003Ex\u003C\u002Fkbd\u003E\u003C\u002Fa\u003E to close", "download_link_text":"", "enable_login":false, "enable_contact":false, "keys_close":"c x 27", "keys_previous":"p 37", "keys_next":"n 39", "keys_zoom":"z", "keys_play_pause":"32", "display_image_size":"original", "image_node_sizes":"()", "trigger_lightbox_classes":"", "trigger_lightbox_group_classes":"", "trigger_slideshow_classes":"", "trigger_lightframe_classes":"", "trigger_lightframe_group_classes":"", "custom_class_handler":0, "custom_trigger_classes":"", "disable_for_gallery_lists":true, "disable_for_acidfree_gallery_lists":true, "enable_acidfree_videos":true, "slideshow_interval":5000, "slideshow_automatic_start":true, "slideshow_automatic_exit":true, "show_play_pause":true, "pause_on_next_click":false, "pause_on_previous_click":true, "loop_slides":false, "iframe_width":600, "iframe_height":400, "iframe_border":1, "enable_video":0}, "live_feeds":{"osu_announcements":{"name":"OSU Announcements", "description":"A plugin for Live Feeds to parse the RSS from the OSU Announcements", "title":"OSU Announcements", "url":"http:\u002F\u002Foregonstate.edu\u002Fcws\u002Fannouncement\u002Frss.xml"}, "osu_events":{"name":"OSU Events", "description":"A plugin for Live Feeds to parse the RSS from the OSU Events Calendar", "title":"OSU Events", "url":"http:\u002F\u002Fcalendar.oregonstate.edu\u002Ftoday+60\u002Flist\u002Fwebtrain\u002Frss20.xml"}, "osu_news":{"name":"OSU News", "description":"A plugin for Live Feeds  to parse the RSS from the OSU News site", "title":"OSU News", "url":"http:\u002F\u002Foregonstate.edu\u002Fua\u002Fncs\u002Freleases\u002Ffeed\u002F"}, "osu_wordpress":{"name":"OSU WordPress", "description":"A plugin for Live Feeds to parse the RSS from OSU WordPress sites", "title":"OSU WordPress", "url":"http:\u002F\u002Fblogs.oregonstate.edu\u002Ffeed\u002Frss2"}}, "nice_menus_options":{"delay":800, "speed":1}, "views":{"ajax_path":"\u002Fis\u002Fviews\u002Fajax", "ajaxViews":{"views_dom_id:7f31fa3311dae8bc110d3e81a812e8aa":{"view_name":"feature_story", "view_display_id":"block_1", "view_args":"", "view_path":"node\u002F339", "view_base_path":"features", "view_dom_id":"7f31fa3311dae8bc110d3e81a812e8aa", "pager_element":0}}}, "quicktabs":{"qt_help_quicktab":{"name":"help_quicktab", "tabs":[ {"bid":"block_delta_12", "hide_title":1}, {"bid":"block_delta_13", "hide_title":1}, {"bid":"block_delta_14", "hide_title":1} ], "nice_menus_options":{"delay":800, "speed":1}}}});
//--><!]]>
</script>
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
	
<form class='webform-client-form' enctype='multipart/form-data' action='surplus-new.php' method='post' id='pickupRequestForm'  accept-charset='UTF-8' autocomplete='off'>

<?php
	//get user account info
	$reqinfo = get_userinfo($_SERVER['AUTH_USER'], "sAMAccountName"); // LDAP query for requestor info
	$drn = $reqinfo['displayname']; // returns either nothing or "display name" depending on whether there's a value for the displayname; drn stands for "default requestor name"
    $dre = $reqinfo['mail']; // default requestor email
	$first_name = $reqinfo['givenname'];
    $reqmanagerinfo = get_userinfo($reqinfo['manager'], "distinguishedName"); // requestor's manager
    $manager_email = $reqmanagerinfo['mail']; // requestor's manager's email
    $requestor_department = $reqinfo['department']; // requestor's department

	
	// Hidden fields
	echo '<input type="hidden" id="requestor_login" name="requestor_login" value="' . $_SERVER['AUTH_USER'] . '">';
	echo '<input type="hidden" id="first_name" name="first_name" value="' . $first_name . '">';
?>

<div class="form-item webform-component webform-component-textfield">
	<label for="name">Name<span class="form-required" title="This field is required.">*</span></label>
	<?php echo '<input type="text" id="name" name="name" value="'.$drn.'" size="70" class="requiredField">';?>
</div>

<div class="form-item webform-component webform-component-textfield">
	<label for="department">Department<span class="form-required" title="This field is required.">*</span></label>
	<?php echo '<input type="text" id="department" name="department" value="'.$requestor_department.'" size="70" class="requiredField">';?>
</div>

<!--<div class="form-item webform-component webform-component-textfield">
	<label for="email">Email<span class="form-required" title="This field is required.">*</span></label>
	<?php //echo '<input type="hidden" id="email" name="email" value="" size="70" class="email-autocomplete">';
			echo '<input type="hidden" id="email" name="email" value=" ' .$dre. ' " size="70" >';
	?>
</div>-->

<div class="form-item webform-component webform-component-select"> 
		  <!-- ITEMS -->
	<div class='sectionTable' id='sectionItems'>
	<div class='sectionHeading'>Items</div>

	<select class='selector input_id_Item_Row' id='selectItemType'>
<?php
  $defaultitemlist = array(array('Computer', 'Tower/Desktop'),
                           array('Computer', 'Laptop'), 
                           array('Accessory', 'Keyboard or Mouse'),
                           array('Peripheral', 'Docking Station'), 
                           array('Peripheral', 'Monitor'),
                           array('Accessory', 'Cables'), 
                           array('Peripheral', 'Hard drive (Internal or External)'));

  foreach ($defaultitemlist as $defaultitem) {
    $category = $defaultitem[0];
    $description = $defaultitem[1];
    $label = $category . ' - ' . $description;
?>
      <option category="<?php echo $category; ?>" desc="<?php echo $description; ?>" value="<?php echo $description; ?>"><?php echo $label; ?></option>
<?php } ?>
    </select>
		<input type='button' class='input_id_Item_Row' onclick="addItemRow(); return false" value="Add">
		<input type='button' class='input_id_Item_Row' style='float:right' onclick="AddToList('id_Item_Row', 'Item_Return_Type', '', 'Item_Description', '', 'Inventory_ID', '', 'Serial_Number', ''); return false" value="Add Custom Item">
		<br><br>

		<table class='itemlisttable' border='0' cellspacing='0' style='width:100%' id='itemsTable'>
			  <tr>	
					<th width='8%'><a class="hasTooltip">Return</a><span>
						<ul>Yes means that you would like the device returned to you after being wiped.</ul>
						<ul>No means that we can either re-purpose the device, or send it to surplus.</ul>
						<ul>Devices that cannot be wiped cannot be returned to you.</ul>
						</span></th>
					<th width='37%'><a class="hasTooltip">Description</a><span>Enter a description or use the Items dropdown to select a pre-made item from the list.</span></th>
					<th width='15%'><a class="hasTooltip">Inventory ID</a><span>If the device has an inventory ID number on it, please fill it in as it will help us to identify the device in our system.</span></th>
					<th width='20%'><a class="hasTooltip">Serial Number</a><span>For devices that have a serial number, please enter the number in the field below.</span></th>
					<!--<th width='14%'>Item Type</th>-->
					<th width='6%'><a class="hasTooltip"><img size='100%' src='images/delete16.png'></a><span>Click on the X next to an item to remove it from the list.</span></th>
			  </tr>

		<?php
		  for ($pc = 0; $pc < NUMROWS; ++$pc) {
		?>
			  <tr style='display:none;' id="id_Item_Row<?php echo $pc;?>">
				<td style='width:8%'>
				  <select class='selector' style='width:100%' id="id_Item_Return_Type_<?php echo $pc;?>" name='Item_Return_Type[]'>
					<option value="">&nbsp;</option>
					<option value="Yes">Yes, return to me.</option>
					<option value="No">Don't return to me.</option>
				  </select>
				</td>
				<td width='37%'><input type='text' style='width:95%' id="id_Item_Description_<?php echo $pc;?>" name='Item_Description[]' maxlength='54' class='requiredField'></td>
				<td width='15%'><input type='text' style='width:90%' id="id_Inventory_ID_<?php echo $pc;?>" name='Inventory_ID[]' maxlength='30'></td>
				<td width='20%'><input type='text' style='width:95%' id="id_Serial_Number_<?php echo $pc;?>" name='Serial_Number[]' maxlength='30'></td>
				<!--<td width='14%'><input type='text' style='width:90%' id="id_Item_Type_<?php echo $pc;?>" name='Item_Type[]' maxlength='30'></td>-->
				<td width='6%'><center><img class="removeItem" style='width:50%' src='images/delete16.png' onclick="RemoveFromList('id_Item_Row', <?php echo $pc;?>,'Item_Return_Type','Item_Description','Inventory_ID','Serial_Number')"/><center></td>
			  </tr>
			  
		<?php } ?>
		</table>
	</div>


</div>


<div class="form-item webform-component webform-component-textfield">
	<label for="building-room">Pick up location (Building & Room):</label>
	<input type="text" id="building-room" name="building-room" value="" size="70" class='requiredField'>
</div>
<div class="form-item webform-component webform-component-textfield">
	<label for="thing1">All highlighted/pink fields are required. Please make sure to check that no fields are pink after pressing submit.</label>
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


		
		jQuery(function($) {
			jQuery('form#pickupRequestForm').submit(function(event)
			{
				var numErrors = 0;					
				numErrors += validateTextFields(jQuery('input#name'));
				numErrors += validateEmails(jQuery('input#email'));
				numErrors += validateTextFields(jQuery('input#department'));
				numErrors += validateItems();
				numErrors += validateTextFields(jQuery('input#building-room'));
				
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

		});
    

    </script>

	<!-- /page-wrapper -->
  </body>
</html>