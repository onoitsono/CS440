<?php
	include "acctfunctions.inc";
?>

<!DOCTYPE HTML>
<!--[if lte IE 7]> <html lang="en" class="ie ie7 classic"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie ie8 classic"> <![endif]-->
<!--[if gt IE 8]><!--><html class="classic" lang="en"><!--<![endif]-->

<head>
  <meta http-equiv='X-UA-Compatible' content='IE=10' />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="http://oregonstate.edu/is/sites/all/themes/osu_standard/favicon.ico" type="image/vnd.microsoft.icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Account Removal | Community Network</title>

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
		div.account-menu, div.account-menu-2, div.account-menu-3, 
		div.account-menu-4, div.account-menu-5, div.account-menu-6,
		div#device-type-help, div#comp-warning
		{
			display:none;
		}
		div#email-2, div#email-3, div#email-4, div#p-delete-2, div#p-delete-3
		{
			display:none;
		}
		div.email-rmv-descr, div.p-delete-descr
		{
			width:50%;
		}
		div#comp-warning
		{
			margin:8px 35px 8px 14px;
		}
		div.form-item
		{
			padding:8px 35px 8px 14px;
			margin:0px;
		}
		div.laptop-css, div.desktop-css
		{
			margin-left:15px;
			width:150px;
		}
		div.laptop-accessories, div.desktop-accessories
		{
			padding-left:14px;
		}
		div.comp-names
		{
			margin:0px;
			padding:0px;
			margin-top:1.5em;
			margin-bottom:1.5em;
			font-size:200%;
			font-weight:bold;
			color:#c34500;
		}
		label#add-comments, label#p-delete, label#email-rmv, div.rmv-acct, div.user-info, div.main-select .form-title, div.form-title, label.form-title
		{
			font-weight:bold;
		}
		div.help-info
		{
			background-color:#F2F2F2;
			padding:14px 28px 14px 24px;
			border-bottom:1px solid #E0E0E0;
			border-left:1px solid #E0E0E0;
		}
		div.help-info tr, div.help-info td
		{
			border-style:none;
			border-width:0px;
		}
		select
		{	
			height:30px;
		}
		select.accessories
		{
			height:25px;
			font-size:80%;
			margin:0px;
			padding:0px;
		}
		.acc1
		{
			margin-top:0.5em;
			margin-bottom:0px;
			padding:0px;
			cursor:default;
			font-size:14px;
		}
		input.acc1
		{
			margin-bottom:3px;
		}
		div.alert
		{
			color:red;
			background-color:rgba(255,102,51,0.4);
		}
		.toggle
		{
			padding:8px 35px 8px 14px;
			display:none;
			margin-bottom:0.5em;
			width:140px;
			cursor:hand; cursor:pointer;
			text-decoration:underline;
			color:#c34500;
		}
		.toggle-click
		{
			color:#9d601e;
		}
		.toggle-hover
		{
			color:#615042;
		}
		th {font-weight:normal;}
		.table-display {display:table-row;}
		.table-select-hide {display:none;}
		table.display-table tr {display:none;}
		// changes line 744 in http://oregonstate.edu/is/sites/all/themes/osu_standard/bootstrap/css/bootstrap.css
		
		.autocomplete { border: 1px solid #999; background: #FFF; cursor: default; overflow: auto;}
		.autocomplete-suggestions { border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; }
		.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
		.autocomplete-selected { background: #F0F0F0; }
		.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }

		#applications-list {
		    position:absolute;
			z-index: 9999999;
		    width: 400px;
		    background: #EEEFEB;
		    padding: 10px;
		    color: #000000;
		    border: 1px solid #4D4F53;
		    margin: 0px;
		    -webkit-box-shadow: 0px 0px 5px 0px rgba(164, 164, 164, 1);
		    box-shadow: 0px 0px 5px 0px rgba(164, 164, 164, 1);
		}
		#applications-list h2
		{
		    background-color: #4D4F53;
		    color:  #E3E5DD;
		    font-size: 14px;
		    display: block;
		    width: 100%;
		    margin: -10px 0px 8px -10px;
		    padding: 5px 10px;
		}
		#content p.email-removal, #content p.p-removal
		{
			padding: 0px;
			font-size: 12px;
			line-height: 20px;
			margin-bottom: 8px;
		}
		label.email-rmv-2, label
		{
			margin:0px;
			font-size: 14px;
		}
		textarea#add-comments, textarea#p-delete-2
		{
			width:400px;
			height:80px;
		}
		div#success
		{
			font-weight: bold;
			font-size: 20px;
			width: 400px;
			text-align: center;
		}
	
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
    <h1><a href='http://oregonstate.edu/is/tss/cn/online-forms'>Community Network Forms</a></h1>
  </div>
 
    
    <!-- Messages and breadcrumbs -->
    <div id="messages" style="margin-top:7px;">
      <h2 class="element-invisible">You are here</h2><div class="breadcrumb"><a href="http://oregonstate.edu/is/tss/cn">Community Network</a> &#187; <a href="http://oregonstate.edu/is/tss/cn/online-forms">CN Account Change Forms</a></div>    </div> <!-- messages -->


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
            <h2 class="title" id="page-title">Request to Remove CN Account</h2>
              
              
              <div id='content' >
                <a name="main-content"></a>
                  <div class="region region-content">
    <div id="block-system-main" class="block block-system">

    
  <div class="content">
    <div id="node-339" class="node node-webform clearfix">
	
  
