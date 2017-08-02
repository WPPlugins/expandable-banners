<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Expandable Banners (Free Version)
Plugin URI: http://expandablebanners.com
Description: Create professional expandable banners for any page on your Wordpress site.
Version: 1.2
Author: Melodic Media
Author URI: http://melodicmedia.com
License: Copyright 2013 Melodic Media
*/

include_once('expandableoptions.php');

add_action('wp_enqueue_scripts', 'exp_expandablehead');
add_action('wp_footer', 'exp_expandablediv');
add_filter( 'plugin_row_meta', 'exp_plugin_meta_links', 10, 2 );

function exp_plugin_meta_links( $links, $file ) {
 
$plugin = plugin_basename(__FILE__);
 
// create link
if ( $file == $plugin ) {
return array_merge(
$links,
array( '<a href="http://www.expandablebanners.com/buy_exp_wp.php">Buy Full Version</a>' )
);
}
return $links;
 
}


function exp_expandablehead() {
      

	wp_register_script( 'melo-expandablebanner', plugins_url('expandablebanners.js', __FILE__));
	wp_enqueue_script('expandableflashscript',  plugins_url('swfobject/swfobject.js', __FILE__));
        wp_enqueue_script( 'melo-expandablebanner' );

	
}



function exp_expandablediv(){ 
?>

<?php 
global $wpdb;
$folder=plugins_url('', __FILE__)."/images";
$ml_expandableoptions=get_option('exp_options');
if($ml_expandableoptions){
	
	
	

?>

<?php
 
	  $bannername=str_replace(' ','_',$ml_expandableoptions['bannername']);
	  $ispg="No";
	  if($ml_expandableoptions['showonpage']=='All'){
		  $ispg="Yes";
	  }else if($ml_expandableoptions['showonpage']=='Home' && is_home()){
		  $ispg="Yes";
	  }else{
	  $pgs=explode(',',$ml_expandableoptions['pagetitle']);
	  $this_title=get_the_title(get_the_ID());
	  
	  foreach($pgs as $pg){
	      if($pg==$this_title){
		       $ispg="Yes";
		  }
	  }
	  }
	  if($ispg=="Yes"){
	  $bannername=$ml_expandableoptions['bannername'];
	  $bannerid=$ml_expandableoptions['bannerid'];
	   $bannertype=$ml_expandableoptions['bannertype'];
        $pagetitle=$ml_expandableoptions['pagetitle'];
		 $beforediv=$ml_expandableoptions['beforediv'];
		 $firstonpage=$ml_expandableoptions['firstonpage'];
		  $showonpage=$ml_expandableoptions['showonpage'];
		   $abovecss=$ml_expandableoptions['abovecss'];
		    $belowcss=$ml_expandableoptions['belowcss'];
			 $hasjavascript=$ml_expandableoptions['hasjavascript'];
	    $divid=$ml_expandableoptions['divid'];
		$htmbannertype=$ml_expandableoptions['htmbannertype'];
		$mainhtmfile=$ml_expandableoptions['mainhtmfile'];
	   $useclosebutton=$ml_expandableoptions['closebutton'];
	    $closebuttonposition=$ml_expandableoptions['closebuttonposition'];
		  $flvclosebutton=$ml_expandableoptions['flashclosebutton'];
	   $firstbackup=$ml_expandableoptions['firstbackup'];
	   $mainbackup=$ml_expandableoptions['mainbackup'];
	   		  $animationspeed=$ml_expandableoptions['animationspeed'];
			   $responsive=$ml_expandableoptions['responsive'];
		   $screensize=$ml_expandableoptions['screensize'];
		    $minscreen=$ml_expandableoptions['minscreen'];
			 $maxscreen=$ml_expandableoptions['maxscreen'];
	   $mainnewwindow=$ml_expandableoptions['mainnewwindow'];
	    $firsthtml=str_replace("^","'",str_replace('|','"',$ml_expandableoptions['firsthtml']));

          $mainhtml=str_replace("^","'",str_replace('|','"',$ml_expandableoptions['mainhtml']));

	   $addextra=$ml_expandableoptions['addextra'];
		$extracode=$ml_expandableoptions['extracode'];
	    $firsthtmlwidth=$ml_expandableoptions['firsthtmlwidth'];
	   $mainhtmlwidth=$ml_expandableoptions['mainhtmlwidth'];
	    $firsthtmlheight=$ml_expandableoptions['firsthtmlheight'];
	   $mainhtmlheight=$ml_expandableoptions['mainhtmlheight'];
		$firstflashbanner=$ml_expandableoptions['firstflashbanner'];
		$mainflashbanner=$ml_expandableoptions['mainflashbanner'];
	   $bannerid=$ml_expandableoptions['bannerid'];
	   $mainbanner=$ml_expandableoptions['mainbanner'];
	   $mainurl=$ml_expandableoptions['mainurl'];
	   $expandon=$ml_expandableoptions['expandon'];
	   $expanddirection=$ml_expandableoptions['expanddirection'];
	   $autoopen=$ml_expandableoptions['autoopen'];
	   $autoclose=$ml_expandableoptions['autoclose'];
	   $autoopentime=$ml_expandableoptions['autoopentime']*1000;
	   $autoclosetime=$ml_expandableoptions['autoclosetime']*1000;
	   $onceperday=$ml_expandableoptions['onceperday'];
	   $firstbanner=$ml_expandableoptions['firstbanner'];
	   $animate=$ml_expandableoptions['animate'];
	    $cornerpeel=$ml_expandableoptions['cornerpagepeel'];
		 $htmlcloseoutside=$ml_expandableoptions['htmlcloseoutside'];
	   $closebanner=$ml_expandableoptions['closebanner'];
	     $firstwidth=$ml_expandableoptions['firstwidth'];
		   $firstheight=$ml_expandableoptions['firstheight'];
		   $mainwidth=$ml_expandableoptions['mainwidth'];
		   $mainheight=$ml_expandableoptions['mainheight'];
		   $closewidth=$ml_expandableoptions['closewidth'];
		   $closeheight=$ml_expandableoptions['closeheight'];
		    $firstflashwidth=$ml_expandableoptions['firstflashwidth'];
		   $firstflashheight=$ml_expandableoptions['firstflashheight'];
		   $mainflashwidth=$ml_expandableoptions['mainflashwidth'];
		   $mainflashheight=$ml_expandableoptions['mainflashheight'];
	     $cpos=explode('-',$ml_expandableoptions['closebuttonposition']);?>
         <?php if($responsive=='Yes'){?>
         <style type="text/css">
img
{
	max-width:100%;
	}
div
{
	max-width:100%;
	}

iframe
{
	max-width:100%;
	}
	
</style>
         <?php }?>
         <script type="text/javascript">
           
          var adm_url="<?php echo esc_url(admin_url());?>"; 
	  <?php if($bannertype=="Image"){?>
			var <?php echo esc_js($bannername); ?> = ExpandableBanners.banner("<?php echo esc_js($bannername); ?>", '<?php echo esc_url($folder."/".$mainbanner); ?>');
			<?php echo esc_js($bannername); ?>.link = "http://<?php echo esc_url($mainurl); ?>";
			
			<?php echo esc_js($bannername); ?>.banid = "<?php echo esc_js($bannerid); ?>|Plugin|Exp";
			ocis(<?php echo esc_js($bannername); ?>.banid);
		<?php	if($useclosebutton=='Yes'){
				$cbp=explode('-',$closebuttonposition);?>
			     <?php echo esc_js($bannername); ?>.setCloseImage("<?php if($closebanner=='close.png' || $closebanner=='close-blacktext.png' || $closebanner=='close-whitetext.png'){ echo esc_url($folder."/".$closebanner); }else{ echo esc_url($folder."/".$closebanner);}?>", '<?php echo esc_js($cbp[1]);?>', '<?php echo esc_js($cbp[0]); ?>');
				 <?php echo esc_js($bannername); ?>.closeOutside = <?php echo esc_js($htmlcloseoutside); ?>;
				  <?php if($addextra=='true'){?>
				     <?php echo esc_js($bannername); ?>.extraCode = '<?php echo esc_js($extracode); ?>';
				 <?php }?>
			<?php }?>
			 <?php if($responsive=='Yes'){?>
                           <?php echo esc_js($bannername); ?>.responsive = true;

                      <?php }?>

			<?php if($animate=='Yes'){?>
					<?php echo esc_js($bannername); ?>.animated = true;
					<?php echo esc_js($bannername); ?>.animationSpeed = <?php echo esc_js($animationspeed); ?>;
			<?php }else{?>
			     <?php echo esc_js($bannername); ?>.animated = false;
			<?php }
			$ed=explode('-',$expanddirection);?>
			<?php	if($expandon=='Rollover'){		?>
					<?php echo esc_js($bannername); ?>.expandOnClick = false;
		<?php	}else if($expandon=='Click'){?>
			       <?php echo esc_js($bannername); ?>.expandOnClick = true;
		<?php	}?>
			<?php echo esc_js($bannername); ?>.setDirection('<?php echo esc_js($ed[1]); ?>', '<?php echo esc_js($ed[0]); ?>'); 
		<?php
			
	   }else  if($bannertype=="Flash"){?>
		   var <?php echo esc_js($bannername); ?> = ExpandableBanners.banner("<?php echo esc_js($bannername); ?>", "<?php echo esc_url($folder."/".$mainflashbanner); ?>", <?php echo esc_js($mainflashwidth); ?>, <?php echo esc_js($mainflashheight); ?>);
		  <?php echo esc_js($bannername); ?>.banid = "<?php echo esc_js($bannerid); ?>|Plugin|Exp";
			ocis(<?php echo esc_js($bannername); ?>.banid);
		<?php	if($useclosebutton=='Yes'){
				$cbp=explode('-',$closebuttonposition);?>
			     <?php echo esc_js($bannername); ?>.setCloseImage("<?php if($closebanner=='close.png' || $closebanner=='close-blacktext.png' || $closebanner=='close-whitetext.png'){ echo esc_url($folder."/".$closebanner); }else{ echo esc_url($folder."/".$closebanner);}?>", '<?php echo esc_js($cbp[1]);?>', '<?php echo esc_js($cbp[0]); ?>');
				 <?php echo esc_js($bannername); ?>.closeOutside = <?php echo esc_js($htmlcloseoutside); ?>;
				  <?php if($addextra=='true'){?>
				     <?php echo esc_js($bannername); ?>.extraCode = '<?php echo esc_js($extracode); ?>';
				 <?php }?>
		<?php	}else{?>
			    <?php echo esc_js($bannername); ?>.setCloseImage("<?php echo esc_url($folder); ?>/blank.gif", 'left', 'top');
		<?php	}
			if($animate=='Yes'){?>
					<?php echo esc_js($bannername); ?>.animated = true;
					<?php echo esc_js($bannername); ?>.animationSpeed = <?php echo esc_js($animationspeed); ?>;
			<?php }else{?>
			     <?php echo esc_js($bannername); ?>.animated = false;
			<?php }
			$ed=explode('-',$expanddirection);?>
			<?php echo esc_js($bannername); ?>.setDirection('<?php echo esc_js($ed[1]); ?>', '<?php echo esc_js($ed[0]); ?>'); 
	<?php
	   }else  if($bannertype=="HTML"){ if($htmbannertype=='Code'){
	   ?>
	     
		  var <?php echo esc_js($bannername); ?> = ExpandableBanners.banner("<?php echo esc_js($bannername); ?>", '<?php echo str_replace("</script>",'~',str_replace("'",'^',str_replace('"','|',trim(preg_replace('/\s+/', ' ', $mainhtml))))); ?>',<?php echo esc_js($mainhtmlwidth); ?>,<?php echo esc_js($mainhtmlheight); ?>);
		 <?php echo esc_js($bannername); ?>.banid = "<?php echo esc_js($bannerid); ?>|Plugin|Exp";
			ocis(<?php echo esc_js($bannername); ?>.banid);
		  <?php }else{?>
		    var <?php echo esc_js($bannername); ?> = ExpandableBanners.banner("<?php echo esc_js($bannername); ?>", '<?php echo esc_url($mainhtmfile); ?>',<?php echo esc_js($mainhtmlwidth); ?>,<?php echo esc_js($mainhtmlheight); ?>);
		  <?php }?>
		<?php	if($useclosebutton=='Yes'){
				$cbp=explode('-',$closebuttonposition);?>
			     <?php echo esc_js($bannername); ?>.setCloseImage("<?php if($closebanner=='close.png' || $closebanner=='close-blacktext.png' || $closebanner=='close-whitetext.png'){ echo esc_url($folder."/".$closebanner); }else{ echo esc_url($folder."/".$closebanner);}?>", '<?php echo esc_js($cbp[1]);?>', '<?php echo esc_js($cbp[0]); ?>');
				 <?php echo esc_js($bannername); ?>.closeOutside = <?php echo esc_js($htmlcloseoutside); ?>;
				  <?php if($addextra=='true'){?>
				     <?php echo esc_js($bannername); ?>.extraCode = '<?php echo esc_js($extracode); ?>';
				 <?php }?>
		<?php	}?>
			  <?php if($hasjavascript=='Yes'){?>
			<?php echo esc_js($bannername); ?>.hasJavascript = true;
			<?php }?>
			 <?php if($responsive=='Yes'){?>
                           <?php echo esc_js($bannername); ?>.responsive = true;

                      <?php }?>

			<?php if($animate=='Yes'){?>
					<?php echo esc_js($bannername); ?>.animated = true;
					<?php echo esc_js($bannername); ?>.animationSpeed = <?php echo esc_js($animationspeed); ?>;
			<?php }else{?>
			     <?php echo esc_js($bannername); ?>.animated = false;
			<?php }
			$ed=explode('-',$expanddirection);?>
			<?php echo esc_js($bannername); ?>.setDirection('<?php echo esc_js($ed[1]); ?>', '<?php echo esc_js($ed[0]); ?>'); 
			<?php echo esc_js($bannername); ?>.expandOnClick = true;
			<?php
	   }
	   ?>
	   
    </script>
<?php  if($bannertype=="Flash"){?>
    <script type="text/javascript">
	var flashvars = true;
var params = {
  wmode: "transparent"
  };
var attributes = {};
        swfobject.embedSWF("<?php echo esc_url($folder."/".$firstflashbanner); ?>", "<?php echo esc_js($bannername); ?>_large_exp", "<?php echo esc_js($firstflashwidth); ?>", "<?php echo esc_js($firstflashheight); ?>", "9.0.0", "<?php echo esc_url(plugins_url('', __FILE__)); ?>swfobject/expressInstall.swf", flashvars, params, attributes);
    </script>
<?php } ?>
<style type="text/css">
<?php if($responsive=='No'){?>
<?php if($screensize=='Desktop'){?>
	@media screen 
and (min-width : 0px) 
and (max-width : <?php echo $minscreen-1; ?>px) {

#<?php echo $bannername; ?> {
 display:none;
}
}
@media screen 
and (min-width : <?php echo $minscreen; ?>px) 
and (max-width : <?php echo $maxscreen; ?>px) {

#<?php echo $bannername; ?> {
 display:block;
}
}

	<?php }else if($screensize=='Tablet'){?>
	@media screen 
and (min-width : 0px) 
and (max-width : <?php echo $minscreen-1; ?>px) {

#<?php echo $bannername; ?> {
 display:none;
}
}
@media screen 
and (min-width : <?php echo $minscreen; ?>px) 
and (max-width : <?php echo $maxscreen; ?>px) {

#<?php echo $bannername; ?> {
 display:block;
}
}

@media screen 
and (min-width : <?php echo $maxscreen+1; ?>px) 
and (max-width : 4000px) {

#<?php echo $bannername; ?> {
 display:none;
}
}

	<?php }else if($screensize=='Mobile'){?>
	@media screen 
and (min-width : <?php echo $minscreen; ?>px) 
and (max-width : <?php echo $maxscreen; ?>px) {

#<?php echo $bannername; ?> {
display:block;
}

}
	@media screen 
