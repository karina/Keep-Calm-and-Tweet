<html>
	<head>
		<link href="styles.css" type="stylesheet/css" />
	</head>
	<body>

		<div id = "crown">
			<img src= "crown.png" alt = "crown">
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
					for($i = 0; $i < count($tokened); $i++){
						if($chars >= ($len/2) || $chars == ($len/2 -1)){
							if($i == count($tokened) - 1 && count($tokened) != 2){
								$breakw = $i-1;
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







