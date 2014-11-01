$(document).ready(function(){
	//下载按钮被点击时
    $("div[id^='index']").click(function()
	{
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		{
			alert ("十分抱歉，您的浏览器不支持访问本站，烦请更换浏览器。");
			return;
		}
		var id = $(this).attr('id');
		id=id.substr(5);
		alert(id);
		//向icdig传送查询的呆料id并取得返回值
		var url="massic/excel";
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