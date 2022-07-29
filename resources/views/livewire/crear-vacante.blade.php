<form action="" class="md:w-1/2 space-y-5">
    <div>
        <x-label for="title" :value="__('Title')" />

        <x-input 
            id="title" 
            class="block mt-1 w-full" 
            type="text" 
            name="title" 
            :value="old('title')" 
            placeholder="Ex. Developer"
        />
    </div>

    <div>
        <x-label for="salary" :value="__('Month Salary')" />

        <select 
            name="salary" 
            id="salary" 
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
        >
            <option value="" disabled selected>--Select a salary--</option>

        </select>

    </div>

    <div>
        <x-label for="category" :value="__('Category')" />

        <select 
            name="category" 
            id="category" 
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
        >
            <option value="" disabled selected>--Select a category--</option>

        </select>

    </div>

    <div>
        <x-label for="company" :value="__('Company')" />

        <x-input 
            id="company" 
            class="block mt-1 w-full" 
            type="text" 
            name="company" 
            :value="old('company')" 
            placeholder="Ex. IBM, Netflix, Amazon"
        />
    </div>

    <div>
        <x-label for="lastday" :value="__('Last day')" />

        <x-input 
            id="lastday" 
            class="block mt-1 w-full" 
            type="date" 
            name="lastday" 
            :value="old('lastday')" 
        />
    </div>

    <div>
        <x-label for="description" :value="__('Description')" />

        <textarea 
            name="description" 
            id="description"
            class="block mt-1 w-full h-72"
            :value="old('description')"  
        ></textarea>
    </div>

    <div>
        <x-label for="image" :value="__('Image')" />

        <x-input 
            id="image" 
            class="block mt-1 w-full" 
            type="file" 
            name="image" 
        />
    </div>

    <x-button>
        Create Vacancy
    </x-button>
</form>