and (min-width : <?php echo $maxscreen+1; ?>px) 
and (max-width : 4000px) {

#<?php echo $bannername; ?> {
display:none;
}

}

	<?php }
}
	?>
<?php if($onceperday=='Yes'){ ?>

#ExpAd2_<?php echo $bannername; ?> {
   display: none;
}
#ExpAd2_<?php echo $bannername; ?>.show {
    display: block;
}

<?php }?>


</style>
<div id="tmp_exp_<?php echo esc_attr($bannername); ?>" style="display:hidden"> <div style="<?php echo esc_attr($abovecss);?>"></div>  <center>
<?php if($onceperday=='Yes'){ ?>
  <div id="ExpAd2_<?php echo esc_attr($bannername); ?>">   
  <?php }?>   
          
          <?php if($cornerpeel=='Yes'){?>
                        <div style="position:absolute;<?php if($ed[1]=="down"){ ?>top:0px;<?php }else if($ed[1]=="up"){?>bottom:0px;<?php }else{?>top:40%;<?php }?><?php if($ed[0]=="left"){ ?>right:0px;<?php }else if($ed[0]=="right"){?>left:0px;<?php }else{?>left:40%;<?php }?>">
                        <?php }?>
              <?php if($bannertype=="Image"){ ?>
               <a  href="http://<?php echo esc_url($mainurl); ?>" <?php if($mainnewwindow=='Yes'){?>target="_blank"<?php }?>><img src="<?php echo esc_url($folder.'/'.$firstbanner); ?>" id="<?php echo esc_attr($bannername); ?>"/></a>
              <?php }else if($bannertype=="Flash"){?>
                <div id="<?php echo esc_attr($bannername); ?>" style="width:<?php echo esc_attr($firstflashwidth); ?>px;height:<?php echo esc_attr($firstflashheight); ?>px;">
      				 <div id="<?php echo esc_attr($bannername); ?>_large_exp"><?php if($firstbackup=='Yes'){ ?><img src="<?php echo esc_url($folder.'/'.$firstbanner); ?>" width="<?php echo esc_attr($firstwidth); ?>" height="<?php echo esc_attr($firstheight); ?>" border="0"><?php }?></div>
         </div>
              <?php }else if($bannertype=="HTML"){?>
              <div id="<?php echo esc_attr($bannername); ?>" style="<?php if($responsive=='Yes'){?>max-width:100%;<?php }?>width:<?php echo esc_attr($firsthtmlwidth);?>px; height:<?php echo esc_attr($firsthtmlheight);?>px; position:relative; font-weight:bold">
              <?php if($responsive=='Yes'){?><div id="firstimg_<?php echo esc_attr($bannername); ?>"><?php }?> 
              <?php echo $firsthtml; ?>
               <?php if($responsive=='Yes'){?></div><?php }?>  

            </div>
              <?php }?>    
               <?php if($cornerpeel=='Yes'){?>
                        </div>
                        <?php }?>  
                       
                        <?php if($onceperday=='Yes'){ ?>
</div>
<script type="text/javascript">
var days = 1;
var ExpAd2_<?php echo esc_js($bannername); ?> = document.getElementById('ExpAd2_<?php echo esc_js($bannername); ?>');
if (readCookie('seenExpAdvert_<?php echo esc_js($bannername); ?>')) {
    ExpAd2_<?php echo esc_js($bannername); ?>.className = '';
} else {
    ExpAd2_<?php echo esc_js($bannername); ?>.className = 'show';
    createCookie('seenExpAdvert_<?php echo esc_js($bannername); ?>', 'yes', days);
}
</script>

<?php }?>  
</center> <div style="<?php echo esc_attr($belowcss);?>"></div>
   </div>
   
   <script type="text/javascript">

   <?php if($cornerpeel=='No'){?>
<?php if($firstonpage=='Yes'){?>
 
jQuery( "body" ).prepend(document.getElementById('tmp_exp_<?php echo esc_js($bannername); ?>').innerHTML);

<?php }else{?>
if(document.getElementById('<?php echo esc_js($divid); ?>')!=null){
	
<?php if($beforediv=='Yes'){?>
document.getElementById('<?php echo esc_js($divid); ?>').innerHTML=document.getElementById('tmp_exp_<?php echo esc_js($bannername); ?>').innerHTML+document.getElementById('<?php echo esc_js($divid); ?>').innerHTML;
<?php }else{?>
document.getElementById('<?php echo esc_js($divid); ?>').innerHTML+=document.getElementById('tmp_exp_<?php echo esc_js($bannername); ?>').innerHTML;
<?php }?>
}
<?php }?>
document.getElementById('tmp_exp_<?php echo esc_js($bannername); ?>').innerHTML="";
<?php }else{?>
jQuery( "body" ).append(document.getElementById('tmp_exp_<?php echo esc_js($bannername); ?>').innerHTML);
document.getElementById('tmp_exp_<?php echo esc_js($bannername); ?>').innerHTML="";
<?php }?>

 <?php if($responsive=='Yes'){ ?>if(document.getElementById('firstimg_<?php echo esc_js($bannername); ?>')!=null){
	 console.log(document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientHeight);
  document.getElementById('<?php echo esc_js($bannername); ?>').style.width=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientWidth+'px';
   document.getElementById('<?php echo esc_js($bannername); ?>').style.height=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientHeight+'px';
}<?php }?>
   </script>
	   <?php 
	  }

  
