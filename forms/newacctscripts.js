jQuery(function($)
{
	//select2 autocomplete
	window.tempdata = {results:[]};

	$('.email-autocomplete').select2
	({
		minimumInputLength: 2,
		width: '350px',
		quietMillis: 100,
		ajax:
		{
			url: "ad-lookup.php",
			dataType: "json",
			data: function (term, page)
			{
				return "q=" + term.replace(" ","%20");
			},
			results: function(data, page)
			{
				return data;
			}
		},
		formatResult: function(result)
		{
			return result.name + " - " + result.mail;
		},
		formatSelection: function(result)
		{
			return result.mail;
		}
	});

	// Special version of the autocomplete for one form in remove acct
	// only difference is one line.
	$('.email-autocomplete-special').select2
	({
		minimumInputLength: 2,
		width: '350px',
		quietMillis: 100,
		ajax:
		{
			url: "ad-lookup.php",
			dataType: "json",
			data: function (term, page)
			{
				return "q=" + term.replace(" ","%20");
			},
			results: function(data, page)
			{
				return data;
			}
		},
		formatResult: function(result)
		{
			return result.name + " - " + result.mail;
		},
		formatSelection: function(result)
		{
			$('input#dp-dpt').val(result.dept);
			return result.mail;
		}
	});
	
	// Date fill out function for account removal page.
	$(function()
	{
		$('input#date').datepicker();
	});

	//checking date
	$('.needdate').change(function()
	{
		var curr = Math.round(+new Date() / 1000 / 60 / 60 / 24); //current day num
		var selected = $(this).val();
		var splitSelected = selected.split('/');
		var dateSelected = new Date(splitSelected[2], splitSelected[0]-1, splitSelected[1]);
		var newSelected = Math.round(dateSelected.getTime() / 1000 / 60 / 60 / 24);
		var diff = newSelected - curr + 1;
		//iterate through the days to check if there are weekend days
		// for (count = 0; count <= diff; count++)
// 		{
// 			var date = new Date((curr + count) * 60 * 60 * 24 * 1000);
// 			var day = date.getDay();
// 			if (day == 0 || day == 6) //sunday or saturday
// 			{
// 				diff--;
// 			}
// 		}
// 		var errors = $(this).parent().children('div.error').length;
// 		if (diff <= 3 && errors === 0)
// 		{
// 			//var message = "<div class='error'>You have selected a date that provides less than three business days lead time for account creation. While we will make every effort to have the account created quickly, please follow up with us via phone at (541) 737-8787 (Option #2) after submitting the request if this is a rush.</div><br>";
// 			$(this).parent().append(message);
// 		}
// 		else if (diff > 3 && errors !== 0)
// 		{
// 			$(this).parent().children('div.error').remove();
// 		}
	});

	$(function(){
		$('#device-type').change(function(){
			if($(this).val() == ""){
				$('#device-type-help').show();
			}
			else{
				$('#device-type-help').hide();
			}
		});
	});
	$(function(){
		$('#mac-os').change(function(){
			if($(this).val() == ""){
				$('#mac-hardware-help').show();
			}
			else{
				$('#mac-hardware-help').hide();
			}
		});
	});
	$(function(){
		$('#windows-os').change(function(){
			if($(this).val() == ""){
				$('#windows-hardware-help').show();
			}
			else{
				$('#windows-hardware-help').hide();
			}
		});
	});
	$(function(){
		$('#mac-laptop').change(function(){
			if($(this).val() == ""){
				$('#mac-laptop-help').show();
			}
			else{
				$('#mac-laptop-help').hide();
			}
		});
	});
	$(function(){
		$('#windows-laptop').change(function(){
			if($(this).val() == ""){
				$('#windows-laptop-help').show();
			}
			else{
				$('#windows-laptop-help').hide();
			}
		});
	});
	// Functions for hiding the user info and also
	// a toggle for showing again.
	
	// Toggle class changing for both toggles.
	$('.toggle').click(function(){
		$(this).addClass('toggle-click');
	});
	
	$('.toggle').hover(function(){
		$(this).toggleClass('toggle-hover');
	});
	
	// Checks if form is filled.
	function checkInfo()
	{
		if ($('#email-address').val() != "" &&
			$('#cn-user').val() != "" &&
			$('#phone-number').val() != "" &&
			$('#dept-number').val() != "" &&
			$('select.account-type-select').val() != ""){
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	// Hides form and reveals toggle key
	function hideInfo()
	{
		$('.user-info').hide(300);
		$('#toggle1').text("Show Contact Info");
		$('#toggle1').show();
	}
	
	// Toggle key logic
	$('#toggle1').click(function()
	{
		$('.user-info').toggle(300);
		if ($(this).text() == "Show Contact Info")
		{
			$(this).text("Hide Contact Info");
		}
		else
		{
			$(this).text("Show Contact Info");
		}
	});
	
	// Four functions checking for changes in form to detect when to hide.
	// Probably will want to add some sort of validation/form checking first.
	$('#email-address').change(function()
	{
		if (!validateEmail($('input#email-address')) && 
		checkInfo() && $('#toggle1').is(':visible') == false)
		{
			hideInfo();
		}
	});

	$('#cn-user').change(function()
	{
		if (!validateTextField($('input#cn-user')) && 
		checkInfo() && $('#toggle1').is(':visible') == false)
		{
			hideInfo();
		}
	});
	
	$('#phone-number').change(function()
	{
		if (!validatePhoneNumber($('input#phone-number')) && 
		checkInfo() && $('#toggle1').is(':visible') == false)
		{
			hideInfo();
		}
	});
	
	$('#dept-number').change(function()
	{
		if (!validateTextField($('input#dept-number')) && 
		checkInfo() && $('#toggle1').is(':visible') == false)
		{
			hideInfo();
		}
	});
	
	// Functions for hiding the main options
	
	// Condition for hiding.
	$('.main-select').change(function()
	{
		if ($('#toggle2').is(':visible') == false)
		{
			if ($('#mac-laptop').val() != "" ||
				$('#mac-desktop').val() != "" ||
				$('#windows-laptop').val() != "" ||
				$('#windows-desktop').val() != "")
			{
				hideMain();
			}
		}
	});
	
	// Hides form and reveals toggle key
	function hideMain()
	{
		$('.main-select').hide(300);
		$('#toggle2').text("Show Computer Info");
		$('#toggle2').show();
	}
	
	// Toggle key logic
	$('#toggle2').click(function()
	{
		$('.main-select').toggle(300);
		if ($(this).text() == "Show Computer Info")
		{
			$(this).text("Hide Computer Info");
		}
		else
		{
			$(this).text("Show Computer Info");
		}
	});	
	
	// Special function just for hiding/showing monitor options for different
	// computer configurations. I gave it a separate function since then I could just
	// call it for both the laptop/desktop accessories rather than write them twice.
	function monitorAcc()
	{
		$('div.windows-monitors').hide();
		$('div.apple-monitors').hide();
		if ($('select#need-help').val() == 'help-needed'){
			if ($('select#device-type').val() == 'mac-os'){
				$('div.apple-monitors').show();
			}
			else {
				$('div.windows-monitors').show();
			}
		}
		else
		{
			if ($('input#selection-option-4').prop('checked') == true ||
			$('input#selection-option-5').prop('checked') == true ||
			$('input#selection-option-6').prop('checked') == true ||
			$('input#selection-option-1').prop('checked') == true ||
			$('input#selection-option-2').prop('checked') == true ||
			$('input#selection-option-3').prop('checked') == true){
				$('div.apple-monitors').show();
			}
			else {
				$('div.windows-monitors').show();
			}
		}
		
		// Apple laptop
		if ($('input#a-laptop-tb').prop('checked') == true){
			$('div#a-laptop-xtra').show();
		}
		else
		{
			$('div#a-laptop-xtra').hide();
		}
		if ($('input#a-laptop-xtra').prop('checked') == true){
			$('div#a-laptop-options').show();
		}
		else
		{
			$('div#a-laptop-options').hide();
		}
		
		// Windows laptop
		if ($('input#w-laptop').prop('checked') == true){
			$('div#w-laptop').show();
		}
		else
		{
			$('div#w-laptop').hide();
		}
		
		// Apple desktop
		if ($('input#desktop-tb').prop('checked') == true){
			$('div.tb-extra').show();
		}
		else
		{
			$('div.tb-extra').hide();
		}
		if ($('input#desktop-xtra').prop('checked') == true){
			$('div#a-desktop-options').show();
		}
		else
		{
			$('div#a-desktop-options').hide();
		}
		
		// Windows desktop
		if ($('input#w-desktop').prop('checked') == true){
			$('div#w-options').show();
		}
		else
		{
			$('div#w-options').hide();
		}
	}
	
	// Special function for accessories menu reveal.
	$('.desktop-accessories').change(function()
	{
		monitorAcc();
		if ($('input#speakers').prop('checked') == true)
		{
			$('.speaker-options').show();
		}
		else
		{
			$('.speaker-options').hide();
		}
		
		if ($('input#keyboard').prop('checked') == true &&
			($('select#device-type').val() == 'windows-os' ||
			$('input#selection-option-7').prop('checked') == true ||
			$('input#selection-option-8').prop('checked') == true))
		{
			$('.keyboard-options').show();
		}
		else
		{
			$('.keyboard-options').hide();
		}
		
		if ($('input#mouse').prop('checked') == true &&
			($('select#device-type').val() == 'windows-os' ||
			$('input#selection-option-7').prop('checked') == true ||
			$('input#selection-option-8').prop('checked') == true))
		{
			$('.mouse-options').show();
		}
		else
		{
			$('.mouse-options').hide();
		}
	});
	
	// Special function for laptop accessories
	$('.laptop-accessories').change(function()
	{
		monitorAcc();
		if (($('select#device-type').val() == 'mac-os' &&
			$('select#mac-os').val() == 'mac-laptop') ||
			$('input#selection-option-4').prop('checked') == true ||
			$('input#selection-option-5').prop('checked') == true ||
			$('input#selection-option-6').prop('checked'))
		{
			$('.dock').hide();
		}
		else
		{
			$('.dock').show();
		}
		if ($('input#hd').prop('checked') == true)
		{
			$('.hd-options').show();
		}
		else
		{
			$('.hd-options').hide();
		}
		if ($('input#a-laptop-tb').prop('checked') == false){
			$('input#a-laptop-xtra').prop('checked', false);
		}
	});
	
	// Checkbox clear function 
	function checkboxClear()
	{
		$('input.accessories').each(function(i)
		{
			$(this).prop('checked', false);
		});
		$('.hd-options').hide();
		$('.speaker-options').hide();
		$('.keyboard-options').hide();
		$('.mouse-options').hide();
	}
	
	// Normal select functions.
	$('select.account-type-select').change(function()
	{
		$('div.account-menu').hide(100);
		$('select.account-type-select-2').val("");
		$('select.account-type-select-2').change();
		if(checkInfo()){
			hideInfo();
		}
		// For unchecking and revealing the table for nohelp
		for(var i = 1; i < 12; ++i){
			if($('input#selection-option-' + i).prop("checked") == true){
				$('input#selection-option-' + i).prop("checked", false);
			}
			for(var i = 1; i< 12; ++i){
				$('tr#selection-option-' + i).show();
			}
			$('.apple-desktop-table').show();
			$('.apple-laptop-table').show();
			$('.windows-desktop-table').show();
			$('.windows-laptop-table').show();
		}
		if ($(this).val() != "")
		{
			$('div.' + $(this).val()).show(100);
		}
	});
	$('select.account-type-select-2').change(function()
	{
		$('div.account-menu-2').hide(100);
		$('select.account-type-select-3').val("");
		$('select.account-type-select-3').change();
		if ($(this).val() != "")
		{
			$('div.' + $(this).val()).show(100);
		}
	});
	$('select.account-type-select-3').change(function()
	{
		$('div.account-menu-3').hide(100);
		$('select.account-type-select-4').val("");
		$('select.account-type-select-4').change();
		if ($(this).val() != "")
		{
			$('div.' + $(this).val()).show(100);
			
		}
	});
	
	// Modified this one to reveal my accessory menus as well.
	// Also added for it to hide the menus after this one is changed.
	$('select.account-type-select-4').change(function()
	{
		$('div.account-menu-4').hide(100);
		$('tr.selection-option').hide(100);
		$('select.account-type-select-5').val("");
		$('select.account-type-select-5').change();
		if ($(this).val().indexOf('laptop') != -1 && $(this).val() != "")
		{
			checkboxClear();
			monitorAcc();
			$('div.' + $(this).val()).show(100);
			$('tr.' + $(this).val()).show(100);
			$('div.laptop-accessories').show(100);
			
		}
		else if ($(this).val().indexOf('desktop') != -1 && $(this).val() != "")
		{
			checkboxClear();
			monitorAcc();
			$('div.' + $(this).val()).show(100);
			$('tr.' + $(this).val()).show(100);
			$('div.desktop-accessories').show(100);
		}

	});
	// End modifications
	
	$('select.account-type-select-5').change(function()
	{
		$('div.account-menu-5').hide(100);
		$('select.account-type-select-6').val("");
		$('select.account-type-select-6').change();
		if ($(this).val() != "")
		{
			$('div.' + $(this).val()).show(100);
		}
	});
	$('select.account-type-select-6').change(function()
	{
		$('div.account-menu-6').hide(100);
		$('select.account-type-select-7').val("");
		$('select.account-type-select-7').change();
		if ($(this).val() != "")
		{
			$('div.' + $(this).val()).show(100);
		}
	});
	$('input#need-share-permissions').change(function()
	{
		if ($(this).attr('checked'))
		{
			$('div#mirror-permissions').show(100);
			$('div#which-shared-folders').show(100);
		}
		else
		{
			$('div#mirror-permissions').hide(100);
			$('div#which-shared-folders').hide(100);
		}
	});
	$('input#can-mirror-permissions').change(function()
	{
		if ($(this).attr('checked'))
		{
			$('div#mirror-permissions-from').show(100);
			$('div#which-shared-folders').hide(100);
		}
		else
		{
			$('div#mirror-permissions-from').hide(100);
			$('div#which-shared-folders').show(100);
		}
	});
	$('select#calendar-style').change(function()
	{
		if ($(this).val() == "automatic-processing")
		{
			$('div.yes-auto-proc-room').show(100);
			$('div.no-auto-proc-room').hide(100);
		}
		else
		{
			$('div.yes-auto-proc-room').hide(100);
			$('div.no-auto-proc-room').show(100);
		}
	});
	$(function()
	{
		$('input.datepicker').datepicker();
	});
	
	//specific form urls
	var getVars = getUrlVars();
	var type = getVars['type'];
	if (type == 'student-employee')
	{
		$('select#account-type').val('person-account-type');
		$('select#person-account-type').val('student-employee');
		$('select#account-type').trigger('change');
		$('select#person-account-type').trigger('change');
	}
	else if (type == 'regular-employee')
	{
		$('select#account-type').val('person-account-type');
		$('select#person-account-type').val('regular-employee');
		$('select#account-type').trigger('change');
		$('select#person-account-type').trigger('change');
	}
	else if (type == 'email-only')
	{
		$('select#account-type').val('person-account-type');
		$('select#person-account-type').val('email-only');
		$('select#account-type').trigger('change');
		$('select#person-account-type').trigger('change');
	}
	else if (type == 'general-use-mailbox')
	{
		$('select#account-type').val('general-use-mailbox');
		$('select#account-type').trigger('change');
	}
	else if (type == 'general-use-calendar')
	{
		$('select#account-type').val('general-use-calendar-options');
		$('select#general-use-calendar-type').val('general-use-calendar');
		$('select#account-type').trigger('change');
		$('select#general-use-calendar-type').trigger('change');
	}
	else if (type == 'room-calendar')
	{
		$('select#account-type').val('general-use-calendar-options');
		$('select#general-use-calendar-type').val('room-calendar');
		$('select#account-type').trigger('change');
		$('select#general-use-calendar-type').trigger('change');
	}
	else
	{
		$('select#account-type').val("");
		$('select#person-account-type').val("");
		$('seleect#general-use-calendar-type').val("");
		$('select#account-type').trigger('change');
		$('select#person-account-type').trigger('change');
		$('select#general-use-calendar-type').trigger('change');
	}
	// Special function for accessories menu reveal.
	$('.desktop-accessories').change(function()
	{
		if ($('input#speakers').prop('checked') == true)
		{
			$('.speaker-options').show();
		}
		else
		{
			$('.speaker-options').hide();
		}
		
		if ($('input#keyboard').prop('checked') == true &&
			($('select#device-type').val() == 'windows-os' ||
			$('input#selection-option-7').prop('checked') == true ||
			$('input#selection-option-8').prop('checked') == true))
		{
			$('.keyboard-options').show();
		}
		else
		{
			$('.keyboard-options').hide();
		}
		
		if ($('input#mouse').prop('checked') == true &&
			($('select#device-type').val() == 'windows-os' ||
			$('input#selection-option-7').prop('checked') == true ||
			$('input#selection-option-8').prop('checked') == true))
		{
			$('.mouse-options').show();
		}
		else
		{
			$('.mouse-options').hide();
		}
		
	});
	
	// Special function for laptop accessories
	$('.laptop-accessories').change(function()
	{
		if ($('input#hd').prop('checked') == true)
		{
			$('.hd-options').show();
		}
		else
		{
			$('.hd-options').hide();
		}
	});

	//Hoverbox functions
	$(function(){
		var moveLeft = 20;
		var moveDown = 20;
		$('.hoverbox').mouseenter(function()
		{
			moveDown = 20;
			$('#applications-list').show(200);
			
				moveDown = moveDown - 2/5*($(window).height());
	      
		});
		$('.hoverbox').mouseleave(function()
		{
			$('#applications-list').hide(200);
		});
		$('.hoverbox').mousemove(function(e)
		{
			
			
			topD = e.pageY + moveDown;
			leftD = e.pageX + moveLeft;
			$('#applications-list').css('top', topD).css('left', leftD);
		});
	});
	$(document).ready(function()
	{
		$('#applications-list').hide();
	});
	
	// Hide all but selected computer and allow the unselection of said computer
	$('.computer-list').change(function(){
		for(var i = 1; i< 12; ++i){
			$('tr#selection-option-' + i).hide();
		}
		checkboxClear();
		$('.desktop-accessories').hide();
		$('.laptop-accessories').hide();
		$('.apple-desktop-table').hide();
		$('.apple-laptop-table').hide();
		$('.windows-desktop-table').hide();
		$('.windows-laptop-table').hide();

		var bool = 0;
		for(var i = 1; i < 12; ++i){
			if($('input#selection-option-' + i).prop('checked') == true){
				$('tr#selection-option-' + i).show();
				bool = 1;
				if(i <= 3){
					$('.apple-desktop-table').show();
					$('.desktop-accessories').show();
				}
				else if(i > 3 && i <= 6){
					$('.apple-laptop-table').show();
					$('.laptop-accessories').show();
				}
				else if(i > 6 && i <= 8){
					$('.windows-desktop-table').show();
					$('.desktop-accessories').show();
				}
				else if(i > 8 && i <= 11){
					$('.windows-laptop-table').show();
					$('.laptop-accessories').show();
				}
			}
		}
		if(bool == 0){
			for(var i = 1; i< 12; ++i){
				$('tr#selection-option-' + i).show();
			}
			$('.apple-desktop-table').show();
			$('.apple-laptop-table').show();
			$('.windows-desktop-table').show();
			$('.windows-laptop-table').show();
		}

		});

	// Checkbox clear function (currently working)
	function checkboxClear()
	{
		$('input.accessories').each(function(i)
		{
			$(this).prop('checked', false);
		});
		$('.hd-options').hide();
		$('.speaker-options').hide();
		$('.keyboard-options').hide();
		$('.mouse-options').hide();
	}
	
	// Validation function to check that a computer is selected for the
	// purchase request page.
	function validateComp()
	{
		$('div#comp-warning').hide();
		var ret = 0;
		$('select.account-type-select-4').each(function(){
			if ($(this).val() != "")
			{
				ret++;
			}
		});
		$('input.table-select').each(function(){
			if ($(this).prop('checked') == true){
				ret++;
			}
		});
		if (ret == 0){
			$('.main-select').show();
			$('#toggle2').hide();
			$('div#comp-warning').show();
		}
		return ret;
	}

	// COMPUTER REQUEST VALIDATION
	$('form#new-computer-request').submit(function(event)
	{
		var numErrors = 0;
		numErrors += validateEmail($('input#email-address'));
		numErrors += validateTextField($('input#cn-user'));
		numErrors += validatePhoneNumber($('input#phone-number'));
		numErrors += validateTextField($('input#dept-number'));
		numErrors += (1 - validateComp());
		
		if (numErrors == 0)
		{
			$('div#hidden-data').html('<input type="hidden" name="submit-account-type" value="new-computer">');
			return true;
		}
		else
		{
			window.scrollTo(0, 0);
			return false;
		}
	});


	
	//Hoverbox functions
	$(function(){
		var moveLeft = 20;
		var moveDown = 20;
		$('.hoverbox').mouseenter(function()
		{
			moveDown = 20;
			$('#applications-list').show(200);
			
				moveDown = moveDown - 2/5*($(window).height());
	      
		});
		$('.hoverbox').mouseleave(function()
		{
			$('#applications-list').hide(200);
		});
		$('.hoverbox').mousemove(function(e)
		{
			
			
			topD = e.pageY + moveDown;
			leftD = e.pageX + moveLeft;
			$('#applications-list').css('top', topD).css('left', leftD);
		});
	});
	$(document).ready(function()
	{
		$('#applications-list').hide();
	});
	
	// Hide all but selected computer and allow the unselection of said computer
	$('.computer-list').change(function(){
		for(var i = 1; i< 12; ++i){
			$('tr#selection-option-' + i).hide();
		}
		checkboxClear();
		$('.desktop-accessories').hide();
		$('.laptop-accessories').hide();
		$('.apple-desktop-table').hide();
		$('.apple-laptop-table').hide();
		$('.windows-desktop-table').hide();
		$('.windows-laptop-table').hide();

		var bool = 0;
		for(var i = 1; i < 12; ++i){
			if($('input#selection-option-' + i).prop('checked') == true){
				$('tr#selection-option-' + i).show();
				bool = 1;
				if(i <= 3){
					$('.apple-desktop-table').show();
					$('.desktop-accessories').show();
				}
				else if(i > 3 && i <= 6){
					$('.apple-laptop-table').show();
					$('.laptop-accessories').show();
				}
				else if(i > 6 && i <= 8){
					$('.windows-desktop-table').show();
					$('.desktop-accessories').show();
				}
				else if(i > 8 && i <= 11){
					$('.windows-laptop-table').show();
					$('.laptop-accessories').show();
				}
			}
		}
		if(bool == 0){
			for(var i = 1; i< 12; ++i){
				$('tr#selection-option-' + i).show();
			}
			$('.apple-desktop-table').show();
			$('.apple-laptop-table').show();
			$('.windows-desktop-table').show();
			$('.windows-laptop-table').show();
		}
		$('.laptop-accessories').change();
		$('.desktop-accessories').change();
		

		});

	// Checkbox clear function
	function checkboxClear()
	{
		$('input.accessories').each(function(i)
		{
			$(this).prop('checked', false);
		});
		$('.hd-options').hide();
		$('.speaker-options').hide();
		$('.keyboard-options').hide();
		$('.mouse-options').hide();
	}
	
	// Validation function to check that a computer is selected for the
	// purchase request page.
	function validateComp()
	{
		$('div#comp-warning').hide();
		var ret = 0;
		$('select.account-type-select-4').each(function(){
			if ($(this).val() != "")
			{
				ret++;
			}
		});
		$('input.table-select').each(function(){
			if ($(this).prop('checked') == true){
				ret++;
			}
		});
		if (ret == 0){
			$('.main-select').show();
			$('#toggle2').hide();
			$('div#comp-warning').show();
		}
		return ret;
	}
	
	// Reveal function for selecting different email removal options in acct.php
	$('select#email-rmv').change(function(){
		$('div.email-rmv-descr').hide();
		$('div#' + $(this).val()).show();
	});
	
	// Reveal function for different P drive options
	$('select#p-delete').change(function(){
		$('div.p-delete-descr').hide();
		$('div#' + $(this).val()).show();
	});
	
	// Alert removal for menus
	function alertRemove(myDiv){
		$('div#' + myDiv).removeClass('alert');
	}
	
	// Checking for more than 2 monitors for desktops in purchase.php
	function monitorCheck(){
		var count = 0;
		if ($('input#desktop-tb').prop('checked') == true){
			count += parseInt($('select#tb-monitor').val());
		}
		if ($('input#desktop-xtra').prop('checked') == true){
			count += parseInt($('select#apple-monitors').val());
		}
		if (count > 2){
			$('div.desktop-warning').show();
			return 1;
			}
		else {
			$('div.desktop-warning').hide();
			return 0;
		}
	}
	
	// Checkbox clearing for extra monitors when the Thunderbolt monitor is deselected
	// $('input#desktop-tb').change(function(){
		// if ($(this).prop('checked') == false){
			// $('input#desktop-xtra').prop('checked', false);
		// }
	// });
	// $('input#laptop-tb').change(function(){
		// if ($(this).prop('checked') == false){
			// $('input#laptop-xtra').prop('checked', false);
		// }
	// });

	// ACCOUNT REMOVAL VALIDATION
	$('form#account-removal').submit(function(event)
	{
		var numErrors = 0;
		numErrors += validateEmail($('input#acct'));
		numErrors += validateEmail($('input#dp-super-email'));
		numErrors += validateTextField($('input#dp-dpt'));
		numErrors += validateDate($('input#date'));
		
		// Used simplified email validation. Check validateEmailSimple.
		if ($('select#email-rmv').val() == 'email-2'){
			numErrors += validateEmailSimple($('input#email-2'));
		} else if ($('select#email-rmv').val() == 'email-3'){
			numErrors += validateEmail($('input#email-3'));
		} else if ($('select#email-rmv').val() == 'email-4'){
			numErrors += validateEmailSimple($('input#email-4'));
		}
		
		if ($('select#p-delete').val() == 'p-delete-2'){
			numErrors += validateTextField($('input#p-delete-2'));
		}
		
		if (numErrors == 0)
		{
			$('div#hidden-data').html('<input type="hidden" name="submit-account-type" value="remove-account">');
			return true;
		}
		else
		{
			window.scrollTo(0, 0);
			return false;
		}
		
	});
	
	// COMPUTER REQUEST VALIDATION
	$('form#new-computer-request').submit(function(event)
	{
		var numErrors = 0;
		numErrors += validateEmail($('input#email-address'));
		numErrors += validateTextField($('input#cn-user'));
		numErrors += validatePhoneNumber($('input#phone-number'));
		numErrors += validateTextField($('input#dept-number'));
		numErrors += (1 - validateComp());
		numErrors += monitorCheck();
		
		if (numErrors == 0)
		{
			$('div#hidden-data').html('<input type="hidden" name="submit-account-type" value="new-computer">');
			return true;
		}
		else
		{
			window.scrollTo(0, 0);
			return false;
		}
	});


	
	// BEGIN VALIDATION
	$('form#new-account-form').submit(function(event)
	{
		var numErrors = 0;
		$type = "";
		if ($('select#account-type').val() == '')
		{
			numErrors++;
		}
		if ($('select#person-account-type').val() == ''
			&& $('select#account-type').val() == 'person-account-type')
		{
			numErrors++;
		}
		// STUDENT EMPLOYEE
		if ($('select#person-account-type').val() == 'student-employee'
			&& $('select#account-type').val() == 'person-account-type')
		{
			numErrors += validateEmail($('input#supervisor-email'));
			numErrors += validateTextField($('input#employee-name'));
			numErrors += validateTextField($('input#employee-title'));
			numErrors += validatePhoneNumber($('input#employee-phone-number'));
			numErrors += validateTextField($('input#employee-department'));
			numErrors += validateDate($('input#employee-start-date'));
			numErrors += validateTextField($('input#employee-dl-memberships'));
			if ($('input#need-share-permissions').is(':checked') && $('input#can-mirror-permissions').is(':checked'))
			{
				numErrors += validateEmail($('input#mirror-permissions-from'));
			}
			else
			{
				$('input#mirror-permissions-from').parent().removeClass("alert");
			}
			$type ='student-employee';
		}
		
		// REGULAR EMPLOYEE
		if ($('select#person-account-type').val() == 'regular-employee'
			&& $('select#account-type').val() == 'person-account-type')
		{
			numErrors += validateEmail($('input#supervisor-email'));
			numErrors += validateTextField($('input#employee-name'));
			numErrors += validateTextField($('input#employee-title'));
			numErrors += validatePhoneNumber($('input#employee-phone-number'));
			numErrors += validateTextField($('input#employee-department'));
			numErrors += validateDate($('input#employee-start-date'));
			numErrors += validateTextField($('input#employee-dl-memberships'));
			if ($('input#need-share-permissions').is(':checked') && $('input#can-mirror-permissions').is(':checked'))
			{
				numErrors += validateEmail($('input#mirror-permissions-from'));
			}
			else
			{
				$('input#mirror-permissions-from').parent().removeClass("alert");
			}
			numErrors += validateTextField($('input#need-index-to-bill'));
			$type ='regular-employee';
		}
		
		// EMAIL ONLY
		if ($('select#person-account-type').val() == 'email-only'
			&& $('select#account-type').val() == 'person-account-type')
		{
			numErrors += validateEmail($('input#supervisor-email'));
			numErrors += validateTextField($('input#employee-name'));
			numErrors += validateTextField($('input#employee-title'));
			numErrors += validatePhoneNumber($('input#employee-phone-number'));
			numErrors += validateTextField($('input#employee-department'));
			numErrors += validateDate($('input#employee-start-date'));
			numErrors += validateTextField($('input#employee-dl-memberships'));
			numErrors += validateTextField($('input#need-index-to-bill'));
			$type ='email-only';
		}
		
		// GENERAL USE MAILBOX
		if ($('select#account-type').val() == 'general-use-mailbox')
		{
			numErrors += validateTextField($('input#mailbox-name'));
			numErrors += validatePhoneNumber($('input#mailbox-phone-number'));
			numErrors += validateTextField($('input#need-index-to-bill-mailbox'));
			numErrors += validateSelect($('select#mailbox-account-types'));
			$type ='general-use-mailbox';
		}
		
		//GENERAL USE CALENDAR
		if ($('select#account-type').val() == 'general-use-calendar')
		{
			numErrors += validateTextField($('input#calendar-mailbox-name'));
			$type ='general-use-calendar';
		}
		
		//ROOM CALENDAR
		if ($('select#account-type').val() == 'room-calendar')
		{
			numErrors += validateTextField($('input#room-calendar-mailbox-name'));
			$type ='room-calendar';
		}
		
		if (numErrors == 0)
		{
			$('div#hidden-data').html('<input type="hidden" name="submit-account-type" value="' + $type + '">');
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

function getUrlVars() 
{
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

//validation functions
function validateSelect(select)
{
	if (select.val() == '')
	{
		select.parent().parent().parent().addClass("alert");
		return 1;
	}
	else
	{
		select.parent().parent().parent().removeClass("alert");
		return 0;
	}
}

function validateDate(date)
{
	if (!isValidDate(date.val()))
	{
		date.parent().addClass("alert");
		return 1;
	}
	else
	{
		date.parent().removeClass("alert");
		return 0;		
	}
}

function validateEmail(emailInput)
{
	if (emailInput.val() == ""){
		emailInput.parent().addClass('alert');
		return 1;
	}
	else if (!isValidEmailAddress(emailInput.select2('data').mail))
	{
		emailInput.parent().addClass("alert");
		return 1;
	}
	else
	{
		emailInput.parent().removeClass("alert");
		emailInput.val(emailInput.select2('data').mail);
		return 0;		
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

function validatePhoneNumber(phoneNumberInput)
{

	if (!isValidPhoneNumber(phoneNumberInput.val()))
	{
		if (phoneNumberInput.val() == "")
		{
			phoneNumberInput.parent().addClass("alert");
			return 1;
		}
		phoneNumberInput.parent().addClass("alert");
		return 1;
	}
	else
	{
		phoneNumberInput.parent().removeClass("alert");
		return 0;
	}
}

// Simpler Email Validation. Looks for an ampersand and a dot after.
// Currently the Regex version doesn't work (7/25/13) It allows the
// autocomplete emails through though so it is kept there.
function validateEmailSimple(email)
{
	var a = email.val().indexOf('@');
	var b = email.val().indexOf('.', a);
	if (a == -1){
		email.parent().addClass('alert');
		return 1;
	} else if (b == -1){
		email.parent().addClass('alert');
		return 1;
	} else {
		email.parent().removeClass('alert');
		return 0;
	}
}


//regex checks
function isValidEmailAddress(emailAddress) 
{
    var pattern = new RegExp(/^((([A-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([A-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([A-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([A-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([A-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([A-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([A-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([A-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([A-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([A-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

function isValidDate(date)
{
	var pattern = new RegExp(/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/);
	return pattern.test(date);
}

function isValidPhoneNumber(phoneNumber)
{
	var pattern = new RegExp(/(^[2357]-\d{4}$)|(^\d{3}([- \.]|[^ ])\d{3}([- \.]|[^ ])\d{4}$)/);
	return pattern.test(phoneNumber);
}
