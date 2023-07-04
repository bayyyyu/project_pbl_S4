<x-app>
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-leaf bg-c-green"></i>
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
                        <li class="breadcrumb-item"><a href="">Penanaman</a> </li>
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
                        <h5>Data Penanaman</h5>
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
                                <th width="10">Status Penanaman</th>
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
                                    <td>
                                        <span data-url="{{ url('Admin/Tanaman', $tanaman->id) }}" id="statusPenanaman_{{ $tanaman->id }}" data-original-value="{{ $tanaman->status_penanaman }}">{{ $tanaman->status_penanaman }}</span>
                                        <a onclick="editStatusPenanaman({{ $tanaman->id }})"><i class="feather icon-edit" style="float: right; margin-top:8px"></i></a>
                                    </td>
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

    <script>
        function editStatusPenanaman(tanamanId) {
            var spanStatusPenanaman = document.getElementById('statusPenanaman_' + tanamanId);
            var currentStatusPenanaman = spanStatusPenanaman.textContent;
            var actionUrl = spanStatusPenanaman.dataset.url;

            var formHTML = `
            <form action="${actionUrl}" method="post">
                @csrf
                @method('PUT')
                <select name="status_penanaman" onchange="showButton(this)" data-tanaman-id="${currentStatusPenanaman}" data-original-value="${currentStatusPenanaman}">
                    <option value="baru ditanam" ${currentStatusPenanaman === 'baru ditanam' ? 'selected' : ''}>Baru Ditanam</option>
                    <option value="hidup" ${currentStatusPenanaman === 'hidup' ? 'selected' : ''}>Hidup</option>
                    <option value="mati" ${currentStatusPenanaman === 'mati' ? 'selected' : ''}>Mati</option>
                </select>
                <br>
                <div class="button-group pull-right">
                    <a href="#" class="btn btn-sm btn-mat" onclick="cancelEditStatusPenanaman(event, ${tanamanId})" style="display: inline-block; margin-top: 10px; border-radius: 5px; border: 1px solid rgb(185, 0, 0); padding: 5px 10px;">Batal</a>
                    <button class="btn btn-sm" type="submit" style="display: inline-block; margin-top: 10px; border-radius: 5px; border: 1px solid rgb(0, 172, 66); padding: 5px 10px;"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
            `;

            spanStatusPenanaman.innerHTML = formHTML;
        }

        function cancelEditStatusPenanaman(event, tanamanId) {
            event.preventDefault();

            var spanStatusPenanaman = document.getElementById('statusPenanaman_' + tanamanId);
            var originalValue = spanStatusPenanaman.dataset.originalValue;

            spanStatusPenanaman.textContent = originalValue;

            var editLink = document.createElement('a');
            editLink.onclick = function() {
                editStatusPenanaman(tanamanId);
            };
            editLink.innerHTML = '<i class="feather icon-edit" style="float: right; margin-top:8px"></i>';

            // Hapus tombol Simpan dan Batal
            var btnSave = spanStatusPenanaman.nextSibling;
            var btnCancel = btnSave.nextSibling;
            btnSave.parentNode.removeChild(btnSave);
            btnCancel.parentNode.removeChild(btnCancel);

            // Tambahkan tombol Edit kembali
            spanStatusPenanaman.parentNode.appendChild(editLink);
        }
    </script>
</x-app>
