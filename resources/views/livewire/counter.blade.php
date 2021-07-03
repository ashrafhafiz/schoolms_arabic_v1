<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <h1>Counter Example</h1>
    <br><br>
    <button wire:click="increment">+</button>
    {{ $count }}
    <button wire:click="decrement">-</button>
    <br>
    <br>
    <input type="text" name="search" wire:model="search" />
    <ul>
        @foreach ($levels as $level)
        <li>{{ $level->name }}</li>
        @endforeach
    </ul>
</div>