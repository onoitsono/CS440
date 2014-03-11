<?php
	$rowcounter = 0;
	$processform = isset($_POST['Requestors_Name']); // use compulsory submitted form field to determine whether the form should be processed
	
// Quick summary of structure: this script does several things simultaneously.
// 		1. Detects whether the script is being called to validate the form submission; if so, it
//			validates the field data, builds a string of text to display if there are errors.
//		2. Builds a variable containing the HTML for the form.  If an error was detected in the
//			submission of this field, it will indicate the error by changing the field style.
//		3. Pre-populates the field with the previously-submitted value, if it exists.
//
//	IMPORTANT: The script does not (cannot) determine whether the form data are all valid until it
//			has processed all fields; therefore, HTML generation occurs all at once, at the end of the script,
//			using strings which have accumulated the HTML code.

include "acctfunctions.inc";

//******** Subroutine to iterate through $_REQUEST to sanitize all its elements.  May choose to
//******** build a list of all valid elements of the array.

/*
	foreach ($_POST as $fn => $fv)
	{
		echo "$fn\t$fv<br>\n"; 
	}
	echo "processform\t$processform<br>\n";
*/	

	// echo "preg_match = " . preg_match ("/^[0-9a-z]([-\.\w]*[0-9a-z])*@(oregonstate.edu)|(orst.edu)|(ous.edu)$/" , "foo@ous.edu" ) . "<br>\n";
	// preg_match ("/^foo$/", "foo");
	//preg_match ("/^[0-9a-z]([-.\w]*[0-9a-z])*@([oregonstate\.edu|orst\.edu|ous\.edu])$/" , "foo@oregonstate.edu" ) . "<br>\n";

	$formhtml = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">\n<html>\n<head>\n<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">\n<title>Request to Remove CN Account</title>\n";	// this variable will accumulate the html that will be displayed if the form must be 
	$errorcount = 0;	// number of data entry errors; just 1 error will cause redisplay of the form
	$successhtml = "";	// this variable will accumulate all feedback info associated with a successful submission
	$invalidstyle = "style=\"border-style:ridge; border-width:medium; border-color:red\""; // style to indicate that the field has not been properly filled
	$invalidbare = "border-style:ridge; border-width:medium; border-color:red";
	$rgxemail = "/^[0-9a-z]([-.\w]*[0-9a-z])*@(oregonstate\.edu)|(orst\.edu)|(ous\.edu)|(osucascades\.edu)$/i"; // valid email OSU / CO addresses
	$rgxnonempty = "/^.+$/i";
	$rgxphone = "/(^[2357]-\d{4}$)|(^\d{3}[-\.]\d{3}[-\.]\d{4}$)/"; // e.g. 7-1234 or 541.713.1234

    if (!$processform) ++$errorcount;

	
	
// Get info of person making this request
    $reqinfo = get_userinfo($_SERVER['LOGON_USER'], "sAMAccountName"); // LDAP query for requestor info
	$drn = $reqinfo['displayname']; // returns either nothing or "display name" depending on whether there's a value for the displayname; drn stands for "default requestor name"
    $dre = $reqinfo['mail']; // default requestor email
    $reqmanagerinfo = get_userinfo($reginfo['manager'], "distinguishedName"); // requestor's manager
    $manager_email = $managerinfo['mail']; // requestor's manager's email
    $requestor_department = $reqinfo['department']; // requestor's department
    $requestor_fax = $userinfo['facsimileTelephoneNumber']; // requestor's fax
	
	
	$formhtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"/cn/forms/yui/build/fonts/fonts-min.css\" />\n";
	$formhtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"/cn/forms/yui/build/autocomplete/assets/skins/sam/autocomplete.css\" />\n";
	$formhtml .= "<script type=\"text/javascript\" src=\"/cn/forms/yui/build/yahoo-dom-event/yahoo-dom-event.js\"></script>\n";
	$formhtml .= "<script type=\"text/javascript\" src=\"/cn/forms/yui/build/connection/connection-min.js\"></script>\n";
	$formhtml .= "<script type=\"text/javascript\" src=\"/cn/forms/yui/build/datasource/datasource-min.js\"></script>\n";
	$formhtml .= "<script type=\"text/javascript\" src=\"/cn/forms/yui/build/autocomplete/autocomplete-min.js\"></script>\n";
	$formhtml .= "<script type=\"text/javascript\" src=\"datepicker.js\"></script>\n";
	$formhtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"cnaccount.css\">\n";
	$formhtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"datepicker.css\">\n";
	$formhtml .= "<style type=\"text/css\">.myAutoComplete {width:36em;  padding-bottom:1.7em;}</style>\n"; // otherwise, widget will expand to fill
	// $formhtml .= "<script type=\"text/javascript\">YAHOO.util.Event.onDOMReady(init_form);</script>\n";
	
	$formhtml .= "</head>\n<body class=\"yui-skin-sam\">"; 
    $formhtml .= "<center>\n<h2>Request to Remove CN Account</h2></center>";

    $formhtml .= "<center><form method=\"post\" action=\"\" >";
    $formhtml .= "<table id=\"frmtbl\" border=\"0\" width=\"770px\" style=\"border-spacing:1.4em; border-collapse:collapse; text-align: left;\"	cellspacing=\"0\">";
	


	
