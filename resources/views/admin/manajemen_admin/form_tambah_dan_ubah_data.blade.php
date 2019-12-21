<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('administrator.manajemen_admin_update') }}">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Ubah Data Administrator<b id="nm_investor"></b></h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="hidden" name="id" id="id">
                    <input type="text" class="form-control" name="nm_admin" id="nm_admin" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                    <label for="examplenputPassword1">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp;Ubah</button>
            </div>
        </div>
    </form>
</div>
