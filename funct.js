function chngimage(folder,image){
    imageUpl(image,folder);
	 //setTimeout("changep('"+folder+"','"+image+"')",15000);
}

function imageUpl(image,folder){
	
	if(image=='firstimage'){
	      
			var fileInput = document.getElementById('firstimage');
			var file = fileInput.files[0];
			var formData = new FormData();
			formData.append('action', 'exp_uplimage');
			formData.append('ftype', 'firstimage');
			formData.append('previmg', document.getElementById('firstname').value);
			formData.append('file', file);
				 document.getElementById('firstimage_notice').innerHTML="<font color='#009900'>Uploading...</font>";
			 jQuery.ajax({  
			url: document.getElementById('adm_url').value+"admin-ajax.php",  
			type: "POST",  
			data: formData,  
			processData: false,  
			contentType: false,  
			success: function (res) { 
			  if(res=="Imageerror"){
				  document.getElementById('firstimage_notice').innerHTML="<font color='#FF0000'>Only jpeg, png and gif images could be uploaded.</font>";
				  document.getElementById('firstname').value="";
			  }else if(res=="sizeerror"){
				  document.getElementById('firstimage_notice').innerHTML="<font color='#FF0000'>Size exceeds 50kb limit .</font>";
				   document.getElementById('firstname').value="";
			  }else{
				   document.getElementById('firstimage_notice').innerHTML="<font color='#009900'>Uploaded</font>";
				   document.getElementById('firstname').value=res;
				   if(document.getElementById('firstimg')!=null){
					   changep(folder,image);
				   }
				  
			  }
			}  
		}); 
			
	}else if(image=='mainimage'){
	      
			var fileInput = document.getElementById('mainimage');
			var file = fileInput.files[0];
			var formData = new FormData();
			formData.append('action', 'exp_uplimage');
			formData.append('ftype', 'mainimage');
			formData.append('previmg', document.getElementById('mainname').value);
			formData.append('file', file);
				 document.getElementById('mainimage_notice').innerHTML="<font color='#009900'>Uploading...</font>";
			 jQuery.ajax({  
			url: document.getElementById('adm_url').value+"admin-ajax.php",  
			type: "POST",  
			data: formData,  
			processData: false,  
			contentType: false,  
			success: function (res) { 
			  if(res=="imageerror"){
				  document.getElementById('mainimage_notice').innerHTML="<font color='#FF0000'>Only jpeg, png and gif images could be uploaded.</font>";
				  document.getElementById('mainname').value="";
			  }else if(res=="sizeerror"){
				  document.getElementById('mainimage_notice').innerHTML="<font color='#FF0000'>Size exceeds 250kb limit .</font>";
				   document.getElementById('mainname').value="";
			  }else{
				   document.getElementById('mainimage_notice').innerHTML="<font color='#009900'>Uploaded</font>";
				   document.getElementById('mainname').value=res;
				   if(document.getElementById('mainimg')!=null){
					   changep(folder,image);
				   }
			  }
			}  
		}); 
			
	}else if(image=='closeimage'){
	      
			var fileInput = document.getElementById('closeimage');
			var file = fileInput.files[0];
			var formData = new FormData();
			formData.append('action', 'exp_uplimage');
			formData.append('ftype', 'closeimage');
			formData.append('previmg', document.getElementById('closename').value);
			formData.append('file', file);
				 document.getElementById('closeimage_notice').innerHTML="<font color='#009900'>Uploading...</font>";
			 jQuery.ajax({  
			url: document.getElementById('adm_url').value+"admin-ajax.php",  
			type: "POST",  
			data: formData,  
			processData: false,  
			contentType: false,  
			success: function (res) { 
			  if(res=="imageerror"){
				  document.getElementById('closeimage_notice').innerHTML="<font color='#FF0000'>Only jpeg, png and gif images could be uploaded.</font>";
				  document.getElementById('closename').value="";
			  }else if(res=="sizeerror"){
				  document.getElementById('closeimage_notice').innerHTML="<font color='#FF0000'>Size exceeds 50kb limit .</font>";
				   document.getElementById('closename').value="";
			  }else{
				   document.getElementById('closeimage_notice').innerHTML="<font color='#009900'>Uploaded</font>";
				   document.getElementById('closename').value=res;
				   if(document.getElementById('closeimg')!=null){
					   changep(folder,image);
				   }
			  }
			}  
		}); 
			
	}else if(image=='firstflashfile'){
	   
			var fileInput = document.getElementById('firstflashfile');
			var file = fileInput.files[0];
			var formData = new FormData();
			formData.append('action', 'exp_uplimage');
			formData.append('ftype', 'firstflasfile');
			formData.append('previmg', document.getElementById('firstflashname').value);
			formData.append('file', file);
				 document.getElementById('firstflashfile_notice').innerHTML="<font color='#009900'>Uploading...</font>";
			 jQuery.ajax({  
			url: document.getElementById('adm_url').value+"admin-ajax.php",  
			type: "POST",  
			data: formData,  
			processData: false,  
			contentType: false,  
			success: function (res) { 
			  if(res=="Imageerror"){
				  document.getElementById('firstflashfile_notice').innerHTML="<font color='#FF0000'>Only swf file could be uploaded.</font>";
				  document.getElementById('firstflashname').value="";
			  }else if(res=="sizeerror"){
				  document.getElementById('firstflashfile_notice').innerHTML="<font color='#FF0000'>Size exceeds 50kb limit .</font>";
				   document.getElementById('firstflashname').value="";
			  }else{
				   document.getElementById('firstflashfile_notice').innerHTML="<font color='#009900'>Uploaded</font>";
				   document.getElementById('firstflashname').value=res;
				   if(document.getElementById('firstflash')!=null){
					   changep(folder,image);
				   }
			  }
			}  
		}); 
			
	}else if(image=='mainflashfile'){
	      
			var fileInput = document.getElementById('mainflashfile');
			var file = fileInput.files[0];
			var formData = new FormData();
			formData.append('action', 'exp_uplimage');
			formData.append('ftype', 'mainflashfile');
			formData.append('previmg', document.getElementById('mainflashname').value);
			formData.append('file', file);
				 document.getElementById('mainflashfile_notice').innerHTML="<font color='#009900'>Uploading...</font>";
			 jQuery.ajax({  
			url: document.getElementById('adm_url').value+"admin-ajax.php",  
			type: "POST",  
			data: formData,  
			processData: false,  
			contentType: false,  
			success: function (res) { 
			  if(res=="Imageerror"){
				  document.getElementById('mainflashfile_notice').innerHTML="<font color='#FF0000'>Only swf file could be uploaded.</font>";
				  document.getElementById('mainflashname').value="";
			  }else if(res=="sizeerror"){
				  document.getElementById('mainflashfile_notice').innerHTML="<font color='#FF0000'>Size exceeds 250kb limit .</font>";
				   document.getElementById('mainflashname').value="";
			  }else{
				   document.getElementById('mainflashfile_notice').innerHTML="<font color='#009900'>Uploaded</font>";
				   document.getElementById('mainflashname').value=res;
				   if(document.getElementById('mainflash')!=null){
					   changep(folder,image);
				   }
			  }
			}  
		}); 
			
	}else if(image=='firstbackupimage'){
	      
			var fileInput = document.getElementById('firstbackupimage');
			var file = fileInput.files[0];
			var formData = new FormData();
			formData.append('action', 'exp_uplimage');
			formData.append('ftype', 'firstbackupimage');
			formData.append('previmg', document.getElementById('firstname').value);
			formData.append('file', file);
				 document.getElementById('firstbackupimage_notice').innerHTML="<font color='#009900'>Uploading...</font>";
			 jQuery.ajax({  
			url: document.getElementById('adm_url').value+"admin-ajax.php", 
			type: "POST",  
			data: formData,  
			processData: false,  
			contentType: false,  
			success: function (res) { 
			  if(res=="imageerror"){
				  document.getElementById('firstbackupimage_notice').innerHTML="<font color='#FF0000'>Only jpeg, png and gif images could be uploaded.</font>";
				  document.getElementById('firstname').value="";
			  }else if(res=="sizeerror"){
				  document.getElementById('firstbackupimage_notice').innerHTML="<font color='#FF0000'>Size exceeds 50kb limit .</font>";
				   document.getElementById('firstname').value="";
			  }else{
				   document.getElementById('firstbackupimage_notice').innerHTML="<font color='#009900'>Uploaded</font>";
				   document.getElementById('firstname').value=res;
				   if(document.getElementById('firstbackupimg')!=null){
					   changep(folder,image);
				   }
			  }
			}  
		}); 
			
	}else if(image=='mainbackupimage'){
	      
			var fileInput = document.getElementById('mainbackupimage');
			var file = fileInput.files[0];
			var formData = new FormData();
			formData.append('action', 'exp_uplimage');
			formData.append('ftype', 'mainbackupimage');
			formData.append('previmg', document.getElementById('mainname').value);
			formData.append('file', file);
				 document.getElementById('mainbackupimage_notice').innerHTML="<font color='#009900'>Uploading...</font>";
			 jQuery.ajax({  
			url: document.getElementById('adm_url').value+"admin-ajax.php",  
			type: "POST",  
			data: formData,  
			processData: false,  
			contentType: false,  
			success: function (res) { 
			  if(res=="imageerror"){
				  document.getElementById('mainbackupimage_notice').innerHTML="<font color='#FF0000'>Only jpeg, png and gif images could be uploaded.</font>";
				  document.getElementById('mainname').value="";
			  }else if(res=="sizeerror"){
				  document.getElementById('mainbackupimage_notice').innerHTML="<font color='#FF0000'>Size exceeds 250kb limit .</font>";
				   document.getElementById('mainname').value="";
			  }else{
				   document.getElementById('mainbackupimage_notice').innerHTML="<font color='#009900'>Uploaded</font>";
				   document.getElementById('mainname').value=res;
				   if(document.getElementById('mainbackupimg')!=null){
					   changep(folder,image);
				   }
			  }
			}  
		}); 
			
	}

}

