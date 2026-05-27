<?php

use Livewire\Component;
use App\models\features;

new class extends Component
{
    public $features = '';

    public function mount(){
        $this->features = features::get();
    }
};
?>

<div>
    <table class="border">
        <tr>
            $features

            @foreach($features as $feature)
                {{$feature}}
            @endforeach
        </tr>
    </table>
</div>