function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("main").style.marginLeft = "250px";
	document.getElementById("chat_window").style.width = "auto";
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft = "0";
	document.getElementById("chat_window").style.width = "100%";
	
}



function rightcloseNav() {
	document.getElementById("rightmySidenav").style.width = "0";
	document.getElementById("main").style.marginRight = "0";
	

	

}

$(document).ready(function () {
	$(".closebtn").click(function () {
		$("#reply_screen").empty();
		$("#reply_screen").html("");
	});
});

function getreaction(id, name, userid, cname, tstamp) {
	
	
	if (name == "like") {
		location.href = "reaction.php?rtype=" + name + "&messageid=" + tstamp + "&userid=" + userid + "&cname=" + cname + "&t="+id;
	}
	if (name == "dislike") {
		location.href = "reaction.php?rtype=" + name + "&messageid=" + tstamp + "&userid=" + userid + "&cname=" + cname + "&t="+id;

	}
}

function delete_submsg(id, name, userid, destination, sid, sname){
	
	var r = confirm("Please confirm to delete the message?");
    if (r == true) {
        txt = "You pressed OK!";
    
	 $.ajax({
		url: "./delsubmsg.php",
		method: "GET",
		data: "sid=" +sid,
		success: function(result){
			alert(result);
			console.log(result);
			getreply(sname, id, userid, destination);
		}
	}); 
	}
}


function getsubreaction(id, name, userid, destination, sid, sname) {
	

	if (name == "like") {
		    $.ajax({
		url: "./subreaction.php",
		method: 'GET',
		data: "rtype=" + name + "&messageid=" + sid + "&userid=" + userid + "&cname=" + destination,
		success: function (result) {
			console.log(result);
		 	//$("#rightmySidenav").append("<div id=reply_screen>" + result + "</div>");
			getreply(sname, id, userid, destination);
		
		}
	});    
	}
	if (name == "dislike") {
		$.ajax({
		url: "./subreaction.php",
		method: 'GET',
		data: "rtype=" + name + "&messageid=" + sid + "&userid=" + userid + "&cname=" + destination,
		success: function (result) {
			console.log(result);
		 	//$("#rightmySidenav").append("<div id=reply_screen>" + result + "</div>");
			getreply(sname, id, userid, destination);
		
		}
	});    

	}
}

function getreply(id, name, userid, destination) {
	document.getElementById("rightmySidenav").style.width = "350px";
	document.getElementById("main").style.marginRight = "0px";
	//document.getElementById("reply_head").innerHTML=name;
	
	var a = "<div id=reply_screen />";
	//alert(name);
	$.ajax({
		url: "./submsg.php",
		cache: false,
		method: 'GET',
		data: "name=" + name + "&messageid=" + id + "&userid=" + userid + "&destination=" + destination,
		success: function (result) {
			console.log(result);	
			
			
			$("#rightmySidenav").empty();
			$("#rightmySidenav").show();
			
			$("#rightmySidenav").prepend("<div><label><font size=5><b>"+name+"</b></font></label></div><hr>");
			$("#rightmySidenav").prepend("<button class='test' style='background:white; border:none;'><label><font size=5><b>X</b></font></label></button><br><br><br>");
			$("rightmySidenav").width = "30%";
			$("main").marginRight = "0px";
		
			$("#rightmySidenav").append( a + result);
			$("#rightmySidenav").append("<div id='footer'><input type='text' id='subreplytextbox' style='width: 21%;' /><input type='submit'  name='submit_reply' onclick='subreply("+id+","+userid+",\""+ destination + "\",\""+ name + "\")' /></div>");
			$(".test").click(function(){
        $("#rightmySidenav").hide();
	
    });
		}
		
	});
}


function subreply(id,userid,destination,name) {
	var smessage= document.getElementById('subreplytextbox').value;
	var url = "./login.php?value="+destination;
	$.ajax({
		url: "./submsgcall.php",
		method: 'POST',
		data: "smessage=" + smessage + "&messageid=" + id + "&userid=" + userid + "&destination=" + destination,
		success: function (result) {
			console.log(result);
			getreply(id, name, userid, destination);
		}
	}); 
	document.getElementById('subreplytextbox').value="";
	}
	
	 


function openreplywindow() {
	document.getElementById("main").style.marginRight = "250px";
}

function scrolltobottom() {
	var objDiv = document.getElementById("chat_box");
	objDiv.scrollTop = objDiv.scrollHeight;
}

function delete_msg(mid,cname){
	
	var r = confirm("Please confirm to delete the message?");
    if (r == true) {
        txt = "You pressed OK!";
    
	 $.ajax({
		url: "./delmsg.php",
		method: "GET",
		data: "mid=" +mid,
		success: function(result){
			alert(result);
			console.log(result);
		}
	}); 
	 location.href = "login.php?value=" + cname;
	}
}


