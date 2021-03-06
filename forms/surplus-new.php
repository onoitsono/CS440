<?php
	include "acctfunctions.inc";
	define('NUMROWS', 30);
	include "ajax-example.php";
	
?>

<!doctype html>
<html class="classic" lang="en">

<head>
  <meta http-equiv='X-UA-Compatible' content='IE=10' />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="http://oregonstate.edu/is/sites/all/themes/osu_standard/favicon.ico" type="image/vnd.microsoft.icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>CS 440 | NOAA Weather Database</title>
 
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
    <h1><a href='http://oregonstate.edu/is/tss/cn/online-forms'>NOAA Weather Database</h1>
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
            <h2 class="title" id="page-title">NOAA Database Request</h2>
              
              
              <div id='content' >
                <a name="main-content"></a>
                  <div class="region region-content">
    <div id="block-system-main" class="block block-system">

    
  <div class="content">
    <div id="node-339" class="node node-webform clearfix">
	
  
  <div class="content">

	<?php echo $message; ?>

    <p class="descr-text">Please fill out the form below with your request from the database.
    </p>
    <p class="descr-text">
    	<strong>Function Descriptions:</strong><br>
    	<table style="background-color:#fff;width:45%">
    		<tr style="vertical-align:top;">
    			<td>
    				<ul>
    					<li>Temperatures (Max, Min, and Average): Returns highest, lowest, or average temperature for location (and for a date range, if specified.)</li>
    					<li>Find Snow Days: Will return all records with recorded snowfall (for specified date range, if entered.)</li>
    					<li>All Info: Returns station ID, timestamp, temperatures, hourly rainfall, windspeed, visibility, and snow depth for specified date range.</li>
    					<li>Summary: Returns textual summary of the provided date range.</li>
    					<li>Max/Min Temp for State: Returns highest or lowest temperature for all locations in database.</li>
    					<li>Custom: run custom searches on locations, either on all the data or for a specified date range.</li>
    				</ul>
    			</td>
    		</tr>
    	</table>
    </p>
	
	<form name='weatherform' >
		<div id="queries">
			<div id="queryoptions" style="display:inline-block;" >
				<label for="queryoption">Query options:</label>
				<select onchange="javascript:queryoption1()" id="queryoption">
					<option value="">Please select an option</option>
					<option value="max">Max Temperature</option>
					<option value="min">Min Temperature</option>
					<option value="avg">Average Temperature</option>
					<option value="snow">Find Snow Days</option>
					<option value="datebased">All Information for Range (choose dates below)</option>
					<option value="summary">Summary for Date Range</option>
					<option disabled="disabled">----</option>
					<option value="maxstate">Max Temperature for State</option>
					<option value="minstate">Min Temperature for State</option>
					<option disabled="disabled">----</option>
					<option value="custom">Custom Query</option>
				</select>
			</div>
			<div id="location_options" class="showtoggle" >
				<?php
					// Gets locations to display/select
					$qry_result = get_locations();
					echo "<label for='location'>Locations:</label><select id='location'>";
					while($row = mysql_fetch_array($qry_result)){
						echo "<option value=$row[table_name]>$row[location_name]</option>";
					}
					echo "</select>";
				?>
			</div>
			<div id="custom" class="showtoggle">
				<label for="customsearch">Find</label> 
				<select id="customsearch">
					<option value="temp">Temperature (F)</option>
					<option value="rain">Hourly Rainfall (in.)</option>
					<option value="snow">Snow Depth (in.)</option>
					<option value="wind">Wind Speed (mph)</option>
					<option value="visb">Visibility (miles)</option>
				</select>
				<select id="minormax">
					<option value="max">less than</option>
					<option value="min">greater than</option>
					<option value="equal">equal to</option>
				</select>
				<input type='text' id='customval' /> for the following date range (if left blank, will search all records):
			</div>
			<div id="dates" >
				<label for="date">If no start or end date is entered, the query will run on all of the data for the location.</label>
				<br />
				Start Date: <input type="text" id="startdate" name="startdate" value="" size="35" maxlength="128" class="form-text required datepicker " /><br />
				End Date: <input type="text" id="enddate" name="enddate" value="" size="35" maxlength="128" class="form-text required datepicker " /><br />
			</div>
		</div>
		




<!-- custom search functionality -->





<!--
<form class='webform-client-form' enctype='multipart/form-data' action='surplus-new.php' method='post' id='pickupRequestForm'  accept-charset='UTF-8' autocomplete='off'>

<!~~ 
<?php
	/*//get user account info
	$reqinfo = get_userinfo($_SERVER['AUTH_USER'], "sAMAccountName"); // LDAP query for requestor info
	$drn = $reqinfo['displayname']; // returns either nothing or "display name" depending on whether there's a value for the displayname; drn stands for "default requestor name"
    $dre = $reqinfo['mail']; // default requestor email
	$first_name = $reqinfo['givenname'];
    $reqmanagerinfo = get_userinfo($reqinfo['manager'], "distinguishedName"); // requestor's manager
    $manager_email = $reqmanagerinfo['mail']; // requestor's manager's email
    $requestor_department = $reqinfo['department']; // requestor's department

	
	// Hidden fields
	echo '<input type="hidden" id="requestor_login" name="requestor_login" value="' . $_SERVER['AUTH_USER'] . '">';
	echo '<input type="hidden" id="first_name" name="first_name" value="' . $first_name . '">';*/
