<?php
include("functions/top.php");
if (!isset($_GET['id'])) {
  
  redirect("./404");

} else {

  $data = $_GET['id'];
}
if (isset($_SESSION['code'])) {
 unset($_SESSION['code']);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active">Student Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
 $sql="SELECT * FROM students WHERE `AdminID` = '$data'";
 $result_set=query($sql);
 $row= mysqli_fetch_array($result_set);

  ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php echo '
                  <img width="85px" height="100px" class="profile-user-img img-circle"
                       src="upload/studentDP/'.$row['Passport'].'"
                       alt="User profile picture">';
                       ?>
                            </div>

                            <h3 class="profile-username text-center">
                                <?php echo $row['SurName']." ".$row['Middle Name']; ?></h3>

                            <a style="color: red;" href="./proedit?id=<?php echo $data ?>">
                                <p class=" text-center">Edit Profile</p>
                            </a>
                            <b>
                                <p class="text-muted text-center">Admission No.: <?php echo $row['AdminID']; ?></p>
                            </b>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Gender.:</b> <a class="float-right"><?php echo $row['Gender']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Class.:</b> <a class="float-right"><?php echo $row['Class']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Dad No.:</b> <a class="float-right"><?php echo $row['Telephone1']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mum No.:</b> <a class="float-right"><?php echo $row['Telephone2']; ?></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> School Last Attended</strong>

                            <p class="text-muted">
                                <?php echo $row['schlst']; ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Residential Address</strong>

                            <p class="text-muted"><?php echo $row['Address 1']; ?></p>

                            <hr>

                            <strong><i class="fas fa-calendar mr-1"></i> Date of Birth:</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">Date: <?php echo $row['Date']; ?></span><br />
                                <span class="tag tag-success">Month: <?php echo $row['Month']; ?></span><br />
                                <span class="tag tag-info">Year: <?php echo $row['Year']; ?></span><br />

                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Date Registered</strong>

                            <p class="text-muted"><?php echo $row['Datereg']; ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Parent Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Admission
                                        Details</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">

                                            <span class="username">
                                                Parent Name.: <a href="#"><?php echo $row['parent']; ?></a>
                                                <a href="#" class="float-right btn-tool"><i
                                                        class="fas fa-times"></i></a>
                                                <p>
                                                    Occupation.: <?php echo $row['occupation']; ?><br />
                                                    Relationship.: <?php echo $row['relation']; ?>
                                                </p>
                                            </span>

                                        </div>

                                    </div>
                                    <!-- /.post -->

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                <?php echo date("d-m-y"); ?>
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-file bg-primary"></i>

                                            <div class="timeline-item">

                                                <h3 class="timeline-header"><a href="#">Admission Letter</a></h3>

                                                <div class="timeline-body">
                                                    Print Admission Letter, Click on the button below.
                                                </div>
                                                <div class="timeline-footer">
                                                    <?php echo'
                            <a target="_blank" href="./admissionletter?id='.$row['AdminID'].'" class="btn btn-primary btn-sm">Print</a>';
                            ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">

                                                <h3 class="timeline-header border-0"><a href="#">QR Code</a>
                                                </h3>
                                                <div class="timeline-footer">
                                                    <?php
                               $data = $row['AdminID'];
                                $pass = str_replace('/', '', $data);
                             echo'

                            <img  src="upload/QRCard/'.$pass.'.png">';
                            ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-card bg-warning"></i>

                                            <div class="timeline-item">

                                                <h3 class="timeline-header"><a href="#">ID Card</a></h3>

                                                <div class="timeline-body">

                                                    <div class="timeline-footer">
                                                        <a target="_blank" href="./atcard-print?id=<?php echo $data ?>"
                                                            class="btn btn-warning btn-flat btn-sm">Print ID Card</a>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->

                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->

                                            <!-- END timeline item -->

                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("include/footer.php"); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
});
</script>
<?php
if (isset($_SESSION['dcer'])) {
 
 echo "<script>$(toastr.error('Student Profile Updated Successfully'));</script>";
 unset($_SESSION['dcer']);
}
?>
</body>

</html>