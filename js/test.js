$(document).ready(function(){
	//定义参数并载入jqzoom插件
	var options = {  
            zoomType: 'standard',
            lens:true,
            preloadImages: true,
            alwaysOn:false,
			showEffect : 'fadein',  
            hideEffect: 'fadeout'  
    };  
    $('.jqzoom').jqzoom(options);
	
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
		
		//向icdig传送查询的呆料id并取得返回值
		var url="test/detail";
		url=url+"?id=1";
		url=url+"&sid="+Math.random();
		xmlHttp.onreadystatechange=stateChanged ;
		xmlHttp.open("GET",url,false);
		xmlHttp.send(null);
		var options = {  
            zoomType: 'standard',
            lens:true,
            preloadImages: true,
            alwaysOn:false,
			showEffect : 'fadein',  
            hideEffect: 'fadeout'  
		};  
    $('.jqzoom').jqzoom(options);

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