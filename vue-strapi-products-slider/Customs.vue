<template>
  <section class="universals">
    <div class="container">
      <div class="universals__heading">
        <TitleAndText
          v-if="custom.data"
          :h1="true"
          :title="custom.data.attributes.Customs.Title"
          :subtitle="custom.data.attributes.Customs.Subtitle"
          :text="custom.data.attributes.Customs.Text"
        />
      </div>
      <div class="universals__products" v-if="products.data">
        <nuxt-link
          class="product-wrapper"
          v-if="products.data"
          v-for="product in products.data"
          :key="product.id"
          :to="`/products/${product.attributes.slug}`"
        >
          <div
            class="product"
          >
            <div class="product__single">
              <div class="product__content">
                <h3>{{ product.attributes.title }}</h3>
                <p class="product__price">{{ product.attributes.price }} EUR</p>
                <div class="button-box"></div>
                <div class="product__short-text">
                    {{product.attributes.short_text}}
                </div>
              </div>
              <figure>
                <img
                  v-lazy
                  src="~/assets/img/placeholder-image.png"
                  :data-src="`${getStrapiMedia(
                    product.attributes.image.data.attributes.formats.small.url
                  )}`"
                  alt=""
                />
              </figure>
              <div class="product__oval"></div>
              <img class="product__stand" src="@/assets/img/stand.svg" alt="" />
            </div>
        </div>
        </nuxt-link>
      </div>
    </div>
  </section>
</template>
<script>
import TitleAndText from "~/components/atoms/TitleAndText.vue";
import SingleItem from "./product/SingleItem.vue";
import { getStrapiMedia } from "~/utils/medias";

export default {
  data() {
    return {
      products: {},
      error: null,
      custom: {},
      data: {},
      error: null,
    };
  },
  components: {
    TitleAndText,
    SingleItem,
  },
  transition: "intro",


  async fetch() {
    this.products = await this.$http.$get('**api domain**/api/products?filters[categories][slug][$eq]=customs&populate=deep&_sort=displayOrderCustoms:ASC');
    this.custom = await this.$http.$get('**api domain**/api/custom?populate=deep');
  },
  fetchOnServer: true,
  fetchDelay: 100,
  async mounted() {
    document.querySelector(".header").classList.remove("header--dark");
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
  },
};
</script>

<style scoped lang="scss">
@import "@/assets/scss/variables.scss";
@import "@/assets/scss/breakpoints.scss";
@import "@/assets/scss/global.scss";
@import "@/assets/scss/mixins.scss";


.universals {
  padding-top: 165px;
  &__heading {
    margin-bottom: 58px;
  }
  &__products {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
    justify-items: center;
    margin-bottom: 192px;
    @include breakpoint-max("xl-tablet") {
      grid-template-columns: repeat(2, 1fr);
    }
    @include breakpoint-max("xs-tablet") {
      grid-template-columns: repeat(1, 1fr);
    }
    @include breakpoint-max("mobile") {
      margin-bottom: 70px;
    }
  }

  :deep .title-and-text__title {
    color: $dark-gray;
  }
  :deep .title-and-text__text-box {
    color: $dove;
    strong {
      color: $black;
      font-weight: 700;
    }
  }
}
.product-wrapper {
  background-color: $light-grey;
  max-width: 500px;
  width: 100%;
  text-decoration: none;
  padding-bottom: 30%;
  min-height: 600px;
  position: relative;
  z-index: 1;
  cursor: pointer;
  overflow: hidden;
  @include breakpoint-max("mobile") {
    min-height: 430px;
  }
  &:hover {
    figure {
      transform: translateX(-50%) translateY(-30%) rotate(-7deg) scale(1.2);
      -webkit-transform: translateX(-50%) translateY(-30%) rotate(-7deg) scale(1.2);
    }
    .product__oval {
        transform: translateX(-50%) scale(0.7);
        opacity: 0.4;
        -webkit-transform: translateX(-50%) scale(0.7); /* Dodaj prefiks -webkit- */
        -webkit-opacity: 0.4;
    }
    .product__short-text {
      opacity: 1;
    }
    .product__cart-btn {
      bottom: 20px;
    }
  }
}
.product {
  text-decoration: none;

  @include breakpoint-max("mobile") {
    min-height: 500px;
  }
  &__cart-btn {
    position: absolute;
    bottom: -80px;
    right: 20px;
    background-color: $dark-gray;
    padding: 12px;
    border-radius: 50%;
    transition: 0.3s ease;
    cursor: pointer;
    z-index: 3;
    &:hover {
      transform: scale(1.18);
    }
    svg {
      width: 22px;
      height: 22px;
      path {
        fill: white;
        stroke: white;
      }
    }
  }
  &__oval {
    width: 283px;
    height: 30px;
    background-color: black;
    border-radius: 60%;
    opacity: 0.2;
    transition: all 0.6s;
    filter: blur(20px);
    position: absolute;
    z-index: 1;
    will-change: transform;
    bottom: 110px;
    left: 50%;
    transform: translateX(-50%) scale(0.6);
  }
  &__price {
    color: $dove;
    font-size: 1.8rem;
    font-weight: 500;
  }
  figure {
    width: 100%;
    max-width: 290px;
    position: absolute;
    left: 50%;
    bottom: 78px;
    z-index: 2;
    transform: translateX(-50%);
    transition: all 0.9s cubic-bezier(0.25, 0.25, 0.08, 1.14);
    img {
      width: 100%;
      pointer-events: none;
    }
  }
  &__stand {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 0;
  }
  &__content {
    padding: 42px 42px 0 42px;
    h3 {
      color: $dark-gray;
      font-size: 2.5rem;
      margin-bottom: 8px;
    }
  }
  &__btn {
    appearance: none;
    border: 0;
    background-color: transparent;
    outline: 0;
    cursor: pointer;
    margin-top: 21px;
    color: $dove;
    font-size: 1.8rem;
    font-weight: 500;
    svg {
      transition: transform 0.3s;
      margin-left: 3px;
    }
    &:hover {
      svg {
        transform: rotate(45deg);
      }
    }
  }
  &:hover {
    figure {
      transform: translateX(-50%) translateY(-30%) rotate(-7deg) scale(1.2);
      -webkit-transform: translateX(-50%) translateY(-30%) rotate(-7deg) scale(1.2);
    }
    .product__oval {
        transform: translateX(-50%) scale(0.7);
        opacity: 0.4;
        -webkit-transform: translateX(-50%) scale(0.7); /* Dodaj prefiks -webkit- */
        -webkit-opacity: 0.4;
    }
    .product__short-text {
      opacity: 1;
    }
  }
  &__short-text {
      margin-top: 8px;
      font-size: 1.4rem;
      line-height: 1.8rem;
      color: $dark-gray;
      opacity: 0;
      transition: opacity .3s;
      @include breakpoint-max('mobile') {
          display: none;
      }
  }
}
</style>
