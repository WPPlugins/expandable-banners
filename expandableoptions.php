<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action('admin_menu', 'exp_menu');
add_action('admin_init', 'exp_expandableoptions_init' );
add_action('wp_ajax_exp_submit','exp_submit_callback');
add_action('wp_ajax_exp_uplimage','exp_uplimage_callback');
add_action('wp_ajax_exp_clicks','exp_clicks_callback');
add_action('wp_ajax_exp_impressions','exp_impressions_callback');
add_action('wp_ajax_exp_opens','exp_opens_callback');
add_action('wp_ajax_nopriv_exp_clicks','exp_clicks_callback');
add_action('wp_ajax_nopriv_exp_impressions', 'exp_impressions_callback');
add_action('wp_ajax_nopriv_exp_opens','exp_opens_callback');
function exp_clicks_callback(){
	global $wpdb;
	$week=date('W');
	$date=date('m-d-Y');
	$month=date('F');
				 $year=date('Y');
				      $bannerid=sanitize_text_field($_POST['id']);
						  
							 	 $id=$date."_".$bannerid;
							 $mres=$wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix ."daily_stats WHERE StatsDate=%s AND StatsMonth=%s AND BannerId=%s AND StatsYear=%s AND BannerType='Expandable'",$date,$month,$bannerid,$year));
							 
							 if(!$mres){
								
								 $res=$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix ."daily_stats(idDailyStats,BannerId,BannerType,StatsDate,StatsMonth,StatsYear,DClicks) VALUES(%s,%s,'Expandable',%s,%s,%s,'1')",$id,$bannerid,$date,$month,$year));
							 }else{
								
								
								
								$res=$wpdb->update($wpdb->prefix."daily_stats",array('DClicks'=>$mres->DClicks+1),array('StatsDate'=>$date, 'StatsMonth'=>$month , 'BannerId'=>$bannerid ,'StatsYear'=>$year, 'BannerType'=>'Expandable'));
								 
							 }
							 
}
function exp_impressions_callback(){
	global $wpdb;
	$week=date('W');
	$date=date('m-d-Y');
	$month=date('F');
				 $year=date('Y');
				      $bannerid=sanitize_text_field($_POST['id']);
						  
							 	 $id=$date."_".$bannerid;
							 $mres=$wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix ."daily_stats WHERE StatsDate=%s AND StatsMonth=%s AND BannerId=%s AND StatsYear=%s AND BannerType='Expandable'",$date,$month,$bannerid,$year));
							 
							 if(!$mres){
								
								 $res=$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix ."daily_stats(idDailyStats,BannerId,BannerType,StatsDate,StatsMonth,StatsYear,DImpressions) VALUES(%s,%s,'Expandable',%s,%s,%s,'1')",$id,$bannerid,$date,$month,$year));
							 }else{
								
								
								
								$res=$wpdb->update($wpdb->prefix."daily_stats",array('Dimpressions'=>$mres->DImpressions+1),array('StatsDate'=>$date, 'StatsMonth'=>$month , 'BannerId'=>$bannerid ,'StatsYear'=>$year, 'BannerType'=>'Expandable'));
								 
							 }
							 
}
function exp_opens_callback(){
	global $wpdb;
	$week=date('W');
	$date=date('m-d-Y');
	$month=date('F');
				 $year=date('Y');
				      $bannerid=sanitize_text_field($_POST['id']);
						  
							 	 $id=$date."_".$bannerid;
							 $mres=$wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix ."daily_stats WHERE StatsDate=%s AND StatsMonth=%s AND BannerId=%s AND StatsYear=%s AND BannerType='Expandable'",$date,$month,$bannerid,$year));
							 
							 if(!$mres){
								
								 $res=$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix ."daily_stats(idDailyStats,BannerId,BannerType,StatsDate,StatsMonth,StatsYear,DOpens) VALUES(%s,%s,'Expandable',%s,%s,%s,'1')",$id,$bannerid,$date,$month,$year));
							 }else{
								
								
								
								$res=$wpdb->update($wpdb->prefix."daily_stats",array('DOpens'=>$mres->DOpens+1),array('StatsDate'=>$date, 'StatsMonth'=>$month , 'BannerId'=>$bannerid ,'StatsYear'=>$year, 'BannerType'=>'Expandable'));
								 
							 }
							 
}
function exp_uplimage_callback(){
	 $folder=plugin_dir_path( __FILE__)."images";
	 
	if(!is_dir($folder)){
	  
            @mkdir($folder);	
			
       }
	   

if(@is_uploaded_file(sanitize_text_field($_FILES['file']['tmp_name'])) ){
	
	                 if(sanitize_text_field($_POST['previmg'])!='' && file_exists($folder."/".sanitize_text_field($_POST['previmg']))  && strpos(sanitize_text_field($_POST['previmg']),'ile_')!=false){
											     unlink($folder."/".sanitize_text_field($_POST['previmg']));
											 }
	
					$fname = sanitize_text_field($_FILES['file']["name"]);
					$filesize= sanitize_text_field($_FILES['file']["size"]);
					if(!$fname==""){					
					$chk_ext = explode(".",$fname);
									
								 if(strtolower($chk_ext[1]) == "gif" || strtolower($chk_ext[1]) == "jpg" || strtolower($chk_ext[1]) == "png" || strtolower($chk_ext[1]) == "swf")
								 {
									if(sanitize_text_field($_POST['ftype'])=="firstflashfile" && $filesize>50000){
									       echo "sizeerror";
										   die();
									}else if(sanitize_text_field($_POST['ftype'])=="mainflashfile" && $filesize>250000){
									       echo "sizeerror";
										    die();
									}else if(sanitize_text_field($_POST['ftype'])=="firstbackupimage" && $filesize>250000){
									       echo "sizeerror";
										    die();
									}else if(sanitize_text_field($_POST['ftype'])=="mainbackupimage" && $filesize>250000){
									       echo "sizeerror";
										    die();
									}else if(sanitize_text_field($_POST['ftype'])=="firstimage" && $filesize>50000){
									       echo "sizeerror";
										    die();
									}else if(sanitize_text_field($_POST['ftype'])=="mainimage" && $filesize>250000){
									       echo "sizeerror";
										    die();
									}else if(sanitize_text_field($_POST['ftype'])=="closeimage" && $filesize>50000){
									       echo "sizeerror";
										    die();
									}else{
										
											 $filename = sanitize_text_field($_FILES['file']['tmp_name']);
									     
											  $serverbanner="file_".rand(0, 9999999999).".".$chk_ext[1];
											  while (file_exists($folder."/".$serverbanner))
		                                             $serverbanner="file_".rand(0, 9999999999).".".$chk_ext[1];
		                                      $savefile=$folder."/".$serverbanner;
								            
											 @move_uploaded_file($filename, $savefile);
											
											 echo $serverbanner;
											  die();
											
									}
											 
								
						}else{
							
						  echo "Imageerror";
						
						}
					}
}

	}
