<template>
  <div>
    <h1 class="nav">todos</h1>
    <router-view/>
  </div>
</template>

<script>

export default {
  name: 'App',

  components: {
  },

  data: () => ({
    //
  }),
};
</script>
<style >
  .nav{
   text-align: center;
  margin-top: 20px;
  margin-bottom: 15px;
  font-size: 30px;
  color: #eec2c2;
  font-size: 62px;
  }
</style>

