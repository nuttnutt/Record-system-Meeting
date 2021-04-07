var chart1, chart2, chart3;
function daily(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            for(var i = 0; i < myObj.length; i++)
            {
                var daily = myObj[i];
                document.getElementById("countout").innerHTML = daily.ccout;
                document.getElementById("countin").innerHTML = daily.ccin;
                document.getElementById("countitems").innerHTML = daily.ccitems;
            }
        }
    };
    xmlhttp.open("GET", "./db/select_dashboard.php", true);
    xmlhttp.send();
}

function barChart(x, y){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            var labels = myObj.map(function(e) {
                return e.dd;
            });

            var co = myObj.map(function(e) {
                return e.ccout;
            });

            var coitems = myObj.map(function(e) {
                return e.ccitemsout;
            });

            //Proportion diagram
            var ctx = document.getElementById('lineChart1').getContext('2d');
            chart1 = new Chart(ctx, {
            type: 'line',
            data: {
                    labels: labels,
                    datasets: [
                        {   
                            label: 'จำนวนใบขอเบิก',
                            data: co,
                            borderColor: "#007bff",
                            backgroundColor: "#007bff",
                            fill: false                       
                        },
                        {   
                            label: 'จำนวนรายการที่ขอเบิก',
                            data: coitems,
                            borderColor: "#28a745",
                            backgroundColor: "#28a745",
                            fill: false                       
                        }
                    ]
                },
                options: {
                    plugins: {
                        datalabels: {
                            backgroundColor: function(context) {
                                return context.dataset.backgroundColor;
                            },
                            borderRadius: 4,
                            color: 'white',
                            font: {
                                weight: 'bold'
                            },
                            formatter: Math.round,
                        }
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display:true
                            },
                            ticks: {
                                reverse: false,
                                
                                
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                reverse: true,
                                beginAtZero: true,
                                autoSkip: true,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display:false
                            }  
                        }]
                    },
                    
                }
            });
        }
    };
    xmlhttp.open("GET", "../../../db/chart/select_outlist.php?ss="+x+"&ee="+y, true);
    xmlhttp.send();    
} 

function barChart2(x, y){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            var labels = myObj.map(function(e) {
                return e.dd;
            });

            var aa = myObj.map(function(e) {
                return e.aa;
            });
            var bb = myObj.map(function(e) {
                return e.bb;
            });
            var cc = myObj.map(function(e) {
                return e.cc;
            });
            var ee = myObj.map(function(e) {
                return e.ee;
            });
            var ff = myObj.map(function(e) {
                return e.ff;
            });
            var gg = myObj.map(function(e) {
                return e.gg;
            });
            var hh = myObj.map(function(e) {
                return e.hh;
            });
            var ii = myObj.map(function(e) {
                return e.ii;
            });
            var jj = myObj.map(function(e) {
                return e.jj;
            });

            //Proportion diagram
            var ctx = document.getElementById('lineChart2').getContext('2d');
            chart2 = new Chart(ctx, {
            type: 'line',
            data: {
                    labels: labels,
                    datasets: [
                        {   
                            label: 'เอี้ยมพลาสติก',
                            data: aa,
                            borderColor: "#CE93D8",
                            backgroundColor: "#CE93D8",
                            fill: false,                      
                        },
                        {   
                            label: 'Surgical Mask',
                            data: bb,
                            borderColor: "#F48FB1",
                            backgroundColor: "#F48FB1",
                            fill: false                       
                        },
                        {   
                            label: 'หมวกตัวหนอน',
                            data: cc,
                            borderColor: "#80CBC4",
                            backgroundColor: "#80CBC4",
                            fill: false                       
                        },
                        {   
                            label: 'เสื้อกันฝน',
                            data: ee,
                            borderColor: "#FFCC80",
                            backgroundColor: "#FFCC80",
                            fill: false                       
                        },
                        {   
                            label: 'face shield (แบบอ่อน)',
                            data: ff,
                            borderColor: "#A5D6A7",
                            backgroundColor: "#A5D6A7",
                            fill: false                       
                        },
                        {   
                            label: 'N95 mask',
                            data: gg,
                            borderColor: "#81D4FA",
                            backgroundColor: "#81D4FA",
                            fill: false                       
                        },
                        {   
                            label: 'เสื้อกันเปื้อนแบบมีแขน',
                            data: hh,
                            borderColor: "#FF8A65",
                            backgroundColor: "#FF8A65",
                            fill: false                       
                        },
                        {   
                            label: 'Isolation Gown',
                            data: ii,
                            borderColor: "#43A047",
                            backgroundColor: "#43A047",
                            fill: false                       
                        },
                        {   
                            label: 'Leg Cover',
                            data: jj,
                            borderColor: "#90A4AE",
                            backgroundColor: "#90A4AE",
                            fill: false                       
                        }
                    ]
                },
                options: {                    
                    plugins: {
                        datalabels: {
                            backgroundColor: function(context) {
                                return context.dataset.backgroundColor;
                            },
                            borderRadius: 4,
                            color: 'white',
                            font: {
                                weight: 'bold'
                            },
                            formatter: Math.round,
                            display: false
                        }
                    },
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                //beginAtZero: false,
                                //max: 1000,  
                                type: 'logarithmic',                        
                            },
                            gridLines: {
                                display:true
                            },
                        }],
                        xAxes: [{
                                ticks: {
                                //reverse: true,
                                beginAtZero: false,
                                autoSkip: true,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display:false
                            },
                        }]
                    }
                }
            });
        }
    };
    xmlhttp.open("GET", "../../../db/chart/select_outlistitems.php?ss="+x+"&ee="+y, true);
    xmlhttp.send();    
} 

