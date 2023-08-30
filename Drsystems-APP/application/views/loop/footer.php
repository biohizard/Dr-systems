    
    <!-- Meta -->
        <script src="<?php echo CDN_URL;?>libs/bootstrap/js/main.js"></script>
        
    <!-- Meta -->

        <?php  
            $js = explode(",",$js);
            $jsCount = count($js);
            for ($i = 1; $i <= $jsCount; $i++) {
                echo "<script src=".CDN_URL."js/".$js[$i-1].".js></script>";
            }
        ?>   
    </body>
</html>