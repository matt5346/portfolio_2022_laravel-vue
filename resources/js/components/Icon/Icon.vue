<template>
  <svg
    v-if="icon"
    class="icon"
    :style="computedStyle"
    :viewBox="icon.viewBox"
    @click="$emit('click')"
  >
    <title v-if="title">{{ title }}</title>
    <use :xlink:href="`#${icon.id}`" />
  </svg>
</template>

<script setup>
import ICONS from './icons';
import { computed, defineProps } from 'vue';

const style = [];

const props = defineProps({
    title: {
      type: String,
      default: () => '',
    },
    size: {
      type: Number,
      default: () => 48,
    },
    color: {
      type: String,
      default: '#000000',
    },
    hoverColor: {
      type: String,
      default: '#000000',
    },
    name: {
      type: String,
      required: true,
      validator: (value) => value in ICONS,
    },
    stroke: Boolean,
});


const computedStyle = computed({
  get() {
      return style.join(';');
  },
  set() {
      if (props.size) {
        style.push(`width: ${props.size}px`);
        style.push(`height: ${props.size}px`);
      }

      if (props.color) {
        style.push(`color: ${props.color}`);
      }

      // if (props.stroke) {
      //   style.push('stroke: currentColor');
      // }

  }
});

const icon = computed({
  get() {
      return ICONS[props.name];
  },
});
</script>