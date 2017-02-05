<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<BASE HREF="{$site_url}">
<meta http-equiv="content-type" content="text/html; charset={$lang[0]}" />
<title>{$title}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="{$meta_key}" />
<meta name="description" content="{if $art_tresc<>"" and !$art_tresc|is_array}{$art_tresc|strip_tags|substr:0:250}{else}{$meta_desc}{/if}" />
<link type="text/css" media="screen" rel="stylesheet" href="templates/blu/style.css" />

<meta property="og:type" content="website" >
<meta property="og:description" content="{if $art_tresc<>"" and !$art_tresc|is_array}{$art_tresc|strip_tags|substr:0:250}{else}{$meta_desc}{/if}">
{if $art_id<>"" and !$art_id|is_array}
<meta property="og:title" content="{$art_tytul}" >
<meta property="og:url" content="{$site_url}ogloszenie/{$art_id}/{$art_tytul_n}" >
<meta property="og:image" content="{$site_url}images/{$art_id}.jpg" >
<meta property="og:image:type" content="image/jpeg">



{else}
<meta property="og:title" content="{$title}" >
<meta property="og:url" content="{$site_url}" >
<meta property="og:image:type" content="image/jpeg">
{/if}


	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/function.js"></script>
	{if $blok_woj_on=="1"}
		<script type="text/javascript" src="js/jquery.cssmap.js"></script> 
		<link rel="stylesheet" type="text/css" media="screen,projection" href="js/cssmap-poland/cssmap-poland.css" />
		{literal}
			<script type="text/javascript">
			$(function($){
			$('#map-poland').cssMap({'size' : 170});
			});
			</script>
		{/literal}
	{/if} 
	<link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

	<script type="text/javascript" src="admin/js/tiny_mce/tiny_mce.js"></script>
               {if $strona_get=="add" or ( $strona_get=="ogl" and $ds_x!="" and $ds_y!="")}


	{literal}

<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
      var map;
      var marker;
      

      function initialize() {
	
        var myOptions = {
          zoom: {/literal}{$ds_zoom}{literal},
          center: new google.maps.LatLng({/literal}{$ds_x}, {$ds_y}{literal}),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('mapa'),myOptions);

        marker = new google.maps.Marker({
            map:map,
            draggable: {/literal}{if $strona_get=="add"}true{else}false{/if}{literal},
            animation: google.maps.Animation.DROP,
            position: new google.maps.LatLng({/literal}{$ds_x}, {$ds_y}{literal})
          });
        google.maps.event.addListener(marker, 'click', toggleBounce);

        google.maps.event.addListener(marker, 'drag', function() {
            updateMarkerPosition(marker.getPosition());
        });


      }

function toggleBounce() {

  if (marker.getAnimation() != null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

function updateMarkerPosition(latLng) {
document.getElementById('lat').value = latLng.lat();
document.getElementById('lng').value = latLng.lng();
document.getElementById('zoom').value = map.getZoom();
}
 


  

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    {/literal}

{/if}

{literal}
   <script type="text/javascript">


tinyMCE.init({
		// General options
		mode : "exact",
                language: "{/literal}{$lang[1]}{literal}",
		elements : "elm1",
		theme : "advanced",
		entity_encoding : "raw",
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "",

                theme_advanced_buttons1 : "bold,italic,underline,justifyleft,justifycenter,justifyright,justifyfull,link,unlink,forecolor,image",
                theme_advanced_buttons2 : "",
                theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",



		
	});

function toggleEditor(id) {

if (!tinyMCE.get(id))
{
tinyMCE.execCommand('mceAddControl', false, id);
}
else
{
tinyMCE.execCommand('mceRemoveControl', false, id);
}

}

</script>

{/literal}

{if $gp_like=="1"}

{literal}
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'pl'}
</script>
{/literal}

{/if}
{literal}
<style type="text/css">

#s7 { width: 100%; height: 50px; }



</style>
{/literal}




{literal}

   <script type="text/javascript">

{/literal}
{if $sgi=="index"}
{literal}
$('#s7').cycle({ 
     fx:     'scrollLeft', 
    timeout: 15000, 
    delay:  -2000 
});
$('#s8').cycle({ 
     fx:     'scrollLeft', 
    timeout: 15000, 
    delay:  20000 
});
$('#pro_new').cycle({ 
     fx:     'scrollLeft', 
    timeout: 15000, 
    delay:  -2000 
});
{/literal}
{/if}
{literal}
$('#naj_new').cycle({ 
     fx:     'scrollLeft', 
    timeout: 15000, 
    delay:  -2000 
});
    $(function() {
        $('#gallery a').fancybox();
    });
{/literal}


</script>


</head>

<body>