function changep(folder,image){
     if(image=='firstimage'){
	     document.getElementById('firstimg').src=folder+'/'+document.getElementById('firstname').value;
		 document.getElementById('firstimage_notice').innerHTML+=". Previous Image deleted. Make sure to save banner";
	 }else if(image=='mainimage'){
	     document.getElementById('mainimg').src=folder+'/'+document.getElementById('mainname').value;
		  document.getElementById('mainimage_notice').innerHTML+=". Previous Image deleted. Make sure to save banner";
	 }else if(image=='closeimage'){
	     document.getElementById('closeimg').src=folder+'/'+document.getElementById('closename').value;
		  document.getElementById('closeimage_notice').innerHTML+=". Previous Image deleted. Make sure to save banner";
		 
	 }else if(image=='firstflashfile'){
	    swfobject.embedSWF(folder+'/'+document.getElementById('firstflashname').value, "firstflash", "250", "200", "9.0.0", "swfobject/expressInstall.swf");
		  document.getElementById('firstflashfile_notice').innerHTML+=". Previous flash deleted. Make sure to save banner";
		 
	 }else if(image=='mainflashfile'){
		 swfobject.embedSWF(folder+'/'+document.getElementById('mainflashname').value, "mainflash", "250", "200", "9.0.0", "swfobject/expressInstall.swf");
		  document.getElementById('mainflashfile_notice').innerHTML+=". Previous flash deleted. Make sure to save banner";
		 
	 }else if(image=='firstbackupimage'){
	     document.getElementById('firstbackupimg').src=folder+'/'+document.getElementById('firstname').value;
		 document.getElementById('firstbackupimage_notice').innerHTML+=". Previous Image deleted. Make sure to save banner";
	 }else if(image=='mainbackupimage'){
	     document.getElementById('mainbackupimg').src=folder+'/'+document.getElementById('mainname').value;
		  document.getElementById('mainbackupimage_notice').innerHTML+=". Previous Image deleted. Make sure to save banner";
	 }
}

