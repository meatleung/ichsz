$(document).ready(function(){
	
	var xmlHttp;
	//IC呆料被点击时
    $("#icdig").find("td").click(function()
	{
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		{
			alert ("十分抱歉，您的浏览器不支持访问本站，烦请更换浏览器。");
			return;
		}
		
		//获取呆料id以作为查询关键字
		var row = $(this).prevAll().length+1;
		var id;
		if(row==2)
		{
			var tab = document.getElementById("icdig");
            var line = $(this).parent().prevAll().length+1;
			id = tab.rows[line].cells[0].innerText;
		}
		else
		{
			id = this.innerText;
		}
		
		//向icdig传送查询的呆料id并取得返回值
		var url="icdig/detail";
		url=url+"?id="+id;
		url=url+"&sid="+Math.random();
		xmlHttp.onreadystatechange=stateChanged ;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);

	})
	
	function stateChanged() 
	{ 
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			document.getElementById("icdetail").innerHTML=xmlHttp.responseText;
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