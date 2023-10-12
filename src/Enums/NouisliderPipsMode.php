<?php

namespace Sawirricardo\FilamentNouislider\Enums;

enum NouisliderPipsMode: string
{
    case Range = 'range';
    case Steps = 'steps';
    case Positions = 'positions';
    case Count = 'count';
    case Values = 'values';
}
