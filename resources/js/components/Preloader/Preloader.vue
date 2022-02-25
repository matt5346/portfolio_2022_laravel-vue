<template>
  <div class="loader__box">
    <div class="loader__box__inner">
      L<span class="loader__space">o</span>{{ end }}
    </div>
    <div class="loader__dots" />
  </div>
</template>

<script setup>
const end = 'ading';
</script>

<style lang="scss" scoped>
@import '~/sass/_mixins';
@import '~/sass/_keyframes';
@import './style';
</style>
