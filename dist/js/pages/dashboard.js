/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function () {

  $.ajax({
    url:"./db/dashboard_countemp.php",  
    method:"POST",  
    dataType:"json",
    success:function(data){
      console.log(data);
      $('#countemp').html(data.countemp);
    }
  });  

})

$(document).ready(function() {

  var tbl = $('#tbl1').dataTable({
      "processing"  : true,
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'order'       : false,
      'autoWidth'   : false,
      "ajax": {
          "url" : "./db/dashboard_groupjob.php",
          "dataSrc": function (json) {
              var return_data = new Array();
              for(var i=0;i< json.length; i++){
                  return_data.push({
                      'no': json[i].no,
                      'jobtype': json[i].jobtype,
                      'count': json[i].count,
                  })
              }
              return return_data;
          }
      },
      "columns"    : [
        {'data': 'no'},
        {'data': 'jobtype'}, 
        {'data': 'count'},  
      ]
  });      

});