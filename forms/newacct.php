<?php
  include "acctfunctions.inc";
?>

<!doctype html>
<html class="classic" lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta charset="utf-8">
  <link rel="shortcut icon" href="http://oregonstate.edu/is/sites/all/themes/osu_standard/favicon.ico" type="image/vnd.microsoft.icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Request New CN Account | Community Network</title>

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
      <h2 class="element-invisible">You are here</h2><div class="breadcrumb"><a href="http://oregonstate.edu/is/tss/cn">Community Network</a> &#187; <a href="http://oregonstate.edu/is/tss/cn/online-forms">CN Account Change Forms</a></div>    </div> <!-- messages -->


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
            <h2 class="title" id="page-title">Request New CN Account</h2>


              <div id='content' >
                <a name="main-content"></a>
                  <div class="region region-content">
    <div id="block-system-main" class="block block-system">


  <div class="content">
    <div id="node-339" class="node node-webform clearfix">


  <div class="content">
    <p class="descr-text">Please fill out the form below to request a new CN account.</p>

<form class="webform-client-form" enctype="multipart/form-data" action="makenewacct.php" method="post" id="new-account-form" accept-charset="UTF-8">


<?php
  //get user account info

  $reqinfo = verify_user($_SERVER['AUTH_USER'], "sAMAccountName"); // LDAP query for requestor info
  $drn = $reqinfo['displayname']; // returns either nothing or "display name" depending on whether there's a value for the displayname; drn stands for "default requestor name"
    $dre = $reqinfo['mail']; // default requestor email
    $reqmanagerinfo = get_userinfo($reqinfo['manager'], "distinguishedName"); // requestor's manager
    $manager_email = $reqmanagerinfo['mail']; // requestor's manager's email
    $requestor_department = $reqinfo['department']; // requestor's department

  //put info into hidden fields
  echo '<input type="hidden" name="requestor-mail" value="' . $dre . '">';
  echo '<input type="hidden" name="requestor-name" value="' . $drn . '">';
?>


<div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
  <label for="account-type">Pick Account Type:<label>
  <select id="account-type" name="account-type" class="form-select account-type-select">
    <option value="" selected="selected">-Select an account type-</option>
    <option value="person-account-type">For a person</option>
    <option value="general-use-mailbox">General Use Mailbox</option>
    <option value="general-use-calendar">General Use Calendar</option>
    <option value="room-calendar">Room Calendar</option>
  </select>
