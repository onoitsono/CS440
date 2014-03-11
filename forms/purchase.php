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

    <title>Purchase Request | Community Network</title>

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
    div#device-type-help, div#comp-warning, div.desktop-warning
    {
      display:none;
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
    }
    div.apple-xtra
    {
      padding-left: 10px;
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
    div.user-info, div.main-select .form-title, div.form-title, label.form-title
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
            <h2 class="title" id="page-title">Purchase Request</h2>


              <div id='content' >
                <a name="main-content"></a>
                  <div class="region region-content">
    <div id="block-system-main" class="block block-system">


  <div class="content">
    <div id="node-339" class="node node-webform clearfix">


  <div class="content">
    <p class="descr-text" style="font-size:12px">Please fill out the form below to request a purchase quote.</p>

<form class="webform-client-form" enctype="multipart/form-data" action="purchasesubmit.php" method="post" id="new-computer-request" accept-charset="UTF-8">



<?php
  //get user account info

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
  <div class="toggle" id="toggle1">
  Show Contact Info
  </div>
  <div class="user-info">
    <div class="form-item webform-component webform-component-textfield">
      <label class="form-title" for="cn-user">Full Name:<span class="form-required" title="This field is required.">*</span></label>
      <input type="text" id="cn-user" name="cn-user" value="<?php echo $drn; ?>" size="70" class="required">
    </div>
    <div class="form-item webform-component webform-component-textfield">
      <label class="form-title" for="email-address">Email:<span class="form-required" title="This field is required.">*</span></label>
      <input type="text" id="email-address" name="email-address" value="<?php echo $dre;?>" size="70" class="required email-autocomplete">
    </div>
    <div class="form-item webform-component webform-component-textfield">
      <label class="form-title" for="phone-number">Phone Number:<span class="form-required" title="This field is required.">*</span></label>
      <input type="text" id="phone-number" name="phone-number" value="" size="70" class="required">
    </div>
    <!-- <div class="form-item webform-component webform-component-textfield">
      <label class="form-title" for="dept-number">Department Billing Index:<span class="form-required" title="This field is required.">*</span></label>
      <input type="text" id="dept-number" name="dept-number" value="" size="70" class="required">
    </div> -->
  </div>

  <div class="alert" id="comp-warning">
  *Please select a computer*
  </div>
  <div class="toggle" id="toggle2">
  Show Computer Info
  </div>
  <div class="main-select form-item webform-component webform-component-select" id="webform-component-problem--category">
    <div class="form-title">Do you need help selecting what you need?</div>
    <select id="need-help" name="need-help" class="form-select account-type-select">
      <option value="" selected="selected">-Select an option-</option>
      <option value="help-needed">Help me choose.</option>
      <option value="no-help">No Thanks. (Show everything)</option>
    </select>
    <br><br>

    <div class="help-needed account-menu">
  <div id="device-type-help">
        <div class="form-title">Differences between operating systems</div>
        <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
          <div class="help-info">
            <table border = "0"><td>
              <p class="descr-text"> <h4>Apple</h4>
                <br><strong>Pros:</strong>
                  <ul>
                    <li>Fast, solid, stable platform</li>
                    <li>Great for multimedia applications</li>
                    <li>Security</li>
                    <li>Longer lifespan</li>
                  </ul>
                <br><strong>Cons:</strong>
                  <ul>
                    <li>Some applications don't run natively <a class="hoverbox">Hover here to see a list!</a></li>
                    <li>Email can be an adventure</li>
                    <li>CN can't currently do hardware warranty work</li>
                    <li>More expensive than an equivalent PC</li>
                    <li>Less customizable</li>
                    <li>Less expandable</li>
                    <li>Shorter standard warranty</li>
                  </ul>
              </p></td>
              <td>
                <p class="descr-text"> <h4>Windows</h4>
                <br><strong>Pros:</strong>
                  <ul>
                    <li>Competitively Priced</li>
                    <li>Excellent software compatibility</li>
                    <li>Easy hardware replacement/upgrade</li>
                    <li>Native Exchange email support</li>
                    <li>CN can do hardware warranty work</li>
                    <li>Superior central management</li>
                  </ul>
                <br><strong>Cons:</strong>
                  <ul>
                    <li>Earlier obsolescence</li>
                    <li>Targeted for malware due to wide distribution</li>
                    <li>Tend to have a larger footprint</li>
                    <li>Inferior native backup support</li>
                  </ul>
              </p>
              </td>
            </table>
            <div id="applications-list">
              <h2> applications that don't run natively in mac os</h2>
              <ul>
                <li>Microsoft Project</li>
                <li>Microsoft Visio</li>
                <li>Microsoft Publisher</li>
                <li>Microsoft Access</li>
                <li>Titanium Scheduling</li>
                <li>ARM</li>
                <li>EMS</li>
                <li>Event Pro</li>
                <li>Facility Focus (If they haven’t moved to a new product)</li>
                <li>Inteum</li>
                <li>Data Warehouse</li>
                <li>R25</li>
                <li>SQL plus</li>
                <li>SQL developer</li>
                <li>Showorks</li>

              </ul>
            </div>

          </div>
        </div>
      </div>

      <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
        <div class="form-title">Pick Device Type:</div>
        <select id="device-type" name="device-type" class="form-select account-type-select-2">
          <option value="" selected="selected">-Select an operating system platform type-</option>
          <option value="mac-os">Mac OS (Apple)</option>
          <option value="windows-os">Windows PC (Dell)</option>
        </select>
      </div>
      <!-- HELP FOR CHOOSING -->

        <!-- MAC OS TYPE -->
      <div class="mac-os account-menu-2">
        <!-- HELP FOR CHOOSING -->
        <div id="mac-hardware-help">
          <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
            <div class="help-info">
              <p class="descr-text"><strong> Form Factor:</strong>
              <br> Given your computing requirements, select the platform that best suits your needs.
              <br> Need portability? Do you work from home or travel often? If so, we recommend selecting a laptop.
              <br> Need more processing power? Desktops generally have more power, storage and are more flexible for upgrades.
              </p>
            </div>
          </div>
        </div>

        <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
          <div class="form-title">Mac Computer Type</div>
          <select id="mac-os" name="mac-os" class="form-select account-type-select-3">
            <option value="" selected="selected">-Select a Form Factor-</option>
            <option value="mac-laptop">Laptop</option>
            <option value="mac-desktop">Desktop</option>
          </select>
        </div>

        <!-- MAC LAPTOP TYPE -->
        <div class="mac-laptop account-menu-3">
          <div id="mac-laptop-help">
            <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
              <div class="help-info">
                <strong>Core</strong> configuration computers are recommended for the majority of customers. Core computers feature one of the
                fastest processors available and enough memory and storage to easiliy keep up with the latest software
                releases over the next three+ years. Core models are ideal for:<br><br>
                <ul class="laptop-core">
                  <li>Microsoft Office applications (Word, Outlook, Excel, PowerPoint, Publisher, Access)</li>
                  <li>Enterprise applications (Banner, Data Warehouse, Nolij, Appworx, etc.)</li>
                  <li>Web browsing and development</li>
                  <li>Statistics programs(qualtrics)</li>
                  <li>Music applications(windows media player/itunes)</li>
                </ul><br>
                <strong>Performance</strong> configuration computers do everything that a Core computer will do,
                and will also handle special computing needs such as:<br><br>
                <ul class="laptop-performance">
                  <li>3D/CAD design</li>
                  <li>Audio, image, and video editing (photoshop, soundbooth, after effects)</li>
                  <li>Heavy-duty number crunching</li>
                </ul><br>
                <strong>Ultraportable</strong> computers are designed to be as lightweight and efficient as possible
                to ease frequent travel. This portability, however, comes at the expense of processing power.<br>
              </div>
            </div>
          </div>

          <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
            <div class="form-title">Mac Laptops</div>
            <select id="mac-laptop" name="mac-laptop" class="form-select account-type-select-4">
              <option value="" selected="selected">-Select a Laptop Configuration-</option>
              <option value="mac-laptop-mid">Core - 13" Macbook Pro</option>
              <option value="mac-laptop-high">Performance - 15" Macbook Pro</option>
              <option value="mac-laptop-port">Ultra-portable - 13" Macbook Air</option>
            </select>
          </div>

        </div>
        <!-- MAC DESKTOP TYPE -->
        <div class="mac-desktop account-menu-3">
          <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
            <div class="form-title">Mac Desktop Type</div>
            <select id="mac-desktop" name="mac-desktop" class="form-select account-type-select-4">
              <option value="" selected="selected">-Select a Desktop Configuration-</option>
              <option value="mac-desktop-med">Core - 21" iMac Desktop</option>
              <option value="mac-desktop-high">Performance - 27" iMac Desktop</option>
              <option value="mac-desktop-small">Barebones - Mac Mini</option>
            </select>
          </div>
        </div>
      </div>
        <!-- WINDOWS OS TYPE -->
      <div class="windows-os account-menu-2">
          <!-- HELP FOR CHOOSING -->
        <div id="windows-hardware-help">
          <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
            <div class="help-info">
              <p class="descr-text"><strong> Form Factor:</strong>
              <br> Given your computing requirements, select the platform that best suits your needs.
              <br> Need portability? Do you work from home or travel often? If so, we recommend selecting a laptop.
              <br> Need more processing power? Desktops generally have more power, storage and are more flexible for upgrades.
              </p>
            </div>
          </div>
        </div>
        <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
          <div class="form-title">Windows Computer Type</div>
          <select id="windows-os" name="windows-os" class="form-select account-type-select-3">
            <option value="" selected="selected">-Select a Form Factor-</option>
            <option value="windows-laptop">Laptop</option>
            <option value="windows-desktop">Desktop</option>
          </select>
        </div>

        <!-- WINDOWS LAPTOP TYPE -->
        <div class="windows-laptop account-menu-3">
          <div id="windows-laptop-help">
            <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
              <div class="help-info">
                <strong>Core</strong> configuration computers are recommended for the majority of customers. Core computers feature one of the
                fastest processors available and enough memory and storage to easiliy keep up with the latest software
                releases over the next three+ years. Core models are ideal for:<br><br>
                <ul class="laptop-core">
                  <li>Microsoft Office applications (Word, Outlook, Excel, PowerPoint, Publisher, Access)</li>
                  <li>Enterprise applications (Banner, Data Warehouse, Nolij, Appworx, etc.)</li>
                  <li>Web browsing and development</li>
                  <li>Statistics programs (qualtrics)</li>
                  <li>Music applications(windows media player/itunes)</li>
                </ul><br>
                <strong>Performance</strong> configuration computers do everything that a Core computer will do,
                and will also handle special computing needs such as:<br><br>
                <ul class="laptop-performance">
                  <li>3D/CAD design</li>
                  <li>Audio, image, and video editing (soundbooth, photoshop, after effects)</li>
                  <li>Heavy-duty number crunching</li>
                </ul><br>
                <strong>Ultraportable</strong> computers are designed to be as lightweight and efficient as possible
                to ease frequent travel. This portability, however, comes at the expense of processing power.<br>
              </div>
            </div>
          </div>
          <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
            <div class="form-title">Windows Laptops</div>
            <select id="windows-laptop" name="windows-laptop" class="form-select account-type-select-4">
              <option value="" selected="selected">-Select a Laptop Configuration-</option>
              <option value="windows-laptop-mid">Core - Latitude E5430</option>
              <option value="windows-laptop-high">Performance - Latitude E6430</option>
              <option value="windows-laptop-port">Ultra-portable - Latitude 6430u</option>
            </select>
          </div>

        </div>
        <!-- WINDOWS DESKTOP TYPE -->
        <div class="windows-desktop account-menu-3">
          <div class="form-item webform-component webform-component-select" id="webform-component-problem--category">
            <div class="form-title">Windows Desktops</div>
            <select id="windows-desktop" name="windows-desktop" class="form-select account-type-select-4">
              <option value="" selected="selected">-Select a Desktop Configuration-</option>
              <option value="windows-desktop-mid">Core - Optiplex 7010</option>
              <option value="windows-desktop-high">Performance - Optiplex 9010</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <!-- NO HELP MENU -->
    <div class="no-help account-menu">
      <div class="form-item webform-component webform-component-select" id="webform-component-problem--category" style="padding-top:15px;">
        <a href="#apple-desktops" style="padding-left:5em;">Apple Desktops</a>
        <a href="#apple-laptops" style="padding-left:5em;">Apple Laptops</a>
        <a href="#windows-desktops" style="padding-left:5em;">Windows Desktops</a>
        <a href="#windows-laptops" style="padding-left:5em;">Windows Laptops</a>
      </div>
      <div class="form-item webform-component webform-component-select computer-list" id="webform-component-problem--category">
        <div class="form-title apple-desktop-table" id="apple-desktops">Apple Desktops</div>
        <table class="apple-desktop-table" border="1" align="middle" style="align:middle;" class="computer-table">
          <tr class="options-header">
            <th>Select</th>
            <th>Details</th>
            <th>Image</th>
          </tr>
          <tr class="mac-computer mac-desktop-med" id="selection-option-1">
            <td><input class="table-select" type="checkbox" name="id[]" class="selection-option" id="selection-option-1" value="comp-1"</td>
            <td>
              <strong>Mac All-In-One Desktop (smaller): 21” iMac</strong><br>
              Powerful enough to handle most applications.  Ideal for customers who prefer Apple computers and have limited space.<br>
              Hardware Specs: <br>
              <ul>
                <li>Core i5 Processor @ 2.7 GHz</li>
                <li>8 GB DDR3 Memory</li>
                <li>1 TB Hard Drive</li>
              </ul>
            </td>
            <td><img src="images/apple_21_imac.png"></td>
          </tr>
          <tr class="mac-computer mac-desktop-high" id="selection-option-2">
            <td><input class="table-select" type="checkbox" name="id[]" id="selection-option-2" value="comp-2"></td>
            <td>
              <strong>Mac All-In-One Desktop (larger): 27” iMac</strong><br>
              Larger screen for easier multitasking.  Ideal for customers who prefer Apple computers and have room on their desk for a very large screen.<br>
              Hardware Specs: <br>
              <ul>
                <li>Core i5 Processor @ 2.9 GHz</li>
                <li>8 GB DDR3 Memory</li>
                <li>1 TB Hard Drive</li>
              </ul>
            </td>
            <td><img src="images/apple_27_imac.png"></td>
          </tr>
          <tr class="mac-computer mac-desktop-small" id="selection-option-3">
            <td><input class="table-select" type="checkbox" name="id[]" id="selection-option-3" value="comp-3"</td>
            <td>
              <strong>Mac Desktop, computer-only: Mac Mini</strong><br>
              Barebones system that will need a separate monitor, mouse, and keyboard.  Small and economical, this system is ideal for a Mac customer that already has the peripherals they need.<br>
              Hardware Specs: <br>
              <ul>
                <li>Core i5 Processor @ 2.5 GHz</li>
                <li>4 GB DDR3 Memory</li>
                <li>500GB Hard Drive</li>
              </ul>
            </td>
            <td><img src="images/apple_mac_mini.png" /></td>
          </tr>
        </table>
        <div class="form-title apple-laptop-table" id="apple-laptops">Apple Laptops</div>
        <table class="apple-laptop-table" border="1" align="middle" style="align:middle;">
          <tr class="options-header">
            <th>Select</th>
            <th>Details</th>
            <th>Image</th>
          </tr>
           <tr class="mac-computer mac-laptop-mid" id="selection-option-4">
            <td><input class="table-select" type="checkbox" name="id[]" value="comp-4" id="selection-option-4"></td>
            <td>
              <strong>Core Laptop: Macbook Pro</strong> <br>
              Powerful enough to handle most applications.  Ideal for the majority of Mac customers who need a portable computer.<br>
              Hardware Specs: <br>
              <ul>
                <li>Core i5 Processor @ 2.5 GHz</li>
                <li>4 GB DDR3 Memory</li>
                <li>500GB 5400rpm Hard Drive</li>
              </ul>
            </td>
            <td><img src="images/apple_standard_laptop.png"></td>
          </tr>
          <tr class="mac-computer mac-laptop-high" id="selection-option-5">
            <td><input class="table-select" type="checkbox" name="id[]" value="comp-5" id="selection-option-5"></td>
            <td>
              <strong>Performance Laptop: Macbook Pro with Retina display</strong><br>
              Powerful graphics and a gorgeous screen.  Ideal for Mac customers who are doing multimedia work and need a portable computer.<br>
              Hardware Specs: <br>
              <ul>
                <li>Core i5 Processor @ 2.6 GHz</li>
                <li>8 GB DDR3 Memory</li>
                <li>128GB Solid State Drive</li>
              </ul>
            </td>
            <td><img src="images/apple_retina_laptop.png" /></td>
          </tr>
          <tr class="mac-computer mac-laptop-port" id="selection-option-6">
            <td><input class="table-select" type="checkbox" name="id[]" value="comp-6" id="selection-option-6"></td>
            <td>
              <strong>Ultraportable Laptop: Macbook Air</strong><br>
              Lightweight and efficient, the Macbook Air is ideal for frequent travelers who prefer Apple computers.<br>
              Hardware Specs:
              <ul>
                <li>Core i5 Processor @ 1.8 GHz</li>
                <li>4 GB DDR3 Memory</li>
                <li>128GB Solid State Drive</li>
              </ul>
            </td>
            <td><img src="images/apple_portable_laptop.png" /></td>
          </tr>
        </table>
        <div class="form-title windows-desktop-table" id="windows-desktops">Windows Desktop</div>
        <table class="windows-desktop-table" border="1" align="middle" style="align:middle;">
          <tr class="options-header">
            <th>Select</th>
            <th>Details</th>
            <th>Image</th>
          </tr>
           <tr class="windows-computer windows-desktop-mid" id="selection-option-7">
            <td><input class="table-select" type="checkbox" name="id[]" class="checkbox-selection" value="comp-7" id="selection-option-7"></td>
            <td>
              <strong>Core Desktop: Optiplex 7010</strong><br>
              Fast and powerful enough to handle most applications.  Ideal for most desktop customers.<br>
              Hardware Specs: <br>
              <ul>Quad-Core i5 Processor @ 3.4 GHz <br>
                <li>4 GB DDR3 Memory</li>
                <li>500GB Hard Drive</li>
              </ul>
            </td>
            <td><img src="images/windows_standard_desktop.png"></td>
          </tr>
          <tr class="windows-computer windows-desktop-high" id="selection-option-8">
            <td><input class="table-select" type="checkbox" name="id[]" value="comp-8" id="selection-option-8"></td>
            <td>
              <strong>Performance Desktop:  Optiplex 9010</strong><br>
              Higher performance at a higher cost.  Ideal for customers doing heavy number-crunching or working with multimedia applications.<br>
              Hardware Specs: <br>
              <ul>
                <li>Quad-Core i7 Processor @ 3.4 GHz</li>
                <li>8 GB DDR3 Memory</li>
                <li>500GB Hard Drive</li>
              </ul>
            </td>
            <td><img src="images/windows_performance_desktop.png" /></td>
          </tr>
        </table>
        <div class="form-title windows-laptop-table" id="windows-laptops">Windows Laptop</div>
        <table class="windows-laptop-table" border="1" align="middle" style="align:middle;">
          <tr class="options-header">
            <th>Select</th>
            <th>Details</th>
            <th>Image</th>
          </tr>
          <tr class="windows-computer windows-laptop-mid" id="selection-option-9">
            <td><input class="table-select" type="checkbox" name="id[]" value="comp-9" id="selection-option-9"></td>
            <td>
              <strong>Core Laptop: Latitude E5430</strong><br>
              Fast and powerful enough to handle the majority of applications.  Ideal for most customers who need a portable computer.<br>
              Hardware Specs: <br>
              <ul>
                <li>Core i5 Processor @ 2.6 GHz</li>
                <li>2 GB DDR3 Memory</li>
                <li>320GB Hard Drive</li>
              </ul>
            </td>
            <td><img src="images/windows_standard_laptop.png" /></td>
          </tr>
          <tr class="windows-computer windows-laptop-high" id="selection-option-10">
            <td><input class="table-select" type="checkbox" name="id[]" value="comp-10" id="selection-option-10"></td>
            <td>
              <strong>Performance Laptop: Latitude E6430</strong><br>
              Higher performance at a higher cost.  Ideal for customers who need a portable system that can handle heavy number-crunching or multimedia applications.<br>
              Hardware Specs: <br>
              <ul>
                <li>Core i5 Processor @ 2.6 GHz</li>
                <li>4 GB DDR3 Memory</li>
                <li>320GB Hard Drive</li>
              </ul>
            </td>
            <td><img src="images/windows_performance_laptop.png" /></td>
          </tr>
          <tr class="windows-computer windows-laptop-port" id="selection-option-11">
            <td><input class="table-select" type="checkbox" name="id[]" value="comp-11" id="selection-option-11"></td>
            <td>
              <strong>Ultraportable Laptop: Latitude 6430u</strong><br>
              Lightweight and power-efficient, at the expense of speed.  Ideal for those who travel frequently and for whom weight is an important factor.<br>
              Hardware Specs: <br>
              <ul>
                <li>Core i3 Processor @ 1.9 GHz</li>
                <li>4 GB DDR3 Memory</li>
                <li>128GB Solid State Drive</li>
              </ul>
            </td>
            <td><img src="images/windows_portable_laptop.png" /></td>
          </tr>
        </table>
      </div>
    </div>

  </div>
  <!-- Computer Names -->
  <table class="display-table computer-table" border="1" align="middle" style="align:middle;">
    <tr class="options-header">
      <th>Details</th>
      <th>Image</th>
    </tr>
    <tr class="mac-computer selection-option mac-desktop-med">
      <td>
        <strong>Mac All-In-One Desktop (smaller): 21” iMac</strong><br>
        Powerful enough to handle most applications.  Ideal for customers who prefer Apple computers and have limited space.<br>
        Hardware Specs: <br>
        <ul>
          <li>Core i5 Processor @ 2.7 GHz</li>
          <li>8 GB DDR3 Memory</li>
          <li>1 TB Hard Drive</li>
        </ul>
      </td>
      <td><img src="images/apple_21_imac.png"></td>
    </tr>
    <tr class="mac-computer selection-option mac-desktop-high">
      <td>
        <strong>Mac All-In-One Desktop (larger): 27” iMac</strong><br>
        Larger screen for easier multitasking.  Idea for customers who prefer Apple computers and have room on their desk for a very large screen.<br>
        Hardware Specs: <br>
        <ul>
          <li>Core i5 Processor @ 2.9 GHz</li>
          <li>8 GB DDR3 Memory</li>
          <li>1 TB Hard Drive</li>
        </ul>
      </td>
      <td><img src="images/apple_27_imac.png"></td>
    </tr>
    <tr class="mac-computer selection-option mac-desktop-small">
      <td>
        <strong>Mac Desktop, computer-only: Mac Mini</strong><br>
        Barebones system that will need a separate monitor, mouse, and keyboard.  Small and economical, this system is idea for a Mac customer that already has the peripherals they need.<br>
        Hardware Specs: <br>
        <ul>
          <li>Core i5 Processor @ 2.5 GHz</li>
          <li>4 GB DDR3 Memory</li>
          <li>500GB Hard Drive</li>
        </ul>
      </td>
      <td><img src="images/apple_mac_mini.png" /></td>
    </tr>
    <tr class="mac-computer selection-option mac-laptop-mid">
      <td>
        <strong>Core Laptop: Macbook Pro</strong><br>
        Powerful enough to handle most applications.  Ideal for the majority of Mac customers who need a portable computer.<br>
        Hardware Specs: <br>
        <ul>
          <li>Core i5 Processor @ 2.5 GHz</li>
          <li>4 GB DDR3 Memory</li>
          <li>500GB 5400rpm Hard Drive</li>
        </ul>
      </td>
      <td><img src="images/apple_standard_laptop.png"></td>
    </tr>
    <tr class="mac-computer selection-option mac-laptop-high">
      <td>
        <strong>Performance Laptop: Macbook Pro with Retina display</strong><br>
        Powerful graphics and a gorgeous screen.  Ideal for Mac customers who are doing multimedia work and need a portable computer.<br>
        Hardware Specs: <br>
        <ul>
          <li>Core i5 Processor @ 2.6 GHz</li>
          <li>8 GB DDR3 Memory</li>
          <li>128GB Solid State Drive</li>
        </ul>
      </td>
      <td><img src="images/apple_retina_laptop.png" /></td>
    </tr>
    <tr class="mac-computer selection-option mac-laptop-port">
      <td>
        <strong>Ultraportable Laptop: Macbook Air</strong><br>
        Lightweight and efficient, the Macbook Air is ideal for frequent travelers who prefer Apple computers.<br>
        Hardware Specs: <br>
        <ul>
          <li>Core i5 Processor @ 1.8 GHz</li>
          <li>4 GB DDR3 Memory</li>
          <li>128GB Solid State Drive</li>
        </ul>
      </td>
      <td><img src="images/apple_portable_laptop.png" /></td>
    </tr>
    <tr class="windows-computer selection-option windows-desktop-mid">
      <td>
        <strong>Core Desktop: Optiplex 7010</strong><br>
        Fast and powerful enough to handle most applications.  Ideal for most desktop customers.<br>
        Hardware Specs: <br>
        <ul>
          <li>Quad-Core i5 Processor @ 3.4 GHz</li>
          <li>4 GB DDR3 Memory</li>
          <li>500GB Hard Drive</li>
        </ul>
      </td>
      <td><img src="images/windows_standard_desktop.png"></td>
    </tr>
    <tr class="windows-computer selection-option windows-desktop-high">
      <td>
        <strong>Performance Desktop:  Optiplex 9010</strong>
        Higher performance at a higher cost.  Ideal for customers doing heavy number-crunching or working with multimedia applications.<br>
        Hardware Specs: <br>
        <ul>
          <li>Quad-Core i7 Processor @ 3.4 GHz</li>
          <li>8 GB DDR3 Memory</li>
          <li>500GB Hard Drive</li>
        </ul>
      </td>
      <td><img src="images/windows_performance_desktop.png" /></td>
    </tr>
    <tr class="windows-computer selection-option windows-laptop-mid">
      <td>
        <strong>Core Laptop: Latitude E5430</strong><br>
        Fast and powerful enough to handle the majority of applications.  Ideal for most customers who need a portable computer.<br>
        Hardware Specs: <br>
        <ul>
          <li>Core i5 Processor @ 2.6 GHz</li>
          <li>2 GB DDR3 Memory</li>
          <li>320GB Hard Drive</li>
        </ul>
      </td>
      <td><img src="images/windows_standard_laptop.png" /></td>
    </tr>
    <tr class="windows-computer selection-option windows-laptop-high">
      <td>
        <strong>Performance Laptop: Latitude E6430</strong><br>
        Higher performance at a higher cost.  Ideal for customers who need a portable system that can handle heavy number-crunching or multimedia applications.<br>
        Hardware Specs: <br>
        <ul>
          <li>Core i5 Processor @ 2.6 GHz</li>
          <li>4 GB DDR3 Memory</li>
          <li>320GB Hard Drive</li>
        </ul>
      </td>
      <td><img src="images/windows_performance_laptop.png" /></td>
    </tr>
    <tr class="windows-computer selection-option windows-laptop-port">
      <td>
        <strong>Ultraportable Laptop: Latitude 6430u</strong><br>
        Lightweight and power-efficient, at the expense of speed.  Ideal for those who travel frequently and for whom weight is an important factor.<br>
        Hardware Specs: <br>
        <ul>
          <li>Core i3 Processor @ 1.9 GHz</li>
          <li>4 GB DDR3 Memory</li>
          <li>128GB Solid State Drive</li>
        </ul>
      </td>
      <td><img src="images/windows_portable_laptop.png" /></td>
    </tr>
  </table>

  <!-- ACCESSORIES -->
  <!-- Laptop -->
  <div class="account-menu-4 laptop-accessories">
    <div class="form-title">Laptop Accessories</div>
    <div class="form-item webform-component webform-component-select laptop-css" id="webform-component-problem--category">
      <div class="dock">
        <label class="acc1"><input class="accessories acc1" type="checkbox" name="accessories[]" value="Dock"/> Docking Station</label>
      </div>
      <div class="apple-monitors" id="a-laptop-m">
        <label class="acc1"><input id="a-laptop-tb" class="accessories acc1 apple-m" type="checkbox" name="accessories[]" value="TBMonitor"/> Thunderbolt Monitor</label>
        <div class="apple-xtra" id="a-laptop-xtra">
          <label class="acc1"><input id="a-laptop-xtra" class="accessories acc1 apple-m2" type="checkbox" name="accessories[]" value="ALXMonitor"/> Additional Monitor?</label>
        </div>
      </div>
      <div class="windows-monitors">
        <label class="acc1"><input id="w-laptop" class="accessories acc1 windows-m" type="checkbox" name="accessories[]" value="WLXMonitor"/> Additional Monitors?</label>
        <div id="w-laptop" class="windows-options">
          <select id="windows-monitor" name="WLXMonitor" class="form-select account-type-select-5 accessories">
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
          </select>
        </div>
      </div>
      <label class="acc1"><input class="accessories acc1" type="checkbox" name="accessories[]" value="Battery"/> Battery Upgrade</label>
      <label class="acc1"><input class="accessories acc1" id="hd" type="checkbox" name="accessories[]" value="Drive"/> Hard Drive</label>
      <div class="hd-options">
        <select id="hd-options" name="Drive" class="form-select account-type-select-5 accessories">
          <option value="normal" selected="selected">Larger HD</option>
          <option value="special">SSD</option>
        </select>
      </div>
      <label class="acc1"><input class="accessories acc1" type="checkbox" name="accessories[]" value="Case"/> Carrying Case</label>
    </div>
  </div>
  <!-- Desktop -->
  <div class="account-menu-4 desktop-accessories">
    <div class="form-title">Desktop Accessories</div>
    <div class="alert desktop-warning">
      Please only select a total of 2 extra monitors.
    </div>
    <div class="form-item webform-component webform-component-select desktop-css" id="webform-component-problem--category">
      <div class="apple-monitors">
        <label class="acc1"><input id="desktop-tb" class="accessories acc1 apple-m" type="checkbox" name="accessories[]" value="TBMonitor"/> Thunderbolt Monitor(s) $1000</label>
        <div class="tb-extra">
          <select id="tb-monitor" name="TBMonitor" class="form-select account-type-select-5 accessories">
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
          </select>
        </div>
        <label class="acc1"><input id='desktop-xtra' class="accessories acc1 apple-m2" type="checkbox" name="accessories[]" value="ADXMonitor"/> Regular Monitor(s) $80</label>
        <div id="a-desktop-options" class='apple-m-options'>
          <select id="apple-monitors" name="ADXMonitor" class="form-select account-type-select-5 accessories">
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
          </select>
        </div>
      </div>
      <div class="windows-monitors">
        <label class="acc1"><input id="w-desktop" class="accessories acc1 windows-m" type="checkbox" name="accessories[]" value="WDXMonitor"/> Additional Monitors?</label>
        <div id="w-options" class="windows-options">
          <select id="windows-monitor" name="WDXMonitor" class="form-select account-type-select-5 accessories">
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
          </select>
        </div>
      </div>
      <label class="acc1"><input class="accessories acc1" id="speakers" type="checkbox" name="accessories[]" value="Speakers"/> Speakers</label>
        <div class="speaker-options">
          <select id="speaker-options" name="Speakers" class="form-select account-type-select-5 accessories">
            <option value="speaker1" selected="selected">Speaker1</option>
            <option value="speaker2">Speaker2</option>
          </select>
        </div>
      <label class="acc1"><input class="accessories acc1" id="keyboard" type="checkbox" name="accessories[]" value="Keyboard"/> Keyboard</label>
        <div class="keyboard-options">
          <select id="keyboard-options" name="Keyboard" class="form-select account-type-select-5 accessories">
            <option value="" selected="selected">-Select-</option>
            <option value="wired">Wired</option>
            <option value="wireless">Wireless</option>
          </select>
        </div>
      <label class="acc1"><input class="accessories acc1" id="mouse" type="checkbox" name="accessories[]" value="Mouse"/> Mouse</label>
        <div class="mouse-options">
          <select id="mouse-options" name="Mouse" class="form-select account-type-select-5 accessories">
            <option value="" selected="selected">-Select-</option>
            <option value="wired">Wired</option>
            <option value="wireless">Wireless</option>
          </select>
        </div>
    </div>

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
