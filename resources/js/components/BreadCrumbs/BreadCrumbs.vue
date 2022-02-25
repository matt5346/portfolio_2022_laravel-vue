<template>
  <div class="breadcrumbs">
    <div
      v-for="(item, key) in props.links"
      :key="key"
      class="breadcrumbs__inner"
    >
      <router-link
        :to="item.href"
        :class="['breadcrumbs__item', {'active': props.links.length - 1 === key}]"
      >
        {{ item.name }}
      </router-link>
      <span
        v-if="key + 1 < props.links.length"
        class="breadcrumbs__arrow"
      >»</span>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    links: {
      type: Array,
      default: () => [],
    },
});
</script>
