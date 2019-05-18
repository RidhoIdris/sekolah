<!-- The Modal -->
<div class="modal fade" id="modal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" id="formSiswa" action="{{ route('masterSiswa.store')}}">
                <fieldset>
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <input type="text" autocomplete="off" class="form-control" placeholder="Nomor Induk Siswa" name="nis">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" autocomplete="off" class="form-control" placeholder="Nama Siswa" name="nama">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" autocomplete="off" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group col-6">
                        <input type="date" autocomplete="off" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir">
                    </div>
                    <div class="form-group col-4">
                            <select name="agama" class="form-control" id="agama">
                                <option value="">--- Agama ---</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <select name="gol_darah" class="form-control" id="gol_darah">
                                <option value="">--- Gol Darah ---</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                <option value="">--- Jenis Kelamin ---</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    <div class="form-group col-3">
                        <select name="provinsi" class="form-control" id="provinsi">
                            <option value="">--- Pilih Provinsi ---</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <select name="kabupaten" class="form-control" id="kabupaten">
                            <option value="">--- Pilih Kabupaten ---</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <select name="kecamatan" class="form-control" id="kecamatan">
                            <option value="">--- Pilih Kecamatan ---</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <select name="kelurahan" class="form-control" id="kelurahan">
                            <option value="">--- Pilih Kelurahan ---</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <textarea name="alamat" class="form-control" rows="5" id="alamat" placeholder="Alamat"></textarea>
                    </div>

                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-prmary" data-dismiss="modal">Batal</button>
                <button type="submit" id="submit" class="btn btn-danger">Save</button>
            </div>
        </fieldset>
        </form>

        </div>
    </div>
</div>
