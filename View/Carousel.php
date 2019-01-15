<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 15-Jan-19
 * Time: 17:12
 */
echo "<div class=\"carousel slide carousel-fade\" data-ride=\"carousel\" data-interval=\"3000\" id=\"carousel-1\"
             style=\"margin-left:auto;margin-right:auto;width:80%;height:100%;\">
            <div class=\"carousel-inner\" role=\"listbox\" style=\"height:20%;\">
                <div class=\"carousel-item\"><img width=\"500px\" height=\"350px\" class=\"w-100 d-block\"
                                                src=\"../assets/img/image1.jpg\"
                                                alt=\"Slide Image\"></div>
                <div class=\"carousel-item\"><img width=\"500px\" height=\"350px\" class=\"w-100 d-block\"
                                                src=\"../assets/img/image2.png\"
                                                alt=\"Slide Image\"></div>
                <div class=\"carousel-item active\"><img width=\"500px\" height=\"350px\" class=\"w-100 d-block\"
                                                       src=\"../assets/img/image3.png\"
                                                       alt=\"Slide Image\"></div>
            </div>
            <div><a class=\"carousel-control-prev\" href=\"#carousel-1\" role=\"button\" data-slide=\"prev\"><span
                            class=\"carousel-control-prev-icon\"></span><span
                            class=\"sr-only\">Previous</span></a><a class=\"carousel-control-next\" href=\"#carousel-1\"
                                                                  role=\"button\"
                                                                  data-slide=\"next\"><span
                            class=\"carousel-control-next-icon\"></span><span class=\"sr-only\">Next</span></a></div>
            <ol class=\"carousel-indicators\">
                <li data-target=\"#carousel-1\" data-slide-to=\"0\"></li>
                <li data-target=\"#carousel-1\" data-slide-to=\"1\"></li>
                <li data-target=\"#carousel-1\" data-slide-to=\"2\" class=\"active\"></li>
            </ol>
        </div>";
