@extends('template')

@section('main')
    <section id="siswa" class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="border-bottom border-dark border-2 text-center pb-3 mb-4" style="margin-top: 2.5em">User</h2>

                @include('_partial.flash_message')

                <div class="table-container">
                    @if (!empty($user_list))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-bottom text-center">No</th>
                                    <th class="border-bottom text-center">Nama</th>
                                    <th class="border-bottom text-center">Email</th>
                                    <th class="border-bottom text-center">Level</th>
                                    <th class="border-bottom text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_list as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->level }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                {{ link_to('user/' . $user->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm me-1']) }}
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
                        <p class="text-center">Tidak ada data user.</p>
                    @endif

                    <div class="text-center">
                        <a href="{{ url('user/create') }}" class="btn btn-primary mb-3">Tambah User</a>
                    </div>
                </div>
    </section>
@endsection

@section('footer')
    @include('footer')
@endsection
