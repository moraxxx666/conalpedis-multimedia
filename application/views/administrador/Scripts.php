<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    let navBar = document.querySelectorAll('.sidenav');
    let InstanciaNavBar = M.Sidenav.init(navBar, {})
    let LoginModal = document.querySelectorAll('.modal');
    M.Modal.init(LoginModal, {})
</script>



<?php if ($this->session->flashdata('mensaje')) { ?>
    <script>
        M.toast({
            html: '<?php echo $this->session->flashdata('mensaje'); ?>'
        });
    </script>
<?php } ?>
<script >
    var select= document.querySelectorAll('select');
    M.FormSelect.init(select,{});
</script>
<script>
    let media = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(media,{});
</script>

</body>

</html>