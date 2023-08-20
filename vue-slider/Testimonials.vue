<template>
  <section class="testimonials">
    <div class="container">
      <client-only>
        <VueSlickCarousel
          v-if="slides"
          v-bind="settings"
          @beforeChange="randPagination(2, 10)"
        >
          <div
            class="testimonials__wrapper"
            v-for="(slide, index) in slides"
            :key="index"
          >
            <div class="testimonials__inner-wrapper">
              <div class="testimonials__images-box">
                <div class="testimonials__slides">
                  <figure class="testimonials__figure">
                    <img
                      v-lazy
                      src="~/assets/img/placeholder-image.png"
                      :data-src="`${getStrapiMedia(slide.Image.data.attributes.url)}`"
                      alt=""
                    />
                  </figure>
                </div>
              </div>
              <div class="testimonials__text-box">
                <div class="testimonials__text-slide">
                  <p class="testimonials__text">{{ slide.Text }}</p>
                  <p class="testimonials__person">{{ slide.Name }}</p>
                </div>
              </div>
            </div>
          </div>
          <template #customPaging="page">
            <span class="testimonials__dot"></span>
          </template>
        </VueSlickCarousel>
      </client-only>
    </div>
  </section>
</template>
<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
// optional style for arrows & dots
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import { getStrapiMedia } from "~/utils/medias";

export default {
  components: {
    VueSlickCarousel,
  },
  data() {
    return {
      settings: {
        dots: true,
        arrows: false,
        focusOnSelect: false,
        infinite: true,
        speed: 800,
        slidesToShow: 1,
        slidesToScroll: 1,
        touchThreshold: 5,
        fade: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dotsClass: "testimonials-dots",

        responsive: [
          {
            breakpoint: 1234,
            settings: {},
          },
          {
            breakpoint: 900,
            settings: {},
          },
          {
            breakpoint: 700,
            settings: {},
          },
        ],
      },
      active: 0,
      transformYvalue: 0,
      transformZvalue: 0,
      zindex: 0,
    };
  },
  props: {
    slides: Array,
  },
  directives: {
    lazy: {
      inserted: (el) => {
        const observer = new IntersectionObserver(
          (entries, observer) => {
            entries.forEach(function (entry) {
              if (entry.isIntersecting) {
                let lazyImage = entry.target;
                lazyImage.src = lazyImage.dataset.src;
                observer.unobserve(el);
              }
            });
          },
          {
            rootMargin: "0px 0px 100px 0px",
          }
        );
        observer.observe(el);
      },
    },
  },
  methods: {
    getStrapiMedia,

    randPagination(min, max) {
      const dots = document.querySelectorAll(".testimonials__dot");

      dots.forEach((dot) => {
        min = Math.ceil(min);
        max = Math.floor(max);
        let rand = Math.floor(Math.random() * (max - min)) + min;
        rand = rand * 0.1;

        dot.style.transform = `scaleY(${rand})`;
      });
    },
  },
};
</script>

<style scoped lang="scss">
@import "@/assets/scss/variables.scss";
@import "@/assets/scss/breakpoints.scss";
@import "@/assets/scss/global.scss";
@import "@/assets/scss/mixins.scss";

.testimonials {
  padding-top: 153px;
  padding-bottom: 233px;
  @include breakpoint-max("xs-tablet") {
    padding-top: 100px;
    padding-bottom: 150px;
  }
  &__inner-wrapper {
    display: flex;
    @include breakpoint-max("xs-tablet") {
      flex-direction: column;
      align-items: center;
    }
  }

  &__images-box {
    width: 40%;
    overflow: hidden;
    border-radius: 2px;
    @include breakpoint-max("xs-tablet") {
      margin-bottom: 40px;
      border-radius: 50%;
      width: 50%;
    }
    @include breakpoint-max("mobile") {
      width: 70%;
    }
    @include breakpoint-max("s-mobile") {
      width: 80%;
    }
  }
  &__text-box {
    width: 60%;
    margin-left: 96px;
    display: flex;
    align-items: center;
    @include breakpoint-max("xs-tablet") {
      margin-left: 0;
    }
    @include breakpoint-max("s-mobile") {
      width: 100%;
    }
  }
  &__text {
    font-weight: 500;
    font-size: 1.8rem;
    line-height: 3.1rem;
    color: $dove;
    margin-bottom: 30px;
  }
  &__person {
    font-weight: 700;
    font-size: 1.8rem;
    line-height: 3.1rem;
    color: $black;
    padding-left: 63px;
    position: relative;
    &::before {
      content: "";
      position: absolute;
      left: 0;
      top: 50%;
      width: 45px;
      height: 2px;
      background-color: $dove;
      transform: translateY(-50%);
    }
  }
  &__slides {
    position: relative;

    .active {
      img {
        opacity: 1;
      }
    }
  }

  &__figure {
    position: relative;
    padding-top: 100%;
    display: block;
    height: 0;
    width: 100%;
    cursor: grab;

    img {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      pointer-events: none;
    }
  }
  &__dot {
    display: block;
    margin-right: 9px;
    width: 5px;
    height: 32px;
    background-color: $silver;
    border-radius: 6px;
    transition: 0.5s ease;
  }
  :deep .slick-active span {
    background-color: $black;
  }
  &__dots {
    display: flex !important;
    align-items: center;
    margin-top: 26px;
    position: absolute;
    left: 15%;
    bottom: -80px;
    li {
      padding-left: 0;
      &::before {
        display: none;
      }
    }
  }
}
</style>
