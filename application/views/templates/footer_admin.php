    
</div>
    
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/dashboard/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('.js-nav-btn').click(function(){
            $('.js-nav-btn').toggleClass('is-menu-active');
            $('body').toggleClass('inactive');
            $('#nav-menu').toggleClass('nav-menu-active');
        });
    });
</script>
</body>
</html>