// Field: Requestor's Name
	$formhtml .= "<input type=\"hidden\" name=\"Requestors_Name\" id=\"req_name\" size=\"50\" maxlength=\"100\" value=\"$drn\" >";
	$successhtml .= "Requestor's Name: " . $_POST['Requestors_Name'] . "\n\n";


// Field: Requestor's Email Address	
	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;
	$formhtml .= "<tr class=\"$rowclass\"><td width=\"35%\"><label for=\"req_email\">Requestor's Email Address</label></td>";
	$formhtml .= "<td ><input type=\"text\" name=\"Requestors_Email\" id=\"req_email\" size=\"50\" maxlength=\"100\" value=\"$dre\" disabled>\n";
	$formhtml .= "<input type=\"hidden\" name=\"Hidden_Requestors_Email\" id=\"hid_req_email\" value=\"$dre\" >\n";
	$formhtml .= "</td></tr>";	// Avoids JavaScript to enable/disable the main field
	$successhtml .= "Requestor's Email: ". $_POST['Hidden_Requestors_Email'] . "\n\n";

	
//========================================================================================


// Field: Account to Delete
	$tmpval = "";
	$fieldstyle = "";

	if ($processform)
	{
		$tmpval = trim ($_POST['Account_Name']);
		$fieldstyle = ( preg_match ($rgxnonempty, $tmpval ) ) ? "" : $invalidstyle;
		if ($fieldstyle)
			++$errorcount;
		else
			$successhtml .= "Account to Terminate: " . $_POST['Account_Name'] . "\n\n";
	}
	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;	
	$formhtml .= "<tr class=\"$rowclass\"><td><label for=\"acct_name\">Account to Terminate</label></td>";
    $formhtml .= "<td>\n<div id=\"TermAutoComplete\" class=\"myAutoComplete\"><input type=\"text\" name=\"Account_Name\" id=\"acct_name\" size=\"50\" maxlength=\"100\" value=\"$tmpval\" $fieldstyle >\n";
	$formhtml .= "<div id=\"term_email_container\"></div></div>\n</td>\n</tr>\n";
// **********		


// Field: Supervisor's email
// ---------  Need to pull supervisor info from previous field
	$fieldstyle = "";
	$tmpval = $_POST["Supervisors_Email"] ; // default value from LDAP query on account to be deleted using AJAX lookup
    if ($processform)
	{
		$tmpval = trim($_POST["Supervisors_Email"]);
		$fieldstyle = ( preg_match ($rgxemail , $tmpval ) )  ?  ""  :  $invalidstyle;
		if ($fieldstyle)
			++$errorcount;
		else
			$successhtml .= "Supervisor's Email: " . $_POST["Supervisors_Email"] . "\n\n";

	}
	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;
    $formhtml .= "<tr class=\"$rowclass\">\n<td>\n<label for=\"sup_email\">Departing Employee's Supervisor's Email Address</label>\n</td>\n";
    $formhtml .= "<td>\n<div id=\"SuperAutoComplete\" class=\"myAutoComplete\">\n<input type=\"text\" name=\"Supervisors_Email\" id=\"sup_email\" size=\"50\" maxlength=\"100\" value=\"$tmpval\" $fieldstyle >\n";
	$formhtml .= "<div id=\"SUAC\"></div>\n</div>\n</td>\n</tr>\n";
	// **** double-check "$manager_email" works OK -- is it retrieving correct information?
	// IMPORTANT NOTE: See near bottom of page "$formhtml .= file_get_contents("newacctAC.html");"
