@blaze(fold: true)

@props([
    'color' => null,
])

@php
$trackClasses = Flux::classes()
    ->add('h-1.5 relative w-full overflow-hidden bg-zinc-200')
    ->add('[print-color-adjust:exact]')
    ->add('rounded-full')
    ->add(match ($color) {
        'red'     => '[--flux-progress-color:var(--color-red-600)]',
        'orange'  => '[--flux-progress-color:var(--color-orange-600)]',
        'amber'   => '[--flux-progress-color:var(--color-amber-600)]',
        'yellow'  => '[--flux-progress-color:var(--color-yellow-600)]',
        'lime'    => '[--flux-progress-color:var(--color-lime-600)]',
        'green'   => '[--flux-progress-color:var(--color-green-600)]',
        'emerald' => '[--flux-progress-color:var(--color-emerald-600)]',
        'teal'    => '[--flux-progress-color:var(--color-teal-600)]',
        'cyan'    => '[--flux-progress-color:var(--color-cyan-600)]',
        'sky'     => '[--flux-progress-color:var(--color-sky-600)]',
        'blue'    => '[--flux-progress-color:var(--color-blue-600)]',
        'indigo'  => '[--flux-progress-color:var(--color-indigo-600)]',
        'violet'  => '[--flux-progress-color:var(--color-violet-600)]',
        'purple'  => '[--flux-progress-color:var(--color-purple-600)]',
        'fuchsia' => '[--flux-progress-color:var(--color-fuchsia-600)]',
        'pink'    => '[--flux-progress-color:var(--color-pink-600)]',
        'rose'    => '[--flux-progress-color:var(--color-rose-600)]',
        default   => '[--flux-progress-color:var(--color-accent)]',
    })
    ;

$barClasses = Flux::classes()
    ->add('h-full rounded-full transition-[width] duration-300 ease-out')
    ->add('bg-[var(--flux-progress-color)]')
    ;
@endphp

<ui-progress {{ $attributes->class($trackClasses) }} data-flux-progress>
    <div class="{{ $barClasses }}" style="width: var(--flux-progress-percentage)"></div>
</ui-progress>
