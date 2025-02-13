<!DOCTYPE html>
<html>
  <head>
  <style>
      #customers {
        font-family: Arial, Helvetica, sans-serif;
        width: 100%;
        margin-top: 1px;
      }

      #customers td,
      #customers th {
        padding: 8px;
        text-transform: capitalize;
      }

      #customers tr{
        background-color: #f2f2f2;
      }
      #customers th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
        background-color: #f2f2f2;
        color: black;
      }
      .kop-surat {
        width: auto;
        margin: 0 auto;
        background-color: #fff;
      }
      table {
        padding: 10px;
        width: 100%;
      }
      .tengah {
        text-align: center;
        line-height: 10px;
      }
    </style>
  </head>
  <body>
    <div class="kop-surat">
      <table>
        <tr>
          <td class="tengah">
            <h3>SEKOLAH MENENGAH KEJURUAN</h3>
            <h2>SMK NEGRI 1 BONTANG</h2>
            <h3>STATUS : TERAKREDITASI A</h3>
            <hr />
            <p>
            Jl. Cipto Mangunkusumo No.02, Gn. Elai, Kec. Bontang Utara, Kota Bontang, Kalimantan Timur 75313
            </p>
            <hr />
          </td>
        </tr>
      </table>
    </div>
    
        <table class="table" id="customers">
          <tr>
              <th>1.</th>
              <th scope="row">NIS</th>
              <th>:</th>
              <td>{{ $data->nis }}</td>
          </tr>   
          <tr>
              <th>2.</th>
              <th scope="row">Nama Lengkap</th>
              <th>:</th>
              <td>{{ $data->nama_lengk }}</td>
          </tr>
          <tr>
              <th>3.</th>
              <th scope="row">Jurusan</th>
              <th>:</th>
              <td>{{ $data->jur_sekolah }}</td>
          </tr>
          <tr>
              <th>5.</th>
              <th scope="row">Nomor Telpon</th>
              <th>:</th>
              <td>{{ $data->nomor_telp }}</td>
          </tr>
          <tr>   
              <th>6.</th> 
              <th scope="row">Alamat Rumah</th>
              <th>:</th>
              <td>{{ $data->alamat_rum }}</td>
          </tr>
          <tr>
              <th>7.</th>
              <th scope="row">Wiraisaha</th>
              <th>:</th>
              <td>{{ $data->wiraisaha }}</td>
          </tr>
          <tr>
              <th>8.</th>
              <th scope="row">Status</th>
              <th>:</th>
              <td>{{ $status_map[$data->status] ?? 'Tidak Diketahui' }}</td>
          </tr>
          <tr>
              <th>9.</th>
              <th scope="row">Nama Perusahaan</th>
              <th>:</th>
              <td>{{ $data->nama_per }}</td>
          </tr>
          <tr>
              <th>10.</th>
              <th scope="row">Nama Tokoh</th>
              <th>:</th>
              <td>{{ $data->nama_tok }}</td>
          </tr>
          <tr>
              <th>11.</th>
              <th scope="row">Lokasi Bekerja</th>
              <th>:</th>
              <td>{{ $data->lok_bekerja }}</td>
          </tr>
          <tr>
              <th>12.</th>
              <th scope="row">Jalur</th>
              <th>:</th>
              <td>{{ $data->status == 2 ? $jalur_map[$data->jalur] ?? 'Tidak Diketahui' : '' }}</td>
          </tr>
          <tr>
              <th>13.</th>
              <th scope="row">Nama Perguruan Tinggi</th>
              <th>:</th>
              <td>{{ $data->nama_perti }}</td>
          </tr>
          <tr>
              <th>14.</th>
              <th scope="row">Jurusan Prodi</th>
              <th>:</th>
              <td>{{ $data->jur_prodi }}</td>
          </tr>
          <tr>
              <th>15.</th>
              <th scope="row">Lokasi Kuliah</th>
              <th>:</th>
              <td>{{ $data->lok_kuliah }}</td>
          </tr>
        </table>

    @php
        // Mapping untuk status
        $status_map = [1 => 'Bekerja', 2 => 'Kuliah', 3 => 'Tidak Ada Kabar'];

        // Mapping untuk jalur (hanya untuk status 2 - Kuliah)
        $jalur_map = [1 => 'PTN', 2 => 'PTS', 3 => 'DINAS'];
    @endphp
  </body>
</html>