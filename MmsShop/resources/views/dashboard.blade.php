<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="relative bg-[#f7f6f9] h-full min-h-screen">
      <div class="flex items-start">
        <nav id="sidebar" class="lg:min-w-[250px] w-max max-lg:min-w-8">
          <div id="sidebar-collapse-menu"
            class="bg-white shadow-lg h-screen fixed top-0 left-0 overflow-auto z-[99] lg:min-w-[250px] lg:w-max max-lg:w-0 max-lg:invisible transition-all duration-500">
            <div class="flex items-center gap-2 pt-6 pb-2 px-4 sticky top-0 bg-white min-h-[64px] z-[100] ">
              <a href="#" class="logo"><i class="fas fa-bullhorn"></i> MmsShop</a>
              <button id="close-sidebar" class="lg:hidden ml-auto">
                <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>

            <div class="py-4 px-4">
              <ul class="space-y-2">
                <li>
                  <a href="javascript:void(0)"
                    class="text-slate-800 text-[15px] font-medium flex items-center cursor-pointer hover:bg-gray-100 rounded-md px-3 py-2.5 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                      viewBox="0 0 24 24">
                      <path
                        d="M19.56 23.253H4.44a4.051 4.051 0 0 1-4.05-4.05v-9.115c0-1.317.648-2.56 1.728-3.315l7.56-5.292a4.062 4.062 0 0 1 4.644 0l7.56 5.292a4.056 4.056 0 0 1 1.728 3.315v9.115a4.051 4.051 0 0 1-4.05 4.05zM12 2.366a2.45 2.45 0 0 0-1.393.443l-7.56 5.292a2.433 2.433 0 0 0-1.037 1.987v9.115c0 1.34 1.09 2.43 2.43 2.43h15.12c1.34 0 2.43-1.09 2.43-2.43v-9.115c0-.788-.389-1.533-1.037-1.987l-7.56-5.292A2.438 2.438 0 0 0 12 2.377z"
                        data-original="#000000" />
                      <path
                        d="M16.32 23.253H7.68a.816.816 0 0 1-.81-.81v-5.4c0-2.83 2.3-5.13 5.13-5.13s5.13 2.3 5.13 5.13v5.4c0 .443-.367.81-.81.81zm-7.83-1.62h7.02v-4.59c0-1.933-1.577-3.51-3.51-3.51s-3.51 1.577-3.51 3.51z"
                        data-original="#000000" />
                    </svg>
                    <span class="overflow-hidden text-ellipsis whitespace-nowrap">Dashboard</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                      class="arrowIcon w-3 fill-current -rotate-90 ml-auto transition-all duration-500"
                      viewBox="0 0 451.847 451.847">
                    </svg>
                  </a>
                <li>
                  <a href="javascript:void(0)"
                    class="text-slate-800 text-[15px] font-medium flex items-center cursor-pointer hover:bg-gray-100 rounded-md px-3 py-2.5 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                      viewBox="0 0 24 24">
                      <path
                        d="M18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4H6c-2.206 0-4-1.794-4-4V6c0-2.206 1.794-4 4-4zm0-2H6a6 6 0 0 0-6 6v12a6 6 0 0 0 6 6h12a6 6 0 0 0 6-6V6a6 6 0 0 0-6-6z"
                        data-original="#000000" />
                      <path d="M12 18a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v10a1 1 0 0 1-1 1z" data-original="#000000" />
                      <path d="M6 12a1 1 0 0 1 1-1h10a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1z" data-original="#000000" />
                    </svg>
                    <span class="overflow-hidden text-ellipsis whitespace-nowrap">Posts</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                      class="arrowIcon w-3 fill-current -rotate-90 ml-auto transition-all duration-500"
                      viewBox="0 0 451.847 451.847">
                      <path
                        d="M225.923 354.706c-8.098 0-16.195-3.092-22.369-9.263L9.27 151.157c-12.359-12.359-12.359-32.397 0-44.751 12.354-12.354 32.388-12.354 44.748 0l171.905 171.915 171.906-171.909c12.359-12.354 32.391-12.354 44.744 0 12.365 12.354 12.365 32.392 0 44.751L248.292 345.449c-6.177 6.172-14.274 9.257-22.369 9.257z"
                        data-original="#000000" />
                    </svg>
                  </a>
                  <ul class="sub menu max-h-0 overflow-hidden transition-[max-height] duration-500 ease-in-out ml-8">
                    <li>
                      <a href="{{ route('ads.create') }}"
                        class="text-slate-800 text-[15px] font-medium block cursor-pointer hover:bg-gray-100 rounded-md px-3 py-2 transition-all duration-300">
                        <span>Ajouter Annonce</span>
                      </a>
                    </li>
  
                  </ul>

                 
                </li>

                <li>
                  <a href="javascript:void(0)"
                    class="text-slate-800 text-[15px] font-medium flex items-center cursor-pointer hover:bg-gray-100 rounded-md px-3 py-2.5 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                      viewBox="0 0 25 25">
                      <g data-name="Action Expand">
                        <path
                          d="M21.5 1.25h-18A2.25 2.25 0 0 0 1.25 3.5v18a2.25 2.25 0 0 0 2.25 2.25h18a2.25 2.25 0 0 0 2.25-2.25v-18a2.25 2.25 0 0 0-2.25-2.25zm.75 20.25a.75.75 0 0 1-.75.75h-18a.75.75 0 0 1-.75-.75v-18a.75.75 0 0 1 .75-.75h18a.75.75 0 0 1 .75.75z"
                          data-original="#000000" />
                        <path d="M11.75 7.25h1.5v10.5h-1.5z" data-original="#000000" />
                        <path d="M7.25 11.75h10.5v1.5H7.25z" data-original="#000000" />
                      </g>
                    </svg>
                    <span class="overflow-hidden text-ellipsis whitespace-nowrap">Actions</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                      class="arrowIcon w-3 fill-current -rotate-90 ml-auto transition-all duration-500"
                      viewBox="0 0 451.847 451.847">
                      <path
                        d="M225.923 354.706c-8.098 0-16.195-3.092-22.369-9.263L9.27 151.157c-12.359-12.359-12.359-32.397 0-44.751 12.354-12.354 32.388-12.354 44.748 0l171.905 171.915 171.906-171.909c12.359-12.354 32.391-12.354 44.744 0 12.365 12.354 12.365 32.392 0 44.751L248.292 345.449c-6.177 6.172-14.274 9.257-22.369 9.257z"
                        data-original="#000000" />
                    </svg>
                  </a>
                  <ul class="sub menu max-h-0 overflow-hidden transition-[max-height] duration-500 ease-in-out ml-8">
                    <li>
                      <a href="{{ route('profile.edit') }}"
                        class="text-slate-800 text-[15px] font-medium block cursor-pointer hover:bg-gray-100 rounded-md px-3 py-2 transition-all duration-300">
                        <span>Profile</span>
                      </a>
                    </li>
                    <li>
                   <form method="POST" action="{{ route('logout') }}">
                        @csrf
                     <button type="submit" class="text-[15px] text-slate-800 font-medium cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 w-full">
                        Logout
                      </button>
                    </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <button id="open-sidebar" class="lg:hidden ml-4 mt-4 fixed top-0 left-0 bg-white z-[50]">
          <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
        </button>

        <section class="main-content w-full px-6">
          <header class="z-50 bg-[#f7f6f9] sticky top-0 pt-4">
            <div
              class="flex flex-wrap items-center px-6 py-2 bg-white shadow-md min-h-[56px] rounded-md w-full relative tracking-wide">
              <div class="flex items-center flex-wrap gap-x-8 gap-y-4 z-50 w-full">
              