function fillEditBannerexp(expandon,expanddirection,animate,closebutton,closebuttonpos,htmlcloseoutside,cornerpeel,onceperday,autoopen,autoclose,closebanner,bannertype,firstflash,flvclosebutton,mainnewwindow,beforediv,firstonpage,showonpage,responsive,screensize,minscreen,maxscreen,hasjavascript,htmbannertype,addextra){
	
	
			getchecked('bannertype',bannertype);
			getchecked('htmbannertype',htmbannertype);
			getchecked('addextra',addextra);
			if(firstflash!=''){
			   getchecked('flashopen','Yes');    
			}
			if(document.getElementById('firstbackup').value=='Yes'){
				getchecked('backup','Yes');
			}
		
			getchecked('expandon',expandon);
			getchecked('hasjavascript',hasjavascript);
			getchecked('responsive',responsive);
			getchecked('screensize',screensize);
			document.getElementById('minscreen').value=minscreen;
			document.getElementById('maxscreen').value=maxscreen;
			getchecked('firstonpage',firstonpage);
			getchecked('showonpage',showonpage);
			getchecked('beforediv',beforediv);
			getchecked('expanddirection',expanddirection);
			getchecked('animate',animate);
			getchecked('mainnewwindow',mainnewwindow);
			getchecked('flashclose',flvclosebutton);
			getchecked('useclosebutton',closebutton);
			getchecked('closebuttonposition',closebuttonpos);
			getchecked('htmlcloseoutside',htmlcloseoutside);
			getchecked('cornerpeel',cornerpeel);
			getchecked('onceperday',onceperday);
			getchecked('autoopen',autoopen);
			getchecked('autoclose',autoclose);
			if(closebutton=='Yes'){
					if(closebanner=='close.png' || closebanner=='close-whitetext.png' || closebanner=='close-blacktext.png'){
						getchecked('closebutton','ourclose');
						getchecked('genclose',closebanner);
					}else{
						getchecked('closebutton','ownclose');
						document.getElementById('closename').value=closebanner;
					}
			}

	
}





