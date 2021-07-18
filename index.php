<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>Argonautes</title>
  </head>
    <body>
      <header>
        <h1>
          <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
        Les Argonautes
        </h1>
      </header>
      <div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-lg-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h2 class="login-heading mb-4">Ajouter un(e) Argonaute</h2>
                    <form class="new-member-form" method="post">
                      <label for="name">Nom de l&apos;Argonaute </label>
                      <input class="form-label-group" id="name" name="name" type="text" placeholder="Charalampos" required autofocus/>
                      <button class="btn btn-lg btn-secondary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Enregistrer</button>
                    </form>
                    <div>
                      <h2>Membres de l'équipage</h2>
                      <div>
                        <?php
                          include ("db.inc.php");
                          if (isset ($_POST["name"])) {
                              $pseudo = $_POST["name"];

                              $sql = "INSERT INTO `username` (`id`, `pseudo`) VALUES (NULL, '".$pseudo."'); ";
                              if ($conn->query($sql) === TRUE) {
                              } else {
                                  echo "Oups, il semble qu'il y a une erreur : " . $sql . "<br>" . $conn->error;
                              }
                          }
                        ?>
                        <ul>
                          <?php
                              /*include ("db.inc.php");*/
                              $sql = "SELECT id, pseudo FROM username";
                              $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  echo "<li>" . $row["pseudo"]. "</li>";
                                }
                              } else {
                                echo "Pas de résultat";
                              }
                              $conn->close();
                          ?>
                        </ul>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <footer>
      <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
    </footer> 
  </body>
</html>
