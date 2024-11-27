function initRange()
{
	$('.interaction_data #range1').ionRangeSlider({
		min: 0.001,
		max: 0.01,
		from: 0.001,
		step: 0.001,
		grid: true,
		postfix: ' г',
		onChange: data => {
			$('.interaction_data .range1 input.from').val(data.from.toFixed(3))
		},
		onUpdate: data => {
			$('.interaction_data .range1 input.from').val(data.from.toFixed(3))
		}
	}).data('ionRangeSlider');
	$('.rangeBlock').show();
}