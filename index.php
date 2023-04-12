<!DOCTYPE html>
<html lang="en">
    <style>
        #field {
            border: 1px solid rgb(105, 2, 2);
            border-radius: 20px;
            background-color:hsl(32, 26%, 86%);
            background-image: url(img_flwr.jpg);
            background-position: right bottom, left top;
            background-repeat: no-repeat, repeat;
        }
        
        input[type=text], [type=number], [type=date], [type=time], select{
            width: 28.5%;
            border: 1px solid saddlebrown;
            border-radius: 6px;
        }

        textarea {
            width: 68%;
            border: 1px solid saddlebrown;
            border-radius: 6px;
        }

        label {
            color :rgb(145, 0, 0);
        }

        th {
            color:mintcream;
        }

        td {
            color:rgb(145, 30, 30);
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa</title>
</head>
<body style="background-color:rgb(244, 241, 237);">
    <div id="heading">
        <form method="POST">
            <fieldset id="field">
                <legend id="legend">
                    <h1 style="font-family:'perpetua'; color: rgb(126, 5, 5);">Formulir Pendaftaran Siswa</h1>
                </legend>
                <label for="nama">Nama Calon Siswa &emsp; :</label>
                <input type="text" name="nama"/><br />
                <label for="ttl">Tempat/Tanggal Lahir : </label>
                <input type="text" name="ttl"/>
                <input type="date" name="calender"/><br/>
                <label for="agamaText" >Agama &emsp; &emsp; &emsp; &emsp; &emsp;: </label>
            <select name="agama">
                <option></option>
                <option value="islam">Islam</option>
                <option  value="kristen">Kristen</option>
                <option  value="katolik">Katolik</option>
                <option  value="hindu">Hindu</option>
                <option  value="budha">Budha</option>
                <option  value="konghucu">Kong Hu Cu</option>
            </select><br/>
        <label for="address">Alamat &emsp; &emsp; &emsp; &emsp; &emsp;: </label>
        <textarea type="text" name="address" maxlength="100" cols="45" rows="5"></textarea><br/>
        <label for="nophone">No. Telp /Hp &emsp; &emsp; &emsp; :</label>
        <input type="number" name="nophone" id="number" value=""><br/>
        <label>Jenis Kelamin &emsp; &emsp;&emsp;: </label>
        <input type="radio" name="jk" value="pria"><label>Pria</label><input type="radio" name="jk" value="wanita"><label>Wanita</label><br>
        <label for="hobby">Hobi &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</label>
        <input type="checkbox" name="read" value="read"><label>Membaca</label></input>
        <input type="checkbox" name="write" value="write"><label>Menulis</label></input>
        <input type="checkbox" name="sport" value="sport"><label>Olahraga</label></input><br/>
        <label for="photo">Pas Foto &emsp;&emsp;&emsp;&emsp; &emsp; :</label>
        <input type="file" name="browser_file" value="Browser"/><br/>
        <input type="submit" value="SUBMIT" style="background-color: rgb(255, 255, 255); border-color: whitesmoke;" />
            </fieldset>
        </form>
    </div>

    <?php
    // if(isset($_POST['SUBMIT'])){
        $db = new mysqli("localhost", "root", "", "formulirpendaftaran");
        $nama = $_POST["nama"];
        $tempat = $_POST["ttl"];
        $tanggal = $_POST["calender"];
        $agama = $_POST["agama"];
        $alamat = $_POST["address"];
        $telp = $_POST["nophone"];
        $jeniskelamin = $_POST["jk"];
        $foto = $_POST["browser_file"];
        $insert = $db->query("insert into `siswa` (`nama`, `tempatlahir`, `tanggallahir`, `agama`, `alamat`, `telp`, `jeniskelamin`, `foto`) values ('$nama', '$tempat', '$tanggal', '$agama', '$alamat', '$telp', '$jeniskelamin', '$foto')");
        $db->close();
    //}
    ?>
    <?php
    $db = new mysqli("localhost", "root", "", "formulirpendaftaran");
    $result = $db->query("SELECT * FROM siswa");
    $db->close();
    ?>

    <div id="heading">
        <h1 style="font-family:'perpetua'; color: rgb(126, 5, 5);">Data Pendaftaran Siswa</h1>
    <table border="5" align="left" cellspacing="0" cellpadding="15" style="border-color: rgb(75, 19, 19);">
        <tr style="background-color: hsla(32, 78%, 44%, 0.586);">
          <th rowspan="2">Nama</th>
          <th colspan="2">Lahir</th>
          <th rowspan="2">Agama</th>
          <th rowspan="2">Alamat</th>
          <th rowspan="2">No Telp</th>
          <th rowspan="2">Jenis Kelamin</th>
          <th rowspan="2">Hobi</th>
          <th rowspan="2">Foto</th>
        </tr>
        <tr style="background-color: hsla(32, 98%, 36%, 0.586);">
            <th>Tempat</th>
            <th>Tanggal</th>
        </tr>
        <?php 
        
        
        foreach ($result as $row) {?>

        <tr>
          <td align="left"><?php echo $row["nama"]; ?></td>
          <td align="center"><?php echo $row["tempatlahir"]; ?></td>
          <td align="center"><?php echo $row["tanggallahir"]; ?></td>
          <td align="center"><?php echo $row["agama"]; ?></td>
          <td align="center"><?php echo $row["alamat"]; ?></td>
          <td align="center"><?php echo $row["telp"]; ?></td>
          <td align="center"><?php echo $row["jeniskelamin"]; ?></td>
          <td align="center"><?php echo $row["hobi"]; ?></td>
          <td align="center"><?php echo $row["foto"]; ?></td>
        </tr>
        <?php } ?>



        <!-- <tr>
          <td align="left">Yusuf</td>
          <td align="center">Semarang</td>
          <td align="center">3 Januari 2002</td>
          <td align="center">083619276</td>
          <td align="center">Islam</td>
        </tr> -->
      </table>  
</body>
</html>