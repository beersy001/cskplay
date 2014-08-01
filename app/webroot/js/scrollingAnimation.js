$(document).ready(
	function() {
		$(document).scroll(function( e){
			checkAnimationState();
		});
	}
);


function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height()-100;

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function checkAnimationState()
{

	$(".animation-step").each(function(index){
		var animationStepJQObj = $(this);

		if(isScrolledIntoView(animationStepJQObj)){
			if(animationStepJQObj.attr("data-animation-run") && animationStepJQObj.attr("data-animation-run") == "false"){
				runScrollAnimation(animationStepJQObj);
			}
			else if(!animationStepJQObj.attr("data-animation-run")){
				runScrollAnimation(animationStepJQObj);
			}
		}

	});
}

function runScrollAnimation(animationStepObj){

	$(animationStepObj).attr("data-animation-run", "true");
	$(animationStepObj).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0});

	$(animationStepObj).find($(".left, .right, .top, .bottom")).css('-moz-transform',"translate3d(0px, 0px, 0px)");
	$(animationStepObj).find($(".left, .right, .top, .bottom")).css('-webkit-transform',"translate3d(0px, 0px, 0px)");
	$(animationStepObj).find($(".left, .right, .top, .bottom")).css('-ms-transform',"translate3d(0px, 0px, 0px)");
	$(animationStepObj).find($(".left, .right, .top, .bottom")).css('transform',"translate3d(0px, 0px, 0px)");
}

