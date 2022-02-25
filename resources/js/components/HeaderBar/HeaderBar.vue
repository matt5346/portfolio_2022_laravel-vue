<template>
  <header class="header">
    <div class="container">
      <div class="header__inner">
        <router-link
          :to="globalLanguageUrl"
          class="header__inner__logo-link"
        >
          <div
            class="header__inner__logo-wrapper"
            @mouseover.stop="logoHover"
          >
            <Icon
              class="header__inner__logo-wrapper__logo"
              name="logo-icon"
            />
          </div>
        </router-link>
        <nav class="header__inner__nav">
          <ul class="header__inner__nav-list">
            <li class="header__inner__nav-list__item">
              <router-link
                class="router-link"
                :to="globalLanguageUrl"
              >
                {{ $t('header.home') }}
              </router-link>
            </li>
            <li class="header__inner__nav-list__item">
              <router-link
                class="router-link"
                :to="globalLanguageUrl + '/portfolio'"
              >
                {{ $t('header.portfolio') }}
              </router-link>
            </li>
            <li class="header__inner__nav-list__item">
              <a
                class="router-link"
                href="/admin"
              >
                {{ $t('header.admin') }}
              </a>
            </li>
            <li
              class="header__inner__nav-list__item"
              @click="toggleLanguages = !toggleLanguages"
            >
              <div class="header__inner__nav-list__item-language">
                <Icon
                  :class="['header__inner__nav-list__item-global', {active: toggleLanguages}]"
                  name="global-icon"
                />
                <div
                  :class="['header__inner__nav-list__item-language-select', {active: toggleLanguages}]"
                >
                  <span>{{ currentLanguage }}</span>
                  <Icon
                    :class="['header__inner__nav-list__item-global', {active: toggleLanguages}]"
                    name="chevron-bottom"
                  />
                </div>
              </div>
              <transition name="fade">
                <Lang
                  v-if="toggleLanguages"
                  @change-locale="setLocale"
                />
              </transition>
            </li>
          </ul>
          <div class="header__inner__nav-theme sun">
            <div
              class="header__inner__nav-theme--moon"
              @click="toggleThemeDark"
            >
              <Icon
                class="header__inner__nav-theme_img moon"
                name="moon-icon"
              />
            </div>
            <div
              class="header__inner__nav-theme--sun"
              @click="toggleThemeLight"
            >
              <Icon
                class="header__inner__nav-theme_img sun active"
                name="sun-icon"
              />
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
</template>

<script setup>
import { computed, ref } from 'vue';
import { useStore } from 'vuex';
import { useRoute } from 'vue-router';
import { useI18n } from 'vue-i18n';
import Icon from '~/js/components/Icon';
import Lang from './lang/Lang';

let toggleLanguages = ref(false);
const route = useRoute();
const store = useStore();
const i18n = useI18n();

const currentLanguage = computed(() => {
      if (route.params.language === 'en') {
          return 'En';
      } else {
          return 'Ru';
      }
});

const globalLanguageUrl = computed({
  get() {
      return store.getters['Globals/getLanguageUrl'];
  },
});

const logoHover = () => {
  const logo = document.querySelector('.header__inner__logo-wrapper__logo');
  logo.classList.add('animate');
  logo.addEventListener('animationend', () => {
    logo.classList.remove('animate');
  }, false);
};

const setLocale = (lang) => {
  i18n.locale.value = lang.toLowerCase();
};

const toggleThemeLight = () => {
  const sun = document.querySelector('.header__inner__nav-theme_img.sun');
  const moon = document.querySelector('.header__inner__nav-theme_img.moon');
  const body = document.querySelector('body');
  const themeWrapper = document.querySelector('.header__inner__nav-theme');

  document.documentElement.setAttribute('data-theme', 'dark');

  sun.classList.toggle('active');
  moon.classList.toggle('active');
  body.classList.remove('light');
  body.classList.add('dark');
  themeWrapper.className = 'header__inner__nav-theme moon';
};

const toggleThemeDark = () => {
  const sun = document.querySelector('.header__inner__nav-theme_img.sun');
  const moon = document.querySelector('.header__inner__nav-theme_img.moon');
  const body = document.querySelector('body');
  const themeWrapper = document.querySelector('.header__inner__nav-theme');

  document.documentElement.setAttribute('data-theme', 'default');

  sun.classList.toggle('active');
  moon.classList.toggle('active');
  body.classList.remove('dark');
  body.classList.add('light');
  themeWrapper.className = 'header__inner__nav-theme sun';
};
</script>

<style lang="scss">
@import '~/sass/_mixins';
@import '~/sass/_keyframes';
@import './style';
</style>
