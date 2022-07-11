<div class="flex flex-col items-center">
   <div class="flex p-16 mx-auto justify-center items-center gap-4">
        <input type="number" wire:model="number1" placeholder="number 1" />
        <select class="w-24" wire:model="action">
            <option>+</option>
            <option>-</option>
            <option>*</option>
            <option>/</option>
            <option>%</option>
        </select>
        <input type="number" wire:model="number2" placeholder="number 2" />
        <button class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded text-white disabled:cursor-not-allowed disabled:bg-opacity-98" wire:click="calculate">
            
        {{ $disabled ? 'disabled' : '' }}    >= 
        
        
        </button>
        <br />

        <p class="text-3xl">{{ $result }}</p>
   </div>
</div>
