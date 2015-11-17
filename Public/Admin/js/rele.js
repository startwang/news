var ball;
var type;
var hdID;
var obj;
var title;
var dtype;
var fun = 'interFaceBack';
var key;
var interFaceUrl = 'http://mg.j8x.com:18000/adm/datasearch.aspx';		//查询接口
var re = /^[0-9]+.?[0-9]*$/;   //判断字符串是否为数字	
var ballname = new Array();
ballname[1] = 'soccer';
ballname[2] = 'basketball';
/* 打开搜索框 */
function showRelationBox(t){
	if( t == 'player'){
		type = 'player';
		hdID = $('#d_playerid');
		obj = $('#player');
		dtype = 'player';
		title = '搜索球员';
	}
	if( t == 'team' ){
		type = 'team';
		hdID = $('#d_teamid');
		obj = $('#team');
		dtype = 'team';
		title = '搜索球队';
	}
	if( t == 'league' ){
		type = 'league';
		hdID = $('#v_leagueid');
		obj = $('#league');
		dtype = 'league';
		title = '搜索联赛';
	}
	if( t == 'game' ){
		type = 'game';
		hdID = $('#d_gameid');
		obj = $('#game');
		dtype = 'game';
		title = '搜索比赛';
	}
	$('#titletd').html(title);
	$('#restd').html('');
	var sbox = $('#RelationBox');
	sbox.css('display','block');
	sbox.css('left',obj.offset().left + 200 + 'px');
	sbox.css('top',obj.offset().top + 'px');
}

/* 进行搜索 */
function SearchRelation(){
	ball = ballname[$("#v_ball").val()];
	if( ball == undefined ){
		$('#restd').html('无选择球种');
		return false;
	}
	var wd = $('#wd').val();
	if( wd == '' ){
		return false;
	}
	$('#restd').html('正在搜索...');
	key = !re.test(wd) ? 'key' : 'id';
	wd = key == 'key' ? encodeURI(wd) : wd;
	url = interFaceUrl+'?stype='+ball+'&dtype='+dtype+'&'+key+'='+wd+'&fun='+fun;
	$.getScript(url);
}

/* 搜索结果 */
function interFaceBack(data){
	if(data == ''){
		$('#restd').html('查无结果');
		return false;
	}
	var showRes = '';
	for(var i=0; i < data.length; i++){
		showRes += '<div class="sea_res">';
		showRes += '<a href="javascript:setRelation('+data[i][0]+',\''+data[i][1].replace("'","")+'\')">'+data[i][1].replace("'","")+'</a>';
		showRes += '</div>';
	}
	$('#restd').html(showRes);
}

/* 进行关联 */
function setRelation(id,name){
	var isHave = 0;
	var idArr = new Array();
	$('#'+type+' option').each(function(i){
		if( id  == $(this).val()){
			isHave = 1;
		}
		idArr.push($(this).val());
	})
	if( isHave == 0 ){
		obj.append('<option value="'+id+'">'+name+'</option>');
		idArr.push(id);
		hdID.val( idArr.length==0 ? '' : ','+idArr+',');
	}
}

/* 移除关联 */
function unRelation(){
	var idArr = new Array();
	$('#'+type + ' option:selected').remove();
	$('#'+type+' option').each(function(){
		idArr.push($(this).val());
	})	
	hdID.val( idArr.length==0 ? '' : ','+idArr+',');
}

/* 关联关联框 */
function closeRelationBox(){
	var sbox = $('#RelationBox');
	sbox.css('display','none');
}

/* 显示关联的球员 */
/*
var playerid = $('#d_playerid').val();
var clearPlayerid = playerid.substring(1,playerid.length-1);
if( clearPlayerid != '' ){
	p_url = interFaceUrl+'?stype='+ballname[$("#d_ball").val()]+'&dtype=player'+'&id='+clearPlayerid+'&fun=playerReleRes';
	$.getScript(p_url,null);
}

function playerReleRes(data){
	var allplayer = $('#photolist').find('#playertd');
	for(var i in data){
		$('#player').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
		allplayer.each(function(){
			var obj = $(this).find('select');
			var playeridArr = obj.attr('alt').split(',');
			if(checkInArray(data[i][0],playeridArr)){
				obj.append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
			}
		})
	}
}
/*
/* 显示关联的球队 */
/*
var teamid = $('#d_teamid').val();
var clearTeamid = teamid.substring(1,teamid.length-1);
if( clearTeamid != '' ){
	p_url = interFaceUrl+'?stype='+ballname[$("#d_ball").val()]+'&dtype=team'+'&id='+clearTeamid+'&fun=teamReleRes';
	$.getScript(p_url,null);
}
function teamReleRes(data){
	var allteam = $('#photolist').find('#teamtd');
	for(var i in data){
		$('#team').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
		allteam.each(function(){
			var obj = $(this).find('select');
			var teamidArr = obj.attr('alt').split(',');
			if(checkInArray(data[i][0],teamidArr)){
				obj.append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
			}
		})
	}
}
*/
/* 显示关联的联赛 */
var leagueid = $('#v_leagueid').val();
var clearLeagueid = leagueid.substring(1,leagueid.length-1);
if( clearLeagueid != '' ){
	p_url = interFaceUrl+'?stype='+ballname[$("#v_ball").val()]+'&dtype=league'+'&id='+clearLeagueid+'&fun=leagueReleRes';
	$.getScript(p_url,null);
}

