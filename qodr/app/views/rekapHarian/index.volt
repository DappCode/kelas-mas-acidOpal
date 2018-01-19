<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="">
                <a href="#tab_1" data-toggle="tab" aria-expanded="false">Pemasukan</a>
            </li>
            <li class="active">
                <a href="#tab_2" data-toggle="tab">Pengeluaran</a>
            </li>
            <li>
                <a href="#tab_3" data-toggle="tab" aria-expanded="true">RAB</a>
            </li>
            <li>
                <a href="#tab_3" data-toggle="tab">Perkiraan Pemasukkan</a>
            </li <li class="pull-right">
            <a href="#" class="text-muted">
                <i class="fa fa-gear"></i>
            </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="tab_1">
                <b>How to use:</b>

                <p>Exactly like the original bootstrap tabs except you should use the custom wrapper
                    <code>.nav-tabs-custom</code> to achieve this style.</p>
                A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole
                heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls
                like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet
                I feel that I never was a greater artist than now.
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane active" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc,
                Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their
                most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay
                expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and
                more common words. If several languages coalesce, the grammar of the resulting language is more simple and
                regular than that of the individual languages.
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- /.box -->

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Rancangan Anggaran Bulanan</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="data_user" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID</th>
                                                <th>Periode </th>
                                                <th>Nama Barang</th>
                                                <th>Akun ID</th>
                                                <th>Jumlah Barang</th>
                                                <th>Harga Satuan </th>
                                                <th>Satuan Barang ID</th>
                                                <th>Keterangan</th>
                                                <th>Cabang ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listUser">

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>





<script>

    $(document).ready(function () {
        var dataTable = $('#data_user').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "rekapharian/getAjax",
                type: "post",
            }
        });
    });


</script>