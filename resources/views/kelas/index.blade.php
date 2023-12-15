@extends('template')

@section('main')
    <section id="kelas" class="container" style="margin-top: 4em;">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3">Kelas</h2>

        @include('_partial.flash_message')

        @if ($kelas->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <!-- Index Kelas -->
                    <tbody>
                        @foreach ($kelas as $kelas_list)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $kelas_list->nama_kelas }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        {{ link_to('kelas/' . $kelas_list->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm me-1']) }}
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $kelas_list->id }}">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $kelas_list->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <h5 class="modal-title text-center" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p>Pilih opsi yang diinginkan:</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="{{ route('siswa.destroy', $kelas_list->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger me-2"
                                                            data-bs-dismiss="modal">Hapus Siswa</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="{{ route('kelas.destroy', $kelas_list->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus Kelas</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center">Tidak ada data kelas.</p>
        @endif

        <div class="text-center">
            <a href="{{ url('kelas/create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>
        </div>
    </section>
@endsection

@section('footer')
    @include('footer')
@endsection