function getchecked(name,value){
	
	var values=value.split(',');
    for(var i=0; i<document.getElementsByName(name).length; i++){
	         current=document.getElementsByName(name).item(i);
		     for(var j=0; j<values.length; j++){
				  curr=values[j];
					 if(current.value==curr){
						 current.click();
						
					 }
			 }
	 
	 }


}

 function get_radio_value(id) {
            var inputs = document.getElementsByName(id);
            for (var i = 0; i < inputs.length; i++) {
              if (inputs[i].checked) {
                return inputs[i].value;
              }
            }
   }
   
  
   
function formact(action){
	jQuery('html,body').scrollTop(0);
	      var bannertype=get_radio_value('bannertype');
             // page=document.getElementById('page').value;
		   var valid=true;
		  var tfields="";
		  var nfields="";
		  
		   nfields='0';
		if(bannertype=="Image"){
			          if(document.getElementById('firstname').value=='' || document.getElementById('mainname').value==''){
						   document.getElementById('error_notice').innerHTML="<font color='#FF0000'>Please make sure first banner, main banner images are uploaded</font>";
						   valid=false;
					 }else{
						  document.getElementById('error_notice').innerHTML="";
					 }
					 if(get_radio_value('useclosebutton')=='Yes' && document.getElementById('closename').value==""){
					     document.getElementById('error_notice').innerHTML+="<font color='#FF0000'>Please make sure close button image is uploaded</font>";
						  valid=false;
					 }
						 tfields="bannername|mainurl";
			              if(get_radio_value('firstonpage')=="No"){
							  
							tfields+="|divid";
						 }
						 
						  if(get_radio_value('useclosebutton')=="No"){
							  
							getchecked('autoclose','Yes');
						 }
						  if(get_radio_value('autoopen')=="Yes"){
							tfields+="|autoopentime";
							 nfields="autoopentime";
						 }
						  if(get_radio_value('autoclose')=="Yes"){
							tfields+="|autoclosetime";
							if(nfields=='0'){
								 nfields="autoclosetime";
							}else{
							 nfields+="|autoclosetime";
							}
						 }
						
						 if(!validate(tfields,'0',nfields)){
							 
							 valid=false;
						 }
			
		
		}else if(bannertype=="Flash"){
			 if(document.getElementById('firstflashname').value=='' || document.getElementById('mainflashname').value==''){
						   document.getElementById('error_notice').innerHTML="<font color='#FF0000'>Please make sure first and main flash banner files are uploaded</font>";
						   valid=false;
					 }else{
						  document.getElementById('error_notice').innerHTML="";
					 }
					 if(get_radio_value('useclosebutton')=='Yes' && document.getElementById('closename').value==""){
					     document.getElementById('error_notice').innerHTML+="<font color='#FF0000'>Please make sure close button image is uploaded</font>";
						  valid=false;
					 }
					  tfields="bannername";
					   if(get_radio_value('firstonpage')=="No"){
							  
							tfields+="|divid";
						 }
					 if(get_radio_value('backup')=='Yes'){
						 
						  tfields+="|mainurl";
						   if(document.getElementById('firstname').value==""){
								 document.getElementById('error_notice').innerHTML+="<font color='#FF0000'>Please make sure backup image is uploaded</font>";
								  valid=false;
							 }
							  if(document.getElementById('mainname').value==""){
								 document.getElementById('error_notice').innerHTML+="<font color='#FF0000'>Please make sure backup image is uploaded</font>";
								  valid=false;
							 }
					 }
					 
						
			
						 
						  if(get_radio_value('useclosebutton')=="No" && get_radio_value('flashclose')=="No"){
							  
							getchecked('autoclose','Yes');
						 }
						  if(get_radio_value('autoopen')=="Yes"){
							tfields+="|autoopentime";
							 nfields="autoopentime";
						 }
						  if(get_radio_value('autoclose')=="Yes"){
							tfields+="|autoclosetime";
							if(nfields=='0'){
								 nfields="autoclosetime";
							}else{
							 nfields+="|autoclosetime";
							}
						 }
						 
						 if(!validate(tfields,'0',nfields)){
							 valid=false;
						 }
			
		
		}else if(bannertype=="HTML"){
			 
					 
					 if(get_radio_value('useclosebutton')=='Yes' && document.getElementById('closename').value==""){
					     document.getElementById('error_notice').innerHTML+="<font color='#FF0000'>Please make sure close button image is uploaded</font>";
						 valid="false";
					 }else{
						  document.getElementById('error_notice').innerHTML="";
					 }
					 
					   tfields="bannername|firsthtml|firsthtmlwidth|firsthtmlheight|mainhtmlwidth|mainhtmlheight";
						 nfields="firsthtmlwidth|firsthtmlheight|mainhtmlwidth|mainhtmlheight";
						
			              if(get_radio_value('firstonpage')=="No"){
							  
							tfields+="|divid";
						 }
						 
						  if(get_radio_value('useclosebutton')=="No"){
							  
							getchecked('autoclose','Yes');
						 }else if(get_radio_value('useclosebutton')=="Yes" && get_radio_value('htmlcloseoutside')=="true"){
						       // getchecked('animate','Yes');
						 }
						  if(get_radio_value('autoopen')=="Yes"){
							tfields+="|autoopentime";
							 nfields+="|autoopentime";
						 }
						  if(get_radio_value('autoclose')=="Yes"){
							tfields+="|autoclosetime";
							 nfields+="|autoclosetime";
						 }
						 
						 if(!validate(tfields,'0',nfields)){
							 valid=false;
						 }
		
		}
		 if(valid==true){
		             if(action=='preview'){                       
						 return true;
                                         
					 }else{
						  var firsthtml="";
						 var fstr=document.getElementById('firsthtml').value;
						 for(var i=0; i<fstr.length; i++){
						     firsthtml+=fstr.charCodeAt(i)+'|'; 
						 }
						  var mainhtml="";
						 var mstr=document.getElementById('mainhtml').value;
						 for(var i=0; i<mstr.length; i++){
						     mainhtml+=mstr.charCodeAt(i)+'|'; 
						 }
					 
					  var formpostrequest=new ajaxRequest();
						formpostrequest.onreadystatechange=function(){
						 if (formpostrequest.readyState==4){
						  if (formpostrequest.status==200 || window.location.href.indexOf("http")==-1){
							  
							  if(formpostrequest.responseText=="nameerror"){
								  document.getElementById('error_notice').innerHTML="<font color='#FF0000'>Banner with this name already exists.Please Change the name.</font>";
							  }else{
								   document.getElementById('error_notice').innerHTML="";
							  document.getElementById('bannerid').value=formpostrequest.responseText;
							 
							   document.location='admin.php?page=exp_expandable_top';
							  }
						  
						  }
						  else{
						   alert("An error has occured making the request")
						  }
						 }
						};
						
						var parameters="action=exp_submit&bannerid="+document.getElementById("bannerid").value+"&bannername="+document.getElementById("bannername").value+"&firstbanner="+document.getElementById("firstname").value+"&mainbanner="+document.getElementById("mainname").value+"&closebanner="+document.getElementById("closename").value+"&mainurl="+document.getElementById("mainurl").value+"&useclosebutton="+get_radio_value('useclosebutton')+"&autoopen="+get_radio_value('autoopen')+"&autoclose="+get_radio_value('autoclose')+"&autoopentime="+document.getElementById("autoopentime").value+"&autoclosetime="+document.getElementById("autoclosetime").value+"&onceperday="+get_radio_value('onceperday')+"&bannertype="+get_radio_value('bannertype')+"&firstflashbanner="+document.getElementById('firstflashname').value+"&mainflashbanner="+document.getElementById('mainflashname').value+"&closebuttonposition="+get_radio_value('closebuttonposition')+"&firstbackup="+document.getElementById('firstbackup').value+"&mainbackup="+document.getElementById('mainbackup').value+"&flvclosebutton="+get_radio_value('flashclose')+"&firsthtml="+firsthtml+"&mainhtml="+mainhtml+"&firsthtmlwidth="+document.getElementById('firsthtmlwidth').value+"&firsthtmlheight="+document.getElementById('firsthtmlheight').value+"&mainhtmlwidth="+document.getElementById('mainhtmlwidth').value+"&mainhtmlheight="+document.getElementById('mainhtmlheight').value+"&expandon="+get_radio_value('expandon')+"&expanddirection="+get_radio_value('expanddirection')+"&animate="+get_radio_value('animate')+"&cornerpeel="+get_radio_value('cornerpeel')+"&htmlcloseoutside="+get_radio_value('htmlcloseoutside')+"&firstnewwindow="+get_radio_value('firstnewwindow')+"&mainewwindow="+get_radio_value('mainnewwindow')+"&mainbackupnewwindow="+get_radio_value('mainbackupnewwindow')+"&pagetitle="+document.getElementById('pagetitle').value+"&beforediv="+get_radio_value('beforediv')+"&divid="+document.getElementById('divid').value+"&firstonpage="+get_radio_value('firstonpage')+"&showonpage="+get_radio_value('showonpage')+"&abovecss="+document.getElementById('abovecss').value+"&belowcss="+document.getElementById('belowcss').value+"&animationspeed="+document.getElementById('animationspeed').value+"&screensize="+get_radio_value('screensize')+"&minscreen="+document.getElementById("minscreen").value+"&maxscreen="+document.getElementById("maxscreen").value+"&responsive="+get_radio_value('responsive')+"&hasjavascript="+get_radio_value('hasjavascript')+"&htmbannertype="+get_radio_value('htmbannertype')+"&mainhtmfile="+document.getElementById('mainhtmfile').value+"&mainbackupurl="+document.getElementById('mainbackupurl').value+"&addextra="+get_radio_value('addextra')+"&extracode="+document.getElementById('extracode').value;
						formpostrequest.open("POST", document.getElementById('adm_url').value+"/admin-ajax.php", true);
						formpostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						formpostrequest.send(parameters);
						
					 }
				      
				 }else{
				     alert("Correct errors");
					 return false
				 }
	
}

