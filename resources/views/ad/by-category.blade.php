<x-layout>
   <x-slot name='title'> </x -slot> 
   <div class="container">
      <div class="row">
         <div class="col-12">
            <h1 style="margin-top:20px; margin-bottom:30px;">{{__('Anuncios por categoría')}} : {{__($category->name)}} </h1>
         </div>
      </div>
      <div class="row">
         @forelse($ads as $ad)
         <div class="col-12 col-md-4">
            <div class="card mb-5" style="height:650px">
            @if ($ad->images()->count() > 0)
               <img src=" {{!$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl() : 'https://via.placeholder.com/150' }}" class="card-img-top" width="300" height="300" alt="...">
               @endif
               <div class="card-body">
                  <h5 class="card-title"> {{$ad->title}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$ad->price}}</h6>
                  <p class="card-text"> {{$ad->body}}</p>
                  <div class="card-subtitle mb-2"> 
                     <strong>
                        <a href="{{route('category.ads',$ad->category)}}">#{{__($ad->category->name)}}</a></strong>
                     <i>{{$ad->created_at->format('d/m/Y')}}</i>
                  </div>
                  <div class="card-subtitle mb-2"> 
                     <small>{{ $ad->user->name }}</small> 
                  </div>
                  <a href="{{route('ads.show', $ad)}}">{{__('Mostrar Más')}}</a>
               </div>
            </div>
         </div>
         {{$ads->links()}}
         @empty
         <div class="col-12">
            <h2>{{__('Uyy.. parece que no hay nada de esta categoria')}}</h2>
            <a href="{{$ads->links()}}" class="btn btn-danger">{{__('Fragmento')}}</a> o  
            <a href="{{route('ads.create')}}" class="btn btn-success">{{__('Vende tu primer objeto')}}</a> o 
            <a href="{{route('home')}}" class="btn btn-primary">{{__('Vuelve a la home')}} </a>
         </div>
         @endforelse
      </div>
   </div>
</x-layout>