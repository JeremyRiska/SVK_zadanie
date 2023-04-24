import { createStore } from 'vuex';

export default createStore({
  state: {
    selectedCountry: null,
    notifications: [],
  },
  mutations: {
    setSelectedCountry(state, countryData) {
      state.selectedCountry = countryData;
    }
  },
});