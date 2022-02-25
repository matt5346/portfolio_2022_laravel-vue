<template>
  <div class="error-page">
    <div class="container">
      <div class="not-found">
        <div class="not-found__number">
          <span class="not-found__number-num">4</span>
          <div class="not-found__number__zero">
            <span class="not-found__number__zero-num" />
          </div>
          <span class="not-found__number-num">4</span>
        </div>
        <div class="not-found__inner">
          <h3>Not Found</h3>
          <p>Sorry, but here is no page like this...</p>
          <router-link to="/posts">
            <button class="main-btn">
              Return
            </button>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>