<!--/************************************* */ -->
             <div class="search-bar">
            <form action="{{route('dashboard')}}" method="GET" style="margin-bottom: 20px;">
                <input type="text" name="search" placeholder="Categories,Produits..."  value="{{ request('search') }}">
                <button type="submit"
              class="px-6 py-2.5 rounded-full cursor-pointer text-white text-sm tracking-wider font-medium border-0 outline-0 bg-blue-700 hover:bg-blue-800">chercher</button>
             </form>
             </div>
             <!-- /************************************** */ -->
                <div class="flex items-center gap-8 ml-auto">
                  <div class="flex items-center space-x-6">
               
                  </div>
<!-- /************************************************************************************************************************ */ -->
                  <div class="dropdown-menu relative flex shrink-0 group cursor-pointer">
                      <h3 class="text-xl font-semibold text-slate-800">
                      Bonjour, {{ auth()->user()->login }} 
                    </h3>
                    <div
                      class="dropdown-content hidden group-hover:block shadow-md p-2 bg-white rounded-md absolute top-9 right-0 w-56">
                      <div class="w-full">
                        <a href="{{ route('profile.edit') }}"
                          class="text-[15px] text-slate-800 font-medium cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-3 fill-current" viewBox="0 0 512 512">
                            <path
                              d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
                              data-original="#000000"></path>
                          </svg>
                          Account</a>
                        <hr class="my-2 -mx-2 border-gray-200" />

                       
                        <a href="javascript:void(0)"
                          class="text-[15px] text-slate-800 font-medium cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-3 fill-current" viewBox="0 0 24 24">
                            <path
                              d="M18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4H6c-2.206 0-4-1.794-4-4V6c0-2.206 1.794-4 4-4zm0-2H6a6 6 0 0 0-6 6v12a6 6 0 0 0 6 6h12a6 6 0 0 0 6-6V6a6 6 0 0 0-6-6z"
                              data-original="#000000" />
                            <path d="M12 18a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v10a1 1 0 0 1-1 1z" data-original="#000000" />
                            <path d="M6 12a1 1 0 0 1 1-1h10a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1z" data-original="#000000" />
                          </svg>
                          Posts</a>
                    

                        <form method="POST" action="{{ route('logout') }}" class="text-[15px] text-slate-800 font-medium cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                                @csrf
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-3 fill-current" viewBox="0 0 6 6">    
                          <path d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                              data-original="#000000" />
                          </svg>
                          <button type="submit" class="text-[15px] text-slate-800 font-medium cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 w-full">
                              Logout
                          </button>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </header>