function exp_submit_callback(){
	header('content-type: text/html; charset=utf-8');
global $wpdb;
$folder=plugins_url('', __FILE__)."/images";
 
   if(isset($_POST['action']) && sanitize_text_field($_POST['action'])=='exp_submit'){
	   $bannername=sanitize_text_field($_POST['bannername']);
	   $bannername=str_replace(' ','_',$bannername);
	   $bannertype=sanitize_text_field($_POST['bannertype']);
        $pagetitle=sanitize_text_field($_POST['pagetitle']);
		$htmbannertype=sanitize_text_field($_POST['htmbannertype']);
		$addextra=sanitize_text_field($_POST['addextra']);
		$extracode=sanitize_text_field($_POST['extracode']);
		$mainhtmfile=sanitize_text_field($_POST['mainhtmfile']);
		 $beforediv=sanitize_text_field($_POST['beforediv']);
		 $firstonpage=sanitize_text_field($_POST['firstonpage']);
		  $responsive=sanitize_text_field($_POST['responsive']);
		   $screensize=sanitize_text_field($_POST['screensize']);
		    $minscreen=intval(sanitize_text_field($_POST['minscreen']));
			 $maxscreen=intval(sanitize_text_field($_POST['maxscreen']));
			  $hasjavascript=sanitize_text_field($_POST['hasjavascript']);
		  $showonpage=sanitize_text_field($_POST['showonpage']);
		   $abovecss=sanitize_text_field($_POST['abovecss']);
		    $belowcss=sanitize_text_field($_POST['belowcss']);
	    $divid=sanitize_text_field($_POST['divid']);
	   $useclosebutton=sanitize_text_field($_POST['useclosebutton']);
	    $closebuttonposition=sanitize_text_field($_POST['closebuttonposition']);
		  $flvclosebutton=sanitize_text_field($_POST['flvclosebutton']);
	   $firstbackup=sanitize_text_field($_POST['firstbackup']);
	   $mainbackup=sanitize_text_field($_POST['mainbackup']);
	   		  $animationspeed=sanitize_text_field($_POST['animationspeed']);
	   $mainnewwindow=sanitize_text_field($_POST['mainewwindow']);
	    $fstr=explode('|',sanitize_text_field($_POST['firsthtml']));
	   $mstr=explode('|',sanitize_text_field($_POST['mainhtml']));

	    $firsthtml="";
	   $mainhtml="";
	    for($i=0; $i<count($fstr); $i++){
			if($fstr[$i]!='' && is_numeric($fstr[$i])){
         $firsthtml.=chr((int)$fstr[$i]);
			}
      }
	   for($i=0; $i<count($mstr); $i++){
		   if($mstr[$i]!='' && is_numeric($mstr[$i])){
         $mainhtml.=chr((int)$mstr[$i]);
		   }
      }
         $firsthtml=trim(preg_replace('/\s+/', ' ', str_replace("'",'^',str_replace('"','|',$firsthtml))));

          $mainhtml=trim(preg_replace('/\s+/', ' ', str_replace("'",'^',str_replace('"','|',$mainhtml))));
	   
	    $firsthtmlwidth=intval(sanitize_text_field($_POST['firsthtmlwidth']));
	   $mainhtmlwidth=intval(sanitize_text_field($_POST['mainhtmlwidth']));
	    $firsthtmlheight=intval(sanitize_text_field($_POST['firsthtmlheight']));
	   $mainhtmlheight=intval(sanitize_text_field($_POST['mainhtmlheight']));
		$firstflashbanner=sanitize_text_field($_POST['firstflashbanner']);
		$mainflashbanner=sanitize_text_field($_POST['mainflashbanner']);
	   $bannerid=sanitize_text_field($_POST['bannerid']);
	   $mainbanner=sanitize_text_field($_POST['mainbanner']);
	   $mainurl=sanitize_text_field($_POST['mainurl']);
	   $mainurl=str_replace('http://','',$mainurl);
	   $mainurl=str_replace('https://','',$mainurl);
	   if($bannertype=="Flash" && $_POST['mainbackupurl']!=''){
		 $mainurl=sanitize_text_field($_POST['mainbackupurl']);
	   $mainurl=str_replace('http://','',$mainurl);
	   $mainurl=str_replace('https://','',$mainurl);  
	   }
	   $expandon=sanitize_text_field($_POST['expandon']);
	   $expanddirection=sanitize_text_field($_POST['expanddirection']);
	   $autoopen=sanitize_text_field($_POST['autoopen']);
	   $autoclose=sanitize_text_field($_POST['autoclose']);
	   $autoopentime=intval(sanitize_text_field($_POST['autoopentime']));
	   $autoclosetime=intval(sanitize_text_field($_POST['autoclosetime']));
	   $onceperday=sanitize_text_field($_POST['onceperday']);
	   $firstbanner=sanitize_text_field($_POST['firstbanner']);
	   $animate=sanitize_text_field($_POST['animate']);
	    $cornerpeel=sanitize_text_field($_POST['cornerpeel']);
		 $htmlcloseoutside=sanitize_text_field($_POST['htmlcloseoutside']);
	   $closebanner=sanitize_text_field($_POST['closebanner']);
	     $firstwidth=0;
		   $firstheight=0;
		   $mainwidth=0;
		   $mainheight=0;
		   $closewidth=0;
		   $closeheight=0;
		    $firstflashwidth=0;
		   $firstflashheight=0;
		   $mainflashwidth=0;
		   $mainflashheight=0;
		 
		    if($firstflashbanner!=''){
			   $firstflash=getimagesize($folder.'/'.$firstflashbanner);
			   $firstflashwidth=$firstflash[0];
			   $firstflashheight=$firstflash[1];
		   }
		   if($mainflashbanner!=''){
			   $mainflash=getimagesize($folder.'/'.$mainflashbanner);
			   $mainflashwidth=$mainflash[0];
			   $mainflashheight=$mainflash[1];
		   }
		 if($firstbanner!=''){
		   $first=getimagesize($folder.'/'.$firstbanner);
		   $firstwidth=$first[0];
		   $firstheight=$first[1];
	   }
	    if($mainbanner!=''){
		   $main=getimagesize($folder.'/'.$mainbanner);
		   $mainwidth=$main[0];
		   $mainheight=$main[1];
		}
		if($closebanner=='close.png' || $closebanner=='close-blacktext.png' || $closebanner=='close-whitetext.png'){ 
		   $close=getimagesize($folder.'/'.$closebanner);
		}else if($closebanner!=''){
		  $close=getimagesize($folder.'/'.$closebanner);
		}
	    $closewidth=$close[0];
	    $closeheight=$close[1];
		
		if($bannerid=='new'){
			

				  $bannerid='bn_'.date('m-d-Y')."_".date('H:i:s');
				  
			     
				 
	 $exp_expandableoptions = array(
	'bannerid' => $bannerid,								
	'bannername' => $bannername,
	'bannertype' => $bannertype,
	'firsthtml' => esc_sql(utf8_encode($firsthtml)),
	'firsthtmlwidth' => $firsthtmlwidth,
	'firsthtmlheight' => $firsthtmlheight,
	'firstbackup' => $firstbackup,
	'firstflashbanner' => $firstflashbanner,
	'firstflashwidth' => $firstflashwidth,
	'firstflashheight' => $firstflashheight,
	'flashclosebutton' => $flvclosebutton,
	'htmlcloseoutside' => $htmlcloseoutside,
	'mainbackup' => $mainbackup,
	'animationspeed' => $animationspeed,
	'mainnewwindow' => $mainnewwindow,
	'hasjavascript' => $hasjavascript,
	'mainhtml' => esc_sql(utf8_encode($mainhtml)),
	'htmbannertype' => $htmbannertype,
	'mainhtmfile' => $mainhtmfile,
	'mainhtmlheight' => $mainhtmlheight,
	'mainhtmlwidth' => $mainhtmlwidth,
	'animate' => $animate,
	'closebutton' => $useclosebutton,
	'closebuttonposition' => $closebuttonposition,
	'mainflashbanner' => $mainflashbanner,
	'mainflashwidth' => $mainflashwidth,
	'mainflashheight' => $mainflashheight,
	'mainbanner' => $mainbanner,
	'mainwidth' => $mainwidth,
	'mainheight' => $mainheight,
	'expanddirection' => $expanddirection,
	'expandon' => $expandon,
	'autoopen' => $autoopen,
	'autoclose' => $autoclose,
	'autoopentime' => $autoopentime,
	'autoclosetime' => $autoclosetime,
	'screensize' => $screensize,
	'minscreen' => $minscreen,
	'maxscreen' => $maxscreen,
	'onceperday' => $onceperday,
	'firstbanner' => $firstbanner,
	'firstwidth' => $firstwidth,
	'firstheight' => $firstheight,
	'cornerpagepeel' => $cornerpeel,
	'closebanner' => $closebanner,
	'closewidth' => $closewidth,
	'closeheight' => $closeheight,
	'mainurl' => $mainurl,
	'firsturl' => '',
	'divid'	=> $divid,
	'beforediv'	=> $beforediv,
	'firstonpage' => $firstonpage,
	'showonpage'	=> $showonpage,
	'pagetitle'	=> esc_sql(utf8_encode($pagetitle)),
	'abovecss'	=> $abovecss,
	'belowcss'	=> $belowcss,
	'addextra'	=> $addextra,
	'extracode'	=> $extracode,
	'responsive' => $responsive
);
	 update_option( 'exp_options',  $exp_expandableoptions );
				  $week=date('W');
	$date=date('m-d-Y');
	$month=date('F');
	$year=date('Y');
	$id=$date."_".$bannerid;
	
				 
				   $res=$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix ."daily_stats(idDailyStats,BannerId,BannerType,StatsDate,StatsMonth,StatsYear) VALUES(%s,%s,'Expandable',%s,%s,%s)",$id,$bannerid,$date,$month,$year));
				 
				 
				  if($res){
				       echo $bannerid;
					   die();
				  }
		}else{
			 $exp_expandableoptions = array(
	'bannerid' => $bannerid,								
	'bannername' => $bannername,
	'bannertype' => $bannertype,
	'firsthtml' => esc_sql(utf8_encode($firsthtml)),
	'firsthtmlwidth' => $firsthtmlwidth,
	'firsthtmlheight' => $firsthtmlheight,
	'firstbackup' => $firstbackup,
	'firstflashbanner' => $firstflashbanner,
	'firstflashwidth' => $firstflashwidth,
	'firstflashheight' => $firstflashheight,
	'flashclosebutton' => $flvclosebutton,
	'htmlcloseoutside' => $htmlcloseoutside,
	'mainbackup' => $mainbackup,
	'animationspeed' => $animationspeed,
	'mainnewwindow' => $mainnewwindow,
	'hasjavascript' => $hasjavascript,
	'mainhtml' => esc_sql(utf8_encode($mainhtml)),
	'htmbannertype' => $htmbannertype,
	'mainhtmfile' => $mainhtmfile,
	'mainhtmlheight' => $mainhtmlheight,
	'mainhtmlwidth' => $mainhtmlwidth,
	'animate' => $animate,
	'closebutton' => $useclosebutton,
	'closebuttonposition' => $closebuttonposition,
	'mainflashbanner' => $mainflashbanner,
	'mainflashwidth' => $mainflashwidth,
	'mainflashheight' => $mainflashheight,
	'mainbanner' => $mainbanner,
	'mainwidth' => $mainwidth,
	'mainheight' => $mainheight,
	'expanddirection' => $expanddirection,
	'expandon' => $expandon,
	'autoopen' => $autoopen,
	'autoclose' => $autoclose,
	'autoopentime' => $autoopentime,
	'autoclosetime' => $autoclosetime,
	'screensize' => $screensize,
	'minscreen' => $minscreen,
	'maxscreen' => $maxscreen,
	'onceperday' => $onceperday,
	'firstbanner' => $firstbanner,
	'firstwidth' => $firstwidth,
	'firstheight' => $firstheight,
	'cornerpagepeel' => $cornerpeel,
	'closebanner' => $closebanner,
	'closewidth' => $closewidth,
	'closeheight' => $closeheight,
	'mainurl' => $mainurl,
	'firsturl' => '',
	'divid'	=> $divid,
	'beforediv'	=> $beforediv,
	'firstonpage' => $firstonpage,
	'showonpage'	=> $showonpage,
	'pagetitle'	=> esc_sql(utf8_encode($pagetitle)),
	'abovecss'	=> $abovecss,
	'belowcss'	=> $belowcss,
	'addextra'	=> $addextra,
	'extracode'	=> $extracode,
	'responsive' => $responsive
);
	 update_option( 'exp_options',  $exp_expandableoptions );
		        
				       echo $bannerid;
					   die();
				 
		}
	
   }
   
}

$exp_expandableoptions_defaults = array(
	'bannerid' => 'new',								
	'bannername' => 'enter_banner_name',
	'bannertype' => 'Image',
	'firsthtml' => '',
	'firsthtmlwidth' => '0',
	'firsthtmlheight' => '0',
	'firstbackup' => 'No',
	'firstflashbanner' => '',
	'firstflashwidth' => '0',
	'firstflashheight' => '0',
	'flashclosebutton' => 'No',
	'htmlcloseoutside' => 'false',
	'mainbackup' => 'No',
	'animationspeed' => '0.1',
	'mainnewwindow' => 'No',
	'mainhtml' => '',
	'htmbannertype' => 'Code',
	'mainhtmfile' => '',
	'mainhtmlheight' => '0',
	'mainhtmlwidth' => '0',
	'animate' => 'No',
	'closebutton' => 'Yes',
	'closebuttonposition' => 'bottom-right',
	'mainflashbanner' => '',
	'mainflashwidth' => '0',
	'mainflashheight' => '0',
	'mainbanner' => 'square_expanded.jpg',
	'mainwidth' => '300',
	'mainheight' => '300',
	'expanddirection' => 'center-center',
	'expandon' => 'Rollover',
	'hasjavascript' => 'No',
	'autoopen' => 'No',
	'autoclose' => 'No',
	'autoopentime' => '2',
	'autoclosetime' => '10',
	'screensize' => 'All',
	'minscreen' => '0',
	'maxscreen' => '0',
	'onceperday' => 'No',
	'firstbanner' => 'square.jpg',
	'firstwidth' => '125',
	'firstheight' => '125',
	'cornerpagepeel' => 'No',
	'openbannerfirst' => 'No',
	'bannerdisappear' => 'No',
	'closebanner' => 'close.png',
	'closewidth' => '21',
	'closeheight' => '30',
	'mainurl' => 'www.expandablebanners.com/',
	'firsturl' => 'www.expandablebanners.com/',
	'divid'	=> 'masthead',
	'beforediv'	=> 'No',
	'firstonpage' => 'No',
	'showonpage'	=> 'All',
	'pagetitle'	=> '',
	'abovecss'	=> '',
	'belowcss'	=> '',
	'addextra'	=> 'false',
	'extracode'	=> 'player.pauseVideo();',
	'responsive' => 'No'
);


