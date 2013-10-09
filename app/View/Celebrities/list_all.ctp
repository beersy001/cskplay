<form action="/cskplay/celebrities/editCelebrity" controller="Celebrities" id="CelebrityEditCelebrityForm" method="post">
	<table>
		<tr>
			<td>Name</td>
			<td>Month</td>
			<td>Picture</td>
			<td>Text</td>
			<td>Save</td>
			<td>Delete</td>
		</tr>
		<?php foreach($celebrities as $celeb){ ?>
			<tr>
				<td><input name="name" value="<?=$celeb['Celebrity']['name']?>" type="text" id="Celebrity"></td>
				<td><input name="name" value="<?=$celeb['Celebrity']['month']?>" type="text" id="Celebrity"></td>
				<td><input name="name" value="<?=$celeb['Celebrity']['picture']?>" type="text" id="Celebrity"></td>
				<td><input name="name" value="<?=$celeb['Celebrity']['text']?>" type="text" id="Celebrity"></td>
				<td></td>
				<td></td>
			</tr>
		<?php } ?>
			
	</table>
</form>