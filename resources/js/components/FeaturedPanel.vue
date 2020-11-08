<template>
    <div id="carouselFeatured" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselFeatured" data-slide-to="0" class="active"></li>
            <li data-target="#carouselFeatured" data-slide-to="1"></li>
            <li data-target="#carouselFeatured" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" :src="featured.first.image" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" :src="featured.second.image" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" :src="featured.third.image" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselFeatured" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselFeatured" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
</template>

<script>
export default {
    props: {
        featured: {
            type: Object,
            default: function () {
                return {
                    first: {
                        id: 1,
                        image: "http://placehold.it/1200x350"
                    },
                    second: {
                        id: 2,
                        image: "http://placehold.it/1200x350"
                    },
                    third: {
                        id: 3,
                        image: "http://placehold.it/1200x350"
                    }
                }
            }
        }
    }
}
</script>