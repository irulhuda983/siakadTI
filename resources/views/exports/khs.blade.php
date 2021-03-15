<style>

</style>
<table>
    <thead>
        <tr>
            <td colspan="7" style="font-size: 14pt; font-weight: bold; text-align: center">UNIVERSITAS NAHDLATUL ULAMA</td>
        </tr>
        <tr>
            <td colspan="7">SUNAN GIRI BOJONEGORO</td>
        </tr>

        <tr>
            <td colspan="7">TERAKREDITASI BAN-PT</td>
        </tr>

        <tr>
            <td colspan="7">Nomor SK : </td>
        </tr>

        <tr>
            <td colspan="7" style="border-top: 1px solid black; border-bottom: 1px solid black">alamat</td>
        </tr>


        <tr>
            <td colspan="4">NAMA : {{ $mahasiswa->nama }}</td>
            <td colspan="3">FAKULTAS :  SAINS DAN TEKNOLOGI</td>
        </tr>

        <tr>
            <td colspan="4">NIM : {{ $mahasiswa->nim }}</td>
            <td colspan="3">PRODI :  {{ $mahasiswa->jurusan }}</td>
        </tr>

        <tr>
            <td colspan="4">SEMESTER : {{ $mahasiswa->semester }}</td>
            <td colspan="3">TA :  {{ $mahasiswa->periode }}</td>
        </tr>

        <tr>
            <th data-toggle="true" rowspan="2">No</th>
            <th colspan="3">PROGRAM</th>
            <th colspan="3">HASIL STUDI</th>
            <th rowspan="2" colspan="2">Keterangan</th>
        </tr>
        <tr>
            <th>Mata Kuliah</th>
            <th>Kode MK</th>
            <th>SKS</th>
            <th>Ns</th>
            <th>Nh</th>
            <th>Ns. SKS</th>
        </tr>
    </thead>
    <tbody>
        <td rowspan="13">
            KODE-MK : Kode Matakuliah <br>
            SKS : Sistem Kredit Semester <br>
            Ns : Nilai Setara <br>
            Nh : Nilai Huruf <br>
            IP : Indeks Prestasi <br>
            IPK : Indeks Prestasi Komulatif <br>
            A = 4.00 : Sangat Baik <br>
            A- = 3.75 <br>
            B+ = 3.50 : Baik <br>
            B = 3.00 <br>
            B- = 2.75 <br>
            C+ = 2.50 : Cukup <br>
            C = 2.00 <br>
            D = 1.00 : Kurang <br>
            E = 0.00 <br>
        </td>
        @foreach ($khs as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_mk }}</td>
                <td>{{ $data->kode_mk }}</td>
                <td>{{ $data->sks }}</td>
                <td>{{ $data->nilai_setara }}</td>
                <td>{{ $data->nilai_huruf }}</td>
                <td>{{ $data->nilai_setara * $data->sks }}</td>
            </tr>

        @endforeach

        <tr>
            <td colspan="3">Jumlah</td>
            <td>{{ $totalSks->jumlah }}</td>
            <td></td>
            <td></td>
            <td>{{ $total->jumlah }}</td>
        </tr>
        <tr>
            <td colspan="3">IP Semester {{ $mahasiswa->semester }}</td>
            <td>{{ $totalSks->jumlah }}</td>
            <td></td>
            <td></td>
            <td>{{ $total->jumlah }}</td>
        </tr>


    </tbody>
</table>