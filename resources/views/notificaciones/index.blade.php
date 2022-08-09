<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-center my-10">My notifications</h1>
                    @forelse ($notificaciones as $notificacion)
                        <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                            <div>
                                <p>Have a new resume in: 
                                    <span class="font-bold">{{$notificacion->data['nombre_vacante']}}</span>
                                </p>
                                <p>
                                    <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <a href="#" class="bg-indigo-400 p-3 text-sm uppercase font-bold text-white rounded-lg">
                                    See resume
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-600">You don't have notifications</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
