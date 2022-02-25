<template>
  <div class="swiper-slide__inner">
    <img
      ref="imgEle"
      class="portfolio__slider-image noLight swiper-lazy"
      :data-src="src || imgEle"
    >
  </div>
</template>

<script setup>
import { defineProps, onMounted, ref } from 'vue';

const imgEle = ref(null);

const props = defineProps({
    src: {
      type: String,
      default: () => '',
    },
});

onMounted(() => {
  imgEle.value.src= props.src;
});
</script>

<style lang="scss" scoped>
@import '~/sass/_mixins';
@import '~/sass/_keyframes';
@import 'style.scss';
// @import '../../components/contactForm/style';
</style>