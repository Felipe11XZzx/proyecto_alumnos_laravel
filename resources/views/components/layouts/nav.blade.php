<nav class="h-10v bg-nav flex flex-row justify-start justify-center items-center px-4">
    
 <a href="{{route('main')}}"class="bg-#90B2CA-500 text-white py-2 px-2 rounded hover:bg-#D5E9DE-600 
    focus:outline-none focus:ring-2 focus:ring-orange-200 btn btn-sm btn-outline p-2 rounded mr-4"> Home</a>
    <button class="bg-#90B2CA-500 text-white py-2 px-2 rounded hover:bg-orange-600 
    focus:outline-none focus:ring-2 focus:ring-orange-200 btn btn-sm btn-outline p-2 rounded mr-4"> About</button>
    <button class="bg-#90B2CA-500 text-white py-2 px-2 rounded hover:bg-orange-600 
    focus:outline-none focus:ring-2 focus:ring-orange-200 btn btn-sm btn-outline p-2 rounded mr-4"> Contact</button>
    <button class="bg-#90B2CA-500 text-white py-2 px-2 rounded hover:bg-orange-600 
    focus:outline-none focus:ring-2 focus:ring-orange-200 btn btn-sm btn-outline p-2 rounded "> Noticias</button>
    
@auth
    <a href="{{route('alumnos.index')}}" class=" mx-4 bg-#90B2CA-500 text-white py-2 px-2 
    rounded hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-200 btn btn-sm btn-outline p-2 rounded "> Alumnos</a>

@endauth
</nav>