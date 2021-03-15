<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KHS_{{ $mahasiswa->nim }}_{{ $mahasiswa->nama}}_{{$mahasiswa->semester}}</title>
    <style>
        * {
            font-size: 11pt;
        }

        .kolom-khs {
            border: 1px solid black;
            width: 50%;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
            width: 100%;
        }

        .khs tr td, .khs tr th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="kolom-khs">
        <table class="head">
            <tr>
                <td colspan="7" style="font-size: 14pt; font-weight: bold; text-align: center">UNIVERSITAS NAHDLATUL ULAMA</td>
            </tr>
            <tr>
                <td colspan="7" style="font-size: 14pt; font-weight: bold; text-align: center">SUNAN GIRI BOJONEGORO</td>
            </tr>
    
            <tr>
                <td colspan="7" style="font-size: 12pt; font-weight: bold; text-align: center">TERAKREDITASI BAN-PT</td>
            </tr>
    
            <tr>
                <td colspan="7" style="font-size: 12pt; text-align: center">Nomor SK : </td>
            </tr>
    
            <tr>
                <td colspan="7" style="border-top: 1px solid black; border-bottom: 1px solid black; font-size: 10pt; text-align: center">alamat</td>
            </tr>
        </table>
    
        <table class="info-mhs">
            <tr>
                <td colspan="7"><b>KARTU HASIL STUDY ( KHS )</b></td>
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
        </table>
        <table class="khs">
            <thead>
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
                    {{-- <tr rowspan="13">
                        <td>
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
                    </tr> --}}
                    <tr>
                        <td colspan="3" style="text-align: center"><b>Jumlah</b></td>
                        <td><b>{{ $totalSks->jumlah }}</b></td>
                        <td></td>
                        <td></td>
                        <td><b>{{ $total->jumlah }}</b></td>
                    </tr>
        
                    <tr>
                        <td colspan="6" style="text-align: right"><b>IP Semester {{ $mahasiswa->semester }}</b></td>
                        <td><b>{{ number_format(($total->jumlah / $totalSks->jumlah), 2) }}</b></td>
                    </tr>
        
                    <tr>
                        <td colspan="6" style="text-align: right"><b>IPK Sementara</b></td>
                        <td><b>{{ number_format($ipk_sementara, 2) }}</b></td>
                    </tr>
        
        
            </tbody>
        </table>
    </div>
</body>
</html>
