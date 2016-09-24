<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>

<!-- Custom JS -->
<script src="<?php echo base_url('style/js/menu.js'); ?>"></script>

<script type="text/javascript">
    //ScrollUp
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'fade', // Fade, slide, none
            animationInSpeed: 400, // Animation in speed (ms)
            animationOutSpeed: 400, // Animation out speed (ms)
            scrollText: 'Top', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
    });

    //Tooltip
    $('a').tooltip('hide');

    //Popover
    $('.popover-pop').popover('hide');

    //Dropdown
    $('.dropdown-toggle').dropdown();

</script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'ckeditor1' );

    }
</script>
<script src="<?php echo base_url('style/js/windowready.js'); ?>"></script>
<script src="<?php echo base_url('style/js/wysihtml.js'); ?>"></script>

</body>
</html>