  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Booking
        <small>Daftar Booking</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Berita</a></li>
        <li class="active">Semua Berita</li>
      </ol>
    </section>
  <!-- Main content -->
    <section class="content">
      <?php if ($this->uri->segment(3) == "Success"){ ?>
        <div class="alert alert-success" role="alert">
          Berita berhasil diposting, silahkan cek pada daftar berita dibawah ini.
        </div>
      <?php }else if($this->uri->segment(3) == "Update"){ ?>
        <div class="alert alert-success" role="alert">
          Berita berhasil diedit, silahkan cek pada daftar berita dibawah ini.
        </div>
      <?php }else if($this->uri->segment(3) == "Delete"){ ?>
        <div class="alert alert-danger" role="alert">
          Berita telah dihapus, silahkan cek pada daftar berita dibawah ini.
        </div>
      <?php } ?>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            <h3 class="box-title">Daftar Booking</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="dt" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Tipe Ruangan</th>
                    <th>No. Ruangan</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Nama Tamu</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $i=1;foreach($all as $row){
                 ?>
                <tr >
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['booking_room_type']; ?></td>
                    <td><?php echo $row['booking_room_number']; ?></td>
                    <td><?php echo $row['booking_checkin']; ?></td>
                    <td><?php echo $row['booking_checkout']; ?></td>
                    <td><?php echo $row['booking_name']; ?></td>
                    <td><?php echo $row['booking_email']; ?></td>
                    <td><?php echo $row['booking_phone']; ?></td>
                    <td>
                      <button type="button" class="btn btn-sm bg-orange" onclick="location.href='<?php echo base_url();?>admin/editNews/<?php echo $row['booking_id'] ?>'"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-sm bg-red" onclick="location.href='<?php echo base_url();?>admin/deleteNews/<?php echo $row['booking_id'] ?>'"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Tipe Ruangan</th>
                  <th>No. Ruangan</th>
                  <th>Check-in</th>
                  <th>Check-out</th>
                  <th>Nama Tamu</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
