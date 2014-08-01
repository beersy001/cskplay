<div class="onerow">
	<div class="col12">

		<form action="<?=$this->Html->url(array('action' =>'newGame'))?>" id="GameNewGameForm" method="post" accept-charset="utf-8">
			<div style="display:none;">
				<input type="hidden" name="_method" value="POST">
			</div>
			
			<div class="input_row">
				<label for="GameCelebFirstName">celebrity</label>
				<input name="data[Game][celebFirstName]" maxlength="2000" type="text" id="GameCelebFirstName" class="clear" required autofocus placeholder="e.g. James">
				<input name="data[Game][celebSurname]" maxlength="2000" type="text" id="GameCelebSurname" required placeholder="e.g. Corden"> 
				<label for="GameCelebFirstName" class="tiny_text clear">first name</label>
				<label for="GameCelebSurname" class="tiny_text" >last name</label>
			</div>

			<div class="input_row">
				<label for="GameSport">sport</label>
				<input name="data[Game][sport]" placeholder="e.g. football" maxlength="2000" id="GameSport" class="clear wide_input" required >
			</div>
			
			<div class="input_row">
				<label for="GameMonth">month of game</label>
				<input name="data[Game][month]" maxlength="2000" type="text" id="GameMonth" class="clear wide_input" required>
			</div>

			<div class="submit">
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>
</div>