
		<!-- main -->
		<main>			
			
			<div class="centrado">
			<div class="row">
				    <?php 
				    $i = 0;
				    foreach ($data as $value):
				    	foreach ($value['alarmas'] as $val):
					?>
				    <div class="col s12 m6 l4" id="alarma<?php echo $i++ ?>">
                        
                    </div>
                    <?php 
                    endforeach;
                    endforeach;
                    ?>
					

				</div>					
			</div>	
			
		</main>
		<!-- /main -->