// **********		


// Field: Department
	$tmpval = $_POST['Department'];
	$fieldstyle = "";
    if ($processform)
	{
		$tmpval = trim($_POST["Department"]);
		$fieldstyle = ( preg_match ($rgxnonempty , $tmpval ) )  ?  ""  :  $invalidstyle;
		if ($fieldstyle)
			++$errorcount;
		else
			$successhtml .= "Department: " . $_POST["Department"] . "\n\n";
	}	
	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;
    $formhtml .= "<tr class=\"$rowclass\"><td><label for=\"term_dept\">Departing Employee's Department</label></td><td><input type=\"text\" name=\"Department\" id=\"term_dept\" size=\"50\" maxlength=\"100\" value=\"$tmpval\"></td></tr>\n";
    
// **********	
 
 
// Field: Account Termination Date

	$tmpval = "";
	$fieldstyle = "";
	if ($processform)
	{
		$tmpval = trim ($_POST['Termination_Date']);
		$fieldstyle = ( strtotime($tmpval ) ) ? "" : $invalidstyle;
		if ($fieldstyle) 
			++$errorcount;
		else
			$successhtml .= "Date on which to close account: " . $_POST['Termination_Date'] . "\n\n";
	}
	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;
    $formhtml .= "<tr class=\"$rowclass\"><td><label for=\"term_date\">Date on which to close account</label></td><td><input type=\"text\" name=\"Termination_Date\" id=\"term_date\" value=\"$tmpval\" $fieldstyle><img src=\"images/Calendar-Logo-32x32.png\" align=\"middle\" onClick=\"GetDate(document.getElementById(escape('term_date')))\">";
    $formhtml .= "&nbsp;&nbsp;&nbsp;&nbsp;(click calendar icon to select)</td></tr>";
// **********

// Field: Special Circumstances

	$tmpval = isset($_POST['Discuss_With_IT_Manager']) ? "checked": "";
	$fieldstyle = "";

	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;
    $formhtml .= "<tr class=\"$rowclass\"><td><label for=\"mgr_contact\">Check this box if there are special circumstances which require discussion with an IT manager.</label></td><td><input type=\"checkbox\" name=\"Discuss_With_IT_Manager\" id=\"mgr_contact\" $tmpval ></td></tr>";
	$successhtml .= "Discuss with IT Manager: " . (($_POST['Discuss_With_IT_Manager'] == "on") ? "Yes": "No");
	$successhtml .= "\n\n";
    
// **********

// Field: Moving to another department
	$tmpval = isset($_POST['Moving_to_Another_Department']) ? "checked": "";
	$fieldstyle = "";

	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;
    $formhtml .= "<tr class=\"$rowclass\"><td><label for=\"term_move_ck\">Check this box if this person is moving to another department.</label></td>";
    $formhtml .= "<td><input type=\"checkbox\"  name=\"Moving_to_Another_Department\" id=\"term_move_ck\" $tmpval onClick=\"ck_enable_term_disposition()\"></td></tr>";
    $successhtml .= "Moving to another department: " . (($_POST['Moving_to_Another_Department'] == "on") ? "Yes": "No");
	$successhtml .= "\n\n";

// **********
	
