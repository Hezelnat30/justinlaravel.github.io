@extends('template')

@section('main')
    <div id="hobi" class="container mb-3" style="margin-top: 4em">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3">Hobi</h2>

        @include('_partial.flash_message')
        <div class="table-container">
            @if ($hobi_list->isNotEmpty())
                <table class="table mx-auto">
                    <thead>
                        <tr>
                            <th class="border-bottom text-center">No</th>
                            <th class="border-bottom text-center">Hobi</th>
                            <th class="border-bottom text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hobi_list as $hobi)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $hobi->nama_hobi }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        {{ link_to('hobi/' . $hobi->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm me-1']) }}
                                        <form action="{{ route('hobi.destroy', $hobi->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Tidak ada data hobi.</p>
            @endif
        </div>

        <div class="mt-2 text-center">
            <a href="{{ url('hobi/create') }}" class="btn btn-primary">Tambah Hobi</a>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
