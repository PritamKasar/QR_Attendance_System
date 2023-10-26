<?php
$server="localhost";
$username="root";
$password="";
$database="scannattend";
$connect= mysqli_connect($server,$username,$password,$database);
if(!$connect)
{
  die("Error!". mysqli_connect_error());
}
$filename='Attendance-Sheet-'.date('d-m-Y').'.csv';
$query="select * from attendance";
$result=mysqli_query($connect,$query);
$data=array();
$excel=fopen($filename,"w");
$data=array("Sr.No","Name","PRN","Email","Mobile","Time");
fputcsv($excel,$data);

while($row=mysqli_fetch_array($result))
{
    $Sr_No=$row['sr_no'];
    $Name=$row['name'];
    $PRN=$row['prn'];
    $Email=$row['email'];
    $Mobile=$row['mo_no'];
    $Time=$row['time'];
    
    $data=array($Sr_No,$Name,$PRN,$Email,$Mobile,$Time);
    fputcsv($excel,$data);
    
}
fclose($excel);
$date=date('d-m-Y');
header("Content-Description:Attendance-Sheet-$date");
header("Content-Disposition:filename=$filename");
header("Content-type:application/csv;");
readfile($filename);
unlink($filename);
exit();
?>