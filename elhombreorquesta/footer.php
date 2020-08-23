</body>

<div class="footer">
    <p>
        <div class="row"><div class="col-lg-8 col-lg-offset-4"><div class="row">
            <div class="col-lg-2">
                <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
                    <img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" />
                </a>
            </div>
            <div class="col-lg-6">
                <p>
                    <?php 	$user_info = get_userdata(1);

                    $first_name = $user_info->first_name;
                    $last_name = $user_info->last_name;
                    echo "$first_name $last_name. ";
                    ?>
                    <br>
                    Basado en Wordpress y Bootstrap.</p>
            </div>
        </div></div></div>
    </p>

    <?php
    wp_footer();
    ?>


</footer>

</html>