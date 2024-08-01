<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }


    .dropdown-toggle {
      background-color: transparent !important;
      margin-top: 30px;
      color: white !important;
    }

    label::after {
      content: "*";
      color: red;
      font-size: 15px;
    }

    span {
      color: red;
      font-size: 15px;
      font-weight: bold;
    }

    a {
      text-decoration: none !important;
    }

    td,
    th {
      width: 30px !important;
      vertical-align: middle;

    }

    button,
    th,
    input[type="submit"] {
      background-color: rgb(42, 47, 79) !important;
      color: white !important;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

  <div class="bg-image d-flex align-items-center justify-content-center bg-opacity-25" style="background-image: url('https://c4.wallpaperflare.com/wallpaper/853/586/450/universe-abstract-cube-gradient-wallpaper-preview.jpg');
      height: 100vh ; 
      width: 100vw ; 
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      ">

    <div class="row border border-with border-2 h-75 " style="width:90vw">
      <div class="col-md-4 h-100 border border-with border-2 p-3 ">
        <div class="list-group ">
          <a href="../index.php" class="h1 text text-white p-3" aria-current="true">
            <i class="fa-solid fa-house"></i> Accueil
          </a>
          <div class="dropdown">
            <button href="#" class="btn list-group-item list-group-item-action dropdown-toggle border border-white" data-bs-toggle="dropdown"> <i class="fa-solid fa-school"></i> Etablissement</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item " href="http://localhost:8080/etablissement/consulter.php">Consulter & Actions</a></li>
              <li><a class="dropdown-item " href="http://localhost:8080/etablissement/ajouter.php">Ajouter</a></li>
            </ul>
          </div>
          <div class="dropdown">
            <a href="#" class="list-group-item list-group-item-action dropdown-toggle border border-white" data-bs-toggle="dropdown"><i class="fa-solid fa-landmark"></i> Ecole</a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="http://localhost:8080/ecole/consulter.php">Consulter & Actions</a>
              </li>
              <li><a class="dropdown-item" href="http://localhost:8080/ecole/ajouter.php">Ajouter</a></li>
            </ul>
          </div>
          <div class="dropdown">
            <a href="#" class="list-group-item list-group-item-action dropdown-toggle border border-white" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i> Orienteur</a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="http://localhost:8080/orienteur/consulter.php">Consulter & Actions</a>
              </li>
              <li><a class="dropdown-item" href="http://localhost:8080/orienteur/ajouter.php">Ajouter</a></li>
            </ul>
          </div>
          <div class="dropdown">
            <a href="#" class="list-group-item list-group-item-action dropdown-toggle border border-white" data-bs-toggle="dropdown"><i class="fa-solid fa-calendar-days"></i> Evenement</a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="http://localhost:8080/evenement/consulter.php">Consulter & Actions</a>
              </li>
              <li><a class="dropdown-item" href="http://localhost:8080/evenement/ajouter.php">Ajouter</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-8  h-100 d-flex flex-wrap align-items-center justify-content-center ">
        <div class="h-75  d-flex flex-wrap align-items-center justify-content-center border border-white border-2 p-2" style="overflow:auto;background-color:rgb(104, 55, 87);">