</div>
<!-- PERSON ACCOUNT TYPE -->
<div class="person-account-type account-menu student-employee">
  <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
    <label for="person-account-type">Person Account Type<label>
    <select id="person-account-type" name="person-account-type" class="form-select account-type-select-2">
      <option value="" selected="selected">-Select an account type-</option>
      <option value="student-employee">Student Employee</option>
      <option value="regular-employee">Regular Employee</option>
      <option value="email-only">E-mail Only</option>
    </select>
  </div>

  <div class="student-employee regular-employee email-only account-menu-2">
    <div class="form-item webform-component webform-component-textfield">
      <label for="supervisor-email">Supervisor's Email<span class="form-required" title="This field is required.">*</span></label>
      <input type="hidden" id="supervisor-email" name="supervisor-email" value="<?php echo $manager_email; ?>" size="70" class="required email-autocomplete">
    </div>
    <div class="form-item webform-component webform-component-textfield">
      <label for="employee-first-name">Employee's First Name<span class="form-required" title="This field is required.">*</span></label>
      <input type="text" id="employee-first-name" name="employee-first-name" value="" size="35" maxlength="128" class="form-text required">
    </div>
    <div class="form-item webform-component webform-component-textfield">
      <label for="employee-last-name">Employee's Last Name<span class="form-required" title="This field is required.">*</span></label>
      <input type="text" id="employee-last-name" name="employee-last-name" value="" size="35" maxlength="128" class="form-text required">
    </div>
    <div class="form-item webform-component webform-component-textfield">
      <label for="employee-title">Employee's Title<span class="form-required" title="This field is required.">*</span></label>
      <input type="text" id="employee-title" name="employee-title" value="" size="35" maxlength="128" class="form-text required">
    </div>
    <div class="form-item webform-component webform-component-textfield">
      <label for="employee-phone-number">Employee's Phone Number</label>
      Note: The phone number must be either the 5 digit OSU number in the format 7-1234 or a 10 digit phone number in the format 541-737-1234.<br>
      <input type="text" id="employee-phone-number" name="employee-phone-number" value="" size="35" maxlength="128" class="form-text required">
    </div>
    <div class="form-item webform-component webform-component-textfield">
      <label for="employee-department">Employee's Department<span class="form-required" title="This field is required.">*</span></label>
      <input type="text" id="employee-department" name="employee-department" value="<?php echo $requestor_department; ?>" size="35" maxlength="128" class="form-text required">
    </div>
    <div class="form-item webform-component webform-component-textfield">
      <label for="employee-building-room">Office Location (Building and Room)</label>
      <input type="text" id="employee-building-room" name="employee-building-room" value="" size="35" maxlength="128" class="form-text required">
    </div>
    <div class="form-item webform-component webform-component-date" id="webform-component-event-date">
      <label for="employee-start-date">Employee Start Date<span class="form-required" title="This field is required.">*</span></label>
      <input type="text" id="employee-start-date" name="employee-start-date" value="" size="35" maxlength="128" class="form-text required datepicker needdate">
    </div>
    <div class="form-item webform-component webform-component-textfield">
      <label for="employee-dl-memberships">Please enter any needed e-mail distribution list memberships.</label>
      <div class="form-textarea-wrapper resizable">
        <textarea id="employee-dl-memberships" name="employee-dl-memberships" cols="3" rows="5" class="form-textarea"></textarea>
      </div>
    </div>
  </div>
  <div class="student-employee regular-employee account-menu-2">
    <div class="form-item webform-component webform-component-checkboxes" id="checkboxes">
      <div id="share-permissions" class="form-checkboxes">
        <div class="form-item form-type-checkbox">
        <input id="need-share-permissions" name="need-share-permissions" class="form-checkbox" type="checkbox">
        <label class="option" for="need-share-permissions">This employee needs shared drive access</label>
        </div>
      </div>
      <div id="mirror-permissions" class="form-checkboxes" style="display:none">
        <div class="form-item form-type-checkbox">
        <input id="can-mirror-permissions" name="can-mirror-permissions" class="form-checkbox" type="checkbox">
        <label class="option" for="can-mirror-permissions">There is an existing employee that standard permissions can be copied from</label>
        </div>
      </div>
      <div id="mirror-permissions-from" style="display:none">
        <div class="form-item webform-component webform-component-textfield">
          <label for="mirror-permissions-from">Who should permissions be mirrored from? <span class="form-required" title="This field is required.">*</span></label>
          <input type="hidden" id="mirror-permissions-from" name="mirror-permissions-from" value="" size="35" maxlength="128" class="form-text required email-autocomplete">
        </div>
        <div class="form-item webform-component webform-component-textarea" id="textarea">
          <label for="which-shared-folders-from">Are there any restricted shares that the new employee needs access to?</label>
          <div class="form-textarea-wrapper resizable">
            <textarea id="which-shared-folders-from" name="which-shared-folders-from" cols="3" rows="5" class="form-textarea"></textarea>
          </div>
        </div>
      </div>
      <div id="which-shared-folders" style="display:none">
        <div class="form-item webform-component webform-component-textarea" id="textarea">
          <label for="which-shared-folders">Which shared and/or restricted shared folders should this employee have access to?</label>
          <div class="form-textarea-wrapper resizable">
            <textarea id="which-shared-folders" name="which-shared-folders" cols="3" rows="5" class="form-textarea"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="student-employee account-menu-2">
  </div>

</div>

<!-- GENERAL USE MAILBOX -->
<div class="general-use-mailbox account-menu">
  <div class="form-item webform-component webform-component-textfield">
    <label for="mailbox-name">Name of the Mailbox <span class="form-required" title="This field is required.">*</span></label>
    <input type="text" id="mailbox-name" name="mailbox-name" value="" size="35" maxlength="128" class="form-text required" />
  </div>
  <div class="form-item webform-component webform-component-textarea" id="textarea">
    <label for="access-to-folders">Who should have access to contents of the mailbox?</label>
    <div class="form-textarea-wrapper resizable">
      <textarea id="access-to-folders" name="access-to-folders" cols="3" rows="5" class="form-textarea"></textarea>
    </div>
  </div>
  <div class="form-item webform-component webform-component-textarea" id="textarea">
    <label for="send-as-access">Who should have ability to send "from" the mailbox?</label>
    <div class="form-textarea-wrapper resizable">
      <textarea id="send-as-access" name="send-as-access" cols="3" rows="5" class="form-textarea"></textarea>
    </div>
  </div>
  <p>
    Please note that the ability to access the mailbox contents and the ability to send from the mailbox are separate, one does not imply the other. A person may be added to one or both permission sets.
  </p>
  <div class="form-item webform-component webform-component-textfield">
    <label for="mailbox-title">Mailbox Title (If Applicable)</label>
    <input type="text" id="mailbox-title" name="mailbox-title" value="" size="35" maxlength="128" class="form-text required" />
  </div>
  <div class="form-item webform-component webform-component-textfield">
    <label for="mailbox-department">Mailbox Department </label>
    <input type="text" id="mailbox-department" name="mailbox-department" value="<?php echo $requestor_department; ?>" size="35" maxlength="128" class="form-text required" />
  </div>
  <div class="form-item webform-component webform-component-textfield">
    <label for="mailbox-phone-number">Mailbox Phone Number </label>
      Note: The phone number must be either the 5 digit OSU number in the format #-#### or a 10 digit phone number in the format ###-###-####.
    <input type="text" id="mailbox-phone-number" name="mailbox-phone-number" value="" size="35" maxlength="128" class="form-text required" />
  </div>
  <div class="form-item webform-component webform-component-textfield">
    <label for="mailbox-building-room">Mailbox Office Location (Building and Room) </label>
    <input type="text" id="mailbox-building-room" name="mailbox-building-room" value="" size="35" maxlength="128" class="form-text required" />
  </div>
  <div class="form-item webform-component webform-component-date" id="webform-component-event-date">
    <label for="need-mailbox-by">Need Mailbox By:</label>
    <input type="text" id="need-mailbox-by" name="need-mailbox-by" value="" size="35" maxlength="128" class="form-text required datepicker needdate">
  </div>
  <div class="form-item webform-component webform-component-textfield">
    <label for="need-mailbox-dl-memberships">Please enter any needed e-mail distribution list memberships.</label>
    <div class="form-textarea-wrapper resizable">
      <textarea id="need-mailbox-dl-memberships" name="need-mailbox-dl-memberships" cols="3" rows="5" class="form-textarea"></textarea>
    </div>
  </div>

