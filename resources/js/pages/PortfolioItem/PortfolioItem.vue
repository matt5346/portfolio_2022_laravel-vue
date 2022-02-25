<template>
  <div class="section s-post">
    <div class="container">
      <Breadcrumbs :links="BreadcrumbLinks" />
      <div
        v-for="item in getPortfolios.value"
        :key="item.id"
        class="portfolio__content"
      >
        <h1 class="portfolio__item-title">
          {{ item.title }}
        </h1>
        <div class="portfolio__item-main">
          <div class="portfolio__item-main__wrap">
            <img
              class="portfolio__item-main__wrap-img"
              :src="getPortfolioImage(item)"
            >
            <div class="portfolio__item-main__link-wrap">
              <a
                v-if="item.link !== 'closed'"
                :href="item.link"
                target="_blank"
                class="portfolio__item-link"
              >{{ $t('btnCheck') }} {{ item.title }} {{ $t('website') }}</a>
              <span v-else>{{ $t('currently') }} {{ $t('unavailable') }}</span>
              <Icon
                v-if="item.link !== 'closed'"
                class="portfolio__item__arrow-right"
                name="circle-arrow-right"
              />
            </div>
            <p class="portfolio__item-main__wrap-description">
              {{ item.body }}
            </p>
          </div>
        </div>
      </div>
      <div
        v-if="getPortfolioArray && getPortfolioArray.length > 1"
        class="portfolio__slider"
      >
        <swiper
          :slides-per-view="'auto'"
          :pagination="{ clickable: true }"
          :navigation="true"
          :effect="'coverflow'"
          :coverflow-effect="{
            rotate: 35,
            stretch: 0,
            depth: 75,
            modifier: 1,
            slideShadows: true,
          }"
          :centered-slides="true"
          class="mySwiper w-1/4"
          @click="openFullSlider"
        >
          <swiper-slide
            v-for="(item, index) in getPortfolioArray"
            :key="index"
          >
            <SwiperImg
              :src="item"
            />
          </swiper-slide>      
        </swiper>
      </div>
      <Transition
        name="slide-fade"
      >
        <div
          v-if="sliderPopup"
          class="portfolio__slider__popup"
        >
          <div
            class="modal__overlay"
            @click="closeSliderPopup"
          />
          <div
            class="modal__close"
            @click="closeSliderPopup"
          >
            <Icon
              class="modal__close__icon"
              name="cross-icon"
            />
            <span class="modal__close__tip">{{ $t('close') }}</span>
          </div>
          <swiper
            :slides-per-view="1"
            :slides-per-group="1"
            :pagination="{ clickable: true }"
            :navigation="true"
            class="mySwiper w-1/4"
          >
            <swiper-slide
              v-for="(item, index) in getPortfolioArray"
              :key="`modal__${index}`"
            >
              <SwiperImg
                :src="item"
              />
            </swiper-slide>      
          </swiper>
        </div>
      </Transition>
    </div>
  </div>
</template>

<script setup>
import { computed, onBeforeMount, ref } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';
import { useI18n } from 'vue-i18n';
import { Swiper, SwiperSlide } from 'swiper/vue';
import SwiperImg from './SwiperImg.vue';
import SwiperCore, { Pagination, Navigation, EffectCoverflow } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/effect-coverflow';
// import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
import Breadcrumbs from '~/js/components/BreadCrumbs/BreadCrumbs.vue';
import Icon from '~/js/components/Icon';

const router = useRouter();
const store = useStore();
const i18n = useI18n();
// const modules = [Navigation, Pagination, Scrollbar, A11y];
// let sliderPopup = ref(false);
// let vm = ref(null);
SwiperCore.use([Pagination, Navigation, EffectCoverflow]);

let sliderPopup = ref(false);

const getPortfolioItem = computed({
  get() {
      return store.getters['Portfolio/getPortfolioItem'];
  },
});

const getRuPortfolioItem = computed({
  get() {
      return store.getters['Portfolio/getRuPortfolioItem'];
  },
});

const getLanguageUrl = computed({
  get() {
      return store.getters['Globals/getLanguageUrl'];
  },
});

const getPortfolioArray = computed({
  get() {
    if (getPortfolioItem.value[0]) {
      return JSON.parse(getPortfolioItem.value[0].images_array);
    }

    return '';
  },
});

const getPortfolios = computed({
  get() {
    if (router.currentRoute.value.params.language === 'en') {
        return getPortfolioItem;
    } else {
        return getRuPortfolioItem;
    }
  },
});

const BreadcrumbLinks = computed({
  get() {
      return [
        {
          active: false,
          name: i18n.t('header.home'),
          href: `${getLanguageUrl.value}/`
        },
        {
          active: false,
          name: i18n.t('header.portfolio'),
          href: `${getLanguageUrl.value}/portfolio`
        },
        {
          active: true,
          name: i18n.t('portfolio.portfolio') + ' №' + router.currentRoute.value.params.id,
          href: `${getLanguageUrl.value}/portfolio/${router.currentRoute.value.params.id}`
        }
      ];
  },
});

onBeforeMount(() => {
    store.dispatch('Portfolio/fetchPortfolioItem', router.currentRoute.value.params.id, { root: true });
    store.dispatch('Portfolio/fetchRuPortfolioItem', router.currentRoute.value.params.id, { root: true });
});

const closeSliderPopup = () => {
  sliderPopup.value = false;
};

const openFullSlider = () => {
  sliderPopup.value = true;
};

const getPortfolioImage = (item) => {
  if (item.length === 0) {
      return '/images/item.png';
  } else {
      return JSON.parse(item.images_array)[0];
  }
};
</script>

<style lang="scss" scoped>
@import '~/sass/_mixins';
@import '~/sass/_keyframes';
@import './style.scss';
@import '~/js/components/ContactsForm/style.scss';
</style>