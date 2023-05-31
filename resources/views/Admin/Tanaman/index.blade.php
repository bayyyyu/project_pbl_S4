<x-app>
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-tree bg-c-green"></i>
                    <div class="d-inline">
                        <h5>Penanaman</h5>
                        <span>Halaman Penanaman</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('Admin/Dashboard')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Tanaman</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Tanaman</h5>
                        <a href="{{ url('Admin/Tanaman/create') }}" class="btn btn-inverse btn-mat float-right mr-2"><i
                                class="feather icon-plus"></i> Tambah Tanaman</a>
                    </div>
                    <div class="card-block">
                    <div class=" dt-responsive table-responsive">
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                            <thead>
                                <th width="10px">No</th>
                                <th width="150px">Aksi</th>
                                <th>Sample</th>
                                <th>Lokasi</th>
                                <th width="10">Umur Saat Ditanam</th>
                                <th>Foto</th>
                            </thead>
                            <tbody>
                                 @foreach ($list_tanaman as $tanaman)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="btn-group ml-2">
                                            <div class="row">
                                            <a href="{{ url('Admin/Tanaman', $tanaman->id) }}" class="btn btn-inverse btn-mat"><i
                                                    class="feather icon-info"></i></a>
                                            <a href="{{ url('Admin/Tanaman', $tanaman->id) }}/edit" class="btn btn-warning btn-mat"><i
                                                    class="feather icon-edit"></i></a>
                                            {{-- @include('components.utils.delete', ['url'=> url('Admin/Tanaman', $tanaman->id)]) --}}
                                            <x-button.delete id="{{ $tanaman->id }}" />
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$tanaman->sample}}</td>
                                    <td>{{$tanaman->lokasi}}</td>
                                    <td>{{$tanaman->umur_tanaman}}</td>
                                    <td><a href="{{ url('Admin/Tanaman', $tanaman->id) }}"><img src="{{ asset($tanaman->foto)}}" alt=""
                                                style="width:100%; height:80px; object-fit:cover"></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>
