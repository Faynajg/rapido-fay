<x-layout>
   <x-slot name='title'>Rapido - Revisor Home</x-slot>
   @if ($ad)
   <div class='container my-5 py-5'>
      <div class='row'>
         <div class='col-12 col-md-8 offset-md-2'>
            <div class="card">
               <div class="card-header">
                {{__('Anuncio')}}  #{{$ad->id}}
               </div>
               <div class="card-body">
               <div class="row">
                 <div class="col-md-3">
                    <b>{{__('Imagenes')}}</b> 
                </div> 
                <div class="col-9"> 
                    <div class="row"> 
                        @forelse ($ad->images as $image) 
                        <div class="row mb-4">
                        <div class="col-md-4"> 
                             <img src="{{$image->getUrl()}}" class="img-fluid" width="300" height="300" alt="...">
                         </div>
                         <div class="col-md-8">
                           <b>Adult :</b> <i class="bi bi-circle-fill {{ $image->adult}}"></i> [{{ $image->adult }}] <br>
                           <b>Spoof :</b> <i class="bi bi-circle-fill {{ $image->spoof}}"></i> [{{ $image->spoof }}] <br>
                           <b>Medical :</b> <i class="bi bi-circle-fill {{ $image->medical}}"></i> [{{ $image->medical }}] <br>
                           <b>Violence :</b> <i class="bi bi-circle-fill {{ $image->violence}}"></i> [{{ $image->violence }}] <br>
                           <b>Racy :</b> <i class="bi bi-circle-fill {{ $image->racy}}"></i> [{{ $image->racy }}] <br><br>


                           <b>Labels</b><br>
                           @forelse ($image->getLabels() as $label)
                           <a href="#" class="btn btn-info btn-sm m-1">{{$label}}</a>
                           @empty
                           No labels
                           @endforelse
                           <br><br>


                               <b>Id: </b> {{ $image->id}} <br>
                               <b>Uri:</b> {{ Storage:: url($image->path) }} <br>
                           
                         </div>
                     </div>
                          @empty 
                          <div class="col-12">
                             <b>{{__('No hay imagenes')}}</b>
                             </div>
                              @endforelse 
                            </div> 
                        </div> 
                    </div> 
                    <hr>
                    <div class="row">
                     <div class="col-md-3">
                        <b>{{__('Usuario')}}</b>
                     </div>
                     <div class="col-md-9">
                        #{{$ad->user->id}} - {{$ad->user->name}} - {{$ad->user->email}}
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3">
                        <b>{{__('Título')}}</b>
                     </div>
                     <div class="col-md-9">
                        {{$ad->title}}
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3">
                        <b>Precio</b>
                     </div>
                     <div class="col-md-9">
                        {{$ad->price}}
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3">
                        <b>Descripción</b>
                     </div>
                     <div class="col-md-9">
                        {{$ad->body}}
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3">
                        <b>Categoría</b>
                     </div>
                     <div class="col-md-9">
                        {{$ad->category->name}}
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3">
                        <b>Fecha de creación</b>
                     </div>
                     <div class="col-md-9">
                        {{$ad->created_at}}
                     </div>
                  </div>
               </div>
            </div>
            <div class="row my-3">
               <div class="col-6">
                  <form action="{{route('revisor.ad.reject',$ad)}}" method="POST">
                     @csrf
                     @method('PATCH')
                     <button type="submit"class="btn btn-danger">Rechazar</button>
                  </form>
               </div>
               <div class="col-6 text-end">
                  <form action="{{route('revisor.ad.accept',$ad)}}" method="POST">
                     @csrf
                     @method('PATCH')
                     <button type="submit"class="btn btn-success">Aceptar</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   @else
   <div class='container my-5 py-5' style="height:62vh;">
   <h3 class="text-center">No hay anuncios para revisar,vuelva más tarde,gracias</h3>
</div>
   @endif
</x-layout>