?>    


	<script type="text/javascript">
 

	 function autoExpand() {
	<?php 
	 
	  $ispg="No";
	  if($ml_expandableoptions['showonpage']=='All'){
		  $ispg="Yes";
	  }else if($ml_expandableoptions['showonpage']=='Home' && is_home()){
		  $ispg="Yes";
	  }else{
	  $pgs=explode(',',$ml_expandableoptions['pagetitle']);
	  $this_title=get_the_title(get_the_ID());
	  
	  foreach($pgs as $pg){
	      if($pg==$this_title){
		       $ispg="Yes";
		  }
	  }
	  }
	  if($ispg=="Yes"){
	   
	?>
	 <?php if($autoopen=='Yes'){?>
			setTimeout("ExpandableBanners.openAd('<?php echo esc_js($bannername); ?>')",<?php echo esc_js($autoopentime); ?>);
			<?php }?>
			 <?php if($autoopen=='Yes'){?>
			setTimeout("ExpandableBanners.closeAd('<?php echo esc_js($bannername); ?>')",<?php echo esc_js($autoclosetime); ?>);
			<?php }?>
   
					<?php } 
	     
					?>
	}
    </script>


 <script type="text/javascript">
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
 
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
 
function eraseCookie(name) {
	createCookie(name,"",-1);
}
if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded",function(){documentReady=true;autoExpand();});}
else if (!window.onload) window.onload = function(){documentReady=true;autoExpand();}


	   

