<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></SCRIPT>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
body {
background-color:#F5F5F5;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #000;height:10%;
}
button {
  margin: 0;
 position:"center";
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width:70%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color:#fff;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #008080;
  color: white;
}
button.right {
        float: right;
      }

</style>
</head>
<body>
<div class="topnav">

  <h1 style="color:white">Admin</h1>
  <div  text-align="right">
      <a href="/logout"><button class='right'> logout</button></a>
  </div>
</div>

<br><br><br><br><br><br><br>
<center>

  <table id="customers">
    <tr>
      <th>Car Number</th>
      <th>Slot Number</th>
      <th>Type</th>
      <th>Entry Time </th>
      <th>Exit time</th>
    </tr>
    @foreach($views as $view)
      <tr>
        <td>{{$view->carNumber}}</td>
        <td>{{$view->slotNumber}}</td>
        <td>{{$view->Type}}</td>
        <td>{{$view->created_at}}</td>
        <td>{{$view->updated_at}}</td>
      </tr>
    @endforeach
  </table>

</center>
</body>
</html>

</body>
</html>