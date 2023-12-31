
<x-main-layout title="Classrooms">
<x-form.alert name="success" class="alert-success"></x-form.alert>
<x-form.alert name="error" class="alert-danger"></x-form.alert>
<div class="container">
        <x-search />
    <br>
    <h2>{!! __('Classrooms') !!}</h2>
    <ul id="classrooms"></ul>
    <div class="row">

        @foreach ($classrooms as $classroom)
            <div class="col-md-3">
                <x-form.card :classroom="$classroom">
                    <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-sm btn-dark">{{ __('Edit') }}</a>

                    <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger ">{{ __('Delete') }}</button>
                    </form>
                </x-form.card>
            </div>
        @endforeach
    </div>
    <br>
   {{--{{ $classrooms->withQueryString()->appends(['v' => 1])->links() }}--}} 
</div>

<a href="{{ route(name: 'classrooms.create', absolute:false)}}" >Create</a>
 @push('script')
 <script>
 fetch('/api/v1/classrooms',)
           .then(res=>res.json)
           .then(json=>{
            let ul=document.getElementById('classrooms');
            for(let i in json.data){
                 ul.innerHTML +=`<li>${json.data[i].name}</li>`

            }    
        
        })  // {{--console.log('@@stack')--}} 
 </script> 
@endpush
</x-main-layout>