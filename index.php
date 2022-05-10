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
</head>

<body>


<ul>
  <li><a href="index.php"class="active" href="">AggiungiEvento</a></li>
  <li><a href="search.php">Ricerca Evento</a></li>
  <li><a><?php session_start(); echo $nick = $_SESSION['nickname']; ?></a></li>
</ul>
<div class="content">

</div>
<div class="add">
  <h1>Aggiungi Evento</h1>
  <form action="index.php" method="post" id="formuser">
    <label for="titolo">Titolo</label><br>
    <input type="text" id="titolo" name="titolo" ><br><br>
    <label for="data">Data</label><br>
    <input type="date" id="data" name="data"><br><br>
    <label for="luogo">Luogo</label><br>
    <input type="text" id="luogo" name="luogo"><br><br>
    <label for="categoria">Categoria</label><br>
    <select name="categoria" id="categoria">
    <option value="">Scegli</option>
    <option value="concerto">Concerto</option>
    <option value="balletto">Balletto</option>
    <option value="teatro">Spettacolo teatrale</option>
    <option value="mostra">Mostra d'arte</option>
    </select><br><br>
  
    <input type="submit" value="Aggiungi" name="add">
  </form>
</div>

<?php
if(isset($_POST['add'])){
  insertIntoDb();
}

function insertIntoDb(){
  $titolo = $_POST['titolo'];
  $data = $_POST['data'];
  $luogo = $_POST['luogo'];
  $categoria = $_POST['categoria'];
  $conn = new mysqli("localhost", "root", "", "webcommunity");
  //get the category id
  $sql = "SELECT idCategoria FROM categorie WHERE descrizione = '$categoria'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id_categoria = $row['idCategoria'];
  $cf = $_SESSION['CF'];
  $sql = "INSERT INTO eventi (titolo, data, luogo,publicatoDa, categoria) VALUES ('$titolo', '$data', '$luogo','$cf' ,'$id_categoria')";
  $conn->query($sql);
  $conn->close();
}
?>
</body>
</html>