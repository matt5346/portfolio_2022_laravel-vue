<template>
  <footer class="footer">
    <div class="container">
      <div class="footer-main">
        <div class="footer__upper">
          <div class="footer__upper__socials">
            <h2 class="footer__upper__title">
              {{ $t('footer.socials') }}
            </h2>
            <a
              class="footer__upper__socials-item-link"
              href="https://t.me/matt5346"
              target="_blank"
            >
              <div class="footer__upper__socials-item">
                <Icon
                  class="footer__upper__socials-item__img"
                  name="telegram-icon"
                />
                <span class="footer__upper__socials-item__text">{{ $t('footer.telegram') }}</span>
              </div>
            </a>
            <a
              class="footer__upper__socials-item-link"
              href="https://github.com/matt5346"
              target="_blank"
            >
              <div class="footer__upper__socials-item">
                <Icon
                  class="footer__upper__socials-item__img"
                  name="github-icon"
                />
                <span class="footer__upper__socials-item__text">{{ $t('footer.github') }}</span>
              </div>
            </a>
            <a
              class="footer__upper__socials-item-link"
              href="https://instagram.com/progerb0y"
              target="_blank"
            >
              <div class="footer__upper__socials-item">
                <Icon
                  class="footer__upper__socials-item__img"
                  name="instagram-icon"
                />
                <span class="footer__upper__socials-item__text">{{ $t('footer.instagram') }}</span>
              </div>
            </a>
            <a
              class="footer__upper__socials-item"
              href="https://www.codewars.com/users/matt5346"
              target="_blank"
            >
              <Icon
                class="footer__upper__socials-item__img"
                name="code-wars"
              />
              <span class="footer__upper__socials-item__text">{{ $t('footer.codewars') }}</span>
            </a>
          </div>
          <div class="footer__upper__contacts">
            <div class="footer__upper__contacts__title-box">
              <Icon
                class="footer__upper__socials-item__img"
                name="mail-icon"
              />
              <h2 class="footer__upper__contacts__title-text">
                {{ $t('footer.contactF') }}
              </h2>
            </div>
            <button
              class="main-btn secondary"
              @click="openContacts"
            >
              <span class="main-btn__text">{{ $t('click') }}</span>
            </button>
          </div>
        </div>

        <div class="footer__copyrights">
          <p><b>©</b> {{ $t('footer.copyright') }}</p>
        </div>
      </div>
      <nav class="footer-mob">
        <ul class="footer-mob__list">
          <li class="footer-mob__list-item">
            <router-link
              class="footer-mob__list-item-link"
              :to="`${getLanguageUrl}`"
            >
              <div class="footer-mob__list-item__icon-box">
                <div class="footer-mob__list-item__icon-box__shadow" />
                <div class="footer-mob__list-item__icon-box__press" />
                <Icon
                  class="footer-mob__list-item__icon"
                  name="home-icon"
                />
              </div>
              <span>{{ $t('footer.home') }}</span>
            </router-link>
          </li>
          <li class="footer-mob__list-item">
            <router-link
              :class="portfolio ? 'footer-mob__list-item-link router-link-exact-active' : 'footer-mob__list-item-link'"
              :to="`${getLanguageUrl}/portfolio`"
            >
              <div class="footer-mob__list-item__icon-box">
                <div class="footer-mob__list-item__icon-box__shadow" />
                <div class="footer-mob__list-item__icon-box__press" />
                <Icon
                  class="footer-mob__list-item__icon"
                  name="case-icon"
                />
              </div>
              <span>{{ $t('footer.portfolio') }}</span>
            </router-link>
          </li>
          <li
            class="footer-mob__list-item"
          >
            <transition
              name="slide-fade"
            >
              <div
                v-if="contactsChoice"
                class="footer-mob__list-item__contacts"
              >
                <div class="footer-mob__list-item__contacts-item">
                  <div
                    class="footer-mob__list-item__icon-box"
                    @click="openSocials"
                  >
                    <div class="footer-mob__list-item__icon-box__shadow" />
                    <div class="footer-mob__list-item__icon-box__press" />
                    <Icon
                      class="footer-mob__list-item__icon--contacts"
                      name="share-icon"
                    />
                  </div>
                  <span>{{ $t('footer.socials') }}</span>
                </div>
                <div class="footer-mob__list-item__contacts-item">
                  <div
                    class="footer-mob__list-item__icon-box"
                    @click="openContacts"
                  >
                    <div class="footer-mob__list-item__icon-box__shadow" />
                    <div class="footer-mob__list-item__icon-box__press" />
                    <Icon
                      class="footer-mob__list-item__icon--contacts"
                      name="edit-icon"
                    />
                  </div>
                  <span>{{ $t('form.form') }}</span>
                </div>
              </div>
            </transition>
            <div
              class="footer-mob__list-item__icon-box"
              tabindex="0"
              @click="openContactsChoice"
              @focusout="openContactsChoice"
            >
              <div class="footer-mob__list-item__icon-box__shadow" />
              <div class="footer-mob__list-item__icon-box__press" />
              <Icon
                class="footer-mob__list-item__icon big"
                name="send-icon"
              />
            </div>
            <span>{{ $t('footer.contactMe') }}</span>
          </li>
        </ul>
      </nav>
    </div>
  </footer>
</template>

<script setup>
import Icon from '~/js/components/Icon';
import { computed, onMounted, defineEmit, ref } from 'vue';
import { useStore } from 'vuex';
import { useRoute } from 'vue-router';

let contactsChoice = ref(false);
let portfolio = ref(false);
const store = useStore();
const route = useRoute();
const emitList = defineEmit(['open-contacts', 'open-socials']);

const getLanguageUrl = computed({
  get() {
      return store.getters['Globals/getLanguageUrl'];
  },
});


onMounted(() => {
    if (route.name === 'portfolioItem') {
      portfolio.value = true;
    } else {
      portfolio.value = false;
    }
});

const openContacts = () => {
    emitList('open-contacts', true);
};

const openSocials = () => {
    emitList('open-socials', true);
};

const openContactsChoice = () => {
    contactsChoice.value = !contactsChoice.value;
};
</script>

<style lang="scss">
@import '~/sass/_mixins';
@import '~/sass/_keyframes';
@import './style';
</style>
