@extends('userLayout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        @isset($posts)
            @forelse ($posts as $item)
            <div class="max-w-sm w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
                </div>
                <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                  <div class="mb-8">
                    <div class="text-gray-900 font-bold text-xl mb-2"> 
                        {{ $item->title }}
                    </div>
                    <p class="text-gray-700 text-base">
                        {{ $item->description }}
                    </p>
                  </div>
                  <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="" alt="Avatar of Jonathan Reinink">
                    <div class="text-sm">
                      <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                      <p class="text-gray-600">Aug 18</p>
                    </div>
                  </div>
                </div>
            </div>
            @empty
                
            @endforelse
        @endisset
    </div>
</div>
@endsection