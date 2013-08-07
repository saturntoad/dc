
var collectURL = 'dc/collect.php';
var checkURL = 'dc/check.php';
var expiration = 3650;

function getCookie(c_name)
{
	var c_value = document.cookie;
	var c_start = c_value.indexOf(" " + c_name + "=");
	if (c_start == -1)
	{
		c_start = c_value.indexOf(c_name + "=");
	}
	if (c_start == -1)
	{
		c_value = null;
	}
	else
	{
		c_start = c_value.indexOf("=", c_start) + 1;
		var c_end = c_value.indexOf(";", c_start);
		if (c_end == -1)
		{
			c_end = c_value.length;
		}
		c_value = unescape(c_value.substring(c_start,c_end));
	}
	return c_value;
}

function setCookie(c_name,value,exdays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}


function pageView(aid, eid)
{
	var cookie = getCookie('_ga');
	var newPV = {
		"cookie"	:	cookie,
		"url"		:	window.location.href,
		"aid"		:	aid,
		"eid"		:	eid,
		"t"		:	new Date().getTime()
	};
	if (typeof prod == 'undefined')
		console.log(newPV);
	$.ajax({
		url	:	collectURL,
		data	:	newPV
	});

	/* check if that cookie already exists locally */
	if (null == getCookie('_dci'))
	{
		/* if not, set it on */
		setCookie('_dci', 1, expiration);
		/* and check remotely */
		if (checkCookieExist(cookie) == 'exist')
		{
			/* if not exist, send user information */
			sendUserInfo();
		}
	}
}

function sendUserInfo()
{
	var cookie = getCookie('_ga');
	var newUser = {
		"cookie"	:	cookie,
		"uid"		:	0,
		"t"		:	new Date().getTime()
	};
	/* check if logged in, var uid is set by server side php code */
	if (uid)
	{
		newUser.uid = uid;
	}
	console.log(newUser);
}



function checkCookieExist(cookie)
{
	var res;
	$.ajax({
		url	:	checkURL,
		data	:	{"cookie" : cookie},
		dataType:	"text",
		success	:	function (data, textStatus, jqXHR) {
					res = data;
				}
	});
	return res;
}
