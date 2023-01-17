<!DOCTYPE html> 
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Rapido.es - Solicitud De Revisor</title>
   </head>
   <body>
      <div>
         <h1>Un usuario quiere trabajar con nosotros</h1>
         <h2>A continuacion sus datos:</h2>
         <p><b>Nombre:</b> {{$user->name}}</p>
         <p><b>Email:</b> {{$user->email}}</p>
         <p>Si quieres que haga parte de nuestro equipo pulse aqui</p>
         <a href="{{route('revisor.make',$user)}}">Acepta Solicitud</a>
      </div>
   </body>
</html>