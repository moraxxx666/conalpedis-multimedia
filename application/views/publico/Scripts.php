<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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
<script>
    let floating = document.querySelectorAll('.fixed-action-btn');
    M.FloatingActionButton.init(floating, {
        hoverEnabled: false,

    });
</script>
<script>
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, {});
</script>
<script>
    let donde = $("*");
    var sizeFuenteActual = donde.css('font-size');

    function AumentarLetra() {

        var sizeFuenteActual = donde.css('font-size');
        var sizeFuenteActualNum = parseFloat(sizeFuenteActual, 10);
        var sizeFuenteNuevo = sizeFuenteActualNum * 1.2;
        donde.css('font-size', sizeFuenteNuevo);

    }

    function ReducirLetra() {

        var sizeFuenteActual = donde.css('font-size');
        var sizeFuenteActualNum = parseFloat(sizeFuenteActual, 10);
        var sizeFuenteNuevo = sizeFuenteActualNum * 0.8;
        donde.css('font-size', sizeFuenteNuevo);

    }

    function pantallaCompleta() {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen()
        }
        if (document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen()
        }
        if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen()
        }
        if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen()
        }
        if (typeof window.ActiveXObject !== "undefined") {
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}")
            }
        }
    }

    function decir() {
        let cuerpo = document.getElementsByTagName('main');
        var utterance = new SpeechSynthesisUtterance(cuerpo[0].innerText);
        speechSynthesis.speak(utterance);
    }
</script>

</body>

</html>