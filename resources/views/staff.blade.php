<x-app-layout>
    <x-slot name="header">
       <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
        <div class="ml-4 mt-2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ __('Staff List') }}

        </h2>
        </div>

        <div class="ml-4 mt-2  ">
             <x-button class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                 {{ __('Create') }}

             </x-button>
        </div>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                             <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    @if($users->count() > 0)
                                      <table class="min-w-full divide-y divide-gray-200">

                                           <thead class="bg-gray-50">
                                             <tr>
                                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                 </th>
                                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Name
                                                 </th>
                                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Email
                                                 </th>
                                             </tr>

                                           </thead>

                                           <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($users as $user)
                                                 <tr>
                                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                     {{ $user->id }}
                                                  </td>
                                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <a href="{{ route('profile.show',$user) }}">{{ $user->name }}</a>
                                                  </td>
                                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $user->email }}
                                                  </td>     
        
                                                  <td>
                                                  <x-button class="relative inline-flex items-center px-3 py-0.5 border border-transparent shadow-sm text-xs font-small rounded-md text-white bg-indigo-400 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                                                        {{ __('Edit') }}

                                                  </x-button>
                                                  </td>

                                                  <td>
                                                  <x-button class="relative inline-flex items-center px-4 py-0.5 border border-transparent shadow-sm text-xs font-small rounded-md text-white bg-indigo-400 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                                                        {{ __('Delete') }}

                                                  </x-button>
                                                  </td>
                                                 </tr>
                                           @endforeach

                                           </tbody>

                                      </table>

                                    @else
                                        <h3>No staff yet.<h3>
                                    @endif
                                  </div>
                                        {{ $users->links() }}
                              </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
