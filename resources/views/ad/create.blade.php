<x-layout> 
    <x-slot name='title'>Rapido -{{__('Vende algo interesante')}}</x-slot> 
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"> 
              {{__('Nuevo anuncio')}}  
            </div>
            <div class="card-body"> </div>
            @livewire('create-ad')
         </div>
      </div>
   </div>
</div>
</x-layout>