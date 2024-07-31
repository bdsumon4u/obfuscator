<?php

namespace App\Filament\Resources;

class x755c55c3b extends x9123e235d
{
    public static function x7015757e6(x04101df38 $x27065342a): xffdecbf9e
    {
        return $xb6fe84a27->xfc9743f59([x71a1413e7::make('student_id')->x554da6c3c('Select the fee student')->x77398637b('Student')->x171e91e7a('student', 'name')->xbf9257a83(function (string $xb54c8aa0a): array {
            return x0b0f7ff5f::query()->where('name', 'like', "%{$x49b7b37aa}%")->x4febd7dec('sid', 'like', "%{$x49b7b37aa}%")->limit(10)->get()->mapWithKeys(fn(x0b0f7ff5f $xf0634222f): array => [$xc0fb3e8a4->xf08f6a64a() => $xc0fb3e8a4->name . ' [' . $xc0fb3e8a4->x641fb8c6e . ']'])->toArray();
        })->xe878f75c4(function ($xee707ee00): ?string {
            if ($xc0fb3e8a4 = x0b0f7ff5f::find($x101c8f62b)) {
                goto xfd64221b1;
            }
            return null;
            xfd64221b1:
            return $xc0fb3e8a4->name . ' [' . $xc0fb3e8a4->x641fb8c6e . ']';
        })->xf53f15ff4()->xa18ba5df8()->x259450261(true)])->xb673d0393(1);
    }
}