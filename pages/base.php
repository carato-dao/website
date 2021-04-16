<?php include('components/header.php'); ?>
<div id="app">
  {{ message }}
</div>
<?php include('components/footer.php'); ?>
<script>
    new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue!'
        },
        mounted(){
            console.log('ciao')
        }
    })
</script>