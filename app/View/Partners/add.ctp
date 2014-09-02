<div class="grid" id="main_grid">
	<div class="onerow">
		<div class="col12">
			<h1 class="border_bottom margin_bottom">add partner</h1>

			<?=$this->Form->create('Partner', array(
					'controller'=>'Partner',
					'action' => 'addPartner',
					'inputDefaults' => array(
						'label' => false,
						'div' => false
						)
					));?>
			<?=$this->Form->end();?>

			<div class="content-builder-wrapper">

				<div class="[ content-builder-wrapper__content ]  [ js-cms-wrapper ]">
				</div>
				<div>
					<p class="[ js-add-row ]  [ cta  cta--100px  cta--highlight ]"><i class="[ fa  fa-plus ]"></i> Add Row</p>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$( ".js-add-row" ).on( "click", function() {
		addRow();
	});

	$( document ).on( "click", ".js-remove-row", function(event) {
		removeRow(event);
	});

	$( document ).on( "click", ".js-add-column", function(event) {
		addColumn(event);
	});

	$( document ).on( "click", ".js-remove-column", function(event) {
		removeColumn(event);
	});
</script>