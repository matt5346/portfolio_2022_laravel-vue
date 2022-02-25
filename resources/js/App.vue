<template>
  <div>
    <Header
      v-if="!adminRoute"
    />
    <router-view />
    <Footer
      v-if="!adminRoute"
      @open-contacts="openContacts"
      @open-socials="openSocials"
    />
    <ContactsForm
      v-if="!adminRoute"
      :modal-show="modalShow"
      :social-show="socialShow"
      @modal-close="modalClose"
    />
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import Header from './components/HeaderBar/HeaderBar.vue';
import Footer from './components/FooterBar/FooterBar.vue';
import ContactsForm from './components/ContactsForm/ContactsForm.vue';

const route = useRouter();
let adminRoute = ref(false);
let modalShow = ref(false);
let socialShow = ref(false);

onMounted(async () => {
  await checkAdmin();
});

const checkAdmin = () => {
  if (route.path === '/admin/dashboard') {
      adminRoute.value = true;
  } else {
      adminRoute.value = false;
  }
};

const openContacts = (value) => {
    modalShow.value = value;
};

const openSocials = (value) => {
    socialShow.value = value;
};

const modalClose = () => {
    modalShow.value = false;
    socialShow.value = false;
};
</script>