function exp_menu() {
	//create new top-level menu
	add_menu_page('ExpandableBanner Settings', 'Expandable Banners', 'administrator', 'exp_expandable_top', 'exp_main_option',plugins_url('', __FILE__)."/images/exp_16X16.png");
	add_submenu_page('exp_expandable_top' , 'Add New Expandable Banner', 'Add New Expandable Banner' , 'administrator' , 'new_expandable_banner' , 'exp_expandable_settings_page' );
	add_submenu_page('exp_expandable_top' , 'Daily Stats', 'Daily Stats' , 'administrator' , 'exp_expandable_daily_stat' , 'exp_expandable_daily_stat_page' );
	add_submenu_page(NULL , 'Expandable Banner Preview', '' , 'administrator' , 'exp_preview_banner' , 'exp_preview' );
	
}


function exp_preview(){

?><script type="text/javascript" src='<?php echo esc_url(plugins_url('', __FILE__)."/");?>expandablebanners.js'></script><?php


$folder=plugins_url('', __FILE__)."/images";
if(isset($_POST['pid'])){
	$exp_expandableoptions=get_option('exp_options');
	  $bannername=$exp_expandableoptions['bannername'];
	   $bannertype=$exp_expandableoptions['bannertype'];
        $pagetitle=$exp_expandableoptions['pagetitle'];
		 $beforediv=$exp_expandableoptions['beforediv'];
		 $firstonpage=$exp_expandableoptions['firstonpage'];
		  $showonpage=$exp_expandableoptions['showonpage'];
		   $abovecss=$exp_expandableoptions['abovecss'];
		    $belowcss=$exp_expandableoptions['belowcss'];
			$addextra=$exp_expandableoptions['addextra'];
		$extracode=$exp_expandableoptions['extracode'];
	    $divid=$exp_expandableoptions['divid'];
	   $useclosebutton=$exp_expandableoptions['closebutton'];
	    $closebuttonposition=$exp_expandableoptions['closebuttonposition'];
		  $flvclosebutton=$exp_expandableoptions['flashclosebutton'];
	   $firstbackup=$exp_expandableoptions['firstbackup'];
	   $mainbackup=$exp_expandableoptions['mainbackup'];
	   		  $animationspeed=$exp_expandableoptions['animationspeed'];
	   $mainnewwindow=$exp_expandableoptions['mainnewwindow'];
	    $firsthtml=str_replace("^","'",str_replace('|','"',$exp_expandableoptions['firsthtml']));

          $mainhtml=str_replace("^","'",str_replace('|','"',$exp_expandableoptions['mainhtml']));

	   
	    $firsthtmlwidth=$exp_expandableoptions['firsthtmlwidth'];
	   $mainhtmlwidth=$exp_expandableoptions['mainhtmlwidth'];
	    $firsthtmlheight=$exp_expandableoptions['firsthtmlheight'];
	   $mainhtmlheight=$exp_expandableoptions['mainhtmlheight'];
		$firstflashbanner=$exp_expandableoptions['firstflashbanner'];
		$mainflashbanner=$exp_expandableoptions['mainflashbanner'];
	   $bannerid=$exp_expandableoptions['bannerid'];
	   $mainbanner=$exp_expandableoptions['mainbanner'];
	   $mainurl=$exp_expandableoptions['mainurl'];
	   $expandon=$exp_expandableoptions['expandon'];
	    $htmbannertype=$exp_expandableoptions['htmbannertype'];
		$mainhtmfile=$exp_expandableoptions['mainhtmfile'];
	   $expanddirection=$exp_expandableoptions['expanddirection'];
	   $autoopen=$exp_expandableoptions['autoopen'];
	   $autoclose=$exp_expandableoptions['autoclose'];
	   $autoopentime=$exp_expandableoptions['autoopentime']*1000;
	   $autoclosetime=$exp_expandableoptions['autoclosetime']*1000;
	   $onceperday=$exp_expandableoptions['onceperday'];
	   $firstbanner=$exp_expandableoptions['firstbanner'];
	   $animate=$exp_expandableoptions['animate'];
	    $cornerpeel=$exp_expandableoptions['cornerpagepeel'];
		 $htmlcloseoutside=$exp_expandableoptions['htmlcloseoutside'];
	   $closebanner=$exp_expandableoptions['closebanner'];
	     $firstwidth=$exp_expandableoptions['firstwidth'];
		   $firstheight=$exp_expandableoptions['firstheight'];
		   $mainwidth=$exp_expandableoptions['mainwidth'];
		   $mainheight=$exp_expandableoptions['mainheight'];
		   $closewidth=$exp_expandableoptions['closewidth'];
		   $closeheight=$exp_expandableoptions['closeheight'];
		    $firstflashwidth=$exp_expandableoptions['firstflashwidth'];
		   $firstflashheight=$exp_expandableoptions['firstflashheight'];
		   $mainflashwidth=$exp_expandableoptions['mainflashwidth'];
		   $mainflashheight=$exp_expandableoptions['mainflashheight'];
		    $responsive=$exp_expandableoptions['responsive'];
		   $screensize=$exp_expandableoptions['screensize'];
		    $minscreen=$exp_expandableoptions['minscreen'];
			 $maxscreen=$exp_expandableoptions['maxscreen'];
			  $hasjavascript=$exp_expandableoptions['hasjavascript'];
		 

}else{
  $bannername=sanitize_text_field($_POST['bannername']);
	   $bannername=str_replace(' ','_',$bannername);
	   $bannertype=sanitize_text_field($_POST['bannertype']);
        $pagetitle=sanitize_text_field($_POST['pagetitle']);
		 $beforediv=sanitize_text_field($_POST['beforediv']);
		 $firstonpage=sanitize_text_field($_POST['firstonpage']);
		  $hasjavascript=sanitize_text_field($_POST['hasjavascript']);
		  $showonpage=sanitize_text_field($_POST['showonpage']);
		  $addextra=sanitize_text_field($_POST['addextra']);
		$extracode=sanitize_text_field($_POST['extracode']);
		   $abovecss=sanitize_text_field($_POST['abovecss']);
		    $belowcss=sanitize_text_field($_POST['belowcss']);
	    $divid=sanitize_text_field($_POST['divid']);
	   $useclosebutton=sanitize_text_field($_POST['useclosebutton']);
	    $closebuttonposition=sanitize_text_field($_POST['closebuttonposition']);
		  $flvclosebutton=sanitize_text_field($_POST['flashclose']);
	   $firstbackup=sanitize_text_field($_POST['firstbackup']);
	   $mainbackup=sanitize_text_field($_POST['mainbackup']);
	   	$animationspeed=sanitize_text_field($_POST['animationspeed']);	 
	   $mainnewwindow=sanitize_text_field($_POST['mainnewwindow']);
	    $firsthtml=stripslashes($_POST['firsthtml']);
			$htmbannertype=sanitize_text_field($_POST['htmbannertype']);
		$mainhtmfile=sanitize_text_field($_POST['mainhtmfile']);
	   $mainhtml=stripslashes($_POST['mainhtml']);
	  $responsive=sanitize_text_field($_POST['responsive']);
		   $screensize=sanitize_text_field($_POST['screensize']);
		    $minscreen=intval(sanitize_text_field($_POST['minscreen']));
			 $maxscreen=intval(sanitize_text_field($_POST['maxscreen']));
	   
	    $firsthtmlwidth=intval(sanitize_text_field($_POST['firsthtmlwidth']));
	   $mainhtmlwidth=intval(sanitize_text_field($_POST['mainhtmlwidth']));
	    $firsthtmlheight=intval(sanitize_text_field($_POST['firsthtmlheight']));
	   $mainhtmlheight=intval(sanitize_text_field($_POST['mainhtmlheight']));
		$firstflashbanner=sanitize_text_field($_POST['firstflashname']);
		$mainflashbanner=sanitize_text_field($_POST['mainflashname']);
	   $bannerid=sanitize_text_field($_POST['bannerid']);
	   $mainbanner=sanitize_text_field($_POST['mainname']);
	   $mainurl=sanitize_text_field($_POST['mainurl']);
	   $mainurl=str_replace('http://','',$mainurl);
	   $mainurl=str_replace('https://','',$mainurl);
	   $expandon=sanitize_text_field($_POST['expandon']);
	   $expanddirection=sanitize_text_field($_POST['expanddirection']);
	   $autoopen=sanitize_text_field($_POST['autoopen']);
	   $autoclose=sanitize_text_field($_POST['autoclose']);
	   $autoopentime=intval(sanitize_text_field($_POST['autoopentime']))*1000;
	   $autoclosetime=intval(sanitize_text_field($_POST['autoclosetime']))*1000;
	   $onceperday=sanitize_text_field($_POST['onceperday']);
	   $firstbanner=sanitize_text_field($_POST['firstname']);
	   $animate=sanitize_text_field($_POST['animate']);
	    $cornerpeel=sanitize_text_field($_POST['cornerpeel']);
		 $htmlcloseoutside=sanitize_text_field($_POST['htmlcloseoutside']);
	   $closebanner=sanitize_text_field($_POST['closename']);
	     $firstwidth=0;
		   $firstheight=0;
		   $mainwidth=0;
		   $mainheight=0;
		   $closewidth=0;
		   $closeheight=0;
		    $firstflashwidth=0;
		   $firstflashheight=0;
		   $mainflashwidth=0;
		   $mainflashheight=0;
		 
		    if($firstflashbanner!=''){
			   $firstflash=getimagesize($folder.'/'.$firstflashbanner);
			   $firstflashwidth=$firstflash[0];
			   $firstflashheight=$firstflash[1];
		   }
		   if($mainflashbanner!=''){
			   $mainflash=getimagesize($folder.'/'.$mainflashbanner);
			   $mainflashwidth=$mainflash[0];
			   $mainflashheight=$mainflash[1];
		   }
		 if($firstbanner!=''){
		   $first=getimagesize($folder.'/'.$firstbanner);
		   $firstwidth=$first[0];
		   $firstheight=$first[1];
	   }
	    if($mainbanner!=''){
		   $main=getimagesize($folder.'/'.$mainbanner);
		   $mainwidth=$main[0];
		   $mainheight=$main[1];
		}
		if($closebanner=='close.png' || $closebanner=='close-blacktext.png' || $closebanner=='close-whitetext.png'){ 
		   $close=getimagesize($folder.'/'.$closebanner);
		}else if($closebanner!=''){
		  $close=getimagesize($folder.'/'.$closebanner);
		}
	    $closewidth=$close[0];
	    $closeheight=$close[1];
		     
	   
}

	  
	  $cpos=explode('-',$closebuttonposition);

?>

<style type="text/css">
img
{
	max-width:100%
	}
div
{
	max-width:100%
	}
iframe
{
	max-width:100%
	}


	

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
</style>
<script type="text/javascript">
	  <?php if($bannertype=="Image"){?>
			var <?php echo esc_js($bannername); ?> = ExpandableBanners.banner("<?php echo esc_js($bannername); ?>", "<?php echo esc_url($folder."/".$mainbanner); ?>");
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
			<?php echo esc_js($bannername); ?>.setDirection('<?php echo esc_js($ed[1]); ?>', '<?php echo esc_js($ed[0]); ?>'); 
		<?php	if($expandon=='Rollover'){		?>
					<?php echo esc_js($bannername); ?>.expandOnClick = false;
		<?php	}else if($expandon=='Click'){?>
			       <?php echo esc_js($bannername); ?>.expandOnClick = true;
		<?php	}
			
	   }else  if($bannertype=="Flash"){?>
		   var <?php echo esc_js($bannername); ?> = ExpandableBanners.banner("<?php echo esc_js($bannername); ?>", "<?php echo esc_url($folder."/".$mainflashbanner); ?>", <?php echo esc_js($mainflashwidth); ?>, <?php echo esc_js($mainflashheight); ?>);
		<?php	if($useclosebutton=='Yes'){
				$cbp=explode('-',$closebuttonposition);?>
			     <?php echo esc_js($bannername); ?>.setCloseImage("<?php if($closebanner=='close.png' || $closebanner=='close-blacktext.png' || $closebanner=='close-whitetext.png'){ echo esc_url($folder."/".$closebanner); }else{ echo esc_url($folder."/".$closebanner);}?>", '<?php echo esc_js($cbp[1]);?>', '<?php echo esc_js($cbp[0]); ?>');
				 <?php echo esc_js($bannername); ?>.closeOutside = <?php echo esc_js($htmlcloseoutside); ?>;
				  <?php if($addextra=='true'){?>
				     <?php echo esc_js($bannername); ?>.extraCode = '<?php echo esc_js($extracode); ?>';
				 <?php }?>
		<?php	}else{?>
			    <?php echo esc_js($bannername); ?>.setCloseImage("banners/imagebanners/blank.gif", 'left', 'top');
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
	   }else  if($bannertype=="HTML"){ 
	       if($htmbannertype=='Code'){
	   ?>
	     
		  var <?php echo esc_js($bannername); ?> = ExpandableBanners.banner("<?php echo esc_js($bannername); ?>", '<?php echo str_replace("</script>",'~',str_replace("'",'^',str_replace('"','|',trim(preg_replace('/\s+/', ' ', $mainhtml))))); ?>',<?php echo esc_js($mainhtmlwidth); ?>,<?php echo esc_js($mainhtmlheight); ?>);
		  <?php }else{?>
		    var <?php echo esc_js($bannername); ?> = ExpandableBanners.banner("<?php echo esc_js($bannername); ?>", '<?php echo esc_url($mainhtmfile); ?>',<?php echo esc_js($mainhtmlwidth); ?>,<?php echo esc_js($mainhtmlheight); ?>);
		  <?php }?>
		<?php	if($useclosebutton=='Yes'){
				$cbp=explode('-',$closebuttonposition);?>
			     <?php echo esc_js($bannername); ?>.setCloseImage("<?php if($closebanner=='close.png' || $closebanner=='close-blacktext.png' || $closebanner=='close-whitetext.png'){ echo esc_url($folder."/".$closebanner); }else{ echo esc_url($folder."/".$closebanner);}?>", '<?php echo esc_js($cbp[1]);?>', '<?php echo esc_js($cbp[0]); ?>');
		<?php	}?>
			
			<?php echo esc_js($bannername); ?>.closeOutside = <?php echo esc_js($htmlcloseoutside); ?>;
			 <?php if($addextra=='true'){?>
				     <?php echo esc_js($bannername); ?>.extraCode = '<?php echo esc_js($extracode); ?>';
				 <?php }?>
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
			<?php
	   }
	   ?>
	   <?php if($autoopen=='Yes' || $autoclose=='Yes'){?>
	   
	   function autoExpand() {
		   <?php if($autoopen=='Yes'){?>
			setTimeout("ExpandableBanners.openAd('<?php echo esc_js($bannername); ?>')",<?php echo esc_js($autoopentime); ?>);
			<?php }?>
			 <?php if($autoopen=='Yes'){?>
			setTimeout("ExpandableBanners.closeAd('<?php echo esc_js($bannername); ?>')",<?php echo esc_js($autoclosetime); ?>);
			<?php }?>
		}
		if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded",function(){documentReady=true;autoExpand();<?php if($responsive=='Yes'){ ?>if(document.getElementById('firstimg_<?php echo esc_js($bannername); ?>')!=null){
  document.getElementById('<?php echo esc_js($bannername); ?>').style.width=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientWidth+'px';
   document.getElementById('<?php echo esc_js($bannername); ?>').style.height=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientHeight+'px';
}<?php }?>});
}
else if (!window.onload) window.onload = function(){documentReady=true;autoExpand();<?php if($responsive=='Yes'){ ?>if(document.getElementById('firstimg_<?php echo esc_js($bannername); ?>')!=null){
  document.getElementById('<?php echo esc_js($bannername); ?>').style.width=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientWidth+'px';
   document.getElementById('<?php echo esc_js($bannername); ?>').style.height=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientHeight+'px';
}<?php }?>}
	   <?php }else{?>
	   if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded",function(){documentReady=true;<?php if($responsive=='Yes'){ ?>if(document.getElementById('firstimg_<?php echo esc_js($bannername); ?>')!=null){
  document.getElementById('<?php echo esc_js($bannername); ?>').style.width=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientWidth+'px';
   document.getElementById('<?php echo esc_js($bannername); ?>').style.height=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientHeight+'px';
}<?php }?>});}
else if (!window.onload) window.onload = function(){documentReady=true;<?php if($responsive=='Yes'){ ?>if(document.getElementById('firstimg_<?php echo esc_js($bannername); ?>')!=null){
  document.getElementById('<?php echo esc_js($bannername); ?>').style.width=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientWidth+'px';
   document.getElementById('<?php echo esc_js($bannername); ?>').style.height=document.getElementById('firstimg_<?php echo esc_js($bannername); ?>').clientHeight+'px';
}<?php }?>}
	   <?php }?>
     
    </script>
