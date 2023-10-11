@php
    $isDisabled = $isDisabled();
    $isPrefixInline = $isPrefixInline();
    $isSuffixInline = $isSuffixInline();
    $prefixActions = $getPrefixActions();
    $prefixIcon = $getPrefixIcon();
    $prefixLabel = $getPrefixLabel();
    $suffixActions = $getSuffixActions();
    $suffixIcon = $getSuffixIcon();
    $suffixLabel = $getSuffixLabel();
    $statePath = $getStatePath();
    $options = $getOptions();
@endphp
<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <x-filament::input.wrapper
        :disabled="$isDisabled"
        :inline-prefix="$isPrefixInline"
        :inline-suffix="$isSuffixInline"
        :prefix="$prefixLabel"
        :prefix-actions="$prefixActions"
        :prefix-icon="$prefixIcon"
        :suffix="$suffixLabel"
        :suffix-actions="$suffixActions"
        :suffix-icon="$suffixIcon"
        :valid="! $errors->has($statePath)"
        class="fi-fo-nouislider"
        :attributes="\Filament\Support\prepare_inherited_attributes($getExtraAttributeBag())"
    >
    <div
            x-ignore
            ax-load
            ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('filament-nouislider', 'sawirricardo/filament-nouislider') }}"
            x-load-css="[
                @js(\Filament\Support\Facades\FilamentAsset::getStyleHref('filament-nouislider-styles', 'sawirricardo/filament-nouislider')),
            ]"
            x-data="noUiSliderFormComponent({
                        options: @js($options),
                        isDisabled: @js($isDisabled),
                        state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$statePath}')") }},
                        statePath: @js($statePath),
                    })"
            wire:ignore
            {{
                $attributes
                    ->merge($getExtraAttributes(), escape: false)
                    ->merge($getExtraAlpineAttributes(), escape: false)
            }}
        >
        <div x-ref="input"></div>
    </div>
    </x-filament::input.wrapper>
</x-dynamic-component>
