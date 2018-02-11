            <div class="row">
                <div class="col-sm-9 offset-sm-2 text-danger">
                    <?php if (isset($data["errors"])) {
                        if ($data["errors"] != "") {
                            echo "<p>" . $data["errors"] . "</p>";
                        }
                    } ?>
                </div>
            </div>
        </main> <!-- From Header.php -->

        <footer class="container-fluid text-center bg-inverse text-white">
            <div class="social">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-youtube"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-pinterest"></a>
            </div>
            <?php
            
            ?>
        </footer>

        <script src="js/jquery.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

    </body>
</html>
