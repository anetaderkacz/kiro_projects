function get_kod()
{
		$.get("ajax_s.php", { action: "token" },
			function(data){	 
				$('#token_img').html(data);
				
		});
}


$( document ).ready(function() {
	
		$( "#menu_n" ).click(function() {
		if($('.site_menu').css('display') == 'none')
		{
			$('.to_hide_n').show();
			$('.site_menu').slideDown(300);
		}
		else
		{
			
			$('.site_menu').slideUp(300);
			$('.to_hide_n').hide();
		}

	});

	$( "#form_close" ).click(function() {
		$("#form_all").slideUp();
		$('#form_info').html("");
		$('#zgloszenie_txt').val("");
		$('#add_kod').val("");
	});

	$( "#zglos" ).click(function() {
		get_kod();
		$("#form_all").show();
	});

	$( "#wyslij_zgloszenie" ).click(function() {
		$('#form_info').html("Wysyłanie...");
		$("#wyslij_zgloszenie").css({display:"none"});
		var tresc = $("#zgloszenie_txt").val();  
		var add_id = $("#add_id").val();  
		var add_kod = $("#add_kod").val();  
	 
		$.get("ajax_s.php", { add_id:add_id, action: "rep", tresc: tresc, kod: add_kod },
			function(data){	 
				$('#form_info').html(data);
				$('#zgloszenie_txt').val("");
				$('#add_kod').val("");
				get_kod();
				$("#wyslij_zgloszenie").css({display:""});
		});
	});

});
function usun_ul(add_id,del){
$.get("ajax_s.php", { del:del, action: "del_fav" },
   function(data){	 
	var p = $( "#u"+add_id);
	var position = p.position();
	var ptop=position.top-8;
	var pleft=position.left-55;
	if(data!="")
	{
	 $('.d_info').css({display:"inline",top:ptop,left:pleft});
     $('.d_info').html(data);

	 setTimeout("ukryj()",5000);
	 }
	 else
	 {
	 	 $("#ogl"+add_id).css({display:"none"});
	 }
   });
}
function usun_ull(add_id,del){
$.get("ajax_s.php", { del:del, action: "del_fav" },
   function(data){	 
	var p = $( "#ud"+add_id);
	var position = p.position();
	var ptop=position.top-8;
	var pleft=position.left-55;
	if(data!="")
	{
	 $('.d_info').css({display:"inline",top:ptop,left:pleft});
     $('.d_info').html(data);

	 setTimeout("ukryj()",5000);
	 }
	 else
	 {
	 $('.d_info').css({display:"inline",top:ptop,left:pleft});
     $('.d_info').html("Ogłoszenie usunięte z ulubionych");
	 $("#ud"+add_id).css({display:"none"});
	 $("#u"+add_id).css({display:""});
	 setTimeout("ukryj()",5000);
	 }
   });
}
function add_ul(add_id){
$.get("ajax_s.php", { add_id: add_id, action: "add_fav" },
   function(data ){	 
	var p = $( "#u"+add_id);
	var position = p.position();
	var ptop=position.top-8;
	var pleft=position.left-80;
	 $('.d_info').css({display:"inline",top:ptop,left:pleft});
     $('.d_info').html(data);
	 $("#u"+add_id).css({display:"none"});
	 $("#uu"+add_id).css({display:""});
	 setTimeout("ukryj()",5000);
   });
}
function rating_res(id,ocena,ile){

for(i=1;i<=ile;i++)
{
document.getElementById("b"+i).style.display="none";
}


}

function setCookie(c_name,value,exdays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString())+";path=/";
	document.cookie=c_name + "=" + c_value;
}

function hide_cookie_alert()
{
	setCookie("cookie_off","1",1);
	document.getElementById("cookie_alert").style.display="none";
	return false;
}



function rating(id,ocena,ile){

for(i=ile;i>=ocena;i--)
{
document.getElementById("b"+i).style.background = "";
}

for(i=1;i<=ocena;i++)
{
document.getElementById("b"+i).style.display="";
document.getElementById("b"+i).style.background = "url(images/1.png)";

}

}

function ukryj() {

document.getElementById("ukryj").style.display="none";
}

function potwierdz()
{
  if (confirm("Czy na pewno chesz skasować?")==false)
  return false;
}



setTimeout("ukryj()",5000);

function openemot(){
document.getElementById("emot").style.display="";
}
function closeemot(){
document.getElementById("emot").style.display="none";
}