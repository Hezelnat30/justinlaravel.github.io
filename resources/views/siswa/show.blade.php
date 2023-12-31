@extends('template')

@section('main')
    <div id="siswa" class="container" style="margin-top: 4em">
        <h2 class="border-bottom border-dark border-2 text-center p-3 mb-3">Detail Siswa</h2>

        <table class="table table-striped mt-4">
            <tr>
                <th>NISN</th>
                <td>{{ $siswa->nisn }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $siswa->nama_siswa }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $siswa->kelas->nama_kelas }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $siswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>No.Telepon</th>
                <td>{{ $siswa->telepon->nomor_telepon ?? '-' }}</td>
            </tr>
            <tr>
                <th>Hobi</th>
                <td>
                    @foreach ($siswa->hobi as $item)
                        {{ $item->nama_hobi }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Foto</th>
                <td>
                    @if ($siswa->foto && $siswa->foto !== 'dummy.jpg')
                        <img src="{{ asset('fotoupload/' . $siswa->foto) }}" alt="Foto Siswa"
                            style="width:175px; height:175px;" class="img-thumbnail img-fluid rounded-circle">
                    @else
                        @if ($siswa->jenis_kelamin == 'L')
                            <img src="{{ asset('fotoupload/dummymale.jpg') }}" alt="Foto Dummy Male"
                                style="width:175px; height:175px;" class="img-thumbnail img-fluid rounded-circle">
                        @else
                            <img src="{{ asset('fotoupload/dummyfemale.jpg') }}" alt="Foto Dummy Female"
                                style="width:175px; height:175px;" class="img-thumbnail img-fluid rounded-circle">
                        @endif
                    @endif
                </td>
            </tr>
        </table>
    </div>
@stop

@section('footer')
    @include('footer')
@stop
