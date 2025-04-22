@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pengajuan Pembuatan Surat</h3>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <table id="pengajuanTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemohon</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuans as $pengajuan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengajuan->user->name }}</td>
                                <td>{{ $pengajuan->jenis_surat }}</td>
                                <td>{{ $pengajuan->created_at->format('d-m-Y') }}</td>
                                <td>
                                    @if($pengajuan->status == 'pending')
                                        <span class="badge badge-warning">Menunggu</span>
                                    @elseif($pengajuan->status == 'approved')
                                        <span class="badge badge-success">Disetujui</span>
                                    @elseif($pengajuan->status == 'rejected')
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.approve.show', $pengajuan->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    @if($pengajuan->status == 'pending')
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#approveModal{{ $pengajuan->id }}">
                                        <i class="fas fa-check"></i> Setujui
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectModal{{ $pengajuan->id }}">
                                        <i class="fas fa-times"></i> Tolak
                                    </button>
                                    @endif
                                </td>
                            </tr>

                            <!-- Modal Approve -->
                            <div class="modal fade" id="approveModal{{ $pengajuan->id }}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="approveModalLabel">Konfirmasi Persetujuan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.approve.approve', $pengajuan->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menyetujui pengajuan surat ini?</p>
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan (opsional)</label>
                                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Setujui</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Reject -->
                            <div class="modal fade" id="rejectModal{{ $pengajuan->id }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rejectModalLabel">Konfirmasi Penolakan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.approve.reject', $pengajuan->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menolak pengajuan surat ini?</p>
                                                <div class="form-group">
                                                    <label for="alasan">Alasan Penolakan <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Tolak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function () {
        $("#pengajuanTable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endpush
@endsection
