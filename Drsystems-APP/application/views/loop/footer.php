    
    <!-- Meta -->
        <script src="../docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../docs/5.3/assets/js/color-modes.js"       ></script>
    <!-- Meta -->

        <script src="<?php echo CDN_URL;?>js/gtv/money.js"  ></script>
        <script src="<?php echo CDN_URL;?>js/gtv/utility.js"></script>
        <script src="<?php echo CDN_URL;?>js/gtv/url.js"    ></script>

        <?php  
        $js = explode(",",$js);
        $jsCount = count($js);
        for ($i = 1; $i <= $jsCount; $i++) {echo "<script src=".CDN_URL."js/".$js[$i-1].".js></script>";}
        ?>   
    </body>
</html>