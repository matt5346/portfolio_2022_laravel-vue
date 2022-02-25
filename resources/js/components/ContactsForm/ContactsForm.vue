<template>
  <div>
    <Transition name="slide-fade">
      <div
        v-if="props.modalShow"
        class="modal"
      >
        <div
          class="modal__overlay"
          @click="modalClose"
        />
        <div class="modal__inner">
          <div
            class="modal__close"
            @click="modalClose"
          >
            <Icon
              class="modal__close__icon"
              name="cross-icon"
            />
            <span class="modal__close__tip">{{ $t('close') }}</span>
          </div>
          <form
            class="modal__form"
            @submit.prevent="sendEmail"
          >
            <div class="modal__form-field">
              <h3>{{ $t('form.name') }}</h3>
              <input
                v-model="fields.name"
                name="name"
                :placeholder="$t('form.nameHolder')"
                class="modal__form__input"
                required
                maxlength="50"
              >
            </div>
            <div class="modal__form-field">
              <h3>{{ $t('form.email') }}</h3>
              <input
                v-model="fields.email"
                name="emailaddress"
                :placeholder="$t('form.emailHolder')"
                class="modal__form__input"
                type="email"
                required
                maxlength="50"
              >
            </div>
            <div class="modal__form-field">
              <h3>{{ $t('form.message') }}</h3>
              <textarea
                v-model="fields.message"
                rows="4"
                cols="50"
                name="subject"
                :placeholder="$t('form.messageHolder')"
                class="modal__form__textarea"
                required
                maxlength="250"
              />
            </div>
            <button
              class="main-btn main-btn--contact"
              type="submit"
              :disabled="disabled === 1"
            >
              <span
                v-if="disabled === 0"
                class="main-btn__text"
              >{{ $t('send') }}</span>
              <img
                v-else
                src="/images/preloader.gif"
              >
            </button>
          </form>
        </div>
      </div>
    </Transition>
    <Transition name="slide-fade">
      <div
        v-if="props.socialShow"
        class="modal"
      >
        <div
          class="modal__overlay"
          @click="modalClose"
        />
        <div class="modal__inner">
          <div class="modal__socials">
            <div
              class="modal__close"
              @click="modalClose"
            >
              <Icon
                class="footer__upper__socials-item__img"
                name="cross-icon"
              />
              <span class="modal__close__tip">{{ $t('close') }}</span>
            </div>
            <h2 class="modal__socials__title">
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
              class="footer__upper__socials-item-link"
              href="https://www.codewars.com/users/matt5346"
              target="_blank"
            >
              <div class="footer__upper__socials-item">
                <Icon
                  class="footer__upper__socials-item__img"
                  name="code-wars"
                />
                <span class="footer__upper__socials-item__text">{{ $t('footer.codewars') }}</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </Transition>
  </div>
</template>

<script setup>
import Icon from '~/js/components/Icon';
import { reactive, defineProps, onMounted, defineEmit, ref } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const props = defineProps({
    modalShow: {
      type: Boolean,
      default: () => false,
    },
    socialShow: {
      type: Boolean,
      default: () => false,
    },
});
const emitList = defineEmit(['modal-close', 'social-close']);

let fields = reactive({
    name: '',
    email: '',
    message: ''
});
let portfolioPage = ref(false);
let errors = ref('');
let disabled = ref(0);
const route = useRoute();
  // watch: {
  //   '$route' (to) {
  //     console.log(to.name, 'TO NAME');
  //     if(to.name === 'portfolioItem') {
  //       this.portfolioPage = true;
  //     } else {
  //       this.portfolioPage = false;
  //     }
  //   }
  // },
onMounted(() => {
    if(route.name === 'portfolioItem') {
      portfolioPage.value = true;
    } else {
      portfolioPage.value = false;
    }
});

const modalClose = () => {
    emitList('modal-close', false);
    emitList('social-close', false);
};

const sendEmail = () => {
      disabled.value = 1;
      setTimeout(() => {
        disabled.value = 0;
      }, 3000);
      console.log('SUBMIT sendEmail');
      axios.post('/mail/contact/form', fields).then(() => {
        alert('Message sent!');
      }).catch(error => {
        if (error.response.status === 422) {
          errors.value = error.response.data.errors || {};
        }
      });
};
</script>

<style lang="scss">
@import '~/sass/_mixins';
@import '~/sass/_keyframes';
@import './style';
</style>
