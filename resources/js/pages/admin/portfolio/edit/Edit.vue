<template>
  <div class="admin-form">
    <div
      v-if="formData.editStatus"
      class="admin-form__header"
    >
      <h2>Edit {{ formData.itemId }} portfolio item</h2>

      <div
        class="admin-form__close"
        @click="formData.editStatus = false"
      >
        <Icon
          class="admin-form__close-icon"
          name="cross-icon"
        />
      </div>
    </div>
    <div class="admin-form__edit">
      <Transition
        name="custom-fade"
      >
        <form
          v-if="formData.editStatus"
          class="admin-form__edit-form"
          @submit.prevent="editSubmitPortfolio"
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
              name="images"
              placeholder="Here is extra images"
              class="admin-form__field-textarea"
              maxlength="650"
              required
            />
          </div>
          <div class="admin-form__field">
            <span class="admin-form__field-name">Portfolio link</span>
            <input
              v-model="formData.link"
              name="link"
              placeholder="Here is portfolio link"
              class="admin-form__field-input"
              maxlength="150"
              required
            >
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
      </Transition>
      <table
        v-if="formData.languageStatus"
        class="admin-form__edit-table"
      >
        <thead>
          <th>ID</th>
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
            <td>{{ item.link }}</td>
            <td>{{ item.title }}</td>
            <td>{{ item.body }}</td>
            <td>
              <button
                v-if="vueWindow && vueWindow.userId === 2"
                class="main-btn main-btn--edit small"
                @click="portfolioEdit(item)"
              >
                <Icon
                  class="main-btn__icon"
                  name="edit-icon"
                />
              </button>
            </td>
            <td>
              <button
                v-if="vueWindow && Number(vueWindow.userId) === 2"
                class="main-btn main-btn--delete small"
                @click="portfolioDelete(item)"
              >
                <Icon
                  class="main-btn__icon"
                  name="trash-icon"
                />
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <table
        v-else
        class="admin-form__edit-table"
      >
        <thead>
          <th>ID RU</th>
          <th>Preview</th>
          <th>Images</th>
          <th>Link</th>
          <th>Title</th>
          <th>Body</th>
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
            <td>{{ item.link }}</td>
            <td>{{ item.title }}</td>
            <td>{{ item.body }}</td>
            <td>
              <button
                v-if="vueWindow && vueWindow.userId === 2"
                class="main-btn main-btn--edit small"
                @click="portfolioEdit(item)"
              >
                <Icon
                  class="main-btn__icon"
                  name="edit-icon"
                />
              </button>
            </td>
            <td>
              <button
                v-if="vueWindow && Number(vueWindow.userId) === 2"
                class="main-btn main-btn--delete small"
                @click="portfolioDelete(item)"
              >
                <Icon
                  class="main-btn__icon"
                  name="trash-icon"
                />
              </button>
            </td>
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
import Icon from '~/js/components/Icon';

const store = useStore();
const router = useRouter();
let vueWindow = ref(null);

const formData = reactive({
    id: 0,
    preview: '',
    extraImages: {},
    title: '',
    body: '',
    link: '',
    itemId: 0,
    itemEditId: 0,
    editStatus: false,
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

watch(() => getLanguage.value, () => {
    if (getLanguage.value === 'en') {
        formData.languageStatus = true;
    } else {
        formData.languageStatus = false;
    }
});

const portfolioDelete = (item) => {
    if (getLanguage.value === 'en') {
        store.dispatch('Admin/delete_portfolio', item.id, { root: true });
    } else {
        store.dispatch('Admin/delete_portfolio_ru', item.id, { root: true });
    }
};

const portfolioEdit = (item) => {
    formData.itemId = item.id;
    formData.itemEditId = item.id - 1;
    formData.editStatus = !formData.editStatus;

    formData.id = item.id;
    formData.preview = item.image_preview;
    formData.extraImages = JSON.stringify(item.images_array);
    formData.link = item.link;
    formData.title = item.title;
    formData.body = item.body;
};

const editSubmitPortfolio = () => {
    const portfolioItem = {
        id: formData.id,
        image_preview: formData.preview,
        images_array: formData.extraImages,
        link: formData.link,
        title: formData.title,
        body: formData.body
    };

    const id = formData.id;

    if (getLanguage.value === 'en') {
        store.dispatch('Admin/edit_portfolio', {portfolioItem, id}, { root: true });
        store.dispatch('Admin/fetch_portfolio', null, { root: true });
    } else {
        store.dispatch('Admin/edit_portfolio_ru', {portfolioItem, id}, { root: true });
        store.dispatch('Admin/fetch_portfolio_ru', null, { root: true });
    }

    formData.id = 0;
    formData.preview = '';
    formData.extraImages = {};
    formData.link = '';
    formData.title = '';
    formData.body = '';
};

</script>

<style lang="scss">
@import '~/sass/_mixins';
@import '~/sass/_keyframes';
</style>
