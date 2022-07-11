<div class="p-16 flex justify-center gap-16 items-center">
    <button wire:click="increment" class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded text-white">+</button>
    {{ $count }}
    <button wire:click="decrement" class="py-2 px-4 bg-red-600 hover:bg-red-600 rounded text-white">-</button>
</div>