</div>

<!-- GENERAL USE CALENDAR -->
<div class="general-use-calendar account-menu">
  <div class="form-item webform-component webform-component-textfield">
    <label for="calendar-mailbox-name">Name of the Mailbox <span class="form-required" title="This field is required.">*</span></label>
    <input type="text" id="calendar-mailbox-name" name="calendar-mailbox-name" value="" size="35" maxlength="128" class="form-text required" />
  </div>
  <div class="form-item webform-component webform-component-textarea" id="textarea">
    <label for="reviewers-list-general">Who should have reviewer rights (The ability to read items only, not create items)?</label>
    <div class="form-textarea-wrapper resizable">
      <textarea id="reviewers-list-general" name="reviewers-list-general" cols="3" rows="5" class="form-textarea"></textarea>
    </div>
  </div>
  <div class="form-item webform-component webform-component-textarea" id="textarea">
    <label for="authors-list-general">Who should have author rights (The ability to create items and edit only items created yourself)?</label>
    <div class="form-textarea-wrapper resizable">
      <textarea id="authors-list-general" name="authors-list-general" cols="3" rows="5" class="form-textarea"></textarea>
    </div>
  </div>
  <div class="form-item webform-component webform-component-textarea" id="textarea">
    <label for="editors-list-general">Who should have editor rights (The ability to create items and edit all items)?</label>
    <div class="form-textarea-wrapper resizable">
      <textarea id="editors-list-general" name="editors-list-general" cols="3" rows="5" class="form-textarea"></textarea>
    </div>
  </div>
  <div class="form-item webform-component webform-component-textarea" id="textarea">
    <label for="default-permissions-general">What permission level should individuals not specified have?</label>
    <select id="default-permissions-general" name="default-permissions-general" class="form-select">
      <option value="none">None</option>
      <option value="free-busy-status-only" selected="selected">Free/Busy Status Only</option>
      <option value="reviewer">Reviewer</option>
      <option value="author">Author</option>
      <option value="editor">Editor</option>
    </select>
  </div>
</div>