<?php  if($bannertype=="Flash"){?>
 
    <script type="text/javascript">
	var flashvars = true;
var params = {
  wmode: "transparent"
  };
var attributes = {};
        swfobject.embedSWF("<?php echo esc_url($folder."/".$firstflashbanner); ?>", "large_exp", "<?php echo esc_js($firstflashwidth); ?>", "<?php echo esc_js($firstflashheight); ?>", "9.0.0", "<?php echo esc_url(plugins_url('', __FILE__)); ?>/swfobject/expressInstall.swf", flashvars, params, attributes);
    </script>
<?php } ?>

                      <center>   
                        <?php if($cornerpeel=='Yes'){?>
                        <div style="position:absolute;<?php if($ed[1]=="down"){ ?>top:0px;<?php }else if($ed[1]=="up"){?>bottom:0px;<?php }else{?>top:40%;<?php }?><?php if($ed[0]=="left"){ ?>right:0px;<?php }else if($ed[0]=="right"){?>left:0px;<?php }else{?>left:40%;<?php }?>">
                        <?php }?>
              <?php if($bannertype=="Image"){ ?>
               <a id="<?php echo esc_attr($bannername); ?>" href="http://<?php echo esc_url($mainurl); ?>" <?php if($mainnewwindow=='Yes'){?>target="_blank"<?php }?>><img src="<?php echo esc_url($folder.'/'.$firstbanner); ?>" /></a>
              <?php }else if($bannertype=="Flash"){?>
                <div id="<?php echo esc_attr($bannername); ?>" style="width:<?php echo esc_attr($firstflashwidth); ?>px;height:<?php echo esc_attr($firstflashheight); ?>px;">
      				 <div id="large_exp"><?php if($firstbackup=='Yes'){ ?><a href="http://<?php echo esc_url($firsturl); ?>" <?php if($firstnewwindow=='Yes'){?>target="_blank"<?php }?>><img src="<?php echo esc_url($folder.'/'.$firstbanner); ?>" width="<?php echo esc_attr($firstwidth); ?>" height="<?php echo esc_attr($firstheight); ?>" border="0"></a><?php }?></div>
         </div>
              <?php }else if($bannertype=="HTML"){?>
              <div id="<?php echo esc_attr($bannername); ?>" style="width:<?php echo esc_attr($firsthtmlwidth); ?>px; height:<?php echo esc_attr($firsthtmlheight); ?>px; position:relative; font-weight:bold">
                 <?php if($responsive=='Yes'){?><div id="firstimg_<?php echo esc_attr($bannername); ?>"><?php }?>
              <?php echo $firsthtml; ?>
                <?php if($responsive=='Yes'){?></div><?php }?>

            </div>
              <?php }?>    
               <?php if($cornerpeel=='Yes'){?>
                        </div>
                        <?php }?>

</center>
 

<?php

	
}


