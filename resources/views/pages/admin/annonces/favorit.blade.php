@extends("layouts.adminLayout")
@section('title', 'favorit')
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
        @isset($announces)
            @forelse ($announces as $item)
                <tr class="annonce">
                    <td>{{ $item['id'] }}</td>
                    <td class="title"> {{ $item['title'] }} </td>
                    <td>
                        <form onsubmit="return confirm('do you want to delete announce {{  $item['id'] }} from favorits')" action='{{ route('favoris.remove', $item['id']) }}' class="butthons" method='post'>
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('annonces.show', $item["id"]) }}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                          </a>
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