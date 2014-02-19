<?php

function verify_user($user, $propvalue)
{

	if(preg_match ("/^[0-9a-z]([-.\w]*[0-9a-z])*@(oregonstate\.edu)|(onid.oregonstate\.edu)|(onid.orst\.edu)|(orst\.edu)|(ous\.edu)$/i" , $user )){ //if the customer entered an email
		$propvalue = "mail";
	}
	else if(strpos($user, '/')){ //if the customer entered the wrong slash
		$user = str_replace('/', '\\', $user);
	}

	return get_userinfo($user, $propvalue);

}

function get_userinfo($propvalue, $byproperty, $fullresults=false) // query LDAP server for basic info about logged-in user and return it as an associative array; $byproperty indicates the query field; if $fullresults is true, don't parse the results, just return the entire LDAP query result set.
{
	$SearchAttrib=$byproperty;

	switch (strtolower($SearchAttrib))
	{
		case strtolower('sAMAccountName'):
            $propvalue=explode("\\", $propvalue);
            if (strtolower($propvalue[0]) == "onid")
            {
                //$LDAP_Base_DN = "OU=onid,DC=onid,DC=oregonstate,DC=edu";
				$LDAP_Base_DN = "OU=onid,DC=onid,DC=oregonstate,DC=edu"; // OU=onid,DC=onid,DC=oregonstate,DC=edu / (&(objectclass=user)(sAMAccountName=turkr))
            }
            else
            {	
                $LDAP_Base_DN = "DC=tss,DC=oregonstate,DC=edu";
            }   	
            $filter = "(&(objectclass=user)(" . $SearchAttrib . "=" . end($propvalue) . "))";
            break;
		case strtolower('distinguishedName'):
			$propvalue = str_replace('\\', "", $propvalue); // remove backslashes to allow parsing
			$LDAP_Base_DN = substr($propvalue, stripos($propvalue, "ou="));  // grab the location
			$propvalue = substr($propvalue, 3, stripos($propvalue, "ou=") - 4);
			$filter = "(&(objectclass=user)(cn=" . $propvalue . "))";
			break;
		case strtolower('mail'):
			$LDAP_Base_DN = "DC=oregonstate,DC=edu";	// email addresses should be unique, so start at the top
			$filter = "(&(objectclass=user)(mail=" . $propvalue . "))";
			break;
		case strtolower('displayname');
			$propvalue .= '*';
			$LDAP_Base_DN = "DC=tss,DC=oregonstate,DC=edu";	
			$filter = "(&(objectclass=user)(displayname=" . $propvalue . "))";
			break;
		case strtolower('fqdn'):
			$LDAP_Base_DN = "DC=oregonstate,DC=edu";	
			// echo "<br>$propvalue<br>\n";
			$filter = "(&(distinguishedName=" . $propvalue . "))";
			break;			
		default:
            die("Default.");
	} // switch          
            
	$LDAP_Server = "gc.tss.oregonstate.edu";
	$LDAP_Port = "3268";
	$UPNtoBind = "bzbind@tss.oregonstate.edu";
	$PWtoBind = "Tri%Oli73";

	
	$attributes = array("telephoneNumber", "cn", "sn", "givenname", "mail", "department", "description", "canonicalName", "name", "sAMAccountName", "extensionAttribute1", "extensionAttribute2", "extensionAttribute5","extensionAttribute10", "displayname", "telephoneNumber", "manager", "distinguishedName", "facsimileTelephoneNumber", "proxyAddresses");
	
	// Attribute Name to look for => Attribute value, Support Team name and phone, HD Queue
	
	$myCon = ldap_connect($LDAP_Server,$LDAP_Port) or die("Can't connect to LDAP server");
	//echo "<br>Connection Status=".$myCon;
	if($myCon)
	{
		$bnd=ldap_bind($myCon,$UPNtoBind,$PWtoBind) or die("Authenticate failed");
	}
	
	//ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION,3);
	//ldap_set_option($ds, LDAP_OPT_REFERRALS,0);
    
	
	$sr=ldap_search($myCon,$LDAP_Base_DN, $filter) or die("<br><br>ldap_search failed <br>{$GLOBALS["debugout"]}");
//	$sr=ldap_search($myCon,$LDAP_Base_DN, $filter,$attributes,0, 200) or die("ldap_search failed = $sr." );
	
	$users = ldap_get_entries($myCon, $sr);
	ldap_close($myCon);
	
	// display info



//	echo "Number of results = " . $users['count'] . "<br><br>\n";
//	echo "<br />Number of results = " . count($users) . "<br><br>\n";
//	echo "Display Name: " . $users[0]['displayname'][0] . "<br>\n";
//	echo "Phone Number: " . $users[0]['telephonenumber'][0] . "<br>\n";
//	echo "Email Address:" . $users[0]['mail'][0] . "<br>\n";
//	echo "Other        :" . $users[0]['badPasswordTime'][0] . "<br>\n";

	$r['displayname'] = $users[0]['displayname'][0];
	//$r['telephonenumber'] = $users[0]['telephonenumber'][0];
	$r['mail'] = $users[0]['mail'][0];
	$r['givenname'] = $users[0]['givenname'][0];
    //$r['manager'] = $users[0]['manager'][0];
    $r['department'] = $users[0]['department'][0];
    //$r['facsimileTelephoneNumber'] = $users[0]['facsimiletelephonenumber'][0];
    //$r['proxyaddresses'] = $users[0]['proxyaddresses'];
	//$r['publicdelegatesbl'] = $users[0]['publicdelegatesbl'];
	//$r['publicdelegates'] = $users[0]['publicdelegates'];


	if ($fullresults)
    {
    	return $users;
    }
    else
    {
		return ($r);
	}
}

/*
function ldapinfo($s)
{
	if ($s == "")
	{
		return "";
	}
	return 'value="' . $s . '"';
}
*/

function ldap_escape($str, $for_dn = false)
{
   
    // see:
    // RFC2254
    // http://msdn.microsoft.com/en-us/library/ms675768(VS.85).aspx
    // http://www-03.ibm.com/systems/i/software/ldap/underdn.html       
    // lifted from PHP docs page for ldap_search: douglass_davis at earthlink dot net
       
    if  ($for_dn)
        $metaChars = array(',','=', '+', '<','>',';', '\\', '"', '#');
    else
        $metaChars = array('*', '(', ')', '\\', chr(0));

    $quotedMetaChars = array();
    foreach ($metaChars as $key => $value) $quotedMetaChars[$key] = '\\'.str_pad(dechex(ord($value)), 2, '0');
    $str=str_replace($metaChars,$quotedMetaChars,$str); //replace them
    return ($str);
} 

function quote_string($str)
{
	return "\"{$str}\"";
}

function get_field_params($formfield, $regx)
{
	$tmpval = "";
	$fieldstyle = "";
	$tmpval = $manager_email ; // default value from LDAP query
    if (isset($_POST["Supervisors_Email"]))
	{
		$tmpval = $_POST["Supervisors_Email"];
		if (preg_match ("/^[0-9a-z]([-.\w]*[0-9a-z])*@(oregonstate\.edu)|(orst\.edu)|(ous\.edu)$/i" , $tmpval ) ) // "/i" supposedly means case insensitive search
		{
			$fieldstyle="";
		}
		else
		{
			$fieldstyle = "style=\"border-style:ridge; border-width:medium; border-color:red\"";
		}
	}

}



?>