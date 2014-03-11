var NUMROWS = 30;
var ANIMATION_SPEED = 0;

jQuery(document).ready(function() 
{
  /* required field highlight */

  jQuery('.requiredField').parent().addClass('notFilled').bind('input paste', function() {
  });
  jQuery('.requiredField').addClass('notFilled').bind('input paste', function() {
    setHighlight(this);
  });

});
jQuery(function($)
{
	$('.hasTooltip').hover(function() {
		var offset = $(this).offset();
	   $(this).next('span').fadeIn(200).addClass('showTooltip');
		$(this).next('span').css('left', offset.left + 'px');
	}, function() {
		$(this).next('span').fadeOut(200);
	});
	
	$('#queryoption').change(function(){
		if(($('#queryoption').val() != 'custom')){
			$('#location_options').removeClass("hidetoggle");
			$('#location_options').addClass("showtoggle");
			$('#custom').removeClass("hidetoggle");
			$('#custom').addClass("showtoggle");
		}
		if(($('#queryoption').val() != 'maxstate') || ($('#queryoption').val() != 'minstate') || ($('#queryoption').val() != '')){
			 $('#location_options').removeClass("showtoggle");
			 $('#location_options').addClass("hidetoggle");
		} 
		if(($('#queryoption').val() == 'maxstate') || ($('#queryoption').val() == 'minstate') || ($('#queryoption').val() == '')){
			 $('#location_options').removeClass("hidetoggle");
			 $('#location_options').addClass("showtoggle");
		}
		if(($('#queryoption').val() == 'custom')){
			$('#location_options').removeClass("showtoggle");
			$('#location_options').addClass("hidetoggle");
			$('#custom').removeClass("showtoggle");
			$('#custom').addClass("hidetoggle");
		}
		
		
	});
});
/*
 * highlight required fields
 */
var setHighlight = function(elem) 
{
  var val = jQuery(elem).val();
  jQuery.trim(val) ? jQuery(elem).removeClass('notFilled') : jQuery(elem).addClass('notFilled');
  jQuery.trim(val) ? jQuery(elem).parent().removeClass('notFilled') : jQuery(elem).parent().addClass('notFilled');
};

function validateEmails(emailInput)
{
	if (emailInput.val() == ""){
		emailInput.parent().addClass('notFilled');
		return 1;
	}
	else if (!isValidEmailAddress(emailInput.select2('data').mail))
	{
		emailInput.parent().addClass("notFilled");
		return 1;
	}
	else
	{
		emailInput.parent().removeClass("notFilled");
		emailInput.val(emailInput.select2('data').mail);
		return 0;		
	}
}
function validateTextFields(textfieldInput)
{
	if (textfieldInput.val() == "")
	{
		textfieldInput.parent().addClass("notFilled");
		return 1;
	}
	else
	{
		textfieldInput.parent().removeClass("notFilled");
		return 0;		
	}
}
function validateTextAreas(textfieldInput)
{
	if (textfieldInput.val() == "")
	{
		textfieldInput.parent().parent().addClass("notFilled");
		return 1;
	}
	else
	{
		textfieldInput.parent().parent().removeClass("notFilled");
		return 0;		
	}
}
function validateItems()
{
	errs = 0;
	var table = document.getElementById("itemsTable");
	for (var i = 0; i < table.rows.length; i++)
	{
		if ((jQuery("#id_Item_Description_"+i).val() == ('Tower/Desktop' || 'Laptop')) || (jQuery("#id_Item_Type_"+i).val() == ('Computer' || 'Hard drive (Internal or External)')))
		{
			if (jQuery("#id_Item_Return_Type_"+i).val() == '')
			{
				++errs;
				jQuery("#id_Item_Return_Type_"+i).parent().addClass("notFilled");
			}
			if (jQuery("#id_Serial_Number_"+i).val() == '')
			{
				++errs;
				jQuery("#id_Serial_Number_"+i).parent().addClass("notFilled");
			}
		} else {
			jQuery("#id_Item_Return_Type_"+i).parent().removeClass("notFilled");
			jQuery("#id_Serial_Number_"+i).parent().removeClass("notFilled");
		}
	}
	return errs;
}

