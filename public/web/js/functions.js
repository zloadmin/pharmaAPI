function initRangeVariables() {
    initScalesWeightCalibration();
    initScalesWeightOfComponents();
    intiScalesRangeValue();
    initScalesWeight();
}

function initScalesWeightCalibration() {
    window.scalesWeightCalibration = Livewire.getByName('stages.weighting-stage.scales')[0].get('scalesWeightCalibration');
    console.log('initScalesWeightCalibration', window.scalesWeightCalibration);
}

function initScalesWeightOfComponents() {
    window.scalesWeightOfComponents = Livewire.getByName('stages.weighting-stage.scales')[0].get('scalesWeightOfComponents');
    console.log('initScalesWeightOfComponents', window.scalesWeightOfComponents);
}

function intiScalesRangeValue() {
    window.scalesRangeValue = Livewire.getByName('stages.weighting-stage.scales')[0].get('scalesRangeValue');
    console.log('intiScalesRangeValue', window.scalesRangeValue);
}

function initScalesWeight() {
    window.scalesWeight = Livewire.getByName('stages.weighting-stage.scales')[0].get('scalesWeight');
    console.log('initScalesWeight', window.scalesWeight);
}

function initRange() {
    initRangeVariables();

    if (window.range) {
        console.log('initRange exists', window.range);
        window.range.destroy();
    }

    window.range_from = window.scalesRangeValue;
    window.range_current = window.scalesRangeValue;
    window.range_step = 0.001;
    window.range_min = 0.000;
    window.range_max = 0.01;

    window.range = $('.interaction_data #range1').ionRangeSlider({
        min: window.range_min,
        max: window.range_max,
        from: window.range_from,
        step: window.range_step,
        grid: true,
        postfix: ' г',
        onStart: data => {
            // updateScalesRangeValue(data.from);
            updateScalesWeight();
        },
        onChange: data => {
            // updateScalesRangeValue(data.from);
            updateScalesWeight();
        },
        onUpdate: data => {
            // updateScalesRangeValue(data.from);
            updateScalesWeight();
        },
        onFinish: data => {
            updateScalesRangeValue(data.from);
            updateScalesWeight();
        }
    }).data("ionRangeSlider");
    updateScalesWeight();
    $('.rangeBlock').show();
}

function initTimeRange() {
    if (window.timeRange) {
        console.log('initRange exists', window.timeRange);
        window.timeRange.destroy();
    }

    window.timeRange = $('#timeRange').ionRangeSlider({
        min: 10,
        max: 120,
        from: 0,
        step: 1,
        grid: true,
        grid_num: 11,
        onFinish: data => {
            console.log('time range ', data.from);
            Livewire.getByName('stages.components.modals.modal-mixer-component')[0].set('seconds', data.from, false)
        },
    }).data('ionRangeSlider');
}

function initBathRanges() {
    initBathTemperatureRange();
    initBathTimeRange();
}

function initBathTemperatureRange() {

    if (window.bathTemperatureRange) {
        console.log('initBathRanges exists bathTemperatureRange', window.bathTemperatureRange);
        window.bathTemperatureRange.destroy();
    }

    window.bathTemperatureRange = $('#bath_temperature').ionRangeSlider({
        min: 0,
        max: 100,
        from: 0,
        step: 1,
        grid: true,
        grid_num: 10,
        onFinish: data => {
            console.log('bathTemperatureRange ', data.from);
            Livewire.getByName('stages.components.modals.modal-bath-component')[0].set('temperature', data.from, false)
        },
    }).data('ionRangeSlider');

}

function initBathTimeRange() {
    if (window.bathTimeRange) {
        console.log('initBathRanges exists bathTimeRange', window.bathTimeRange);
        window.bathTimeRange.destroy();
    }
    window.bathTimeRange = $('#bath_time').ionRangeSlider({
        min: 10,
        max: 120,
        from: 10,
        step: 1,
        grid: true,
        grid_num: 11,
        onFinish: data => {
            console.log('bathTimeRange ', data.from);
            Livewire.getByName('stages.components.modals.modal-bath-component')[0].set('seconds', data.from, false)
        },
    }).data('ionRangeSlider');
}

