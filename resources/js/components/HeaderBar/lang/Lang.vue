<template>
  <div class="header__inner__nav-list__item-language-box">
    <span
      v-for="(item, key) in languages"
      :key="key"
      value="ru"
      :class="['header__inner__nav-list__item-language-option', { 'active': activeLanguage === `/${item.toLowerCase()}` }]"
      @click="localeChanged(item)"
    >{{ item.toLowerCase() }}</span>
  </div>
</template>

<script setup>
import { computed, defineEmit } from 'vue';
import { useStore } from 'vuex';
import { useRoute, useRouter } from 'vue-router';
const emitList = defineEmit(['change-locale']);

const languages = ['Ru', 'En'];
const store = useStore();
const route = useRoute();
const router = useRouter();

const languageAction = store._actions['Globals/languageAction'];
console.log(languageAction, 'languageAction');

const activeLanguage = computed({
  get() {
      return store.getters['Globals/getLanguageUrl'];
  },
});

const localeChanged = (item) => {
  console.log(item, 'item');
  store.dispatch('Globals/languageAction', item, { root: true });
  setLocale(item.toLowerCase());
  emitList('change-locale', item);
};

const setLocale = (lang) => {
    return new Promise((resolve) => {
        let newPath = route.fullPath;

        if (lang === 'ru') {
            newPath = newPath.replace('en', 'ru');
        } else {
            newPath = newPath.replace('ru', 'en');
        }

        router.replace(newPath.replace('//', '/'), resolve);
    });
};
</script>