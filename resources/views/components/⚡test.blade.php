<?php

use Livewire\Component;
use Livewire\Attributes\Reactive;

new class extends Component
{
    #[Reactive] public $heros;
};
?>

<div>
    @foreach ($heros as $hero)
        <div wire:key="hero-item-{{$hero['id']}}">
            {{$hero['title']}}
        </div>
    @endforeach
</div>