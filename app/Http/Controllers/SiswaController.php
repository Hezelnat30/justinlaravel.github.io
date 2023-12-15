<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Telepon;
use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    //Method Index
    public function index()
    {
        $halaman = 'siswa';
        $siswa = Siswa::orderBy('nisn', 'asc')->Paginate(5);
        $jumlah_siswa = $siswa->total();
        return view('siswa.index', [
            'halaman' => $halaman,
            'siswa_list' => $siswa,
            'jumlah_siswa' => $jumlah_siswa
        ]);
    }

    // Method Create
    public function create()
    {
        $halaman = 'siswa';
        $tanggal_lahir_default = now();
        $siswa = new Siswa; // Inisialisasi objek siswa untuk menghindari undefined variable
        return view('siswa.create', [
            'halaman' => $halaman,
            'tanggal_lahir_default' => $tanggal_lahir_default,
            'siswa' => $siswa, // Mengirimkan objek siswa ke view
        ]);
    }


    // Method Show
    public function show(Siswa $siswa)
    {
        $halaman = 'siswa';
        return view('siswa.show', [
            'halaman' => $halaman,
            'siswa' => $siswa
        ]);
    }

    // Method Store
    public function store(SiswaRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();

            if ($request->file('foto')->isValid()) {
                $foto_name = date('YmdHis') . ".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto'] = $foto_name;
            }
        }
        // Tambahkan siswa
        $siswa = Siswa::create($input);

        // Tambahkan telepon
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        // Tambahkan hobi
        $siswa->hobi()->attach($request->input('hobi_siswa'));

        Session::flash('flash_message', 'Data siswa berhasil disimpan!');

        return redirect('siswa');
    }


    // Method Edit
    public function edit(Siswa $siswa)
    {
        $telepon = $siswa->telepon ?? new Telepon;
        $siswa->nomor_telepon = optional($siswa->telepon)->nomor_telepon;

        return view('siswa.edit', [
            'siswa' => $siswa,
            'telepon' => $telepon,
        ]);
    }

    public function update(SiswaRequest $request, Siswa $siswa)
    {
        // Salin input dari request
        $input = $request->all();

        // Perhatikan apakah ada perubahan pada 'nomor_telepon', jika tidak hapus dari array input
        if ($siswa->telepon && $siswa->telepon->nomor_telepon === $request->input('nomor_telepon')) {
            unset($input['nomor_telepon']);
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();

            if ($request->file('foto')->isValid()) {
                $foto_name = date('YmdHis') . ".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto'] = $foto_name;
            }
        }
        // Update siswa dengan input yang sesuai
        $siswa->update($input);

        $telepon = $siswa->telepon ?? new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        // Pembaruan data hobi
        $siswa->hobi()->sync($request->input('hobi_siswa'));

        Session::flash('flash_message', 'Data siswa berhasil disimpan!');

        return redirect()->route('siswa.show', $siswa);
    }

    // Method Delete
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        Session::flash('flash_message', 'Data Berhasil Dihapus!');
        Session::flash('penting', true);
        return redirect('siswa');
    }

    // Method Cari
    public function cari(Request $request)
    {
        $kata_kunci = trim($request->input('kata_kunci'));
        $jenis_kelamin = $request->input('jenis_kelamin');
        $id_kelas = $request->input('id_kelas');

        // Query
        $query = Siswa::where('nama_siswa', 'LIKE', '%' . $kata_kunci . '%');
        if (!empty($jenis_kelamin)) {
            $query->where('jenis_kelamin', $jenis_kelamin);
        }
        if (!empty($id_kelas)) {
            $query->where('id_kelas', $id_kelas);
        }
        $siswa = $query->paginate(3);

        // Pagination
        $pagination = $siswa->appends([
            'kata_kunci' => $kata_kunci,
            'jenis_kelamin' => $jenis_kelamin,
            'id_kelas' => $id_kelas,
        ]);

        $jumlah_siswa = $siswa->count();

        return view('siswa.index', [
            'siswa_list' => $siswa,
            'kata_kunci' => $kata_kunci,
            'pagination' => $pagination,
            'jumlah_siswa' => $jumlah_siswa,
            'id_kelas' => $id_kelas,
            'jenis_kelamin' => $jenis_kelamin
        ]);
    }


    public function dateMutator(Siswa $siswa)
    {
        $tanggal_lahir = $siswa->tanggal_lahir;

        $str = 'Tanggal Lahir: ' . date('d-m-Y', strtotime($tanggal_lahir)) . '<br>' .
            'Ulang tahun ke-30 akan jatuh pada tanggal: <strong>' .
            date('d-m-Y', strtotime($tanggal_lahir . '+30 years')) .
            '</strong>';

        return $str;
    }
}
