                    <div class="d-flex justify-content-end ml-auto">
                        <?php 
                            if (!isset($_SESSION["UserName"])) {
                        ?>
                        <form method='POST' class='d-flex flex-row'>
                            <input type='hidden' name='action' value='Login'>
                            <table>
                                <tr><td><label>Nom d'usager : </label></td><td><input type='text' name='UserName' value='OD'></td></tr>
                                <tr><td><label>Mot de passe : </label></td><td><input type='password' name='Password' value='OD'></td></tr>
                            </table>
                            <div>
                                <button type='submit' class='btn btn-danger'>Se&nbsp;connecter</button>
                            </div>
                        </form>
                        <?php
                            }
                            else { 
                        ?>
                            <div>
                                <a href='index.php?Users&action=Logout'><button class='btn btn-secondary'>Se&nbsp;déconnecter</button></a>
                            </div>
                        <?php
                            } 
                        ?>
                    </div>
