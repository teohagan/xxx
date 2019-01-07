<!DOCTYPE html>
<html>
<script src="jqfile.js"></script>
<script src="qd7.js"></script>
<script src="getsthol.js"></script>

<!--<link rel="stylesheet" type="text/css" href="w3mnu.css">-->

<title>check legal deadlines</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
#xstates2p {background-color:white}
#zdiv2a {display:none;background-color:white; width:600px; margin-left:15%}
a {color:#ff606e}
a:hover {color:#00ddd8}
select {font-size:1em; color:#517398; width:300px; border-radius:8px; border-style:solid; border-width:2px3; border-color:#517398; padding-left:10px; margin-bottom:8px}
body, p, input{font-size:1em; font-weight:bold}
p, #outputDiv {color:#26235a;font-weight:bold;padding:0;margin:0;border:0;}
h1 {color:#26235a;font-size:150%}
#dtCalcDisplay{font-weight:normal}
#b1main  {border-radius: 8px; width:400px; color:#517398}
/*#zdiv1, #xstates2p, #zdiv2a {color:white; border-radius: 8px; width:400px}*/
//#zdiv1 p {padding-bottom:8px}
#b2calendar, #b1main, #zdiv1, #zdiv2, #zdiv2a, #zdiv3, #xstates2p {margin-left:15%; width:600px}
#fnlDateDisplay {font-size:125%;background-color:#517398;width:400px;color:white; margin-bottom: 16px}3
/*#zdiv3 {margin-left: 20%; margin-right:0%}
.inputp {color:white;margin-left:6px; margin:8px; border-radius:8px; padding: 4px 4px 10px 20px}*/
.ptext {margin-top: 12px; margin-bottom:6px}
.cmo {color:#517398; background-color:white}
.xhd {color:#262c3a; background-color:white}
th, td {text-align: center;padding-left: 4px; padding-right:4px;width:34px}
#showMo {text-align:center;width:250px; font-size:1.3em}
#tdt {width:120px; border-radius:6px;border-style:solid;border-width:2px;border-color:#517398;padding-left:10px; margin:0}
#tdt {display:none}
/*#xstates, {width:180px; color:#517398; font-weight:bold;font-size:1em}
#xstates2 {width:180px; color:#517398; font-weight:bold;font-size:1em}
#xstates2p {display:inline;background-color:#e8e8e8}*/
#tno {width:40px; border-radius:6px;border-style:solid;border-width:2px;border-color:#517398;color:#517398;padding-left:10px}
#container, #imgdiv {width: 99%;margin:0; padding:0;display:inline}
.xsubmit{border:3px solid gray;border-radius:10px;background-color:#517398;color:#ffffff;width:70px;}
.xsubmit:hover {color:#00ddd8;}
.x2submit{border:3px solid gray;border-radius:10px;background-color:#517398;color:#ffffff;width:120px;}
.x2submit:hover {color:#00ddd8;}
.inputx, xibn .inputxx {width:100px; font-family:'Lucida Sans Unicode';color:#262c3a;background-color:#F8F8F8;max-width:95%;border-style:solid;border-width:3px; border-color:#00ddd8;border-radius:6px;}
.ddx, xibn .inputxx {font-family:'Lucida Sans Unicode';color:#517398;background-color:#f8f8f8;}
.inputxx {width:40px;}
.inputx:hover{background-color:white;}
.lblx {font-family:'Lucida Sans Unicode';font-size:1em;font-weight:bold;color:#517398;border-radius:0px;margin-top:0;margin-bottom:0;padding-bottom:0;}
html, body {height: 100%;width:100%}
span {display:inline;}

#b2calendar {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
#b2calendar-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    width:400px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}


@media screen and (max-width: 460px) {
   
#b2calendar, #b1main, #zdiv1, #zdiv2, #zdiv2a, #zdiv3, #xstates2p {margin-left:0%; width:100%}
}


</style>



<script>
function whyshow () {
$("#zdiv2a").css("display","block");
$("#zdiv2a").css("margin-left","15%");
$("#zdiv2a").css("width","600px");
}
function whyclose() {
$("#zdiv2a").css("display","none");
}
var fhol = "";
var focusDate = new Date();;
var xhol = "";
var shol = "";
//declares array that will be filled with state holidays as reflected in hol.txt
var sa = []
//var bbb = getst();
//alert(bbb);
function showDMYYYY(d) {
    var xm;
    var t = d.getMonth();
    switch (t) {
        case 0:
            xm = "1";
            break;
        case 1:
            xm = "2";
            break;
        case 2:
            xm = "3";
            break;
        case 3:
            xm = "4";
            break;
        case 4:
            xm = "5";
            break;
        case 5:
            xm = "6";
            break;
        case 6:
            xm = "7";
            break;
        case 7:
            xm = "8";
            break;
        case 8:
            xm = "9";
            break;
        case 9:
            xm = "10";
            break;
        case 10:
            xm = "11";
            break;
        case 11:
            xm = "12";
            break;
    }
    sf = xm + "/" + d.getDate() + "/" + d.getFullYear();
    //alert("sf = " + sf);
    return sf;
}

function getSHByDt(jst, jdt) {
    //jst = state, jdt = date
    //getst() is function contained in getsthol.js that returns the list of all state holidays
    var xst = getst();
    var xrt = "";
    var xss = "<p>" + jst + "<br>" + jdt + "<br>";
    var n1 = xst.indexOf(xss);
    if (n1 > 0) {
        var n2 = xst.length;
        xst = xst.slice(n1 + 3, n2);
        n1 = xst.indexOf("<p>");
        xst = xst.slice(0, n1);
        xrt = xst;
    }   else {
    //xstates2 is the second dropdown list that lets you pick a state after you chose federal court for the first dropdown
    //when you do then we check to see if the date is a state holiday
    var jst2 = $("#xstates2").val();
    if (jst === "Federal Court"  && jst2 != "none") {
    	xss = "<p>" + jst2 + "<br>" + jdt + "<br>";
        var n1 = xst.indexOf(xss);
        if (n1 > 0) {
           var n2 = xst.length;
           xst = xst.slice(n1 + 3, n2);
           n1 = xst.indexOf("<p>");
           xst = xst.slice(0, n1);
           xrt = xst;
       } 
    }
    
    }
    return xrt;
}


function getSHByDtBack(jst, jdt) {
    var xst = getst();
    var xrt = "";
    var xss = "<p>" + jst + "<br>" + jdt + "<br>";
    var n1 = xst.indexOf(xss);
    if (n1 > 0) {
        var n2 = xst.length;
        xst = xst.slice(n1 + 3, n2);
        n1 = xst.indexOf("<p>");
        xst = xst.slice(0, n1);
        xrt = xst;
    }   else {
    /*var jst2 = $("#xstates2").val();
    if (jst === "Federal Court"  && jst2 != "none") {
    	xss = "<p>" + jst2 + "<br>" + jdt + "<br>";
        var n1 = xst.indexOf(xss);
        if (n1 > 0) {
           var n2 = xst.length;
           xst = xst.slice(n1 + 3, n2);
           n1 = xst.indexOf("<p>");
           xst = xst.slice(0, n1);
           xrt = xst;
       } 
    }
    */
    }
    return xrt;
}

function xdataLoad() {
    var ys = showMonth(focusDate)
    ys += ", " + focusDate.getFullYear();
    $("#showMo").html(ys);
    $.get("hol.txt", function(data, status) {
    	//get state holidays from hol.txt, then split them into array
    	//alert(data)
        sa = data.split("<>");
    })
    fillCalNow();
    filterByState();
}
$(document).ready(function() {
    $("#ptest").dblclick(function() {
        //var yss = getst();
        var gdt = $("#aop").html();
        var gst = $("#xstates").val();
        var hhh = getSHByDt(gst, gdt);
        alert(hhh);
        var sha = [];
        sha = hhh.split("<br>");
    });
});

function xstatesChangez() {
    $.get("holLinks.txt", function(data, status) {
        var sda = data.split("<>");
        var sla1 = "";
        var sla2 = "";
        var xst = $("#xstates").val();
        for (i = 0; i < sda.length; i++) {
            if (sda[i].indexOf(xst) > -1) {
                var sla = sda[i].split(">");
                //xlist += sla[0] + ": " + sla[1] + "<br>";
                sla1 = sla[0];
                sla2 = sla[1];
                document.getElementById("myAnchor").innerHTML = "Legal Holidays in " + xst;
                document.getElementById("myAnchor").href = encodeURI(sla2);
            }
        }
        fillCal()
    })
}

function xstatesChange() {
    if ($("#xstates").val() === "Federal Court") {
        $("#xstates2p").css("display","inline")
    } else {
        
        $("#xstates2p").css("display","none")
    }
    filterByState();
    $.get("holLink.txt", function(data, status) {
        var sda = data.split("<>");
        var sla1 = "";
        var ylist = "";
        var sla2 = "";
        var xst = $("#xstates").val();
        for (i = 0; i < sda.length; i++) {
            if (sda[i].indexOf(xst) > -1) {
                var sla = sda[i].split(">");
                //ylist += sla[0] + ": " + sla[1] + "<br>";
                sla1 = sla[0];
                sla2 = sla[1];
                document.getElementById("myAnchor").innerHTML = "Legal Holidays in " + xst;
                document.getElementById("myAnchor").href = encodeURI(sla2);
            }
        }
    })
}

function datePlusCall() {

    if ($("#xstates").val() === "Federal Court") {
    //alert("hi");
       $("#zdiv2").css("display", "inline")
       //$("#zdiv2").css("margin-left", "400px")
    }

    var xst2 = $("#xstates2").val();
    if ($("#xstates").val() != "Federal Court") {
        datePlus();
    } else if (xst2 === "None") {
        datePlus();
    } else {
        alert(xst2);
    }
}

function datePlus() {
    var fs = [];
    var ds = $("#aop").html();
    var xst = $("#xstates").val();
    var xno = Number($("#tno").val());
    var d = new Date(ds);
    var dcd = ""; //document.getElementById("dtCalcDisplay");
    dcd = showDay(d) + ", " + showDate(d) + ", + " + String(xno) + " days = ";
    d.setDate(d.getDate() + xno);
    dcd += showDay(d) + ", " + showDate(d) + "<br>";
    var fdd = ""; //document.getElementById("fnlDateDisplay");
    fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    ds = d.toLocaleDateString();
    if (d.getDay() == 0) {
        dcd += "Deadline extended 1 day because it falls on Sunday.<br>";
        d.setDate(d.getDate() + 1);
        fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    };
    if (d.getDay() == 6) {
        dcd += "Deadline extended 2 days because it falls on Saturday.<br>";
        d.setDate(d.getDate() + 2);
        fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    };
    ds = d.toLocaleDateString();
    var gst = $("#xstates").val();
    var grt = "";
    var gdt = showDMYYYY(d);
    //alert(gst + ">" + gdt)
    var grt = getSHByDt(gst, gdt);
    var gn = grt.length;
    if (gn > 0) {
        fs = grt.split("<br>");
        dcd += "Deadline extended 1 day because it falls on " + fs[2] + ".<br>";
        d.setDate(d.getDate() + 1);
        fdd = "Final Date: " + showDay(d) + ", " + showDate(d);
        ds = d.toLocaleDateString();
    }
    var gst = $("#xstates").val();
    var grt = "";
    var gdt = showDMYYYY(d);
    var grt = getSHByDt(gst, gdt);
    //alert("grt from calling function - " + grt)
    var gn = grt.length;
    //alert(gn);
    
    //var sa2 = sa.filter(xfilt);
    if (gn > 0) {
        //alert("yes");
        fs = grt.split("<br>");
        dcd += "Deadline extended 1 day because it falls on " + fs[2] + ".<br>";
        d.setDate(d.getDate() + 1);
        //var bbb = showDay(d) + ", " + showDate(d) + ".";
        //dcd += bbb + "<br>";
        fdd = "Final Date: " + showDay(d) + ", " + showDate(d);
        ds = d.toLocaleDateString();
    }
    if (d.getDay() == 0) {
        dcd += "Deadline extended 1 day because it falls on Sunday.<br>";
        d.setDate(d.getDate() + 1);
        //dcd += showDate(d);
        fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    };
    if (d.getDay() == 6) {
        dcd += "Deadline extended 2 days because it falls on Saturday.<br>";
        d.setDate(d.getDate() + 2);
        fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    };
    $("#dtCalcDisplay").html(dcd);
    $("#fnlDateDisplay").html(fdd);
}
//
function dateMinus() {
    var fs = [];
    var ds = $("#aop").html();
    var xst = $("#xstates").val();
    var xno = Number($("#tno").val());
    var d = new Date(ds);
    var dcd = "";
    dcd = showDay(d) + ", " + showDate(d) + ", - " + String(xno) + " days = ";
    d.setDate(d.getDate() - xno);
    dcd += showDay(d) + ", " + showDate(d) + "<br>";
    var fdd = "";
    fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    ds = d.toLocaleDateString();
    if (d.getDay() == 0) {
        dcd += "Deadline moved 2 days because it falls on Sunday.<br>";
        d.setDate(d.getDate() - 2);
        fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    };
    if (d.getDay() == 6) {
        dcd += "Deadline moved 1 day because it falls on Saturday.<br>";
        d.setDate(d.getDate() - 1);
        fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    };
    ds = d.toLocaleDateString();
    var gst = $("#xstates").val();
    var grt = "";
    var gdt = showDMYYYY(d);
    var grt = getSHByDtBack(gst, gdt);
    var gn = grt.length;
    if (gn > 0) {
        fs = grt.split("<br>");
        dcd += "Deadline moved 1 day because it falls on " + fs[2] + ".<br>";
        d.setDate(d.getDate() - 1);
        fdd = "Final Date: " + showDay(d) + ", " + showDate(d);
        ds = d.toLocaleDateString();
    }
    var gst = $("#xstates").val();
    var grt = "";
    var gdt = showDMYYYY(d);
    var grt = getSHByDtBack(gst, gdt);
    var gn = grt.length;
    if (gn > 0) {
        fs = grt.split("<br>");
        dcd += "Deadline moved 1 day because it falls on " +  fs[2] + ".<br>";
        d.setDate(d.getDate() - 1);
        fdd = "Final Date: " + showDay(d) + ", " + showDate(d);
        ds = d.toLocaleDateString();
    }
    if (d.getDay() == 0) {
        dcd += "Deadline moved 2 days because it fall on Sunday.<br>";
        d.setDate(d.getDate() - 2);
        fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    };
    if (d.getDay() == 6) {
        dcd += "Deadline moved 1 day because it falls on Saturday.<br>";
        d.setDate(d.getDate() - 1);
        fdd = "Final date: " + showDay(d) + ", " + showDate(d);
    };
    $("#dtCalcDisplay").html(dcd);
    $("#fnlDateDisplay").html(fdd);
}

function fillCalByInput() {
    var ds = $("#tdt").val();
    var hdt = new Date(ds);
    focusDate = hdt;
    var gmo = showMonth(focusDate) + ", " + focusDate.getFullYear();
    $("#showMo").html(gmo);
    fillCal();
}

function fillCalDay(ds) {
    var ys = ds;
    var xs = $("#xstates").val();
//alert("filling")
    //filter the array of state holidays for matches with the ds variable
    function xfilt(xd) {
    //xd starts as sa, the array that is being filtered. It is passed to xfilt. Then, the array is filtered and the filtered array returned from xfilt
        return xd.indexOf(ys) > 0 && xd.indexOf(xs) > -1;
    }
    //sa is an array based on hol.txt; xfilt filters the array
    var dsa2 = sa.filter(xfilt);
    if (dsa2.length > 0) {
        return ds + ": " + dsa2[0]
    } else {
        return ds + ": "
    }
}

function callFillCalDay(ds) {
    var xs = fillCalDay(ds);
}

function fillCalNow() {
    var xd = new Date();
    fillCal(xd)
}
//function fillCalNow () {var focusDate = new Date(); fillCal()}
function calUp(xno) {
    xno = xno * 30;
    var d = focusDate;
    d.setDate(15);
    d.setDate(d.getDate() + xno);
    focusDate = d;
    var gmo = showMonth(focusDate) + ", " + focusDate.getFullYear();
    $("#showMo").html(gmo);
    fillCal();
}

function calNow() {
    var d = new Date();
    focusDate = d;
    var gmo = showMonth(focusDate) + ", " + focusDate.getFullYear();
    $("#showMo").html(gmo);
    fillCal();
}

function calDown(xno) {
    xno = xno * 30;
    var d = focusDate;
    d.setDate(15);
    d.setDate(d.getDate() - xno);
    focusDate = d;
    var gmo = showMonth(focusDate) + ", " + focusDate.getFullYear();
    $("#showMo").html(gmo);
    fillCal();
}
var fdbtn = 0;
var ldbtn = 0;

function fillCal() {
    fdbtn = 0;
    ldbtn = 0;
    var cdate = new Date();
    var checkmo = focusDate.getMonth();
    var sdass = focusDate.toLocaleString()
    ydate = focusDate;
    ydate.setDate(1);
    var ydow = ydate.getDay();
    var ntoday = 0;
    //alert(ydow + ">" + cdate.
    ntoday = ydow + cdate.getDate();
    ydate.setDate(ydate.getDate() - ydow);

    function fillCalDay2(ds) {
        var ys = ds;
        var xs = $("#xstates").val();

        function xfilt2(xd) {
            return xd.indexOf(">" + ys) > -1 && xd.indexOf(xs) > -1;
        }
        var dsa2 = sa.filter(xfilt2);
        if (dsa2.length > 0) {
            var uyt = dsa2[0].split(">");
            return ds + ": " + uyt[1]
        } else {
            return ds + ": "
        }
    }
    for (i = 1; i < 43; i++) {
        ad = ydate.getDate();
        hh = String(i);
        $("#" + hh).html(ad);
        var yss = ydate.toLocaleString();
        var yusa = yss.split(", ");
        yss = yusa[0];
        var ydd = fillCalDay2(yss);
        if (ydd.indexOf(":") < ydd.length - 2) {
            $("#" + hh).css({
                "border-style": "solid",
                "border-color": "gray",
                "border-width": "2px",
                "border-radius": "10px"
            })
        } else {
            $("#" + hh).css({
                "border-style": "none",
                "border-color": "",
                "border-width": "0px",
                "border-radius": "0px"
            })
        }
        $("#" + hh).attr("title", ydd);
        var bn = ydate.getMonth();
        if (bn < checkmo) {
            $("#" + hh).css("background-color", "#ebebe0")
            fdbtn += 1;
        } else if (bn > checkmo) {
            $("#" + hh).css("background-color", "#ebebe0")
        } else {
            $("#" + hh).css("background-color", "white")
            ldbtn += 1;
        }
        ydate.setDate(ydate.getDate() + 1);
    }
    fdbtn += 1;
    ldbtn += 1;
    focusDate = new Date(sdass);
    $("#" + String(ntoday)).css("background-color", "#ffb3b9");
    var xbtn = $("#" + ntoday).attr('title');
    var xbtna = xbtn.split(": ");
    $("#aop").html(xbtna[0]);
    $("#tdt").val(xbtna[0]);
    xbtn = $("#36").attr('title');
    xbtn = xbtn.split(": ");
    xbtna[0];
    var jdate = new Date(xbtn);
    var nnn = jdate.getMonth();
    if (nnn > checkmo) {
        $("#lastRow").css("visibility", "hidden")
    } else {
        $("#lastRow").css("visibility", "visible")
    }
}
$(document).ready(function() {
    $(".cmo").click(function() {
        var hdte = focusDate;
        var hdtestr = hdte.toLocaleDateString();
        $(".cmo").css("background-color", "");
        var holdDate = "";
        var checkMo = focusDate.getMonth();
        var si = "";
        for (i = 1; i < 36; i++) {
            si = String(i);
            var ttt = $("#" + i).attr("title");
            var ttta = ttt.split(": ");
            ttt = ttta[0];
            var tttd = new Date(ttt);
            var ym = tttd.getMonth();
            if (checkMo == ym) {
                $("#" + i).css("background-color", "white")
            } else {
                $("#" + i).css("background-color", "#ebebe0")
            }
        }
        stb.innerHTML = "Change Start";
        document.getElementById("b2calendar-content").style.display = "none";
        $(this).css("background-color", "#ffb3b9");
        var xbtn = $(this).attr('title');
        var xbtna = xbtn.split(": ");
        $("#aop").html(xbtna[0]);
        $("#tdt").val(xbtna[0]);
    })
});
$(document).ready(function() {
    $(".cmo").mouseover(function() {
        //alert("hi");
        $(this).css("color", "#00ddd8");
    });
    //if ($(this).prop("color") == "#00ddd8"){
    $(".cmo").mouseout(function() {
        $(this).css("color", "#517398");
    });
    //}
});

function showToggle() {
    var stb = document.getElementById("stb");
    if (stb.innerHTML === "Change Start") {
        stb.innerHTML = "Hide Calendar";
        document.getElementById("b2calendar-content").style.display = "inline";
    } else {
        stb.innerHTML = "Change Start";
        document.getElementById("b2calendar-content").style.display = "none";
    }
}
function filterByState(){
	var qselst = $("#xstates").val();
	var qallst = $("#showall").html();
	var qn1 = qallst.indexOf(qselst);
	var qn2 = qallst.lastIndexOf(qselst);
	var qqs = qallst.slice(qn1, qn2);
	$("#showfilt").html(qqs);
}
function filterByState2 () {
	var qselst = $("#xstates2").val();
	var qallst = $("#showall").html();
	var qn1 = qallst.indexOf(qselst);
	var qn2 = qallst.lastIndexOf(qselst);
	var qqs = qallst.slice(qn1, qn2);
	$("#showfilt2").html(qqs);
}

</script>
</head>
<body onload="xdataLoad()">

    <div class="container">
        <a class="active" href="https://www.qwikdocs.com/">Home</a> <a href="https://www.qwikdocs.com/hotdocs-11-upgrade/">HotDocs 11</a>
                <a href="https://www.qwikdocs.com/qdc/Personal-Mileage.php">Mileage</a> 
                <a href="https://www.qwikdocs.com/qdc/Witness-Mileage.php">Witness Mileage</a> 
                <a href="https://www.qwikdocs.com/qdc/Calculate-Legal-Deadlines.php">Deadlines</a>
    </div>


<div id="imgdiv"><img class="ximage" src="https://qwikdocs.com/wp-content/themes/aa-feb-19/images/headerforeground01.png" alt="Lamp" width="165" height="133">
  <div>
    <h1 class="xheader">QwikDocs</h1>
    <p class="xslogan">HotDocs Sales & Templates</p>
  </div>
</div>

<hr style="clear:left;display: block;color:#517398;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;">


<div id="b1main">
        <p>Pick the Forum: <select id="xstates" onchange="xstatesChange()">
            <option>
                Federal Court
            </option>
            <option>
                Alabama
            </option>
            <option>
                Alaska
            </option>
            <option>
                Arizona
            </option>
            <option>
                Arkansas
            </option>
            <option>
                California
            </option>
            <option>
                Colorado
            </option>
            <option>
                Connecticut
            </option>
            <option>
                Delaware
            </option>
            <option>
                Florida
            </option>
            <option>
                Georgia
            </option>
            <option>
                Hawaii
            </option>
            <option>
                Idaho
            </option>
            <option>
                Illinois
            </option>
            <option>
                Indiana
            </option>
            <option>
                Iowa
            </option>
            <option>
                Kansas
            </option>
            <option>
                Kentucky
            </option>
            <option>
                Louisiana
            </option>
            <option>
                Maine
            </option>
            <option>
                Maryland
            </option>
            <option>
                Massachusetts
            </option>
            <option>
                Michigan
            </option>
            <option>
                Minnesota
            </option>
            <option>
                Mississippi
            </option>
            <option>
                Missouri
            </option>
            <option>
                Montana
            </option>
            <option>
                Nebraska
            </option>
            <option>
                Nevada
            </option>
            <option>
                New Hampshire
            </option>
            <option>
                New Jersey
            </option>
            <option>
                New Mexico
            </option>
            <option>
                New York
            </option>
            <option>
                North Carolina
            </option>
            <option>
                North Dakota
            </option>
            <option>
                Ohio
            </option>
            <option>
                Oklahoma
            </option>
            <option>
                Oregon
            </option>
            <option>
                Pennsylvania
            </option>
            <option>
                Puerto Rico
            </option>
            <option>
                Rhode Island
            </option>
            <option>
                South Carolina
            </option>
            <option>
                South Dakota
            </option>
            <option>
                Tennessee
            </option>
            <option>
                Texas
            </option>
            <option>
                Utah
            </option>
            <option>
                Vermont
            </option>
            <option>
                Virginia
            </option>
            <option>
                Washington
            </option>
            <option>
                West Virginia
            </option>
            <option>
                Wisconsin
            </option>
            <option>
                Wyoming
            </option>
        </select></p>
        <p><span>Check link for</span> <span><a href="https://www.opm.gov/policy-data-oversight/snow-dismissal-procedures/federal-holidays/" id="myAnchor" target="_blank">Federal
        Holidays</a></span></p>
        <p style="display:none"><span>Start date: <input class="" id="tdt" onchange="fillCalByInput()" type="text" value=""></span> <span style="display:none">Year: 20<input class="" id="tyr" type=
        "text" value="16"></span></p>
    </div>
    <div id="b2calendar">
        <p class="ptext">
           <span>Start date:</span> <span id="aop"></span>
           <span><button class="xsubmit" style="width:120px" id ="stb" onclick="showToggle()">Change Start</button></span>
        </p>
        <div id="b2calendar-content">            
            <p id="showMo"></p>
            <table id="zmytable">
                <tr>
                    <th class="xhd">S</th>
                    <th class="xhd">M</th>
                    <th class="xhd">T</th>
                    <th class="xhd">W</th>
                    <th class="xhd">T</th>
                    <th class="xhd">F</th>
                    <th class="xhd">S</th>
                </tr>
                <tr>
                    <td class="cmo" id="1">S</td>
                    <td class="cmo" id="2">M</td>
                    <td class="cmo" id="3">T</td>
                    <td class="cmo" id="4">W</td>
                    <td class="cmo" id="5">T</td>
                    <td class="cmo" id="6">F</td>
                    <td class="cmo" id="7">S</td>
                </tr>
                <tr>
                    <td class="cmo" id="8">S</td>
                    <td class="cmo" id="9">M</td>
                    <td class="cmo" id="10">T</td>
                    <td class="cmo" id="11">W</td>
                    <td class="cmo" id="12">T</td>
                    <td class="cmo" id="13">F</td>
                    <td class="cmo" id="14">S</td>
                </tr>
                <tr>
                    <td class="cmo" id="15">S</td>
                    <td class="cmo" id="16">M</td>
                    <td class="cmo" id="17">T</td>
                    <td class="cmo" id="18">W</td>
                    <td class="cmo" id="19">T</td>
                    <td class="cmo" id="20">F</td>
                    <td class="cmo" id="21">S</td>
                </tr>
                <tr>
                    <td class="cmo" id="22">S</td>
                    <td class="cmo" id="23">M</td>
                    <td class="cmo" id="24">T</td>
                    <td class="cmo" id="25">W</td>
                    <td class="cmo" id="26">T</td>
                    <td class="cmo" id="27">F</td>
                    <td class="cmo" id="28">S</td>
                </tr>
                <tr>
                    <td class="cmo" id="29">S</td>
                    <td class="cmo" id="30">M</td>
                    <td class="cmo" id="31">T</td>
                    <td class="cmo" id="32">W</td>
                    <td class="cmo" id="33">T</td>
                    <td class="cmo" id="34">F</td>
                    <td class="cmo" id="35">S</td>
                </tr>
                <tr id="lastRow">
                    <td class="cmo" id="36">S</td>
                    <td class="cmo" id="37">M</td>
                    <td class="cmo" id="38">T</td>
                    <td class="cmo" id="39">W</td>
                    <td class="cmo" id="40">T</td>
                    <td class="cmo" id="41">F</td>
                    <td class="cmo" id="42">S</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><button class="x2submit" id="dtyup" onclick="calDown(4)" style="width:50px; -webkit-column-span: 2" title="Back 4 months">&#60;&#60;</button></td>
                    <td><button class="x2submit" id="dtyup2" onclick="calDown(1)" style="width:50px" title="Back 1 month">&#60;</button></td>
                    <td class="x2submit" onclick="calNow()" style="width:50px" title="Go to current date">Now</td>
                    <td><button class="x2submit" id="dtydown" onclick="calUp(1)" style="width:50px" title="Up 1 month">&#62;</button></td>
                    <td><button class="x2submit" id="dtydown2" onclick="calUp(4)" style="width:50px" title="Up 4 months">&#62;&#62;</button></td>
                </tr>
            </table>
        </div>
    </div>
    <div id="zdiv1" style="padding:0;margin-bottom:0">
        <p class="inputp" style="padding:0;margin-bottom:0">             
	     <span><button class="xsubmit" id="testing1" onclick="datePlusCall()">Add</button></span>
             <span style="color:#517398">Days:</span><span><input class="" id="tno" type="text" value="30"></span> 
             <span><button class="xsubmit" id="testing2" onclick="dateMinus()">Subtract</button></span>
        </p>
    </div>
<!--<div id="zdiv2">-->
        <div id="xstates2p">
            <p><span>Add State Holidays:</span> <select id="xstates2">
                <option>
                    None
                </option>
                <option>
                    Alabama
                </option>
                <option>
                    Alaska
                </option>
                <option>
                    Arizona
                </option>
                <option>
                    Arkansas
                </option>
                <option>
                    California
                </option>
                <option>
                    Colorado
                </option>
                <option>
                    Connecticut
                </option>
                <option>
                    Delaware
                </option>
                <option>
                    Florida
                </option>
                <option>
                    Georgia
                </option>
                <option>
                    Hawaii
                </option>
                <option>
                    Idaho
                </option>
                <option>
                    Illinois
                </option>
                <option>
                    Indiana
                </option>
                <option>
                    Iowa
                </option>
                <option>
                    Kansas
                </option>
                <option>
                    Kentucky
                </option>
                <option>
                    Louisiana
                </option>
                <option>
                    Maine
                </option>
                <option>
                    Maryland
                </option>
                <option>
                    Massachusetts
                </option>
                <option>
                    Michigan
                </option>
                <option>
                    Minnesota
                </option>
                <option>
                    Mississippi
                </option>
                <option>
                    Missouri
                </option>
                <option>
                    Montana
                </option>
                <option>
                    Nebraska
                </option>
                <option>
                    Nevada
                </option>
                <option>
                    New Hampshire
                </option>
                <option>
                    New Jersey
                </option>
                <option>
                    New Mexico
                </option>
                <option>
                    New York
                </option>
                <option>
                    North Carolina
                </option>
                <option>
                    North Dakota
                </option>
                <option>
                    Ohio
                </option>
                <option>
                    Oklahoma
                </option>
                <option>
                    Oregon
                </option>
                <option>
                    Pennsylvania
                </option>
                <option>
                    Puerto Rico
                </option>
                <option>
                    Rhode Island
                </option>
                <option>
                    South Carolina
                </option>
                <option>
                    South Dakota
                </option>
                <option>
                    Tennessee
                </option>
                <option>
                    Texas
                </option>
                <option>
                    Utah
                </option>
                <option>
                    Vermont
                </option>
                <option>
                    Virginia
                </option>
                <option>
                    Washington
                </option>
                <option>
                    West Virginia
                </option>
                <option>
                    Wisconsin
                </option>
                <option>
                    Wyoming
                </option>
            </select>
            <span><button onclick="whyshow()">Why Should I?</button></span>
            </p>
        </div>
        <!--<div>-->
        <div id="zdiv2a">
        <!--<p><button onclick="whyshow()">Why Should I?</button></p>-->
        <p id="why"><span>See</span> <span><a href="https://www.law.cornell.edu/rules/frcp/rule_6" id="myAnchor2" target="_blank">FRCP 6(a)(6)(C)</a></span> <span>,</span> <span><a href=
        "https://www.law.cornell.edu/rules/frap/rule_26" id="myAnchor3" target="_blank">FRAP 26(a)(6)(C)</a></span></p>
        <p>If you select Federal Court and pick a state, we will include state holidays for deadlines that add dates to the date of the triggering event as prescribed by FRCP 6(a)(6)(C).<br>
        The Committee Comments state that the rule:<br>
        [P]rotects those who may be unsure of the effect of state holidays. For forward-counted deadlines, treating state holidays the same as federal holidays extends the deadline. Thus, someone who
        thought that the federal courts might be closed on a state holiday would be safeguarded against an inadvertent late filing. In contrast, for backward-counted deadlines, not giving state
        holidays the treatment of federal holidays allows filing on the state holiday itself rather than the day before.<br>
        <button onclick="whyclose()">Close it up</button></p>
        </div>
   </div>
    

    <div id="zdiv3">
        <p id="dtCalcDisplay"></p>
        <p id="fnlDateDisplay"></p>
        <p id="zop"></p>
    </div>
   <div id="dstore">
      <p id = "dstore1"></p>
  </div>
<div><!--new-->
   <?php
      echo file_get_contents("qdFooter.php");
   ?> 
<div id="showhol">show holidays here

<p id="showfilt" onclick="filterByState()">
Filter by state
</p>
<p id="showfilt2" onclick="filterByState2()">
Filter by state2
</p>
<p id="showall">
<br><br>ALL STATES<br>
Alabama;1/16/2017;Martin Luther King Jr.'s Birthday - Robert E. Lee's Birthday;Alabama<br>
Alabama;2/20/2017;George Washington's & Thomas Jefferson's Birthdays;Alabama<br>
Alabama;2/28/2017;Mardi Gras Day (Mobile and Baldwin Counties only);Alabama<br>
Alabama;5/10/2017;Confederate Memorial Day;Alabama<br>
Alabama;5/29/2017;National Memorial Day;Alabama<br>
Alabama;6/5/2017;Jefferson Davis' Birthday;Alabama<br>
Alabama;7/4/2017;Independence Day;Alabama<br>
Alabama;9/4/2017;Labor Day;Alabama<br>
Alabama;10/9/2017;Columbus Day - American Indian Heritage Day;Alabama<br>
Alabama;11/10/2017;Veterans Day Observed;Alabama<br>
Alabama;11/23/2017;Thanksgiving Day;Alabama<br>
Alabama;12/25/2017;Christmas Day;Alabama<br>
Alabama;1/15/2018;Martin Luther King Jr.'s Birthday - Robert E. Lee's Birthday;Alabama<br>
Alabama;2/13/2018;Mardi Gras Day (Mobile and Baldwin Counties only);Alabama<br>
Alabama;2/19/2018;George Washington's & Thomas Jefferson's Birthdays;Alabama<br>
Alabama;4/23/2018;Confederate Memorial Day;Alabama<br>
Alabama;5/28/2018;National Memorial Day;Alabama<br>
Alabama;6/1/2018;Jefferson Davis' Birthday;Alabama<br>
Alabama;6/4/2018;Jefferson Davis' Birthday;Alabama<br>
Alabama;7/4/2018;Independence Day;Alabama<br>
Alabama;9/3/2018;Labor Day;Alabama<br>
Alabama;10/8/2018;Columbus Day - American Indian Heritage Day;Alabama<br>
Alabama;11/12/2018;Veterans Day;Alabama<br>
Alabama;11/22/2018;Thanksgiving Day;Alabama<br>
Alabama;12/25/2018;Christmas Day;Alabama<br>
Alabama;1/21/2019;Martin Luther King Jr.'s Birthday - Robert E. Lee's Birthday;Alabama<br>
Alabama;2/18/2019;George Washington's & Thomas Jefferson's Birthdays;Alabama<br>
Alabama;3/5/2019;Mardi Gras Day (Mobile and Baldwin Counties only);Alabama<br>
Alabama;4/22/2019;Confederate Memorial Day;Alabama<br>
Alabama;5/27/2019;National Memorial Day;Alabama<br>
Alabama;6/3/2019;Jefferson Davis' Birthday;Alabama<br>
Alabama;7/4/2019;Independence Day;Alabama<br>
Alabama;9/2/2019;Labor Day;Alabama<br>
Alabama;10/14/2019;Columbus Day - American Indian Heritage Day;Alabama<br>
Alabama;11/11/2019;Veterans Day;Alabama<br>
Alabama;11/28/2019;Thanksgiving Day;Alabama<br>
Alabama;12/25/2019;Christmas Day;Alabama<br>
Alabama;1/20/2020;Martin Luther King Jr.'s Birthday - Robert E. Lee's Birthday;Alabama<br>
Alabama;2/17/2020;George Washington's & Thomas Jefferson's Birthdays;Alabama<br>
Alabama;2/25/2020;Mardi Gras Day (Mobile and Baldwin Counties only);Alabama<br>
Alabama;4/27/2020;Confederate Memorial Day;Alabama<br>
Alabama;5/25/2020;National Memorial Day;Alabama<br>
Alabama;7/3/2020;Independence Day;Alabama<br>
Alabama;9/7/2020;Labor Day;Alabama<br>
Alabama;10/12/2020;Columbus Day - American Indian Heritage Day;Alabama<br>
Alabama;11/11/2020;Veterans Day;Alabama<br>
Alabama;11/26/2020;Thanksgiving Day;Alabama<br>
Alabama;12/25/2020;Christmas Day;Alabama<br>
Alaska;1/2/2017;New Year's Day;Alaska<br>
Alaska;1/16/2017;Martin Luther King Jr.'s Birthday;Alaska<br>
Alaska;2/20/2017;President's Day;Alaska<br>
Alaska;3/27/2017;Seward's Day;Alaska<br>
Alaska;5/29/2017;Memorial Day;Alaska<br>
Alaska;7/4/2017;Independence Day;Alaska<br>
Alaska;9/4/2017;Labor Day;Alaska<br>
Alaska;10/18/2017;Alaska Day;Alaska<br>
Alaska;11/10/2017;Veterans Day Observed;Alaska<br>
Alaska;11/23/2017;Thanksgiving Day;Alaska<br>
Alaska;12/25/2017;Christmas Day;Alaska<br>
Alaska;1/1/2018;New Year's Day;Alaska<br>
Alaska;1/15/2018;Martin Luther King Jr.'s Birthday;Alaska<br>
Alaska;2/19/2018;President's Day;Alaska<br>
Alaska;3/26/2018;Seward's Day;Alaska<br>
Alaska;5/28/2018;Memorial Day;Alaska<br>
Alaska;7/4/2018;Independence Day;Alaska<br>
Alaska;9/3/2018;Labor Day;Alaska<br>
Alaska;10/18/2018;Alaska Day;Alaska<br>
Alaska;11/12/2018;Veterans Day;Alaska<br>
Alaska;11/22/2018;Thanksgiving Day;Alaska<br>
Alaska;12/25/2018;Christmas Day;Alaska<br>
Alaska;1/1/2019;New Year’s Day;Alaska<br>
Alaska;1/21/2019;Martin Luther King Jr.'s Birthday;Alaska<br>
Alaska;2/18/2019;President’s Day;Alaska<br>
Alaska;3/25/2019;Seward’s Day;Alaska<br>
Alaska;5/27/2019;Memorial Day;Alaska<br>
Alaska;7/4/2019;Independence Day;Alaska<br>
Alaska;9/2/2019;Labor Day;Alaska<br>
Alaska;10/18/2019;Alaska Day;Alaska<br>
Alaska;11/11/2019;Veterans Day;Alaska<br>
Alaska;11/28/2019;Thanksgiving Day;Alaska<br>
Alaska;12/25/2019;Christmas Day;Alaska<br>
Alaska;1/1/2020;New Year’s Day;Alaska<br>
Alaska;1/20/2020;Martin Luther King Jr.'s Birthday;Alaska<br>
Alaska;2/17/2020;President’s Day;Alaska<br>
Alaska;3/30/2020;Seward’s Day;Alaska<br>
Alaska;5/25/2020;Memorial Day;Alaska<br>
Alaska;7/3/2020;Independence Day;Alaska<br>
Alaska;9/7/2020;Labor Day;Alaska<br>
Alaska;10/18/2020;Alaska Day;Alaska<br>
Alaska;11/11/2020;Veterans Day;Alaska<br>
Alaska;11/26/2020;Thanksgiving Day;Alaska<br>
Alaska;12/25/2020;Christmas Day;Alaska<br>
Arizona;1/2/2017;New Year's Day;Arizona<br>
Arizona;1/16/2017;Martin Luther King, Jr.-Civil Rights Day;Arizona<br>
Arizona;2/20/2017;Lincoln-Washington-Presidents' Day;Arizona<br>
Arizona;5/29/2017;Memorial Day;Arizona<br>
Arizona;7/4/2017;Independence Day;Arizona<br>
Arizona;9/4/2017;Labor Day;Arizona<br>
Arizona;10/9/2017;Columbus Day;Arizona<br>
Arizona;11/10/2017;Veterans Day Observed;Arizona<br>
Arizona;11/23/2017;Thanksgiving Day;Arizona<br>
Arizona;12/25/2017;Christmas Day;Arizona<br>
Arizona;1/1/2018;New Year's Day;Arizona<br>
Arizona;1/15/2018;Martin Luther King, Jr.-Civil Rights Day;Arizona<br>
Arizona;2/19/2018;Lincoln-Washington-Presidents' Day;Arizona<br>
Arizona;5/28/2018;Memorial Day;Arizona<br>
Arizona;7/4/2018;Independence Day;Arizona<br>
Arizona;9/3/2018;Labor Day;Arizona<br>
Arizona;10/8/2018;Columbus Day;Arizona<br>
Arizona;11/12/2018;Veterans Day;Arizona<br>
Arizona;11/22/2018;Thanksgiving Day;Arizona<br>
Arizona;12/25/2018;Christmas Day;Arizona<br>
Arizona;1/1/2019;New Year’s Day;Arizona<br>
Arizona;1/21/2019;Martin Luther King, Jr.-Civil Rights Day;Arizona<br>
Arizona;2/12/2019;Lincoln-Washington-Presidents' Day;Arizona<br>
Arizona;5/27/2019;Memorial Day;Arizona<br>
Arizona;7/4/2019;Independence Day;Arizona<br>
Arizona;9/2/2019;Labor Day;Arizona<br>
Arizona;10/14/2019;Columbus Day;Arizona<br>
Arizona;11/11/2019;Veterans Day;Arizona<br>
Arizona;11/28/2019;Thanksgiving Day;Arizona<br>
Arizona;12/25/2019;Christmas Day;Arizona<br>
Arizona;1/1/2020;New Year’s Day;Arizona<br>
Arizona;1/20/2020;Martin Luther King, Jr.-Civil Rights Day;Arizona<br>
Arizona;2/12/2020;Lincoln-Washington-Presidents' Day;Arizona<br>
Arizona;5/25/2020;Memorial Day;Arizona<br>
Arizona;7/3/2020;Independence Day;Arizona<br>
Arizona;9/7/2020;Labor Day;Arizona<br>
Arizona;10/12/2020;Columbus Day;Arizona<br>
Arizona;11/11/2020;Veterans Day;Arizona<br>
Arizona;11/26/2020;Thanksgiving Day;Arizona<br>
Arizona;12/25/2020;Christmas Day;Arizona<br>
Arkansas;1/2/2017;New Year's Day;Arkansas<br>
Arkansas;1/16/2017;Martin Luther King, Jr. Birthday and Robert E. Lee's Birthday;Arkansas<br>
Arkansas;2/20/2017;George Washington's Birthday and Daisy Gatson Bates Day;Arkansas<br>
Arkansas;5/29/2017;Memorial Day;Arkansas<br>
Arkansas;7/4/2017;Independence Day;Arkansas<br>
Arkansas;9/4/2017;Labor Day;Arkansas<br>
Arkansas;11/10/2017;Veterans Day Observed;Arkansas<br>
Arkansas;11/23/2017;Thanksgiving Day;Arkansas<br>
Arkansas;12/24/2017;Christmas Eve;Arkansas<br>
Arkansas;12/25/2017;Christmas Day;Arkansas<br>
Arkansas;1/1/2018;New Year's Day;Arkansas<br>
Arkansas;1/15/2018;Martin Luther King, Jr. Birthday and Robert E. Lee's Birthday;Arkansas<br>
Arkansas;2/19/2018;George Washington's Birthday and Daisy Gatson Bates Day;Arkansas<br>
Arkansas;5/28/2018;Memorial Day;Arkansas<br>
Arkansas;7/4/2018;Independence Day;Arkansas<br>
Arkansas;9/3/2018;Labor Day;Arkansas<br>
Arkansas;11/12/2018;Veterans Day;Arkansas<br>
Arkansas;11/22/2018;Thanksgiving Day;Arkansas<br>
Arkansas;12/22/2018;Christmas Eve;Arkansas<br>
Arkansas;12/25/2018;Christmas Day;Arkansas<br>
Arkansas;1/1/2019;New Year’s Day;Arkansas<br>
Arkansas;1/21/2019;Martin Luther King, Jr. Birthday and Robert E. Lee’s Birthday;Arkansas<br>
Arkansas;2/18/2019;George Washington’s Birthday and Daisy Gatson Bates Day;Arkansas<br>
Arkansas;5/27/2019;Memorial Day;Arkansas<br>
Arkansas;7/4/2019;Independence Day;Arkansas<br>
Arkansas;9/2/2019;Labor Day;Arkansas<br>
Arkansas;11/11/2019;Veterans Day;Arkansas<br>
Arkansas;11/28/2019;Thanksgiving Day;Arkansas<br>
Arkansas;12/24/2019;Christmas Eve;Arkansas<br>
Arkansas;12/25/2019;Christmas Day;Arkansas<br>
Arkansas;1/1/2020;New Year’s Day;Arkansas<br>
Arkansas;1/20/2020;Martin Luther King, Jr. Birthday and Robert E. Lee’s Birthday;Arkansas<br>
Arkansas;2/17/2020;George Washington’s Birthday and Daisy Gatson Bates Day;Arkansas<br>
Arkansas;5/25/2020;Memorial Day;Arkansas<br>
Arkansas;7/3/2020;Independence Day;Arkansas<br>
Arkansas;9/7/2020;Labor Day;Arkansas<br>
Arkansas;11/11/2020;Veterans Day;Arkansas<br>
Arkansas;11/26/2020;Thanksgiving Day;Arkansas<br>
Arkansas;12/24/2020;Christmas Eve;Arkansas<br>
Arkansas;12/25/2020;Christmas Day;Arkansas<br>
California;1/2/2017;New Year's Day;California<br>
California;1/16/2017;Martin Luther King Jr.'s Birthday;California<br>
California;2/13/2017;Lincoln's Birthday;California<br>
California;2/20/2017;President's Day;California<br>
California;3/31/2017;César Chávez Day;California<br>
California;5/29/2017;Memorial Day;California<br>
California;7/4/2017;Independence Day;California<br>
California;9/4/2017;Labor Day;California<br>
California;10/9/2017;Columbus Day;California<br>
California;11/10/2017;Veterans Day Observed;California<br>
California;11/23/2017;Thanksgiving Day;California<br>
California;11/24/2017;Thanksgiving Friday;California<br>
California;12/25/2017;Christmas Day;California<br>
California;1/1/2018;New Year's Day;California<br>
California;1/15/2018;Martin Luther King Jr.'s Birthday;California<br>
California;2/12/2018;Lincoln's Birthday;California<br>
California;2/19/2018;Washington's Birthday;California<br>
California;3/31/2018;César Chávez Day;California<br>
California;5/28/2018;Memorial Day;California<br>
California;7/4/2018;Independence Day;California<br>
California;9/3/2018;Labor Day;California<br>
California;10/8/2018;Columbus Day;California<br>
California;11/12/2018;Veterans Day;California<br>
California;11/22/2018;Thanksgiving Day;California<br>
California;11/23/2018;Thanksgiving Friday;California<br>
California;12/25/2018;Christmas Day;California<br>
California;1/1/2019;New Year’s Day;California<br>
California;1/21/2019;Martin Luther King Jr.'s Birthday;California<br>
California;2/12/2019;Lincoln's Birthday;California<br>
California;2/18/2019;Washington’s Birthday;California<br>
California;4/1/2019;César Chávez Day;California<br>
California;5/27/2019;Memorial Day;California<br>
California;7/4/2019;Independence Day;California<br>
California;9/2/2019;Labor Day;California<br>
California;10/14/2019;Columbus Day;California<br>
California;11/11/2019;Veterans Day;California<br>
California;11/28/2019;Thanksgiving Day;California<br>
California;11/29/2019;Thanksgiving Friday;California<br>
California;12/25/2019;Christmas Day;California<br>
California;1/1/2020;New Year’s Day;California<br>
California;1/20/2020;Martin Luther King Jr.'s Birthday;California<br>
California;2/12/2020;Lincoln's Birthday;California<br>
California;2/17/2020;Washington’s Birthday;California<br>
California;3/31/2020;César Chávez Day;California<br>
California;5/25/2020;Memorial Day;California<br>
California;7/3/2020;Independence Day;California<br>
California;9/7/2020;Labor Day;California<br>
California;10/12/2020;Columbus Day;California<br>
California;11/11/2020;Veterans Day;California<br>
California;11/26/2020;Thanksgiving Day;California<br>
California;11/27/2020;Thanksgiving Friday;California<br>
California;12/25/2020;Christmas Day;California<br>
Colorado;1/2/2017;New Year's Day;Colorado<br>
Colorado;1/16/2017;Martin Luther King Jr.'s Birthday;Colorado<br>
Colorado;2/20/2017;President's Day;Colorado<br>
Colorado;5/29/2017;Memorial Day;Colorado<br>
Colorado;7/4/2017;Independence Day;Colorado<br>
Colorado;9/4/2017;Labor Day;Colorado<br>
Colorado;10/9/2017;Columbus Day;Colorado<br>
Colorado;11/10/2017;Veterans Day Observed;Colorado<br>
Colorado;11/23/2017;Thanksgiving Day;Colorado<br>
Colorado;12/25/2017;Christmas Day;Colorado<br>
Colorado;1/1/2018;New Year's Day;Colorado<br>
Colorado;1/15/2018;Martin Luther King Jr.'s Birthday;Colorado<br>
Colorado;2/19/2018;President's Day;Colorado<br>
Colorado;5/28/2018;Memorial Day;Colorado<br>
Colorado;7/4/2018;Independence Day;Colorado<br>
Colorado;9/3/2018;Labor Day;Colorado<br>
Colorado;10/8/2018;Columbus Day;Colorado<br>
Colorado;11/12/2018;Veterans Day;Colorado<br>
Colorado;11/22/2018;Thanksgiving Day;Colorado<br>
Colorado;12/25/2018;Christmas Day;Colorado<br>
Colorado;1/1/2019;New Year’s Day;Colorado<br>
Colorado;1/21/2019;Martin Luther King Jr.'s Birthday;Colorado<br>
Colorado;2/18/2019;President’s Day;Colorado<br>
Colorado;5/27/2019;Memorial Day;Colorado<br>
Colorado;7/4/2019;Independence Day;Colorado<br>
Colorado;9/2/2019;Labor Day;Colorado<br>
Colorado;10/14/2019;Columbus Day;Colorado<br>
Colorado;11/11/2019;Veterans Day;Colorado<br>
Colorado;11/28/2019;Thanksgiving Day;Colorado<br>
Colorado;12/25/2019;Christmas Day;Colorado<br>
Colorado;1/1/2020;New Year’s Day;Colorado<br>
Colorado;1/20/2020;Martin Luther King Jr.'s Birthday;Colorado<br>
Colorado;2/17/2020;President’s Day;Colorado<br>
Colorado;5/25/2020;Memorial Day;Colorado<br>
Colorado;7/3/2020;Independence Day;Colorado<br>
Colorado;9/7/2020;Labor Day;Colorado<br>
Colorado;10/12/2020;Columbus Day;Colorado<br>
Colorado;11/11/2020;Veterans Day;Colorado<br>
Colorado;11/26/2020;Thanksgiving Day;Colorado<br>
Colorado;12/25/2020;Christmas Day;Colorado<br>
Connecticut;1/2/2017;New Year's Day;Connecticut<br>
Connecticut;1/16/2017;Martin Luther King Jr.'s Birthday;Connecticut<br>
Connecticut;2/13/2017;Lincoln's Birthday ;Connecticut<br>
Connecticut;2/20/2017;Washington's Birthday ;Connecticut<br>
Connecticut;4/14/2017;Good Friday;Connecticut<br>
Connecticut;5/29/2017;Memorial Day;Connecticut<br>
Connecticut;7/4/2017;Independence Day;Connecticut<br>
Connecticut;9/4/2017;Labor Day ;Connecticut<br>
Connecticut;10/9/2017;Columbus Day;Connecticut<br>
Connecticut;11/10/2017;Veterans Day Observed;Connecticut<br>
Connecticut;11/23/2017;Thanksgiving Day;Connecticut<br>
Connecticut;12/25/2017;Christmas Day;Connecticut<br>
Connecticut;1/1/2018;New Year's Day;Connecticut<br>
Connecticut;1/15/2018;Martin Luther King Jr.'s Birthday;Connecticut<br>
Connecticut;2/12/2018;Lincoln's Birthday ;Connecticut<br>
Connecticut;2/19/2018;Washington's Birthday ;Connecticut<br>
Connecticut;3/30/2018;Good Friday;Connecticut<br>
Connecticut;5/28/2018;Memorial Day;Connecticut<br>
Connecticut;7/4/2018;Independence Day;Connecticut<br>
Connecticut;9/3/2018;Labor Day ;Connecticut<br>
Connecticut;10/8/2018;Columbus Day;Connecticut<br>
Connecticut;11/12/2018;Veterans Day;Connecticut<br>
Connecticut;11/22/2018;Thanksgiving Day;Connecticut<br>
Connecticut;12/25/2018;Christmas Day;Connecticut<br>
Connecticut;1/1/2019;New Year’s Day;Connecticut<br>
Connecticut;1/21/2019;Martin Luther King Jr.'s Birthday;Connecticut<br>
Connecticut;2/12/2019;Lincoln's Birthday ;Connecticut<br>
Connecticut;2/18/2019;Washington's Birthday ;Connecticut<br>
Connecticut;4/29/2019;Good Friday;Connecticut<br>
Connecticut;5/27/2019;Memorial Day;Connecticut<br>
Connecticut;7/4/2019;Independence Day;Connecticut<br>
Connecticut;9/2/2019;Labor Day ;Connecticut<br>
Connecticut;10/14/2019;Columbus Day;Connecticut<br>
Connecticut;11/11/2019;Veterans Day;Connecticut<br>
Connecticut;11/28/2019;Thanksgiving Day;Connecticut<br>
Connecticut;12/25/2019;Christmas Day;Connecticut<br>
Connecticut;1/1/2020;New Year’s Day;Connecticut<br>
Connecticut;1/20/2020;Martin Luther King Jr.'s Birthday;Connecticut<br>
Connecticut;2/12/2020;Lincoln's Birthday ;Connecticut<br>
Connecticut;2/17/2020;Washington's Birthday ;Connecticut<br>
Connecticut;4/10/2020;Good Friday;Connecticut<br>
Connecticut;5/25/2020;Memorial Day;Connecticut<br>
Connecticut;7/3/2020;Independence Day;Connecticut<br>
Connecticut;10/12/2020;Columbus Day;Connecticut<br>
Connecticut;11/11/2020;Veterans Day;Connecticut<br>
Connecticut;11/26/2020;Thanksgiving Day;Connecticut<br>
Connecticut;12/25/2020;Christmas Day;Connecticut<br>
Delaware;1/2/2017;New Year's Day;Delaware<br>
Delaware;1/16/2017;Martin Luther King Jr.'s Birthday;Delaware<br>
Delaware;4/14/2017;Good Friday;Delaware<br>
Delaware;5/29/2017;Memorial Day;Delaware<br>
Delaware;7/4/2017;Independence Day;Delaware<br>
Delaware;9/4/2017;Labor Day;Delaware<br>
Delaware;11/8/2017;Election Day;Delaware<br>
Delaware;11/10/2017;Veterans Day Observed;Delaware<br>
Delaware;11/23/2017;Thanksgiving Day;Delaware<br>
Delaware;11/24/2017;Thanksgiving Friday;Delaware<br>
Delaware;12/25/2017;Christmas Day;Delaware<br>
Delaware;1/1/2018;New Year's Day;Delaware<br>
Delaware;1/15/2018;Martin Luther King Jr.'s Birthday;Delaware<br>
Delaware;3/30/2018;Good Friday;Delaware<br>
Delaware;5/28/2018;Memorial Day;Delaware<br>
Delaware;7/4/2018;Independence Day;Delaware<br>
Delaware;9/3/2018;Labor Day;Delaware<br>
Delaware;11/6/2018;Election Day;Delaware<br>
Delaware;11/12/2018;Veterans Day;Delaware<br>
Delaware;11/22/2018;Thanksgiving Day;Delaware<br>
Delaware;11/23/2018;Thanksgiving Friday;Delaware<br>
Delaware;12/25/2018;Christmas Day;Delaware<br>
Delaware;1/1/2019;New Year’s Day;Delaware<br>
Delaware;1/21/2019;Martin Luther King Jr.'s Birthday;Delaware<br>
Delaware;4/29/2019;Good Friday;Delaware<br>
Delaware;5/27/2019;Memorial Day;Delaware<br>
Delaware;7/4/2019;Independence Day;Delaware<br>
Delaware;9/2/2019;Labor Day;Delaware<br>
Delaware;11/6/2019;Election Day;Delaware<br>
Delaware;11/8/2019;Returns Day (after 12:00 noon Sussex County);Delaware<br>
Delaware;11/11/2019;Veterans Day;Delaware<br>
Delaware;11/28/2019;Thanksgiving Day;Delaware<br>
Delaware;11/29/2019;Thanksgiving Friday;Delaware<br>
Delaware;12/25/2019;Christmas Day;Delaware<br>
Delaware;1/1/2020;New Year’s Day;Delaware<br>
Delaware;1/20/2020;Martin Luther King Jr.'s Birthday;Delaware<br>
Delaware;4/10/2020;Good Friday;Delaware<br>
Delaware;5/25/2020;Memorial Day;Delaware<br>
Delaware;7/3/2020;Independence Day;Delaware<br>
Delaware;9/7/2020;Labor Day;Delaware<br>
Delaware;11/11/2020;Veterans Day;Delaware<br>
Delaware;11/26/2020;Thanksgiving Day;Delaware<br>
Delaware;11/27/2020;Thanksgiving Friday;Delaware<br>
Delaware;12/25/2020;Christmas Day;Delaware<br>
Federal Court;1/2/2017;New Year's Day;Federal Court<br>
Federal Court;1/16/2017;Martin Luther King Jr.'s Birthday;Federal Court<br>
Federal Court;2/20/2017;President's Day;Federal Court<br>
Federal Court;5/29/2017;Memorial Day;Federal Court<br>
Federal Court;7/4/2017;Independence Day;Federal Court<br>
Federal Court;9/4/2017;Labor Day;Federal Court<br>
Federal Court;10/9/2017;Columbus Day;Federal Court<br>
Federal Court;11/10/2017;Veterans Day Observed;Federal Court<br>
Federal Court;11/23/2017;Thanksgiving Day;Federal Court<br>
Federal Court;12/25/2017;Christmas Day;Federal Court<br>
Federal Court;1/1/2018;New Year's Day;Federal Court<br>
Federal Court;1/15/2018;Martin Luther King Jr.'s Birthday;Federal Court<br>
Federal Court;2/19/2018;Washington's Birthday;Federal Court<br>
Federal Court;5/28/2018;Memorial Day;Federal Court<br>
Federal Court;7/4/2018;Independence Day;Federal Court<br>
Federal Court;9/3/2018;Labor Day;Federal Court<br>
Federal Court;10/8/2018;Columbus Day;Federal Court<br>
Federal Court;11/12/2018;Veterans Day;Federal Court<br>
Federal Court;11/22/2018;Thanksgiving Day;Federal Court<br>
Federal Court;12/25/2018;Christmas Day;Federal Court<br>
Federal Court;1/1/2019;New Year’s Day;Federal Court<br>
Federal Court;1/21/2019;Martin Luther King Jr.'s Birthday;Federal Court<br>
Federal Court;2/18/2019;Washington’s Birthday;Federal Court<br>
Federal Court;5/27/2019;Memorial Day;Federal Court<br>
Federal Court;7/4/2019;Independence Day;Federal Court<br>
Federal Court;9/2/2019;Labor Day;Federal Court<br>
Federal Court;10/14/2019;Columbus Day;Federal Court<br>
Federal Court;11/11/2019;Veterans Day;Federal Court<br>
Federal Court;11/28/2019;Thanksgiving Day;Federal Court<br>
Federal Court;12/25/2019;Christmas Day;Federal Court<br>
Federal Court;1/1/2020;New Year’s Day;Federal Court<br>
Federal Court;1/20/2020;Martin Luther King Jr.'s Birthday;Federal Court<br>
Federal Court;2/17/2020;Washington’s Birthday;Federal Court<br>
Federal Court;5/25/2020;Memorial Day;Federal Court<br>
Federal Court;7/3/2020;Independence Day;Federal Court<br>
Federal Court;9/7/2020;Labor Day;Federal Court<br>
Federal Court;10/12/2020;Columbus Day;Federal Court<br>
Federal Court;11/11/2020;Veterans Day;Federal Court<br>
Federal Court;11/26/2020;Thanksgiving Day;Federal Court<br>
Federal Court;12/25/2020;Christmas Day;Federal Court<br>
Florida;1/2/2017;New Year's Day;Florida<br>
Florida;1/16/2017;Martin Luther King Jr.'s Birthday;Florida<br>
Florida;2/20/2017;President's Day;Florida<br>
Florida;4/14/2017;Good Friday;Florida<br>
Florida;5/29/2017;Memorial Day;Florida<br>
Florida;7/4/2017;Independence Day;Florida<br>
Florida;9/4/2017;Labor Day    ;Florida<br>
Florida;9/5/2017;Rosh Hashanah;Florida<br>
Florida;9/30/2017;Yom Kippur;Florida<br>
Florida;11/10/2017;Veterans Day Observed;Florida<br>
Florida;11/23/2017;Thanksgiving Day  ;Florida<br>
Florida;11/24/2017;Thanksgiving Friday;Florida<br>
Florida;12/25/2017;Christmas Day;Florida<br>
Florida;1/1/2018;New Year's Day;Florida<br>
Florida;1/15/2018;Martin Luther King Jr.'s Birthday;Florida<br>
Florida;2/19/2018;President's Day;Florida<br>
Florida;3/30/2018;Good Friday;Florida<br>
Florida;5/28/2018;Memorial Day;Florida<br>
Florida;7/4/2018;Independence Day;Florida<br>
Florida;9/3/2018;Labor Day    ;Florida<br>
Florida;9/10/2018;Rosh Hashanah;Florida<br>
Florida;9/30/2018;Yom Kippur;Florida<br>
Florida;11/12/2018;Veterans Day;Florida<br>
Florida;11/22/2018;Thanksgiving Day  ;Florida<br>
Florida;11/23/2018;Thanksgiving Friday;Florida<br>
Florida;12/25/2018;Christmas Day;Florida<br>
Florida;1/1/2019;New Year’s Day;Florida<br>
Florida;1/21/2019;Martin Luther King Jr.'s Birthday;Florida<br>
Florida;2/18/2019;President’s Day;Florida<br>
Florida;4/29/2019;Good Friday;Florida<br>
Florida;5/27/2019;Memorial Day;Florida<br>
Florida;7/4/2019;Independence Day;Florida<br>
Florida;9/2/2019;Labor Day    ;Florida<br>
Florida;9/27/2019;Yom Kippur;Florida<br>
Florida;9/30/2019;Rosh Hashanah;Florida<br>
Florida;10/9/2019;Yom Kippur;Florida<br>
Florida;11/11/2019;Veterans Day;Florida<br>
Florida;11/28/2019;Thanksgiving Day  ;Florida<br>
Florida;11/29/2019;Thanksgiving Friday;Florida<br>
Florida;12/25/2019;Christmas Day;Florida<br>
Florida;1/1/2020;New Year’s Day;Florida<br>
Florida;1/20/2020;Martin Luther King Jr.'s Birthday;Florida<br>
Florida;2/17/2020;President’s Day;Florida<br>
Florida;4/10/2020;Good Friday;Florida<br>
Florida;5/25/2020;Memorial Day;Florida<br>
Florida;7/3/2020;Independence Day;Florida<br>
Florida;9/7/2020;Labor Day    ;Florida<br>
Florida;9/18/2020;Rosh Hashanah;Florida<br>
Florida;11/11/2020;Veterans Day;Florida<br>
Florida;11/26/2020;Thanksgiving Day  ;Florida<br>
Florida;11/27/2020;Thanksgiving Friday;Florida<br>
Florida;12/25/2020;Christmas Day;Florida<br>
Georgia;1/2/2017;New Year's Day;Georgia<br>
Georgia;1/16/2017;Martin Luther King Jr.'s Birthday;Georgia<br>
Georgia;4/24/2017;Confederate Memorial Day;Georgia<br>
Georgia;5/29/2017;Memorial Day ;Georgia<br>
Georgia;7/4/2017;Independence Day;Georgia<br>
Georgia;9/4/2017;Labor Day ;Georgia<br>
Georgia;10/9/2017;Columbus Day;Georgia<br>
Georgia;11/10/2017;Veterans Day Observed;Georgia<br>
Georgia;11/23/2017;Thanksgiving Day ;Georgia<br>
Georgia;11/24/2017;State Holiday ;Georgia<br>
Georgia;12/25/2017;Christmas Day ;Georgia<br>
Georgia;12/26/2017;Washington's Birthday;Georgia<br>
Georgia;1/1/2018;New Year's Day;Georgia<br>
Georgia;1/15/2018;Martin Luther King Jr.'s Birthday;Georgia<br>
Georgia;4/23/2018;Confederate Memorial Day;Georgia<br>
Georgia;5/28/2018;Memorial Day ;Georgia<br>
Georgia;7/4/2018;Independence Day;Georgia<br>
Georgia;9/3/2018;Labor Day ;Georgia<br>
Georgia;10/8/2018;Columbus Day;Georgia<br>
Georgia;11/12/2018;Veterans Day ;Georgia<br>
Georgia;11/22/2018;Thanksgiving Day ;Georgia<br>
Georgia;11/23/2018;State Holiday ;Georgia<br>
Georgia;12/25/2018;Christmas Day ;Georgia<br>
Georgia;12/26/2018;Washington's Birthday;Georgia<br>
Georgia;1/1/2019;New Year’s Day;Georgia<br>
Georgia;1/21/2019;Martin Luther King Jr.'s Birthday;Georgia<br>
Georgia;2/18/2019;Washington’s Birthday ;Georgia<br>
Georgia;4/22/2019;Confederate Memorial Day;Georgia<br>
Georgia;5/27/2019;Memorial Day ;Georgia<br>
Georgia;7/4/2019;Independence Day;Georgia<br>
Georgia;9/2/2019;Labor Day ;Georgia<br>
Georgia;10/14/2019;Columbus Day;Georgia<br>
Georgia;11/11/2019;Veterans Day ;Georgia<br>
Georgia;11/28/2019;Thanksgiving Day ;Georgia<br>
Georgia;11/29/2019;State Holiday ;Georgia<br>
Georgia;12/25/2019;Christmas Day ;Georgia<br>
Georgia;1/1/2020;New Year’s Day;Georgia<br>
Georgia;1/20/2020;Martin Luther King Jr.'s Birthday;Georgia<br>
Georgia;2/17/2020;Washington’s Birthday ;Georgia<br>
Georgia;4/27/2020;Confederate Memorial Day;Georgia<br>
Georgia;5/25/2020;Memorial Day ;Georgia<br>
Georgia;7/3/2020;Independence Day;Georgia<br>
Georgia;9/7/2020;Labor Day ;Georgia<br>
Georgia;10/12/2020;Columbus Day;Georgia<br>
Georgia;11/11/2020;Veterans Day ;Georgia<br>
Georgia;11/26/2020;Thanksgiving Day ;Georgia<br>
Georgia;11/27/2020;State Holiday ;Georgia<br>
Georgia;12/25/2020;Christmas Day ;Georgia<br>
Hawaii;1/2/2017;New Year's Day;Hawaii<br>
Hawaii;1/16/2017;Martin Luther King Jr.'s Birthday;Hawaii<br>
Hawaii;2/20/2017;President's Day;Hawaii<br>
Hawaii;3/27/2017;Prince Jonah Kuhio Kalanianaole Day;Hawaii<br>
Hawaii;4/14/2017;Good Friday;Hawaii<br>
Hawaii;5/29/2017;Memorial Day;Hawaii<br>
Hawaii;6/12/2017;King Kamehameha I Day;Hawaii<br>
Hawaii;7/4/2017;Independence Day;Hawaii<br>
Hawaii;8/18/2017;Statehood Day;Hawaii<br>
Hawaii;9/4/2017;Labor Day;Hawaii<br>
Hawaii;11/6/2017;General Election Day;Hawaii<br>
Hawaii;11/10/2017;Veterans Day Observed;Hawaii<br>
Hawaii;11/23/2017;Thanksgiving Day;Hawaii<br>
Hawaii;12/25/2017;Christmas Day;Hawaii<br>
Hawaii;1/1/2018;New Year's Day;Hawaii<br>
Hawaii;1/15/2018;Martin Luther King Jr.'s Birthday;Hawaii<br>
Hawaii;2/19/2018;President's Day;Hawaii<br>
Hawaii;3/26/2018;Prince Jonah Kuhio Kalanianaole Day;Hawaii<br>
Hawaii;3/30/2018;Good Friday;Hawaii<br>
Hawaii;5/28/2018;Memorial Day;Hawaii<br>
Hawaii;6/11/2018;King Kamehameha I Day;Hawaii<br>
Hawaii;7/4/2018;Independence Day;Hawaii<br>
Hawaii;8/17/2018;Statehood Day;Hawaii<br>
Hawaii;9/3/2018;Labor Day;Hawaii<br>
Hawaii;11/12/2018;Veterans Day;Hawaii<br>
Hawaii;11/22/2018;Thanksgiving Day;Hawaii<br>
Hawaii;12/25/2018;Christmas Day;Hawaii<br>
Hawaii;1/1/2019;New Year’s Day;Hawaii<br>
Hawaii;1/21/2019;Martin Luther King Jr.'s Birthday;Hawaii<br>
Hawaii;2/18/2019;President’s Day;Hawaii<br>
Hawaii;3/26/2019;Prince Jonah Kuhio Kalanianaole Day;Hawaii<br>
Hawaii;4/29/2019;Good Friday;Hawaii<br>
Hawaii;5/27/2019;Memorial Day;Hawaii<br>
Hawaii;6/11/2019;King Kamehameha I Day;Hawaii<br>
Hawaii;7/4/2019;Independence Day;Hawaii<br>
Hawaii;8/16/2019;Statehood Day;Hawaii<br>
Hawaii;8/21/2019;Statehood Day;Hawaii<br>
Hawaii;9/2/2019;Labor Day;Hawaii<br>
Hawaii;11/11/2019;Veterans Day;Hawaii<br>
Hawaii;11/28/2019;Thanksgiving Day;Hawaii<br>
Hawaii;12/25/2019;Christmas Day;Hawaii<br>
Hawaii;1/1/2020;New Year’s Day;Hawaii<br>
Hawaii;1/20/2020;Martin Luther King Jr.'s Birthday;Hawaii<br>
Hawaii;2/17/2020;President’s Day;Hawaii<br>
Hawaii;3/26/2020;Prince Jonah Kuhio Kalanianaole Day;Hawaii<br>
Hawaii;4/10/2020;Good Friday;Hawaii<br>
Hawaii;5/25/2020;Memorial Day;Hawaii<br>
Hawaii;6/11/2020;King Kamehameha I Day;Hawaii<br>
Hawaii;7/3/2020;Independence Day;Hawaii<br>
Hawaii;9/7/2020;Labor Day;Hawaii<br>
Hawaii;11/3/2020;General Election Day;Hawaii<br>
Hawaii;11/11/2020;Veterans Day;Hawaii<br>
Hawaii;11/26/2020;Thanksgiving Day;Hawaii<br>
Hawaii;12/25/2020;Christmas Day;Hawaii<br>
Idaho;1/2/2017;New Year's Day;Idaho<br>
Idaho;1/16/2017;Martin Luther King Jr. - Idaho Human Rights Day;Idaho<br>
Idaho;2/20/2017;President's Day;Idaho<br>
Idaho;5/29/2017;Memorial Day;Idaho<br>
Idaho;7/4/2017;Independence Day;Idaho<br>
Idaho;9/4/2017;Labor Day;Idaho<br>
Idaho;10/9/2017;Columbus Day;Idaho<br>
Idaho;11/10/2017;Veterans Day Observed;Idaho<br>
Idaho;11/23/2017;Thanksgiving Day;Idaho<br>
Idaho;12/25/2017;Christmas Day;Idaho<br>
Idaho;1/1/2018;New Year's Day;Idaho<br>
Idaho;1/15/2018;Martin Luther King Jr. - Idaho Human Rights Day;Idaho<br>
Idaho;2/19/2018;President's Day;Idaho<br>
Idaho;5/28/2018;Memorial Day;Idaho<br>
Idaho;7/4/2018;Independence Day;Idaho<br>
Idaho;9/3/2018;Labor Day;Idaho<br>
Idaho;10/8/2018;Columbus Day;Idaho<br>
Idaho;11/12/2018;Veterans Day;Idaho<br>
Idaho;11/22/2018;Thanksgiving Day;Idaho<br>
Idaho;12/25/2018;Christmas Day;Idaho<br>
Idaho;1/1/2019;New Year’s Day;Idaho<br>
Idaho;1/21/2019;Martin Luther King Jr. - Idaho Human Rights Day;Idaho<br>
Idaho;2/18/2019;President’s Day;Idaho<br>
Idaho;5/27/2019;Memorial Day;Idaho<br>
Idaho;7/4/2019;Independence Day;Idaho<br>
Idaho;9/2/2019;Labor Day;Idaho<br>
Idaho;10/14/2019;Columbus Day;Idaho<br>
Idaho;11/11/2019;Veterans Day;Idaho<br>
Idaho;11/28/2019;Thanksgiving Day;Idaho<br>
Idaho;12/25/2019;Christmas Day;Idaho<br>
Idaho;1/1/2020;New Year’s Day;Idaho<br>
Idaho;1/20/2020;Martin Luther King Jr. - Idaho Human Rights Day;Idaho<br>
Idaho;2/17/2020;President’s Day;Idaho<br>
Idaho;5/25/2020;Memorial Day;Idaho<br>
Idaho;7/3/2020;Independence Day;Idaho<br>
Idaho;9/7/2020;Labor Day;Idaho<br>
Idaho;10/12/2020;Columbus Day;Idaho<br>
Idaho;11/11/2020;Veterans Day;Idaho<br>
Idaho;11/26/2020;Thanksgiving Day;Idaho<br>
Idaho;12/25/2020;Christmas Day;Idaho<br>
Illinois;1/2/2017;New Year's Day;Illinois<br>
Illinois;1/16/2017;Martin Luther King Jr.'s Birthday;Illinois<br>
Illinois;2/12/2017;Lincoln's Birthday;Illinois<br>
Illinois;2/20/2017;Washington's Birthday;Illinois<br>
Illinois;5/29/2017;Memorial Day;Illinois<br>
Illinois;7/4/2017;Independence Day;Illinois<br>
Illinois;9/4/2017;Labor Day;Illinois<br>
Illinois;10/9/2017;Columbus Day;Illinois<br>
Illinois;11/10/2017;Veterans Day Observed;Illinois<br>
Illinois;11/23/2017;Thanksgiving Day;Illinois<br>
Illinois;11/24/2017;Thanksgiving Friday;Illinois<br>
Illinois;12/25/2017;Christmas Day;Illinois<br>
Illinois;1/1/2018;New Year's Day;Illinois<br>
Illinois;1/15/2018;Martin Luther King Jr.'s Birthday;Illinois<br>
Illinois;2/13/2018;Lincoln's Birthday;Illinois<br>
Illinois;2/19/2018;Washington's Birthday;Illinois<br>
Illinois;5/28/2018;Memorial Day;Illinois<br>
Illinois;7/4/2018;Independence Day;Illinois<br>
Illinois;9/3/2018;Labor Day;Illinois<br>
Illinois;10/8/2018;Columbus Day;Illinois<br>
Illinois;11/6/2018;General Election Day;Illinois<br>
Illinois;11/12/2018;Veterans Day;Illinois<br>
Illinois;11/22/2018;Thanksgiving Day;Illinois<br>
Illinois;11/23/2018;Thanksgiving Friday;Illinois<br>
Illinois;12/25/2018;Christmas Day;Illinois<br>
Illinois;1/1/2019;New Year’s Day;Illinois<br>
Illinois;1/21/2019;Martin Luther King Jr.'s Birthday;Illinois<br>
Illinois;2/12/2019;Lincoln's Birthday;Illinois<br>
Illinois;2/18/2019;Washington’s Birthday;Illinois<br>
Illinois;5/27/2019;Memorial Day;Illinois<br>
Illinois;7/4/2019;Independence Day;Illinois<br>
Illinois;9/2/2019;Labor Day;Illinois<br>
Illinois;10/14/2019;Columbus Day;Illinois<br>
Illinois;11/11/2019;Veterans Day;Illinois<br>
Illinois;11/28/2019;Thanksgiving Day;Illinois<br>
Illinois;11/29/2019;Thanksgiving Friday;Illinois<br>
Illinois;12/25/2019;Christmas Day;Illinois<br>
Illinois;1/1/2020;New Year’s Day;Illinois<br>
Illinois;1/20/2020;Martin Luther King Jr.'s Birthday;Illinois<br>
Illinois;2/12/2020;Lincoln's Birthday;Illinois<br>
Illinois;2/17/2020;Washington’s Birthday;Illinois<br>
Illinois;5/25/2020;Memorial Day;Illinois<br>
Illinois;7/3/2020;Independence Day;Illinois<br>
Illinois;9/7/2020;Labor Day;Illinois<br>
Illinois;10/12/2020;Columbus Day;Illinois<br>
Illinois;11/11/2020;Veterans Day;Illinois<br>
Illinois;11/26/2020;Thanksgiving Day;Illinois<br>
Illinois;11/27/2020;Thanksgiving Friday;Illinois<br>
Illinois;12/25/2020;Christmas Day;Illinois<br>
Indiana;1/2/2017;New Year's Day;Indiana<br>
Indiana;1/16/2017;Martin Luther King Jr.'s Birthday;Indiana<br>
Indiana;4/14/2017;Good Friday;Indiana<br>
Indiana;5/29/2017;Memorial Day;Indiana<br>
Indiana;7/4/2017;Independence Day;Indiana<br>
Indiana;9/4/2017;Labor Day;Indiana<br>
Indiana;10/9/2017;Columbus Day;Indiana<br>
Indiana;11/10/2017;Veterans Day Observed;Indiana<br>
Indiana;11/23/2017;Thanksgiving Day;Indiana<br>
Indiana;11/24/2017;Lincoln's Birthday;Indiana<br>
Indiana;12/25/2017;Christmas Day;Indiana<br>
Indiana;12/26/2017;Washington's Birthday;Indiana<br>
Indiana;1/1/2018;New Year's Day;Indiana<br>
Indiana;1/15/2018;Martin Luther King Jr.'s Birthday;Indiana<br>
Indiana;3/30/2018;Good Friday;Indiana<br>
Indiana;5/8/2018;Primary Election Day;Indiana<br>
Indiana;5/28/2018;Memorial Day;Indiana<br>
Indiana;7/4/2018;Independence Day;Indiana<br>
Indiana;9/3/2018;Labor Day;Indiana<br>
Indiana;10/8/2018;Columbus Day;Indiana<br>
Indiana;11/6/2018;General Election Day;Indiana<br>
Indiana;11/12/2018;Veterans Day;Indiana<br>
Indiana;11/22/2018;Thanksgiving Day;Indiana<br>
Indiana;11/23/2018;Lincoln's Birthday;Indiana<br>
Indiana;12/25/2018;Christmas Day;Indiana<br>
Indiana;12/26/2018;Washington's Birthday;Indiana<br>
Indiana;1/1/2019;New Year’s Day;Indiana<br>
Indiana;1/21/2019;Martin Luther King Jr.'s Birthday;Indiana<br>
Indiana;2/18/2019;Washington's Birthday;Indiana<br>
Indiana;4/29/2019;Good Friday;Indiana<br>
Indiana;5/27/2019;Memorial Day;Indiana<br>
Indiana;7/4/2019;Independence Day;Indiana<br>
Indiana;9/2/2019;Labor Day;Indiana<br>
Indiana;10/14/2019;Columbus Day;Indiana<br>
Indiana;11/11/2019;Veterans Day;Indiana<br>
Indiana;11/28/2019;Thanksgiving Day;Indiana<br>
Indiana;11/29/2019;Lincoln's Birthday;Indiana<br>
Indiana;12/25/2019;Christmas Day;Indiana<br>
Indiana;1/1/2020;New Year’s Day;Indiana<br>
Indiana;1/20/2020;Martin Luther King Jr.'s Birthday;Indiana<br>
Indiana;2/17/2020;Washington's Birthday;Indiana<br>
Indiana;4/10/2020;Good Friday;Indiana<br>
Indiana;5/25/2020;Memorial Day;Indiana<br>
Indiana;7/3/2020;Independence Day;Indiana<br>
Indiana;9/7/2020;Labor Day;Indiana<br>
Indiana;10/12/2020;Columbus Day;Indiana<br>
Indiana;11/11/2020;Veterans Day;Indiana<br>
Indiana;11/26/2020;Thanksgiving Day;Indiana<br>
Indiana;11/27/2020;Lincoln's Birthday;Indiana<br>
Indiana;12/25/2020;Christmas Day;Indiana<br>
Iowa;1/2/2017;New Year's Day;Iowa<br>
Iowa;1/16/2017;Martin Luther King Jr.'s Birthday;Iowa<br>
Iowa;5/29/2017;Memorial Day;Iowa<br>
Iowa;7/4/2017;Independence Day;Iowa<br>
Iowa;9/4/2017;Labor Day;Iowa<br>
Iowa;11/10/2017;Veterans Day Observed;Iowa<br>
Iowa;11/23/2017;Thanksgiving Day;Iowa<br>
Iowa;11/24/2017;Thanksgiving Friday;Iowa<br>
Iowa;12/25/2017;Christmas Day;Iowa<br>
Iowa;1/1/2018;New Year's Day;Iowa<br>
Iowa;1/15/2018;Martin Luther King Jr.'s Birthday;Iowa<br>
Iowa;5/28/2018;Memorial Day;Iowa<br>
Iowa;7/4/2018;Independence Day;Iowa<br>
Iowa;9/3/2018;Labor Day;Iowa<br>
Iowa;11/12/2018;Veterans Day;Iowa<br>
Iowa;11/22/2018;Thanksgiving Day;Iowa<br>
Iowa;11/23/2018;Thanksgiving Friday;Iowa<br>
Iowa;12/25/2018;Christmas Day;Iowa<br>
Iowa;1/1/2019;New Year’s Day;Iowa<br>
Iowa;1/21/2019;Martin Luther King Jr.'s Birthday;Iowa<br>
Iowa;5/27/2019;Memorial Day;Iowa<br>
Iowa;7/4/2019;Independence Day;Iowa<br>
Iowa;9/2/2019;Labor Day;Iowa<br>
Iowa;11/11/2019;Veterans Day;Iowa<br>
Iowa;11/28/2019;Thanksgiving Day;Iowa<br>
Iowa;11/29/2019;Thanksgiving Friday;Iowa<br>
Iowa;12/25/2019;Christmas Day;Iowa<br>
Iowa;1/1/2020;New Year’s Day;Iowa<br>
Iowa;1/20/2020;Martin Luther King Jr.'s Birthday;Iowa<br>
Iowa;5/25/2020;Memorial Day;Iowa<br>
Iowa;7/3/2020;Independence Day;Iowa<br>
Iowa;9/7/2020;Labor Day;Iowa<br>
Iowa;11/11/2020;Veterans Day;Iowa<br>
Iowa;11/26/2020;Thanksgiving Day;Iowa<br>
Iowa;11/27/2020;Thanksgiving Friday;Iowa<br>
Iowa;12/25/2020;Christmas Day;Iowa<br>
Kansas;1/2/2017;New Year's Day;Kansas<br>
Kansas;1/16/2017;Martin Luther King Jr.'s Birthday;Kansas<br>
Kansas;2/20/2017;Washington's Birthday;Kansas<br>
Kansas;5/29/2017;Memorial Day;Kansas<br>
Kansas;7/4/2017;Independence Day;Kansas<br>
Kansas;9/4/2017;Labor Day;Kansas<br>
Kansas;10/9/2017;Columbus Day;Kansas<br>
Kansas;11/10/2017;Veterans Day Observed;Kansas<br>
Kansas;11/23/2017;Thanksgiving Day;Kansas<br>
Kansas;11/24/2017;Thanksgiving Friday;Kansas<br>
Kansas;12/25/2017;Christmas Day;Kansas<br>
Kansas;1/1/2018;New Year's Day;Kansas<br>
Kansas;1/15/2018;Martin Luther King Jr.'s Birthday;Kansas<br>
Kansas;2/19/2018;Washington's Birthday;Kansas<br>
Kansas;5/28/2018;Memorial Day;Kansas<br>
Kansas;7/4/2018;Independence Day;Kansas<br>
Kansas;9/3/2018;Labor Day;Kansas<br>
Kansas;10/8/2018;Columbus Day;Kansas<br>
Kansas;11/12/2018;Veterans Day;Kansas<br>
Kansas;11/22/2018;Thanksgiving Day;Kansas<br>
Kansas;11/23/2018;Thanksgiving Friday;Kansas<br>
Kansas;12/25/2018;Christmas Day;Kansas<br>
Kansas;1/1/2019;New Year’s Day;Kansas<br>
Kansas;1/21/2019;Martin Luther King Jr.'s Birthday;Kansas<br>
Kansas;2/18/2019;Washington’s Birthday;Kansas<br>
Kansas;5/27/2019;Memorial Day;Kansas<br>
Kansas;7/4/2019;Independence Day;Kansas<br>
Kansas;9/2/2019;Labor Day;Kansas<br>
Kansas;10/14/2019;Columbus Day;Kansas<br>
Kansas;11/11/2019;Veterans Day;Kansas<br>
Kansas;11/28/2019;Thanksgiving Day;Kansas<br>
Kansas;11/29/2019;Thanksgiving Friday;Kansas<br>
Kansas;12/25/2019;Christmas Day;Kansas<br>
Kansas;1/1/2020;New Year’s Day;Kansas<br>
Kansas;1/20/2020;Martin Luther King Jr.'s Birthday;Kansas<br>
Kansas;2/17/2020;Washington’s Birthday;Kansas<br>
Kansas;5/25/2020;Memorial Day;Kansas<br>
Kansas;7/3/2020;Independence Day;Kansas<br>
Kansas;9/7/2020;Labor Day;Kansas<br>
Kansas;10/12/2020;Columbus Day;Kansas<br>
Kansas;11/11/2020;Veterans Day;Kansas<br>
Kansas;11/26/2020;Thanksgiving Day;Kansas<br>
Kansas;11/27/2020;Thanksgiving Friday;Kansas<br>
Kansas;12/25/2020;Christmas Day;Kansas<br>
Kentucky;1/2/2017;New Year's Day;Kentucky<br>
Kentucky;1/16/2017;Martin Luther King Jr.'s Birthday;Kentucky<br>
Kentucky;4/14/2017;Spring Holiday – Half Day;Kentucky<br>
Kentucky;5/29/2017;Memorial Day;Kentucky<br>
Kentucky;7/4/2017;Independence Day;Kentucky<br>
Kentucky;9/4/2017;Labor Day;Kentucky<br>
Kentucky;11/8/2017;Presidential Election;Kentucky<br>
Kentucky;11/10/2017;Veterans Day Observed;Kentucky<br>
Kentucky;11/23/2017;Thanksgiving Day;Kentucky<br>
Kentucky;11/24/2017;Thanksgiving Friday;Kentucky<br>
Kentucky;12/25/2017;Christmas Day;Kentucky<br>
Kentucky;1/1/2018;New Year's Day;Kentucky<br>
Kentucky;1/15/2018;Martin Luther King Jr.'s Birthday;Kentucky<br>
Kentucky;3/30/2018;Spring Holiday – Half Day;Kentucky<br>
Kentucky;5/28/2018;Memorial Day;Kentucky<br>
Kentucky;7/4/2018;Independence Day;Kentucky<br>
Kentucky;9/3/2018;Labor Day;Kentucky<br>
Kentucky;11/12/2018;Veterans Day;Kentucky<br>
Kentucky;11/22/2018;Thanksgiving Day;Kentucky<br>
Kentucky;11/23/2018;Thanksgiving Friday;Kentucky<br>
Kentucky;12/25/2018;Christmas Day;Kentucky<br>
Kentucky;1/1/2019;New Year’s Day;Kentucky<br>
Kentucky;1/21/2019;Martin Luther King Jr.'s Birthday;Kentucky<br>
Kentucky;3/30/2019;Spring Holiday – Half Day;Kentucky<br>
Kentucky;5/27/2019;Memorial Day;Kentucky<br>
Kentucky;7/4/2019;Independence Day;Kentucky<br>
Kentucky;9/2/2019;Labor Day;Kentucky<br>
Kentucky;11/11/2019;Veterans Day;Kentucky<br>
Kentucky;11/28/2019;Thanksgiving Day;Kentucky<br>
Kentucky;11/29/2019;Thanksgiving Friday;Kentucky<br>
Kentucky;12/24/2019;Christmas Eve;Kentucky<br>
Kentucky;12/25/2019;Christmas Day;Kentucky<br>
Kentucky;12/31/2019;New Year’s Eve;Kentucky<br>
Kentucky;1/1/2020;New Year’s Day;Kentucky<br>
Kentucky;1/20/2020;Martin Luther King Jr.'s Birthday;Kentucky<br>
Kentucky;5/25/2020;Memorial Day;Kentucky<br>
Kentucky;7/3/2020;Independence Day;Kentucky<br>
Kentucky;9/7/2020;Labor Day;Kentucky<br>
Kentucky;11/11/2020;Veterans Day;Kentucky<br>
Kentucky;11/26/2020;Thanksgiving Day;Kentucky<br>
Kentucky;11/27/2020;Thanksgiving Friday;Kentucky<br>
Kentucky;12/24/2020;Christmas Eve;Kentucky<br>
Kentucky;12/25/2020;Christmas Day;Kentucky<br>
Kentucky;12/31/2020;New Year's Eve;Kentucky<br>
Louisiana;1/2/2017;New Year's Day;Louisiana<br>
Louisiana;1/16/2017;Martin Luther King Jr.'s Birthday;Louisiana<br>
Louisiana;2/20/2017;Washington's Birthday;Louisiana<br>
Louisiana;2/28/2017;Mardi Gras;Louisiana<br>
Louisiana;4/14/2017;Good Friday;Louisiana<br>
Louisiana;5/29/2017;Memorial Day;Louisiana<br>
Louisiana;7/4/2017;Independence Day;Louisiana<br>
Louisiana;9/4/2017;Labor Day;Louisiana<br>
Louisiana;11/1/2017;All Saints Day;Louisiana<br>
Louisiana;11/23/2017;Thanksgiving Day;Louisiana<br>
Louisiana;11/24/2017;Thanksgiving Friday;Louisiana<br>
Louisiana;12/25/2017;Christmas Day;Louisiana<br>
Louisiana;1/1/2018;New Year's Day;Louisiana<br>
Louisiana;1/15/2018;Martin Luther King Jr.'s Birthday;Louisiana<br>
Louisiana;2/13/2018;Mardi Gras;Louisiana<br>
Louisiana;2/19/2018;Washington's Birthday;Louisiana<br>
Louisiana;3/30/2018;Good Friday;Louisiana<br>
Louisiana;5/28/2018;Memorial Day;Louisiana<br>
Louisiana;7/4/2018;Independence Day;Louisiana<br>
Louisiana;9/3/2018;Labor Day;Louisiana<br>
Louisiana;11/1/2018;All Saints Day;Louisiana<br>
Louisiana;11/6/2018;General Election Day;Louisiana<br>
Louisiana;11/12/2018;Veterans Day;Louisiana<br>
Louisiana;11/22/2018;Thanksgiving Day;Louisiana<br>
Louisiana;11/23/2018;Thanksgiving Friday;Louisiana<br>
Louisiana;12/25/2018;Christmas Day;Louisiana<br>
Louisiana;1/1/2019;New Year’s Day;Louisiana<br>
Louisiana;1/21/2019;Martin Luther King Jr.'s Birthday;Louisiana<br>
Louisiana;2/18/2019;Washington's Birthday;Louisiana<br>
Louisiana;3/5/2019;Mardi Gras;Louisiana<br>
Louisiana;4/19/2019;Good Friday;Louisiana<br>
Louisiana;5/27/2019;Memorial Day;Louisiana<br>
Louisiana;7/4/2019;Independence Day;Louisiana<br>
Louisiana;9/2/2019;Labor Day;Louisiana<br>
Louisiana;11/1/2019;All Saints Day;Louisiana<br>
Louisiana;11/11/2019;Veterans Day;Louisiana<br>
Louisiana;11/28/2019;Thanksgiving Day;Louisiana<br>
Louisiana;11/29/2019;Thanksgiving Friday;Louisiana<br>
Louisiana;12/25/2019;Christmas Day;Louisiana<br>
Louisiana;1/1/2020;New Year’s Day;Louisiana<br>
Louisiana;1/20/2020;Martin Luther King Jr.'s Birthday;Louisiana<br>
Louisiana;2/17/2020;Washington's Birthday;Louisiana<br>
Louisiana;3/5/2020;Mardi Gras;Louisiana<br>
Louisiana;4/10/2020;Good Friday;Louisiana<br>
Louisiana;5/25/2020;Memorial Day;Louisiana<br>
Louisiana;7/3/2020;Independence Day;Louisiana<br>
Louisiana;9/2/2020;Labor Day;Louisiana<br>
Louisiana;11/1/2020;All Saints Day;Louisiana<br>
Louisiana;11/3/2020;General Election Day;Louisiana<br>
Louisiana;11/11/2020;Veterans Day;Louisiana<br>
Louisiana;11/26/2020;Thanksgiving Day;Louisiana<br>
Louisiana;11/27/2020;Thanksgiving Friday;Louisiana<br>
Louisiana;12/25/2020;Christmas Day;Louisiana<br>
Maine;1/2/2017;New Year's Day;Maine<br>
Maine;1/16/2017;Martin Luther King Jr.'s Birthday;Maine<br>
Maine;2/20/2017;Washington's Birthday;Maine<br>
Maine;4/17/2017;Patriot's Day;Maine<br>
Maine;5/29/2017;Memorial Day;Maine<br>
Maine;7/4/2017;Independence Day;Maine<br>
Maine;9/4/2017;Labor Day;Maine<br>
Maine;10/9/2017;Columbus Day, Monday;Maine<br>
Maine;11/10/2017;Veterans' Day, Friday;Maine<br>
Maine;11/23/2017;Thanksgiving Day;Maine<br>
Maine;11/24/2017;Thanksgiving Friday;Maine<br>
Maine;12/25/2017;Christmas Day;Maine<br>
Maine;1/1/2018;New Year's Day;Maine<br>
Maine;1/15/2018;Martin Luther King Jr.'s Birthday;Maine<br>
Maine;2/19/2018;Washington's Birthday;Maine<br>
Maine;4/16/2018;Patriot's Day;Maine<br>
Maine;5/28/2018;Memorial Day;Maine<br>
Maine;7/4/2018;Independence Day;Maine<br>
Maine;9/3/2018;Labor Day;Maine<br>
Maine;10/8/2018;Columbus Day, Monday;Maine<br>
Maine;11/12/2018;Veterans' Day, Friday;Maine<br>
Maine;11/22/2018;Thanksgiving Day;Maine<br>
Maine;11/23/2018;Thanksgiving Friday;Maine<br>
Maine;12/25/2018;Christmas Day;Maine<br>
Maine;1/1/2019;New Year’s Day;Maine<br>
Maine;1/21/2019;Martin Luther King Jr.'s Birthday;Maine<br>
Maine;2/18/2019;Washington's Birthday;Maine<br>
Maine;4/15/2019;Patriot's Day;Maine<br>
Maine;5/27/2019;Memorial Day;Maine<br>
Maine;7/4/2019;Independence Day;Maine<br>
Maine;9/2/2019;Labor Day;Maine<br>
Maine;10/14/2019;Columbus Day, Monday;Maine<br>
Maine;11/11/2019;Veterans' Day, Friday;Maine<br>
Maine;11/28/2019;Thanksgiving Day;Maine<br>
Maine;11/29/2019;Thanksgiving Friday;Maine<br>
Maine;12/25/2019;Christmas Day;Maine<br>
Maine;1/1/2020;New Year’s Day;Maine<br>
Maine;1/20/2020;Martin Luther King Jr.'s Birthday;Maine<br>
Maine;2/17/2020;Washington's Birthday;Maine<br>
Maine;4/20/2020;Patriot's Day;Maine<br>
Maine;5/25/2020;Memorial Day;Maine<br>
Maine;7/3/2020;Independence Day;Maine<br>
Maine;9/7/2020;Labor Day;Maine<br>
Maine;10/12/2020;Columbus Day, Monday;Maine<br>
Maine;11/11/2020;Veterans' Day, Friday;Maine<br>
Maine;11/26/2020;Thanksgiving Day;Maine<br>
Maine;11/27/2020;Thanksgiving Friday;Maine<br>
Maine;12/25/2020;Christmas Day;Maine<br>
Maryland;1/2/2017;New Year's Day;Maryland<br>
Maryland;1/16/2017;Martin Luther King Jr.'s Birthday;Maryland<br>
Maryland;2/20/2017;President's Day;Maryland<br>
Maryland;5/29/2017;Memorial Day;Maryland<br>
Maryland;7/4/2017;Independence Day;Maryland<br>
Maryland;9/4/2017;Labor Day;Maryland<br>
Maryland;10/9/2017;Columbus Day;Maryland<br>
Maryland;11/8/2017;Election Day;Maryland<br>
Maryland;11/10/2017;Veterans Day Observed;Maryland<br>
Maryland;11/23/2017;Thanksgiving Day;Maryland<br>
Maryland;11/24/2017;American Indian Heritage Day;Maryland<br>
Maryland;12/25/2017;Christmas Day;Maryland<br>
Maryland;1/1/2018;New Year's Day;Maryland<br>
Maryland;1/15/2018;Martin Luther King Jr.'s Birthday;Maryland<br>
Maryland;2/19/2018;President's Day;Maryland<br>
Maryland;5/28/2018;Memorial Day;Maryland<br>
Maryland;7/4/2018;Independence Day;Maryland<br>
Maryland;9/3/2018;Labor Day;Maryland<br>
Maryland;10/8/2018;Columbus Day;Maryland<br>
Maryland;11/6/2018;Election Day;Maryland<br>
Maryland;11/12/2018;Veterans Day;Maryland<br>
Maryland;11/22/2018;Thanksgiving Day;Maryland<br>
Maryland;11/23/2018;American Indian Heritage Day;Maryland<br>
Maryland;12/25/2018;Christmas Day;Maryland<br>
Maryland;1/1/2019;New Year’s Day;Maryland<br>
Maryland;1/21/2019;Martin Luther King Jr.'s Birthday;Maryland<br>
Maryland;2/18/2019;President’s Day;Maryland<br>
Maryland;5/27/2019;Memorial Day;Maryland<br>
Maryland;7/4/2019;Independence Day;Maryland<br>
Maryland;9/2/2019;Labor Day;Maryland<br>
Maryland;10/14/2019;Columbus Day;Maryland<br>
Maryland;11/11/2019;Veterans Day;Maryland<br>
Maryland;11/28/2019;Thanksgiving Day;Maryland<br>
Maryland;11/29/2019;American Indian Heritage Day;Maryland<br>
Maryland;12/25/2019;Christmas Day;Maryland<br>
Maryland;1/1/2020;New Year’s Day;Maryland<br>
Maryland;1/20/2020;Martin Luther King Jr.'s Birthday;Maryland<br>
Maryland;2/17/2020;President’s Day;Maryland<br>
Maryland;5/25/2020;Memorial Day;Maryland<br>
Maryland;7/3/2020;Independence Day;Maryland<br>
Maryland;9/7/2020;Labor Day;Maryland<br>
Maryland;10/12/2020;Columbus Day;Maryland<br>
Maryland;11/11/2020;Veterans Day;Maryland<br>
Maryland;11/26/2020;Thanksgiving Day;Maryland<br>
Maryland;11/27/2020;American Indian Heritage Day;Maryland<br>
Maryland;12/25/2020;Christmas Day;Maryland<br>
Massachusetts;1/2/2017;New Year's Day;Massachusetts<br>
Massachusetts;1/16/2017;Martin Luther King Jr.'s Birthday;Massachusetts<br>
Massachusetts;2/20/2017;President's Day;Massachusetts<br>
Massachusetts;4/17/2017;Patriot's Day;Massachusetts<br>
Massachusetts;5/29/2017;Memorial Day;Massachusetts<br>
Massachusetts;7/4/2017;Independence Day;Massachusetts<br>
Massachusetts;9/4/2017;Labor Day;Massachusetts<br>
Massachusetts;10/9/2017;Columbus Day;Massachusetts<br>
Massachusetts;11/10/2017;Veterans Day Observed;Massachusetts<br>
Massachusetts;11/23/2017;Thanksgiving Day;Massachusetts<br>
Massachusetts;12/23/2017;Thanksgiving Day;Massachusetts<br>
Massachusetts;12/25/2017;Christmas Day;Massachusetts<br>
Massachusetts;1/1/2018;New Year's Day;Massachusetts<br>
Massachusetts;1/15/2018;Martin Luther King Jr.'s Birthday;Massachusetts<br>
Massachusetts;2/19/2018;President's Day;Massachusetts<br>
Massachusetts;4/16/2018;Patriot's Day;Massachusetts<br>
Massachusetts;5/28/2018;Memorial Day;Massachusetts<br>
Massachusetts;7/4/2018;Independence Day;Massachusetts<br>
Massachusetts;9/3/2018;Labor Day;Massachusetts<br>
Massachusetts;10/8/2018;Columbus Day;Massachusetts<br>
Massachusetts;11/12/2018;Veterans Day;Massachusetts<br>
Massachusetts;11/22/2018;Thanksgiving Day;Massachusetts<br>
Massachusetts;12/25/2018;Christmas Day;Massachusetts<br>
Massachusetts;1/1/2019;New Year’s Day;Massachusetts<br>
Massachusetts;1/21/2019;Martin Luther King Jr.'s Birthday;Massachusetts<br>
Massachusetts;2/18/2019;President’s Day;Massachusetts<br>
Massachusetts;4/15/2019;Patriot's Day;Massachusetts<br>
Massachusetts;5/27/2019;Memorial Day;Massachusetts<br>
Massachusetts;7/4/2019;Independence Day;Massachusetts<br>
Massachusetts;9/2/2019;Labor Day;Massachusetts<br>
Massachusetts;10/14/2019;Columbus Day;Massachusetts<br>
Massachusetts;11/11/2019;Veterans Day;Massachusetts<br>
Massachusetts;11/28/2019;Thanksgiving Day;Massachusetts<br>
Massachusetts;12/25/2019;Christmas Day;Massachusetts<br>
Massachusetts;1/1/2020;New Year’s Day;Massachusetts<br>
Massachusetts;1/20/2020;Martin Luther King Jr.'s Birthday;Massachusetts<br>
Massachusetts;2/17/2020;President’s Day;Massachusetts<br>
Massachusetts;4/20/2020;Patriot's Day;Massachusetts<br>
Massachusetts;5/25/2020;Memorial Day;Massachusetts<br>
Massachusetts;7/3/2020;Independence Day;Massachusetts<br>
Massachusetts;9/7/2020;Labor Day;Massachusetts<br>
Massachusetts;10/12/2020;Columbus Day;Massachusetts<br>
Massachusetts;11/11/2020;Veterans Day;Massachusetts<br>
Massachusetts;11/26/2020;Thanksgiving Day;Massachusetts<br>
Massachusetts;12/25/2020;Christmas Day;Massachusetts<br>
Michigan;1/2/2017;New Year's Day;Michigan<br>
Michigan;1/16/2017;Martin Luther King Jr.'s Birthday;Michigan<br>
Michigan;2/20/2017;Washington's Birthday;Michigan<br>
Michigan;5/29/2017;Memorial Day;Michigan<br>
Michigan;7/4/2017;Independence Day;Michigan<br>
Michigan;9/4/2017;Labor Day;Michigan<br>
Michigan;10/9/2017;Columbus Day;Michigan<br>
Michigan;11/10/2017;Veterans Day Observed;Michigan<br>
Michigan;11/23/2017;Thanksgiving Day;Michigan<br>
Michigan;11/24/2017;Thanksgiving Friday;Michigan<br>
Michigan;12/22/2017;Christmas Eve;Michigan<br>
Michigan;12/22/2017;Christmas Holiday;Michigan<br>
Michigan;12/25/2017;Christmas Day;Michigan<br>
Michigan;1/1/2018;New Year's Day;Michigan<br>
Michigan;1/15/2018;Martin Luther King Jr.'s Birthday;Michigan<br>
Michigan;2/19/2018;Washington's Birthday;Michigan<br>
Michigan;5/28/2018;Memorial Day;Michigan<br>
Michigan;7/4/2018;Independence Day;Michigan<br>
Michigan;9/3/2018;Labor Day;Michigan<br>
Michigan;10/8/2018;Columbus Day;Michigan<br>
Michigan;11/12/2018;Veterans Day;Michigan<br>
Michigan;11/22/2018;Thanksgiving Day;Michigan<br>
Michigan;11/23/2018;Thanksgiving Friday;Michigan<br>
Michigan;12/24/2018;Christmans Eve;Michigan<br>
Michigan;12/25/2018;Christmas Day;Michigan<br>
Michigan;1/1/2019;New Year’s Day;Michigan<br>
Michigan;1/21/2019;Martin Luther King Jr.'s Birthday;Michigan<br>
Michigan;2/18/2019;Washington’s Birthday;Michigan<br>
Michigan;5/27/2019;Memorial Day;Michigan<br>
Michigan;7/4/2019;Independence Day;Michigan<br>
Michigan;9/2/2019;Labor Day;Michigan<br>
Michigan;10/14/2019;Columbus Day;Michigan<br>
Michigan;11/11/2019;Veterans Day;Michigan<br>
Michigan;11/28/2019;Thanksgiving Day;Michigan<br>
Michigan;11/29/2019;Thanksgiving Friday;Michigan<br>
Michigan;12/24/2019;Christmas Eve;Michigan<br>
Michigan;12/25/2019;Christmas Day;Michigan<br>
Michigan;1/1/2020;New Year’s Day;Michigan<br>
Michigan;1/20/2020;Martin Luther King Jr.'s Birthday;Michigan<br>
Michigan;2/17/2020;Washington’s Birthday;Michigan<br>
Michigan;5/25/2020;Memorial Day;Michigan<br>
Michigan;7/3/2020;Independence Day;Michigan<br>
Michigan;9/7/2020;Labor Day;Michigan<br>
Michigan;10/12/2020;Columbus Day;Michigan<br>
Michigan;11/11/2020;Veterans Day;Michigan<br>
Michigan;11/26/2020;Thanksgiving Day;Michigan<br>
Michigan;11/27/2020;Thanksgiving Friday;Michigan<br>
Michigan;12/24/2020;Christmans Eve;Michigan<br>
Michigan;12/25/2020;Christmas Day;Michigan<br>
Minnesota;1/2/2017;New Year's Day;Minnesota<br>
Minnesota;1/16/2017;Martin Luther King Jr.'s Birthday;Minnesota<br>
Minnesota;2/20/2017;Washington's Birthday;Minnesota<br>
Minnesota;5/29/2017;Memorial Day;Minnesota<br>
Minnesota;7/4/2017;Independence Day;Minnesota<br>
Minnesota;9/4/2017;Labor Day;Minnesota<br>
Minnesota;11/10/2017;Veterans Day Observed;Minnesota<br>
Minnesota;11/23/2017;Thanksgiving Day;Minnesota<br>
Minnesota;11/24/2017;Thanksgiving Friday;Minnesota<br>
Minnesota;12/25/2017;Christmas Day;Minnesota<br>
Minnesota;1/1/2018;New Year's Day;Minnesota<br>
Minnesota;1/15/2018;Martin Luther King Jr.'s Birthday;Minnesota<br>
Minnesota;2/19/2018;Washington's Birthday;Minnesota<br>
Minnesota;5/28/2018;Memorial Day;Minnesota<br>
Minnesota;7/4/2018;Independence Day;Minnesota<br>
Minnesota;9/3/2018;Labor Day;Minnesota<br>
Minnesota;11/12/2018;Veterans Day;Minnesota<br>
Minnesota;11/22/2018;Thanksgiving Day;Minnesota<br>
Minnesota;11/23/2018;Thanksgiving Friday;Minnesota<br>
Minnesota;12/25/2018;Christmas Day;Minnesota<br>
Minnesota;1/1/2019;New Year’s Day;Minnesota<br>
Minnesota;1/21/2019;Martin Luther King Jr.'s Birthday;Minnesota<br>
Minnesota;2/18/2019;Washington’s Birthday;Minnesota<br>
Minnesota;5/27/2019;Memorial Day;Minnesota<br>
Minnesota;7/4/2019;Independence Day;Minnesota<br>
Minnesota;9/2/2019;Labor Day;Minnesota<br>
Minnesota;11/11/2019;Veterans Day;Minnesota<br>
Minnesota;11/28/2019;Thanksgiving Day;Minnesota<br>
Minnesota;11/29/2019;Thanksgiving Friday;Minnesota<br>
Minnesota;12/25/2019;Christmas Day;Minnesota<br>
Minnesota;1/1/2020;New Year’s Day;Minnesota<br>
Minnesota;1/20/2020;Martin Luther King Jr.'s Birthday;Minnesota<br>
Minnesota;2/17/2020;Washington’s Birthday;Minnesota<br>
Minnesota;5/25/2020;Memorial Day;Minnesota<br>
Minnesota;7/3/2020;Independence Day;Minnesota<br>
Minnesota;9/7/2020;Labor Day;Minnesota<br>
Minnesota;11/11/2020;Veterans Day;Minnesota<br>
Minnesota;11/26/2020;Thanksgiving Day;Minnesota<br>
Minnesota;11/27/2020;Thanksgiving Friday;Minnesota<br>
Minnesota;12/25/2020;Christmas Day;Minnesota<br>
Mississippi;1/2/2017;New Year's Day;Mississippi<br>
Mississippi;1/16/2017;Martin Luther King Jr.'s Birthday;Mississippi<br>
Mississippi;2/20/2017;Washington's Birthday;Mississippi<br>
Mississippi;4/24/2017;Confederate Memorial Day;Mississippi<br>
Mississippi;5/29/2017;Memorial Day;Mississippi<br>
Mississippi;7/4/2017;Independence Day;Mississippi<br>
Mississippi;9/4/2017;Labor Day;Mississippi<br>
Mississippi;11/10/2017;Veterans Day Observed;Mississippi<br>
Mississippi;11/23/2017;Thanksgiving Day;Mississippi<br>
Mississippi;12/25/2017;Christmas Day;Mississippi<br>
Mississippi;1/1/2018;New Year's Day;Mississippi<br>
Mississippi;1/15/2018;Martin Luther King Jr.'s Birthday;Mississippi<br>
Mississippi;2/19/2018;Washington's Birthday;Mississippi<br>
Mississippi;4/30/2018;Confederate Memorial Day;Mississippi<br>
Mississippi;5/28/2018;Memorial Day;Mississippi<br>
Mississippi;7/4/2018;Independence Day;Mississippi<br>
Mississippi;9/3/2018;Labor Day;Mississippi<br>
Mississippi;11/12/2018;Veterans Day;Mississippi<br>
Mississippi;11/22/2018;Thanksgiving Day;Mississippi<br>
Mississippi;12/25/2018;Christmas Day;Mississippi<br>
Mississippi;1/1/2019;New Year’s Day;Mississippi<br>
Mississippi;1/21/2019;Martin Luther King Jr.'s Birthday;Mississippi<br>
Mississippi;2/18/2019;Washington’s Birthday;Mississippi<br>
Mississippi;4/29/2019;Confederate Memorial Day;Mississippi<br>
Mississippi;5/27/2019;Memorial Day;Mississippi<br>
Mississippi;7/4/2019;Independence Day;Mississippi<br>
Mississippi;9/2/2019;Labor Day;Mississippi<br>
Mississippi;11/11/2019;Veterans Day;Mississippi<br>
Mississippi;11/28/2019;Thanksgiving Day;Mississippi<br>
Mississippi;12/25/2019;Christmas Day;Mississippi<br>
Mississippi;1/1/2020;New Year’s Day;Mississippi<br>
Mississippi;1/20/2020;Martin Luther King Jr.'s Birthday;Mississippi<br>
Mississippi;2/17/2020;Washington’s Birthday;Mississippi<br>
Mississippi;4/27/2020;Confederate Memorial Day;Mississippi<br>
Mississippi;5/25/2020;Memorial Day;Mississippi<br>
Mississippi;7/3/2020;Independence Day;Mississippi<br>
Mississippi;9/7/2020;Labor Day;Mississippi<br>
Mississippi;11/11/2020;Veterans Day;Mississippi<br>
Mississippi;11/26/2020;Thanksgiving Day;Mississippi<br>
Mississippi;12/25/2020;Christmas Day;Mississippi<br>
Missouri;1/2/2017;New Year's Day;Missouri<br>
Missouri;1/16/2017;Martin Luther King Jr.'s Birthday;Missouri<br>
Missouri;2/13/2017;Lincoln's Birthday;Missouri<br>
Missouri;2/20/2017;Washington's Birthday;Missouri<br>
Missouri;5/8/2017;Truman Day;Missouri<br>
Missouri;5/29/2017;Memorial Day;Missouri<br>
Missouri;7/4/2017;Independence Day;Missouri<br>
Missouri;9/4/2017;Labor Day;Missouri<br>
Missouri;10/9/2017;Columbus Day;Missouri<br>
Missouri;11/10/2017;Veterans Day Observed;Missouri<br>
Missouri;11/23/2017;Thanksgiving Day;Missouri<br>
Missouri;12/25/2017;Christmas Day;Missouri<br>
Missouri;1/1/2018;New Year's Day;Missouri<br>
Missouri;1/15/2018;Martin Luther King Jr.'s Birthday;Missouri<br>
Missouri;2/12/2018;Lincoln's Birthday;Missouri<br>
Missouri;2/19/2018;Washington's Birthday;Missouri<br>
Missouri;5/8/2018;Truman Day;Missouri<br>
Missouri;5/28/2018;Memorial Day;Missouri<br>
Missouri;7/4/2018;Independence Day;Missouri<br>
Missouri;9/3/2018;Labor Day;Missouri<br>
Missouri;10/8/2018;Columbus Day;Missouri<br>
Missouri;11/12/2018;Veterans Day;Missouri<br>
Missouri;11/22/2018;Thanksgiving Day;Missouri<br>
Missouri;12/25/2018;Christmas Day;Missouri<br>
Missouri;1/1/2019;New Year’s Day;Missouri<br>
Missouri;1/21/2019;Martin Luther King Jr.'s Birthday;Missouri<br>
Missouri;2/12/2019;Lincoln's Birthday;Missouri<br>
Missouri;2/18/2019;Washington’s Birthday;Missouri<br>
Missouri;5/8/2019;Truman Day;Missouri<br>
Missouri;5/27/2019;Memorial Day;Missouri<br>
Missouri;7/4/2019;Independence Day;Missouri<br>
Missouri;9/2/2019;Labor Day;Missouri<br>
Missouri;10/14/2019;Columbus Day;Missouri<br>
Missouri;11/11/2019;Veterans Day;Missouri<br>
Missouri;11/28/2019;Thanksgiving Day;Missouri<br>
Missouri;12/25/2019;Christmas Day;Missouri<br>
Missouri;1/1/2020;New Year’s Day;Missouri<br>
Missouri;1/20/2020;Martin Luther King Jr.'s Birthday;Missouri<br>
Missouri;2/12/2020;Lincoln's Birthday;Missouri<br>
Missouri;2/17/2020;Washington’s Birthday;Missouri<br>
Missouri;5/8/2020;Truman Day;Missouri<br>
Missouri;5/25/2020;Memorial Day;Missouri<br>
Missouri;7/3/2020;Independence Day;Missouri<br>
Missouri;9/7/2020;Labor Day;Missouri<br>
Missouri;10/12/2020;Columbus Day;Missouri<br>
Missouri;11/11/2020;Veterans Day;Missouri<br>
Missouri;11/26/2020;Thanksgiving Day;Missouri<br>
Missouri;12/25/2020;Christmas Day;Missouri<br>
Montana;1/2/2017;New Year's Day;Montana<br>
Montana;1/16/2017;Martin Luther King Jr.'s Birthday;Montana<br>
Montana;2/20/2017;Lincoln's and Washington's Birthdays;Montana<br>
Montana;5/29/2017;Memorial Day;Montana<br>
Montana;7/4/2017;Independence Day;Montana<br>
Montana;9/4/2017;Labor Day;Montana<br>
Montana;10/9/2017;Columbus Day;Montana<br>
Montana;11/10/2017;Veterans Day Observed;Montana<br>
Montana;11/23/2017;Thanksgiving Day;Montana<br>
Montana;12/25/2017;Christmas Day;Montana<br>
Montana;1/1/2018;New Year's Day;Montana<br>
Montana;1/15/2018;Martin Luther King Jr.'s Birthday;Montana<br>
Montana;2/19/2018;Lincoln's and Washington's Birthdays;Montana<br>
Montana;5/28/2018;Memorial Day;Montana<br>
Montana;7/4/2018;Independence Day;Montana<br>
Montana;9/3/2018;Labor Day;Montana<br>
Montana;10/8/2018;Columbus Day;Montana<br>
Montana;11/6/2018;General Election Day;Montana<br>
Montana;11/12/2018;Veterans Day;Montana<br>
Montana;11/22/2018;Thanksgiving Day;Montana<br>
Montana;12/25/2018;Christmas Day;Montana<br>
Montana;1/1/2019;New Year’s Day;Montana<br>
Montana;1/21/2019;Martin Luther King Jr.'s Birthday;Montana<br>
Montana;2/12/2019;Lincoln's and Washington's Birthdays;Montana<br>
Montana;5/27/2019;Memorial Day;Montana<br>
Montana;7/4/2019;Independence Day;Montana<br>
Montana;9/2/2019;Labor Day;Montana<br>
Montana;10/14/2019;Columbus Day;Montana<br>
Montana;11/11/2019;Veterans Day;Montana<br>
Montana;11/28/2019;Thanksgiving Day;Montana<br>
Montana;12/25/2019;Christmas Day;Montana<br>
Montana;1/1/2020;New Year’s Day;Montana<br>
Montana;1/20/2020;Martin Luther King Jr.'s Birthday;Montana<br>
Montana;2/12/2020;Lincoln's and Washington's Birthdays;Montana<br>
Montana;5/25/2020;Memorial Day;Montana<br>
Montana;7/3/2020;Independence Day;Montana<br>
Montana;9/7/2020;Labor Day;Montana<br>
Montana;10/12/2020;Columbus Day;Montana<br>
Montana;11/3/2020;General Election Day;Montana<br>
Montana;11/11/2020;Veterans Day;Montana<br>
Montana;11/26/2020;Thanksgiving Day;Montana<br>
Montana;12/25/2020;Christmas Day;Montana<br>
Nebraska;1/2/2017;New Year's Day;Nebraska<br>
Nebraska;1/16/2017;Martin Luther King Jr.'s Birthday;Nebraska<br>
Nebraska;2/20/2017;President's Day;Nebraska<br>
Nebraska;4/28/2017;Arbor Day;Nebraska<br>
Nebraska;5/29/2017;Memorial Day;Nebraska<br>
Nebraska;7/4/2017;Independence Day;Nebraska<br>
Nebraska;9/4/2017;Labor Day;Nebraska<br>
Nebraska;10/9/2017;Columbus Day;Nebraska<br>
Nebraska;11/10/2017;Veterans Day Observed;Nebraska<br>
Nebraska;11/23/2017;Thanksgiving Day;Nebraska<br>
Nebraska;11/24/2017;Thanksgiving Friday;Nebraska<br>
Nebraska;12/25/2017;Christmas Day;Nebraska<br>
Nebraska;1/1/2018;New Year's Day;Nebraska<br>
Nebraska;1/15/2018;Martin Luther King Jr.'s Birthday;Nebraska<br>
Nebraska;2/19/2018;President's Day;Nebraska<br>
Nebraska;4/27/2018;Arbor Day;Nebraska<br>
Nebraska;5/28/2018;Memorial Day;Nebraska<br>
Nebraska;7/4/2018;Independence Day;Nebraska<br>
Nebraska;9/3/2018;Labor Day;Nebraska<br>
Nebraska;10/8/2018;Columbus Day;Nebraska<br>
Nebraska;11/12/2018;Veterans Day;Nebraska<br>
Nebraska;11/22/2018;Thanksgiving Day;Nebraska<br>
Nebraska;11/23/2018;Thanksgiving Friday;Nebraska<br>
Nebraska;12/25/2018;Christmas Day;Nebraska<br>
Nebraska;1/1/2019;New Year’s Day;Nebraska<br>
Nebraska;1/21/2019;Martin Luther King Jr.'s Birthday;Nebraska<br>
Nebraska;2/18/2019;President’s Day;Nebraska<br>
Nebraska;4/26/2019;Arbor Day;Nebraska<br>
Nebraska;5/27/2019;Memorial Day;Nebraska<br>
Nebraska;7/4/2019;Independence Day;Nebraska<br>
Nebraska;9/2/2019;Labor Day;Nebraska<br>
Nebraska;10/14/2019;Columbus Day;Nebraska<br>
Nebraska;11/11/2019;Veterans Day;Nebraska<br>
Nebraska;11/28/2019;Thanksgiving Day;Nebraska<br>
Nebraska;11/29/2019;Thanksgiving Friday;Nebraska<br>
Nebraska;12/25/2019;Christmas Day;Nebraska<br>
Nebraska;1/1/2020;New Year’s Day;Nebraska<br>
Nebraska;1/20/2020;Martin Luther King Jr.'s Birthday;Nebraska<br>
Nebraska;2/17/2020;President’s Day;Nebraska<br>
Nebraska;4/24/2020;Arbor Day;Nebraska<br>
Nebraska;5/25/2020;Memorial Day;Nebraska<br>
Nebraska;7/3/2020;Independence Day;Nebraska<br>
Nebraska;9/7/2020;Labor Day;Nebraska<br>
Nebraska;10/12/2020;Columbus Day;Nebraska<br>
Nebraska;11/11/2020;Veterans Day;Nebraska<br>
Nebraska;11/26/2020;Thanksgiving Day;Nebraska<br>
Nebraska;11/27/2020;Thanksgiving Friday;Nebraska<br>
Nebraska;12/25/2020;Christmas Day;Nebraska<br>
Nevada;1/2/2017;New Year's Day;Nevada<br>
Nevada;1/16/2017;Martin Luther King Jr.'s Birthday;Nevada<br>
Nevada;2/20/2017;Washington's Birthday;Nevada<br>
Nevada;5/29/2017;Memorial Day;Nevada<br>
Nevada;7/4/2017;Independence Day;Nevada<br>
Nevada;9/4/2017;Labor Day;Nevada<br>
Nevada;10/27/2017;Nevada Day;Nevada<br>
Nevada;11/10/2017;Veterans Day Observed;Nevada<br>
Nevada;11/23/2017;Thanksgiving Day;Nevada<br>
Nevada;11/24/2017;Thanksgiving Friday;Nevada<br>
Nevada;12/25/2017;Christmas Day;Nevada<br>
Nevada;1/1/2018;New Year's Day;Nevada<br>
Nevada;1/15/2018;Martin Luther King Jr.'s Birthday;Nevada<br>
Nevada;2/19/2018;Washington's Birthday;Nevada<br>
Nevada;5/28/2018;Memorial Day;Nevada<br>
Nevada;7/4/2018;Independence Day;Nevada<br>
Nevada;9/3/2018;Labor Day;Nevada<br>
Nevada;10/26/2018;Nevada Day;Nevada<br>
Nevada;11/12/2018;Veterans Day;Nevada<br>
Nevada;11/22/2018;Thanksgiving Day;Nevada<br>
Nevada;11/23/2018;Thanksgiving Friday;Nevada<br>
Nevada;12/25/2018;Christmas Day;Nevada<br>
Nevada;1/1/2019;New Year’s Day;Nevada<br>
Nevada;1/21/2019;Martin Luther King Jr.'s Birthday;Nevada<br>
Nevada;2/18/2019;Washington's Birthday;Nevada<br>
Nevada;5/27/2019;Memorial Day;Nevada<br>
Nevada;7/4/2019;Independence Day;Nevada<br>
Nevada;9/2/2019;Labor Day;Nevada<br>
Nevada;10/25/2019;Nevada Day;Nevada<br>
Nevada;11/11/2019;Veterans Day;Nevada<br>
Nevada;11/28/2019;Thanksgiving Day;Nevada<br>
Nevada;11/29/2019;Thanksgiving Friday;Nevada<br>
Nevada;12/25/2019;Christmas Day;Nevada<br>
Nevada;1/1/2020;New Year’s Day;Nevada<br>
Nevada;1/20/2020;Martin Luther King Jr.'s Birthday;Nevada<br>
Nevada;2/17/2020;Washington's Birthday;Nevada<br>
Nevada;5/25/2020;Memorial Day;Nevada<br>
Nevada;7/3/2020;Independence Day;Nevada<br>
Nevada;9/7/2020;Labor Day;Nevada<br>
Nevada;10/30/2020;Nevada Day;Nevada<br>
Nevada;11/11/2020;Veterans Day;Nevada<br>
Nevada;11/26/2020;Thanksgiving Day;Nevada<br>
Nevada;11/27/2020;Thanksgiving Friday;Nevada<br>
Nevada;12/25/2020;Christmas Day;Nevada<br>
New Hampshire;1/2/2017;New Year's Day;New Hampshire<br>
New Hampshire;1/16/2017;Martin Luther King Jr.'s Birthday;New Hampshire<br>
New Hampshire;2/20/2017;Washington's Birthday;New Hampshire<br>
New Hampshire;5/29/2017;Memorial Day;New Hampshire<br>
New Hampshire;7/3/2017;Day before Independence Day;New Hampshire<br>
New Hampshire;7/4/2017;Independence Day;New Hampshire<br>
New Hampshire;9/4/2017;Labor Day;New Hampshire<br>
New Hampshire;11/10/2017;Veterans Day Observed;New Hampshire<br>
New Hampshire;11/23/2017;Thanksgiving Day;New Hampshire<br>
New Hampshire;11/24/2017;Thanksgiving Friday;New Hampshire<br>
New Hampshire;12/25/2017;Christmas Day;New Hampshire<br>
New Hampshire;1/1/2018;New Year's Day;New Hampshire<br>
New Hampshire;1/15/2018;Martin Luther King Jr.'s Birthday;New Hampshire<br>
New Hampshire;2/19/2018;Washington's Birthday;New Hampshire<br>
New Hampshire;5/28/2018;Memorial Day;New Hampshire<br>
New Hampshire;7/4/2018;Independence Day;New Hampshire<br>
New Hampshire;9/3/2018;Labor Day;New Hampshire<br>
New Hampshire;11/12/2018;Veterans Day;New Hampshire<br>
New Hampshire;11/22/2018;Thanksgiving Day;New Hampshire<br>
New Hampshire;11/23/2018;Thanksgiving Friday;New Hampshire<br>
New Hampshire;12/25/2018;Christmas Day;New Hampshire<br>
New Hampshire;1/1/2019;New Year’s Day;New Hampshire<br>
New Hampshire;1/21/2019;Martin Luther King Jr.'s Birthday;New Hampshire<br>
New Hampshire;2/18/2019;Washington's Birthday;New Hampshire<br>
New Hampshire;5/27/2019;Memorial Day;New Hampshire<br>
New Hampshire;7/4/2019;Independence Day;New Hampshire<br>
New Hampshire;9/2/2019;Labor Day;New Hampshire<br>
New Hampshire;11/11/2019;Veterans Day;New Hampshire<br>
New Hampshire;11/28/2019;Thanksgiving Day;New Hampshire<br>
New Hampshire;11/29/2019;Thanksgiving Friday;New Hampshire<br>
New Hampshire;12/25/2019;Christmas Day;New Hampshire<br>
New Hampshire;1/1/2020;New Year’s Day;New Hampshire<br>
New Hampshire;1/20/2020;Martin Luther King Jr.'s Birthday;New Hampshire<br>
New Hampshire;2/17/2020;Washington's Birthday;New Hampshire<br>
New Hampshire;5/25/2020;Memorial Day;New Hampshire<br>
New Hampshire;7/3/2020;Independence Day;New Hampshire<br>
New Hampshire;9/7/2020;Labor Day;New Hampshire<br>
New Hampshire;11/11/2020;Veterans Day;New Hampshire<br>
New Hampshire;11/26/2020;Thanksgiving Day;New Hampshire<br>
New Hampshire;11/27/2020;Thanksgiving Friday;New Hampshire<br>
New Hampshire;12/25/2020;Christmas Day;New Hampshire<br>
New Jersey;1/2/2017;New Year's Day;New Jersey<br>
New Jersey;1/16/2017;Martin Luther King Jr.'s Birthday;New Jersey<br>
New Jersey;2/20/2017;Washington's Birthday;New Jersey<br>
New Jersey;4/14/2017;Good Friday;New Jersey<br>
New Jersey;5/29/2017;Memorial Day;New Jersey<br>
New Jersey;7/4/2017;Independence Day;New Jersey<br>
New Jersey;9/4/2017;Labor Day;New Jersey<br>
New Jersey;10/9/2017;Columbus Day;New Jersey<br>
New Jersey;11/7/2017;Election Day;New Jersey<br>
New Jersey;11/10/2017;Veterans Day Observed;New Jersey<br>
New Jersey;11/23/2017;Thanksgiving Day;New Jersey<br>
New Jersey;12/25/2017;Christmas Day;New Jersey<br>
New Jersey;1/1/2018;New Year's Day;New Jersey<br>
New Jersey;1/15/2018;Martin Luther King Jr.'s Birthday;New Jersey<br>
New Jersey;2/19/2018;Washington's Birthday;New Jersey<br>
New Jersey;3/30/2018;Good Friday;New Jersey<br>
New Jersey;5/28/2018;Memorial Day;New Jersey<br>
New Jersey;7/4/2018;Independence Day;New Jersey<br>
New Jersey;9/3/2018;Labor Day;New Jersey<br>
New Jersey;10/8/2018;Columbus Day;New Jersey<br>
New Jersey;11/6/2018;Election Day;New Jersey<br>
New Jersey;11/12/2018;Veterans Day;New Jersey<br>
New Jersey;11/22/2018;Thanksgiving Day;New Jersey<br>
New Jersey;12/25/2018;Christmas Day;New Jersey<br>
New Jersey;1/1/2019;New Year’s Day;New Jersey<br>
New Jersey;1/21/2019;Martin Luther King Jr.'s Birthday;New Jersey<br>
New Jersey;2/18/2019;Washington's Birthday;New Jersey<br>
New Jersey;4/29/2019;Good Friday;New Jersey<br>
New Jersey;5/27/2019;Memorial Day;New Jersey<br>
New Jersey;7/4/2019;Independence Day;New Jersey<br>
New Jersey;9/2/2019;Labor Day;New Jersey<br>
New Jersey;10/14/2019;Columbus Day;New Jersey<br>
New Jersey;11/11/2019;Veterans Day;New Jersey<br>
New Jersey;11/28/2019;Thanksgiving Day;New Jersey<br>
New Jersey;12/25/2019;Christmas Day;New Jersey<br>
New Jersey;1/1/2020;New Year’s Day;New Jersey<br>
New Jersey;1/20/2020;Martin Luther King Jr.'s Birthday;New Jersey<br>
New Jersey;2/17/2020;Washington's Birthday;New Jersey<br>
New Jersey;4/10/2020;Good Friday;New Jersey<br>
New Jersey;5/25/2020;Memorial Day;New Jersey<br>
New Jersey;7/3/2020;Independence Day;New Jersey<br>
New Jersey;9/7/2020;Labor Day;New Jersey<br>
New Jersey;10/12/2020;Columbus Day;New Jersey<br>
New Jersey;11/3/2020;Election Day;New Jersey<br>
New Jersey;11/11/2020;Veterans Day;New Jersey<br>
New Jersey;11/26/2020;Thanksgiving Day;New Jersey<br>
New Jersey;12/25/2020;Christmas Day;New Jersey<br>
New Mexico;1/2/2017;New Year's Day;New Mexico<br>
New Mexico;1/16/2017;Martin Luther King Jr.'s Birthday;New Mexico<br>
New Mexico;2/20/2017;President's Day Observed;New Mexico<br>
New Mexico;5/29/2017;Memorial Day;New Mexico<br>
New Mexico;7/4/2017;Independence Day;New Mexico<br>
New Mexico;9/4/2017;Labor Day;New Mexico<br>
New Mexico;10/9/2017;Columbus Day;New Mexico<br>
New Mexico;11/10/2017;Veterans Day Observed;New Mexico<br>
New Mexico;11/23/2017;Thanksgiving Day;New Mexico<br>
New Mexico;12/25/2017;Christmas Day;New Mexico<br>
New Mexico;1/1/2018;New Year's Day;New Mexico<br>
New Mexico;1/15/2018;Martin Luther King Jr.'s Birthday;New Mexico<br>
New Mexico;5/28/2018;Memorial Day;New Mexico<br>
New Mexico;7/4/2018;Independence Day;New Mexico<br>
New Mexico;9/3/2018;Labor Day;New Mexico<br>
New Mexico;10/8/2018;Columbus Day;New Mexico<br>
New Mexico;11/12/2018;Veterans Day;New Mexico<br>
New Mexico;11/22/2018;Thanksgiving Day;New Mexico<br>
New Mexico;11/23/2018;President's Day Observed;New Mexico<br>
New Mexico;12/25/2018;Christmas Day;New Mexico<br>
New Mexico;1/1/2019;New Year’s Day;New Mexico<br>
New Mexico;1/21/2019;Martin Luther King Jr.'s Birthday;New Mexico<br>
New Mexico;2/18/2019;President's Day Observed;New Mexico<br>
New Mexico;5/27/2019;Memorial Day;New Mexico<br>
New Mexico;7/4/2019;Independence Day;New Mexico<br>
New Mexico;9/2/2019;Labor Day;New Mexico<br>
New Mexico;10/14/2019;Columbus Day;New Mexico<br>
New Mexico;11/11/2019;Veterans Day;New Mexico<br>
New Mexico;11/28/2019;Thanksgiving Day;New Mexico<br>
New Mexico;12/25/2019;Christmas Day;New Mexico<br>
New Mexico;1/1/2020;New Year’s Day;New Mexico<br>
New Mexico;1/20/2020;Martin Luther King Jr.'s Birthday;New Mexico<br>
New Mexico;2/17/2020;President's Day Observed;New Mexico<br>
New Mexico;5/25/2020;Memorial Day;New Mexico<br>
New Mexico;7/3/2020;Independence Day;New Mexico<br>
New Mexico;9/7/2020;Labor Day;New Mexico<br>
New Mexico;10/12/2020;Columbus Day;New Mexico<br>
New Mexico;11/11/2020;Veterans Day;New Mexico<br>
New Mexico;11/26/2020;Thanksgiving Day;New Mexico<br>
New Mexico;12/25/2020;Christmas Day;New Mexico<br>
New York;1/2/2017;New Year's Day;New York<br>
New York;1/16/2017;Martin Luther King Jr.'s Birthday;New York<br>
New York;2/13/2017;Lincoln's Birthday;New York<br>
New York;2/20/2017;Washington's Birthday;New York<br>
New York;5/29/2017;Memorial Day;New York<br>
New York;7/4/2017;Independence Day;New York<br>
New York;9/4/2017;Labor Day;New York<br>
New York;10/9/2017;Columbus Day;New York<br>
New York;11/10/2017;Veterans Day Observed;New York<br>
New York;11/23/2017;Thanksgiving Day;New York<br>
New York;12/25/2017;Christmas Day;New York<br>
New York;1/1/2018;New Year's Day;New York<br>
New York;1/15/2018;Martin Luther King Jr.'s Birthday;New York<br>
New York;2/12/2018;Lincoln's Birthday;New York<br>
New York;2/19/2018;Washington's Birthday;New York<br>
New York;5/28/2018;Memorial Day;New York<br>
New York;7/4/2018;Independence Day;New York<br>
New York;9/3/2018;Labor Day;New York<br>
New York;10/8/2018;Columbus Day;New York<br>
New York;11/6/2018;Election Day;New York<br>
New York;11/12/2018;Veterans Day;New York<br>
New York;11/22/2018;Thanksgiving Day;New York<br>
New York;12/25/2018;Christmas Day;New York<br>
New York;1/1/2019;New Year’s Day;New York<br>
New York;1/21/2019;Martin Luther King Jr.'s Birthday;New York<br>
New York;2/12/2019;Lincoln's Birthday;New York<br>
New York;2/18/2019;Washington’s Birthday;New York<br>
New York;5/27/2019;Memorial Day;New York<br>
New York;7/4/2019;Independence Day;New York<br>
New York;9/2/2019;Labor Day;New York<br>
New York;10/14/2019;Columbus Day;New York<br>
New York;11/5/2019;Election Day;New York<br>
New York;11/11/2019;Veterans Day;New York<br>
New York;11/28/2019;Thanksgiving Day;New York<br>
New York;12/25/2019;Christmas Day;New York<br>
New York;1/1/2020;New Year’s Day;New York<br>
New York;1/20/2020;Martin Luther King Jr.'s Birthday;New York<br>
New York;2/12/2020;Lincoln's Birthday;New York<br>
New York;2/17/2020;Washington’s Birthday;New York<br>
New York;5/25/2020;Memorial Day;New York<br>
New York;7/3/2020;Independence Day;New York<br>
New York;9/7/2020;Labor Day;New York<br>
New York;10/12/2020;Columbus Day;New York<br>
New York;11/3/2020;Election Day;New York<br>
New York;11/11/2020;Veterans Day;New York<br>
New York;11/26/2020;Thanksgiving Day;New York<br>
New York;12/25/2020;Christmas Day;New York<br>
North Carolina;1/2/2017;New Year's Day;North Carolina<br>
North Carolina;1/16/2017;Martin Luther King Jr.'s Birthday;North Carolina<br>
North Carolina;4/14/2017;Good Friday;North Carolina<br>
North Carolina;5/29/2017;Memorial Day;North Carolina<br>
North Carolina;7/4/2017;Independence Day;North Carolina<br>
North Carolina;9/4/2017;Labor Day;North Carolina<br>
North Carolina;11/10/2017;Veterans Day Observed;North Carolina<br>
North Carolina;11/23/2017;Thanksgiving Day;North Carolina<br>
North Carolina;12/25/2017;Christmas Day;North Carolina<br>
North Carolina;1/1/2018;New Year's Day;North Carolina<br>
North Carolina;1/15/2018;Martin Luther King Jr.'s Birthday;North Carolina<br>
North Carolina;3/30/2018;Good Friday;North Carolina<br>
North Carolina;5/28/2018;Memorial Day;North Carolina<br>
North Carolina;7/4/2018;Independence Day;North Carolina<br>
North Carolina;9/3/2018;Labor Day;North Carolina<br>
North Carolina;11/12/2018;Veterans Day;North Carolina<br>
North Carolina;11/22/2018;Thanksgiving Day;North Carolina<br>
North Carolina;12/25/2018;Christmas Day;North Carolina<br>
North Carolina;1/1/2019;New Year’s Day;North Carolina<br>
North Carolina;1/21/2019;Martin Luther King Jr.'s Birthday;North Carolina<br>
North Carolina;4/29/2019;Good Friday;North Carolina<br>
North Carolina;5/27/2019;Memorial Day;North Carolina<br>
North Carolina;7/4/2019;Independence Day;North Carolina<br>
North Carolina;9/2/2019;Labor Day;North Carolina<br>
North Carolina;11/11/2019;Veterans Day;North Carolina<br>
North Carolina;11/28/2019;Thanksgiving Day;North Carolina<br>
North Carolina;12/25/2019;Christmas Day;North Carolina<br>
North Carolina;1/1/2020;New Year’s Day;North Carolina<br>
North Carolina;1/20/2020;Martin Luther King Jr.'s Birthday;North Carolina<br>
North Carolina;4/10/2020;Good Friday;North Carolina<br>
North Carolina;5/25/2020;Memorial Day;North Carolina<br>
North Carolina;7/3/2020;Independence Day;North Carolina<br>
North Carolina;9/7/2020;Labor Day;North Carolina<br>
North Carolina;11/11/2020;Veterans Day;North Carolina<br>
North Carolina;11/26/2020;Thanksgiving Day;North Carolina<br>
North Carolina;12/25/2020;Christmas Day;North Carolina<br>
North Dakota;1/2/2017;New Year's Day;North Dakota<br>
North Dakota;1/16/2017;Martin Luther King Jr.'s Birthday;North Dakota<br>
North Dakota;2/20/2017;President's Day;North Dakota<br>
North Dakota;4/14/2017;Good Friday;North Dakota<br>
North Dakota;5/29/2017;Memorial Day;North Dakota<br>
North Dakota;7/4/2017;Independence Day;North Dakota<br>
North Dakota;9/4/2017;Labor Day;North Dakota<br>
North Dakota;11/10/2017;Veterans Day Observed;North Dakota<br>
North Dakota;11/23/2017;Thanksgiving Day;North Dakota<br>
North Dakota;12/25/2017;Christmas Day;North Dakota<br>
North Dakota;1/1/2018;New Year's Day;North Dakota<br>
North Dakota;1/15/2018;Martin Luther King Jr.'s Birthday;North Dakota<br>
North Dakota;2/19/2018;President's Day;North Dakota<br>
North Dakota;3/30/2018;Good Friday;North Dakota<br>
North Dakota;5/28/2018;Memorial Day;North Dakota<br>
North Dakota;7/4/2018;Independence Day;North Dakota<br>
North Dakota;9/3/2018;Labor Day;North Dakota<br>
North Dakota;11/12/2018;Veterans Day;North Dakota<br>
North Dakota;11/22/2018;Thanksgiving Day;North Dakota<br>
North Dakota;12/25/2018;Christmas Day;North Dakota<br>
North Dakota;1/1/2019;New Year’s Day;North Dakota<br>
North Dakota;1/21/2019;Martin Luther King Jr.'s Birthday;North Dakota<br>
North Dakota;2/18/2019;President’s Day;North Dakota<br>
North Dakota;4/29/2019;Good Friday;North Dakota<br>
North Dakota;5/27/2019;Memorial Day;North Dakota<br>
North Dakota;7/4/2019;Independence Day;North Dakota<br>
North Dakota;9/2/2019;Labor Day;North Dakota<br>
North Dakota;11/11/2019;Veterans Day;North Dakota<br>
North Dakota;11/28/2019;Thanksgiving Day;North Dakota<br>
North Dakota;12/25/2019;Christmas Day;North Dakota<br>
North Dakota;1/1/2020;New Year’s Day;North Dakota<br>
North Dakota;1/20/2020;Martin Luther King Jr.'s Birthday;North Dakota<br>
North Dakota;2/17/2020;President’s Day;North Dakota<br>
North Dakota;4/10/2020;Good Friday;North Dakota<br>
North Dakota;5/25/2020;Memorial Day;North Dakota<br>
North Dakota;7/3/2020;Independence Day;North Dakota<br>
North Dakota;9/7/2020;Labor Day;North Dakota<br>
North Dakota;11/11/2020;Veterans Day;North Dakota<br>
North Dakota;11/26/2020;Thanksgiving Day;North Dakota<br>
North Dakota;12/25/2020;Christmas Day;North Dakota<br>
Ohio;1/2/2017;New Year's Day;Ohio<br>
Ohio;1/16/2017;Martin Luther King Jr.'s Birthday;Ohio<br>
Ohio;2/20/2017;President's Day;Ohio<br>
Ohio;5/29/2017;Memorial Day;Ohio<br>
Ohio;7/4/2017;Independence Day;Ohio<br>
Ohio;9/4/2017;Labor Day;Ohio<br>
Ohio;11/10/2017;Veterans Day Observed;Ohio<br>
Ohio;11/23/2017;Thanksgiving Day;Ohio<br>
Ohio;11/24/2017;Thanksgiving Friday;Ohio<br>
Ohio;12/25/2017;Christmas Day;Ohio<br>
Ohio;1/1/2018;New Year's Day;Ohio<br>
Ohio;1/15/2018;Martin Luther King Jr.'s Birthday;Ohio<br>
Ohio;2/19/2018;President's Day;Ohio<br>
Ohio;5/28/2018;Memorial Day;Ohio<br>
Ohio;7/4/2018;Independence Day;Ohio<br>
Ohio;9/3/2018;Labor Day;Ohio<br>
Ohio;11/12/2018;Veterans Day;Ohio<br>
Ohio;11/22/2018;Thanksgiving Day;Ohio<br>
Ohio;11/23/2018;Thanksgiving Friday;Ohio<br>
Ohio;12/25/2018;Christmas Day;Ohio<br>
Ohio;1/1/2019;New Year’s Day;Ohio<br>
Ohio;1/21/2019;Martin Luther King Jr.'s Birthday;Ohio<br>
Ohio;2/18/2019;President’s Day;Ohio<br>
Ohio;5/27/2019;Memorial Day;Ohio<br>
Ohio;7/4/2019;Independence Day;Ohio<br>
Ohio;9/2/2019;Labor Day;Ohio<br>
Ohio;11/11/2019;Veterans Day;Ohio<br>
Ohio;11/28/2019;Thanksgiving Day;Ohio<br>
Ohio;11/29/2019;Thanksgiving Friday;Ohio<br>
Ohio;12/25/2019;Christmas Day;Ohio<br>
Ohio;1/1/2020;New Year’s Day;Ohio<br>
Ohio;1/20/2020;Martin Luther King Jr.'s Birthday;Ohio<br>
Ohio;2/17/2020;President’s Day;Ohio<br>
Ohio;5/25/2020;Memorial Day;Ohio<br>
Ohio;7/3/2020;Independence Day;Ohio<br>
Ohio;9/7/2020;Labor Day;Ohio<br>
Ohio;11/11/2020;Veterans Day;Ohio<br>
Ohio;11/26/2020;Thanksgiving Day;Ohio<br>
Ohio;11/27/2020;Thanksgiving Friday;Ohio<br>
Ohio;12/25/2020;Christmas Day;Ohio<br>
Oklahoma;1/2/2017;New Year's Day;Oklahoma<br>
Oklahoma;1/16/2017;Martin Luther King Jr.'s Birthday;Oklahoma<br>
Oklahoma;2/20/2017;President's Day;Oklahoma<br>
Oklahoma;5/29/2017;Memorial Day;Oklahoma<br>
Oklahoma;7/4/2017;Independence Day;Oklahoma<br>
Oklahoma;9/4/2017;Labor Day;Oklahoma<br>
Oklahoma;11/10/2017;Veterans Day Observed;Oklahoma<br>
Oklahoma;11/23/2017;Thanksgiving Day;Oklahoma<br>
Oklahoma;11/24/2017;Thanksgiving Friday;Oklahoma<br>
Oklahoma;12/25/2017;Christmas Day;Oklahoma<br>
Oklahoma;12/26/2017;Christmas Day 2;Oklahoma<br>
Oklahoma;1/1/2018;New Year's Day;Oklahoma<br>
Oklahoma;1/15/2018;Martin Luther King Jr.'s Birthday;Oklahoma<br>
Oklahoma;2/19/2018;President's Day;Oklahoma<br>
Oklahoma;5/28/2018;Memorial Day;Oklahoma<br>
Oklahoma;7/4/2018;Independence Day;Oklahoma<br>
Oklahoma;9/3/2018;Labor Day;Oklahoma<br>
Oklahoma;11/12/2018;Veterans Day;Oklahoma<br>
Oklahoma;11/22/2018;Thanksgiving Day;Oklahoma<br>
Oklahoma;11/23/2018;Thanksgiving Friday;Oklahoma<br>
Oklahoma;12/24/2018;Christmas Eve;Oklahoma<br>
Oklahoma;12/25/2018;Christmas Day;Oklahoma<br>
Oklahoma;12/26/2018;Christmas Day 2;Oklahoma<br>
Oklahoma;1/1/2019;New Year’s Day;Oklahoma<br>
Oklahoma;1/21/2019;Martin Luther King Jr.'s Birthday;Oklahoma<br>
Oklahoma;2/18/2019;President’s Day;Oklahoma<br>
Oklahoma;5/27/2019;Memorial Day;Oklahoma<br>
Oklahoma;7/4/2019;Independence Day;Oklahoma<br>
Oklahoma;9/2/2019;Labor Day;Oklahoma<br>
Oklahoma;11/11/2019;Veterans Day;Oklahoma<br>
Oklahoma;11/28/2019;Thanksgiving Day;Oklahoma<br>
Oklahoma;11/29/2019;Thanksgiving Friday;Oklahoma<br>
Oklahoma;12/24/2019;Christmas Eve;Oklahoma<br>
Oklahoma;12/25/2019;Christmas Day;Oklahoma<br>
Oklahoma;1/1/2020;New Year’s Day;Oklahoma<br>
Oklahoma;1/20/2020;Martin Luther King Jr.'s Birthday;Oklahoma<br>
Oklahoma;2/17/2020;President’s Day;Oklahoma<br>
Oklahoma;5/25/2020;Memorial Day;Oklahoma<br>
Oklahoma;7/3/2020;Independence Day;Oklahoma<br>
Oklahoma;9/7/2020;Labor Day;Oklahoma<br>
Oklahoma;11/11/2020;Veterans Day;Oklahoma<br>
Oklahoma;11/26/2020;Thanksgiving Day;Oklahoma<br>
Oklahoma;11/27/2020;Thanksgiving Friday;Oklahoma<br>
Oklahoma;12/25/2020;Christmas Day;Oklahoma<br>
Oregon;1/2/2017;New Year's Day;Oregon<br>
Oregon;1/16/2017;Martin Luther King Jr.'s Birthday;Oregon<br>
Oregon;2/20/2017;President's Day;Oregon<br>
Oregon;5/29/2017;Memorial Day;Oregon<br>
Oregon;7/4/2017;Independence Day;Oregon<br>
Oregon;9/4/2017;Labor Day;Oregon<br>
Oregon;11/10/2017;Veterans Day Observed;Oregon<br>
Oregon;11/23/2017;Thanksgiving Day;Oregon<br>
Oregon;12/25/2017;Christmas Day;Oregon<br>
Oregon;1/1/2018;New Year's Day;Oregon<br>
Oregon;1/15/2018;Martin Luther King Jr.'s Birthday;Oregon<br>
Oregon;2/19/2018;President's Day;Oregon<br>
Oregon;5/28/2018;Memorial Day;Oregon<br>
Oregon;7/4/2018;Independence Day;Oregon<br>
Oregon;9/3/2018;Labor Day;Oregon<br>
Oregon;11/12/2018;Veterans Day;Oregon<br>
Oregon;11/22/2018;Thanksgiving Day;Oregon<br>
Oregon;12/25/2018;Christmas Day;Oregon<br>
Oregon;1/1/2019;New Year’s Day;Oregon<br>
Oregon;1/21/2019;Martin Luther King Jr.'s Birthday;Oregon<br>
Oregon;2/18/2019;President’s Day;Oregon<br>
Oregon;5/27/2019;Memorial Day;Oregon<br>
Oregon;7/4/2019;Independence Day;Oregon<br>
Oregon;9/2/2019;Labor Day;Oregon<br>
Oregon;11/11/2019;Veterans Day;Oregon<br>
Oregon;11/28/2019;Thanksgiving Day;Oregon<br>
Oregon;12/25/2019;Christmas Day;Oregon<br>
Oregon;1/1/2020;New Year’s Day;Oregon<br>
Oregon;1/20/2020;Martin Luther King Jr.'s Birthday;Oregon<br>
Oregon;2/17/2020;President’s Day;Oregon<br>
Oregon;5/25/2020;Memorial Day;Oregon<br>
Oregon;7/3/2020;Independence Day;Oregon<br>
Oregon;9/7/2020;Labor Day;Oregon<br>
Oregon;11/11/2020;Veterans Day;Oregon<br>
Oregon;11/26/2020;Thanksgiving Day;Oregon<br>
Oregon;12/25/2020;Christmas Day;Oregon<br>
Pennsylvania;1/2/2017;New Year's Day;Pennsylvania<br>
Pennsylvania;1/16/2017;Martin Luther King Jr.'s Birthday;Pennsylvania<br>
Pennsylvania;2/20/2017;President's Day;Pennsylvania<br>
Pennsylvania;4/14/2017;Good Friday;Pennsylvania<br>
Pennsylvania;5/29/2017;Memorial Day;Pennsylvania<br>
Pennsylvania;7/4/2017;Independence Day;Pennsylvania<br>
Pennsylvania;9/4/2017;Labor Day;Pennsylvania<br>
Pennsylvania;10/9/2017;Columbus Day;Pennsylvania<br>
Pennsylvania;11/8/2017;Election Day;Pennsylvania<br>
Pennsylvania;11/10/2017;Veterans Day Observed;Pennsylvania<br>
Pennsylvania;11/23/2017;Thanksgiving Day;Pennsylvania<br>
Pennsylvania;11/24/2017;Thanksgiving Friday;Pennsylvania<br>
Pennsylvania;12/25/2017;Christmas Day;Pennsylvania<br>
Pennsylvania;1/1/2018;New Year's Day;Pennsylvania<br>
Pennsylvania;1/15/2018;Martin Luther King Jr.'s Birthday;Pennsylvania<br>
Pennsylvania;2/19/2018;President's Day;Pennsylvania<br>
Pennsylvania;3/30/2018;Good Friday;Pennsylvania<br>
Pennsylvania;5/28/2018;Memorial Day;Pennsylvania<br>
Pennsylvania;7/4/2018;Independence Day;Pennsylvania<br>
Pennsylvania;9/3/2018;Labor Day;Pennsylvania<br>
Pennsylvania;10/8/2018;Columbus Day;Pennsylvania<br>
Pennsylvania;11/6/2018;Election Day;Pennsylvania<br>
Pennsylvania;11/12/2018;Veterans Day;Pennsylvania<br>
Pennsylvania;11/22/2018;Thanksgiving Day;Pennsylvania<br>
Pennsylvania;11/23/2018;Thanksgiving Friday;Pennsylvania<br>
Pennsylvania;12/25/2018;Christmas Day;Pennsylvania<br>
Pennsylvania;1/1/2019;New Year’s Day;Pennsylvania<br>
Pennsylvania;1/21/2019;Martin Luther King Jr.'s Birthday;Pennsylvania<br>
Pennsylvania;2/18/2019;President’s Day;Pennsylvania<br>
Pennsylvania;4/29/2019;Good Friday;Pennsylvania<br>
Pennsylvania;5/27/2019;Memorial Day;Pennsylvania<br>
Pennsylvania;7/4/2019;Independence Day;Pennsylvania<br>
Pennsylvania;9/2/2019;Labor Day;Pennsylvania<br>
Pennsylvania;10/14/2019;Columbus Day;Pennsylvania<br>
Pennsylvania;11/11/2019;Veterans Day;Pennsylvania<br>
Pennsylvania;11/28/2019;Thanksgiving Day;Pennsylvania<br>
Pennsylvania;11/29/2019;Thanksgiving Friday;Pennsylvania<br>
Pennsylvania;12/25/2019;Christmas Day;Pennsylvania<br>
Pennsylvania;1/1/2020;New Year’s Day;Pennsylvania<br>
Pennsylvania;1/20/2020;Martin Luther King Jr.'s Birthday;Pennsylvania<br>
Pennsylvania;2/17/2020;President’s Day;Pennsylvania<br>
Pennsylvania;4/10/2020;Good Friday;Pennsylvania<br>
Pennsylvania;5/25/2020;Memorial Day;Pennsylvania<br>
Pennsylvania;7/3/2020;Independence Day;Pennsylvania<br>
Pennsylvania;9/7/2020;Labor Day;Pennsylvania<br>
Pennsylvania;10/12/2020;Columbus Day;Pennsylvania<br>
Pennsylvania;11/3/2020;Election Day;Pennsylvania<br>
Pennsylvania;11/11/2020;Veterans Day;Pennsylvania<br>
Pennsylvania;11/26/2020;Thanksgiving Day;Pennsylvania<br>
Pennsylvania;11/27/2020;Thanksgiving Friday;Pennsylvania<br>
Pennsylvania;12/25/2020;Christmas Day;Pennsylvania<br>
Puerto Rico;1/2/2017;New Year's Day;Puerto Rico<br>
Puerto Rico;1/6/2017;Epiphany;Puerto Rico<br>
Puerto Rico;1/16/2017;Martin Luther King Jr.'s Birthday;Puerto Rico<br>
Puerto Rico;2/20/2017;President's Day;Puerto Rico<br>
Puerto Rico;4/13/2017;Holy Thursday;Puerto Rico<br>
Puerto Rico;4/14/2017;Good Friday;Puerto Rico<br>
Puerto Rico;5/29/2017;Memorial Day;Puerto Rico<br>
Puerto Rico;7/4/2017;Independence Day;Puerto Rico<br>
Puerto Rico;7/25/2017;Puerto Rico Constitution Day;Puerto Rico<br>
Puerto Rico;9/4/2017;Labor Day;Puerto Rico<br>
Puerto Rico;10/9/2017;Columbus Day;Puerto Rico<br>
Puerto Rico;11/8/2017;Election Day;Puerto Rico<br>
Puerto Rico;11/10/2017;Veterans Day Observed;Puerto Rico<br>
Puerto Rico;11/23/2017;Thanksgiving Day;Puerto Rico<br>
Puerto Rico;11/24/2017;Thanksgiving Friday;Puerto Rico<br>
Puerto Rico;12/25/2017;Christmas Day;Puerto Rico<br>
Puerto Rico;1/1/2018;New Year's Day;Puerto Rico<br>
Puerto Rico;1/6/2018;Epiphany;Puerto Rico<br>
Puerto Rico;1/15/2018;Martin Luther King Jr.'s Birthday;Puerto Rico<br>
Puerto Rico;2/19/2018;President's Day;Puerto Rico<br>
Puerto Rico;3/29/2018;Holy Thursday;Puerto Rico<br>
Puerto Rico;3/30/2018;Good Friday;Puerto Rico<br>
Puerto Rico;5/28/2018;Memorial Day;Puerto Rico<br>
Puerto Rico;7/4/2018;Independence Day;Puerto Rico<br>
Puerto Rico;7/25/2018;Puerto Rico Constitution Day;Puerto Rico<br>
Puerto Rico;9/3/2018;Labor Day;Puerto Rico<br>
Puerto Rico;10/8/2018;Columbus Day;Puerto Rico<br>
Puerto Rico;11/6/2018;Election Day;Puerto Rico<br>
Puerto Rico;11/12/2018;Veterans Day;Puerto Rico<br>
Puerto Rico;11/22/2018;Thanksgiving Day;Puerto Rico<br>
Puerto Rico;11/23/2018;Thanksgiving Friday;Puerto Rico<br>
Puerto Rico;12/25/2018;Christmas Day;Puerto Rico<br>
Puerto Rico;1/1/2019;New Year’s Day;Puerto Rico<br>
Puerto Rico;1/7/2019;Epiphany;Puerto Rico<br>
Puerto Rico;1/21/2019;Martin Luther King Jr.'s Birthday;Puerto Rico<br>
Puerto Rico;2/18/2019;President’s Day;Puerto Rico<br>
Puerto Rico;4/18/2019;Holy Thursday;Puerto Rico<br>
Puerto Rico;4/19/2019;Good Friday;Puerto Rico<br>
Puerto Rico;5/27/2019;Memorial Day;Puerto Rico<br>
Puerto Rico;7/4/2019;Independence Day;Puerto Rico<br>
Puerto Rico;9/2/2019;Labor Day;Puerto Rico<br>
Puerto Rico;10/14/2019;Columbus Day;Puerto Rico<br>
Puerto Rico;11/11/2019;Veterans Day;Puerto Rico<br>
Puerto Rico;11/19/2019;Discovery of Puerto Rico Day;Puerto Rico<br>
Puerto Rico;11/28/2019;Thanksgiving Day;Puerto Rico<br>
Puerto Rico;11/29/2019;Thanksgiving Friday;Puerto Rico<br>
Puerto Rico;12/24/2019;Administrative;Puerto Rico<br>
Puerto Rico;12/31/2019;Administrative;Puerto Rico<br>
Puerto Rico;1/1/2020;New Year’s Day;Puerto Rico<br>
Puerto Rico;1/6/2020;Epiphany;Puerto Rico<br>
Puerto Rico;1/20/2020;Martin Luther King Jr.'s Birthday;Puerto Rico<br>
Puerto Rico;2/17/2020;President’s Day;Puerto Rico<br>
Puerto Rico;4/9/2020;Holy Thursday;Puerto Rico<br>
Puerto Rico;4/10/2020;Good Friday;Puerto Rico<br>
Puerto Rico;5/25/2020;Memorial Day;Puerto Rico<br>
Puerto Rico;7/3/2020;Independence Day;Puerto Rico<br>
Puerto Rico;9/7/2020;Labor Day;Puerto Rico<br>
Puerto Rico;10/12/2020;Columbus Day;Puerto Rico<br>
Puerto Rico;11/3/2020;Election Day;Puerto Rico<br>
Puerto Rico;11/11/2020;Veterans Day;Puerto Rico<br>
Puerto Rico;11/26/2020;Thanksgiving Day;Puerto Rico<br>
Puerto Rico;11/27/2020;Thanksgiving Friday;Puerto Rico<br>
Puerto Rico;12/25/2020;Christmas Day;Puerto Rico<br>
Rhode Island;1/2/2017;New Year's Day;Rhode Island<br>
Rhode Island;1/16/2017;Martin Luther King Jr.'s Birthday;Rhode Island<br>
Rhode Island;5/29/2017;Memorial Day;Rhode Island<br>
Rhode Island;7/4/2017;Independence Day;Rhode Island<br>
Rhode Island;8/14/2017;Victory Day;Rhode Island<br>
Rhode Island;9/4/2017;Labor Day;Rhode Island<br>
Rhode Island;10/9/2017;Columbus Day;Rhode Island<br>
Rhode Island;11/3/2017;Election Day;Rhode Island<br>
Rhode Island;11/10/2017;Veterans Day Observed;Rhode Island<br>
Rhode Island;11/23/2017;Thanksgiving Day;Rhode Island<br>
Rhode Island;12/25/2017;Christmas Day;Rhode Island<br>
Rhode Island;1/1/2018;New Year's Day;Rhode Island<br>
Rhode Island;1/15/2018;Martin Luther King Jr.'s Birthday;Rhode Island<br>
Rhode Island;5/28/2018;Memorial Day;Rhode Island<br>
Rhode Island;7/4/2018;Independence Day;Rhode Island<br>
Rhode Island;8/13/2018;Victory Day;Rhode Island<br>
Rhode Island;9/3/2018;Labor Day;Rhode Island<br>
Rhode Island;10/8/2018;Columbus Day;Rhode Island<br>
Rhode Island;11/6/2018;Election Day;Rhode Island<br>
Rhode Island;11/12/2018;Veterans Day;Rhode Island<br>
Rhode Island;11/22/2018;Thanksgiving Day;Rhode Island<br>
Rhode Island;12/25/2018;Christmas Day;Rhode Island<br>
Rhode Island;1/1/2019;New Year’s Day;Rhode Island<br>
Rhode Island;1/21/2019;Martin Luther King Jr.'s Birthday;Rhode Island<br>
Rhode Island;5/27/2019;Memorial Day;Rhode Island<br>
Rhode Island;7/4/2019;Independence Day;Rhode Island<br>
Rhode Island;8/12/2019;Victory Day;Rhode Island<br>
Rhode Island;9/2/2019;Labor Day;Rhode Island<br>
Rhode Island;10/14/2019;Columbus Day;Rhode Island<br>
Rhode Island;11/11/2019;Veterans Day;Rhode Island<br>
Rhode Island;11/28/2019;Thanksgiving Day;Rhode Island<br>
Rhode Island;12/25/2019;Christmas Day;Rhode Island<br>
Rhode Island;1/1/2020;New Year’s Day;Rhode Island<br>
Rhode Island;1/20/2020;Martin Luther King Jr.'s Birthday;Rhode Island<br>
Rhode Island;5/25/2020;Memorial Day;Rhode Island<br>
Rhode Island;7/3/2020;Independence Day;Rhode Island<br>
Rhode Island;8/10/2020;Victory Day;Rhode Island<br>
Rhode Island;9/7/2020;Labor Day;Rhode Island<br>
Rhode Island;10/12/2020;Columbus Day;Rhode Island<br>
Rhode Island;11/11/2020;Veterans Day;Rhode Island<br>
Rhode Island;11/26/2020;Thanksgiving Day;Rhode Island<br>
Rhode Island;12/25/2020;Christmas Day;Rhode Island<br>
South Carolina;1/2/2017;New Year's Day;South Carolina<br>
South Carolina;1/16/2017;Martin Luther King Jr.'s Birthday;South Carolina<br>
South Carolina;2/20/2017;President's Day;South Carolina<br>
South Carolina;5/10/2017;Confederate Memorial Day;South Carolina<br>
South Carolina;5/29/2017;Memorial Day;South Carolina<br>
South Carolina;7/4/2017;Independence Day;South Carolina<br>
South Carolina;9/4/2017;Labor Day;South Carolina<br>
South Carolina;11/10/2017;Veterans Day Observed;South Carolina<br>
South Carolina;11/23/2017;Thanksgiving Day;South Carolina<br>
South Carolina;11/24/2017;Thanksgiving Friday;South Carolina<br>
South Carolina;12/22/2017;Christmas Eve;South Carolina<br>
South Carolina;12/25/2017; Christmas Day After;South Carolina<br>
South Carolina;12/25/2017;Christmas Day;South Carolina<br>
South Carolina;1/1/2018;New Year's Day;South Carolina<br>
South Carolina;1/15/2018;Martin Luther King Jr.'s Birthday;South Carolina<br>
South Carolina;2/19/2018;President's Day;South Carolina<br>
South Carolina;5/10/2018;Confederate Memorial Day;South Carolina<br>
South Carolina;5/28/2018;Memorial Day;South Carolina<br>
South Carolina;7/4/2018;Independence Day;South Carolina<br>
South Carolina;9/3/2018;Labor Day;South Carolina<br>
South Carolina;11/12/2018;Veterans Day;South Carolina<br>
South Carolina;11/22/2018;Thanksgiving Day;South Carolina<br>
South Carolina;11/23/2018;Thanksgiving Friday;South Carolina<br>
South Carolina;12/24/2018;Christmas Eve;South Carolina<br>
South Carolina;12/25/2018;Christmas Day;South Carolina<br>
South Carolina;12/26/2018;Day after Christmas;South Carolina<br>
South Carolina;1/1/2019;New Year’s Day;South Carolina<br>
South Carolina;1/21/2019;Martin Luther King Jr.'s Birthday;South Carolina<br>
South Carolina;2/18/2019;President’s Day;South Carolina<br>
South Carolina;5/10/2019;Confederate Memorial Day;South Carolina<br>
South Carolina;5/27/2019;Memorial Day;South Carolina<br>
South Carolina;7/4/2019;Independence Day;South Carolina<br>
South Carolina;9/2/2019;Labor Day;South Carolina<br>
South Carolina;11/11/2019;Veterans Day;South Carolina<br>
South Carolina;11/28/2019;Thanksgiving Day;South Carolina<br>
South Carolina;11/29/2019;Thanksgiving Friday;South Carolina<br>
South Carolina;12/24/2019;Christmas Eve;South Carolina<br>
South Carolina;12/25/2019;Christmas Day;South Carolina<br>
South Carolina;12/26/2019;Day after Christmas;South Carolina<br>
South Carolina;1/1/2020;New Year’s Day;South Carolina<br>
South Carolina;1/20/2020;Martin Luther King Jr.'s Birthday;South Carolina<br>
South Carolina;2/17/2020;President’s Day;South Carolina<br>
South Carolina;5/25/2020;Memorial Day;South Carolina<br>
South Carolina;7/3/2020;Independence Day;South Carolina<br>
South Carolina;9/7/2020;Labor Day;South Carolina<br>
South Carolina;11/11/2020;Veterans Day;South Carolina<br>
South Carolina;11/26/2020;Thanksgiving Day;South Carolina<br>
South Carolina;11/27/2020;Thanksgiving Friday;South Carolina<br>
South Carolina;12/24/2020;Christmas Eve;South Carolina<br>
South Carolina;12/25/2020;Christmas Day;South Carolina<br>
South Dakota;1/2/2017;New Year's Day;South Dakota<br>
South Dakota;1/16/2017;Martin Luther King Jr.'s Birthday;South Dakota<br>
South Dakota;2/20/2017;President's Day;South Dakota<br>
South Dakota;5/29/2017;Memorial Day;South Dakota<br>
South Dakota;7/4/2017;Independence Day;South Dakota<br>
South Dakota;9/4/2017;Labor Day;South Dakota<br>
South Dakota;10/9/2017;Native American Day;South Dakota<br>
South Dakota;11/10/2017;Veterans Day Observed;South Dakota<br>
South Dakota;11/23/2017;Thanksgiving Day;South Dakota<br>
South Dakota;12/25/2017;Christmas Day;South Dakota<br>
South Dakota;1/1/2018;New Year's Day;South Dakota<br>
South Dakota;1/15/2018;Martin Luther King Jr.'s Birthday;South Dakota<br>
South Dakota;2/19/2018;President's Day;South Dakota<br>
South Dakota;5/28/2018;Memorial Day;South Dakota<br>
South Dakota;7/4/2018;Independence Day;South Dakota<br>
South Dakota;9/3/2018;Labor Day;South Dakota<br>
South Dakota;10/8/2018;Native American Day;South Dakota<br>
South Dakota;11/12/2018;Veterans Day;South Dakota<br>
South Dakota;11/22/2018;Thanksgiving Day;South Dakota<br>
South Dakota;12/25/2018;Christmas Day;South Dakota<br>
South Dakota;1/1/2019;New Year’s Day;South Dakota<br>
South Dakota;1/21/2019;Martin Luther King Jr.'s Birthday;South Dakota<br>
South Dakota;2/18/2019;President’s Day;South Dakota<br>
South Dakota;5/27/2019;Memorial Day;South Dakota<br>
South Dakota;7/4/2019;Independence Day;South Dakota<br>
South Dakota;9/2/2019;Labor Day;South Dakota<br>
South Dakota;10/11/2019;Native American Day;South Dakota<br>
South Dakota;11/11/2019;Veterans Day;South Dakota<br>
South Dakota;11/28/2019;Thanksgiving Day;South Dakota<br>
South Dakota;12/25/2019;Christmas Day;South Dakota<br>
South Dakota;1/1/2020;New Year’s Day;South Dakota<br>
South Dakota;1/20/2020;Martin Luther King Jr.'s Birthday;South Dakota<br>
South Dakota;2/17/2020;President’s Day;South Dakota<br>
South Dakota;5/25/2020;Memorial Day;South Dakota<br>
South Dakota;7/3/2020;Independence Day;South Dakota<br>
South Dakota;9/7/2020;Labor Day;South Dakota<br>
South Dakota;10/12/2020;Native American Day;South Dakota<br>
South Dakota;11/11/2020;Veterans Day;South Dakota<br>
South Dakota;11/26/2020;Thanksgiving Day;South Dakota<br>
South Dakota;12/25/2020;Christmas Day;South Dakota<br>
Tennessee;1/2/2017;New Year's Day;Tennessee<br>
Tennessee;1/16/2017;Martin Luther King Jr.'s Birthday;Tennessee<br>
Tennessee;2/20/2017;President's Day;Tennessee<br>
Tennessee;4/14/2017;Good Friday;Tennessee<br>
Tennessee;5/29/2017;Memorial Day;Tennessee<br>
Tennessee;7/4/2017;Independence Day;Tennessee<br>
Tennessee;9/4/2017;Labor Day;Tennessee<br>
Tennessee;10/9/2017;Columbus Day;Tennessee<br>
Tennessee;11/10/2017;Veterans Day Observed;Tennessee<br>
Tennessee;11/23/2017;Thanksgiving Day;Tennessee<br>
Tennessee;12/25/2017;Christmas Day;Tennessee<br>
Tennessee;1/1/2018;New Year's Day;Tennessee<br>
Tennessee;1/15/2018;Martin Luther King Jr.'s Birthday;Tennessee<br>
Tennessee;2/19/2018;President's Day;Tennessee<br>
Tennessee;3/30/2018;Good Friday;Tennessee<br>
Tennessee;5/28/2018;Memorial Day;Tennessee<br>
Tennessee;7/4/2018;Independence Day;Tennessee<br>
Tennessee;9/3/2018;Labor Day;Tennessee<br>
Tennessee;10/8/2018;Columbus Day;Tennessee<br>
Tennessee;11/12/2018;Veterans Day;Tennessee<br>
Tennessee;11/22/2018;Thanksgiving Day;Tennessee<br>
Tennessee;12/25/2018;Christmas Day;Tennessee<br>
Tennessee;1/1/2019;New Year’s Day;Tennessee<br>
Tennessee;1/21/2019;Martin Luther King Jr.'s Birthday;Tennessee<br>
Tennessee;2/18/2019;President’s Day;Tennessee<br>
Tennessee;4/29/2019;Good Friday;Tennessee<br>
Tennessee;5/27/2019;Memorial Day;Tennessee<br>
Tennessee;7/4/2019;Independence Day;Tennessee<br>
Tennessee;9/2/2019;Labor Day;Tennessee<br>
Tennessee;10/14/2019;Columbus Day;Tennessee<br>
Tennessee;11/11/2019;Veterans Day;Tennessee<br>
Tennessee;11/28/2019;Thanksgiving Day;Tennessee<br>
Tennessee;12/25/2019;Christmas Day;Tennessee<br>
Tennessee;1/1/2020;New Year’s Day;Tennessee<br>
Tennessee;1/20/2020;Martin Luther King Jr.'s Birthday;Tennessee<br>
Tennessee;2/17/2020;President’s Day;Tennessee<br>
Tennessee;4/10/2020;Good Friday;Tennessee<br>
Tennessee;5/25/2020;Memorial Day;Tennessee<br>
Tennessee;7/3/2020;Independence Day;Tennessee<br>
Tennessee;9/7/2020;Labor Day;Tennessee<br>
Tennessee;10/12/2020;Columbus Day;Tennessee<br>
Tennessee;11/11/2020;Veterans Day;Tennessee<br>
Tennessee;11/26/2020;Thanksgiving Day;Tennessee<br>
Tennessee;12/25/2020;Christmas Day;Tennessee<br>
Texas;1/2/2017;New Year's Day;Texas<br>
Texas;1/16/2017;Martin Luther King Jr.'s Birthday;Texas<br>
Texas;5/29/2017;Memorial Day;Texas<br>
Texas;7/4/2017;Independence Day;Texas<br>
Texas;9/4/2017;Labor Day;Texas<br>
Texas;11/23/2017;Thanksgiving Day;Texas<br>
Texas;12/25/2017;Christmas Day;Texas<br>
Texas;1/1/2018;New Year's Day;Texas<br>
Texas;1/15/2018;Martin Luther King Jr.'s Birthday;Texas<br>
Texas;5/28/2018;Memorial Day;Texas<br>
Texas;7/4/2018;Independence Day;Texas<br>
Texas;9/3/2018;Labor Day;Texas<br>
Texas;11/22/2018;Thanksgiving Day;Texas<br>
Texas;12/25/2018;Christmas Day;Texas<br>
Texas;1/1/2019;New Year’s Day;Texas<br>
Texas;1/21/2019;Martin Luther King Jr.'s Birthday;Texas<br>
Texas;5/27/2019;Memorial Day;Texas<br>
Texas;7/4/2019;Independence Day;Texas<br>
Texas;9/2/2019;Labor Day;Texas<br>
Texas;11/28/2019;Thanksgiving Day;Texas<br>
Texas;11/29/2019;Thanksgiving Friday;Texas<br>
Texas;12/24/2019;Christmas Eve;Texas<br>
Texas;12/25/2019;Christmas Day;Texas<br>
Texas;12/26/2019;Day after Christmas;Texas<br>
Texas;1/1/2020;New Year’s Day;Texas<br>
Texas;1/20/2020;Martin Luther King Jr.'s Birthday;Texas<br>
Texas;5/25/2020;Memorial Day;Texas<br>
Texas;7/3/2020;Independence Day;Texas<br>
Texas;9/7/2020;Labor Day;Texas<br>
Texas;11/26/2020;Thanksgiving Day;Texas<br>
Texas;11/27/2020;Thanksgiving Friday;Texas<br>
Texas;12/24/2020;Christmas Eve;Texas<br>
Texas;12/25/2020;Christmas Day;Texas<br>
Utah;1/2/2017;New Year's Day;Utah<br>
Utah;1/16/2017;Martin Luther King Jr.'s Birthday;Utah<br>
Utah;2/20/2017;President's Day;Utah<br>
Utah;5/29/2017;Memorial Day;Utah<br>
Utah;7/4/2017;Independence Day;Utah<br>
Utah;7/24/2017;Pioneer Day;Utah<br>
Utah;9/4/2017;Labor Day;Utah<br>
Utah;10/9/2017;Columbus Day;Utah<br>
Utah;11/10/2017;Veterans Day Observed;Utah<br>
Utah;11/23/2017;Thanksgiving Day;Utah<br>
Utah;12/25/2017;Christmas Day;Utah<br>
Utah;1/1/2018;New Year's Day;Utah<br>
Utah;1/15/2018;Martin Luther King Jr.'s Birthday;Utah<br>
Utah;2/19/2018;President's Day;Utah<br>
Utah;5/28/2018;Memorial Day;Utah<br>
Utah;7/4/2018;Independence Day;Utah<br>
Utah;7/24/2018;Pioneer Day;Utah<br>
Utah;9/3/2018;Labor Day;Utah<br>
Utah;10/8/2018;Columbus Day;Utah<br>
Utah;11/12/2018;Veterans Day;Utah<br>
Utah;11/22/2018;Thanksgiving Day;Utah<br>
Utah;12/25/2018;Christmas Day;Utah<br>
Utah;1/1/2019;New Year’s Day;Utah<br>
Utah;1/21/2019;Martin Luther King Jr.'s Birthday;Utah<br>
Utah;2/18/2019;President’s Day;Utah<br>
Utah;5/27/2019;Memorial Day;Utah<br>
Utah;7/4/2019;Independence Day;Utah<br>
Utah;7/24/2019;Pioneer Day;Utah<br>
Utah;9/2/2019;Labor Day;Utah<br>
Utah;10/14/2019;Columbus Day;Utah<br>
Utah;11/11/2019;Veterans Day;Utah<br>
Utah;11/28/2019;Thanksgiving Day;Utah<br>
Utah;12/25/2019;Christmas Day;Utah<br>
Utah;1/1/2020;New Year’s Day;Utah<br>
Utah;1/20/2020;Martin Luther King Jr.'s Birthday;Utah<br>
Utah;2/17/2020;President’s Day;Utah<br>
Utah;5/25/2020;Memorial Day;Utah<br>
Utah;7/3/2020;Independence Day;Utah<br>
Utah;7/24/2020;Pioneer Day;Utah<br>
Utah;9/7/2020;Labor Day;Utah<br>
Utah;10/12/2020;Columbus Day;Utah<br>
Utah;11/11/2020;Veterans Day;Utah<br>
Utah;11/26/2020;Thanksgiving Day;Utah<br>
Utah;12/25/2020;Christmas Day;Utah<br>
Vermont;1/2/2017;New Year's Day;Vermont<br>
Vermont;1/16/2017;Martin Luther King Jr.'s Birthday;Vermont<br>
Vermont;2/20/2017;President's Day;Vermont<br>
Vermont;3/7/2017;Town Meeting Day;Vermont<br>
Vermont;5/29/2017;Memorial Day;Vermont<br>
Vermont;7/4/2017;Independence Day;Vermont<br>
Vermont;8/16/2017;Bennington Battle Day;Vermont<br>
Vermont;9/4/2017;Labor Day;Vermont<br>
Vermont;11/10/2017;Veterans Day Observed;Vermont<br>
Vermont;11/23/2017;Thanksgiving Day;Vermont<br>
Vermont;12/25/2017;Christmas Day;Vermont<br>
Vermont;1/1/2018;New Year's Day;Vermont<br>
Vermont;1/15/2018;Martin Luther King Jr.'s Birthday;Vermont<br>
Vermont;2/19/2018;President's Day;Vermont<br>
Vermont;3/6/2018;Town Meeting Day;Vermont<br>
Vermont;5/28/2018;Memorial Day;Vermont<br>
Vermont;7/4/2018;Independence Day;Vermont<br>
Vermont;8/16/2018;Bennington Battle Day;Vermont<br>
Vermont;9/3/2018;Labor Day;Vermont<br>
Vermont;11/12/2018;Veterans Day;Vermont<br>
Vermont;11/22/2018;Thanksgiving Day;Vermont<br>
Vermont;12/25/2018;Christmas Day;Vermont<br>
Vermont;1/1/2019;New Year’s Day;Vermont<br>
Vermont;1/21/2019;Martin Luther King Jr.'s Birthday;Vermont<br>
Vermont;2/18/2019;President’s Day;Vermont<br>
Vermont;3/5/2019;Town Meeting Day;Vermont<br>
Vermont;5/27/2019;Memorial Day;Vermont<br>
Vermont;7/4/2019;Independence Day;Vermont<br>
Vermont;8/16/2019;Bennington Battle Day;Vermont<br>
Vermont;9/2/2019;Labor Day;Vermont<br>
Vermont;11/11/2019;Veterans Day;Vermont<br>
Vermont;11/28/2019;Thanksgiving Day;Vermont<br>
Vermont;12/25/2019;Christmas Day;Vermont<br>
Vermont;1/1/2020;New Year’s Day;Vermont<br>
Vermont;1/20/2020;Martin Luther King Jr.'s Birthday;Vermont<br>
Vermont;2/17/2020;President’s Day;Vermont<br>
Vermont;3/3/2020;Town Meeting Day;Vermont<br>
Vermont;5/25/2020;Memorial Day;Vermont<br>
Vermont;7/3/2020;Independence Day;Vermont<br>
Vermont;8/17/2020;Bennington Battle Day;Vermont<br>
Vermont;9/7/2020;Labor Day;Vermont<br>
Vermont;11/11/2020;Veterans Day;Vermont<br>
Vermont;11/26/2020;Thanksgiving Day;Vermont<br>
Vermont;12/25/2020;Christmas Day;Vermont<br>
Virginia;1/2/2017;New Year's Day;Virginia<br>
Virginia;1/16/2017;Martin Luther King Jr.'s Birthday;Virginia<br>
Virginia;2/20/2017;President's Day;Virginia<br>
Virginia;5/29/2017;Memorial Day;Virginia<br>
Virginia;7/4/2017;Independence Day;Virginia<br>
Virginia;9/4/2017;Labor Day;Virginia<br>
Virginia;11/10/2017;Veterans Day Observed;Virginia<br>
Virginia;11/23/2017;Thanksgiving Day;Virginia<br>
Virginia;12/25/2017;Christmas Day;Virginia<br>
Virginia;1/1/2018;New Year's Day;Virginia<br>
Virginia;1/15/2018;Martin Luther King Jr.'s Birthday;Virginia<br>
Virginia;2/19/2018;President's Day;Virginia<br>
Virginia;5/28/2018;Memorial Day;Virginia<br>
Virginia;7/4/2018;Independence Day;Virginia<br>
Virginia;9/3/2018;Labor Day;Virginia<br>
Virginia;11/12/2018;Veterans Day;Virginia<br>
Virginia;11/22/2018;Thanksgiving Day;Virginia<br>
Virginia;12/25/2018;Christmas Day;Virginia<br>
Virginia;1/1/2019;New Year’s Day;Virginia<br>
Virginia;1/21/2019;Martin Luther King Jr.'s Birthday;Virginia<br>
Virginia;2/18/2019;President’s Day;Virginia<br>
Virginia;5/27/2019;Memorial Day;Virginia<br>
Virginia;7/4/2019;Independence Day;Virginia<br>
Virginia;9/2/2019;Labor Day;Virginia<br>
Virginia;11/11/2019;Veterans Day;Virginia<br>
Virginia;11/28/2019;Thanksgiving Day;Virginia<br>
Virginia;12/25/2019;Christmas Day;Virginia<br>
Virginia;1/1/2020;New Year’s Day;Virginia<br>
Virginia;1/20/2020;Martin Luther King Jr.'s Birthday;Virginia<br>
Virginia;2/17/2020;President’s Day;Virginia<br>
Virginia;5/25/2020;Memorial Day;Virginia<br>
Virginia;7/3/2020;Independence Day;Virginia<br>
Virginia;9/7/2020;Labor Day;Virginia<br>
Virginia;11/11/2020;Veterans Day;Virginia<br>
Virginia;11/26/2020;Thanksgiving Day;Virginia<br>
Virginia;12/25/2020;Christmas Day;Virginia<br>
Washington;1/2/2017;New Year's Day;Washington<br>
Washington;1/16/2017;Martin Luther King Jr.'s Birthday;Washington<br>
Washington;2/20/2017;President's Day;Washington<br>
Washington;5/29/2017;Memorial Day;Washington<br>
Washington;7/4/2017;Independence Day;Washington<br>
Washington;9/4/2017;Labor Day;Washington<br>
Washington;11/10/2017;Veterans Day Observed;Washington<br>
Washington;11/23/2017;Thanksgiving Day;Washington<br>
Washington;11/24/2017;Thanksgiving Friday;Washington<br>
Washington;12/25/2017;Christmas Day;Washington<br>
Washington;1/1/2018;New Year's Day;Washington<br>
Washington;1/15/2018;Martin Luther King Jr.'s Birthday;Washington<br>
Washington;2/19/2018;President's Day;Washington<br>
Washington;5/28/2018;Memorial Day;Washington<br>
Washington;7/4/2018;Independence Day;Washington<br>
Washington;9/3/2018;Labor Day;Washington<br>
Washington;11/12/2018;Veterans Day;Washington<br>
Washington;11/22/2018;Thanksgiving Day;Washington<br>
Washington;11/23/2018;Thanksgiving Friday;Washington<br>
Washington;12/25/2018;Christmas Day;Washington<br>
Washington;1/1/2019;New Year’s Day;Washington<br>
Washington;1/21/2019;Martin Luther King Jr.'s Birthday;Washington<br>
Washington;2/18/2019;President’s Day;Washington<br>
Washington;5/27/2019;Memorial Day;Washington<br>
Washington;7/4/2019;Independence Day;Washington<br>
Washington;9/2/2019;Labor Day;Washington<br>
Washington;11/11/2019;Veterans Day;Washington<br>
Washington;11/28/2019;Thanksgiving Day;Washington<br>
Washington;11/29/2019;Thanksgiving Friday;Washington<br>
Washington;12/25/2019;Christmas Day;Washington<br>
Washington;1/1/2020;New Year’s Day;Washington<br>
Washington;1/20/2020;Martin Luther King Jr.'s Birthday;Washington<br>
Washington;2/17/2020;President’s Day;Washington<br>
Washington;5/25/2020;Memorial Day;Washington<br>
Washington;7/3/2020;Independence Day;Washington<br>
Washington;9/7/2020;Labor Day;Washington<br>
Washington;11/11/2020;Veterans Day;Washington<br>
Washington;11/26/2020;Thanksgiving Day;Washington<br>
Washington;11/27/2020;Thanksgiving Friday;Washington<br>
Washington;12/25/2020;Christmas Day;Washington<br>
West Virginia;5/29/2017;Memorial Day;West Virginia<br>
West Virginia;6/20/2017;West Virginia Day;West Virginia<br>
West Virginia;7/4/2017;Independence Day;West Virginia<br>
West Virginia;9/4/2017;Labor Day;West Virginia<br>
West Virginia;10/9/2017;Columbus Day;West Virginia<br>
West Virginia;11/8/2017;General Election Day;West Virginia<br>
West Virginia;11/10/2017;Veterans Day Observed;West Virginia<br>
West Virginia;11/23/2017;Thanksgiving Day;West Virginia<br>
West Virginia;11/24/2017;Thanksgiving Friday;West Virginia<br>
West Virginia;12/25/2017;Christmas Day;West Virginia<br>
West Virginia;5/28/2018;Memorial Day;West Virginia<br>
West Virginia;6/20/2018;West Virginia Day;West Virginia<br>
West Virginia;7/4/2018;Independence Day;West Virginia<br>
West Virginia;9/3/2018;Labor Day;West Virginia<br>
West Virginia;10/8/2018;Columbus Day;West Virginia<br>
West Virginia;11/6/2018;General Election Day;West Virginia<br>
West Virginia;11/12/2018;Veterans Day;West Virginia<br>
West Virginia;11/22/2018;Thanksgiving Day;West Virginia<br>
West Virginia;11/23/2018;Thanksgiving Friday;West Virginia<br>
West Virginia;12/25/2018;Christmas Day;West Virginia<br>
West Virginia;5/27/2019;Memorial Day;West Virginia<br>
West Virginia;6/20/2019;West Virginia Day;West Virginia<br>
West Virginia;7/4/2019;Independence Day;West Virginia<br>
West Virginia;9/2/2019;Labor Day;West Virginia<br>
West Virginia;10/14/2019;Columbus Day;West Virginia<br>
West Virginia;11/11/2019;Veterans Day;West Virginia<br>
West Virginia;11/28/2019;Thanksgiving Day;West Virginia<br>
West Virginia;11/29/2019;Thanksgiving Friday;West Virginia<br>
West Virginia;12/25/2019;Christmas Day;West Virginia<br>
West Virginia;5/25/2020;Memorial Day;West Virginia<br>
West Virginia;6/20/2020;West Virginia Day;West Virginia<br>
West Virginia;7/3/2020;Independence Day;West Virginia<br>
West Virginia;9/7/2020;Labor Day;West Virginia<br>
West Virginia;10/12/2020;Columbus Day;West Virginia<br>
West Virginia;11/3/2020;General Election Day;West Virginia<br>
West Virginia;11/11/2020;Veterans Day;West Virginia<br>
West Virginia;11/26/2020;Thanksgiving Day;West Virginia<br>
West Virginia;11/27/2020;Thanksgiving Friday;West Virginia<br>
West Virginia;12/25/2020;Christmas Day;West Virginia<br>
Wisconsin;1/2/2017;New Year's Day;Wisconsin<br>
Wisconsin;1/2/2017;New Year's Eve (Obsvd) (Varies by County);Wisconsin<br>
Wisconsin;1/16/2017;Day MLK Jr. (Varies by County);Wisconsin<br>
Wisconsin;2/20/2017;President's Day  -Varies by County;Wisconsin<br>
Wisconsin;4/14/2017;Good Friday - Varies by County;Wisconsin<br>
Wisconsin;5/29/2017;Memorial Day;Wisconsin<br>
Wisconsin;7/4/2017;Independence Day;Wisconsin<br>
Wisconsin;9/4/2017;Labor Day;Wisconsin<br>
Wisconsin;10/9/2017;Columbus Day - Varies by County;Wisconsin<br>
Wisconsin;11/10/2017;Veterans Day - Varies by County;Wisconsin<br>
Wisconsin;11/23/2017;Thanksgiving Day;Wisconsin<br>
Wisconsin;11/24/2017;Thanksgiving Friday- varies by county;Wisconsin<br>
Wisconsin;12/22/2017;Christmas Eve - Varies by County;Wisconsin<br>
Wisconsin;12/25/2017;Christmas Day;Wisconsin<br>
Wisconsin;1/1/2018;New Year's Day;Wisconsin<br>
Wisconsin;1/15/2018;Day MLK Jr. (Varies by County);Wisconsin<br>
Wisconsin;2/19/2018;President's Day  -Varies by County;Wisconsin<br>
Wisconsin;3/30/2018;Good Friday - Varies by County;Wisconsin<br>
Wisconsin;5/28/2018;Memorial Day;Wisconsin<br>
Wisconsin;7/4/2018;Independence Day;Wisconsin<br>
Wisconsin;9/3/2018;Labor Day;Wisconsin<br>
Wisconsin;10/8/2018;Columbus Day - Varies by County;Wisconsin<br>
Wisconsin;11/12/2018;Veterans Day - Varies by County;Wisconsin<br>
Wisconsin;11/22/2018;Thanksgiving Day;Wisconsin<br>
Wisconsin;11/23/2018;Thanksgiving Friday- varies by county;Wisconsin<br>
Wisconsin;12/22/2018;Christmas Eve - Varies by County;Wisconsin<br>
Wisconsin;12/25/2018;Christmas Day;Wisconsin<br>
Wisconsin;1/1/2019;New Year’s Day;Wisconsin<br>
Wisconsin;1/21/2019;Day MLK Jr. (Varies by County);Wisconsin<br>
Wisconsin;2/18/2019;President's Day  - Varies by County;Wisconsin<br>
Wisconsin;4/29/2019;Good Friday - Varies by County;Wisconsin<br>
Wisconsin;5/27/2019;Memorial Day;Wisconsin<br>
Wisconsin;7/4/2019;Independence Day;Wisconsin<br>
Wisconsin;9/2/2019;Labor Day;Wisconsin<br>
Wisconsin;10/14/2019;Columbus Day - Varies by County;Wisconsin<br>
Wisconsin;11/28/2019;Thanksgiving Day;Wisconsin<br>
Wisconsin;11/29/2019;Thanksgiving Friday- varies by county;Wisconsin<br>
Wisconsin;12/24/2019;Christmas Eve - Varies by County;Wisconsin<br>
Wisconsin;12/25/2019;Christmas Day;Wisconsin<br>
Wisconsin;1/1/2020;New Year’s Day;Wisconsin<br>
Wisconsin;2/17/2020;President's Day  -Varies by County;Wisconsin<br>
Wisconsin;5/25/2020;Memorial Day;Wisconsin<br>
Wisconsin;7/3/2020;Independence Day;Wisconsin<br>
Wisconsin;9/7/2020;Labor Day;Wisconsin<br>
Wisconsin;10/12/2020;Columbus Day - Varies by County;Wisconsin<br>
Wisconsin;11/26/2020;Thanksgiving Day;Wisconsin<br>
Wisconsin;11/27/2020;Thanksgiving Friday- varies by county;Wisconsin<br>
Wisconsin;12/24/2020;Christmas Eve - Varies by County;Wisconsin<br>
Wisconsin;12/25/2020;Christmas Day;Wisconsin<br>
Wyoming;1/2/2017;New Year's Day;Wyoming<br>
Wyoming;1/16/2017;Martin Luther King Jr.'s Birthday;Wyoming<br>
Wyoming;2/20/2017;President's Day;Wyoming<br>
Wyoming;5/29/2017;Memorial Day;Wyoming<br>
Wyoming;7/4/2017;Independence Day;Wyoming<br>
Wyoming;9/4/2017;Labor Day;Wyoming<br>
Wyoming;11/10/2017;Veterans Day Observed;Wyoming<br>
Wyoming;11/23/2017;Thanksgiving Day;Wyoming<br>
Wyoming;12/25/2017;Christmas Day;Wyoming<br>
Wyoming;1/1/2018;New Year's Day;Wyoming<br>
Wyoming;1/15/2018;Martin Luther King Jr.'s Birthday;Wyoming<br>
Wyoming;2/19/2018;President's Day;Wyoming<br>
Wyoming;5/28/2018;Memorial Day;Wyoming<br>
Wyoming;7/4/2018;Independence Day;Wyoming<br>
Wyoming;9/3/2018;Labor Day;Wyoming<br>
Wyoming;11/12/2018;Veterans Day (Obsvd);Wyoming<br>
Wyoming;11/22/2018;Thanksgiving Day;Wyoming<br>
Wyoming;12/25/2018;Christmas Day;Wyoming<br>
Wyoming;1/1/2019;New Year’s Day;Wyoming<br>
Wyoming;1/21/2019;Martin Luther King Jr.'s Birthday;Wyoming<br>
Wyoming;2/18/2019;President’s Day;Wyoming<br>
Wyoming;5/27/2019;Memorial Day;Wyoming<br>
Wyoming;7/4/2019;Independence Day;Wyoming<br>
Wyoming;9/2/2019;Labor Day;Wyoming<br>
Wyoming;11/11/2019;Veterans Day (Obsvd);Wyoming<br>
Wyoming;11/28/2019;Thanksgiving Day;Wyoming<br>
Wyoming;12/25/2019;Christmas Day;Wyoming<br>
Wyoming;1/1/2020;New Year’s Day;Wyoming<br>
Wyoming;1/20/2020;Martin Luther King Jr.'s Birthday;Wyoming<br>
Wyoming;2/17/2020;President’s Day;Wyoming<br>
Wyoming;5/25/2020;Memorial Day;Wyoming<br>
Wyoming;7/3/2020;Independence Day;Wyoming<br>
Wyoming;9/7/2020;Labor Day;Wyoming<br>
Wyoming;11/11/2020;Veterans Day (Obsvd);Wyoming<br>
Wyoming;11/26/2020;Thanksgiving Day;Wyoming<br>
Wyoming;12/25/2020;Christmas Day;Wyoming<br>
</p>

</div>
</body> 
</html>