function barChart3(x, ss, ee){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            var labels = myObj.map(function(e) {
                return e.dep;
            });
            var total = myObj.map(function(e) {
                return e.total;
            });

            //Proportion diagram
            var ctx = document.getElementById('lineChart3').getContext('2d');
            chart3 = new Chart(ctx, {
            type: 'bar',
            data: {
                    labels: labels,
                    datasets: [
                        {   
                            label: 'จำนวนขอเบิก',
                            data: total,
                            borderColor: "#6610f2",
                            backgroundColor: "#6610f2",
                            fill: false,  
                            datalabels: {
                                align: 'top',
						        anchor: 'start'
                            }          
                        }
                    ]
                },
                options: {
                    plugins: {
                        datalabels: {
                            color: 'white',                            
                            display: function(context) {
                                //return context.dataset.data[context.dataIndex];                                
                                return Number(parseFloat(context.dataset.data[context.dataIndex]).toFixed(2)).toLocaleString('en', {
                                    minimumFractionDigits: 0
                                });
                            },
                            display: true,
                            font: {
                                weight: 'bold'
                            },
                            formatter: Math.round
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
                
            });
        }
    };
    xmlhttp.open("GET", "../../../db/chart/select_byitems.php?items="+x+"&start="+ss+"&end="+ee, true);
    xmlhttp.send();    
} 

$(document).ready(function() {    
    var tbl, tbl2;
    tbl = $('#tbl1').dataTable({
        "processing"  : true,
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "ajax": {
            "url" : "./db/select_topdep.php",
            "dataSrc": function (json) {
                var return_data = new Array();
                for(var i=0;i< json.length; i++){
                    return_data.push({
                        'no': json[i].no,
                        'dep': json[i].dep,
                        'cc': json[i].cc
                    })
                }
                return return_data;
            }
        },
        "columns"    : [
          {'data': 'no'},
          {'data': 'dep'},
          {'data': 'cc'}
        ]
    }); 

    tbl2 = $('#tbl2').dataTable({
        "processing"  : true,
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "ajax": {
            "url" : "./db/select_topitems.php",
            "dataSrc": function (json) {
                var return_data = new Array();
                for(var i=0;i< json.length; i++){
                    return_data.push({
                        'no': json[i].no,
                        'items': json[i].items,
                        'cc': json[i].cc
                    })
                }
                return return_data;
            }
        },
        "columns"    : [
          {'data': 'no'},
          {'data': 'items'},
          {'data': 'cc'}
        ]
    }); 

});