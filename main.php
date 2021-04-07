<!-- DataTables -->
<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="./dist/js/bootstrap-datepicker.css">
<!-- Content Wrapper. Contains page content -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./dist/css/style.css">
<!-- font css -->

<div class="content-wrapper bg-red">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="card">
            <div class="card-header bg-purple">
              <div class="card-title ">
                <h3 class="font-effect-shadow-multiple">บันทึกรายงานการประชุม</h3>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="tbl2" class="table table-hover">
                <thead>
                  <tr class="bg-purple">
                    <th>ลำดับ</th>
                    <th>วันที่ประชุม</th>
                    <th>หัวข้อการประชุม</th>
                    <th>หน่วยงาน</th>
                    <th>สถานที่</th>
                    <th>*</th>
                  </tr>
                </thead>
                <tbody id="datalist2"></tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <!-- AREA CHART -->
        <div class="card card-primary">
          <div class="card-header bg-purple">
            <h3 class="font-effect-shadow-multiple">การใช้งานห้องประชุม</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>



    <div class="row">

      <div class="col-lg-6 col-12">
        <div class="card">
          <div class="card-header bg-purple">
            <h3 class="font-effect-shadow-multiple">อัตราการการใช้ห้องประชุม</h3>
          </div>
          <div class="card-body">
            <div class="row">

              <div class="col-lg-5 col-12">
                <div class="form-group">
                  <label>ระหว่างวันที่</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="dateC2start" id="datepickerC2start" class="form-control" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-12">
                <div class="form-group">
                  <label>ถึงวันที่</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="dateC2end" id="datepickerC2end" class="form-control" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-12">
                <div class="form-group">
                  <label>&nbsp;</label>
                  <div class="input-group">
                    <button type="button" class="btn btn-outline-success">แสดง</button>
                  </div>
                </div>
              </div>

            </div>
            <canvas id="lineChart1" style="height:250px"></canvas>
          </div>
        </div>
      </div>


    </div>

</div><!-- /.container-fluid -->

</section>
<!-- /.content -->
</div>

<!-- jQuery -->
<script src="./plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./plugins/jquery-ui/jquery-ui.js"></script>
<!-- DataTables -->
<script src="./plugins/datatables/jquery.dataTables.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<script src="./dist/js/pages/main.js"></script>
<!-- ChartJS -->
<script src="./dist/chartjs/dist/Chart.js"></script>
<script src="./dist/chartjs/dist/chartjs-plugin-datalabels.js"></script>
<!-- bootstrap datepicker -->
<script src="./dist/js/bootstrap-datepicker-custom.js"></script>
<script src="./dist/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<!-- SweetAlert2 -->
<script src="./plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="./dist/jQueryPrintPage/jquery.printPage.js"></script>


<script>
  $(document).ready(function() {
    var tb2;
    tb2 = $('#tbl2').dataTable({
      "processing": true,
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "ajax": {
        "url": "./db/mmdata.php",
        "dataSrc": function(json) {
          var return_data = new Array();
          for (var i = 0; i < json.length; i++) {
            return_data.push({
              'no': json[i].no,
              'datec1start': json[i].datec1start,
              'title': json[i].title,
              'equisysdep_name': json[i].equisysdep_name,
              'loc': json[i].loc,
              'link': json[i].link

            })
          }
          return return_data;
        }
      },
      "columns": [{
          'data': 'no'
        },
        {
          'data': 'datec1start'
        },
        {
          'data': 'title'
        },
        {
          'data': 'equisysdep_name'
        },
        {
          'data': 'loc'
        },
        {
          'data': 'link'
        }
      ]
    });

  });

  function getdata() {
    tb2.api().ajax.url('./db/mmdata.php').load();
  }
</script>


<script>
  $(function() {

    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [28, 48, 40, 19, 38, 27, 10]
      }]
    }

    var areaChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          gridLines: {
            display: false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })
  })
</script>


<script>
  $(document).ready(function() {
    $(function() {
      var selitems = $('#selitems').val();
      var x = $('#datepicker1').val();
      var y = $('#datepicker2').val();
      barChart3(selitems, x, y);
      barChart(x, y);
      barChart2(x, y);
    });

    $('#selitems').change(function() {
      var selitems = $('#selitems').val();
      var x = $('#datepicker1').val();
      var y = $('#datepicker2').val();
      chart3.destroy();
      barChart3(selitems, x, y);
    });

    $(document).on('click', '.btnshow', function() {
      var selitems = $('#selitems').val();
      var x = $('#datepicker1').val();
      var y = $('#datepicker2').val();
      chart3.destroy();
      barChart3(selitems, x, y);
    });

    $(document).on('click', '.btnshowC1', function() {
      var x = $('#datepickerC1start').val();
      var y = $('#datepickerC1end').val();
      chart1.destroy();
      barChart(x, y);
    });

    $(document).on('click', '.btnshowC2', function() {
      var x = $('#datepickerC2start').val();
      var y = $('#datepickerC2end').val();
      chart2.destroy();
      barChart2(x, y);
    });

    var today = new Date();
    var dd = today.getDate() - 1;
    var mm = today.getMonth() + 1;
    var yy = today.getFullYear();

    var start = "01/" + mm + "/" + yy;
    var end = dd + "/" + mm + "/" + yy;

    //Date picker
    $('#datepickerC2start').datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: true,
      language: 'th', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
      thaiyear: true, //Set เป็นปี พ.ศ.
      autoclose: true
    }).datepicker("setDate", start);

    //Date picker
    $('#datepickerC2end').datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: true,
      language: 'th', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
      thaiyear: true, //Set เป็นปี พ.ศ.
      autoclose: true
    }).datepicker("setDate", end);



  });
</script>