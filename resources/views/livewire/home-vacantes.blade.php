<div>
    <livewire:filtrar-vacantes/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-600 mb-12">
                Our vacancies
            </h3>
            <div class="shadow-sm rounded-lg bg-white p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a 
                                class="text-2xl font-extrabold text-gray-600" 
                                href="{{route('vacantes.show',$vacante->id)}}"
                            >
                                {{$vacante->title}}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->company}}</p>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->categoria->category}}</p>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->salario->salary}}</p>
                            <p class="font-bold text-sm">Last day to send resume: {{$vacante->lastday->format('d/m/Y')}}</p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a 
                                class="bg-indigo-400 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center" 
                                href="{{route('vacantes.show',$vacante->id)}}"
                            >
                                See vacancy
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">
                        There are not vacancies
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
