    
    <!-- Meta -->
        <script src="<?php echo CDN_URL;?>libs/bootstrap/js/main.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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