// Field: Email disposition
	
	$ismoving = isset($_POST['Moving_to_Another_Department']);
	$deleteemail = isset($_POST['Delete_Email']) ? "checked" : "";
	$exportemail = isset($_POST['Export_Email']) ? "checked" : "";	
	$delegateemail = isset($_POST['Delegate_Email']) ? "checked" : "";
	$forwardemail = isset($_POST['Forward_Email']) ? "checked" : "";
	$exportto = trim($_POST['Export_Email_To']);
	$delegateto = trim($_POST['Delegate_Email_To']);
	$forwardto = trim($_POST['Forward_Email_To']);
	$edl = array();	// email disposition list
	$fieldstyle = "";
	if ($processform) $fieldstyle = ($ismoving or isset($_POST['Delete_Email']) or isset($_POST['Export_Email']) or isset($_POST['Delegate_Email']) or isset($_POST['Forward_Email'])) ? "" : $invalidstyle;
	if ($fieldstyle != "") ++$errorcount;
		
	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;
    $formhtml .= "<tr class=\"$rowclass\"><td>Email</td>\n";
	$formhtml .= "<td $fieldstyle><INPUT type=\"checkbox\" name=\"Delete_Email\" id=\"rb_delete_email\" $deleteemail onClick=\"ck_enable_term_disposition()\">Delete the email account.<BR>\n";
	if ( isset($_POST['Export_Email']) and ($exportto == "") )
	{
		$fieldstyle = $invalidstyle;
		++$errorcount;
	}
	else $fieldstyle = "";

    $formhtml .= "<div style=\"float:left; clear:both; text-indent: -2em; padding-left: 2em; \"><INPUT type=\"checkbox\" name=\"Export_Email\" id=\"rb_export_email\" $exportemail onClick=\"ck_enable_term_disposition()\">Export the contents of the Mailbox to a Personal Folder File (.PST File) and delete the email account.<BR><label for=\"export_email\" style=\"padding-left:2em; margin-top: 1em;\">Who should receive the exported mail archive(PST)?</label></div><br />\n";
    $formhtml .= "<span style=\"float:right; margin-right:4em;\"><input $fieldstyle  type=\"text\" name=\"Export_Email_To\" id=\"txt_export_email\" maxlength=\"90\" size=\"50\" value=\"$exportto\" disabled ></span>&nbsp;&nbsp;<BR>\n";

	if (isset($_POST['Delegate_Email']) and ($delegateto == ""))
	{
		$fieldstyle = $invalidstyle;
		++$errorcount;
	}
	else $fieldstyle = "";
	
    $formhtml .= "<div style=\"float:left; clear:both; text-indent: -2em; padding-left: 2em; \"><INPUT type=\"checkbox\" name=\"Delegate_Email\" id=\"rb_delegate_email\" $delegateemail onClick=\"ck_enable_term_disposition()\">Grant access to this mailbox by another person for 2 weeks.<br><label for=\"delegate_email\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delegate to which account?</label></div><br />\n";
    $formhtml .= "<span style=\"float:right; margin-right:4em;\"><input $fieldstyle type=\"text\" name=\"Delegate_Email_To\" id=\"txt_delegate_email\" maxlength=\"90\" size=\"50\" value=\"$delegateto\" disabled ></span>&nbsp;&nbsp;<BR>\n";

	if (isset($_POST['Forward_Email']) and ($forwardto == ""))
	{
		$fieldstyle = $invalidstyle;
		++$errorcount;
	}
	else $fieldstyle = "";
	
    $formhtml .= "<div style=\"float:left; clear:both; text-indent: -2em; padding-left: 2em; \"><INPUT type=\"checkbox\" name=\"Forward_Email\" id=\"rb_forward_email\" $forwardemail onClick=\"ck_enable_term_disposition()\">Delete the email account and forward email for two weeks.<br><label for=\"fwd_email\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forward to what email address?</label></div><br />\n";
    $formhtml .= "<span style=\"float:right; margin-right:4em;\"><input $fieldstyle type=\"text\" name=\"Forward_Email_To\" id=\"txt_fwd_email\" maxlength=\"90\" size=\"50\" value=\"$forwardto\" disabled ></span>&nbsp;&nbsp;<BR></td>\n";

	
	if ( !$ismoving )
	{
		if ($deleteemail != "") array_push ($edl, "Delete");
		if ($exportemail != "") array_push ($edl, "Export and give to " . $exportto);
		if ($delegateemail != "") array_push ($edl, "Delegate to " . $delegateto);
		if ($forwardemail != "") array_push ($edl, "Forward to " . $forwardto);
		
		$successhtml .= "Email Disposition: ";
		$successhtml .= join (', ', $edl);
		$successhtml .= "\n\n";
	}
	
