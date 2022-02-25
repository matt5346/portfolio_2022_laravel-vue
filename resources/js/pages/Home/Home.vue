<template>
  <div class="main-page">
    <div
      class="main-page-wrapper"
    >
      <div class="header-intro-wrapper">
        <section class="section s-intro">
          <div class="container">
            <div class="s-intro__box">
              <Icon
                class="s-intro__box__bg"
                name="intro-bg"
              />
              <div class="s-intro__box__text">
                <h1 class="s-intro__box__text-title">
                  {{ $t('homePage.greeting') }}
                </h1>
                <div class="s-intro__box__text-wrapper">
                  <h2 class="s-intro__box__text-subtitle">
                    {{ $t('homePage.name') }}
                  </h2>
                  <h2 class="s-intro__box__text-subtitle">
                    {{ $t('homePage.sphere') }}
                  </h2>
                  <router-link
                    class="s-intro__box__text__link"
                    to="/en/portfolio"
                  >
                    <button class="main-btn main-btn--s-postIntro">
                      <span class="main-btn__text">{{ $t('homePage.checkPortfolio') }}</span>
                    </button>
                  </router-link>
                </div>
              </div>
              <div class="s-intro__box__cube-wrapper">
                <Icon
                  class="s-intro__box__cube-wrapper-box"
                  name="cube-icon"
                />
                <Icon
                  class="s-intro__box__cube-wrapper-shadow"
                  name="shadow-icon"
                />
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script setup>
import Icon from '~/js/components/Icon';
</script>

