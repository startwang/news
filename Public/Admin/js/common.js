function $$(id)
{
	return document.getElementById(id);
}

function checkForm(keys){	
	for(var i=0; i < keys.length;i++){
		if(!(checkIpt(keys[i]))){
			return false;
		}
	}
	return true;
}

function show(obj, type) {
	if(type == 1) {
		$$(obj).style.display = 'block';
	} else {
		$$(obj).style.display = 'none';
	}
}
function Request(Variable)
{
	var query = location.search;
	if (query != "")
	{
		query = query.split("?")[1];
		query = query.split("&");
		for (var i=0;i<query.length;i++)
		{
			var querycoll = query[i].split("=");
			if (querycoll.length == 2)
			{
				if (querycoll[0].toUpperCase() == Variable.toUpperCase())
				{
					return querycoll[1];
					break;
				}
			}
		}
	}
	return "";
}

function getCookie(sName){
	 var reg1=new RegExp("(?: |\\b)"+sName+"(?:=)?([^ =;]*)","i");
	 var ma1=document.cookie.match(reg1);
	 if(!ma1) return "";
	 return ma1[1];
}

String.prototype.Trim = function(){return   this.replace(/(^\s*)|(\s*$)/g,"");}

//提取文字
function getSummary(html,len)
{
	if(!len) len = 200;
	var div = document.createElement("div");
	div.innerHTML = html;
	var arr = div.innerText.split("\r");
	var str=""
	for(var i=0;i<arr.length;i++){
		str+=arr[i].Trim();
	}	
	if(str.length>len)
		return str.substring(0,len) + "...";
	else
		return str;
}

//检查字数
function checkContentLen(contents){
	var title_length = 0;
	for (var i=0;i<contents.length ;i++ ) {
		// ASC255内字符占1，汉字或其它占2
		title_length += (contents.charCodeAt(i) > 255) ? 2 : 1;
	}
	return title_length;
}
