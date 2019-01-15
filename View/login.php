<?php
/**
 * Created by PhpStorm.
 * User: Yacine BENKAIDALI
 * Date: 15-Jan-19
 * Time: 19:49
 */
echo "<div class=\"modal fade\" id=\"myModal\" role=\"dialog\">
                    <div class=\"modal-dialog\">

                        <!-- Modal content-->
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h4 class=\"modal-title\">Log in info</h4>
                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                            </div>
                            <div class=\"modal-body\">
                                <form method=\"post\">
                                    <div class=\"form-group\">
                                        <label for=\"usernameinput\">Nom d'utilisateur</label>
                                        <input class=\"form-control\" id=\"usernameinput\"
                                               placeholder=\"Entrer nom d'utilisateur\" name=\"uname\">
                                    </div>
                                    <div class=\"form-group\">
                                        <label for=\"passwordinput\">Password</label>
                                        <input type=\"password\" class=\"form-control\" id=\"passwordinput\"
                                               placeholder=\"Entrer password\" name=\"psw\">
                                    </div>
                                    <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>";