function exp_expandable_daily_stat_page(){
	global $wpdb;
	$table_name=$wpdb->prefix . "daily_stats";
	
	$week=date('W');
	$date=date('m-d-Y');
	$month=date('F');
	 $year=date('Y');
	$folder=plugins_url('', __FILE__)."/images";?>
	 <div class="wrap">
    <h2>Melodic Media Expandable Banner</h2>
    <br />
	<h3>My Expandable Banners Daily Stats</h3>
    <br />
    <?php
	
	 $exp_expandableoptions=get_option('exp_options'); 
$mybanner = $wpdb->get_row( $wpdb->prepare("SELECT * FROM ".$table_name." WHERE StatsDate=%s AND StatsMonth=%s AND StatsYear=%s AND BannerType='Expandable' AND BannerId=%s",$date,$month,$year,$exp_expandableoptions['bannerid']));

if($mybanner){
	?>
    <table class="form-table"><tr><th>Expandable Banner</th><th>Banner Name</th><th>Imp. today</th><th>Opens today</th><th>Clicks today</th><th>CTR</th></tr>
  
		 <tr><td><img src="<?php if($exp_expandableoptions['bannertype']=='Image'){ echo esc_url($folder."/".$exp_expandableoptions['mainbanner']);}else if($exp_expandableoptions['bannertype']=='HTML'){ echo esc_url($folder."/"."html.png");}else if($exp_expandableoptions['bannertype']=='Flash'){ echo esc_url($folder."/"."flash.png");}?>" width="40" height="40" /></td><td><?php echo esc_html($exp_expandableoptions['bannername']); ?></td><td><?php echo esc_html($mybanner->DImpressions); ?></td><td><?php echo esc_html($mybanner->DOpens); ?></td><td><?php echo esc_html($mybanner->DClicks); ?></td><td><?php if($mybanner->DImpressions!=0){echo esc_html(round(($mybanner->DClicks/$mybanner->DImpressions)*100,2)); echo " %";}else{ echo "0 %";} ?></td></tr>

    </table>
    <?php
}else{
      echo "You have currently no expandable banners.";
}
?>
<br />
<br />
<a href="http://www.expandablebanners.com/buy.php" target="_blank"><img src="<?php echo esc_url($folder."/wp_exp_buy.png");?>" /></a>
 </div>
    
<?php  

}



function exp_main_option()
{
	
	
	global $wpdb;
	
	$folder=plugins_url('', __FILE__)."/images";

	if(isset($_POST['did'])){
		 
		$folder2=plugin_dir_path(__FILE__)."images";
		
       
		$exp_expandableoptions=get_option('exp_options');
		
		if(is_file($folder2.'/'.$exp_expandableoptions['firstbanner']) && strpos($exp_expandableoptions['firstbanner'],'ile_')!=false){
			
		unlink($folder2.'/'.$exp_expandableoptions['firstbanner']);
		}
		if(is_file($folder2.'/'.$exp_expandableoptions['mainbanner'])  && strpos($exp_expandableoptions['mainbanner'],'ile_')!=false){
		unlink($folder2.'/'.$exp_expandableoptions['mainbanner']);
		}
		if(is_file($folder2.'/'.$exp_expandableoptions['closebanner']) && strpos($exp_expandableoptions['closebanner'],'ile_')!=false){
		unlink($folder2.'/'.$exp_expandableoptions['closebanner']);
		}
		if(is_file($folder2.'/'.$exp_expandableoptions['mainflashbanner'])){
		unlink($folder2.'/'.$exp_expandableoptions['mainflashbanner']);
		}
		if(is_file($folder2.'/'.$exp_expandableoptions['firstflashbanner'])){
		unlink($folder2.'/'.$exp_expandableoptions['firstflashbanner']);
		}
		
		   $dres=$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix ."daily_stats WHERE BannerType='Expandable' AND BannerId=%s",$_POST['did']));
	       delete_option('exp_options');
	
	}
	?>
    
	 <div class="wrap">
    <h2>Melodic Media Expandable Banner</h2>
    <br />
	<h3>My Expandable Banners</h3>
    <br />
    <?php
	
$exp_expandableoptions=get_option('exp_options');
  
if($exp_expandableoptions){
	?>
    <table class="form-table"><tr><th>Expandable Banner</th><th width="30%">Banner Name</th><th>Actions</th></tr>
    <?php
	
	$count=1;
		?>
		 <tr><td><img src="<?php if($exp_expandableoptions['bannertype']=='Image'){ echo esc_url($folder."/".$exp_expandableoptions['mainbanner']);}else if($exp_expandableoptions['bannertype']=='HTML'){ echo esc_url($folder."/"."html.png");}else if($exp_expandableoptions['bannertype']=='Flash'){ echo esc_url($folder."/"."flash.png");}?>" width="40" height="40" /></td><td><?php echo esc_html($exp_expandableoptions['bannername']); ?></td><td><table><tr><td><form id="pform_<?php echo esc_attr($count); ?>" action="admin.php?page=exp_preview_banner" method="post" target="_blank"><input type="hidden" name="pid" id="pid_<?php echo esc_attr($count); ?>" value="<?php echo esc_attr($exp_expandableoptions['bannerid']); ?>" /><input  type="image" alt="Submit Form"  src="<?php echo esc_url($folder."/"); ?>preview.png" /></form></td><td><a href="admin.php?page=new_expandable_banner&actn=edit&id=<?php echo esc_attr($exp_expandableoptions['bannerid']); ?>" ><img src="<?php echo esc_url($folder."/"); ?>edit.png" /></a></td><td><form id="dform_<?php echo esc_attr($count); ?>" action="admin.php?page=exp_expandable_top" method="post"><input type="hidden" name="did" id="did_<?php echo esc_attr($count); ?>" value="<?php echo esc_attr($exp_expandableoptions['bannerid']); ?>" /><input  type="image" alt="Submit Form"  src="<?php echo esc_url($folder."/"); ?>delete.png" /></form></td></tr></table></td></tr>
    </table>
    <?php
}else{
      echo "You have currently no expandable banners.";
}
?>
<br />
<br />
<a href="http://www.expandablebanners.com/buy.php" target="_blank"><img src="<?php echo esc_url($folder."/wp_exp_buy.png");?>" /></a>
 </div>
    
<?php  
}



function exp_expandableoptions_init(){
wp_enqueue_script('myexpandablescript',  plugins_url('funct.js', __FILE__));
wp_enqueue_script('expandableflashscript',  plugins_url('swfobject/swfobject.js', __FILE__));

	global $exp_expandableoptions_defaults;
	global $wpdb;
	
	if(isset($_GET['actn']) && $_GET['actn']=="edit"){
		$exp_expandableoptions=get_option('exp_options');
		
		$exp_expandableoptions_defaults=$exp_expandableoptions;
	   
	}
	
	
     if(isset($_GET['actn']) && $_GET['actn']=="edit"){
	  add_settings_section('exp_expandablemain', 'Edit Expandable Banner', NULL, 'new_expandable_banner');
	 }else{
	  add_settings_section('exp_expandablemain', 'New Expandable Banner', NULL, 'new_expandable_banner');
	 }
	
    add_settings_field('bannername','Banner Name', 'exp_text', 'new_expandable_banner','exp_expandablemain',array('id' => 'bannername'));
	
	add_settings_section('exp_optiondivf', '', 'exp_optiondiv', 'new_expandable_banner');
	add_settings_section('exp_autodivf', '', 'exp_autodiv', 'new_expandable_banner');
	add_settings_section('exp_pagedivf', '', 'exp_pagediv', 'new_expandable_banner');
	add_settings_section('exp_slide2', '', NULL, 'new_expandable_banner');
	
	
	 add_settings_field('onceperday', 'Show the banner only once per day?', 'exp_radio', 'new_expandable_banner', 'exp_slide2',
		array('id' => 'onceperday', 'values' => array('Yes' => 'Yes','No' => 'No') ));

	

}

