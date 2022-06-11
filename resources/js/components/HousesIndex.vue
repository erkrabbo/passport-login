<template>
  <div class="container">
    <div class="row row-cols-4">
        <div class="col" v-for="house in houses" :key="house.id">
            <div class="card h-100">
                <img :src="house.poster" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HousesIndex',
  data() {
    return {
      houses : [],
    };
  },
  created() {
    Axios.get("/api/houses")
    .then(response => {
      this.houses = response.data;
    })
  }
};
</script>
