<x-layout>
   <x-slot name="title">Rapido - Login</x-slot>
   <!--FORM LOGIN    -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 col-md-6 offset-md-3">
            <!--FORM TITLE --> 
            <h2 class="form-title space-around">Iniciar sesion</h2>
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
            <form action="/login" method="POST" role="form" class="form-control">
               @csrf 
               <!-- Email --> 
               <div class="space-around my-2">
                  <input type="email" name="email" id="email" class="form-control  forms_field-input" 
                     placeholder="Tu correo" data-rule="minlen:4" data-msg="Please 
                     enter at least 4 chars">
                  <div class="validate"></div>
               </div>
               <!--Password --> 
               <div class=" space-around my-2">
                  <input type="password" name="password" id="password" class="form-control forms_field-input" placeholder="Tu contraseña"> 
                  <div class="validate"></div>
               </div>
               <!--Button-Login--> 
               <button type="submit" class="btn btn-info"> Entrar </button>
            </form>
            <p class="my-3">¿ya no eres de los nuestros? <a class="btn btn-info b tn-sm ms-2" href="{{route('register')}}">iRegistrate!</a> </p>
         </div>
      </div>
   </div>
</x-layout>