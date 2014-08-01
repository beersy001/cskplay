<div class="grid" id="main_grid">
	<div class="onerow background_container">
		<div id="all_celebs" class="col12">

				<form action="editCelebrity" method="post">
					<input name="data[Celebrity][firstName]" placeholder="first Name"  type="text">
					<input name="data[Celebrity][surname]" placeholder="Last Name" type="text">
					<input name="data[Celebrity][month]" placeholder="2099-12" type="month">
					<input name="data[Celebrity][text]" placeholder="Description" type="textarea">
					<input name="data[Celebrity][submitButton]" value="Save" type="submit">
				</form>

			<?php foreach($celebrities as $celeb){ 

			?>
				<form action="editCelebrity" method="post">
					<input name="data[Celebrity][firstName]" value="<?=$celeb['Celebrity']['firstName'] ?>" type="text">
					<input name="data[Celebrity][surname]" value="<?=$celeb['Celebrity']['surname'] ?>" type="text">
					<input name="data[Celebrity][month]" value="<?=$celeb['Celebrity']['month']?>" type="month">
					<input name="data[Celebrity][text]" value="<?= $celeb['Celebrity']['text'] ?>" type="textarea">
					<div class="submit">
						<input name="data[Celebrity][submitButton]" value="Save" type="submit">
						<input name="data[Celebrity][submitButton]" value="Delete" type="submit">
					</div>
				</form>
			<?php

			 } ?>

		</div>
	</div>
</div>