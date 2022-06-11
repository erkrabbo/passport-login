<template>
  <div class="container" id="infiniteScroll">
    <div class="row row-cols-4">
        <div class="col" v-for="(house, index) in houses" :key="house.id" :data-last = "index == house.length - 1 ? '1' : '0'" >
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
      page : 1,
      lastPage: 1
    };
  },
  methods: {
    getHouses() {
      Axios.get(`/api/houses?page=${this.page}`)
        .then(response => {
          this.houses.push(...response.data.data);
          this.lastPage = response.data.last_page;
        })
        .catch(error => {
          console.log(error);
        });
    }
},
  created() {
    //  console.log(this.$refs)
    this.getHouses();
  },
  mounted() {
    const application = this;
    // window.onscroll = function(ev) {
    // if ((window.innerHeight + window.scrollY + 10) >= document.body.offsetHeight) {
    //     let anchor = window.innerHeight + window.scrollY;
    //     console.log(application)
    //     window.scrollY = 0;
    //     application.page++;
    //     application.getHouses();
    //     // window.scrollHeight = anchor + 300;
    //     }
    // }
        window.addEventListener('scroll', function(ev) {
        if ((window.innerHeight + window.scrollY + 1) >= document.body.offsetHeight) {
            const anchor = window.innerHeight + window.scrollY;
            console.log(application)
            window.scrollTo({
                top: anchor,
                left: 0,
                behavior: 'smooth'
            });
            if (application.page >= application.lastPage) {
                return;
            }
            application.page++;
            application.getHouses();
            // window.scrollHeight = anchor + 300;
        }
    });
  }
};
</script>
