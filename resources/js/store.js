import { createStore } from 'vuex';

export default createStore({
  state: {
    selectedCountry: null,
  },
  mutations: {
    setSelectedCountry(state, countryData) {
      state.selectedCountry = countryData;
    },
  },
});
