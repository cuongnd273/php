function add()
{
	gioithieu=$('#gioithieu').val();
	linkslider=$('#link').val();
	if(gioithieu!="" && linkslider!="")
	{
		var m_data = new FormData(); 
		m_data.append('addS',"add");
		m_data.append('anh',anh);
		m_data.append('gioithieu',gioithieu);
		m_data.append('link',linkslider);
		m_data.append( 'file', $('input[name=anh]')[0].files[0]);
		
		$.ajax({
			url: "../quanly/slider.php",
			type: "post",
			dateType: "json",
			data: m_data,
			processData: false,
			contentType: false,
			success: function(result){
				var obj=JSON.parse(result);
				document.getElementById("alert-success-top").innerHTML = obj.message;
				window.setTimeout(function(){location.reload()},500)
			}
		});
	}else{
			alert('Hãy nhập đầy đủ thông tin');
	}
}
function del(maslider)
{
	if(confirm('Bạn có muốn xóa không?'))
	{
	$.ajax({
			url : "../quanly/slider.php",
			type : "post",
			dateType:"json",
			data : {
				deleteS:"delete",
				maslider:maslider,
			},
			success : function (result){		
				var obj = JSON.parse(result);
				document.getElementById("alert-success-top").innerHTML = obj.message;
				window.setTimeout(function(){location.reload()},500)
			}
		});
	}else{
		return;
	}
}