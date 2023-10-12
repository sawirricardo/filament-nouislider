<?php

namespace Sawirricardo\FilamentNouislider\Forms;

use Closure;
use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Contracts;
use Filament\Forms\Components\Field;
use Filament\Support\Concerns\HasExtraAlpineAttributes;
use Sawirricardo\FilamentNouislider\Enums\NouisliderBehaviour;
use Sawirricardo\FilamentNouislider\Enums\NouisliderPipsMode;

class Nouislider extends Field implements Contracts\HasAffixActions
{
    use Concerns\CanBeDisabled;
    use Concerns\CanBeHidden;
    use Concerns\CanBeValidated;
    use Concerns\HasAffixes;
    use Concerns\HasExtraInputAttributes;
    use Concerns\HasStep;
    use HasExtraAlpineAttributes;

    protected array | Closure | null $start = null;

    protected int | array | Closure | null $margin = null;

    protected int | array | Closure | null $padding = null;

    protected string | Closure | null $direction = null;

    protected bool | Closure $snap = false;

    protected bool | array | Closure $connect = false;

    protected array | Closure | null $additionalRange = null;

    protected NouisliderBehaviour | Closure | null $behaviour = null;

    protected int | Closure | null $limit = null;

    protected string | Closure | null $orientation = null;

    protected string | Closure | null $cssPrefix = null;

    protected array | Closure | null $pips = null;

    protected bool | Closure | null $animate = false;

    protected int | Closure | null $animationDuration = null;

    /**
     * @var scalar | Closure | null
     */
    protected $maxValue = null;

    /**
     * @var scalar | Closure | null
     */
    protected $minValue = null;

    protected bool | Closure | null $tooltips = false;

    /**
     * @var view-string
     */
    protected string $view = 'filament-nouislider::forms.components.nouislider';

    public function pips(NouisliderPipsMode | Closure $mode, int | Closure $density, int | array | null | Closure $values, bool | Closure $stepped = null)
    {
        $this->pips = [
            'mode' => $this->evaluate($mode)->value,
            'values' => $this->evaluate($values),
            'density' => $this->evaluate($density),
            'stepped' => $this->evaluate($stepped),
        ];

        return $this;
    }

    public function snap($value = true)
    {
        $this->snap = $value;

        return $this;
    }

    public function connect($value = true)
    {
        $this->connect = $value;

        return $this;
    }

    public function behaviour(NouisliderBehaviour $value)
    {
        $this->behaviour = $value;

        return $this;
    }

    public function start($value)
    {
        $this->start = $value;

        return $this;
    }

    public function additionalRange($value)
    {
        $this->additionalRange = $value;

        return $this;
    }

    /**
     * @param  scalar | Closure | null  $value
     */
    public function maxValue($value): static
    {
        $this->maxValue = $value;

        return $this;
    }

    /**
     * @param  scalar | Closure | null  $value
     */
    public function minValue($value): static
    {
        $this->minValue = $value;

        return $this;
    }

    public function tooltips($value = true): static
    {
        $this->tooltips = $value;

        return $this;
    }

    public function orientation($value)
    {
        $this->orientation = $value;

        return $this;
    }

    public function vertical()
    {
        return $this->orientation('vertical');
    }

    public function horizontal()
    {
        return $this->orientation('horizontal');
    }

    /**
     * @return scalar | array | null
     */
    public function getMaxValue()
    {
        return $this->evaluate($this->maxValue);
    }

    /**
     * @return scalar | array | null
     */
    public function getMinValue()
    {
        return $this->evaluate($this->minValue);
    }

    public function getTooltips()
    {
        return $this->evaluate($this->tooltips);
    }

    public function getSnap()
    {
        return $this->evaluate($this->snap);
    }

    public function getStart()
    {
        return $this->evaluate($this->start);
    }

    public function getConnect()
    {
        return $this->evaluate($this->connect);
    }

    public function getDirection()
    {
        return $this->evaluate($this->direction);
    }

    public function getAdditionalRange()
    {
        return $this->evaluate($this->additionalRange);
    }

    public function getRange()
    {
        return [
            'min' => [$this->getMinValue()],
            ...($this->getAdditionalRange() ?? []),
            'max' => [$this->getMaxValue()],
        ];
    }

    public function getBehaviour()
    {
        return $this->evaluate($this->behaviour);
    }

    public function getOrientation()
    {
        return $this->evaluate($this->orientation);
    }

    public function getPips()
    {
        return $this->evaluate($this->pips);
    }

    public function getPadding()
    {
        return $this->evaluate($this->padding);
    }

    public function getMargin()
    {
        return $this->evaluate($this->margin);
    }

    public function getAnimate()
    {
        return $this->evaluate($this->animate);
    }

    public function getAnimationDuration()
    {
        return $this->evaluate($this->animationDuration);
    }

    public function getLimit()
    {
        return $this->evaluate($this->limit);
    }

    public function getCssPrefix()
    {
        return $this->evaluate($this->cssPrefix);
    }

    public function getOptions()
    {
        return [
            'snap' => $this->getSnap(),
            'start' => $this->getStart(),
            'connect' => $this->getConnect(),
            'direction' => $this->getDirection(),
            'range' => $this->getRange(),
            'behaviour' => $this->getBehaviour()?->value,
            'limit' => $this->getLimit(),
            'step' => $this->getStep(),
            'padding' => $this->getPadding(),
            'margin' => $this->getMargin(),
            'pips' => $this->getPips(),
            'orientation' => $this->getOrientation(),
            'animate' => $this->getAnimate(),
            'animationDuration' => $this->getAnimationDuration(),
            'cssPrefix' => $this->getCssPrefix(),
            'tooltips' => $this->getTooltips(),
        ];
    }
}
