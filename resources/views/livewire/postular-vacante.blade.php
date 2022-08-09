<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Apply to this vacancy
    </h3>
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-700 font-bold p-2 my-5">
            {{session('mensaje')}}
        </div>
    @else
        <form class="w-96 mt-5" wire:submit.prevent='apply'>
            <div class="mb-4 flex flex-col justify-center items-center">
                <x-label for="cv" :value="__('Resume (PDF)')"/>
                <x-input id="cv" type="file" accept=".pdf" class="w-full block mt-1" wire:model="cv"/>
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror
            <x-button class="my-5">
                {{__('Apply')}}
            </x-button>
        </form>
    @endif
</div>
