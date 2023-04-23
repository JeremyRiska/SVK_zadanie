import { createRouter, createWebHistory } from 'vue-router';
import AllCountries  from '@/components/views/AllCountries.vue';
import AddCountry from '@/components/views/AddCountry.vue';
import CountryDetail  from '@/components/views/CountryDetail.vue';


// Vue.use(Router);

const routes = [
    {
        path: '/spa/home',
        component: AllCountries
    },
    {
        path: '/spa/detail/:id',
        component: CountryDetail, 
        name: 'country-detail',
        props: true
    },
    {
        path: '/spa/new-country',
        component: AddCountry
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})
export default router