function validate(textfield,email,numberfield)

{

	var valid;	

	var textv=true;

	var tfield=textfield.split('|');

	var nfield=numberfield.split('|');

	

	var currentf;
      
	for(var i=0; i<tfield.length; i++){

		
       
				currentf=document.getElementById(tfield[i]);
		
			
		
			   valid=checkText(currentf);
		
			   if(valid==false){
		
				 textv=false;
		
				
		
				document.getElementById(tfield[i]+"_notice").innerHTML="<font color='#FF0000'>Fill this field.</font>";
		
				 
		
			   }else{
		
			   
		
				document.getElementById(tfield[i]+"_notice").innerHTML="";
		
			   }
	

	}

	

	if(email!='0' && document.getElementById(email).value!=''){

		

	    valid=checkEmail(document.getElementById(email));

		if(valid==false){

		   document.getElementById(email+"_notice").innerHTML="<font color='#FF0000'>Please enter valid email address</font>";

			

		   textv=false;

		}else{

		  

			document.getElementById(email+"_notice").innerHTML="";

		}

	}

	if(numberfield!='0'){

		
for(var i=0; i<nfield.length; i++){

		
   
		currentf=document.getElementById(nfield[i]);

	
         
	   valid=checkNumber(currentf);

	   if(valid==false){

		 textv=false;

		if(document.getElementById(nfield[i]+"_notice").innerHTML==""){

		document.getElementById(nfield[i]+"_notice").innerHTML="<font color='#FF0000'>Enter only number.</font>";
		}
	     

	   }else{

	   
        if(document.getElementById(nfield[i]+"_notice").innerHTML==""){
		document.getElementById(nfield[i]+"_notice").innerHTML="";
		}

	   }
  

	}

	}


	

	return textv;

		

		

		



}

