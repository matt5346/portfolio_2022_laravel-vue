<template>
  <section class="section s-portfolio">
    <div
      class="container"
    >
      <Breadcrumbs :links="BreadcrumbLinks" />
      <h1 class="section__title">
        {{ $t('header.portfolio') }}
      </h1>
      <PortfolioCards :get-portfolio="portfolioArray.value" />
      <button
        v-if="portfolioArray.length > 10"
        class="main-btn main-btn--paginate"
        @click="loadPortfolio"
      >
        <span class="main-btn__text">Load more!</span>
        <Icon
          class="main-btn__icon"
          name="rotate-icon"
        />
      </button>
    </div>
  </section>
</template>

<script setup>
import { computed, onMounted, ref } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';
import { useI18n } from 'vue-i18n';
import Icon from '~/js/components/Icon';
import Breadcrumbs from '~/js/components/BreadCrumbs/BreadCrumbs.vue';
import PortfolioCards from '~/js/components/PortfolioCards/PortfolioCards.vue';

let num = ref(10);
const store = useStore();
const router = useRouter();
const i18n = useI18n();
console.log(i18n, 'NNNNNNNN');

const getPortfolio = computed({
  get() {
      return store.getters['Portfolio/getPortfolio'];
  },
});

const getRuPortfolio = computed({
  get() {
      return store.getters['Portfolio/getRuPortfolio'];
  },
});

const getLanguageUrl = computed({
  get() {
      return store.getters['Globals/getLanguageUrl'];
  },
});

// const isLoaded = computed({
//   get() {
//       return store.getters['Portfolio/isLoaded'];
//   },
// });

const portfolioArray = computed({
  get() {
      if (router.currentRoute.value.params.language === 'en') {
          return getPortfolio;
      } else {
          return getRuPortfolio;
      }
  },
});

const BreadcrumbLinks = computed({
  get() {
      return [
        {
          active: false,
          name: i18n.t('header.home'),
          href: `${getLanguageUrl}/`
        },
        {
          active: true,
          name: i18n.t('header.portfolio'),
          href: `${getLanguageUrl}/portfolio`
        }
      ];
  },
});

onMounted(() => {
    store.dispatch('Portfolio/fetchPortfolio', null, { root: true });
    store.dispatch('Portfolio/fetchRuPortfolio', null, { root: true });
});

const loadPortfolio = () => {
    num += 10;
    store.dispatch('Portfolio/fetchPortfolio', num, { root: true });
};
</script>