function exp_optiondiv(){
	$folder=plugins_url('', __FILE__)."/images";
		global $exp_expandableoptions_defaults;
	$options = $exp_expandableoptions_defaults;
	?>
     <table class="form-table"><tr><th>Type of banner: </th><td><input type="radio" name="bannertype" id="bannertype1" value="Image" checked onClick="document.getElementById('imgbanner').style.display='block';document.getElementById('flvbanner').style.display='none';document.getElementById('htmlbanner').style.display='none';document.getElementById('closeoutside').style.display='block';"> 
   Image Banner &nbsp;&nbsp; <input type="radio" name="bannertype" id="bannertype2" value="Flash" onClick="document.getElementById('imgbanner').style.display='none';document.getElementById('flvbanner').style.display='block';document.getElementById('htmlbanner').style.display='none';document.getElementById('autoopen1').click();document.getElementById('autoclose1').click();document.getElementById('closeoutside').style.display='block';"> 
   Flash Banner &nbsp;&nbsp; <input type="radio" name="bannertype" id="bannertype3" value="HTML" onClick="document.getElementById('imgbanner').style.display='none';document.getElementById('flvbanner').style.display='none';document.getElementById('htmlbanner').style.display='block';document.getElementById('autoopen1').click();document.getElementById('autoclose1').click();if(get_radio_value('useclosebutton')=='Yes'){document.getElementById('closeoutside').style.display='block';}"> 
   HTML Banner</td></tr></table>


  
 
<div id="imgbanner" style="display:block">
                          
<table class="form-table"><tr>
 <th> 
  First/Open Banner: </th></tr></table> 
  <input type="hidden" name="firstname" id="firstname" value="<?php echo esc_attr($options['firstbanner']); ?>">
  <input type="hidden" name="mainname" id="mainname" value="<?php echo esc_attr($options['mainbanner']); ?>">
  <input type="hidden" name="closename" id="closename" value="<?php echo esc_attr($options['closebanner']); ?>">
   <input type="hidden" name="mainflashname" id="mainflashname" value="<?php echo esc_attr($options['mainflashbanner']); ?>">
     <input type="hidden" name="firstflashname" id="firstflashname" value="<?php echo esc_attr($options['firstflashbanner']); ?>">
     <input type='hidden' name="firstbackup" id="firstbackup" value="<?php echo esc_attr($options['firstbackup']); ?>">
      <input type='hidden' name="mainbackup" id="mainbackup" value="<?php echo esc_attr($options['mainbackup']); ?>">
     <input type="hidden" name="bannerid" id="bannerid" value="<?php echo esc_attr($options['bannerid']); ?>">
      <input type="hidden" name="plug_url" id="plug_url" value="<?php echo esc_attr(plugins_url('', __FILE__));?>">
       <input type="hidden" name="adm_url" id="adm_url" value="<?php echo esc_attr(admin_url());?>">
       <?php  if(isset($_GET['actn']) && $options['firstbanner']!=''){?>
      <img id="firstimg" src="<?php echo esc_url($folder.'/'.$options['firstbanner']); ?>">
  <table class="form-table"><tr><th>Change Image (jpg, gif, png, max file size 50kb) </th><td><input type="file" name="firstimage" id="firstimage" onChange="chngimage('<?php echo esc_attr($folder); ?>','firstimage')"></td><td><div id="firstimage_notice"></div></td></tr>
   <?php }else{?>
 <table class="form-table"><tr>
 <th>Upload your Image (jpg, gif, png, max file size 50kb)</th><td> <input type="file" name="firstimage" id="firstimage" onChange="imageUpl('firstimage')"></td><td><div id="firstimage_notice"></div></td></tr><?php }?></table>
 <table class="form-table"><tr>
 <th>Expand On &nbsp;&nbsp;</th><td><input name="expandon" id="expandon1" value="Rollover" checked="checked" type="radio" /> Rollover
  <input name="expandon" id="expandon2" value="Click" type="radio" /> Click</td></tr></table>
 
  
                        <table class="form-table"><tr>
 <th>2nd Banner:</th></tr></table>
  <?php if(isset($_GET['actn']) && $options['mainbanner']!=''){ ?>
  <img id="mainimg" src="<?php echo esc_url($folder.'/'.$options['mainbanner']); ?>">

  <table class="form-table"><tr><th>Change Image (jpg, gif, png, max file size 250kb)</th><td><input type="file" name="mainimage" id="mainimage" onChange="chngimage('<?php echo esc_url($folder); ?>','mainimage')"></td><td><div id="mainimage_notice"></div></td></tr>
  <?php }else{?>
  <table class="form-table"><tr>
 <th>Upload your Image (jpg, gif, png, max file size 250kb)</th><td><input type="file" name="mainimage" id="mainimage" onChange="imageUpl('mainimage')"></td><td><div id="mainimage_notice"></div></td></tr><?php }?>
  <tr><th>Please set the URL you want it to link to http://</th><td><input type="text" name="mainurl" id="mainurl" value="<?php echo esc_url($options['mainurl']); ?>" /></td><td><div id="mainurl_notice"></div></td></tr>
<tr><th>Open link in new window? &nbsp;&nbsp;</th><td><input name="mainnewwindow" id="mainnewwindow1" value="Yes" checked="checked" type="radio" /> 
Yes
    <input name="mainnewwindow" id="mainnewwindow2" value="No" type="radio" /> 
    No</td></tr></table>

                          </div>
                          <div id="flvbanner" style="display:none">
                          
                        <table class="form-table"><tr>
 <th>First/Open Flash Banner:</th></tr></table>
 <?php if(isset($_GET['actn']) && $options['firstflashbanner']!=''){?>
  <div id="firstflash"></div>

  <table class="form-table"><tr><th>Change First/Open banner flash file(swf)</th><td><input type="file" name="firstflashfile" id="firstflashfile" onChange="chngimage('<?php echo esc_url($folder); ?>','firstflashfile')"></td><td><div id="firstflashfile_notice"></div></td></tr></table>
  <?php }else{?>
 <table class="form-table"><tr>
 <th>Upload your first/open banner flash file(swf) </th><td><input type="file" name="firstflashfile" id="firstflashfile" onChange="imageUpl('firstflashfile')"></td><td><div id="firstflashfile_notice"></div></td></tr></table><?php }?>
                          <div>  Add this Actionscript on link or button to open/expand banner on click<br><br>
                         <div id="pre_firstflash">  <pre> on (release) {
                            getURL(&quot;javascript:ExpandableBanners.openAd('enter_banner_name')&quot;);<br />
                            }
                            </pre>
                           <br>To open banner on rollover add this Actionscript<br>
                           <pre> on (rollover) {
                            getURL(&quot;javascript:ExpandableBanners.openAd('enter_banner_name')&quot;);<br />
                            }
                            </pre></div></div>
                        <table class="form-table"><tr>
 <th>2nd Flash Banner:</th></tr></table>
 <br />
 If you want to track clicks on flash banner.
  Add this Actionscript on Ad link<br>
  <pre>on (release) {
	getURL("http://www.yourwebsite.com", "_blank");
	getURL("javascript:eoccs(enter_banner_name.banid);");
}</pre>
 where 'enter_banner_name' is the name of your expandable banner.Make sure that you replace the spaces in name with '_'.
  <?php if(isset($_GET['actn']) && $options['mainflashbanner']!=''){?>
   <div id="mainflash"></div>

  <table class="form-table"><tr><th>Change 2nd banner flash file(swf)</th><td><input type="file" name="mainflashfile" id="mainflashfile" onChange="chngimage('<?php echo esc_url($folder); ?>','mainflashfile')"></td><td><div id="mainflashfile_notice"></div></td></tr></table>
  <?php }else{?>
 <table class="form-table"><tr>
 <th>Upload your 2nd banner flash file(swf)</th><td> <input type="file" name="mainflashfile" id="mainflashfile" onChange="imageUpl('mainflashfile')"></td><td><div id="mainflashfile_notice"></div></td></tr></table><?php }?>
                          <table class="form-table"><tr>
 <th>Will you have a close button in your flash file?</th><td>  <input type="radio" name="flashclose" id="flashclose" value="Yes" onClick="document.getElementById('flashclosediv').style.display='block';getchecked('useclosebutton','No');"> Yes &nbsp;&nbsp; <input type="radio" name="flashclose" id="flashclose2" value="No" onClick="document.getElementById('flashclosediv').style.display='none';getchecked('useclosebutton','Yes');" checked> No</td></tr></table>
  <div id="flashclosediv" style="display:none;">
  Add a visible close button in your main banner flash file.
  On that button add this Actionscript<br>
   <div id="pre_closeflash"><pre>on (release) {
                            getURL(&quot;javascript:ExpandableBanners.closeAd('enter_banner_name')&quot;);
                            }
                          </pre>
 To close banner on rollover add this Actionscript
   <pre>on (rollover) {
                            getURL(&quot;javascript:ExpandableBanners.closeAd('enter_banner_name')&quot;);
                            }
                          </pre></div>
<br>

  </div>
                       <table class="form-table"><tr><th>Do you want to have backup image for your flash file?</th><td>  <input type="radio" name="backup" id="backup1" value="Yes" onClick="document.getElementById('mainbackupdiv').style.display='block';document.getElementById('mainbackup').value='Yes';document.getElementById('firstbackupdiv').style.display='block';document.getElementById('firstbackup').value='Yes'"> Yes &nbsp;&nbsp; <input type="radio" name="backup" id="backup2" value="No" onClick="document.getElementById('mainbackupdiv').style.display='none';document.getElementById('firstbackupdiv').style.display='none';document.getElementById('mainbackup').value='No';document.getElementById('firstbackup').value='No';" checked> No</td></tr></table>
  <div id="firstbackupdiv" style="display:none;">
   <?php if(isset($_GET['actn']) && $options['firstbackup']=='Yes' && $options['bannertype']=='Flash'){ ?>
 
  <img id="firstbackupimg" src="<?php echo esc_url($folder.'/'.$options['firstbanner']); ?>">

  <table class="form-table"><tr><th>Change First/Open banner backup image (jpg, gif, png, max file size 250kb)</th><td><input type="file" name="firstbackupimage" id="firstbackupimage" onChange="chngimage('<?php echo esc_url($folder); ?>','firstbackupimage')"></td><td><div id="firstbackupimage_notice"></div></td></tr></table>
  <?php }else{?>
 
 <table class="form-table"><tr>
 <th>Upload your First/Open banner backup image (jpg, gif, png, max file size 50kb)</th><td> <input type="file" name="firstbackupimage" id="firstbackupimage" onChange="imageUpl('firstbackupimage')"></td><td><div id="firstbackupimage_notice"></div></td></tr></table><?php }?>
  </div>
   <div id="mainbackupdiv" style="display:none;">
   <?php if(isset($_GET['actn']) && $options['mainbackup']=='Yes' && $options['bannertype']=='Flash'){ ?>
 
  <img id="mainbackupimg" src="<?php echo esc_url($folder.'/'.$options['mainbanner']); ?>">

  <table class="form-table"><tr><th>Change 2nd banner backup image (jpg, gif, png, max file size 250kb)</th><td><input type="file" name="mainbackupimage" id="mainbackupimage" onChange="chngimage('<?php echo esc_url($folder); ?>','mainbackupimage')"></td><td><div id="mainbackupimage_notice"></div></td></tr>
  <?php }else{?>
 <table class="form-table"><tr><th>Upload your 2nd banner backup image (jpg, gif, png, max file size 250kb)</th><td> <input type="file" name="mainbackupimage" id="mainbackupimage" onChange="imageUpl('mainbackupimage')"></td><td><div id="mainbackupimage_notice"></div></td></tr><?php }?>
  <tr><th>Please set the URL you want it to link to http://</th><td><input type="text" name="mainbackupurl" id="mainbackupurl" value="<?php echo esc_url($options['mainurl']); ?>"></td><td><div id="mainbackupurl_notice"></div></td></tr>
<tr><th>Open link in new window? </th><td><input name="mainbackupnewwindow" id="mainbackupnewwindow1" value="Yes" checked="checked" type="radio" /> Yes&nbsp;&nbsp;&nbsp;
  <input name="mainbackupnewwindow" id="mainbackupnewwindow2" value="No" type="radio" /> No</td></tr></table>
  </div>
                         </div>
                       <div id="htmlbanner" style="display:none">
                        <table class="form-table"><tr>
 <th>First/Open HTML Banner: </th></tr>
 <tr><td> In your html code include this code in onclick event or href
  to open main html banner<br>
  <div id="pre_firsthtml"> <pre>
      onclick="javascript:ExpandableBanners.openAd('enter_banner_name');&quot;
      OR
      href="javascript:ExpandableBanners.openAd('enter_banner_name');&quot;
  </pre></div><br></td></tr></table>
  <table class="form-table"><tr>
 <th>Enter HTML Code for your First Banner</th><td> <textarea name='firsthtml' id='firsthtml' cols="90" rows="14" class="htmlbox"><?php echo esc_textarea(str_replace("^","'",str_replace('|','"',$options['firsthtml'])));?></textarea></td><td><div id="firsthtexp_notice"></div></td></tr>
  <tr><th>Enter the width of first html banner</th><td><input type='text' name="firsthtmlwidth" id="firsthtmlwidth" value="<?php echo esc_attr($options['firsthtmlwidth']); ?>"> </td><td><div id="firsthtmlwidth_notice"></div></td></tr>
 
   <tr><th>Enter the heigth of first html banner</th><td><input type='text' name="firsthtmlheight" id="firsthtmlheight" value="<?php echo esc_attr($options['firsthtmlheight']); ?>"> </td><td><div id="firsthtmlheight_notice"></div></td></tr></table><table class="form-table"><tr>
 <th>Main HTML Banner:</th></tr>
 </table>
 <br>
 If you want to track clicks on your main html banner
  add this code to onclick event of your ad link<br>
  <pre>
      onclick="eoccs(enter_banner_name.banid);"
  </pre>
  where 'enter_banner_name' is the name of your expandable banner.Make sure that you replace the spaces in name with '_'.
  <table class="form-table"><tr><th>Main Banner Type</th><td> <input type="radio" name="htmbannertype" id="htmbannertype1" value="Code" checked="checked" onclick="document.getElementById('divcode').style.display='block';document.getElementById('divfile').style.display='none'"> 
  Html Code &nbsp;&nbsp; <input type="radio" name="htmbannertype" id="htmbannertype2" value="File" onclick="document.getElementById('divcode').style.display='none';document.getElementById('divfile').style.display='block'"> 
  External file</td><td></td></tr></table><div id="divcode" style="display:block"><table class="form-table"><tr><th valign="top">Enter HTML Code for your Main Banner</th><td> <textarea name='mainhtml' id='mainhtml'  cols="90" rows="14" class="htmlbox"><?php echo esc_textarea(str_replace("^","'",str_replace('|','"',$options['mainhtml'])));?></textarea></td><td><div id="mainhtexp_notice"></div></td></tr></table></div>
  <div id="divfile" style="display:none"><table class="form-table"><tr><th valign="top">Enter full Link for your Main Banner File</th><td> <input type="text" name='mainhtmfile' id='mainhtmfile' value="<?php echo esc_attr($options['mainhtmfile']);?>"></td><td><div id="mainhtmfile_notice"></div></td></tr><tr><td colspan="3">The file could be .html or .php e.g 'http://www.someserver.com/somefile.php'</td></tr></table></div>
 <table class="form-table"><tr><th>Enter the width of main html banner</th><td><input type='text' name="mainhtmlwidth" id="mainhtmlwidth" value="<?php echo esc_attr($options['mainhtmlwidth']); ?>"> </td><td><div id="mainhtmlwidth_notice"></div></td></tr>
 
   <tr><th>Enter the heigth of main html banner</th><td><input type='text' name="mainhtmlheight" id="mainhtmlheight" value="<?php echo esc_attr($options['mainhtmlheight']); ?>"> </td><td><div id="mainhtmlheight_notice"></div></td></tr></table> 
  <table class="form-table"><tr>
 <th>Does your Main HTML Code contains Javascript?</th>&nbsp;&nbsp;&nbsp;<td>
                            <input name="hasjavascript" id="hasjavascript1" value="Yes" type="radio" />
                            Yes&nbsp;&nbsp;
  <input name="hasjavascript" id="hasjavascript2" value="No" checked="checked" type="radio" />
                            No </td></tr></table>               
</div>


 
<table class="form-table"><tr>
 <th>Use a Close button?&nbsp;&nbsp;&nbsp;</th><td><input name="useclosebutton" id="useclosebutton1" value="Yes" type="radio" onClick="document.getElementById('closediv').style.display='block';document.getElementById('closeoutside').style.display='block';" checked="checked" /> 
                             Yes &nbsp;&nbsp;
                             <input name="useclosebutton" id="useclosebutton2" value="No" type="radio" onClick="document.getElementById('closediv').style.display='none';document.getElementById('closeoutside').style.display='none';" />  No&nbsp;&nbsp;
</td></tr></table>
                    

                           <div id="closediv" style="display:none">
  
 <table class="form-table"><tr>
 <th>Close Button:</th></tr></table>
 <table class="form-table"><tr>
 <td><input type="radio" id="ourclose" name="closebutton" value="ourclose" onClick="document.getElementById('ownimage').style.display='none';document.getElementById('ourimage').style.display='block';document.getElementById('closename').value='close.png';document.getElementById('genclose1').checked='checked';" checked="checked"> Use our generic close button</td></tr>
  <tr><td><input type="radio" id="ownclose" name="closebutton" value="ownclose" onClick="document.getElementById('ownimage').style.display='block';document.getElementById('ourimage').style.display='none';document.getElementById('closename').value='';"> Or, Upload your own </td></tr></table>
  <div id="ourimage" style="display:block">
<table class="form-table"><tr>
 <th>Select 1 close image:</th><td> <input type="radio" name="genclose" id="genclose1" value="close.png" checked="checked" onClick="document.getElementById('closename').value='close.png';"><img src="<?php echo esc_url($folder);?>/close.png">&nbsp;&nbsp;<input type="radio" name="genclose" id="genclose2" value="close-blacktext.png" onClick="document.getElementById('closename').value='close-blacktext.png';"><img src="<?php echo esc_url($folder);?>/close-blacktext.png">&nbsp;&nbsp;<input type="radio" name="genclose" id="genclose3" value="close-whitetext.png" onClick="document.getElementById('closename').value='close-whitetext.png';"><img src="<?php echo esc_url($folder);?>/close-whitetext.png" style="background-color:#000"></td></tr></table>
  </div>
  <div id="ownimage" style="display:none">
   <?php if(isset($_GET['actn']) && $options['closebanner']!='' && $options['closebanner']!='close.png' && $options['closebanner']!='close-whitetext.png' && $options['closebanner']!='close-blacktext.png'){ ?>
    <img id="closeimg" src="<?php echo esc_url($folder.'/'.$options['closebanner']); ?>">
  <table class="form-table"><tr><th>Change Image (jpg, gif, png, max file size 50kb)</th><td><input type="file" name="closeimage" id="closeimage" onChange="chngimage('<?php echo esc_url($folder); ?>','closeimage')"></td><td><div id="closeimage_notice"></div></td></tr></table>
   <?php }else{?>
 <table class="form-table"><tr>
 <th>Upload your Image (jpg, gif, png, max file size 50kb)</th><td><input type="file" name="closeimage" id="closeimage" onChange="imageUpl('closeimage')"></td><td><div id="closeimage_notice"></div></td></tr>
 </table><?php }?>
  </div>

 <table class="form-table"><tr>
 <th>Set Placement of close button:</th><td width="100px">
  <input name="closebuttonposition" id="closebuttonposition1" value="top-left" type="radio" /> Top-Left</td>
  <td width="100px">
  <input name="closebuttonposition" id="closebuttonposition2" value="top-right" type="radio" /> Top-Right</td><td></td><td></td></tr>
  <tr><td></td><td>
  <input name="closebuttonposition" id="closebuttonposition3" value="bottom-left" type="radio" /> Bottom-Left</td>
  <td width="170px">
  <input name="closebuttonposition" id="closebuttonposition4" value="bottom-right" type="radio" checked="checked" /> Bottom-Right</td><td></td><td></td></tr></table>

   <div id='closeoutside' style="display:none;">
                        <table class="form-table"><tr>
 <th>Do you want close button on outside? &nbsp;&nbsp;&nbsp;</th><td><input name="htmlcloseoutside" id="htmlcloseoutside1" value="true" type="radio" />Yes&nbsp;&nbsp;
  <input name="htmlcloseoutside" id="htmlcloseoutside2" value="false" checked="checked" type="radio" />No</td></tr>
    <tr>
 <th>Add extra code to the close button? &nbsp;&nbsp;&nbsp;</th><td><input name="addextra" id="addextra1" value="true" type="radio" onclick="document.getElementById('excode').style.display='block';" />Yes&nbsp;&nbsp;
  <input name="addextra" id="addextra2" value="false" checked="checked" type="radio" onclick="document.getElementById('excode').style.display='none';"/>No&nbsp;&nbsp;&nbsp;(the code to execute when close button is clicked)</td></tr>
  </table>
  <div id="excode" style="display:none"> <table class="form-table"><tr>
 <th valign="top">Enter the code to add to close button:</th><td> <textarea id="extracode" name="extracode"><?php echo esc_textarea($options['extracode']);?></textarea></td></tr></table></div>
                          </div>
</div>
                          

<table class="form-table"><tr>
 <th>Expand Direction:</th><td><input name="expanddirection" id="expanddirection5" value="center-center" type="radio" /> 
                           Center-Center&nbsp;&nbsp;&nbsp;&nbsp;(For more direction options buy the full version)</td></tr>
                           </table>
  
    <table class="form-table"><tr>
 <th>Animate?&nbsp;&nbsp;&nbsp;</th><td><input name="animate" id="animate1" value="Yes" type="radio" onclick="document.getElementById('animatediv').style.display='block'" checked="checked"/> 
  YES&nbsp;&nbsp;
  <input name="animate" id="animate2" value="No" onclick="document.getElementById('animatediv').style.display='none'" type="radio" /> 
  NO </td></tr></table>
 <div id="animatediv">
   <table class="form-table"><tr>
 <th>Animation Speed&nbsp;&nbsp;&nbsp;</th><td><input type="text" name="animationspeed" id="animationspeed" value="<?php echo esc_attr($options['animationspeed']); ?>" /></td></tr></table>
 </div>
<table class="form-table"><tr>
 <th>Will this be a Corner Page Peel Banner?</th>&nbsp;&nbsp;&nbsp;<td>
                            <input name="cornerpeel" id="cornerpeel1" value="Yes" type="radio" />
                            Yes&nbsp;&nbsp;
  <input name="cornerpeel" id="cornerpeel2" value="No" checked="checked" type="radio" />
                            No </td></tr></table>
    <?php

}



