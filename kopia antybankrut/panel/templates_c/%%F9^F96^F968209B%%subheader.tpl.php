<?php /* Smarty version 2.6.28, created on 2017-02-06 22:48:35
         compiled from blu/subheader.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'is_array', 'blu/subheader.tpl', 9, false),array('modifier', 'strip_tags', 'blu/subheader.tpl', 9, false),array('modifier', 'substr', 'blu/subheader.tpl', 9, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<BASE HREF="<?php echo $this->_tpl_vars['site_url']; ?>
">
<meta http-equiv="content-type" content="text/html; charset=<?php echo $this->_tpl_vars['lang'][0]; ?>
" />
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_key']; ?>
" />
<meta name="description" content="<?php if ($this->_tpl_vars['art_tresc'] <> "" && ! ((is_array($_tmp=$this->_tpl_vars['art_tresc'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['art_tresc'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 250) : substr($_tmp, 0, 250)); ?>
<?php else: ?><?php echo $this->_tpl_vars['meta_desc']; ?>
<?php endif; ?>" />
<link type="text/css" media="screen" rel="stylesheet" href="templates/blu/style.css" />

<meta property="og:type" content="website" >
<meta property="og:description" content="<?php if ($this->_tpl_vars['art_tresc'] <> "" && ! ((is_array($_tmp=$this->_tpl_vars['art_tresc'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['art_tresc'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 250) : substr($_tmp, 0, 250)); ?>
<?php else: ?><?php echo $this->_tpl_vars['meta_desc']; ?>
<?php endif; ?>">
<?php if ($this->_tpl_vars['art_id'] <> "" && ! ((is_array($_tmp=$this->_tpl_vars['art_id'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?>
<meta property="og:title" content="<?php echo $this->_tpl_vars['art_tytul']; ?>
" >
<meta property="og:url" content="<?php echo $this->_tpl_vars['site_url']; ?>
ogloszenie/<?php echo $this->_tpl_vars['art_id']; ?>
/<?php echo $this->_tpl_vars['art_tytul_n']; ?>
" >
<meta property="og:image" content="<?php echo $this->_tpl_vars['site_url']; ?>
images/<?php echo $this->_tpl_vars['art_id']; ?>
.jpg" >
<meta property="og:image:type" content="image/jpeg">



<?php else: ?>
<meta property="og:title" content="<?php echo $this->_tpl_vars['title']; ?>
" >
<meta property="og:url" content="<?php echo $this->_tpl_vars['site_url']; ?>
" >
<meta property="og:image:type" content="image/jpeg">
<?php endif; ?>


	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/function.js"></script>
	<?php if ($this->_tpl_vars['blok_woj_on'] == '1'): ?>
		<script type="text/javascript" src="js/jquery.cssmap.js"></script> 
		<link rel="stylesheet" type="text/css" media="screen,projection" href="js/cssmap-poland/cssmap-poland.css" />
		<?php echo '
			<script type="text/javascript">
			$(function($){
			$(\'#map-poland\').cssMap({\'size\' : 170});
			});
			</script>
		'; ?>

	<?php endif; ?> 
	<link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

	<script type="text/javascript" src="admin/js/tiny_mce/tiny_mce.js"></script>
               <?php if ($this->_tpl_vars['strona_get'] == 'add' || ( $this->_tpl_vars['strona_get'] == 'ogl' && $this->_tpl_vars['ds_x'] != "" && $this->_tpl_vars['ds_y'] != "" )): ?>


	<?php echo '

<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
      var map;
      var marker;
      

      function initialize() {
	
        var myOptions = {
          zoom: '; ?>
<?php echo $this->_tpl_vars['ds_zoom']; ?>
<?php echo ',
          center: new google.maps.LatLng('; ?>
<?php echo $this->_tpl_vars['ds_x']; ?>
, <?php echo $this->_tpl_vars['ds_y']; ?>
<?php echo '),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById(\'mapa\'),myOptions);

        marker = new google.maps.Marker({
            map:map,
            draggable: '; ?>
<?php if ($this->_tpl_vars['strona_get'] == 'add'): ?>true<?php else: ?>false<?php endif; ?><?php echo ',
            animation: google.maps.Animation.DROP,
            position: new google.maps.LatLng('; ?>
<?php echo $this->_tpl_vars['ds_x']; ?>
, <?php echo $this->_tpl_vars['ds_y']; ?>
<?php echo ')
          });
        google.maps.event.addListener(marker, \'click\', toggleBounce);

        google.maps.event.addListener(marker, \'drag\', function() {
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
document.getElementById(\'lat\').value = latLng.lat();
document.getElementById(\'lng\').value = latLng.lng();
document.getElementById(\'zoom\').value = map.getZoom();
}
 


  

      google.maps.event.addDomListener(window, \'load\', initialize);
    </script>

    '; ?>


<?php endif; ?>

<?php echo '
   <script type="text/javascript">


tinyMCE.init({
		// General options
		mode : "exact",
                language: "'; ?>
<?php echo $this->_tpl_vars['lang'][1]; ?>
<?php echo '",
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
tinyMCE.execCommand(\'mceAddControl\', false, id);
}
else
{
tinyMCE.execCommand(\'mceRemoveControl\', false, id);
}

}

</script>

'; ?>


<?php if ($this->_tpl_vars['gp_like'] == '1'): ?>

<?php echo '
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: \'pl\'}
</script>
'; ?>


<?php endif; ?>
<?php echo '
<style type="text/css">

#s7 { width: 100%; height: 50px; }



</style>
'; ?>





<?php echo '

   <script type="text/javascript">

'; ?>

<?php if ($this->_tpl_vars['sgi'] == 'index'): ?>
<?php echo '
$(\'#s7\').cycle({ 
     fx:     \'scrollLeft\', 
    timeout: 15000, 
    delay:  -2000 
});
$(\'#s8\').cycle({ 
     fx:     \'scrollLeft\', 
    timeout: 15000, 
    delay:  20000 
});
$(\'#pro_new\').cycle({ 
     fx:     \'scrollLeft\', 
    timeout: 15000, 
    delay:  -2000 
});
'; ?>

<?php endif; ?>
<?php echo '
$(\'#naj_new\').cycle({ 
     fx:     \'scrollLeft\', 
    timeout: 15000, 
    delay:  -2000 
});
    $(function() {
        $(\'#gallery a\').fancybox();
    });
'; ?>



</script>


</head>

<body>
