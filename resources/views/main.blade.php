<!DOCTYPE html>

<html lang="en">
    
    <head>
    @include('partials._head')
    </head>
    
    <body>

    @include('partials._nav')    

        <div class="container">

           @include('partials._messages')
           @yield('content')

        </div>
        
    @include('partials._script')    
    
    </body>

</html>