</script>




<?php


}
}

function exp_db_install(){
	global $wpdb;
  

  
   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    
 $table_name = $wpdb->prefix . "daily_stats";
   $sql="CREATE TABLE IF NOT EXISTS ".$table_name." (
  `idDailyStats` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BannerId` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `BannerType` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Expandable',
  `StatsDate` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `StatsMonth` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `StatsYear` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DClicks` int(11) NOT NULL DEFAULT '0',
  `DImpressions` int(11) NOT NULL DEFAULT '0',
  `DOpens` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idDailyStats`),
  KEY `BannerId` (`BannerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
dbDelta( $sql );
}

register_activation_hook( __FILE__, 'exp_db_install' );
function exp_copyr($source, $dest)
{
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
		if(is_file($source.'/'.$entry) && strpos($entry,'ile_')==1)
        exp_copyr("$source/$entry", "$dest/$entry");
    }

    // Clean up
    $dir->close();
    return true;
}
function exp_backup()
{
	$upload_dir = wp_upload_dir();
	$to = $upload_dir['basedir']."/expandable_images_backup/";
	$from = plugin_dir_path(__FILE__)."images/";
	if(is_dir($to))exp_rmdirr($to);
	exp_copyr($from, $to);
}
function exp_recover()
{
	$upload_dir = wp_upload_dir();
	$from = $upload_dir['basedir']."/expandable_images_backup/";
	$to = plugin_dir_path(__FILE__)."images/";
	exp_copyr($from, $to);
	if (is_dir($from)) {
		exp_rmdirr($from);#http://putraworks.wordpress.com/2006/02/27/php-delete-a-file-or-a-folder-and-its-contents/
	}
	
}
function exp_rmdirr($dirname)
{
// Sanity check
if (!file_exists($dirname)) {
return false;
}

// Simple delete for a file
if (is_file($dirname)) {
return unlink($dirname);
}

// Loop through the folder
$dir = dir($dirname);
while (false !== $entry = $dir->read()) {
// Skip pointers
 if ($entry == '.' || $entry == '..') {
continue;
}

// Recurse
exp_rmdirr("$dirname/$entry");
}

// Clean up
$dir->close();
return rmdir($dirname);
}
add_filter('upgrader_pre_install', 'exp_backup', 10, 2);
add_filter('upgrader_post_install', 'exp_recover', 10, 2);
?>