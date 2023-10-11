<?php

namespace Sawirricardo\FilamentNouislider\Enums;

enum NouisliderBehaviour: string
{
    case Drag = 'drag';
    case DragFixed = 'drag-fixed';
    case Tap = 'tap';
    case TapDrag = 'tap-drag';
    case Hover = 'hover';
    case UnconstrainedTap = 'unconstrained-tap';
    case None = 'none';
}
