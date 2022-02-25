<template>
  <div class="admin-form">
    <h2>Add your portfolio</h2>
    <div class="admin-form__edit">
      <form
        class="admin-form__edit-form"
        @submit.prevent="createPortfolioSubmit"
      >
        <div class="admin-form__field">
          <span class="admin-form__field-name">Portfolio id</span>
          <input
            v-model="formData.id"
            name="id"
            placeholder="Here is portfolio ID"
            class="admin-form__field-input"
            maxlength="150"
            required
          >
        </div>
        <div class="admin-form__field">
          <span class="admin-form__field-name">Portfolio image preview path</span>
          <input
            v-model="formData.preview"
            name="preview"
            placeholder="Here is portfolio preview"
            class="admin-form__field-input"
            maxlength="150"
            required
          >
        </div>
        <div class="admin-form__field">
          <span class="admin-form__field-name">Portfolio extra images</span>
          <textarea
            v-model="formData.extraImages"
            rows="4"
            cols="50"
            name="extraImages"
            placeholder="Here is extra images"
            class="admin-form__field-textarea"
            maxlength="650"
            wrap="off"
          />
        </div>
        <div class="admin-form__field">
          <span class="admin-form__field-name">Portfolio title</span>
          <textarea
            v-model="formData.title"
            rows="4"
            cols="50"
            name="title"
            placeholder="Here is portfolio title"
            class="admin-form__field-textarea"
            maxlength="250"
            required
          />
        </div>
        <div class="admin-form__field">
          <span class="admin-form__field-name">Portfolio link to website</span>
          <input
            v-model="formData.link"
            name="link"
            placeholder="Here is link"
            class="admin-form__field-input"
            maxlength="150"
            required
          >
        </div>
        <div class="admin-form__field">
          <span class="admin-form__field-name">Portfolio body</span>
          <input
            v-model="formData.body"
            name="body"
            placeholder="Here is portfolio body"
            class="admin-form__field-input"
            maxlength="150"
            required
          >
        </div>
        <button
          v-if="vueWindow && Number(vueWindow.userId) === 2"
          class="main-btn middle main-btn--admin"
          type="submit"
        >
          <span class="main-btn__text">{{ $t('send') }}</span>
        </button>
      </form>

      <table
        v-if="formData.languageStatus"
        class="admin-form__edit-table"
      >
        <thead>
          <th>ID EN</th>
          <th>Preview</th>
          <th>Images</th>
          <th>Link</th>
          <th>Title</th>
          <th>Body</th>
        </thead>
        <tbody>
          <tr
            v-for="(item, key) in getAdminPortfolio"
            :key="key"
          >
            <td>{{ item.id }}</td>
            <td>{{ item.image_preview }}</td>
            <td>
              {{ item.images_array }}
              <code>item - {{ item.id }} {{ item.images_array }}</code>
            </td>
            <td>
              {{ item.link }}
            </td>
            <td>{{ item.title }}</td>
            <td>{{ item.body }}</td>
          </tr>
        </tbody>
      </table>
      <table
        v-else
        class="admin-form__edit-table"
      >
        <thead>
          <th>ID RU</th>
          <th>Превью</th>
          <th>Картинки</th>
          <th>Ссылка</th>
          <th>Заголовок</th>
          <th>Описание</th>
        </thead>
        <tbody>
          <tr
            v-for="(item, key) in getAdminRuPortfolio"
            :key="key"
          >
            <td>{{ item.id }}</td>
            <td>{{ item.image_preview }}</td>
            <td>
              {{ item.images_array }}
              <code>item - {{ item.id }} {{ item.images_array }}</code>
            </td>
            <td>
              {{ item.link }}
            </td>
            <td>{{ item.title }}</td>
            <td>{{ item.body }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { reactive, watch, onMounted, computed, ref } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';

const store = useStore();
const router = useRouter();
let vueWindow = ref(null);

const formData = reactive({
    id: '',
    preview: '',
    extraImages: '',
    title: '',
    body: '',
    link: '',
    languageStatus: true
});

const getLanguage = computed({
  get() {
      return store.getters['Globals/getLanguage'];
  },
});

const getAdminPortfolio = computed({
  get() {
      return store.getters['Admin/getAdminPortfolio'];
  },
});

const getAdminRuPortfolio = computed({
  get() {
      return store.getters['Admin/getAdminRuPortfolio'];
  },
});

watch(() => getLanguage.value, () => {
    if (getLanguage.value === 'en') {
        formData.languageStatus = true;
    } else {
        formData.languageStatus = false;
    }
});

onMounted(() => {
    store.dispatch('Admin/fetch_portfolio', null, { root: true });
    store.dispatch('Admin/fetch_portfolio_ru', null, { root: true });

    if (router.currentRoute.value.params.language === 'en') {
        formData.languageStatus = true;
    } else {
        formData.languageStatus = false;
    }
    vueWindow.value = window;
});

const createPortfolioSubmit = () => {
    const portfolioItem = {
        id: formData.id,
        type: formData.type,
        image_preview: formData.preview,
        images_array: formData.extraImages,
        title: formData.title,
        link: formData.link,
        body: formData.body
    };

    try {
        if (getLanguage.value === 'en') {
            store.dispatch('Admin/create_portfolio', portfolioItem, { root: true });
            store.dispatch('Admin/fetch_portfolio', null, { root: true });
        } else {
            store.dispatch('Admin/create_portfolio_ru', portfolioItem, { root: true });
            store.dispatch('Admin/fetch_portfolio_ru', null, { root: true });
        }

        formData.id = '';
        formData.preview = '';
        formData.extraImages = [];
        formData.title = '';
        formData.link = '';
        formData.body = '';
    } catch(e) {
        console.log(e, 'ERROR, request failed');
    }
};
</script>