<!-- ROOM CALENDAR -->
<div class="room-calendar account-menu">
  <div class="form-item webform-component webform-component-textfield">
    <label for="room-calendar-mailbox-name">Room Building/Room Number<span class="form-required" title="This field is required.">*</span></label>
    Note: Room calendars will be named following the OSU building designation.  For example, <strong>Kerr Admin 106</strong>
    will be listed as <strong>KAd 106</strong>.
    <input type="text" id="room-calendar-mailbox-name" name="room-calendar-mailbox-name" value="" size="35" maxlength="128" class="form-text required" />
  </div>
  <p>
  There are two styles of room calendars that can be configured:
  <ul>
    <li><strong>Automatic processing</strong> ensures that the resource cannot be accidentally double booked.
    <li><strong>Direct scheduling</strong> does enable (intentionally or unintentionally) double booking the room.
  </ul>
  </p>
  <div class="form-item webform-component webform-component-checkboxes" id="checkboxes">
    <div id="calendar-style" class="form-checkboxes">
      <label class="option" for="calendar-style">Room Calendar Style:</label>
      <select id="calendar-style" name="calendar-style" class="form-select">
        <option value="automatic-processing">Automatic Processing</option>
        <option value="direct-scheduling">Direct Scheduling</option>
      </select>
    </div>
  </div>
  <div class="yes-auto-proc-room">
    <div class="form-item webform-component webform-component-textarea" id="textarea">
      <label for="editors-list-room-yes">Who should be a "Room Admin" with the ability to modify / clear bookings set by other people?</label>
      <div class="form-textarea-wrapper resizable">
        <textarea id="editors-list-room-yes" name="editors-list-room-yes" cols="3" rows="5" class="form-textarea"></textarea>
      </div>
    </div>
    <div class="form-item webform-component webform-component-textarea" id="textarea">
      <label for="who-can-book">Who should be able to book the room?</label>
      <div class="form-textarea-wrapper resizable">
        <textarea id="who-can-book" name="who-can-book" cols="3" rows="5" class="form-textarea"></textarea>
      </div>
    </div>
    <div class="form-item webform-component webform-component-textarea" id="textarea">
      <label for="who-view-calendar-details">Who should have the ability to view the calendar details?</label>
      <div class="form-textarea-wrapper resizable">
        <textarea id="who-view-calendar-details" name="who-view-calendar-details" cols="3" rows="5" class="form-textarea"></textarea>
      </div>
    </div>
    <div class="form-item webform-component webform-component-textarea" id="textarea">
      <label for="default-permissions-room-yes">What permissions level should individuals not specified have?</label>
      <select id="default-permissions-room-yes" name="default-permissions-room-yes" class="form-select">
        <option value="none">None</option>
        <option value="free-busy-status-only" selected="selected">Free/Busy Status Only</option>
        <option value="read-calendar-details">Read Calendar Details</option>
      </select>
    </div>
    <div class="yes-auto-proc-room" style="display:none">
      <div class="form-item webform-component webform-component-textarea" id="textarea">
        <label for="custom-accept-decline-messages-room">Any desired additional message on the automatic replies from the mailbox? (i.e. Please contact X for questions on booking this room)</label>
        <div class="form-textarea-wrapper resizable">
          <textarea id="custom-accept-decline-messages-room" name="custom-accept-decline-messages-room" cols="3" rows="5" class="form-textarea"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="no-auto-proc-room" style="display:none">
    <div class="form-item webform-component webform-component-textarea" id="textarea">
      <label for="authors-list-room">Who should have author rights (The ability to create items and edit only items created yourself)?</label>
      <div class="form-textarea-wrapper resizable">
        <textarea id="authors-list-room" name="authors-list-room" cols="3" rows="5" class="form-textarea"></textarea>
      </div>
    </div>
    <div class="form-item webform-component webform-component-textarea" id="textarea">
      <label for="editors-room-no">Who should have editor rights (The ability to create items and edit all items)?</label>
      <div class="form-textarea-wrapper resizable">
        <textarea id="editors-list-room-no" name="editors-list-room-no" cols="3" rows="5" class="form-textarea"></textarea>
      </div>
    </div>
    <div class="form-item webform-component webform-component-textarea" id="textarea">
      <label for="reviewers-list-room">Who should have reviewer rights (The ability to read items only, not create items)?</label>
      <div class="form-textarea-wrapper resizable">
        <textarea id="reviewers-list-room" name="reviewers-list-room" cols="3" rows="5" class="form-textarea"></textarea>
      </div>
    </div>
    <div class="form-item webform-component webform-component-textarea" id="textarea">
      <label for="default-permissions-room-no">What permissions level should individuals not specified have?</label>
      <select id="default-permissions-room-no" name="default-permissions-room-no" class="form-select">
        <option value="none">None</option>
        <option value="free-busy-status-only" selected="selected">Free/Busy Status Only</option>
        <option value="reviewer">Reviewer</option>
        <option value="author">Author</option>
        <option value="editor">Editor</option>
      </select>
    </div>
  </div>
  <div class="form-item webform-component webform-component-date" id="webform-component-event-date">
    <label for="need-mailbox-by-calendar">Need Mailbox By:</label>
    <input type="text" id="need-mailbox-by-calendar" name="need-mailbox-by-calendar" value="" size="35" maxlength="128" class="form-text required datepicker needdate">
  </div>
</div>

  <div class="account-menu account-menu-2 student-employee regular-employee email-only general-use-mailbox
        general-use-calendar room-calendar">

    <div class="form-item webform-component webform-component-textarea" id="textarea=">
      <label for="additional-comments">Any additional comments?</label>
      <div class="form-textarea-wrapper resizable">
        <textarea id="additional-comments" name="additional-comments" cols="3" rows"5" class="form-textarea"></textarea>
      </div>
    </div>
  </div>

<div id="hidden-data">

</div>

<div class="form-actions form-wrapper" id="edit-actions">
  <input type="submit" id="edit-submit" name="newaccnt" value="Submit to Community Network" class="form-submit" />
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

  <!-- /page-wrapper -->
  </body>
</html>
