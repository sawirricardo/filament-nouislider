import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';

export default function noUiSliderFormComponent({
    state,
    options,
    isDisabled,
}) {
    return {
        state,
        isStateBeingUpdated: false,
        slider: null,
        init: function () {
            this.slider = noUiSlider.create(this.$refs.input, {
                start: options.start,
                range: options.range,
                connect: options.connect,
                direction: options.direction,
                snap: options.snap,
                tooltips: options.tooltips,
                animate: options.animate,
                animationDuration: options.animationDuration,
                behaviour: options.behaviour,
                limit: options.limit,
                step: options.step,
                padding: options.padding,
                margin: options.margin,
                pips: options.pips,
                orientation: options.orientation,
                cssPrefix: options.cssPrefix,
            });

            if (isDisabled) {
                this.slider.disable();
            }

            if (![null, undefined, ''].includes(this.state)) {
                this.slider.set(this.state)
            }

            this.slider.on('change', (values, handle, unencoded, tap, positions, noUiSlider) => {
                if (this.isStateBeingUpdated) {
                    return
                }

                this.isStateBeingUpdated = true
                this.state = this.slider.get(true) ?? null
                this.$nextTick(() => (this.isStateBeingUpdated = false))
            });
        },
    }
}
