$(document).ready(function(){
	var xmlHttp;
	$("#1").click(function(){ 
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request");
	 return
	 }
	var url="test/detail/"+456;
	xmlHttp.onreadystatechange=stateChanged ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	})

	function stateChanged() 
	{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
	 document.getElementById("qqq").innerHTML=xmlHttp.responseText 
	 } 
	}

	function GetXmlHttpObject()
	{
	var xmlHttp=null;
	try
	 {
	 // Firefox, Opera 8.0+, Safari
	 xmlHttp=new XMLHttpRequest();
	 }
	catch (e)
	 {
	 //Internet Explorer
	 try
	  {
	  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	  }
	 catch (e)
	  {
	  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	 }
	return xmlHttp;
	}
})

