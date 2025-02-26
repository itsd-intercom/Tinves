@extends('admin.admin_master')
<link rel="stylesheet" href="https://cdn.datatables.net/tabledit/1.2.3/css/dataTables.tableEdit.min.css">
@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Data SPK & DO </h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Admin Details
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<body class="">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ route('pengajuan.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Data</a> <br>

                <h4>Data SPK & DO</h4>
                <a href="/excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                {{-- <table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">NO SPK</th>
                            <th width="10%">Nama Customer</th>
                            <th width="2%">1</th>
                            <th width="2%">2</th>
                            <th width="2%">3</th>
                            <th width="2%">4</th>
                            <th width="2%">5</th>
                            <th width="2%">6</th>
                            <th width="2%">7</th>
                            <th width="2%">8</th>
                            <th width="2%">9</th>
                            <th width="2%">10</th>
                            <th width="2%">11</th>
                            <th width="2%">12</th>
                            <th width="2%">13</th>
                            <th width="2%">14</th>
                            <th width="2%">15</th>
                            <th width="2%">16</th>
                            <th width="2%">17</th>
                            <th width="2%">18</th>
                            <th width="2%">19</th>
                            <th width="2%">20</th>
                            <th width="2%">21</th>
                            <th width="2%">22</th>
                            <th width="2%">23</th>
                            <th width="2%">24</th>
                            <th width="2%">25</th>
                            <th width="2%">26</th>
                            <th width="2%">27</th>
                            <th width="2%">28</th>
                            <th width="2%">29</th>
                            <th width="2%">30</th>
                            <th width="2%">31</th>
                        </tr>
                    </thead> --}}
                    {{-- <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item['spk']['no_spk'] }}</td>
                                <td>{{ $item['leasing']['nama'] }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_pengajuan)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_hasil)) }}</td>
                                <td>{{ $item->hasil }}</td>
                                <td>

                                </td>
                        @endforeach
                    </tbody> --}}
                {{-- </table> --}}
                <table id="" class="table table-bordered responsive  dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NO SPK</th>
                                <th>Nama Customer</th>
                                @for ($day = 1; $day <= 31; $day++)
                                    <th>{{ $day }}</th>
                                @endfor
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->spk->no_spk }}</td>
                                    <td>{{ $item->spk->nama_customer }}</td>
                                    @for ($day = 1; $day <= 31; $day++)
                                        <td style="background-color:
                                            @php
                                                $tgl_pengajuan = \Carbon\Carbon::parse($item->tgl_pengajuan)->format('d');
                                                $tgl_hasil = \Carbon\Carbon::parse($item->tgl_hasil)->format('d');

                                                $leasing_id = $item->leasing->nama;
                                                $background_color = '';

                                                if ($tgl_pengajuan == $day && $leasing_id) {
                                                    $background_color = 'blue';

                                                } elseif ($tgl_hasil == $day && $leasing_id) {
                                                    $background_color = 'yellow';
                                                }
                                                echo $background_color;
                                            @endphp">


                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody> --}}
                        {{-- <thead>
                            <tr>
                                <th>No</th>
                                <th>NO SPK</th>
                                <th>Nama Customer</th>
                                @for ($day = 1; $day <= 31; $day++)
                                    <th>{{ $day }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->spk->no_spk }}</td>
                                    <td>{{ $item->spk->nama_customer }}</td>
                                    @for ($day = 1; $day <= 31; $day++)
                                        <td style="background-color:
                                            @php
                                                $tgl_pengajuan = \Carbon\Carbon::parse($item->tgl_pengajuan)->format('d');
                                                $tgl_hasil = \Carbon\Carbon::parse($item->tgl_hasil)->format('d');
                                                $background_color = '';

                                                if (($tgl_pengajuan == $day && $day <= 31) || ($tgl_hasil == $day && $day <= 31)) {
                                                    $background_color = 'blue'; // Anda dapat menggunakan warna lain jika diperlukan
                                                }

                                                echo $background_color;
                                            @endphp
                                        ">
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody> --}}
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->spk->no_spk }}</td>
                                    <td>{{ $item->spk->nama_customer }}</td>
                                    @for ($day = 1; $day <= 31; $day++)
                                        <td style="background-color:
                                            @php
                                                $tgl_pengajuan = \Carbon\Carbon::parse($item->tgl_pengajuan)->format('d');
                                                $tgl_hasil = \Carbon\Carbon::parse($item->tgl_hasil)->format('d');

                                                $leasing_id = $item->leasing->nama ?? ''; // Mengecek jika ada data leasing

                                                if ($tgl_pengajuan == $day && $leasing_id) {
                                                    $background_color = 'blue';
                                                } elseif ($tgl_hasil == $day && $leasing_id) {
                                                    $background_color = 'yellow';
                                                } else {
                                                    $background_color = ''; // Tambahkan ini jika tidak ada warna latar belakang
                                                }
                                                echo $background_color;
                                            @endphp">
                                            {{-- {{ $leasing_id }}  --}}
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>






                    </table>



            </div>
        </div>
    </div>
</div>
</body>

@endsection