function rangeMinus() {
    let nextValue = window.scalesRangeValue - window.range_step;
    window.scalesRangeValue = nextValue >= window.range_min ? nextValue : window.range_min;
    updateScalesRangeValue(window.scalesRangeValue);
    rangeSetValue(window.scalesRangeValue.toFixed(4));
}

function rangePlus() {
    let nextValue = window.scalesRangeValue + window.range_step;
    window.scalesRangeValue = nextValue >= window.range_max ? window.range_max : nextValue;
    updateScalesRangeValue(window.scalesRangeValue);
    rangeSetValue(window.scalesRangeValue.toFixed(4));
}

function rangeSetValue(value) {
    window.range.update({
        from: parseFloat(value)
    });

}
function updateScalesRangeValue(value) {
    console.log('updateScalesRangeValue', value);
    window.scalesRangeValue = value;
    Livewire.getByName('stages.weighting-stage.scales')[0].set('scalesRangeValue', value, false)
}

function updateScalesWeight() {
    window.scalesWeight = window.scalesWeightOfComponents + window.scalesRangeValue - window.scalesWeightCalibration;
    $('#scales-value').text(window.scalesWeight.toFixed(4));
    $('.interaction_data .range1 input.from').val(window.scalesWeight.toFixed(3));
}


function addLeadingZeros(num, targetLength) {

    let numStr = num.toString();
    while (numStr.length < targetLength) {
        numStr = '0' + numStr;

    }
    return numStr;
}

function showCurrentTask() {
    let parent = $('.current_task');
    $('.spoler_btn').toggleClass('active')
    parent.find('.dropdown').slideToggle(300)
}

function showModal(modal) {

    Fancybox.defaults.autoFocus = false
    Fancybox.defaults.trapFocus = false
    Fancybox.defaults.dragToClose = false
    Fancybox.defaults.placeFocusBack = false
    Fancybox.defaults.l10n = {
        CLOSE: 'Закрыть',
        NEXT: 'Следующий',
        PREV: 'Предыдущий',
        MODAL: 'Вы можете закрыть это модальное окно нажав клавишу ESC'
    }

    Fancybox.defaults.tpl = {
        closeButton: '<button data-fancybox-close class="f-button is-close-btn" title="{{CLOSE}}"><svg><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg></button>',

        main: `<div class="fancybox__container" role="dialog" aria-modal="true" aria-label="{{MODAL}}" tabindex="-1">
			<div class="fancybox__backdrop"></div>
			<div class="fancybox__carousel"></div>
			<div class="fancybox__footer"></div>
		</div>`,
    }

    Fancybox.close()
    Fancybox.show([{
        src: document.getElementById(modal),
        type: 'inline'
    }])
}

function initCartSlider() {

    const bottomPanelSliders = [],
        bottomPanelSlider = document.querySelectorAll('.bottom_panel .swiper')

    bottomPanelSlider.forEach((el, i) => {
        el.classList.add('bottom_panel_s' + i)

        let options = {
            loop: false,
            speed: 500,
            watchSlidesProgress: true,
            slideActiveClass: 'active',
            slideVisibleClass: 'visible',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            lazy: true,
            spaceBetween: 16,
            slidesPerView: 'auto',
            on: {
                init: swiper => setHeight(swiper.el.querySelectorAll('.item')),
                resize: swiper => {
                    let items = swiper.el.querySelectorAll('.item')

                    items.forEach(el => el.style.height = 'auto')

                    setHeight(items)
                }
            }
        }

        bottomPanelSliders.push(new Swiper('.bottom_panel_s' + i, options))
    })
}

const setHeight = items => {
    let maxheight = 0

    items.forEach(el => {
        if (el.offsetHeight > maxheight) maxheight = el.offsetHeight
    })

    items.forEach(el => el.style.height = maxheight + 'px')
}
