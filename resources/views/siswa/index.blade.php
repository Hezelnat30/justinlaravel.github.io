@extends('template')

@section('main')
    <section id="siswa" class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="border-bottom border-dark border-2 text-center pb-3 mb-4" style="margin-top: 2.5em">Siswa</h2>

                @include('_partial.flash_message')

                @include('siswa.form_pencarian')

                <div class="table-container">
                    @if (!empty($siswa_list))
                        <table class="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-bottom text-center">NISN</th>
                                        <th class="border-bottom text-center">Nama</th>
                                        <th class="border-bottom text-center">Kelas</th>
                                        <th class="border-bottom text-center">Tanggal Lahir</th>
                                        <th class="border-bottom text-center">Jenis Kelamin</th>
                                        <th class="border-bottom text-center">No.Telepon</th>
                                        <th class="border-bottom text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa_list as $siswa)
                                        <tr>
                                            <td class="text-center">{{ $siswa->nisn }}</td>
                                            <td class="text-center">{{ $siswa->nama_siswa }}</td>
                                            <td class="text-center">{{ $siswa->kelas->nama_kelas }}</td>
                                            <td class="text-center">
                                                {{ Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}
                                            </td>
                                            <td class="text-center">{{ $siswa->jenis_kelamin }}</td>
                                            <td class="text-center">{{ $siswa->telepon->nomor_telepon ?? '-' }}</td>
                                            <td class="text-center">
                                                <div class="action-column">
                                                    {{ link_to('siswa/' . $siswa->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
                                                    @auth
                                                        {{ link_to('siswa/' . $siswa->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}

                                                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                                                            style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    @endauth
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </table>

                        <div class="mt-1">
                            {!! $siswa_list->appends(request()->query())->links('pagination::bootstrap-5', ['onEachSide' => 0, 'disable_current_page' => true]) !!}
                        </div>
                    @else
                        <p>Tidak ada data siswa.</p>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Jumlah Siswa : {{ $jumlah_siswa }}</strong>
                    </div>
                    @auth
                        <div class="col-md-6 text-md-end">
                            <a href="siswa/create" class="btn btn-primary">Tambah Siswa</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('footer')
@endsection