// **********


// Field: Personal Files Disposition
	$deletefiles = $_POST['Personal_Files_Disposition'] == "deletefiles" ? "checked" : "";
	$movefiles = $_POST['Personal_Files_Disposition'] == "movefiles" ? "checked" : "";
	$nohome = $_POST['Personal_Files_Disposition'] == "nohome" ? "checked" : "";
	

	if ($processform)
	{
		$fieldstyle = "";
		if ( !$ismoving ) $fieldstyle = ( ($deletefiles . $movefiles . $nohome) == "") ? $invalidstyle : "";
		if ( ($movefiles != "") and (trim($_POST['Move_Files_To']) == "") ) $mf_fieldstyle .= $invalidbare;
		if ( ($fieldstyle != "") )
			++$errorcount;
		else
		{
			switch ($_POST['Personal_Files_Disposition'])
			{
				case 'deletefiles': $successhtml .= "Personal Files Disposition: Delete Files\n\n"; break;
				case 'movefiles': $successhtml .= "Personal Files Disposition: Move Files to {$_POST['Move_Files_To']}\n\n"; break;
				case 'nohome': $successhtml .= "Personal Files Disposition: No Personal Files\n\n"; break;
			}
		} //switch
	}

	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;
    $formhtml .= "<tr class=\"$rowclass\"><td>Personal Network Space on CN-Home<BR />(i.e. P: Drive)</td><td  $fieldstyle style=\"padding-top: 2em;\">";

	if ( ($movefiles != "") and ($_POST['Move_Files_To'] == "") )
	{
		$fieldstyle = $invalidstyle;
		++$errorcount;
	}
	else $fieldstyle = "";	
	$moveto = $_POST['Move_Files_To'];
	

    $formhtml .= "<div style=\"float:left; clear:both; text-indent: -2em; padding-left: 2em;\"><INPUT type=\"radio\" name=\"Personal_Files_Disposition\" id=\"rb_deletefiles\" value=\"deletefiles\" $deletefiles onClick=\"ck_enable_term_disposition()\">Delete all files in the user's Personal Network Space, they are no longer needed.</div><br>\n";
    $formhtml .= "<div style=\"float:left; clear:both; text-indent: -2em; padding-left: 2em; \"><INPUT type=\"radio\" name=\"Personal_Files_Disposition\" id=\"rb_move_files\" value=\"movefiles\" $movefiles onClick=\"ck_enable_term_disposition()\">Move all files to supervisor-approved location.<br><label for=\"rb_move_files\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Please specify:</label></div>\n";
	$formhtml .= "<span style=\"float:right; margin-right:4em;\"><input $fieldstyle type=\"text\" name=\"Move_Files_To\" id=\"txt_move_files\" maxlength=\"90\" size=\"50\" disabled value=\"$moveto\" ></span><br>\n";
	$formhtml .= "<div style=\"float:left; clear:both; text-indent: -2em; padding-left: 2em; \"><INPUT type=\"radio\" name=\"Personal_Files_Disposition\" id=\"rb_nohome\" value=\"nohome\" $nohome onClick=\"ck_enable_term_disposition()\">User has no Personal Network Space.<BR></dvi>\n";
    $formhtml .= "</td></tr>\n";

	
// *********



// Field: Comments	
	$tmpval = $_POST['Comments'];
	$rowclass = ($rowcounter % 2) ? "oddrow" : "evenrow";
	++$rowcounter;	
    $formhtml .= "<tr class=\"$rowclass\"><td><label for=\"remove_comments\">Additional Comments</label></td><td><textarea name=\"Comments\" id=\"remove_comments\" rows=\"8\" cols=\"60\">$tmpval</textarea></td></tr>";
	$successhtml .= "Comments: " . $_POST['Comments'];
	$successhtml .= "\n\n";

	
