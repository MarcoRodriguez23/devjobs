<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{$vacante->title}}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Company: <span class="normal-case font-normal">{{$vacante->company}}</span></p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Lastday: <span class="normal-case font-normal">{{$vacante->lastday->toFormattedDateString()}}</span></p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Category: <span class="normal-case font-normal">{{$vacante->categoria->category}}</span></p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salary: <span class="normal-case font-normal">{{$vacante->salario->salary}}</span></p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-6">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/'.$vacante->image)}}" alt="vacante imagen">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">
                Vacancy Description
            </h2>
            <p>{{$vacante->description}}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                Would you like to apply? <a class="font-bold text-indigo-600" href="{{route('register')}}">Get an account</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"/>
    @endcannot
    
</div>
