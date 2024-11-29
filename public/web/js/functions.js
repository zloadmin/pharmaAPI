function initRange() {
    if(window.range) {
        console.log('initRange exists', window.range);
        window.range.destroy();
    }
    console.log('initRange');
    window.range_step = 0.001;
    window.range_from = 0.001;
    window.range_min = 0.001;
    window.range_max = 0.01;
    window.range_current = window.range_from;
    window.range = $('.interaction_data #range1').ionRangeSlider({
        min: window.range_min,
        max: window.range_max,
        from: window.range_from,
        step: window.range_step,
        grid: true,
        postfix: ' г',
        onChange: data => {
            // console.log('onChange', data.from);
            $('.interaction_data .range1 input.from').val(data.from.toFixed(4))
            window.range_current = data.from;
            rangeValueUpdated();
        },
        onUpdate: data => {
            // console.log('onUpdate', data.from);
            $('.interaction_data .range1 input.from').val(data.from.toFixed(4))
            window.range_current = data.from;
            rangeValueUpdated();
        },
        onFinish: data => {
            window.range_current = data.from;
            $('.interaction_data .range1 input.from').val(data.from.toFixed(4))
            window.range_current = data.from;
            rangeValueUpdated();
        }
    }).data("ionRangeSlider");

    $('.rangeBlock').show();
}

function rangeMinus() {
    let nextValue = window.range_current  - window.range_step ;
    let value = nextValue >= window.range_min ? nextValue : window.range_min;
    rangeSetValue(value.toFixed(4));
}

function rangePlus() {

    let nextValue = window.range_step + window.range_current;
    let value = nextValue >= window.range_max ? window.range_max : nextValue;
    rangeSetValue(value.toFixed(4));
}

function rangeSetValue(value) {
    window.range.update({
        from: parseFloat(value)
    })
    window.range_current = parseFloat(value);
    rangeValueUpdated();
}
function rangeValueUpdated()
{
    updateScalesValue();
}
function updateScalesValue()
{
    let current = $('#scales-value').data('current-value');
    let nextValue = parseFloat(current) + parseFloat(window.range_current);
    setScalesValue(nextValue.toFixed(4));
}
function setScalesValue(value)
{

    $('#scales-value').text(addLeadingZeros(value, 8));
    Livewire.getByName('stages.weighting-stage.scales')[0].set('value', value, false)
}
function addLeadingZeros(num, targetLength) {

    let numStr = num.toString();
    while (numStr.length < targetLength) {
        numStr = '0' + numStr;

    }
    return numStr;
}