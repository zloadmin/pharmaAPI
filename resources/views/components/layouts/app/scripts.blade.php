<script type="text/javascript" src="/hyper/js/jquery.js" data-navigate-once></script>
<script type="text/javascript" src="/hyper/js/bootstrap.bundle.min.js" data-navigate-once></script>
<script type="text/javascript" src="/hyper/js/metisMenu.js" data-navigate-once></script>
<script data-navigate-once>
    $(document).ready(function() {
        $('.side-nav').metisMenu();
    });
    $(document).on('click', '.button-menu-mobile', function(e) {
        e.preventDefault();
        $('body').toggleClass('sidebar-enable');

        // if (self.window.width() >= 768) {
        //   self.body.toggleClass('enlarged');
        // } else {
        //   self.body.removeClass('enlarged');
        // }
    });
</script>

@livewireScripts
@stack('scripts')