<div class="my-6 px-2">

    {{-- Message succès --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Bouton créer --}}
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-slate-800">Mes annonces</h2>
        <a href="{{ route('ads.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
            + Nouvelle annonce
        </a>
    </div>

    @if($ads->isEmpty())
        <div class="bg-white rounded shadow p-8 text-center text-gray-500">
            <p>Tu n'as pas encore d'annonces.</p>
        </div>
    @else
        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">Photo</th>
                        <th class="px-4 py-3 text-left">Titre</th>
                        <th class="px-4 py-3 text-left">Catégorie</th>
                        <th class="px-4 py-3 text-left">Prix</th>
                        <th class="px-4 py-3 text-left">État</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($ads as $ad)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                @if($ad->photo)
                                    <img src="{{ Storage::url($ad->photo) }}"
                                         class="w-16 h-16 object-cover rounded">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center text-gray-400 text-xs">
                                        No photo
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-medium">{{ $ad->title }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $ad->category }}</td>
                            <td class="px-4 py-3 text-blue-600 font-bold">{{ $ad->price }} €</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded text-xs
                                    {{ $ad->condition === 'new' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $ad->condition === 'good' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $ad->condition === 'used' ? 'bg-red-100 text-red-700' : '' }}">
                                    {{ $ad->condition === 'new' ? 'Neuf' : ($ad->condition === 'good' ? 'Bon état' : 'Occasion') }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('ads.show', $ad) }}"
                                       class="bg-gray-100 text-gray-700 px-3 py-1 rounded hover:bg-gray-200 text-xs">
                                         Voir
                                    </a>
                                    <a href="{{ route('ads.edit', $ad) }}"
                                       class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded hover:bg-yellow-200 text-xs">
                                         Modifier
                                    </a>
                                    <form method="POST" action="{{ route('ads.destroy', $ad) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Supprimer cette annonce ?')"
                                                class="bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200 text-xs">
                                             Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
        </section>
      </div>
    </div>
</body>



<script>
  document.addEventListener('DOMContentLoaded', () => {
      
      document.querySelectorAll('#sidebar ul > li > a').forEach((menu) => {
        menu.addEventListener('click', () => {
          const subMenu = menu.nextElementSibling;
          if (!subMenu) return;
          const arrowIcon = menu.querySelector('.arrowIcon');

          if (subMenu.classList.contains('max-h-0')) {
            subMenu.classList.remove('max-h-0');
            subMenu.classList.add('max-h-[500px]'); 
          } else {
            subMenu.classList.remove('max-h-[500px]');
            subMenu.classList.add('max-h-0');
          }

         
          arrowIcon.classList.toggle('rotate-0');
          arrowIcon.classList.toggle('-rotate-90');
        });
      });

      let sidebarCloseBtn = document.getElementById('close-sidebar');
      let sidebarOpenBtn = document.getElementById('open-sidebar');
      let sidebarCollapseMenu = document.getElementById('sidebar-collapse-menu');

      sidebarOpenBtn.addEventListener('click', () => {
        sidebarCollapseMenu.style.cssText = 'width: 250px; visibility: visible; opacity: 1;';
      });

      sidebarCloseBtn.addEventListener('click', () => {
        sidebarCollapseMenu.style.cssText = 'width: 32px; visibility: hidden; opacity: 0;';
      });
    });
</script>
</html>








