<!DOCTYPE html>
<html>
<head>
<title>AJAX กับ Check box</title>
</head>
<body>
คลิกเลือก checkbox แต่ละตัว แล้วลอง Refresh ดู จะเห็นว่าค่า Checkbox ยังคงอยู่<br />
แสดงว่าข้อมูลการคลิก จัดเก็บลงฐานข้อมูลเรียบร้อยแล้ว
<div id=status> </div>
<table border="0" cellspacing="0" cellpadding="0">
<?
  for ($i=0; $i<$num_rows; $i++) {
    $result=mysql_fetch_array($query);
    $check=($result[sel]==1) ? "checked":"";
    echo "<tr><td id=topic$i>$result[topic]</td><td><input type=checkbox id=$result[id] onclick='doClick(this);' $check></td></tr> ";
  }
?>
</table>
<?
  //ยกเลิกการติดต่อกับฐานข้อมูล
  mysql_close($connect);
?>
</body>
</html>
<script>
//AJAX สำหรับจัดการบันทึกลงฐานข้อมูล
function Inint_AJAX() {
  try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {}
  try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {}
  try { return new XMLHttpRequest(); } catch(e) {}
  alert("XMLHttpRequest not supported");
  return null;
}

//คำสั่งที่ทำเมื่อคลิก checkbox
function doClick(chk) {
  var req = Inint_AJAX();
  var val=(chk.checked) ? 1:0;
  var id= String(chk.id);
  req.open('GET', 'save.php?id='+id+'&val='+val, true);
  req.onreadystatechange = function() {
    if (req.readyState==4) {
      if (req.status==200) {
        var data=req.responseText;
        //แสดง error ถ้ามี
        document.getElementById("status").innerHTML=data;
      }
    }
  };
  req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8"); // set Header
  req.send(null);
}

</script>