//regex checks
function isValidEmailAddress(emailAddress) 
{
    var pattern = new RegExp(/^((([A-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([A-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([A-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([A-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([A-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([A-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([A-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([A-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([A-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([A-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

var trim = function(stringToTrim) { return stringToTrim ? stringToTrim.replace(/^\s+|\s+jQuery/g,"") : ''; };
var ltrim = function(stringToTrim) { return stringToTrim ? stringToTrim.replace(/^\s+/,""): ''; };
var rtrim = function(stringToTrim) { return stringToTrim ? stringToTrim.replace(/\s+jQuery/,""): ''; };


var addItemRow = function() 
{
  var selected = jQuery('#selectItemType option:selected').length ? jQuery('#selectItemType option:selected') : jQuery('#selectItemType option').first();
  AddToList('id_Item_Row',
            'Item_Description', selected.attr('category') + ' - ' + selected.attr('desc'));
  return false;
};

var AddToList = function(rowname) 
{

  var i, j, z, v, dstobj, elem;
  var form = document.querySelector('#pickupRequestForm');
  
  for (var i = 0; i < NUMROWS; ++i) 
  {
    v = '';
    for (j = 1; j < AddToList.arguments.length; j += 2) 
	{
      elem = form.elements[AddToList.arguments[j] + "[]"][i];
      if (elem.type == "text") { v += trim(elem.value); }
    }
    if (v == '') break;
  }
  
  for (j = 1; j < AddToList.arguments.length; j += 2) 
  {
    dstobj = form.elements[AddToList.arguments[j] + "[]"][i];
   
    switch (dstobj.type) 
	{
      case "checkbox":
        dstobj.checked = AddToList.arguments[j + 1];
        break;
      default:
        dstobj.value = AddToList.arguments[j + 1];
        break;
    }
  }

  jQuery('#' + rowname + i + ' .requiredField').each(function() { setHighlight(this); });
  jQuery('#' + rowname + i).fadeIn(ANIMATION_SPEED);

  if (i >= NUMROWS-1) 
  {
    jQuery('.input_' + rowname).attr('disabled', 'disabled');
    return -1;
  }
  
  return i;
};



var RemoveFromList = function(rowname, rownum) 
{
  var srcobj, dstobj;
  var form = document.querySelector('#pickupRequestForm');
  
  /* starting from the next row, iterate visible rows */
  for (var i = rownum + 1; (document.getElementById(rowname + i) && document.getElementById(rowname + i).style.display != 'none'); i++) {
  
    for (j = 2; j < RemoveFromList.arguments.length; j++) {
      
      srcobj = form.elements[RemoveFromList.arguments[j] + "[]"][i];
      dstobj = form.elements[RemoveFromList.arguments[j] + "[]"][i - 1];

      switch (dstobj.type) {
        case "checkbox":
          dstobj.checked = srcobj.checked;
        break;
        /* Prototype for properly assigning Default printer radio button:
        case "hidden":
          var dstradio = jQuery(dstobj).next();
          console.log("Next: ",dstradio);
          printerSetDefault(dstradio);
        break;*/
        case "select-one": /* This case handles select2 (select) objects */
          dstobj.value = srcobj.value;
          srcobj.value = "blank"; /* This requires an <option> defined as "blank", typically with no innertext */
          jQuery(dstobj).trigger("change"); /* These refreshes are necessary for select2 to reflect the HTML change */
          jQuery(srcobj).trigger("change");
        break;
        default:
          dstobj.value = srcobj.value;
        break;
      }
    }
  }
  i--;

  for (j = 2; j < RemoveFromList.arguments.length; j++) {
    form.elements[RemoveFromList.arguments[j] + "[]"][i].value = "";
  }
  
  jQuery('.requiredField:visible').each(function() { setHighlight(this); });
  jQuery('#' + rowname + i).hide(ANIMATION_SPEED);

  jQuery('.input_' + rowname).removeAttr('disabled');
};