<div class="modal fade" id="pwd_changed">
    <form method="POST" action="{{ route('administrator.manajemen_admin_pass',$admin->id) }}">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle"></i>&nbsp;Ubah Password Administrator<b id="nm_investor"></b></h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Password Baru(*)</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password Baru" required>
                </div>
                <div class="form-group">
                    <label for="examplenputPassword1">Password Baru(**) </label>
                    <input type="text" class="form-control" name="password_baru" id="password_baru" placeholder="Masukan ulang password baru" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>&nbsp;Ubah</button>
            </div>
        </div>
    </form>
</div>