function ajaxRequest(){
 var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"] //activeX versions to check for in IE
 if (window.ActiveXObject){ //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)
  for (var i=0; i<activexmodes.length; i++){
   try{
    return new ActiveXObject(activexmodes[i])
   }
   catch(e){
    //suppress error
   }
  }
 }
 else if (window.XMLHttpRequest) // if Mozilla, Safari etc
  return new XMLHttpRequest()
 else
  return false
}

function checkNumber(field){

	

     if(isNaN(field.value)){


	   return false;

	 }else

	    return true;

}

function checkLimit(field,name,low,high){

	

    if(field.value<low || field.value>high){

	    alert("Please enter "+name+" between "+low+" and "+high);

		return false;

	}else

	    return true;

}



function checkText(field){

	

     if(field.value==''){

	   

		

		return false;

	 }else

	    return true;

}



function checkEmail(email){

     if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)==false){

		  

		   return false;

			

		}else

		   return true;

}

function GetXmlHttpObject()

{

  if (window.XMLHttpRequest)

  {
    

    // code for IE7+, Firefox, Chrome, Opera, Safari

    return new XMLHttpRequest();

  }

  if (window.ActiveXObject)

  {

    // code for IE6, IE5

    return new ActiveXObject("Microsoft.XMLHTTP");

  }

  return null;

}


function stateChanged()

{

  if (xmlhttp.readyState==4)

  {
                 if (navigator  &&  navigator.userAgent.match( /MSIE/i )){  
          setTBodyInnerHTML(document.getElementById(divId), xmlhttp.responseText);
             }else{   
            document.getElementById(divId).innerHTML=xmlhttp.responseText;   
	           }
                   //document.getElementById(divId).innerText=xmlhttp.responseText;


   

  }

}
