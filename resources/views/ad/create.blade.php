<x-layout> 
    <x-slot name='title'>Rapido -{{__('Vende algo interesante')}}</x-slot> 
<div class="container" style="margin:20px; ;">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card"style="padding:20px;">
            <div class="card-header"style="font-size:18px;"> 
              {{__('Nuevo anuncio')}}  
            </div>
            <div class="card-body"> </div>
            @livewire('create-ad')
         </div>
      </div>
   </div>
</div>
</x-layout>