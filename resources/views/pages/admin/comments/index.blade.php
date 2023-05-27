@extends("layouts.adminLayout")
@section('title', 'Comments')
@section('content')
<div class="card shadow mb-4">

    <x-section sectionTitle='Favorits' />
    @if(session('message'))
      <div class="alert-danger p-3">
        {{session('message')}}
      </div>
    @endif
    <div class="announces">
        <table class="table">
        @isset($comments)
        <tr>
          <td>Id</td>
          <td>Comment</td>
          <td>Name</td>
          <td>Action</td>
        </tr>
            @forelse ($comments as $item)
                <tr class="annonce">
                    <td>{{ $item->idCom }}</td>
                    <td class="title"> {{ $item->comment }} </td>
                    <td class="title"> {{ $item->user->name }} </td>
                    <td>
                        <form onsubmit="return confirm('do you want to delete comment ==> {{  $item->idCom }} from favorits')" action='{{route("commentAdminD", $item->idCom)}}' class="butthons" method='post'>
                          @csrf
                          @method('DELETE')
                    
                            <button type='submit'> <i class="fa-solid fa-trash" style="color:#d13649;"></i> </button>
                            </ul>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td> there is no annonce yet! </td>
            </tr>
            @endforelse
        @endisset
    </table>
    </div>
</div>
@endsection