?>
 ~~>

<div class="form-item webform-component webform-component-textfield">
	<label for="name">Name<span class="form-required" title="This field is required.">*</span></label>


<!~~<div class="form-item webform-component webform-component-textfield">
	<label for="email">Email<span class="form-required" title="This field is required.">*</span></label>
	<?php //echo '<input type="hidden" id="email" name="email" value="" size="70" class="email-autocomplete">';
			echo '<input type="hidden" id="email" name="email" value=" ' .$dre. ' " size="70" >';
	?>
</div>~~>

<div class="form-item webform-component webform-component-select"> 
		  <!~~ ITEMS ~~>
	<div class='sectionTable' id='sectionItems'>
	<div class='sectionHeading'>Weather</div>

	<select class='selector input_id_Item_Row' id='selectItemType'>
<?php
  $defaultitemlist = array(array('Temperature', 'Max'),
                           array('Temperature', 'Min'), 
                           array('Temperature', 'Average'));

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

		 <!~~ 
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
					<!~~ <th width='14%'>Item Type</th> ~~>
					<th width='6%'><a class="hasTooltip"><img size='100%' src='images/delete16.png'></a><span>Click on the X next to an item to remove it from the list.</span></th>
			  </tr>

		<?php
		  for ($pc = 0; $pc < NUMROWS; ++$pc) {
		?>
			  <tr style='display:none;' id="id_Item_Row<?php echo $pc;?>">
				<!~~<td style='width:8%'>
				  <select class='selector' style='width:100%' id="id_Item_Return_Type_<?php echo $pc;?>" name='Item_Return_Type[]'>
					<option value="">&nbsp;</option>
					<option value="Yes">Yes, return to me.</option>
					<option value="No">Don't return to me.</option>
				  </select>
				</td>~~>
				<td width='37%'><input type='text' style='width:95%' id="id_Item_Description_<?php echo $pc;?>" name='Item_Description[]' maxlength='54' class='requiredField'></td>
				<td width='15%'><input type='text' style='width:90%' id="id_Inventory_ID_<?php echo $pc;?>" name='Inventory_ID[]' maxlength='30'></td>
				<td width='20%'><input type='text' style='width:95%' id="id_Serial_Number_<?php echo $pc;?>" name='Serial_Number[]' maxlength='30'></td>
				<!~~<td width='14%'><input type='text' style='width:90%' id="id_Item_Type_<?php echo $pc;?>" name='Item_Type[]' maxlength='30'></td>~~>
				<td width='6%'><center><img class="removeItem" style='width:50%' src='images/delete16.png' onclick="RemoveFromList('id_Item_Row', <?php echo $pc;?>,'Item_Return_Type','Item_Description','Inventory_ID','Serial_Number')"/><center></td>
			  </tr>
			  
		<?php } ?>
		</table>
 ~~>
	</div>


</div>

 -->


<!-- <div class="form-item webform-component webform-component-textfield">
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
</div> -->


<div class="form-actions form-wrapper" id="edit-actions">

<script language="javascript" type="text/javascript">
function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
      var ajaxDisplay = document.getElementById('ajaxDiv');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 var location = document.getElementById('location').value;
//  alert("location");
 var customval = document.getElementById('customval').value;
// alert("customval");
 var queryoption = document.getElementById('queryoption').value;
// alert("queryoption");
 var startdate = document.getElementById('startdate').value;
// alert("startdate");
 var enddate = document.getElementById('enddate').value;
// alert("enddate");
 var customsearch = document.getElementById('customsearch').value;
// alert("customsearch");
 var minormax = document.getElementById('minormax').value;
// alert("minormax");
  
 var queryString = "?location=" + location ;
  //alert(queryString);
 queryString +=  "&customval=" + customval + "&queryoption=" + queryoption;
 queryString += "&startdate=" + startdate + "&enddate=" + enddate;
 queryString +=  "&customsearch=" + customsearch;
 queryString += "&minormax=" + minormax;
 ajaxRequest.open("GET", "ajax-example.php" + 
                              queryString, true);
 ajaxRequest.send(null); 
 }
	</script>
	<input type="button" onclick='ajaxFunction()' value="Submit SQL Query" >
	<!--class="form-submit"id="pickup-submit" name="pickup-submit" -->
</div>
</div>
</form>  
<div id='ajaxDiv'>Your result will display here</div>
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
              <p><a href="http://oregonstate.edu/">Information Services Home Page</a><br /><a href="http://eecs.oregonstate.edu/">Oregon State School of EECS</a></p>
            </div>
            <div class="general-contact">
              <a href="http://oregonstate.edu/copyright">Copyright</a>
              &copy;2014              Oregon State University<br />
             <!-- <a href="http://oregonstate.edu/disclaimer">Disclaimer</a> -->
            </div>
             <div class="social-media"></div>
          </div>
          <!-- <div class='span4'>
            <h3>Community Network</h3>
            <div class="specific-contact">
              <p><a href="http://oregonstate.edu/is/tss/cn">Community Network Home Page</a><br />
              541-737-8787</p>
            </div>
          </div> -->
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