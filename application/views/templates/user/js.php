<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url() ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?= base_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?= base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?= base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="<?= base_url() ?>assets/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?= base_url() ?>assets/js/setting-demo.js"></script>
<script src="<?= base_url() ?>assets/js/demo.js"></script>
<script src="<?= base_url() ?>assets/js/sispel.js"></script>
<script src="<?= base_url(); ?>assets/ckeditor/config.js"></script>
<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!-- Code injected by live-server -->
<script type="text/javascript">
    // <![CDATA[  <-- For SVG support
    // if ('WebSocket' in window) {
    //     (function() {
    //         function refreshCSS() {
    //             var sheets = [].slice.call(document.getElementsByTagName("link"));
    //             var head = document.getElementsByTagName("head")[0];
    //             for (var i = 0; i < sheets.length; ++i) {
    //                 var elem = sheets[i];
    //                 var parent = elem.parentElement || head;
    //                 parent.removeChild(elem);
    //                 var rel = elem.rel;
    //                 if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
    //                     "stylesheet") {
    //                     var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
    //                     elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
    //                         .valueOf());
    //                 }
    //                 parent.appendChild(elem);
    //             }
    //         }
    //         var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
    //         var address = protocol + window.location.host + window.location.pathname + '/ws';
    //         var socket = new WebSocket(address);
    //         socket.onmessage = function(msg) {
    //             if (msg.data == 'reload') window.location.reload();
    //             else if (msg.data == 'refreshcss') refreshCSS();
    //         };
    //         if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
    //             console.log('Live reload enabled.');
    //             sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
    //         }
    //     })();
    // } else {
    //     console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    // }
    // ]]>
    $('.alert-notify').alert().delay(3000).slideUp('slow');
</script>