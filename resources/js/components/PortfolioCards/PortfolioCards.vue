<template>
  <div class="portfolio__inner">
    <div
      v-for="(item, key) in props.getPortfolio"
      :key="item.id"
      class="portfolio__inner-card"
    >
      <span :class="`portfolio__inner-card__id portfolio__inner-card__id--${key}`">Work №{{ item.id }}</span>
      <router-link
        tag="a"
        :to="'portfolio/' + item.id"
        class="portfolio__inner-card__img-box"
      >
        <img
          class="portfolio__inner-card__img"
          :src="item.image_preview"
        >
      </router-link>
      <div class="portfolio__inner-card__description">
        <p>{{ item.title }}</p>
        <router-link
          tag="a"
          :to="'portfolio/' + item.id"
          class="portfolio__inner-card__description-btn"
        >
          <button class="main-btn main-btn--portfolio">
            <span class="main-btn__text">Check</span>
          </button>
          <Icon
            class="footer__upper__socials-item__img"
            name="circle-arrow-right"
          />
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import Icon from '~/js/components/Icon';

const props = defineProps({
    getPortfolio: {
      type: Array,
      default: () => [],
    },
});
</script>

<style lang="scss" scoped>
@import '~/sass/_mixins';
@import '~/sass/_keyframes';
@import './style';
</style>
