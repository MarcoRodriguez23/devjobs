<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div>
        <x-label for="title" :value="__('Title')" />

        <x-input 
            id="title" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="title" 
            :value="old('title')" 
            placeholder="Ex. Developer"
        />
        @error('title')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-label for="salary" :value="__('Month Salary')" />

        <select 
            wire:model="salary" 
            id="salary" 
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
        >
            <option value="" selected disabled>--Select a salary--</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salary}}</option>
            @endforeach
        </select>
        @error('salary')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-label for="category" :value="__('Category')" />

        <select 
            wire:model="category" 
            id="category" 
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
        >
            <option value="" selected disabled>--Select a category--</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->category}}</option>
            @endforeach

        </select>
        @error('category')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-label for="company" :value="__('Company')" />

        <x-input 
            id="company" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="company" 
            :value="old('company')" 
            placeholder="Ex. IBM, Netflix, Amazon"
        />
        @error('company')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-label for="lastday" :value="__('Last day')" />

        <x-input 
            id="lastday" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="lastday" 
            :value="old('lastday')" 
        />
        @error('lastday')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-label for="description" :value="__('Description')" />

        <textarea 
            wire:model="description" 
            id="description"
            class="block mt-1 w-full h-72"
            :value="old('description')"  
        ></textarea>
        @error('description')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-label for="image" :value="__('Image')" />

        <x-input 
            id="image" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="new_image"
            accept="image/*"
        />

        <div class="my-5 w-100 flex flex-col justify-center items-center">
            <x-label :value="__('Current Image')"/>
            <img src="{{asset('storage/vacantes/'.$image)}}" alt="imagen vacante">
        </div>

        <div class="my-5 w-100 flex flex-col justify-center items-center">
            @if ($new_image)
                imagen nueva:
                <img src="{{$new_image->temporaryUrl()}}" alt="">
            @endif
        </div>

        @error('new_image')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-button>
        Save vacancy
    </x-button>
</form>
