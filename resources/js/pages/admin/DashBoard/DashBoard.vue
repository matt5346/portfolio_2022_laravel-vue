<template>
  <div class="dashboard">
    <nav class="dashboard__nav">
      <div class="dashboard__nav__main">
        <ul class="dashboard__nav-inner">
          <li class="dashboard__nav-inner__link">
            <router-link
              :to="`/${getLanguage}/admin/dashboard`"
            >
              Laravel-CMS
            </router-link>
          </li>
          <li class="dashboard__nav-inner__link">
            <router-link
              :to="`/${getLanguage}`"
            >
              HOME
            </router-link>
          </li>
        </ul>
      </div>
      <ul class="dashboard__nav-inner">
        <li class="dashboard__nav-inner__link">
          <router-link
            :to="`/${getLanguage}/admin/dashboard/portfolio/create`"
            :class="[languageUrl.includes('/portfolio/create') ? 'router-link-exact-active' : '']"
          >
            NEW Portfolio
          </router-link>
        </li>
        <li class="dashboard__nav-inner__link">
          <router-link
            :to="`/${getLanguage}/admin/dashboard/portfolio/edit`"
            :class="[languageUrl.includes('/portfolio/edit') ? 'router-link-exact-active' : '']"
          >
            EDIT Portfolio
          </router-link>
        </li>
        <!-- <li class="dashboard__nav-inner__link">
          <router-link
            :to="`/${urlGenerator}/posts/create`"
            :class="[languageUrl.includes('/posts/create') ? 'router-link-exact-active' : '']"
          >
            NEW Post
          </router-link>
        </li>
        <li class="dashboard__nav-inner__link">
          <router-link
            :to="`/${urlGenerator}/posts/edit`"
            :class="[languageUrl.includes('/posts/edit') ? 'router-link-exact-active' : '']"
          >
            EDIT Post
          </router-link>
        </li> -->
      </ul>
    </nav>
    <div class="dashboard__content">
      <div
        class="dashboard__content__lang-box"
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
            <span>{{ getLanguage }}</span>
            <Icon
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
      </div>
      <div class="dashboard__content__top">
        <h2>Welcome, {{ userNameReturn }}</h2>
        <span
          class="dashboard__content__top-logout"
          @click="logout"
        >Logout</span>
      </div>
      <div>
        <router-view />
      </div>
    </div>
  </div>
</template>

<script setup>
import Icon from '~/js/components/Icon';
import Lang from '../../../components/HeaderBar/lang/Lang.vue';
import { ref, computed } from 'vue';
import { useRoute } from 'vue-router';
import { useStore } from 'vuex';
import { useI18n } from 'vue-i18n';
// make logout
import axios from 'axios';

let toggleLanguages = ref(false);
const route = useRoute();
const store = useStore();
const i18n = useI18n();
console.log(store, 'STORE');

const getLanguage = computed({
  get() {
      return store.getters['Globals/getLanguage'];
  },
});

const userNameReturn = computed({
  get() {
      return window.userName;
  },
});

const languageUrl = computed({
  get() {
      return route.path;
  },
});

const setLocale = (lang) => {
  i18n.locale.value = lang.toLowerCase();
};

const logout = () => {
  axios.post('/logout').then(() => {
      window.location = '/admin';
  });
};
</script>
<style lang="scss">
@import '~/sass/_mixins';
@import '~/sass/_keyframes';
@import 'style';
</style>
