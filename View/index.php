<?php
require ("../Controller/Datasrc.php");
require ("../Controller/Sessions.php");
$datasrc =new DataSrc('projettdw');
$session = new Sessions();
$session->CreateSession($datasrc ,"uname","psw");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-w
                idth, initial-scale=1.0">
    <title>TDW</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Card-Group1-Shadow.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div id="bordered-container">
        <div style="width:80%;height:10vh;margin-left:auto;margin-right:auto;text-align:center;"><img class="d-inline-block" src="../assets/img/logo.png" alt="logo" style="text-align:center;height:61px;"></div>
        <div>
            <div class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000" id="carousel-1" style="margin-left:auto;margin-right:auto;width:80%;height:100%;">
                <div class="carousel-inner" role="listbox" style="height:20%;">
                    <div class="carousel-item"><img width ="500px" height="350px" class="w-100 d-block" src="../assets/img/image1.jpg"
                            alt="Slide Image"></div>
                    <div class="carousel-item"><img width ="500px" height="350px" class="w-100 d-block" src="../assets/img/image2.png"
                            alt="Slide Image"></div>
                    <div class="carousel-item active"><img width ="500px" height="350px" class="w-100 d-block" src="../assets/img/image3.png"
                            alt="Slide Image"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span
                            class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                        data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
                </ol>
            </div>
            <div class="row" id="menu-desc">
                <div class="col-md-2 w-15">
                    <nav class=" float-left">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item ">
                                <a class="nav-link" href="#">New Vision</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Log in</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./Catagorie.php?page_name=Maternelles">Maternelle</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./Catagorie.php?page_name=Primaires">Primaire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="./Catagorie.php?page_name=Moyennes">Moyen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="./Catagorie.php?page_name=
Secondaires">Secondaire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="./Catagorie.php?page_name=universitaires,professionnelles">formation professionnelle et
                                    universitaire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#" data-toggle="modal" data-target="#myModal">Commenter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="./Comparaison.php">Comparaison</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="./Catagorie.php?page_name=A propos">A propos</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Log in info</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="usernameinput">Nom d'utilisateur</label>
                                            <input class="form-control" id="usernameinput"  placeholder="Entrer nom d'utilisateur" name="uname">
                                        </div>
                                        <div class="form-group">
                                            <label for="passwordinput">Password</label>
                                            <input type="password" class="form-control" id="passwordinput" placeholder="Entrer password" name="psw">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4 box-shadow rounded-0"><img src="../assets/img/minibus.jpeg"
                                            class="card-img-top w-100 d-block rounded-0" />
                                        <div class="card-body">
                                            <h4 class="card-title"><a class="page-link" href="Catagorie.php?page_name=Maternelles">Maternelle</a></h4>
                                            <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit.
                                                Cras justo odio, dapibus ac facilisis in, egestas eget qu ghgjhghg glo.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4 box-shadow"><img src="../assets/img/minibus.jpeg" class="card-img-top w-100 d-block" />
                                        <div class="card-body">
                                            <h4 class="card-title"><a class="page-link" href="Catagorie.php?page_name=Primaires">Primaires</a></h4>
                                            <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit.
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id
                                                elit non mi porta gravida at eget metus.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4 box-shadow"><img src="../assets/img/minibus.jpeg" class="card-img-top w-100 d-block" />
                                        <div class="card-body">
                                            <h4 class="card-title"><a class="page-link" href="Catagorie.php?page_name=Moyennes">Moyen</a></h4>
                                            <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit.
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id
                                                elit non mi porta gravida at eget metus.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4 box-shadow"><img src="../assets/img/minibus.jpeg" class="card-img-top w-100 d-block" />
                                        <div class="card-body">
                                            <h4 class="card-title"><a class="page-link" href="Catagorie.php?page_name=Secondaires">Secondaires</a></h4>
                                            <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit.
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id
                                                elit non mi porta gravida at eget metus.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4 box-shadow"><img class="card-img-top w-100 d-block" src="../assets/img/minibus.jpeg" />
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="Catagorie.php?page_name=universitaires,professionnelles">formation professionnelle et universitaire</a> </h4>
                                            <h6 class="text-muted card-subtitle mb-2">Subtitle</h6>
                                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit.
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id
                                                elit non mi porta gravida at eget metus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="footer-dark">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 item">
                            <h3>Services</h3>
                            <ul>
                                <li><a href="#">New Vision</a></li>
                                <li><a href=""></a></li>
                                <li><a href="./Catagorie.php?page_name=Maternelle">Maternelle</a></li>
                                <li><a href="./Catagorie.php?page_name=Primaire">primaire</a></li>
                                <li><a href="./Catagorie.php?page_name=Moyen">Moyen</a></li>
                                <li><a href="./Catagorie.php?page_name=Secondaire">secondaire</a></li>
                                <li><a href="./Catagorie.php?page_name=formation professionnelle et universitaire">formation professionnelle et universitaire</a></li>
                                <li><a href="./Catagorie.php?page_name=A propos">A propos</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 item text">
                            <h3 >Centre Foramtion</h3>
                            <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut
                                vehicula
                                rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar
                                dictum
                                vel in justo.</p>
                        </div>
                        <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i
                                    class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a
                                href="#"><i class="icon ion-social-instagram"></i></a></div>
                    </div>
                    <p class="copyright">Yacine BENKAIDALI © 2019</p>
                </div>
            </footer>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Controller/script.js"></script>
</body>

</html>