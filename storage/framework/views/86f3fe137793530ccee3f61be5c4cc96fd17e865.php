<script>
    let livewireToken = "<?php echo e(csrf_token()); ?>"
</script>
<script data-turbo-eval="false" data-turbolinks-eval="false">
    window.livewire = new Livewire()
    window.Livewire = window.livewire
    window.livewire_app_url = ''
    window.livewire_token = livewireToken
    window.deferLoadingAlpine = function (callback) {
        window.addEventListener('livewire:load', function () {callback()})
    }
    let started = false
    window.addEventListener('alpine:initializing', function () {
        if (!started) {
            window.livewire.start()
            started = true
        }
    })
    document.addEventListener('DOMContentLoaded', function () {
        if (!started) {
            window.livewire.start()
            started = true
        }
    })
</script>
<?php /**PATH C:\websites\crm\crm\resources\views/livewire/livewire-turbo.blade.php ENDPATH**/ ?>