// Additional info: Delegate info	
	$delacctinfo = get_userinfo($_POST['Account_Name'], "mail"); // LDAP query for requestor info
	$delegateshtml = "This account has Delegate rights to the following accounts: " . "\n";
	for ($i = 0; $i < count($delacctinfo['publicdelegatesbl']); ++$i)
	{
		$delegateshtml .= "\t" . $delacctinfo['publicdelegatesbl'][$i] . "\n";
	}
	$delegateshtml .= "The following accounts have Delegate rights to this account: " . "\n";	
	for ($i = 0; $i < count($delacctinfo['publicdelegates']); ++$i)
	{
		$delegateshtml .= "\t" . $delacctinfo['publicdelegates'][$i] . "\n";
	}
	$successhtml .= $delegateshtml;

// Additional info: Mail-enabled Messaging
	$formhtml .= "<input type=\"hidden\" name=\"Voice_Mail\" id=\"voice_mail\" size=\"50\" maxlength=\"100\" value = \"{$_POST['Voice_Mail']}\">";
	$successhtml .= "Associate Voicemail Phone#: " . $_POST['Voice_Mail'] . "\n\n";
	$successhtml .= "This is the authenticated user:" . $_SERVER['AUTH_USER'] . "\n\n";

// ========================================================================================

// **********

    $formhtml .= "</table><br><br><input type=\"submit\" name=\"submit\" value=\"Submit\" id=\"frm_submit\">\n</form></center>\n";
 	$formhtml .= file_get_contents("removeacct.html") . "\n"; // JavaScript
	$formhtml .= "<script type=\"text/javascript\">init_form();</script>\n";

	$formhtml .= "</body>\n</html>\n";
	if ($errorcount > 0) // display the form
	{
		if ($processform)
		{
			echo "<br><center><H3>Please double-check the information in the <span $invalidstyle>indicated</span> fields.</H3></center>\n";
		}
		echo $formhtml . "<br><br><br>";
	}
	else
	{
		mail_results( $successhtml, $_POST['Account_Name'], $_POST['Requestors_Name'], $_POST['Hidden_Requestors_Email'], $_POST["Supervisors_Email"]); 
		echo "<h3>The following information has been submitted to the Community Network for processing.</h3><br><br>";
		echo str_replace  ("\n", "<br>\n" , $successhtml ) . "<br><br>";
		echo ("<a href=\"https://tss.oregonstate.edu/cn/forms/newacct.php\">Click here to add an account</a><br><br>");
		echo ("<a href=\"https://tss.oregonstate.edu/cn/forms/removeacct.php\">Click here to remove an account</a>");
		return 0;
	}
	exit;
// ************************
// END OF MAIN SCRIPT FLOW
// ************************
	
function mail_results($message, $Account_Name, $Requestor_Name, $Requestor_Email, $Supervisor_Email )
{
	$message = str_replace("''", "'", $message);
	$subject = "Request to remove account -- " . $Account_Name;
	$from = '"' . $Requestor_Name . '"' . " <" . $Requestor_Email . ">\n";
	$extra_headers = "From: " . $from;

	//mail ("richard.turk@oregonstate.edu", $subject, $message, $extra_headers) or die ("Unable to send email to accounts queue -- please recheck the email address.");	// 
	mail ("kenneth.howard@oregonstate.edu", $subject, $message, $extra_headers) or die ("Unable to send email to accounts queue -- please recheck the email address.");
	mail ("cn.accounts@helpdesk.oregonstate.edu", $subject, $message, $extra_headers) or die ("Unable to send email to accounts queue -- please recheck the email address.");	// send to helpdesk to create a ticket; HelpDesk requires quotation marks around Requestor's Name, while other recipients don't like it
	// $from= $Requestor_Name . " <" . $Requestor_Email . ">\n";
	$from= "CN Accounts <cn.accounts@helpdesk.oregonstate.edu>\n";
	$extra_headers = "From: " . $from;
	mail ($Requestor_Email . "," .  $Supervisor_Email, $subject, $message, $extra_headers) or die ("Unable to send email -- please recheck email addresses..");	// send to other recipients
	
} // mail_results()	
	
	
	
?>