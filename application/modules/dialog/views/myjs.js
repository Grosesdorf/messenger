function funcError(){
	alert("ERROR!!!");
}

$("document").ready(function(){
	$("#submit").click(function(){
		var send = $("form").serialize();

		aalert(send);

	$.ajax({
		url: "/dialog/addMessage/" + send['dialogId'],
		type: "POST",
		data: send,
		error: funcError
	});
	});
});
