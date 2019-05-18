<?php 
include __DIR__.'/header_footer/header.php';
include __DIR__.'/welcome/index.php';

include __DIR__.'/header_footer/footer.php';
?>
<script src="service-worker.js">
</script>

<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('service-worker.js')
            .then(function() {
                console.log("Service-Worker-Registered");
            });
    }
</script>
