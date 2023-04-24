<template>
    <div class="container">
        <div class="row justify-content-center pt-5 pb-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Country Detail
                    </div>
                    <div class="container">
                        <div class="row pt-5">
                            <div class="col-lg-6 col-sm-12">
                                <table class="table">
                                    <tr>
                                        <td> Country id </td>
                                        <td> {{ countryData.country_id }} </td>
                                    </tr>
                                    <tr>
                                        <td> Country code </td>
                                        <td> {{ countryData.code }} </td>
                                    </tr>
                                    <tr>
                                        <td> Country name</td>
                                        <td> {{ countryData.name}} </td>
                                    </tr>
                                    <tr>
                                        <td> Long name: </td>
                                        <td> {{ countryData.full_name }} </td>
                                    </tr>
                                    <tr>
                                        <td> ISO code </td>
                                        <td> {{ countryData.iso3 }} </td>
                                    </tr>
                                    <tr>
                                        <td> Number </td>
                                        <td> {{ countryData.number }} </td>
                                    </tr>
                                    <tr>
                                        <td> Continent </td>
                                        <td> {{ countryData.continent.name }} </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        name: 'CountryDetail',
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
            countryData() {
                return this.$store.state.selectedCountry;
            },
        },
    }
</script>