<div class="content">



<p class="descr-text" style="font-size:12px">Please fill out the form and check any relevant fields.</p>  

<form class="webform-client-form" enctype="multipart/form-data" action="acctsubmit.php" method="post" id="account-removal" accept-charset="UTF-8">

<?php
	//get user account info
	
	$usercheck = str_replace("/","\\",$_SERVER['AUTH_USER']);
	$reqinfo = get_userinfo($_SERVER['AUTH_USER'], "sAMAccountName"); // LDAP query for requestor info
	$drn = $reqinfo['displayname']; // returns either nothing or "display name" depending on whether there's a value for the displayname; drn stands for "default requestor name"
    $dre = $reqinfo['mail']; // default requestor email
    $reqmanagerinfo = get_userinfo($reqinfo['manager'], "distinguishedName"); // requestor's manager
    $manager_email = $reqmanagerinfo['mail']; // requestor's manager's email
    $requestor_department = $reqinfo['department']; // requestor's department
	
	// put info into hidden fields
	echo '<input type="hidden" name="requestor-mail" value="' . $dre . '">';
	echo '<input type="hidden" name="requestor-name" value="' . $drn . '">';
	echo '<input type="hidden" name="requestor-login" value="' .$_SERVER['AUTH_USER']. '">';
?>

	<div class="rmv-acct">
	
		<!-- TAKEN OUT BECAUSE WE DON'T WANT PEOPLE TO BE ABLE TO PRETEND TO BE OTHER PEOPLE
		
		<div class="form-item webform-component webform-component-textfield" style="display:none">
			<label class="form-title" for="rq-email">Requestor's Email Address:<span class="form-required" title="This field is required.">*</span></label>
			<input type="text" id="rq-email" name="rq-email" value="" size="70" class="required email-autocomplete">
		</div>
		-->
		<div id="t-acct" class="form-item webform-component webform-component-textfield">
			<label class="form-title" for="acct">Account to Terminate:<span class="form-required" title="This field is required.">*</span></label>
			<input type="text" id="acct" name="acct" value="" size="70" class="required email-autocomplete-special">
		</div>
		<div class="form-item webform-component webform-component-textfield">
			<label class="form-title" for="dp-super-email">Departing Employee's Supervisor's Email Address:<span class="form-required" title="This field is required.">*</span></label>
			<input type="text" id="dp-super-email" name="dp-super-email" value="" size="70" class="required email-autocomplete">
		</div>
		<div class="form-item webform-component webform-component-textfield">
			<label class="form-title" for="dp-dpt">Departing Employee's Department:<span class="form-required" title="This field is required.">*</span></label>
			<input type="text" id="dp-dpt" name="dp-dpt" value="" size="70" class="required dept-autocomplete">
		</div>
		<div class="form-item webform-component webform-component-textfield">
			<label class="form-title" for="date">Date to close account:<span class="form-required" title="This field is required.">*</span></label>
			<input type="text" id="date" name="date" value="" size="70" class="required">
		</div>
	</div>
	<div class="rmv-acct-check form-item">
		<label for="it-manager">
			<input type="checkbox" id="it-manager" name="special[]" value="IT Discussion">
			Requires discussion with IT manager
		</label>
		<label for="dpt-move">
			<input type="checkbox" id="dpt-move" name="special[]" value="Moving Departments">
			Employee is moving departments
		</label>
	</div>
	
	<!-- The inputs all have individual nameless divs because the validation function
	adds a class to make it more distinctive. Without the divs, it adds class to too much -->
	<div class="email-removal form-item">
		<label id="email-rmv" for="email-rmv">Email Removal Options:</label>
		<select id="email-rmv" name="email-rmv" class="form-select">
			<option value="email-1" selected="selected">Delete</option>
			<option value="email-2">Export and Delete</option>
			<option value="email-3">Grant Access</option>
			<option value="email-4">Delete and Forward</option>
		</select>
		<div class="email-rmv-descr" id="email-1">
			<p class="descr-text email-removal" id="email-1">
				The email account will be deleted immediately. All information not saved in the email will be lost upon deletion.
			</p>
		</div>
		<div class="email-rmv-descr" id="email-2">
			<div>
				<label class="email-rmv-2" for="email-2">Export email:</label>
				<input type="text" id="email-2" name="email-2">
			</div>
			<p class="descr-text email-removal" id="email-2">
				The contents of the email will be exported as .PST file and then the account will be deleted. Please enter the email address for the file to be sent to above.
			</p>
		</div>
		<div class="email-rmv-descr" id="email-3">
			<div>
				<label class="email-rmv-2" for="email-3">Access email:</label>
				<input type="text" id="email-3" name="email-3" class="email-autocomplete">
			</div>
			<p class="descr-text email-removal" id="email-3">
				Access to the account will be granted to another individual for the next 2 weeks. Please enter the email address of the person to be given access above.
			</p>
		</div>
		<div class="email-rmv-descr" id="email-4">
			<div>
				<label class="email-rmv-2" for="email-4">Forward email:</label>
				<input type="text" id="email-4" name="email-4">
			</div>
			<p class="descr-text email-removal" id="email-4">
				The email account will be deleted but emails directed to the account will be forwarded for the next 2 weeks (as opposed to bouncing back). Please enter the email address you would like the emails forwarded to above.
			</p>
		</div>
	</div>
	<div class="p-drive form-item">
		<label id="p-delete" for="p-delete">Personal Network Space Removal Options:</label>
		<select id="p-delete" name="p-delete" class="form-select">
			<option value="p-delete-1" selected="selected">Delete</option>
			<option value="p-delete-2">Move files</option>
			<option value="p-delete-3">No network space</option>
		</select>
		<div class="p-delete-descr" id="p-delete-1">
			<p class="descr-text p-removal" id="p-delete-1">
				All files in your Personal Network Space will be deleted.
			</p>
		</div>
		<div class="p-delete-descr" id="p-delete-2">
			<div>
				<label class="p-delete-2" for="p-addr">Move location:</label>
				<textarea id="p-delete-2" name="p-delete-2"></textarea>
			</div>
			<p class="descr-text p-removal" id="p-delete-2">
				Move all the files in your Personal Network Space into a supervisor approved location. Please describe the new location in as much detail as possible (e.g. department shared space, coworker's ONID space, etc.)
			</p>
		</div>
		<div class="p-delete-descr" id="p-delete-3">
			<p class="descr-text p-removal" id="p-delete-3">
				You don't believe you have a Personal Network Space.
			</p>
		</div>
	</div>
	<div class="comments form-item">
		<label id="add-comments" for="add-comments">Additional Comments:</label>
		<textarea id="add-comments" name="add-comments"></textarea>
	</div>
	


<div id="hidden-data">
	
</div>

<div class="form-actions form-wrapper" id="edit-actions" style="border:0px">
	<input type="submit" id="edit-submit" name="newaccnt" value="Submit to Community Network" class="form-submit" />
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
</div>
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

	<!-- /page-wrapper -->
  </body>
</html>
