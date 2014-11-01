$(document).ready(function(){
	//定义参数并载入jqzoom插件
	var options = {  
            zoomType: 'standard',
            lens:true,
            alwaysOn:false,
			showEffect : 'fadein',  
            hideEffect: 'fadeout'  
    };  
    $('.jqzoom').jqzoom(options);

	//IC呆料被点击时
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
		if(document.getElementById("guide"))
		{
			var todelete = document.getElementById("guide");
			todelete.parentNode.removeChild(todelete);
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
			var result = xmlHttp.responseText; 
			var json = eval("(" + result + ")");
			document.getElementById('spic').innerHTML = json.spic;
			document.getElementById('tpic').innerHTML = json.tpic;
			document.getElementById('descrip').innerHTML = json.descrip;
			var options = 
			{
				zoomType: 'standard',
				lens:true,
				alwaysOn:false,
				showEffect : 'fadein',  
				hideEffect: 'fadeout'  
			}
			$('.jqzoom').jqzoom(options);
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