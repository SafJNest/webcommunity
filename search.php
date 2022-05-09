<!DOCTYPE html>
<html>
<head>
  <title>Web Community</title>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
  </style>
  
  <style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		border: 1px solid #e7e7e7;
		background-color: #f3f3f3;
	}

	li {
	float: left;
	}

	li a {
		display: block;
		color: #666;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover:not(.active) {
		background-color: #ddd;
	}

	li a.active {
		color: white;
		background-color: #04AA6D;
	}

	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

  tr:nth-child(even){background-color: #f2f2f2}

  th {
	background-color: #04AA6D;
	color: white;
  }
  </style>
  <script src="script.js"></script>
</head>

<body>


<ul>
  <li><a href="index.php" href="">AggiungiEvento</a></li>
  <li><a href="search.php" class="active">Ricerca Evento</a></li>
  <li><a href="">About</a></li>
</ul>
<div class="content">

</div>
<div class="search">
<h1>CERCA EVENTO</h1>
  <form action="search.php" method="post">
    <input type="text" name="search" placeholder="Citta di...">
    <input type="submit" value="search">
  </form>
</div>


<?php
if(isset($_POST['search'])){
  search();
}

function search(){
  $conn = new mysqli("localhost", "root", "", "webcommunity");
  $sql = "SELECT * FROM eventi WHERE luogo LIKE '".$_POST['search']."%'";
  $result = $conn->query($sql);
  echo "<table>";
  echo "<tr>";
  echo "<th>Titolo</th>";
  echo "<th>Data</th>";
  echo "<th>Luogo</th>";
  echo "<th>Categoria</th>";
  echo "</tr>";
  while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row['titolo']."</td>";
    echo "<td>".$row['data']."</td>";
    echo "<td>".$row['luogo']."</td>";
    echo "<td>".$row['categoria']."</td>";
    echo "</tr>";


  }
}
?>
</body>
</html>