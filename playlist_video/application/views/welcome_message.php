<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>	
	<link href="<?php base_url();?>assets/js/video.css" rel="stylesheet">
	<script src="<?=base_url()?>assets/js/jquery-3.3.1.js" type="text/javascript"></script>

</head>
	
<body>

<!-- <div class="fullscreen-bg">
	<video class="fullscreen-bg__video" id="myVideo" controls >
	    <source src="<?=base_url()?>assets/video/1.mp4" id="mp4Source" type="video/mp4">
	    Your browser does not support the video tag.
	</video>	
</div> -->
 <button id="show">Show Cutomers</button>
    <div id="barang"></div>
    <script type="text/javascript">
        $("#show").click(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('C_video/data_barang'); ?>",
                success: function(data) {
                    var htmlrow='';
                       htmlrow +="<ol>";
                       $.each(data.result, function (i, event){
                           htmlrow += "<li>"+event.nama_video+"</li>";

                       });
                       htmlrow +="</ol>";
                       $("#barang").html(htmlrow);
                }
            });
        });
    </script>


<!-- 
<script type='text/javascript'>
	var playlist = ['<?=base_url()?>assets/video/1.mp4','<?=base_url()?>assets/video/2.mp4'];
   var count=1;
   var player=document.getElementById('myVideo');
   var mp4Vid = document.getElementById('mp4Source');
   player.addEventListener('ended',myHandler,false);

  	function myHandler(e)
  	{
  		if(!e) 
  		{
  			e = window.event; 
  		}

  		if (count == playlist.length) {
  			count = 1;
  			$(mp4Vid).attr('src', "<?=base_url()?>assets/video/"+count+".mp4");
  		}else{
  			count++;
  			$(mp4Vid).attr('src', "<?=base_url()?>assets/video/"+count+".mp4");
  		}

  		player.load();
  		player.play();
  	}
</script>  -->
	
	
</body>
</html>