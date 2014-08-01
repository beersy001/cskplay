<script>
	$(document).ready(function() {
		var originalFontSize = 16;
		var sectionWidth = $('.adaptive_text').width();

		$('.adaptive_text a').each(function(){
			var spanWidth = $(this).width();
			var newFontSize = (sectionWidth/spanWidth) * originalFontSize;
			$(this).css({"font-size" : newFontSize, "line-height" : newFontSize/1.2 + "px"});
		});
	});
</script>

<div class="call-to-action--play">
	<div class="adaptive_text">
		<?=$this->Html->link('play',array('controller'=>'games', 'action'=>'displayGame'), array('class'=>'no_decoration'))?>
	</div>
</div>