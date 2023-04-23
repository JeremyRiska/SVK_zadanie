<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">All countries</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <form action="#" @submit.prevent="searchByContinent()">
                                    <input class="input" type="text" placeholder="filter by continent name" v-model="continentToSearch">
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                        <th scope="col"> Country code </th>
                                        <th scope="col"> Country name <button @click="setOrder"> <i id="arrow" :class="arrowClass" /> </button></th>
                                        <th scope="col"> Country number </th>
                                        <th scope="col"> Continent </th>
                                    </thead>
                                    <tbody>
                                        <!-- <tr v-for="country in countriesList" :key="country.code"> -->
                                            <tr v-for="country in laravelData.data" :key="country.code">
                                            <td> {{ country.code }} </td>
                                            <td> 
                                                <router-link :to="{ name: 'country-detail', params: { id: country.country_id }}" @click="selectCountry(country)">{{ country.name }}</router-link>
                                            </td>
                                            <td> {{ country.number }} </td>
                                            <td> {{ country.continent.name }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <Bootstrap5Pagination :data="laravelData" @pagination-change-page="getResults"></Bootstrap5Pagination>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Bootstrap5Pagination } from 'laravel-vue-pagination';

    export default {
        components: {
            Bootstrap5Pagination,
        },
        data() {
            return {
                continentToSearch: '',
                searchQuery: 'all',
                order: 'asc',
                arrowClass: 'bi bi-arrow-down',
                laravelData: {},
            };
        },
        methods: {
            searchByContinent() {
                this.searchQuery = this.continentToSearch;
                this.getResults();
            },
            setOrder() {
                this.arrowClass = this.arrowClass === 'bi bi-arrow-down' ? 'bi bi-arrow-up' : 'bi bi-arrow-down';
                this.order = this.order === 'asc' ? 'desc' : 'asc';
                console.log(arrow.className);
                this.getResults()
            },
            async getResults(page = 1) {
                let url = `/api/get-countries/${this.order}/${this.searchQuery}?page=${page}`;
                const response = await fetch(url);
                this.laravelData = await response.json();
            },
            selectCountry(country) {
                this.$store.commit('setSelectedCountry', country);
            },
        },
        mounted() {
            this.getResults();
        },
    };
</script>

<style scoped>
@import 'bootstrap-icons/font/bootstrap-icons.css';

    .pagination {
        margin-bottom: 0;
    }
</style>