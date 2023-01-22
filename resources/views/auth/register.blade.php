<x-layout>
<x-slot name="title">Rapido - Registrar</x-slot> 
<!-- REGISTER    -->
<div class="container-fluid bg-accent" style="height:75vh">
   <div class="row mb-1 pb-1">
      <div class="">
         <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="form-content justify-content-center mb-3 pb-5">
               <!--FORM TITLE --> 
               <div class="section-title">
                  <h3 class="form-title space-around" style="margin-top:30px; margin-bottom:30px;">
                     {{__('Crear cuenta')}}
                     <!-- <span> Rapido.es</span> --> 
                  </h3>
               </div>
               @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error) 
                     <li>{{ $error }}</li>
                     @endforeach 
                  </ul>
               </div>
               @endif
               <!--FORM FIELDS --> 
               <form action="/register" method="POST" role="form" class="form-control" style="padding:30px; width:600px;">
                  @csrf 
                  <!--Name --> 
                  <div class="form-field-edit form-field space-around my-2">
                     <input type="text" name="name" id="name" class="form-control forms_field-input" placeholder="Tu nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars"> 
                     <div class="validate"></div>
                  </div>
                  <!--Email --> 
                  <div class="form-field-edit form-field space-around my-2">
                     <input type="email" name="email" id="email" class="form-control forms_field-input" placeholder="Tu correo" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                     <div class="validate"></div>
                  </div>
                  <!--Password -->
                  <div class="form-field-edit form-field space-around my-2">
                     <input type="password" name="password" id="password" class="form-control forms_field-input" placeholder="Tu contraseña"> 
                     <div class="validate"></div>
                  </div>
                  <!--Password Confirmation --> 
                  <div class="form-field-edit form-field space-around my-2">
                     <input type="password" name="password_confirmation" id="password" class="form-control forms_field-input" placeholder="Repetir contraseña">
                     <div class="validate"></div>
                  </div>
                  <!--Button-Register--> 
                  <button type="submit" class=" form-button-edit text-center space-around my-2  boton-violeta  sin_decoracion">
                  {{__('Crear cuenta')}} </button>
               </form>
            </div>
            <div class="form-link d-flex ">
               <p >{{__('¿Ya eres de los nuestros?')}}</p>
               <a class="text-reset text-decoration-none ps-3" href="{{ route('login')}}"><u><h5>{{__('¡Entra ya!')}}</h5></u></a> 
            </div>
         </div>
      </div>
   </div>
</div> 
</x-layout>