<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-8 md:mx-0">
        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{route('vacantes.show',$vacante->id)}}" class="font-bold text-xl">
                        {{$vacante->title}}
                    </a>
                    <p class="text-sm font-bold text-gray-600">{{$vacante->company}}</p>
                    <p class="text-sm font-bold text-gray-500">Last day: {{$vacante->lastday->format('d/m/Y')}}</p>
                </div>
    
                <div class="flex flex-col md:flex-row items-stretch text-center gap-3 mt-5 md:mt-0">
                    <a href="" class="bg-slate-800 py-3 px-4 rounded-lg text-white text-sm font-bold uppercase">
                        Candidates
                    </a>
                    <a href="{{route('vacantes.edit',$vacante->id)}}" class="bg-blue-800 py-3 px-4 rounded-lg text-white text-sm font-bold uppercase">
                        Edit
                    </a>
                    <button 
                        wire:click='$emit("delete",{{$vacante->id}})'
                        class="bg-red-600 py-3 px-4 rounded-lg text-white text-sm font-bold uppercase"
                    >
                        Delete
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">Vacancies not found</p>
        @endforelse
    </div>
    
    <div class="mt-10 mx-8 md:mx-0">
        {{$vacantes->links()}}
    </div>
    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>

            Livewire.on('delete',(vacante_id)=>{
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        //eliminar la vacante en el servidor
                        Livewire.emit('eliminarVacante',vacante_id);
                        Swal.fire(
                        'Deleted!',
                        'Your vacancy has been deleted.',
                        'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
