<html>
	<head>
		<title>Keep Calm and Tweet</title>
		<link href="styles.css" rel="stylesheet" type="text/css" />

<!-- Google Analytics -->
		<script type="text/javascript">

  		var _gaq = _gaq || [];
    	_gaq.push(['_setAccount', 'UA-31096746-1']);
	  	_gaq.push(['_trackPageview']);

	    (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		
		</script>
<!-- End of Google Analytics -->
	
	</head>
	<body>

		<div id = "crown">
			<img src= "crown.png" alt = "crown" onclick="window.location.reload()">
		</div>

		<div id = "keepcalm">
			<p class="big">keep</p>
			<p class="big">calm</p>
			<p class="small">and</p>
		</div>
		<?php include('twitter.php'); ?>

		<div id = "phrase">
			<?php
				$rand = rand(0,count($array)-1);
				$tokened = explode(" ",$array[$rand]);
		
				if(count($tokened) > 1){
					$len = strlen($array[$rand]);
					$chars = 0;
					$breakw = 0;
					if(count($tokened) == 2 && (strlen($tokened[0]) >= strlen($tokened[1]))){
						$line1 = $tokened[0];
						$line2 = $tokened[1];
					}else{
						for($i = 0; $i < count($tokened); $i++){
							if($chars >= ($len/2) || $chars >= ($len/2 -1.5)){
								if($i == count($tokened) - 1 && count($tokened) <= 2){
									$breakw = $i-1;
								}
								elseif($i < (count($tokened)-1) && strlen($tokened[$i + 1]) < 2){
									$breakw = $i + 1;
								}
								elseif($chars < $len/2 && $chars < ($len/2 -1)){
									$breakw = $i;
								}
								else{
									$breakw = $i;
								}
								break;
							}
							else{
								$chars += strlen($tokened[$i]);
							}
						}
				
						$line1 = "";
						for($i = 0; $i < $breakw; $i++){
							$line1 .= $tokened[$i];
							$line1 .= " ";
						}
								
						$line2 = "";
						for($i = $breakw; $i < count($tokened); $i++){
							$line2 .= $tokened[$i];
							$line2 .= " ";
						}
					}
				}
				else{
					$line1 = $tokened[0];
					$line2 ="";
				}
			?>
			<p class="big"><?= $line1 ?></p>
			<p class="big"><?= $line2 ?></p>

		</div>

	</body>
</html>







