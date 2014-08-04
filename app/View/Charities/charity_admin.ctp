<div class="grid" id="main_grid">
	<div class="onerow background_container margin_bottom">

		<div class="col12 form_container">

			<h1 class="border_bottom margin_bottom">add charity</h1>

			<form action="addCharity" method="post">
				<div class="input_row">
					<label id="CharityNameLabel" for="CharityName">charity name</label>
					<label id="CharityMonthLabel" for="CharityMonth">charity month</label>
					<label id="CharityTypeLabel" for="CharityType">charity type</label>
					<label id="CharityVideoLinkLabel" for="CharityVideoLink">video link</label>
					<label id="CharityCelebrityLabel" for="CharityCelebrity">celebrity</label>
					<input id="CharityName" class="helper--clearfix" name="data[Charity][name]" placeholder="Name"  type="text">
					<input id="CharityMonth" name="data[Charity][month]" placeholder="209912">
					<select id="CharityType" name="data[Charity][type]">
						<option value="celeb">celeb charity</option>
						<option value="csk">csk charity</option>
					</select>
					<input id="CharityVideoLink" name="data[Charity][videoLink]" placeholder="video link" type="text">
					<input id="CharityCelebrity" name="data[Charity][celebrity]" placeholder="celebrity" type="text">
				</div>
				<div class="input_row">
					<label id="CharityHeading1Label" for="CharityHeading1">heading 1</label>
					<label id="CharityTextarea1Label" for="CharityTextarea1">textarea 1</label>
					<input id="CharityHeading1" class="helper--clearfix" name="data[Charity][heading1]" placeholder="heading 1" type="text">
					<textarea id="CharityTextarea1" name="data[Charity][textarea1]" placeholder="text area 1" type="text" rows="4" maxlength="500"></textarea>
				</div>

				<div class="input_row">
					<label id="CharityHeading2Label" for="CharityHeading2">heading 2</label>
					<label id="CharityTextarea2Label" for="CharityTextarea2">textarea 2</label>
					<input id="CharityHeading2" class="helper--clearfix" name="data[Charity][heading2]" placeholder="heading 2" type="text">
					<textarea id="CharityTextarea2" name="data[Charity][textarea2]" placeholder="text area 2" type="text" rows="4" maxlength="800"></textarea>
				</div>
				
				<div class="input_row">
					<label id="CharityHeading3Label" for="CharityHeading3">heading 3</label>
					<label id="CharityTextarea3Label" for="CharityTextarea3">textarea 3</label>
					<input id="CharityHeading3" class="helper--clearfix" name="data[Charity][heading3]" placeholder="heading 3" type="text">
					<textarea id="CharityTextarea3" name="data[Charity][textarea3]" placeholder="text area 3" type="text" rows="4" maxlength="800"></textarea>
				</div>
				<div class="input_row">
					<label id="CharityHeading4Label" for="CharityHeading4">heading 4</label>
					<label id="CharityTextarea4Label" for="CharityTextarea4">textarea 4</label>
					<input id="CharityHeading4" class="helper--clearfix" name="data[Charity][heading4]" placeholder="heading 4" type="text">
					<textarea id="CharityTextarea4" name="data[Charity][textarea4]" placeholder="text area 4" type="text" rows="4" maxlength="800"></textarea>
				</div>
				
					<input name="data[Charity][submitButton]" value="Save" type="submit">
			</form>
		</div>
	</div>
</div>