function leagueReleRes(data){
	for(var i in data){
		$('#league').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
	}
}

/* 删除每一张图片关联的球员 */
function delPlayerid(id){
	var idArr = new Array();
	$('#playerid' + id + ' option:selected').remove();
	$('#playerid' + id + ' option').each(function(){
		idArr.push($(this).val());
	})
	$('#ap_playerid'+id).val( idArr.length==0 ? '' : ','+idArr+',');
}

/* 删除每一张图片关联的球队 */
function delTeamid(id){
	var idArr = new Array();
	$('#teamid' + id + ' option:selected').remove();
	$('#teamid' + id + ' option').each(function(){
		idArr.push($(this).val());
	})
	$('#ap_teamid'+id).val( idArr.length==0 ? '' : ','+idArr+',');
}

/* 批量关联球员 */
function batchPlayer(){
	var playerObj = $('#player option');
	var allplayer = $('#photolist').find('#playertd');
	if( !confirm('确定批量关联吗？') ){
		return false;
	}
	if( playerObj.length == 0 ){
		alert('请先进行关联，才可使用批量关联');
		return false;
	}
	playerObj.each(function(){
		var id = $(this).val();
		var name = $(this).text();
		allplayer.each(function(){
			var isHave = 0;
			var idArr = new Array();
			var oneObj = $(this).find('select');
			var oneOption = $(this).find('select option');
			var oneId = oneObj.attr('idval');
			oneOption.each(function(){
				if($(this).val() == id){
					isHave = 1;
				}
				idArr.push($(this).val());
			})
			if(isHave == 0){
				oneObj.append('<option value="'+id+'">'+name+'</option>');
				idArr.push(id);
				$('#ap_playerid'+oneId).val( idArr.length == 0 ? '' : ','+idArr+',' );
			}
		})
	})
}

/* 批量关联球队 */
function batchTeam(){
	var teamObj = $('#team option');
	var allteam = $('#photolist').find('#teamtd');
	if( !confirm('确定批量关联吗？') ){
		return false;
	}
	if( teamObj.length == 0 ){
		alert('请先进行关联，才可使用批量关联');
		return false;
	}
	teamObj.each(function(){
		var id = $(this).val();
		var name = $(this).text();
		allteam.each(function(){
			var isHave = 0;
			var idArr = new Array();
			var oneObj = $(this).find('select');
			var oneOption = $(this).find('select option');
			var oneId = oneObj.attr('idval');
			oneOption.each(function(){
				if($(this).val() == id){
					isHave = 1;
				}
				idArr.push($(this).val());
			})
			if(isHave == 0){
				oneObj.append('<option value="'+id+'">'+name+'</option>');
				idArr.push(id);
				$('#ap_teamid'+oneId).val( idArr.length == 0 ? '' : ','+idArr+',' );
			}
		})
	})
}

var allOption;
var oneType;
var oneAp;
var showOneObj;
var showOneObjOption;
/* 打开每一张图片的关联 框*/
function oneSearchRelation(type,id){
	if(type == 'team'){
		oneType = '#teamid' + id;
		oneAp = '#ap_teamid' + id;
		allOption = $('#team option');
		showOneObj = $('#teamid'+id);
		showOneObjOption = $('#teamid'+id+ ' option');
		var theLeft = showOneObj.offset().left - 120 + 'px';
		var theTop = showOneObj.offset().top + 'px';
	}
	if(type == 'player'){
		oneType = '#playerid' + id;
		oneAp = '#ap_playerid' + id;
		allOption = $('#player option');
		showOneObj = $('#playerid'+id);
		showOneObjOption = $('#playerid'+id+ ' option');
		var theLeft = showOneObj.offset().left + 120 + 'px';
		var theTop = showOneObj.offset().top + 'px';
	}
	var sbox = $('#oneRelationBox');
	var html = '';
	if(allOption.length == 0){
		html += '无';
	} else {
		allOption.each(function(){
			html += '<a href="javascript:setOneRelation('+$(this).val()+','+'\''+$(this).text()+'\''+');">'+$(this).text()+'</a><br><br>';
		})
	}
	
	$('#oneRele').html(html);
	sbox.css('display','block');
	sbox.css('left',theLeft);
	sbox.css('top',theTop);
}

/* 关联进每一张图片 */
function setOneRelation(id,name){
	var isHave = 0;
	var idArr = new Array();
	$(oneType+' option').each(function(){
		if($(this).val() == id){
			isHave = 1;
		}
		idArr.push($(this).val());
	})
	if( isHave == 0 ){
		showOneObj.append('<option value="'+id+'">'+name+'</option>');
		idArr.push(id);
		$(oneAp).val( idArr.length == 0 ? '' : ','+idArr+',' );
	}
}

/* 关联每一张图片的关联框 */
function closeOneRelationBox(){
	$('#oneRelationBox').css('display','none');
}

/* 判断字符串是否存在数组函数 */
function checkInArray(val,data){
	for(var i in data){
		if(data[i] == val){
			return true;
		}
	}
	return false;
}