function exp_autodiv(){
	global $exp_expandableoptions_defaults;
	$options = $exp_expandableoptions_defaults;
	?>
   <table class="form-table"><tr><th>Will your banner auto-open?</th><td><input type="radio" name="autoopen" id="autoopen1" value="Yes" onClick="document.getElementById('autoopendiv').style.display='block';" > Yes
  &nbsp;&nbsp;&nbsp;<input type="radio" name="autoopen" id="autoopen2" value="No" checked="checked" onClick="document.getElementById('autoopendiv').style.display='none';" > No</td></tr></table>
  <div id="autoopendiv" style="display:none">
 <table class="form-table"><tr><th> Auto-open the banner after</th><td> <input type="text" name="autoopentime" id="autoopentime" value="<?php echo esc_attr($options['autoopentime']); ?>" size="7"> seconds  - Set 0 for right away.</td><td><div id="autoopentime_notice"></div></td></tr></table></div>
   <br>
 
   <table class="form-table"><tr><th>Will your banner auto-close?</th><td>
  <input type="radio" name="autoclose" id="autoclose1" value="Yes" onClick="document.getElementById('autoclosediv').style.display='block';" > Yes&nbsp;&nbsp;&nbsp;<input type="radio" name="autoclose" id="autoclose2" value="No" checked="checked" onClick="document.getElementById('autoclosediv').style.display='none';" > No</td></tr></table>
  
 <br>
     
     
  <div id="autoclosediv" style="display:none">
  <table class="form-table"><tr><th>Auto-close the banner after </th><td><input type="text" name="autoclosetime" id="autoclosetime" class="regtextbox2" value="<?php echo esc_attr($options['autoclosetime']); ?>" size="7"> seconds  - Default is set to 10</td><td><div id="autoclosetime_notice"></div></td></tr></table></div>

    <?php
}

