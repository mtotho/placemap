<div id="home">

	<?php

	
		if($this->session->userdata('isLoggedIn')){
			echo "logged in";
		}else{
			echo "not logged";
		}
	?>


</div>