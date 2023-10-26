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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR_Attendance</title>
    <link rel="stylesheet" href="QR_Att_Style.css">
</head>

<body>
    <nav>
        <div class="logo">
            <P> Attendance </P>
        </div>
        <ul>
            <li><a href="First.html">Home</a></li>
            <li><a href="QR_Generater.html">Student Registration</a></li>
            <li><a href="QR_Attendance.html">Take Attendance</a></li>
            <li><a href="#">Log-Out</a></li>
        </ul>
    </nav>
    <div>
        <div>
            <video id="show" width="50%"></video>
        </div>
        <div>
            <?php        
        if(isset($_POST['text']))
        {
            $input=$_POST['text'];
            $data = $input;
            list($Name, $PRN, $Email, $Mobile) = explode(":", $data);
            $insert="insert into attendance values('auto_increment','$Name', '$PRN', '$Email', '$Mobile',NOW())";
            if($connect->query($insert)===TRUE)
            {    
                // header("location: QR_Attendance.php");
        ?>
            <audio src="beep.mp3" autoplay></audio>

            <?php  
            }
        }        
        ?>

        </div>
        <br><br>
        <form action="QR_Attendance.php" method="post">
            <input type="text" name="text" id="text" placeholder="scan " readonly="">
        </form>
        <table>
            <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>PRN</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Time</th>
            </tr>

            <?php
                $select="select sr_no,name,prn,email,mo_no,time from attendance where date(time)=curdate()";
                $check=$connect->query($select);
                while($data=$check->fetch_assoc())
                {
            ?>
            <tr>
                <td>
                    <?php echo $data['sr_no'];?>
                </td>
                <td>
                    <?php echo $data['name'];?>
                </td>
                <td>
                    <?php echo $data['prn'];?>
                </td>
                <td>
                    <?php echo $data['email'];?>
                </td>
                <td>
                    <?php echo $data['mo_no'];?>
                </td>
                <td>
                    <?php echo $data['time'];?>
                </td>
            </tr>


            <?php
        }
        ?>

        </table>
        <div>
            <input type='submit' onclick='Att_Down()' value='Download Attendance'>
        </div>
    </div>
    <footer>
        <p class="bott">Svkm's Institude Of Technology Dhule</p>
    </footer>

</body>
<script>
    function Att_Down()
    {
        window.open("/QR ATTENDANCE SYSTEM/Attendance_Download/QR_Att_Down.php")
    }
</script>
<script type="text/javascript" src="QR_ADAPTER.js"></script>
<script type="text/javascript" src="QR_INSTASCAN.js"></script>
<script type="text/javascript" src="QR_Att_Script.js"> </script>

</html>