function exp_pagediv(){
	global $exp_expandableoptions_defaults;
	$options = $exp_expandableoptions_defaults;
?>



 <table class="form-table"><tr><th>Show the banner on?</th><td><input type="radio" name="showonpage" id="showonpage3" value="All" checked="checked" onClick="document.getElementById('pagediv').style.display='none';" > All Pages&nbsp;&nbsp;&nbsp;<input type="radio" name="showonpage" id="showonpage2" value="Home" onClick="document.getElementById('pagediv').style.display='none';" > HomePage Only&nbsp;&nbsp;&nbsp;<input type="radio" name="showonpage" id="showonpage1" value="Specific" onClick="document.getElementById('pagediv').style.display='block';" > Specific Pages Only
  </td></tr></table>
  <div id="pagediv" style="display:none">
 <table class="form-table"><tr><th> Page Titles</th><td> <input type="text" name="pagetitle" id="pagetitle" value="<?php echo esc_attr($options['pagetitle']); ?>"> Titles of the page separated by commas on which to show the banner.(Case Sensitive)</td><td><div id="pagetitle_notice"></div></td></tr></table></div>
   <table class="form-table"><tr><th>Placement: First Item on Page</th><td><input type="radio" name="firstonpage" id="firstonpage1" value="Yes" onclick="document.getElementById('placediv').style.display='none'"> Yes&nbsp;&nbsp;&nbsp;<input type="radio" name="firstonpage" id="firstonpage2" value="No" onclick="document.getElementById('placediv').style.display='block'"> No
  </td></tr></table>
  <div id="placediv" style="display:block">
 <table class="form-table"><tr><th>Placement: Div ID</th><td> <input type="text" name="divid" id="divid" value="<?php echo esc_attr($options['divid']); ?>"> Id of div or any other html element  in which pushdown banner should appear .</td><td><div id="divid_notice"></div></td></tr><tr><td colspan="2">*Note If placing into a Post, manually add a new DIV layer in your post like this &lt;div id="expandablepost"&gt;&lt;/div&gt; Then add "expandablepost" in the box above.</td></tr><tr><th>Placement of Expandable Banner?</th><td><input type="radio" name="beforediv" id="beforediv1" value="Yes" checked="checked"> Start of Div&nbsp;&nbsp;&nbsp;<input type="radio" name="beforediv" id="beforediv2" value="No"> End of Div
  </td></tr></table></div>
   <table class="form-table"><tr><th scope="row">Add CSS above your Expandable Banner</th><td>	<input type="text" value="<?php echo esc_attr($options['abovecss']); ?>" style="width:50%;" name="abovecss" id="abovecss">  
</td></tr>
<tr><th scope="row">Add CSS below your Expandable Banner</th><td>	<input type="text" value="<?php echo esc_attr($options['belowcss']); ?>" style="width:50%;" name="belowcss" id="belowcss">  
</td></tr></table>
<table class="form-table"><tr><th>Make the banner Responsive?</th><td><input type="radio" name="responsive" id="responsive1" value="Yes" onclick="document.getElementById('sdiv').style.display='none';"> Yes
  &nbsp;&nbsp;&nbsp;<input type="radio" name="responsive" id="responsive2" value="No" checked="checked" onclick="document.getElementById('sdiv').style.display='block';"> No</td></tr></table>
  <div id="sdiv">
<table class="form-table"><tr><th>Screen size to display on:</th><td><input type="radio" name="screensize" id="screensize3" value="All" checked="checked" onClick="document.getElementById('screendiv').style.display='none';" > All Sizes&nbsp;&nbsp;&nbsp;<input type="radio" name="screensize" id="screensize2" value="Desktop" onClick="document.getElementById('minscreen').value='1025';document.getElementById('maxscreen').value='4000';document.getElementById('screendiv').style.display='block';" > Desktop Only&nbsp;&nbsp;&nbsp;<input type="radio" name="screensize" id="screensize1" value="Tablet" onClick="document.getElementById('minscreen').value='768';document.getElementById('maxscreen').value='1024';document.getElementById('screendiv').style.display='block';" > Tablet Only&nbsp;&nbsp;&nbsp;<input type="radio" name="screensize" id="screensize4" value="Mobile" onClick="document.getElementById('minscreen').value='0';document.getElementById('maxscreen').value='767';document.getElementById('screendiv').style.display='block';" > Mobile Only
  </td></tr></table>
  <div id="screendiv" style="display:none">
 <table class="form-table"><tr><th> Screen Width</th><td> <input type="text" name="minscreen" id="minscreen" value="<?php echo esc_attr($options['minscreen']); ?>">px&nbsp;&nbsp;&nbsp;<input type="text" name="maxscreen" id="maxscreen" value="<?php echo esc_attr($options['maxscreen']); ?>">px</td><td><div id="minscreen_notice"></div><div id="maxscreen_notice"></div></td></tr></table></div></div>
<?php
}
function exp_radio($args) {
	global $exp_expandableoptions_defaults;
	$options = $exp_expandableoptions_defaults;
	$id = $args['id'];
    $count=1;
	foreach($args['values'] as $key => $val) {
?>
	<input type="radio" name="<?php echo esc_attr($id);?>" id="<?php echo esc_attr($id.$count);?>" value="<?php echo esc_attr($key);?>" <?php if(@$options[$args['id']] == $key){ echo 'checked'; } ?>/> <?php echo esc_html($val);?>
<?php
  $count++;
	}
}


function exp_text($args) {
	global $exp_expandableoptions_defaults;
	$options = $exp_expandableoptions_defaults;
	$id = $args['id'];
?>
	<input name="<?php echo esc_attr($id);?>" type="text" id="<?php echo esc_attr($id);?>" value="<?php echo esc_attr(@$options[ $args['id'] ]);?>" /> <div id="<?php echo esc_attr($id);?>_notice"></div>
  
<?php
}
function exp_longtext($args) {
	global $exp_expandableoptions_defaults;
	$options = $exp_expandableoptions_defaults;
	$id = $args['id'];
?>
	<input name="<?php echo esc_attr($id);?>" id="<?php echo esc_attr($id);?>" style="width:50%;" type="text" value="<?php echo esc_attr(@$options[ $args['id'] ]);?>" /> <?php echo esc_html(" {$args['text']}\n"); ?><div id="<?php echo esc_attr($id);?>_notice"></div>
<?php
}


function exp_checkbox($args) {
	global $exp_expandableoptions_defaults;
	$options = $exp_expandableoptions_defaults;
	$id = $args['id'];
?>
	<input name="<?php echo esc_attr($id);?>" type="checkbox" value="<?php echo esc_attr($args['value']);?>" <?php echo isset($options[$args['id']]) ? 'checked' : '';?> /> <?php echo esc_html(" {$args['text']}"); ?> <br/>
<?php
}



function exp_expandable_settings_page() {
		wp_enqueue_media();
		global $exp_expandableoptions_defaults;
	$options = $exp_expandableoptions_defaults;
	$folder=plugins_url('', __FILE__)."/images";
		
		if ( isset($_GET['settings-updated']) && $_GET['settings-updated'] == true )
			$message = 'Settings updated.';

		$title = __('Melodic Media Expandable Banner', 'exp_expandablebanner');
		?>
		<div class="wrap">   
			<?php screen_icon(); ?>
			<h2><?php echo esc_html( $title ); ?></h2>
		
			<?php
				if ( !empty($message) ) : 
				?>
				<div id="message" class="updated fade"><p><?php echo esc_html($message); ?></p></div>
				<?php 
				endif; 
			?>
		
			<form id="createbanner" action="admin.php?page=exp_preview_banner"  target="_blank" method="post">
             <div id="error_notice"></div><br>
				<?php 
					settings_fields('exp_expandableoptions_group'); 
					do_settings_sections('new_expandable_banner'); 
				?>
		
				<p>
				<input type="submit" class="button button-primary" name="previewbanner" value="Preview Banner" onclick="return formact('preview')" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="button button-primary" name="savebanner" value="Save Banner" onclick="return formact('save')" />
				
				</p>
			</form>
		 
         <script type="text/javascript" language="javascript">
		fillEditBannerexp('<?php echo esc_js($options['expandon']); ?>','<?php echo esc_js($options['expanddirection']); ?>','<?php echo esc_js($options['animate']); ?>','<?php echo esc_js($options['closebutton']); ?>','<?php echo esc_js($options['closebuttonposition']); ?>','<?php echo esc_js($options['htmlcloseoutside']); ?>','<?php echo esc_js($options['cornerpagepeel']); ?>','<?php echo esc_js($options['onceperday']); ?>','<?php echo esc_js($options['autoopen']); ?>','<?php echo esc_js($options['autoclose']); ?>','<?php echo esc_js($options['closebanner']); ?>','<?php echo esc_js($options['bannertype']); ?>','<?php echo esc_js($options['firstflashbanner']); ?>','<?php echo esc_js($options['flashclosebutton']); ?>','<?php echo esc_js($options['mainnewwindow']); ?>','<?php echo esc_js($options['beforediv']); ?>','<?php echo esc_js($options['firstonpage']); ?>','<?php echo esc_js($options['showonpage']); ?>','<?php echo esc_js($options['responsive']); ?>','<?php echo esc_js($options['screensize']); ?>','<?php echo esc_js($options['minscreen']); ?>','<?php echo esc_js($options['maxscreen']); ?>','<?php echo esc_js($options['hasjavascript']); ?>','<?php echo esc_js($options['htmbannertype']); ?>','<?php echo esc_js($options['addextra']);?>');
	
          <?php if(isset($_GET['actn']) && $options['mainflashbanner']!=''){?>

swfobject.embedSWF("<?php echo esc_url($folder.'/'.$options['mainflashbanner']); ?>", "mainflash", "250", "200", "9.0.0", "<?php echo esc_url(plugins_url('', __FILE__)); ?>/swfobject/expressInstall.swf");
<?php }?>
 <?php if(isset($_GET['actn']) && $options['firstflashbanner']!=''){?>

swfobject.embedSWF("<?php echo esc_url($folder.'/'.$options['firstflashbanner']); ?>", "firstflash", "250", "200", "9.0.0", "<?php echo esc_url(plugins_url('', __FILE__)); ?>/swfobject/expressInstall.swf");
<?php }?>
         </script>
		</div>
	<?php }

?>
