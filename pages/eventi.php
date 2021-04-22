<?php include('components/header.php'); ?>

<!-- Page Title
		============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark include-header" style="padding: 250px 0; background-image: url('/assets/images/gallery/event.jpg'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">

  <div class="container clearfix">
    <div class="m-0 col-md-6 col-lg-6 col-sm-10 col-xs-12">
      <span><?php echo $website_translations["join_event"][$language]; ?></span>
      <h2 style="color: honeydew !important;"><?php echo $website_translations["how_to"][$language]; ?></h2>
    </div>
  </div>

</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">
  <div class="content-wrap" id="app">
    <div v-if="eventi.length > 0" class="row">
      <div v-for="event in eventi" class="col-4" v-bind:key="event.id">
        <div  style="
              text-align: left;
              margin: 10px;
              padding: 20px;
              border: 1px solid #ccc;
              border-radius: 5px;
            ">
          {{ event.associazione }}<br />
          <b style="font-size: 22px">{{ event.titolo }}</b><br />
          {{ event.data.split('-')[2]+'/'+event.data.split('-')[1]+'/'+event.data.split('-')[0] }} {{ event.orario }} a
          <b>{{ event.luogo }}</b>
        </div>
      </div>
    </div>
    <div style="text-align:center" v-if="eventi.length === 0"><?php echo $website_translations["no_event"][$language]; ?></div>
  </div>
</section><!-- #content end -->

<script>
  var app = new Vue({
    el: '#app',
    data: {
      eventi: [],
      apiURL: 'https://api.carato.org'
    },
    async mounted() {
      const app = this
      let events = await window.axios.get(app.apiURL + "/events/all");
      app.eventi = events.data;
    }
  })
</script>
<?php include('components/footer.php'); ?>